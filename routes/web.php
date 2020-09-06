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
/*login facebook*/
Route::get('auth/{provider}', 'Auth\SocialesController@redirectToProvider');
Route::get('auth/{provider}/callback','Auth\SocialesController@handleProviderCallback');
/*End login facebook*/



Route::get('/connexion', 'Auth\LoginController@getLogin')->name('connexion');

Route::post('connexion', 'Auth\LoginController@postLogin');

Route::get('statut/{id}', 'Auth\RegisterController@getStatut')->name('statut');
//END CONNEXION




Route::group([

		'middleware' => 'App\Http\Middleware\Auth',

], function(){

Route::get('/accueil', 'Administration\DeconnexionController@accueil')->name('accueil.back');

	
Route::get('/listuser', 'Auth\RegisterController@index')->name('listuser')->middleware('can:voir-page-admin');
Route::get('/adduser', 'Auth\RegisterController@add')->name('adduser')->middleware('can:voir-page-admin');
Route::post('/storeuser', 'Auth\RegisterController@store')->name('storeuser')->middleware('can:voir-page-admin');


Route::post('/archiveuser/{id}', 'Auth\RegisterController@archiver')->name('archiveuser')->middleware('can:voir-page-admin');
Route::post('/updateuser/{id}', 'Auth\RegisterController@update')->name('updateuser')->middleware('can:voir-page-admin');


Route::get('/profile', 'Frontend\AccueilController@get_profile_page')->name('profile');
Route::post('/modifierprofile', 'Auth\RegisterController@updatet')->name('modifierprofile');

Route::get('/moncompte', 'Frontend\AccueilController@get_mon_compte_page')->name('moncompte');


Route::get('deconnexion', 'Administration\DeconnexionController@deconnexion')->name('deconnexion');



/*Route produit*/
Route::get('/listproduit','Produit\ProduitController@index')->name('listproduit')->middleware('can:voir-page-admin-vendeur');

Route::get('/ajoutproduit','Produit\ProduitController@create')->name('ajoutproduit')->middleware('can:voir-page-admin-vendeur');

Route::post('/storeproduit','Produit\ProduitController@store')->name('storeproduit')->middleware('can:voir-page-admin-vendeur');

Route::post('/deleteproduit/{id}','Produit\ProduitController@destroy')->name('deleteproduit')->middleware('can:voir-page-admin-vendeur');

Route::post('/updateproduit/{id}','Produit\ProduitController@update')->name('updateproduit')->middleware('can:voir-page-admin-vendeur');
/*Route produit*/





/*Route industrie*/
Route::post('store-industrie','Industries\IndustrieController@storeIndustrie')->name('store.industrie');
/*End Route industrie*/









Route::post('addphoto', 'Produit\PhotoController@store')->name('addphoto')->middleware('can:voir-page-admin-vendeur');
Route::get('addimage', 'Produit\PhotoController@create')->name('addimage')->middleware('can:voir-page-admin-vendeur');



Route::get('/listclient','Client\ClientController@index')->name('listclient');
Route::post('/storeclient', 'Client\ClientController@store')->name('storeclient');
Route::post('/updateclient/{id}', 'Client\ClientController@update')->name('updateclient');
Route::post('/deleteclient/{id}', 'Client\ClientController@archiver')->name('deleteclient');

Route::get('/listfournisseur', 'Fournisseur\FournisseurController@index')->name('listfournisseur')->middleware('can:voir-page-admin');
Route::get('/addfournisseur','fournisseur\FournisseurController@create')->name('addfournisseur')->middleware('can:voir-page-admin');
Route::post('/storefournisseur','fournisseur\FournisseurController@store')->name('storefournisseur')->middleware('can:voir-page-admin');
Route::post('/updatefournisseur/{id}', 'fournisseur\FournisseurController@update')->name('updatefournisseur')->middleware('can:voir-page-admin');
Route::post('/deletefournisseur/{id}', 'fournisseur\FournisseurController@destroy')->name('deletefournisseur')->middleware('can:voir-page-admin');
Route::post('/archivefournisseur/{id}', 'fournisseur\FournisseurController@archiver')->name('archivefournisseur')->middleware('can:voir-page-admin');

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

Route::post('/storelivraison', 'Livraison\LivraisonController@store')->name('storelivraison')->middleware('voir-page-admin-vendeur');
Route::get('/listlivraison', 'Livraison\LivraisonController@index')->name('listlivraison')->middleware('voir-page-admin-vendeur');
Route::post('/updatelivraison/{id}', 'Livraison\LivraisonController@update')->name('updatelivraison')->middleware('voir-page-admin-vendeur');
Route::post('/deletelivraison/{id}', 'Livraison\LivraisonController@archiver')->name('deletelivraison')->middleware('voir-page-admin-vendeur');


Route::get('/listcommande','commande\CommandeController@index')->name('listcommande')->middleware('can:voir-page-admin-vendeur');

//modifier statut de la commande par back end
Route::post('/modifier-statut/{id}','commande\CommandeController@modifierStatut')->name('modifier.statut')->middleware('can:voir-page-admin-vendeur');
//End modifier statut de la commande par back end


//modifier statut de la commande Par user
Route::post('modif-statut-commande-user/{id}', 'commande\CommandeController@modifStatutCommandeUser')->name('modif.statut.commande.user');

Route::get('nom-modif/{id}', 'commande\CommandeController@nonModif')->name('non.modif');
//End modifier statut de la commande Par user



/*Route coupon*/
Route::get('list-coupon',  'Coupon\CouponsController@index')->name('list-coupon')->middleware('can:voir-page-admin');

Route::post('add-coupon',  'Coupon\CouponsController@postAddCoupon')->name('add-coupon')->middleware('can:voir-page-admin');

Route::post('edit-coupon\{id}','Coupon\CouponsController@postEditCoupon')->name('edit-coupon')->middleware('can:voir-page-admin');

Route::post('destroy-coupon\{id}',  'Coupon\CouponsController@destroyCoupon')->name('destroy-coupon')->middleware('can:voir-page-admin');
/*End Route coupon*/


/*Route couleurs*/
Route::post('couleurs', 'Couleurs\CouleursController@store')->name('couleurs')->middleware('can:voir-page-admin-vendeur');

Route::post('couleurs-edit\{id}', 'Couleurs\CouleursController@postCouleur')->name('couleurs.edit')->middleware('can:voir-page-admin-vendeur');

Route::post('destroy-couleur\{id}', 'Couleurs\CouleursController@destroyCouleur')->name('destroy.couleur')->middleware('can:voir-page-admin-vendeur');
/*Route couleurs*/





/*Route couleurs*/
Route::post('tailles', 'Tailles\TaillesController@store')->name('tailles')->middleware('can:voir-page-admin-vendeur');

Route::post('tailles-edit\{id}', 'Tailles\TaillesController@postTailles')->name('tailles.edit')->middleware('can:voir-page-admin-vendeur');

Route::post('destroy-tailles\{id}', 'Tailles\TaillesController@destroyTailles')->name('destroy.tailles')->middleware('can:voir-page-admin-vendeur');
/*Route couleurs*/





/*Route pour enregistrer les info de livraison d'une personne connecté*/
Route::get('checkout', 'Cart\CheckoutController@index')->name('checkout');
Route::get('checkout-achat', 'Cart\CheckoutController@indexAchat')->name('checkout.achat');

/*.................*/
/*End Route pour enregistrer les info de livraison*/



/*Route favoris*/
Route::get('/favoris', 'Favoris\FavorisController@index')->name('favoris');
Route::get('/favoris/{id}', 'Favoris\FavorisController@store')->name('favoris.store');

Route::post('destroy-favoris/{id}', 'Favoris\FavorisController@destroyFavoris')->name('destroy.favoris');
/*End Route favoris*/



/*Route Avis*/
Route::post('avis-store/{id}', 'Avis\AvisController@storeAvis')->name('store.avis');
/*End Route Avis*/



Route::get('/commandes', 'Frontend\AccueilController@get_mescommandes_page')->name('commandes');



});


