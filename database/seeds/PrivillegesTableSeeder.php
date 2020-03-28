<?php

use Illuminate\Database\Seeder;
use App\models\Privillege;

class PrivillegesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         //supprimer ou vider les données de la  table privellege
       Privillege::truncate();

        //quest ce quon veut quant on tape php artisan db:seed nous  ce quon veut ces créer des roles
       Privillege::create(['designation_privillege' => 'Administrateur']);
       Privillege::create(['designation_privillege' => 'Utilisateur']);
    }
}
