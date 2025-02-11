/**
 * LICENCE D’UTILISATION RESTREINTE
 *
 * Ce programme et son code source sont la propriété exclusive de Vladislav.
 * Aucune utilisation, reproduction, modification, distribution ou exploitation commerciale ne sont autorisées sans un accord écrit préalable.
 * Toute violation pourra donner lieu à des poursuites conformément aux lois sur le droit d’auteur en vigueur.
 */
import React, { useState } from 'react';
import SimulationForm, { SimulationData } from './composents/SimulationForm';
import SimulationResult from './composents/SimulationResult';

const App: React.FC = () => {
  const [simulationResult, setSimulationResult] = useState<SimulationData | null>(null);

  return (
    <div className="min-h-screen bg-white">
      <SimulationForm onResult={setSimulationResult} />
      <SimulationResult result={simulationResult} />
      {/* Extension Bonus : Un composant pour afficher l'historique des simulations peut être ajouté ici */}
    </div>
  );
};

export default App;