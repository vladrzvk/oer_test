<?php
/**
 * LICENCE D’UTILISATION RESTREINTE
 *
 * Ce programme et son code source sont la propriété exclusive de Vladislav Razyvika.
 * Aucune utilisation, reproduction, modification, distribution ou exploitation commerciale ne sont autorisées sans un accord écrit préalable.
 * Toute violation pourra donner lieu à des poursuites conformément aux lois sur le droit d’auteur en vigueur.
 */

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SimulationController;

// Endpoint pour simuler l'intérêt composé
Route::post('/api/simulate-interest', [SimulationController::class, 'simulateInterest']);

// (Extension Bonus) Endpoint pour récupérer l'historique des simulations
Route::get('/api/simulations', [SimulationController::class, 'index']);
