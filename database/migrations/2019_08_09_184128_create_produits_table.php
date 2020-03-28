<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProduitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produits', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('fournisseur_id');
            $table->string('nom');
            $table->string('description');
            $table->string('marque');
            $table->double('prix_unitaire');
            $table->double('prix_maximum');
            $table->date('date_dexpiration'); 
            $table->integer('quantite');
            $table->string('chemin');
            $table->string('titre_video');
            $table->string('photo');
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
        Schema::dropIfExists('produits');
    }
}
