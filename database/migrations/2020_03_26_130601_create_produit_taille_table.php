<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProduitTailleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produit_taille', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('produit_id');
            $table->unsignedBigInteger('taille_id');
            $table->integer('quantite');
            $table->integer('designation');
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
        Schema::dropIfExists('produit_taille');
    }
}
