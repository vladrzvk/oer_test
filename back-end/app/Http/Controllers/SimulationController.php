<?php
/**
 * LICENCE D’UTILISATION RESTREINTE
 *
 * Ce programme et son code source sont la propriété exclusive de Vladislav Razyvika.
 * Aucune utilisation, reproduction, modification, distribution ou exploitation commerciale ne sont autorisées sans un accord écrit préalable.
 * Toute violation pourra donner lieu à des poursuites conformément aux lois sur le droit d’auteur en vigueur.
 */

namespace App\Http\Controllers;

use App\Models\Simulation;
use App\Services\SimulationService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class SimulationController extends Controller
{
    protected SimulationService $simulationService;

    /**
     * Injection du service via le constructeur.
     *
     * @param SimulationService $simulationService
     */
    public function __construct(SimulationService $simulationService)
    {
        $this->simulationService = $simulationService;
    }

    /**
     * Calcule l'intérêt composé et enregistre la simulation.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function simulateInterest(Request $request): JsonResponse
    {
        try {
            $data = $request->json()->all();

            if (!isset($data['capital'], $data['rate'], $data['years'])) {
                return response()->json(['message' => 'Données manquantes'], 422);
            }

            $result = $this->simulationService->calculateCompoundInterest(
                (float)$data['capital'],
                (float)$data['rate'],
                (int)$data['years']
            );

            // Enregistrement de la simulation dans la base de données
            Simulation::create([
                'capital' => $data['capital'],
                'rate'    => $data['rate'],
                'years'   => $data['years'],
                'result'  => $result,
            ]);

            return response()->json([
                'capital' => $data['capital'],
                'rate'    => $data['rate'],
                'years'   => $data['years'],
                'result'  => $result,
            ]);
        } catch (\Exception $e) {
            \Log::error('Erreur dans simulateInterest : ' . $e->getMessage());
            return response()->json(['message' => 'Erreur interne du serveur'], 500);
        }
    }

    /**
     * Retourne l'historique des simulations.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        try {
            $simulations = Simulation::all();
            return response()->json($simulations);
        } catch (\Exception $e) {
            \Log::error('Erreur dans index : ' . $e->getMessage());
            return response()->json(['message' => 'Erreur interne du serveur'], 500);
        }
    }
}
