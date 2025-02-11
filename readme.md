# Simulation d'Intérêts Composés - Projet Full-Stack

Ce projet propose une simulation simplifiée d'intérêts composés avec :

- **Back-End (Laravel 8)**
  - Une API REST avec un endpoint POST `/api/simulate-interest` pour simuler les intérêts composés.
  - Validation des paramètres via `SimulationRequest`.
  - Calcul effectué par `SimulationService`.
  - (Bonus) Enregistrement et consultation des simulations via le modèle `Simulation`.

- **Front-End (React JS avec Tailwind CSS)**
  - Un formulaire pour saisir le capital, le taux et la durée.
  - Affichage du résultat via un composant.
  - Mise en forme avec Tailwind CSS et une palette graphique inspirée du logo fourni ([Voir logo](https://www.eor.fr/wp-content/uploads/2018/11/eor-symbole-100px.jpg)).

## Instructions de Lancement

### Back-End (Laravel)
1. Installer les dépendances : `composer install`
2. Configurer le fichier `.env`
3. Lancer les migrations : `php artisan migrate`
4. Démarrer le serveur : `php artisan serve`

### Front-End (React)
1. Installer les dépendances : `npm install`
2. Installer Tailwind CSS (si non déjà présent) :
   - `npm install tailwindcss postcss autoprefixer`
   - Générer le fichier de configuration : `npx tailwindcss init -p`
3. Lancer l’application : `npm start`

## Licence

### LICENCE D’UTILISATION RESTREINTE

Ce programme et son code source sont la propriété exclusive de Vladislav Razyvika.  
Aucune utilisation, reproduction, modification, distribution ou exploitation commerciale ne sont autorisées sans un accord écrit préalable.  
Toute violation pourra donner lieu à des poursuites conformément aux lois sur le droit d’auteur en vigueur.
