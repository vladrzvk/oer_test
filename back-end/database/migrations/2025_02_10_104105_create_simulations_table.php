<?php
/**
 * LICENCE D’UTILISATION RESTREINTE
 *
 * Ce programme et son code source sont la propriété exclusive de Vladislav Razyvika.
 * Aucune utilisation, reproduction, modification, distribution ou exploitation commerciale ne sont autorisées sans un accord écrit préalable.
 * Toute violation pourra donner lieu à des poursuites conformément aux lois sur le droit d’auteur en vigueur.
 */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSimulationsTable extends Migration
{
    /**
     * Exécuter les migrations.
     */
    public function up()
    {
        Schema::create('simulations', function (Blueprint $table) {
            $table->id();
            $table->decimal('capital', 15, 2);
            $table->decimal('rate', 5, 2);
            $table->integer('years');
            $table->decimal('result', 15, 2);
            $table->timestamps();
        });
    }

    /**
     * Annuler les migrations.
     */
    public function down()
    {
        Schema::dropIfExists('simulations');
    }
}
