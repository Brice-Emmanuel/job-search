<?php

namespace App\Support;

class ChatbotKnowledge
{
    public const CONFIDENT_SCORE = 80;
    public const APPROX_SCORE = 40;

    public static function normalize(string $text): string
    {
        return mb_strtolower(trim($text));
    }

    public static function match(string $message): ?array
    {
        // Retourne null pour forcer l'appel dynamique à Gemini dans 100% des cas non gérés localement
        return null;
    }

    public static function asPrompt(): string
    {
        return "Plateforme : JobSearch (Cameroun - Douala, Yaoundé). " .
               "Rôle : Mettre en relation des clients et des artisans qualifiés (plombiers, électriciens, maçons, peintres...). " .
               "Inscription : Gratuite pour les clients et les artisans. " .
               "Contact support : contact@jobsearch.cm.";
    }
}