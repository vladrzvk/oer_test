<?php
/**
 * LICENCE D’UTILISATION RESTREINTE
 *
 * Ce programme et son code source sont la propriété exclusive de Vladislav Razyvika.
 * Aucune utilisation, reproduction, modification, distribution ou exploitation commerciale ne sont autorisées sans un accord écrit préalable.
 * Toute violation pourra donner lieu à des poursuites conformément aux lois sur le droit d’auteur en vigueur.
 */

namespace App\Services;

class SimulationService
{
    /**
     * Calcule l'intérêt composé.
     *
     * @param float $capital Le capital initial
     * @param float $rate Le taux d'intérêt annuel en pourcentage
     * @param int $years Le nombre d'années
     * @return float Le résultat du calcul
     */
    public function calculateCompoundInterest(float $capital, float $rate, int $years): float
    {
        // Formule: capital * (1 + rate/100)^years
        return $capital * pow(1 + ($rate / 100), $years);
    }
}