/*Route pour enregistrer les info de livraison d'un invité*/
Route::get('checkout-invite', 'Cart\CheckoutController@getCheckoutInvite')->name('checkout.invite');

Route::get('checkout-achat-invite', 'Cart\CheckoutController@indexAchatInvite')->name('checkout.achatInvite');
/*Route pour enregistrer les info de livraison d'un client connecté et invité car dans le middleware Auth il ns oblige a se connecté*/
Route::post('checkout', 'Cart\CheckoutController@store')->name('checkout.store');
/*End Route pour enregistrer les info de livraison d'un invité*/


Route::get('/', 'Frontend\AccueilController@index')->name('acceuil');



Route::get('detailcategorie', 'Frontend\AccueilController@get_detail_categorie')->name('detailcategorie');


Route::get('details-industrie/{id}', 'Frontend\AccueilController@get_detail_industrie')->name('detailindustrie');

/*Route pour les categories sans passer l'id*/
Route::get('/categories', 'Frontend\AccueilController@allcategories')->name('allcategories');
/*End Route pour les categories sans passer l'id*/















Route::get('/inscrire', 'Frontend\AccueilController@inscription')->name('inscrire');
Route::post('/storeinscription', 'Frontend\AccueilController@storeInscription')->name('store-inscription');


Route::view('/base', 'templateadmin.layouts.app');



Route::get('/produits', 'Frontend\AccueilController@allproduits')->name('produits');

/*Route::get('/connexion', 'Frontend\AccueilController@get_connexion_page')->name('connexion');
*/



Route::get('/details/{id}', 'Frontend\AccueilController@get_details_page')->name('details');

Route::get('/inscription', 'Frontend\Auth\RegisterController@store')->name('inscription');



Route::post('acheter', 'Cart\CartController@acheter')->name('acheter');

/*Shopping Cart*/
Route::post('/panier/ajouter', 'Cart\CartController@store')->name('cart.store');


//route pour la quantite
Route::put('/panier/{rowId}', 'Cart\CartController@update')->name('cart.update');

/*Route::put('/updatequantitetaille/{id}', 'Cart\CartController@quantite')->name('cart.quantite');
*/

Route::get('/panier', 'Cart\CartController@index')->name('cart.index');

Route::delete('/panier/{rowId}', 'Cart\CartController@destroy')->name('cart.destroy');




Route::post('coupon', 'Cart\CartController@storeCoupon')->name('cart.store.coupon');
Route::delete('coupon', 'Cart\CartController@destroyCoupon')->name('cart.destroy.coupon');



Route::get('merci', 'Cart\CheckoutController@merci')->name('checkout.merci');


Route::get('/videpanier', function(){
	Cart::destroy();
});
/*End Shopping Cart*/



/*Route pour les pages*/
Route::get('contact', 'Frontend\AccueilController@contact')->name('contact');
Route::get('apropos', 'Frontend\AccueilController@apropos')->name('apropos');
Route::get('faq', 'Frontend\AccueilController@faq')->name('faq');

/*End Route pour les pages*/



/*Route pour la recherche*/
Route::get('search', 'Search\SearchController@search')->name('search');
/*End Route pour la recherche*/


/*Route pour eviter d'acheter un produit qui n'existe pas*/
Route::get('produit-non-existe', 'Cart\CheckoutController@produitNonExiste')->name('produit-non-existe');
/*End Route pour eviter d'acheter un produit qui n'existe pas*/




