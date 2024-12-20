<?php

namespace App\Http\Controllers;

use App\Models\actividades;
use Illuminate\Http\Request;

use Google\Client as GoogleClient;
use Google\Service\Gmail;

class GoogleController extends Controller
{
    public function redirectToGoogle()
    {
        $client = new GoogleClient();
        $client->setClientId(env('GOOGLE_CLIENT_ID'));
        $client->setClientSecret(env('GOOGLE_CLIENT_SECRET'));
        $client->setRedirectUri(env('GOOGLE_REDIRECT_URI'));
        $client->addScope(Gmail::MAIL_GOOGLE_COM);
        $client->setAccessType('offline'); // Permitir acceso fuera de línea
        $client->setPrompt('consent'); // Siempre solicitar consentimiento

        return redirect($client->createAuthUrl());
    }

    // Manejar el callback de Google OAuth
    public function handleGoogleCallback(Request $request)
    {
        $client = new GoogleClient();
        $client->setClientId(env('GOOGLE_CLIENT_ID'));
        $client->setClientSecret(env('GOOGLE_CLIENT_SECRET'));
        $client->setRedirectUri(env('GOOGLE_REDIRECT_URI'));
        $client->addScope(Gmail::MAIL_GOOGLE_COM);

        if ($request->has('code')) {
            $code = $request->get('code');

            // Obtén el token usando el código de autorización
            $token = $client->fetchAccessTokenWithAuthCode($code);

            if (array_key_exists('error', $token)) {
                return redirect()->route('auth.google')->with('error', 'Error en la autenticación: ' . $token['error']);
            }

            // Configura el token en el cliente
            $client->setAccessToken($token['access_token']);

            // Almacena el token en la sesión
            session(['google_access_token' => $token['access_token']]);

            // Verificar si hay datos temporales para enviar
            if (session()->has('temp_email_data')) {
                $emailData = session('temp_email_data');
                $this->sendEmail($client, $emailData['destinatario'], $emailData['asunto'], $emailData['contenido']);

                // Elimina los datos temporales
                session()->forget('temp_email_data');

                return redirect()->route('contactos.index')->with('success', 'Correo enviado después de la autenticación!');
            }

            return redirect()->route('contactos.index')->with('success', 'Autenticación exitosa, pero no hay correos para enviar.');
        }

        return redirect()->route('auth.google')->with('error', 'Error en la autenticación.');
    }



