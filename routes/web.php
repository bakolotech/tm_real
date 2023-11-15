<?php

use App\Http\Controllers\CaracteristiqueController;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\FirebaseController;
use App\Http\Controllers\ForgotPasswordController2;
use App\Http\Controllers\SendInvitationController;
use App\Http\Controllers\CollaboController;
use App\Http\Controllers\MarchandControllerController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\UserController;
use App\Models\CommandeProcess;
use Illuminate\Http\Request;
use App\Models\Produit;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

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

Route::post('register', 'Auth\RegisterController@register');
Route::post('register_achat', 'Auth\RegisterController@achat_register');
Route::post('nouveau-vendeur', 'UserController@vendeur');
Route::post('connexion', 'UserController@login');
Route::get('profile', 'UserController@profile');
Route::post('profile', 'UserController@update_avatar');

Route::post('/update_temp_user', 'CommandeController@updateUserTemp');  // traite le retour du callback

// message section
Route::post('envoyer_message', 'UserController@send_message');

Route::post('byebye', function (){
    unset($_SESSION['config']);
    unset($_SESSION['favori']);
    \Illuminate\Support\Facades\Auth::logout();
    return redirect('/');
})->name("page_accueil");

Route::get('/', function () {
    
if (\Illuminate\Support\Facades\Auth::check() && !isset($_SESSION['config']['user-logged'])) {
    \Illuminate\Support\Facades\Auth::logout();
    return redirect('/');
}
    return view('front.welcome');
})->name("page_accueil");


Route::get('/forget_password', function () {
    return view('email2.forgetPassword');
});

// Route::get('/tm_game_v2', function() {
//     return view('front.tm_game_v2');
// });

Route::get('/recherche', function () {
    return view('front.app-module.Accueil.recherche-etagere');
});

Route::get('/acceuil-marchand-marchand', function () {
    return view('front.app-module.marchand.acceuil-marchand');
})->name('acceuil-marchand-marchand');

Route::get('/boutique_personnel/{boutique}/{rayon}', 'BoutiqueController@produitVisitors')->name('boutique');

// function(){
//     $valeur_boutique = $_GET['boutique'];
//     return $valeur_boutique;
//     // return view('front.app-module.marchand.boutique-partager.boutique_partager');
// }
// Route::get('/facebook-auth', function () {
//     return Socialite::driver('facebook')->redirect();
// });

// Route::get('/facebook-login', function () {
//     $facebookUser = Socialite::driver('facebook')->user();
//     //dd($facebookUser);
// });

Route::get('/google-auth', 'Auth\SocialiteGoogle@login');
Route::get('/google-login', 'Auth\SocialiteGoogle@redirect');

Route::get('/facebook-auth', 'Auth\SocialiteFacebook@login');
Route::get('/facebook-login', 'Auth\SocialiteFacebook@redirect');

Route::resource('univerAccueil','UniverController');

Route::resource('rayon','RayonController');
Route::get('rayon/{id}/{slug}', 'RayonController@show');

Route::get('produit_detail/{id}', 'ProduitController@show_produit_detail');

Route::get('produit_detail_modif', 'RayonController@show_detail_modif');
Route::get('produit_detail_modif2', 'RayonController@show_detail_modif2');

Route::post('get_user_infos', 'BoutiqueController@userInRayon');
Route::get('remove_user_rayon/{id}', 'ProduitController@removeUserRayon');

Route::resource('etagere','RayonController');

Route::resource('univers','UniverController');
Route::get('univ/{id}/{slug}', 'UniverController@show');
Route::post('univer-load-rayon/{id}', 'UniverController@loadRayon');

Route::post('produit-occasion', 'UniverController@occasion2');
Route::resource('famille','FamilleController');
Route::resource('produit','ProduitController');
Route::post('ajout_produit','ProduitController@store'); //ajouter nouveau produit
Route::get('mode_expedition','ProduitController@getModeExpedition'); //get mode expédition sous_categori
Route::get('mode_expedition_modif','ProduitController@getModeExpeditionModification'); //get mode expedition modification
Route::get('get_single_mode_expedition/{id}', 'ProduitController@getSingleModeExpedition');
Route::Post('sous_categorie_product', 'ProduitController@getCategorieAllProduct');

Route::post('recherche_sous_categorie', 'ProduitController@suggestProduct');
Route::get('rayon_by_univers/{id}', 'UniverController@univerById');
Route::get('produit_sous_categorie_rayon/{id}', 'ProduitController@produitSousCatRayon');  //recuperaction du rayon à laquelle appartient le produit
Route::get('vendre_meme_produit/{id}', 'ProduitController@vendreMemeProduit'); //vendre le meme produit
Route::get('delete_product/{id}', 'ProduitController@suppressionProduit');
Route::get('modifier_produit_marchand/{id}', 'ProduitController@modifierProduitMarchand');
Route::get('/show_detail_produit/{id}', 'ProduitController@show_produit_detail'); // produit details modifier_produit_marchand
Route::get('vendre_meme_produit_caracteristique/{id}', 'ProduitController@vendreMemeProduitCaracteristique');
Route::post('update_produit', 'ProduitController@updateProduit');

