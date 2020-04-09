<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TableForeign extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table("produits", function(Blueprint $table){
            $table->foreign('fournisseur_id')->references('id')->on('fournisseurs')->onDelete('cascade');
        });



        Schema::table("sous_categories", function(Blueprint $table){
            $table->foreign('categorie_id')->references('id')->on('categorie')->onDelete('cascade');
        });


        Schema::table("images", function(Blueprint $table){
            $table->foreign('produit_id')->references('id')->on('produits')->onDelete('cascade');
        });


        Schema::table("livraisons", function(Blueprint $table){
            $table->foreign('commande_id')->references('id')->on('commandes')->onDelete('cascade');
        });


        Schema::table("avis", function(Blueprint $table){
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->foreign('produit_id')->references('id')->on('produits')->onDelete('cascade');
        });


        Schema::table("feedbacks", function(Blueprint $table){
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            
            $table->foreign('raison_refus_id')->references('id')->on('raisons_refus')->onDelete('cascade');
        });


         Schema::table("commandes", function(Blueprint $table){
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });

          Schema::table("favoris", function(Blueprint $table){
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->foreign('produit_id')->references('id')->on('produits')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
