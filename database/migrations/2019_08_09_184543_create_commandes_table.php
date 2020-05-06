<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommandesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commandes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('commande_id');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->text('produits');
            $table->string('name');
            $table->string('telephone');
            $table->string('email')->nullable();
            $table->string('ville');
            $table->string('quartier');
            $table->string('lieuProche');
            $table->date('date_commande')->nullable();
            $table->double('montant');
            $table->date('date_echeance')->nullable();
            $table->string('statut');
            $table->date('date_livraison');
            
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
        Schema::dropIfExists('commandes');
    }
}