// Route::post('get_caracteristique_value', 'ProduitController@getCaracteristique'); //sauvegarde- getCaracteristiqueRayon change_rayon_caracteristiques
Route::post('get_caracteristique_value', 'ProduitController@getCaracteristiqueRayon');
Route::get('change_rayon_caracteristiques', 'ProduitController@getCaracteristiqueRayonChanged');
Route::get('rayon_familles', 'RayonController@getRayonFamille');

Route::post('upload_images', 'ProduitController@photoUpload');
Route::post('/save_produit_images', 'ProduitController@saveProductImages');
Route::post('main-search', 'ProduitController@recherche');
Route::post('/main-search-partage-boutique', 'BoutiqueController@rechercheBoutique');
Route::post('search-from-univ/{id}', 'ProduitController@recherche');
Route::post('search-from-rayon/{id}', 'ProduitController@searchInRayon');
Route::resource('sous-categorie','SousCategorieController');
Route::post('states-list', 'UserController@listProvince');
Route::post('city-list', 'UserController@listVille');
Route::post('change-devise', 'UserController@changeDevise');
Route::post('changer-boutique', 'UserController@changerBoutique');
Route::post('user-config/edit', 'UserController@editConfig');

Route::post('/update-user-profil/{id}','UserController@update');
Route::post('/update-user-profil-email/{id}','UserController@updateEmail');
Route::post('/update-user-profil-password/{id}','UserController@updatePassword');

Route::get('confirmation/{token}/{email}', 'UserController@confirmation');

Route::post('carnet-delete','CarnetAdresseController@destroy');

Route::resource('carnet-adresse','CarnetAdresseController');

Route::resource('notification-config', 'NotificationConfigController');
// routes olivier
Route::get('/carnet-getaddress','CarnetAdresseController@getaddressUser');
Route::post('/update-user-adresse/{id}', 'CarnetAdresseController@UpdateUserAddress');
Route::post('/update-user-credit', 'CarteCreditController@UpdateUserCredit');
Route::post('/add_credit_card', 'CarteCreditController@store');
Route::get('/get_credit_card/{id}', 'CarteCreditController@getUserCard');
Route::get('/get_credit_cardByID/{id}', 'CarteCreditController@getCreditCardbyID');
Route::post('/credit-delete','CarteCreditController@destroy');
Route::post('/add-address-carnet-achat','CarnetAdresseController@store');

// paul route
route::post('coupon', 'PromotionController@store');
route::put('couponUp/{id}','PromotionController@update');
Route::post('panier/promo','CartController@checkpromo')->name('cart.checkpromo');

Route::resource('caracteristique', 'CaracteristiqueController');

