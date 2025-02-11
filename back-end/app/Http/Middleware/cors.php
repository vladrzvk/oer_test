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
        // Si c'est une requête OPTIONS (préflight), on renvoie directement une réponse vide avec les en-têtes CORS
        if ($request->getMethod() === 'OPTIONS') {
            return response('', Response::HTTP_OK)
                ->header('Access-Control-Allow-Origin', '*')
                ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS')
                ->header('Access-Control-Allow-Headers', 'Content-Type, Authorization');
        }

        // Pour les autres requêtes, on laisse le middleware suivant traiter la requête
        $response = $next($request);

        // Ajout des en-têtes CORS à la réponse
        $response->header('Access-Control-Allow-Origin', '*')
                 ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS')
                 ->header('Access-Control-Allow-Headers', 'Content-Type, Authorization');

        return $response;
    }
}