    public function enviarEmail(Request $request)
    {
        // Guardar datos en la sesión si no hay token de acceso
        $contenido = $request->input('contenidoEmail');
        $asunto = $request->input('asunto', 'Sin asunto');
        $destinatario = $request->input('destinatario');
        // Validación del destinatario
        $fecha = date("Y-m-d");
        $new_docu = 3; //aregla esto debe ir el id del id no uno inventado 
        actividades::registrar(session('usuario')->id, 'Enviar', 'Correo', $new_docu, "Se envio un correo a $destinatario", $fecha);
        if (empty($destinatario) || !filter_var($destinatario, FILTER_VALIDATE_EMAIL)) {
            return redirect()->back()->withErrors('La dirección de correo del destinatario no es válida.');
        }
        // Obtener el token de acceso de la sesión
        $accessToken = session('google_access_token');

        // Si el token no existe, guarda los datos en la sesión y redirige al login
        if (!$accessToken) {
            session([
                'temp_email_data' => [
                    'contenido' => $contenido,
                    'asunto' => $asunto,
                    'destinatario' => $destinatario,
                ],
            ]);
            return redirect()->route('auth.google'); // Redirige a la autenticación de Google
        }

        // Si el token existe, enviar el correo
        $client = new GoogleClient();
        $client->setClientId(env('GOOGLE_CLIENT_ID'));
        $client->setClientSecret(env('GOOGLE_CLIENT_SECRET'));
        $client->setRedirectUri(env('GOOGLE_REDIRECT_URI'));
        $client->addScope(Gmail::MAIL_GOOGLE_COM);

        // Configura el token en el cliente
        $client->setAccessToken($accessToken);

        // Enviar el correo
        $this->sendEmail($client, $destinatario, $asunto, $contenido);

        return redirect()->route('contactos.index')->with('success', 'Correo enviado!');
    }
    //TENER CUIDADO NO USAR RAWMESSAGGE SFITF_MESSAGE
    private function sendEmail($client, $destinatario,  $asunto, $contenido)
    {

        $service = new Gmail($client);

        $message = (new \Swift_Message())
            ->setSubject($asunto)
            //->setFrom(['tuemail@gmail.com' => 'Tu nombre'])
            ->setFrom(['condorenajoshua98@gmail.com']) //DEBE AGRAR EL CORREO FROM
            ->setTo([$destinatario])
            ->setBody($contenido, 'text/html');

        // Convertir el mensaje a base64 para enviar por Gmail
        $rawMessage = strtr(base64_encode($message->toString()), ['+' => '-', '/' => '_']);

        $message = new \Google\Service\Gmail\Message();
        $message->setRaw($rawMessage);

        $service->users_messages->send('me', $message);
    }
    /*
    // Iniciar la autenticación con Google
    
    public function redirectToGoogle()
    {
        $client = new GoogleClient();
        $client->setClientId(env('GOOGLE_CLIENT_ID'));
        $client->setClientSecret(env('GOOGLE_CLIENT_SECRET'));
        $client->setRedirectUri(env('GOOGLE_REDIRECT_URI'));
        $client->addScope(Gmail::MAIL_GOOGLE_COM);
        $client->setAccessType('offline'); // Permitir acceso fuera de línea
        $client->setPrompt('consent'); // Siempre solicitar consentimiento

        return redirect($client->createAuthUrl());
    }

    // Manejar el callback de Google OAuth
    public function handleGoogleCallback(Request $request)
    {
        $client = new GoogleClient();
        $client->setClientId(env('GOOGLE_CLIENT_ID'));
        $client->setClientSecret(env('GOOGLE_CLIENT_SECRET'));
        $client->setRedirectUri(env('GOOGLE_REDIRECT_URI'));

        if ($request->has('code')) {
            $code = $request->get('code');

            // Obtén el token usando el código de autorización
            $token = $client->fetchAccessTokenWithAuthCode($code);

            if (array_key_exists('error', $token)) {
                return redirect()->route('contactos.index')->with('error', 'Error en la autenticación: ' . $token['error']);
            }

            // Configura el token en el cliente
            $client->setAccessToken($token['access_token']);

            // Almacena el token en la sesión
            session(['google_access_token' => $token['access_token']]);
            session(['google_refresh_token' => $token['refresh_token']]); // Almacena el refresh token

            return redirect()->route('contactos.index')->with('success', 'Autenticación exitosa. Ahora puedes enviar correos.');
        }

        return redirect()->route('contactos.index')->with('error', 'Error en la autenticación.');
    }

    // Enviar correo electrónico
    public function enviarEmail(Request $request)
    {

        $contenido = $request->input('contenidoEmail');
        $asunto = $request->input('asunto', 'Sin asunto');
        $destinatario = $request->input('destinatario');

        $client = new GoogleClient();
        $client->setClientId(env('GOOGLE_CLIENT_ID'));
        $client->setClientSecret(env('GOOGLE_CLIENT_SECRET'));
        $client->setRedirectUri(env('GOOGLE_REDIRECT_URI'));

        // Obtener el token de acceso de la sesión
        $accessToken = session('google_access_token');

        // Si el token no existe, redirige al usuario para autenticarse
        if (!$accessToken) {
            return redirect()->route('auth.google')->with('error', 'Debes iniciar sesión en Google para enviar correos.');
        }

        // Configurar el token en el cliente
        $client->setAccessToken($accessToken);

        // Verificar si el token ha caducado
        if ($client->isAccessTokenExpired()) {
            $refreshToken = session('google_refresh_token');
            if ($refreshToken) {
                $client->fetchAccessTokenWithRefreshToken($refreshToken);
                session(['google_access_token' => $client->getAccessToken()]);
                session(['google_refresh_token' => $client->getRefreshToken()]);
            } else {
                return redirect()->route('auth.google')->with('error', 'El token ha caducado y no se puede renovar automáticamente. Por favor, vuelve a iniciar sesión.');
            }
        }

        // Enviar el correo
        try {
            $this->sendEmail($client, $destinatario, $asunto, $contenido);
            return redirect()->route('contactos.index')->with('success', 'Correo enviado!');
        } catch (\Exception $e) {
            return redirect()->route('contactos.index')->with('error', 'Error al enviar el correo: ' . $e->getMessage());
        }
    }

    private function sendEmail($client,)
    {
        $client = new GoogleClient();
        $client->setClientId(env('GOOGLE_CLIENT_ID'));
        $client->setClientSecret(env('GOOGLE_CLIENT_SECRET'));
        $client->setRedirectUri(env('GOOGLE_REDIRECT_URI'));
        $client->setAccessToken(session('google_access_token'));

        $service = new Gmail($client);

        $rawMessage = "To: dest@example.com\r\n";
        $rawMessage .= "Subject: Prueba\r\n";
        $rawMessage .= "MIME-Version: 1.0\r\n";
        $rawMessage .= "Content-Type: text/html; charset=UTF-8\r\n\r\n";
        $rawMessage .= "Este es un correo de prueba.";

        $encodedMessage = base64_encode($rawMessage);
        $encodedMessage = strtr($encodedMessage, ['+' => '-', '/' => '_', '=' => '']);

        $message = new \Google\Service\Gmail\Message();
        $message->setRaw($encodedMessage);

        try {
            $service->users_messages->send('me', $message);
            echo "Correo enviado exitosamente!";
        } catch (\Exception $e) {
            echo 'Error al enviar el correo: ' . $e->getMessage();
        }
    }









    /*
    public function enviarEmail(Request $request)
    {
        //  dd($request->all());

        $contenido = $request->input('contenidoEmail');
        $asunto = $request->input('asunto', 'Sin asunto'); // Si no hay asunto, usa uno por defecto.
        $destinatario = $request->input('destinatario'); //, 'condorenajoshua98@gmail.com');   // Asegúrate de que el formulario incluya este campo.

        // Crear cliente de Google y enviar correo.
        $client = new GoogleClient();
        $client->setClientId(env('GOOGLE_CLIENT_ID'));
        $client->setClientSecret(env('GOOGLE_CLIENT_SECRET'));
        $client->setRedirectUri(env('GOOGLE_REDIRECT_URI'));
        $client->addScope(Gmail::MAIL_GOOGLE_COM);

        // Obtén el token de acceso desde la sesión
        $client->setAccessToken(session('google_access_token'));

        // Llamar al método que envía el correo
        $this->sendEmail($client, $destinatario, $asunto, $contenido);

        return redirect()->route('contactos.index')->with('success', 'Correo enviado!');
    }

    private function sendEmail($client, $destinatario, $asunto, $contenido)
    {

        $service = new Gmail($client);

        $message = (new \Swift_Message())
            ->setSubject($asunto)
            //->setFrom(['tuemail@gmail.com' => 'Tu nombre'])
            ->setFrom(['condorenajoshua98@gmail.com'])
            ->setTo([$destinatario])
            ->setBody($contenido, 'text/html');

        // Convertir el mensaje a base64 para enviar por Gmail
        $rawMessage = strtr(base64_encode($message->toString()), ['+' => '-', '/' => '_']);

        $message = new \Google\Service\Gmail\Message();
        $message->setRaw($rawMessage);

        $service->users_messages->send('me', $message);
    }*/
}
