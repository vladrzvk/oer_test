<?php
/**
 * LICENCE D’UTILISATION RESTREINTE
 *
 * Ce programme et son code source sont la propriété exclusive de Vladislav Razyvika.
 * Aucune utilisation, reproduction, modification, distribution ou exploitation commerciale ne sont autorisées sans un accord écrit préalable.
 * Toute violation pourra donner lieu à des poursuites conformément aux lois sur le droit d’auteur en vigueur.
 */

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SimulationRequest extends FormRequest
{
    /**
     * Autorise toutes les requêtes pour cet exemple.
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Définit les règles de validation pour les paramètres.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'capital' => 'required|numeric|min:0.01',
            'rate'    => 'required|numeric|min:0.01',
            'years'   => 'required|integer|min:1',
        ];
    }
}
