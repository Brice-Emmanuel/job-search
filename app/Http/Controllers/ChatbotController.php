<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ChatMessage;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ChatbotController extends Controller
{
    public function index()
    {
        return view('chatbot');
    }

    public function ask(Request $request)
    {
        $request->validate([
            'message' => 'required|string|max:1000',
        ]);

        $userMessage = trim($request->input('message'));

        $apiKey = config('services.gemini.key');

        if (empty($apiKey)) {
            return response()->json([
                'response' => "Le service d'assistance est temporairement indisponible."
            ], 500);
        }

        $context = <<<PROMPT
Tu es l'assistant virtuel officiel de JobSearch.

JobSearch est une plateforme camerounaise qui permet aux particuliers
de trouver des artisans et professionnels pour leurs travaux et besoins.

Tu connais le fonctionnement de la plateforme.

Les utilisateurs peuvent notamment :
- rechercher des artisans ;
- rechercher par catégorie de métier ;
- rechercher par ville ;
- rechercher par quartier ;
- consulter le profil d'un artisan ;
- consulter ses informations et ses avis ;
- envoyer une demande d'intervention ;
- gérer leurs favoris ;
- consulter leur historique ;
- créer un compte client ;
- créer un compte travailleur/artisan ;
- se connecter à leur compte ;
- modifier leur profil.

Les travailleurs/artisans peuvent :
- créer leur compte ;
- renseigner leur métier ;
- renseigner leur expérience ;
- renseigner leur ville et quartier ;
- renseigner leurs jours de travail ;
- gérer leur disponibilité ;
- recevoir des demandes d'intervention.

TON COMPORTEMENT :

Tu dois comprendre naturellement ce que l'utilisateur veut.

L'utilisateur peut écrire une question très vague, mal formulée,
ou simplement expliquer son problème.

Exemple :

Utilisateur :
"je suis perdu je cherche quelqu'un pour réparer ma fuite"

Tu dois comprendre qu'il cherche probablement un plombier et lui
expliquer comment rechercher un plombier sur JobSearch.

Utilisateur :
"je cherche un électricien à Douala"

Tu dois lui expliquer comment rechercher un électricien à Douala.

Utilisateur :
"comment je fais pour m'inscrire"

Tu dois expliquer l'inscription sur JobSearch.

Utilisateur :
"je suis artisan"

Tu peux lui expliquer comment créer un compte travailleur.

Ne réponds jamais automatiquement :
"Désolé, nous ne pouvons pas gérer cela"
lorsque la demande concerne JobSearch.

Réponds comme un assistant humain qui guide réellement l'utilisateur.

Si l'utilisateur dit simplement bonjour, réponds naturellement.

Si la question est liée à JobSearch mais manque de précision,
demande simplement la précision nécessaire.

Si la question n'a aucun rapport avec JobSearch, indique poliment
que tu es spécialisé dans l'aide concernant JobSearch.

Réponds en français, avec un ton naturel, clair, chaleureux et concis.

QUESTION DE L'UTILISATEUR :
$userMessage
PROMPT;

        try {

            /*
             * IMPORTANT :
             * gemini-3.7-flash est le modèle testé avec succès.
             * Ne pas utiliser gemini-3.8-flash ici.
             */

            $model = 'gemini-3.7-flash';

            $response = Http::withHeaders([
                'x-goog-api-key' => $apiKey,
                'Content-Type' => 'application/json',
            ])
            ->timeout(30)
            ->post(
                "https://generativelanguage.googleapis.com/v1beta/models/{$model}:generateContent",
                [
                    'contents' => [
                        [
                            'parts' => [
                                [
                                    'text' => $context
                                ]
                            ]
                        ]
                    ]
                ]
            );

            if ($response->successful()) {

                $data = $response->json();

                $botResponse =
                    $data['candidates'][0]['content']['parts'][0]['text']
                    ?? "Je n'ai pas réussi à générer une réponse.";

            } else {

                $error = $response->json('error.message');

                Log::warning(
                    "Chatbot Gemini [{$model}] HTTP {$response->status()} : "
                    . ($error ?? 'Erreur inconnue')
                );

                if ($response->status() === 503) {
                    $botResponse =
                        "Le service d'assistance est momentanément très sollicité. "
                        . "Veuillez réessayer dans quelques instants.";
                } else {
                    $botResponse =
                        "Le service d'assistance rencontre actuellement un problème. "
                        . "Veuillez réessayer dans quelques instants.";
                }
            }

        } catch (\Throwable $e) {

            Log::error(
                "Chatbot Gemini [{$model}] erreur : " . $e->getMessage()
            );

            $botResponse =
                "Je rencontre actuellement un problème de connexion. "
                . "Veuillez réessayer dans quelques instants.";
        }

        if (auth()->check()) {
            ChatMessage::create([
                'user_id' => auth()->id(),
                'user_message' => $userMessage,
                'bot_response' => $botResponse,
            ]);
        }

        return response()->json([
            'response' => $botResponse
        ]);
    }
}