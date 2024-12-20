<?php

namespace App\Http\Controllers;

use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Storage;

class WhatsAppController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $whatsappToken;
    protected $phoneNumberId;
    public function mostrarFormulario()
    {
        return view('wasap.index');
    }
    public function __construct()
    {
        // Los datos que obtuviste de Meta
        $this->whatsappToken = env('WHATSAPP_API_TOKEN');
        $this->phoneNumberId = env('WHATSAPP_PHONE_NUMBER_ID');
    }

    // Método para recibir mensajes (Webhook)
    /*public function handleWebhook(Request $request)
    {
        $input = $request->all();

        // Verifica si el webhook está funcionando
        if (isset($input['entry'][0]['changes'][0]['value']['messages'])) {
            $messages = $input['entry'][0]['changes'][0]['value']['messages'];

            // Procesa cada mensaje recibido
            foreach ($messages as $message) {
                $from = $message['from']; // Número del remitente
                $text = $message['text']['body']; // Texto del mensaje recibido

                // Aquí puedes guardar el lead en tu CRM
                // Lead::create(['number' => $from, 'message' => $text]);

                // Responde al mensaje (opcional)
                $this->sendWhatsAppMessage($from, "¡Gracias por tu mensaje! Nuestro equipo se pondrá en contacto.");
            }
        }
        return response('Webhook recibido con éxito', 200);
    }

    // Método para enviar un mensaje de WhatsApp
    public function sendWhatsAppMessage($to, $message)
    {
        $client = new Client();
        $response = $client->post("https://graph.facebook.com/v15.0/{$this->phoneNumberId}/messages", [
            'headers' => [
                'Authorization' => "Bearer {$this->whatsappToken}",
                'Content-Type' => 'application/json',
            ],
            'json' => [
                'messaging_product' => 'whatsapp',
                'to' => $to,
                'text' => [
                    'body' => $message,
                ],
            ],
        ]);

        return json_decode($response->getBody(), true);
    }*/

    public function sendTemplateMessage(Request $request)
    {
        $client = new Client();
        $token = env('WHATSAPP_API_TOKEN'); // Token que obtuviste de la API
        $phone_number_id = env('WHATSAPP_PHONE_NUMBER_ID'); // El ID de tu número de teléfono

        try {
            $response = $client->post("https://graph.facebook.com/v20.0/{$phone_number_id}/messages", [
                'headers' => [
                    'Authorization' => "Bearer $token",
                    'Content-Type' => 'application/json',
                ],
                'json' => [
                    'messaging_product' => 'whatsapp',
                    'to' => '51949729099', // El número de destino, en formato internacional con el código de país
                    'type' => 'template',
                    'template' => [
                        'name' => 'hello_world',  // Nombre de la plantilla que deseas usar
                        'language' => [
                            'code' => 'en_US' // Idioma de la plantilla
                        ]
                    ]
                ]
            ]);

            $statusCode = $response->getStatusCode();
            $body = json_decode($response->getBody(), true);

            if ($statusCode == 200) {
                return response()->json(['message' => 'Mensaje enviado con éxito.', 'data' => $body]);
            } else {
                return response()->json(['message' => 'Error al enviar el mensaje.', 'data' => $body], $statusCode);
            }
        } catch (\Exception $e) {
            return response()->json(['message' => 'Excepción al enviar el mensaje.', 'error' => $e->getMessage()], 500);
        }
    }
    public function handleIncomingMessage(Request $request)
    {
        $data = $request->all();

        // Verifica que haya un mensaje
        if (isset($data['entry'][0]['changes'][0]['value']['messages'][0])) {
            $message = $data['entry'][0]['changes'][0]['value']['messages'][0];

            $from = $message['from']; // Número del remitente
            $text = $message['text']['body'] ?? ''; // Texto del mensaje recibido

            // Procesa el mensaje (por ejemplo, guardarlo o responder automáticamente)
            //  Log::info("Mensaje recibido de $from: $text");

            // Respuesta automática opcional
            //$this->sendMessage($from, "Gracias por tu mensaje: \"$text\"");
        }

        return response('Evento procesado', 200);
    }

    public function verifyWebhook(Request $request)
    {
        $verify_token = "itsukinakano"; // Define este token en tu archivo .env

        $mode = $request->query('hub_mode');
        $token = $request->query('hub_verify_token');
        $challenge = $request->query('hub_challenge');

        if ($mode === 'subscribe' && $token === $verify_token) {
            return response($challenge, 200); // Responde con el challenge
        }

        return response('Forbidden', 403); // Devuelve 403 si el token no coincide
    }

    public function enviarImagen(Request $request)
    {
        // Crear el cliente de GuzzleHTTP
        $imageUrl = $request->imagen;
        // Subir la imagen al almacenamiento
        /*if ($request->hasFile('imagen')) {
            // Intenta subir la imagen a Cloudinary
            $result = Cloudinary::upload($request->file('imagen')->getRealPath());
            $imageUrl = $result->getSecurePath(); // Asegúrate de que el resultado no sea nulo

            if (!$imageUrl) {
                throw new \Exception("La URL de la imagen no se generó correctamente.");
            }
        } else {
            return back()->with('error', 'Error al subir la imagen');
        }*/
        $client = new Client();
        $token = env('WHATSAPP_API_TOKEN'); // Token que obtuviste de la API
        $phone_number_id = env('WHATSAPP_PHONE_NUMBER_ID'); // El ID de tu número de teléfono
        // Guardar la imagen temporalmente en el almacenamiento

        // Configurar los encabezados
        $headers = [
            'Content-Type' => 'application/json',
            'Authorization' => "Bearer $token"
        ];

        // Cuerpo de la solicitud
        $body = [

            "messaging_product" => "whatsapp",
            "recipient_type" => "individual",
            "to" => "51949729099",
            "type" => "image",
            "image" => [
                "link" => $imageUrl // URL completa de la imagen
            ]
        ];

        try {
            // Realizar la solicitud POST
            $response = $client->post('https://graph.facebook.com/v20.0/486011234585607/messages', [
                'headers' => $headers,
                'json' => $body
            ]);

            // Verificar el resultado de la solicitud
            if ($response->getStatusCode() == 200) {
                // return response()->json(['message' => 'Imagen enviada con éxito']);
                return redirect()->back();
            } else {
                return response()->json(['error' => 'Error al enviar la imagen'], $response->getStatusCode());
            }
        } catch (\Exception $e) {
            // Capturar errores y devolver un mensaje de error
            return response()->json(['error' => 'Ocurrió un error: ' . $e->getMessage()], 500);
        }
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
