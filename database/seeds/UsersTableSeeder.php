<?php

use Illuminate\Database\Seeder;

use App\models\Privillege;
use App\User;
Use Illuminate\Support\Facades\DB;
Use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //vider la table user 
      	 User::truncate();

        //supprimer la relation ou les roles
       DB::table('privillege_user')->truncate();

        //quest ce quon veut quant on tape php artisan db:seed nous  ce quon veut ces créer des utilisateurs
        $admin = User::create([
            'name' => 'Administrateur',
            'telephone' => '621785645',
            'email' => 'administrateur@gmail.com',
        	'password' => Hash::make('admin')
        ]);

        $utilisateur = User::create([
            'name' => 'Utilisateur',
            'telephone' => '666054168',
            'email' => 'utilisateur@gmail.com',
        	'password' => Hash::make('utilisateur')
        ]);

        //On recuperer les roles dans la table roles
         $adminRole = Privillege::where('designation_privillege',  'Administrateur')->first();

         $utilisateurRole = Privillege::where('designation_privillege',  'utilisateur')->first();


         //Et en suite on attache les roles a nos utilisateur créer en hauts
         $admin->privilleges()->attach($adminRole);
         $utilisateur->privilleges()->attach($utilisateurRole);
    }
}
