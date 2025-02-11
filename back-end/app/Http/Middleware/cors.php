<?php
/**
 * LICENCE D’UTILISATION RESTREINTE
 *
 * Ce programme et son code source sont la propriété exclusive de Vladislav Razyvika.
 * Aucune utilisation, reproduction, modification, distribution ou exploitation commerciale ne sont autorisées sans un accord écrit préalable.
 * Toute violation pourra donner lieu à des poursuites conformément aux lois sur le droit d’auteur en vigueur.
 */

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Cors
{
    /**
     * Gère la requête entrante en ajoutant les en-têtes CORS.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Définition des en-têtes CORS communs pour toutes les méthodes HTTP
        $corsHeaders = [
            'Access-Control-Allow-Origin'  => '*',
            'Access-Control-Allow-Methods' => 'GET, POST, PUT, DELETE, PATCH, OPTIONS',
            'Access-Control-Allow-Headers' => 'Content-Type, Authorization, X-Requested-With',
        ];

        // Si la méthode est OPTIONS (requête préflight), renvoyer immédiatement une réponse avec les en-têtes
        if ($request->isMethod('OPTIONS')) {
            return response()->json('OK', Response::HTTP_OK, $corsHeaders);
        }

        // Pour les autres méthodes (GET, POST, PUT, DELETE, PATCH, etc.), traiter la requête normalement
        $response = $next($request);

        // Ajouter les en-têtes CORS à la réponse
        foreach ($corsHeaders as $header => $value) {
            $response->headers->set($header, $value);
        }

        return $response;
    }
}
