<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Abraham\TwitterOAuth\TwitterOAuth as TwitterOAuthTwitterOAuth;
use Exception;
use Illuminate\Support\Facades\Http;

class twittercontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function postTweet(Request $request)
    {
        $request->validate([
            'tweet' => 'required|string|max:280',
        ]);

        $tweetText = $request->input('tweet');

        // Inicializa la conexión con Twitter usando las claves OAuth
        $twitter = new TwitterOAuthTwitterOAuth(
            env('TWITTER_CONSUMER_KEY'),
            env('TWITTER_COMSUMER_SECRET'),
            env('TWITTER_ACCESS_TOKEN'),
            env('TWITTER_TOKEN_SECRET')
        );

        // Envía la solicitud para crear un tweet
        $response = $twitter->post("statuses/update", ["status" => $tweetText]);

        // Verifica si la solicitud fue exitosa
        if ($twitter->getLastHttpCode() == 200) {
            return response()->json(['message' => 'Tweet publicado exitosamente.']);
        } else {
            return response()->json(['error' => 'Error publicando el tweet'], $twitter->getLastHttpCode());
        }
    }



    public function authenticate()
    {
        $apiKey = env('TWITTER_API_KEY');
        $apiSecretKey = env('TWITTER_API_SECRET_KEY');
        $accessToken = env('TWITTER_ACCESS_TOKEN');
        $accessTokenSecret = env('TWITTER_ACCESS_TOKEN_SECRET');

        $connection = new TwitterOAuthTwitterOAuth($apiKey, $apiSecretKey, $accessToken, $accessTokenSecret);

        try {
            $content = $connection->get("account/verify_credentials", [
                'include_entities' => true,
                'skip_status' => true,
                'include_email' => true // Asegúrate de que tu aplicación tenga permiso para acceder al email
            ]);

            // Imprimir el contenido para depuración
            //dd($content); // Esto mostrará el contenido de la respuesta

            // Verifica si hay errores
            if (isset($content->errors)) {
                return response()->json(['error' => 'Error: ' . $content->errors[0]->message, 'code' => $content->errors[0]->code], 403);
            }

            return response()->json(['success' => 'Autenticado exitosamente', 'user' => $content]);
        } catch (Exception $e) {
            return response()->json(['error' => 'Error al conectar a Twitter: ' . $e->getMessage()], 500);
        }
    }
    public function redirectToTwitter()
    {
        $apiKey = env('TWITTER_API_KEY');
        $apiSecretKey = env('TWITTER_API_SECRET_KEY');

        $connection = new TwitterOAuthTwitterOAuth($apiKey, $apiSecretKey);
        $request_token = $connection->oauth('oauth/request_token', [
            'oauth_callback' => route('twitter.callback') // Ajusta la ruta REDIRRECCION
        ]);

        // Guardar el token en la sesión
        session(['oauth_token' => $request_token['oauth_token'], 'oauth_token_secret' => $request_token['oauth_token_secret']]);

        // Redirigir a Twitter para que el usuario inicie sesión
        $url = $connection->url('oauth/authorize', ['oauth_token' => $request_token['oauth_token']]);
        return redirect($url);
    }
    public function handleTwitterCallback()
    {
        $apiKey = env('TWITTER_API_KEY');
        $apiSecretKey = env('TWITTER_API_SECRET_KEY');

        // Obtener el token de sesión
        $requestToken = [
            'oauth_token' => session('oauth_token'),
            'oauth_token_secret' => session('oauth_token_secret'),
        ];

        // Verifica que el token esté en la sesión
        if (!$requestToken['oauth_token'] || !$requestToken['oauth_token_secret']) {
            return response()->json(['error' => 'Tokens no encontrados en la sesión'], 403);
        }

        // Crear una nueva conexión con Twitter utilizando el token de acceso
        $connection = new TwitterOAuthTwitterOAuth($apiKey, $apiSecretKey, $requestToken['oauth_token'], $requestToken['oauth_token_secret']);

        // Intercambiar el oauth_verifier por un access_token
        $accessToken = $connection->oauth('oauth/access_token', ['oauth_verifier' => request('oauth_verifier')]);

        // Verifica si el access_token es nulo
        if (!$accessToken) {
            return response()->json(['error' => 'Error al obtener el access token'], 403);
        }

        // Crear una nueva conexión con el access token
        $connection = new TwitterOAuthTwitterOAuth($apiKey, $apiSecretKey, $accessToken['oauth_token'], $accessToken['oauth_token_secret']);

        // Obtener los datos del usuario autenticado
        $user = $connection->get("account/verify_credentials", ['include_entities' => true]);

        // Verifica si hay errores en la respuesta
        if (isset($user->errors)) {
            return response()->json(['error' => 'Error: ' . $user->errors[0]->message], 403);
        }

        // Guardar los datos del usuario en la sesión
        session(['twitter_user' => $user]);

        // Redirigir a la vista
        return redirect()->route('social.publi');
    }


    public function index()
    {
        return view('tweet');
    }

    public function showSocialPubli()
    {
        $twitterUser = session('twitter_user');

        // Si no hay datos en la sesión, redirige a algún otro lugar (por ejemplo, a la página de login)
        if (!$twitterUser) {
            return redirect()->route('social.index');
        }
        return view('social media.publicacion', compact('twitterUser'));
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