Route::get('forget-password', [ForgotPasswordController2::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('forget-password', [ForgotPasswordController2::class, 'submitForgetPasswordForm'])->name('forget.password.post');
Route::get('reset-password/{token}', [ForgotPasswordController2::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('resent-password', [ForgotPasswordController2::class, 'resentPassword'])->name('resent.password.post');

Route::get('firebase-phone-authentication', [FirebaseController::class, 'index']);

//Mes routes

Route::get('panier/ajouter','CartController@ajouter_article')->name('cart.ajouter_article');
Route::get('panier/favori','CartController@store2')->name('cart.store2');
Route::get('panier/favori2','CartController@store2bis')->name('cart.store2bis');
Route::post('/delete_favoris', 'MesFavorisController@deleteFavoris');

Route::get('panier/afficher','CartController@store3')->name('cart.store3');
Route::get('panier/supprimer','CartController@store4')->name('cart.store4');
Route::get('panier/localisation','CartController@store5')->name('cart.store5');
Route::get('panier/panier','CartController@store6')->name('cart.store6');
Route::get('panier/panier_rapide','CartController@store6b')->name('cart.store6b');
Route::get('panier/modifier','CartController@store7')->name('cart.store7');
Route::get('panier/nouvel','CartController@store8')->name('cart.store8');
Route::get('panier/verifier','CartController@store9')->name('cart.store9');

// route paul
Route::get('/collabo2', 'CollaboController@collablist');

// marchand section
Route::get('/marchand-space','MarchandControllerController@allMarchand')->name('marchand-space');
Route::post('vers-infos-perso', 'MarchandControllerController@store');
// Marchand section henry
Route::post('/marchand-space/sendingInvite', [SendInvitationController::class, 'process_invites'])->name("invitation.send");
Route::get('/liste/collabo', [CollaboController::class, 'index'])->name("collabo.all");
Route::get('/liste/collabo/latest', [CollaboController::class, 'lastThreeInvite'])->name("invitation.latest");
Route::get('/liste/collabo/proprio', [CollaboController::class, 'collaboForChangerRole'])->name("invitation.proprio");
Route::get('/liste/collabo/{id}', [CollaboController::class, 'show'])->name("collabo.one");
Route::put('/update/collabo/{id}', [CollaboController::class, 'update'])->name("collabo.update");
Route::put('/updaterole/collabo/{id}', [CollaboController::class, 'updateRole'])->name("collabo.updaterole");
Route::get('/marchand/affichemenu', [MarchandControllerController::class, 'checkForMenu'])->name("menu.check");
Route::put('/marchand/updateproprio/{id}', [MarchandControllerController::class, 'updateProprio'])->name("marchand.change");

Route::post('save_caracteristique_client', 'CaracteristiqueController@saveCaracteristiquebyClient');
Route::get('marchand_boutique_product', 'ProduitController@marchandBoutiqueProduit');

// Route::get('/envoie-redirect', function() {
//     return redirect()->route("page_accueil")->withFragment("#pop-pour-redirection-depuis-le-mail");
// })->name("envoie-redirect");

Route::get('/envoie-redirect', function() {
    return '/';
    // return redirect()->route("page_accueil")->withFragment("#pop-pour-redirection-depuis-le-mail");
})->name("envoie-redirect");

Route::get('/get_rayons_univers/{id}', 'RayonController@universProduit');
Route::get('caracteristiqueByRayonId/{id}', 'RayonController@caracteristiqueByRayonId');
Route::post('valeurCaracteristiqueR/{id}', 'RayonController@getValeursForRayon');

//Routes pour éditeurs updateproprio/collabo
Route::get('/acceuil-marchand-editeur', function () {
    return view('front.app-module.marchand.marchand-modals.gest-menu-marchand');
});

// Route: nouveau vendeur
Route::get('/marchand-nouveau-vendeur', function() {
    return view("front.app-module.user-profil.modals.vendeur-profil.nouveau-vendeur");
});

//--------------------------- route: boutique-particulier
Route::get('/marchand-information-particulier', function() {
    return view("front.app-module.user-profil.modals.vendeur-profil.information-particulier");
});

// Route: facturation particulier
Route::get('/marchand-facturation-particulier', function() {
    return view("front.app-module.user-profil.modals.vendeur-profil.facturation-particulier");
});

Route::get('/marchand-boutique-particulier', function() {
    return view("front.app-module.user-profil.modals.vendeur-profil.boutique-particulier");
});

// Route: verification particulier
Route::get('/marchand-verification-particulier', function() {
    return view("front.app-module.user-profil.modals.vendeur-profil.verification-particulier");
});

// Route: vérification particulier
Route::get('/marchand-verification-particulier', function() {
    return view("front.app-module.user-profil.modals.vendeur-profil.verification-particulier");
});

// --------------------fin particulier ----------------------------------


//--------------------------- route: organisation
// Route: renregistrement organisation
Route::get('/marchand-renseignement-organisation', function() {
    return view("front.app-module.user-profil.modals.vendeur-profil.renseignement-organisation");
});

// Route: information organisation
Route::get('/marchand-informations-organisation', function() {
    return view("front.app-module.user-profil.modals.vendeur-profil.informations-organisation");
});

// Route: facturation vendeur
Route::get('/marchand-facturation-organisation', function() {
    return view("front.app-module.user-profil.modals.vendeur-profil.facturation-organisation");
});

// route : marchand-boutique-vendeur
Route::get('/marchand-boutique-organisation', function() {
    return view("front.app-module.user-profil.modals.vendeur-profil.boutique-organisation");
});

// Route: information particulier
Route::get('/marchand-verification-organisation', function() {
    return view("front.app-module.user-profil.modals.vendeur-profil.verification-organisation");
});


// --------------------------- Route privée ---------------------------------
Route::get('/marchand-renseignement-vendeur-privee', function() {
    return view("front.app-module.user-profil.modals.vendeur-profil.renseignement-vendeur-privee");
}); //ok

// Route: information organisation
Route::get('/marchand-informations-vendeur-privee', function() {
    return view("front.app-module.user-profil.modals.vendeur-profil.informations-vendeur-privee");
}); //ok

// Route: facturation vendeur
Route::get('/marchand-facturation-vendeur-privee', function() {
    return view("front.app-module.user-profil.modals.vendeur-profil.facturation-vendeur-privee");
}); //ok

// route : marchand-boutique-vendeur
Route::get('/marchand-boutique-vendeur-privee', function() {
    return view("front.app-module.user-profil.modals.vendeur-profil.boutique-vendeur-privee");
}); //ok

// Route: information particulier
Route::get('/marchand-verification-vendeur-privee', function() {
    return view("front.app-module.user-profil.modals.vendeur-profil.verification-vendeur-privee");
});

Route::post('/tm_game_store', function(Request $request){
    $game = DB::table('game')->insert(
        ['id_user' => $request->iduser, 'ref_produit' => $request->ref_produit, 'nbre_participation' => $request->nbre_participation]
    );

    if ($game) {
        return response()->json(['status' => 'ok']);
    }else {
        return response()->json(['status' => 'not_ok']);
    }
});

Route::get('/tm_user_game/{id}', function($id){
    $game = DB::table('game')->where('id_user', $id)->get();
    $count = $game->count();

    if ($game) {
        return response()->json(['status' => 'ok', 'nombre' => $count]);
    }else {
        return response()->json(['status' => 'not_ok']);
    }
});

// Route: information vendeur

// Route::get('/marchand-information-vendeur', function() {
//     return view("front.app-module.user-profil.modals.vendeur-profil.informations-vendeur");
// });


// Route: renseignement vendeur
Route::get('/marchand-renseignement-vendeur', function() {
    return view("front.app-module.user-profil.modals.vendeur-profil.renseignement-vendeur");
});

//Mes routes test
Route::get('/acceuil-marchand-marchand', function () {
    return view('front.app-module.marchand.acceuil-marchand');
});


// traitement des caracteristiques
Route::get('/traitement_caracteristique', function () {

    $caracteristiques = DB::table('caracteristiques')->get();
    $valeur_caracteristique = DB::table('valeur_caracteristiques')->get();
    $rayons = DB::table('rayons')->get();
    $familles = DB::table('familles')->get();

    // return response()->json([
    //     'caracteristique' => $caracteristiques
    // ]);

    return view('front.app-module.marchand.marchand-files-helpers.caracteristique_performing',
    [
        'caracteristique' => $caracteristiques,
        'valeur_caracteristique' => $valeur_caracteristique,
        'rayons' => $rayons,
        'categories' => $familles,
    ]);

});

Route::post('rayon_caracteristique-affectation', 'RayonController@caracteristiqueAffectation');

// Route paul

Route::get('rayon_marchand/{id}', 'RayonController@showMarchand');

Route::get('rayon_univers/{id}', 'RayonController@rayonUnivers');
Route::get('all_boutique_rayon', 'RayonController@boutiqueRayon');
Route::get('/produit_by_rayon/{id}', 'ProduitController@rayonProduit');
Route::get('/rayon_background/{id}', 'RayonController@rayonBackground');

Route::get('/rayon_background_partager/{id}/{boutique_id}', 'RayonController@rayonBackgroundPartager');

Route::get('/famille_etagere_image/{id}', 'FamilleController@imagesEtageres');

Route::get('/all_boutique_rayon_partager/{boutique_id}', 'RayonController@boutiqueRayonPartager');

// Route Paul

Route::get('/centre_aide', function() {
    return view('front.app-module.user-profil.modals.service');
});

Route::get('produits_corbeille', 'CorbeilleController@show');
Route::put('reset_corbeille_produit/{id}', 'ProduitController@resetProduct');
Route::put('remove_from_basket/{id}', 'CorbeilleController@removeProductBasket');

Route::get('get_corbeille_number', 'CorbeilleController@getNumberCorbeil');

Route::post('/send_user_message', 'UserController@startNegociate');
Route::post('/save_credit_card', 'CarteCredit@addCarte');
Route::post('/send_verification_sms', 'SMS@send');
Route::post('/send_verification_sms_client', 'SMS@sendClient');
Route::post('/check_verification_sms', 'SMS@check');
Route::GET('/checkboutik_name', 'BoutiqueController@checkboutiqueName');
Route::GET('/get_rayon_by_libelle', 'RayonController@getByLibelle');

Route::get('/marchand-envoie-formulaire', function() {
    return view("front.app-module.user-profil.modals.vendeur-profil.page_envoie_formulaire");
}); //ok

// update boutique profil image

Route::post('/update_boutique_avatar', 'BoutiqueController@updateProfil');
Route::post('/vider_boutique_corbeille', 'CorbeilleController@vider');
Route::post('/share_boutique_whatapp', 'BoutiqueController@shareByWhatApp');

Route::post('/start_negociation', 'UserController@startNegociate');
Route::post('/responde_negociation', 'UserController@respondNegociation');
Route::post('/get_negociation_product_infos', 'ProduitController@produitNegociationInfos');

// ----------------- test upload ---------------------------
Route::post('/test_upload_file', 'ProduitImageController@test_upload');
Route::get('caracteristiqueByProduct/{id}', 'ProduitController@caracteristiqueByProduit');

Route::get('/gestion','ProduitController@getStatics');
Route::get('gestion/{id}','ProduitController@getStatsFilter');
Route::get('/commande','CommandeController@create');
Route::post('/set_default_rayon', 'RayonController@activeDefaultRayon');

Route::get('/get_money_marchand','MarchandControllerController@getPaymentMarchand');
Route::post('/modif_money_marchand','MarchandControllerController@modifyPaymentMarchand');

Route::post('/update_product_position', 'ProduitController@updateProduitPosition');

Route::get('/rayon_articles_associer/{id}', 'RayonController@getArticlesAssocier');
Route::get('/get_expedtions_mode', 'CartController@commandeExpedition');
Route::post('/log_invite_user', 'UserController@inviteLogin')->name('inviter.login');

Route::get('/get_user_infos_carnet', 'CarnetAdresseController@getUserAchatAchat');
// Route::post('/sauve_client_order', 'CommandeController@ajoutCommant');
Route::post('/sauve_client_order', 'StripeController@makePayment');
Route::get('/get_sigle_addresse', 'CarnetAdresseController@siggleAdresse');

Route::get('/get_sigle_expedition', 'CarnetAdresseController@getSigleExpedition');
Route::get('/current_price_achat', 'CarnetAdresseController@getCurrentPrice');
Route::get('/change_credit_card_achat', 'CarteCreditController@getCreditCardAchat');
Route::get('/get_credit_card-to-change', 'CarteCreditController@creditToChange');
Route::post('/change_credicard-achat', 'CarteCreditController@changeCreditCarte1');
Route::post('/set_inviter_session', 'UserController@setInviterSession');
Route::get('/get_selected_credit_card', 'CarteCreditController@getCardSelectedCrediCard');
Route::post('/update_invite_credit_card_session', 'CarteCreditController@updateInviteCredit');
Route::post('/add-address-carnet-user-connected', 'CarnetAdresseController@saveFromAchat');
Route::post('/get_user_infos_profil', 'UserController@getCurrentUserData');
Route::get('/get_command_data', 'CommandeController@ajoutCommant');
Route::post('/pay_with_moov', 'CommandeController@payerAvecMoovMoney'); // pay_with_mobile_service

Route::post('/retour_pvit2', 'CommandeController@retour_pvit');

Route::get('/get_prepare_mobile_pay_command', 'CommandeController@prepareMobileForm');

Route::post('/pay_with_airtel', 'CommandeController@payerAvecAirtelMoney');
Route::post('/pay_with_mobile_service', 'CommandeController@payWithMobileServices');
Route::post('/check_pvit_callback_status', 'CommandeController@checkPvitCallBack');

Route::get('/fab_share_button', function() {
    // return view('front.new_view.fb_share');
});

Route::get('/facebook_preview_view', function() {
    return view('front.new_view.fb_preview');
});

Route::post('/ajout_categorie_favorie', 'MesFavorisController@ajoutCategori');
Route::get('/get_user_favorie_categorie', 'MesFavorisController@getUserFavorisCategoris');
Route::get('/all_user_favoris', 'MesFavorisController@getUserFavoris');
Route::get('/get_same_partenaire_product/{id}', 'ProduitController@getPartenaireProduct');
Route::get('/sort_partenaire_product_by_price', 'ProduitController@sortPartenaireProductByPrice');
Route::post('/send_ebelling_payement', 'CommandeController@payWithCreditCard');
Route::get('/get_client_commande', 'CommandeController@getClientCommande');
Route::get('/recommander', 'CommandeController@recommander');
Route::get('/sort_data_by_date', 'CommandeController@sortByDate');
Route::get('/check_favoris_existence', 'MesFavorisController@checkFavorisExistence');
Route::post('/laisser_nous_deviner', 'ProductGuessController@laisserNousDeviner');
Route::get('/get_deviner_product', 'ProductGuessController@getDevinerProduct');
Route::post('/delete_from_history', 'ProductGuessController@deleteUserHistoryProduct');
Route::post('/search_by_image', 'ProduitController@searchByImage');
Route::post('/retour_pvit_process', 'CommandeController@checkPvitCallBack');  // traite le retour du callback
// Route::post('/retour_pvit_process', function() {
//     // return 'Bonjour il s agit du retour pvit'.$jour;
//     $data_received=file_get_contents("php://input");
//     // $xml = simplexml_load_string($data_received, "SimpleXMLElement", LIBXML_NOCDATA);
//     // $json = json_encode($xml); CommandeController
//     // $array = json_decode($json,TRUE);

//     $log = fopen("/var/www/toulemarket/pvit_log.txt", 'a+');
//     fwrite($log, "[" . date('Y-m-d H:i:s') . "] : Transaction : " . json_encode($data_received) . "\n");
//     fclose($log);

//     return 'ok';
// });

Route::get('/change_credit_card_achat', 'CarteCreditController@getCreditCardAchat');

Route::get('/carnet-getaddress','CarnetAdresseController@getaddressUser');


// Route::get('/fab_preview/{id}/{title}/{picture}', function(Request $request, $id, $title, $picture) {
//     $image_affichage = 'uploads/636fae46de39b13473';
//     $product_image = Produit::find($id);
//     $new_produit = DB::table('produits')->where('id', $id)->get();
    
//     return view('front.new_view.fb_preview', ['name' => $title, 'produit_id' => $id, 'image' => $picture]);
// })->where(['picture' => '[^/]+/[^/]+']);

Route::get('/facebook_preview_view/{id}/{picture}/{id_rayon}/{rayon_slug}', function(Request $request, $id,  $picture, $id_rayon, $rayon_slug) {
    $image_affichage = 'uploads/636fae46de39b13473';
    $product_data = Produit::find($id);
    $new_produit = DB::table('produits')->where('id', $id)->get();
    
    return view('front.new_view.fb_preview_ol', ['name' => $product_data->libelle, 'description' => $product_data->description,  'produit_id' => $id, 'pict_prod' => 'social_share/'.$picture, 'id_rayon' => $id_rayon, 'rayon_slug' => $rayon_slug]);

});

Route::get('/twiter_preview_view/{id}/{picture}/{id_rayon}/{rayon_slug}', function(Request $request, $id, $picture, $id_rayon, $rayon_slug) {
    $image_affichage = '/social_share/64874ef5ee579';
    $product_image = Produit::find($id);
    $new_produit = DB::table('produits')->where('id', $id)->get();
    
    return view('front.new_view.twiter_share_card', ['name' => $product_image->libelle, 'description' => $product_image->description, 'produit_id' => $id, 'pict_prod' =>  'social_share/'.$picture, 'id_rayon' => $id_rayon, 'rayon_slug' => $rayon_slug]);

});

Route::post('/image_meta_data', 'ProduitController@saveImageMeta');
Route::get('/get_famille_sous_categorie', 'ProduitController@familleSousCategorie');
Route::get('/products_by_categorie/{column}', 'ProduitController@getProductByCategorie');

Route::get('/proceed_with_tookan', function() {
    return view('welcome_tookan');
}); 

Route::get('/count_marchand_commandes', 'CommandeController@countMarchandCommandeNumber');
Route::get('/get_all_marchand_command', 'CommandeController@countMarchandCommande');

Route::get('/get_marchand_commande_details', 'CommandeController@getMarchandCommandeDetail');

Route::get('get_searched_product_cat/{product_id}/{column}', 'ProduitController@getSearchedDataByCategorie');

Route::get('rayon/{id}/{slug}/{id_produit}', 'RayonController@showProduitRecherche');

Route::post('/retour_pvit_test', 'CommandeController@retourPvitTest');

Route::get('/get_pvit_callback/{ref}', 'CommandeController@getCallBackStatut');

Route::get('/get_ebilling_callback/{ref}', 'CommandeController@getEbillingCallBackStatut');

Route::post('/retour_ebilling_process', 'CommandeController@check_ebilling_call_back');

// Route::post('/retour_ebilling_process', function() {
//     // $data_received=file_get_contents("php://input");
//     // $xml = simplexml_load_string($data_received, "SimpleXMLElement", LIBXML_NOCDATA);
//     // $json = json_encode($xml);
//     // $array = json_decode($json,TRUE);
//     $log = fopen("/var/www/toulemarket/retour_ebilling.txt", 'a+');
//     $data_received2 = [];
//     if(isset($_POST)) {
//         $data_received2 = $_POST;
//     }
//     fwrite($log, "[" . date('Y-m-d H:i:s') . "] : Transaction : " . json_encode($data_received2) . "\n");
//     fclose($log);

//     // return 'retour ebilling ok'.$data;
// });

Route::post('/update_commade_traitement_statut', 'CommandeController@updateCommandeStatut');

Route::post('/update_produit_state', 'CommandeController@updateProduitState');

Route::get('/get_all_marchand_command_accepeted', 'CommandeController@countMarchandCommandeAccepted');

Route::post('/get_new_marchand_new_command', 'CommandeController@getMarchandNewCommand');
Route::post('/update_notified_commande', 'CommandeController@updateNotifiedCommandeStatu');

Route::get('/get_client_current_commande', 'CommandeController@clientCurrentCommande');
Route::get('/get_marchand_unread_notif', 'CommandeController@getUnreadNotification');

Route::post('/gettookancallback', function(Request $request) {

    if (($request->job_status == 1) && ($request->task_status == 4)) {

        $order_updated = DB::table('recap_commandes')
        ->where('recap_commandes.ref_commande', '=', $request->order_id)
        ->update([
            'status_commande' => 'Commande en cours de livraison',
            'tracking_link' => $request->tracking_link
        ]);


        $commande = DB::table('recap_commandes')->where('ref_commande', $request->order_id)->get();

        if (count($commande) > 0) {
            $curr = \Carbon\Carbon::now('Africa/Lagos')->format('H:i');
            $today = Carbon::today()->toDateString();
    
            $commande_process = [
                'order_id' => $commande[0]->id,
                'order_status' => 'Commande en cours de livraison',
                'step_hour' => $curr,
                'step_date' => $today
            ];
    
            $commande_process = CommandeProcess::create($commande_process);
        }

    }else if(($request->job_status == 4) && ($request->task_status == 4)) {

        $order_updated = DB::table('recap_commandes')
        ->where('recap_commandes.ref_commande', '=', $request->order_id)
        ->update([
            'status_commande' => 'Commande livree'
        ]);

        $commande = DB::table('recap_commandes')->where('ref_commande', $request->order_id)->get();

        if (count($commande) > 0) {
            $curr = \Carbon\Carbon::now('Africa/Lagos')->format('H:i');
            $today = Carbon::today()->toDateString();
    
            $commande_process = [
                'order_id' => $commande[0]->id,
                'order_status' => 'Commande livree',
                'step_hour' => $curr,
                'step_date' => $today
            ];
    
            $commande_process = CommandeProcess::create($commande_process);
        }

    }

    $log = fopen("/var/www/toulemarket/tookan_callback.txt", 'a+');

    fwrite($log, "[" . date('Y-m-d H:i:s') . "] : Transaction : " . json_encode($request) . "\n");
    
    fclose($log);

});

Route::post('/create_tookan_task', 'CommandeController@createTookanTask');
Route::post('/update_commande_status_from_tookan', 'CommandeController@updateFromTookan');

Route::get('/get_client_tookan_current_job/{idclient}', 'CommandeController@getClientCurrentTookanTask');
Route::get('/get_client_tookan_current_job_encours_livraison/{idclient}', 'CommandeController@getClientCurrentTookanTaskEncoursLivraison');
Route::get('/produit_etagere_responsive/{id}/{slug}', 'ProduitEtagereResponsiveController@showResponsive');

Route::get('/show_produit_by_rayon/{id_rayon}/{rayon_cat}/{column}', 'RayonController@show_produit_by_rayon');

Route::get('/get_product_by_screen_size/{id_rayon}/{rayon_cat}/{column}', 'RayonController@show_produit_by_screen_size');

Route::get('/get_product_by_screen_size_mobile/{id_rayon}/{rayon_cat}/{column}', 'RayonController@show_produit_by_screen_size_mobile');
Route::get('/get_product_by_screen_size_mobile_scroll/{id_rayon}/{rayon_cat}/{column}', 'RayonController@show_produit_by_screen_size_mobile_scroll');

Route::post('/phone_validation', 'Auth\RegisterController@updatePhoneCodeStatus');

Route::post('/update_user_validation_code', 'Auth\RegisterController@updateUserValidationCode');

Route::post('/login_with_facebook', 'Auth\RegisterController@faceboologin');

Route::post('/open_demo', 'UserController@unloackDemo');

Route::post('/open_demo', function(Request $request){

    if (!isset($_SESSION['demo']) && $request->password == 'Rolande21!!Rolande21!!') {
        $_SESSION['demo'] = 'Rolande21!!Rolande21!!';
        return response()->json(['status' => 200]);
    }

});

Route::get('/start_game', function() {
    return view('front.tm_game');
});

Route::post('/check_phone_inbase', 'SMS@checkIfPhoneExist');

Route::get('/partageface', function() {
    return view('front.new_view.facebook_template');
});

Route::get('/prepare_facebook_template', function() {
    return view('front.new_view.prepare_facebook_template');
});

Route::post('/article_screen_shot', 'Boutique@screenShot');
Route::post('/render_laravel_template', 'Boutique@render_facebook_template');

Route::get('/en_attente_de_facebooK', function(){
    return view('front.new_view.en_attente_de_facebook');
});

// Modification des prix des produits 
Route::get('/tm_mise_a_jour_prix-octobre_v1', function() {
    return view('welcome_tookan');
});

Route::post('/update_prod_price', function(Request $request) {
    $order_updated = DB::table('produits')
    ->where('produits.ref_produit', '=', $request->ref)
    ->update([
        'prix' => $request->price,
    ]);

    if ($order_updated) {
        return response()->json(['statut' => 'ok']);
    }else {
        return response()->json(['statut' => 'failled']);
    }

});

Route::get('/show_all_commandes', function() {
    return view('front.app-module.commandes.liste_commandes');
});
 
Route::get('/get_all_admin_command', 'CommandeController@get_admin_new_commande');

Route::post('/write_data_infile', 'CommandeController@getAdminNewCommande');

Route::get('/labo_show_commande', 'LaboController@getallCommandes');

Route::post('/delete_example_file', function() {
    if(\File::exists(public_path('utilisateurs_temps_infos/example.txt'))){
        \File::delete(public_path('utilisateurs_temps_infos/example.txt'));
        return 'ok';
        }else{
        return 'rien';
        }
});

Route::get('/facebook_manualy_login2', function() {
    return view('front.new_view.facebook_manualy_login');
});

Route::get('/facebook/oauth', 'UserController@redirectToFacebook');
Route::get('/facebook_manualy_login', 'UserController@handleFacebookCallback');

Route::get('/load_magazin_modal', function() {
    $login_template = view('front.app-module.home.modals.choisir-magasin')->render();
    return response()->json(['magasin_template' => $login_template]);
});

// load_langue_devise_modal
Route::get('/load_langue_devise_modal', function() {
    $langue_template = view('front.app-module.home.modals.langue-devise')->render();
    return response()->json(['magasin_template' => $langue_template]);
});

Route::get('/load_login_register_modal', function() {
    $login_template = view('front.app-module.home.modals.register-login-modal')->render();
    return response()->json(['login_template' => $login_template]);
});

Route::get('/load_panier_vide_modal', function() {
    $panier_vide_template = view('front.new_view.recap_produit_panier_vide')->render();
    $recap_panier_template = view('front.new_view.recap_produit_panier')->render();
    return response()->json(['panier_vide_template' => $panier_vide_template, 'recap_panier_template' => $recap_panier_template]);
});

Route::get('/load_panier_template', function() {
    $panier_template = view('front.new_view.panier')->render();
    return response()->json(['panier_template' => $panier_template]);
});

Route::get('/load_inviter_form', function() {
    $inviter_form_template = view('front.new_view.invite_formulaire')->render();
    return response()->json(['inviter_template' => $inviter_form_template]);
});

Route::get('/load_invite_register_login', function() {
    $invite_register_login = view('front.new_view.register_login_invite')->render();
    return response()->json(['invite_register_template' => $invite_register_login]);
});

Route::get('/load_change_pwd', function() {
    $pwd_template = view('front.new_view.forget_password')->render();
    return response()->json(['forgot_pwd_template' => $pwd_template]);
});

Route::post('/update_description_prod', function(Request $request) {
    $order_updated = DB::table('produits')
        ->where('produits.ref_produit', '=', $request->ref)
        ->update([
        'description' => $request->description,
    ]);

    return response()->json(['status' => 200, 'message' => 'Description modifiée avec success']);
});

Route::post('/get_caracteristique_data', 'CaracteristiqueController@getCaractisqueData');

Route::post('/ajout_caracteristique', 'CaracteristiqueController@ajoutCaracteristique');

Route::post('/add_valeur_caracteristique', 'CaracteristiqueController@addValeurCaracteristique');

Route::post('/general_searched_result', 'ProduitController@showAllSearchedProduct');

Route::post('/add_sous_caracteristique_value', function(Request $request) {

    $latestId = DB::table('sous_categories')->latest('id')->first()->id + 1;
    
    $sous_cat = DB::insert('insert into tm_sous_categories (id, libelle, description, deleted, archived, locked, created_at, updated_at, famille_id, image, occasion) values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)', [$latestId, $request->sous_cat_val, '', '0', '0', '0', '2023-02-17 09:06:57', '2023-02-17 09:06:57', $request->cat, NULL, '0']);

    $sous_cat = DB::table('sous_categories')
    ->where('famille_id', $request->cat)
    ->get();

    return $sous_cat;

});

Route::get('get_partager_product_by_screen_size/{id_boutique}/{id_rayon}/{rayon_default_categorie}/{init_product_col_number}', 'BoutiqueController@show_produit_partager');

Route::post('/resend_email_validation_code', 'UserController@resendEmailCode');
Route::get('verify_user_accepted_notification/{id}', 'InStockNotifyerController@verifierProductNotificationActivated');
Route::get('/univers_rayons/{id}', 'UniverController@univerRayons');

Route::get('/verify_vendeur_email/{id_vendeur}', 'MarchandControllerController@verifyVendeurEmail');

Route::get('/produit/expedition/{id_produit}', 'CartController@getProductExpeditionById2');
