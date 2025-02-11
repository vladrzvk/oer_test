/**
 * LICENCE D’UTILISATION RESTREINTE
 *
 * Ce programme et son code source sont la propriété exclusive de Vladislav Razyvika.
 * Aucune utilisation, reproduction, modification, distribution ou exploitation commerciale ne sont autorisées sans un accord écrit préalable.
 * Toute violation pourra donner lieu à des poursuites conformément aux lois sur le droit d’auteur en vigueur.
 */
import React, { useState, FormEvent } from 'react';

export interface SimulationData {
  capital: number;
  rate: number;
  years: number;
  result: number;
}

interface SimulationFormProps {
  onResult: (result: SimulationData) => void;
}

const SimulationForm: React.FC<SimulationFormProps> = ({ onResult }) => {
  const [capital, setCapital] = useState<string>('');
  const [rate, setRate] = useState<string>('');
  const [years, setYears] = useState<string>('');
  const [error, setError] = useState<string | null>(null);

  const handleSubmit = async (e: FormEvent<HTMLFormElement>) => {
    e.preventDefault();

    const payload = {
      capital: parseFloat(capital),
      rate: parseFloat(rate),
      years: parseInt(years, 10)
    };

    try {
      const response = await fetch('http://localhost:8000/api/simulate-interest', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify(payload)
      });
      const data = await response.json();

      if (!response.ok) {
        setError(data.message || 'Erreur lors de la simulation');
        return;
      }

      onResult(data);
      setError(null);
    } catch (err) {
      setError('Erreur réseau');
    }
  };

  return (
    <div className="max-w-lg mx-auto mt-8 p-6 bg-eorgray rounded shadow">
      <h2 className="text-2xl font-bold text-eorblue mb-4">Simulation d'Intérêts Composés</h2>
      {error && <div className="mb-4 p-2 bg-red-200 text-red-800 rounded">{error}</div>}
      <form onSubmit={handleSubmit}>
        <div className="mb-4">
          <label className="block mb-1">Capital Initial (€)</label>
          <input
            type="number"
            step="0.01"
            className="w-full p-2 border rounded"
            value={capital}
            onChange={(e) => setCapital(e.target.value)}
            required
          />
        </div>
        <div className="mb-4">
          <label className="block mb-1">Taux d'Intérêt (%)</label>
          <input
            type="number"
            step="0.01"
            className="w-full p-2 border rounded"
            value={rate}
            onChange={(e) => setRate(e.target.value)}
            required
          />
        </div>
        <div className="mb-4">
          <label className="block mb-1">Durée (années)</label>
          <input
            type="number"
            className="w-full p-2 border rounded"
            value={years}
            onChange={(e) => setYears(e.target.value)}
            required
          />
        </div>
        <button type="submit" className="w-full py-2 px-4 bg-eorblue text-white rounded hover:bg-eorlight">
          Calculer
        </button>
      </form>
    </div>
  );
};

export default SimulationForm;