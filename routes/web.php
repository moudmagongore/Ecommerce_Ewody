<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


//Connexion
Route::get('/connexion', 'Auth\loginController@getLogin')->name('connexion');

Route::post('connexion', 'Auth\loginController@postLogin');

Route::get('statut/{id}', 'Auth\RegisterController@getStatut')->name('statut');
//END CONNEXION




Route::group([

		'middleware' => 'App\Http\Middleware\Auth',

], function(){


	
Route::get('/listuser', 'Auth\RegisterController@index')->name('listuser')->middleware('can:voir-page-admin');
Route::get('/adduser', 'Auth\RegisterController@add')->name('adduser')->middleware('can:voir-page-admin');
Route::post('/storeuser', 'Auth\RegisterController@store')->name('storeuser')->middleware('can:voir-page-admin');


Route::post('/archiveuser/{id}', 'Auth\RegisterController@archiver')->name('archiveuser')->middleware('can:voir-page-admin');
Route::post('/updateuser/{id}', 'Auth\RegisterController@update')->name('updateuser')->middleware('can:voir-page-admin');


Route::get('/profile', 'Frontend\AccueilController@get_profile_page')->name('profile');
Route::post('/modifierprofile', 'Auth\RegisterController@updatet')->name('modifierprofile');

Route::get('/moncompte', 'Frontend\AccueilController@get_mon_compte_page')->name('moncompte');


Route::get('deconnexion', 'Administration\DeconnexionController@deconnexion')->name('deconnexion');

Route::get('/listproduit','produit\ProduitController@index')->name('listproduit')->middleware('can:voir-page-produit');
Route::get('/ajoutproduit','produit\ProduitController@create')->name('ajoutproduit')->middleware('can:voir-page-produit');
Route::post('/storeproduit','produit\ProduitController@store')->name('storeproduit')->middleware('can:voir-page-produit');
Route::post('/deleteproduit/{id}','produit\ProduitController@destroy')->name('deleteproduit')->middleware('can:voir-page-produit');
Route::post('/updateproduit/{id}','produit\ProduitController@update')->name('updateproduit')->middleware('can:voir-page-produit');
Route::post('addphoto', 'produit\PhotoController@store')->name('addphoto')->middleware('can:voir-page-produit');
Route::get('addimage', 'produit\PhotoController@create')->name('addimage')->middleware('can:voir-page-produit');



Route::get('/listclient','Client\ClientController@index')->name('listclient');
Route::post('/storeclient', 'Client\ClientController@store')->name('storeclient');
Route::post('/updateclient/{id}', 'Client\ClientController@update')->name('updateclient');
Route::post('/deleteclient/{id}', 'Client\ClientController@archiver')->name('deleteclient');

Route::get('/listfournisseur', 'Fournisseur\FournisseurController@index')->name('listfournisseur');
Route::get('/addfournisseur','fournisseur\FournisseurController@create')->name('addfournisseur');
Route::post('/storefournisseur','fournisseur\FournisseurController@store')->name('storefournisseur');
Route::post('/updatefournisseur/{id}', 'fournisseur\FournisseurController@update')->name('updatefournisseur');
Route::post('/deletefournisseur/{id}', 'fournisseur\FournisseurController@destroy')->name('deletefournisseur');
Route::post('/archivefournisseur/{id}', 'fournisseur\FournisseurController@archiver')->name('archivefournisseur');

Route::post('/deleteprivillege/{id}', 'Administration\PrivillegeController@destroy')->name('deleteprivillege');
Route::post('/updateprivillege/{id}', 'Administration\PrivillegeController@update')->name('updateprivillege');
Route::post('/storeprivillege','Administration\PrivillegeController@store')->name('storeprivillege');
Route::get('/listprivillege', 'Administration\PrivillegeController@index')->name('listprivillege');

Route::post('/storecategorie','Categorie\CategorieController@store')->name('storecategorie');
Route::get('/listcategorie', 'Categorie\CategorieController@index')->name('listcategorie');
Route::post('/updatecategorie/{id}','Categorie\CategorieController@update')->name('updatecategorie');
Route::post('/deletecategorie/{id}','Categorie\CategorieController@destroy')->name('deletecategorie');

Route::post('/storetype','Categorie\SouscategorieController@store')->name('storetype');
Route::post('/updatesous_cat/{id}','Categorie\SouscategorieController@update')->name('updatetype');
Route::post('/delete_sous/{id}','Categorie\SouscategorieController@destroy')->name('deletetype');

Route::post('/storecaracteristique','Categorie\CaracteristiqueController@store')->name('storecaracteristique');
Route::post('/updatecaracteristique/{id}','Categorie\CaracteristiqueController@update')->name('updatecaracteristique');
Route::post('/deletecaracteristique/{id}','Categorie\CaracteristiqueController@destroy')->name('deletecaracteristique');

Route::post('/storelivraison', 'Livraison\LivraisonController@store')->name('storelivraison');
Route::get('/listlivraison', 'Livraison\LivraisonController@index')->name('listlivraison');
Route::post('/updatelivraison/{id}', 'Livraison\LivraisonController@update')->name('updatelivraison');
Route::post('/deletelivraison/{id}', 'Livraison\LivraisonController@archiver')->name('deletelivraison');


Route::get('/listcommande','commande\CommandeController@index')->name('listcommande');

Route::get('statut-commande/{id}', 'commande\CommandeController@getStatutCommande')->name('statut.commande');



/*Route coupon*/
Route::get('list-coupon',  'Coupon\CouponsController@index')->name('list-coupon');

Route::post('add-coupon',  'Coupon\CouponsController@postAddCoupon')->name('add-coupon');

Route::post('edit-coupon\{id}','Coupon\CouponsController@postEditCoupon')->name('edit-coupon');

Route::post('destroy-coupon\{id}',  'Coupon\CouponsController@destroyCoupon')->name('destroy-coupon');
/*End Route coupon*/






Route::get('checkout', 'Cart\CheckoutController@index')->name('checkout');
Route::post('checkout', 'Cart\CheckoutController@store')->name('checkout.store');





});


