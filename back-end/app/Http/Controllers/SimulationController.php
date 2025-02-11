<?php
/**
 * LICENCE D’UTILISATION RESTREINTE
 *
 * Ce programme et son code source sont la propriété exclusive de Vladislav Razyvika.
 * Aucune utilisation, reproduction, modification, distribution ou exploitation commerciale ne sont autorisées sans un accord écrit préalable.
 * Toute violation pourra donner lieu à des poursuites conformément aux lois sur le droit d’auteur en vigueur.
 */

namespace App\Http\Controllers;

use App\Http\Requests\SimulationRequest;
use App\Services\SimulationService;
use App\Models\Simulation; // Pour l'extension bonus
use Illuminate\Http\JsonResponse;

class SimulationController extends Controller
{
    /**
     * Service de calcul injecté via le constructeur pour respecter l'injection de dépendance.
     *
     * @var SimulationService
     */
    protected $simulationService;

    /**
     * Constructeur.
     *
     * @param SimulationService $simulationService
     */
    public function __construct(SimulationService $simulationService)
    {
        $this->simulationService = $simulationService;
    }

    /**
     * Gère la simulation de l'intérêt composé.
     *
     * @param SimulationRequest $request
     * @return JsonResponse
     */
    public function simulateInterest(SimulationRequest $request): JsonResponse
    {
        // Récupération des paramètres validés
        $data = $request->validated();

        // Calcul de l'intérêt composé
        $result = $this->simulationService->calculateCompoundInterest($data['capital'], $data['rate'], $data['years']);

        // (Extension Bonus) Enregistrement de la simulation en base de données
        Simulation::create([
            'capital' => $data['capital'],
            'rate'    => $data['rate'],
            'years'   => $data['years'],
            'result'  => round($result, 2),
        ]);

        // Retourne le résultat sous forme de JSON
        return response()->json([
            'capital' => $data['capital'],
            'rate'    => $data['rate'],
            'years'   => $data['years'],
            'result'  => round($result, 2)
        ]);
    }

    /**
     * (Extension Bonus) Retourne la liste de toutes les simulations enregistrées.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $simulations = Simulation::all();
        return response()->json($simulations);
    }
}
