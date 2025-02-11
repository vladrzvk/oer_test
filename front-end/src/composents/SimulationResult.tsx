/**
 * LICENCE D’UTILISATION RESTREINTE
 *
 * Ce programme et son code source sont la propriété exclusive de Vladislav Razyvika.
 * Aucune utilisation, reproduction, modification, distribution ou exploitation commerciale ne sont autorisées sans un accord écrit préalable.
 * Toute violation pourra donner lieu à des poursuites conformément aux lois sur le droit d’auteur en vigueur.
 */
import React from 'react';
import { SimulationData } from './SimulationForm';

interface SimulationResultProps {
  result: SimulationData | null;
}

const SimulationResult: React.FC<SimulationResultProps> = ({ result }) => {
  if (!result) return null;

  return (
    <div className="max-w-lg mx-auto mt-8 p-6 bg-eorgray rounded shadow">
      <h3 className="text-xl font-bold text-eorblue mb-4">Résultat de la Simulation</h3>
      <p className="text-gray-700">
        <span className="font-semibold">Capital :</span> {result.capital} €<br />
        <span className="font-semibold">Taux :</span> {result.rate} %<br />
        <span className="font-semibold">Durée :</span> {result.years} années<br />
        <span className="font-semibold">Résultat :</span> {result.result} €
      </p>
    </div>
  );
};

export default SimulationResult;