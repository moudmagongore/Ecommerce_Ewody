<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCouleurProduitTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('couleur_produit', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('produit_id');
            $table->unsignedBigInteger('couleur_id');
            $table->string('images');
            $table->integer('quantite');
             /*$table->integer('quantite');*/
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('couleur_produit');
    }
}
