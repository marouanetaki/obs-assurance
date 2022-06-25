<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', 'HomeController@consalti')->name('welcome');
Route::get('/contact', 'HomeController@contact')->name('contact');
Route::get('/medecin', 'HomeController@medecin')->name('contact');


Route::redirect('/', '/login');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Auth::routes();

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::post('users/parse-csv-import', 'UsersController@parseCsvImport')->name('users.parseCsvImport');
    Route::post('users/process-csv-import', 'UsersController@processCsvImport')->name('users.processCsvImport');
    Route::resource('users', 'UsersController');

    // Beneficiaire
    Route::delete('beneficiaires/destroy', 'BeneficiaireController@massDestroy')->name('beneficiaires.massDestroy');
    Route::post('beneficiaires/media', 'BeneficiaireController@storeMedia')->name('beneficiaires.storeMedia');
    Route::post('beneficiaires/ckmedia', 'BeneficiaireController@storeCKEditorImages')->name('beneficiaires.storeCKEditorImages');
    Route::post('beneficiaires/parse-csv-import', 'BeneficiaireController@parseCsvImport')->name('beneficiaires.parseCsvImport');
    Route::post('beneficiaires/process-csv-import', 'BeneficiaireController@processCsvImport')->name('beneficiaires.processCsvImport');
    Route::resource('beneficiaires', 'BeneficiaireController');

    // Dossier
    Route::delete('dossiers/destroy', 'DossierController@massDestroy')->name('dossiers.massDestroy');
    Route::post('dossiers/media', 'DossierController@storeMedia')->name('dossiers.storeMedia');
    Route::post('dossiers/ckmedia', 'DossierController@storeCKEditorImages')->name('dossiers.storeCKEditorImages');
    Route::resource('dossiers', 'DossierController');

    // Accident
    Route::delete('accidents/destroy', 'AccidentController@massDestroy')->name('accidents.massDestroy');
    Route::post('accidents/parse-csv-import', 'AccidentController@parseCsvImport')->name('accidents.parseCsvImport');
    Route::post('accidents/process-csv-import', 'AccidentController@processCsvImport')->name('accidents.processCsvImport');
    Route::resource('accidents', 'AccidentController');

    // Prise
    Route::delete('prises/destroy', 'PriseController@massDestroy')->name('prises.massDestroy');
    Route::post('prises/media', 'PriseController@storeMedia')->name('prises.storeMedia');
    Route::post('prises/ckmedia', 'PriseController@storeCKEditorImages')->name('prises.storeCKEditorImages');
    Route::resource('prises', 'PriseController');

    // Clinique
    Route::delete('cliniques/destroy', 'CliniqueController@massDestroy')->name('cliniques.massDestroy');
    Route::post('cliniques/media', 'CliniqueController@storeMedia')->name('cliniques.storeMedia');
    Route::post('cliniques/ckmedia', 'CliniqueController@storeCKEditorImages')->name('cliniques.storeCKEditorImages');
    Route::post('cliniques/parse-csv-import', 'CliniqueController@parseCsvImport')->name('cliniques.parseCsvImport');
    Route::post('cliniques/process-csv-import', 'CliniqueController@processCsvImport')->name('cliniques.processCsvImport');
    Route::resource('cliniques', 'CliniqueController');

    // Medicament
    Route::delete('medicaments/destroy', 'MedicamentController@massDestroy')->name('medicaments.massDestroy');
    Route::post('medicaments/parse-csv-import', 'MedicamentController@parseCsvImport')->name('medicaments.parseCsvImport');
    Route::post('medicaments/process-csv-import', 'MedicamentController@processCsvImport')->name('medicaments.processCsvImport');
    Route::resource('medicaments', 'MedicamentController');

    // Medecin
    Route::delete('medecins/destroy', 'MedecinController@massDestroy')->name('medecins.massDestroy');
    Route::post('medecins/parse-csv-import', 'MedecinController@parseCsvImport')->name('medecins.parseCsvImport');
    Route::post('medecins/process-csv-import', 'MedecinController@processCsvImport')->name('medecins.processCsvImport');
    Route::resource('medecins', 'MedecinController');

    // Specialite
    Route::delete('specialites/destroy', 'SpecialiteController@massDestroy')->name('specialites.massDestroy');
    Route::post('specialites/parse-csv-import', 'SpecialiteController@parseCsvImport')->name('specialites.parseCsvImport');
    Route::post('specialites/process-csv-import', 'SpecialiteController@processCsvImport')->name('specialites.processCsvImport');
    Route::resource('specialites', 'SpecialiteController');

    // Facture
    Route::delete('factures/destroy', 'FactureController@massDestroy')->name('factures.massDestroy');
    Route::resource('factures', 'FactureController');

    Route::get('messenger', 'MessengerController@index')->name('messenger.index');
    Route::get('messenger/create', 'MessengerController@createTopic')->name('messenger.createTopic');
    Route::post('messenger', 'MessengerController@storeTopic')->name('messenger.storeTopic');
    Route::get('messenger/inbox', 'MessengerController@showInbox')->name('messenger.showInbox');
    Route::get('messenger/outbox', 'MessengerController@showOutbox')->name('messenger.showOutbox');
    Route::get('messenger/{topic}', 'MessengerController@showMessages')->name('messenger.showMessages');
    Route::delete('messenger/{topic}', 'MessengerController@destroyTopic')->name('messenger.destroyTopic');
    Route::post('messenger/{topic}/reply', 'MessengerController@replyToTopic')->name('messenger.reply');
    Route::get('messenger/{topic}/reply', 'MessengerController@showReply')->name('messenger.showReply');
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
    }
});
