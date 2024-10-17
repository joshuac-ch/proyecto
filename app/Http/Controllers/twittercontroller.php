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

        $BEARER_TOKEN = 'AAAAAAAAAAAAAAAAAAAAAB7OwQEAAAAAmL%2BUR4RLefUjqafRJwQbL3LNh5Q%3DefJVQ1mXiidjAzCRcOJGJAofVi7rf2SvoRHaibj4HpPQwCtUji';

        try {
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $BEARER_TOKEN,
                'Content-Type' => 'application/json',
            ])->post('https://api.twitter.com/2/tweets', [
                'text' => $tweetText,
            ]);

            if ($response->successful()) {
                return response()->json(['message' => 'Tweet publicado exitosamente.']);
            } else {
                return response()->json(['error' => 'Error publicando el tweet'], $response->status());
            }
        } catch (Exception $e) {
            return response()->json(['error' => 'Error publicando el tweet: ' . $e->getMessage()], 500);
        }
    }
    public function authenticate()
    {
        $apiKey = env('TWITTER_API_KEY');
        $apiSecretKey = env('TWITTER_API_SECRET_KEY');
        $accessToken = env('TWITTER_ACCESS_TOKEN');
        $accessTokenSecret = env('TWITTER_ACCESS_TOKEN_SECRET');

        $connection = new TwitterOAuthTwitterOAuth($apiKey, $apiSecretKey, $accessToken, $accessTokenSecret);
        $content = $connection->get("account/verify_credentials", ['include_entities' => true]);

        // Verifica si hay errores
        if (isset($content->errors)) {
            return response()->json(['error' => 'Error: ' . $content->errors[0]->message], 403);
        }

        return response()->json(['success' => 'Autenticado exitosamente', 'user' => $content]);
    }

    public function index()
    {
        return view('tweet');
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