Route::get('/acceuil', 'Frontend\AccueilController@index')->name('acceuil');



Route::get('detailcategorie', 'Frontend\AccueilController@get_detail_categorie')->name('detailcategorie');





Route::get('/commandes', 'Frontend\AccueilController@get_mescommandes_page')->name('commandes');

Route::get('/favoris', 'Frontend\AccueilController@get_favori_page')->name('favoris');

Route::get('/inscrire', 'Frontend\AccueilController@inscription')->name('inscrire');
Route::post('/storeinscription', 'Frontend\AccueilController@storeInscription')->name('store-inscription');


Route::view('/base', 'templateadmin.layouts.app');


Route::get('/categories', 'Frontend\AccueilController@allcategories')->name('categories');
Route::get('/produits', 'Frontend\AccueilController@allproduits')->name('produits');

/*Route::get('/connexion', 'Frontend\AccueilController@get_connexion_page')->name('connexion');
*/



Route::get('/details/{id}', 'Frontend\AccueilController@get_details_page')->name('details');

Route::get('/inscription', 'Frontend\Auth\RegisterController@store')->name('inscription');




/*Shopping Cart*/
Route::post('/panier/ajouter', 'Cart\CartController@store')->name('cart.store');

//route pour la quantite
Route::put('/panier/{rowId}', 'Cart\CartController@update')->name('cart.update');

Route::get('/panier', 'Cart\CartController@index')->name('cart.index');

Route::delete('/panier/{rowId}', 'Cart\CartController@destroy')->name('cart.destroy');


Route::post('coupon', 'Cart\CartController@storeCoupon')->name('cart.store.coupon');
Route::delete('coupon', 'Cart\CartController@destroyCoupon')->name('cart.destroy.coupon');



Route::get('merci', 'Cart\CheckoutController@merci')->name('checkout.merci');


Route::get('/videpanier', function(){
	Cart::destroy();
});
/*End Shopping Cart*/

