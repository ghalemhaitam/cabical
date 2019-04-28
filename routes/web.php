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

Route::get('/', function () {
    return view('welcome');
});

Route::get('userr', function () {/*
    $user = new App\User(); //Modèle User
    $user->avatar = 'hkhikjij.png';
    $user->name = 'Hicham';
    $user->password = Hash::make('1234');
    $user->email = 'docteur@docteur.com';
    $user->save();

    $user = new App\User(); //Modèle User
    $user->avatar = 'zainab.png';
    $user->name = 'Zainab';
    $user->password = Hash::make('1234');
    $user->email = 'secretaire@secretaire.com';
    $user->save();
    // after this step go to database user_role and add the user to role
    
   !!!! Obligatoire !!!! 
    - name role Admin to doctor
    - name role Secretary to secretaire
    
    */
});


Auth::routes();

Route::get('/Docteur',  ['uses'=>'HomeController@index', 'as'=>'home' ,'middleware' => 'roles' ,'roles'=> ['Admin']]);
Route::get('/Secretaire',  ['uses'=>'HomeController@index_secretaire', 'as'=>'secretaire' ,'middleware' => 'roles' ,'roles'=> ['Secretary']]);



//Route::resource('patient','PatientController');

Route::get('/patients',  ['uses'=>'PatientController@index', 'as'=>'patient' ,'middleware' => 'roles' ,'roles'=> ['Admin']]);
Route::post('/patient-edit',  ['uses'=>'PatientController@edit', 'as'=>'PatientEdit' ,'middleware' => 'roles' ,'roles'=> ['Admin']]);
Route::post('/patient-add', ['uses'=>'PatientController@store','as'=>'PatientAdd' ,'middleware' => 'roles' ,'roles'=> ['Admin']]);
Route::get('/patient-delete', ['uses'=>'PatientController@destroy','as'=>'PatientDelete' ,'middleware' => 'roles' ,'roles'=> ['Admin']]);
Route::get('/patient-search', ['uses'=>'PatientController@FindPatient','as'=>'PatientSearch' ,'middleware' => 'roles' ,'roles'=> ['Admin']]);
Route::get('/patient-search-consultation', ['uses'=>'PatientController@FindPatientConsultation','as'=>'FindPatientConsultation' ,'middleware' => 'roles' ,'roles'=> ['Admin']]);
//search _motif_ rendez_vous on shoing patient info rendez_vous
Route::get('/search-motif', ['uses'=>'MotifConsultationController@search_motif','as'=>'FindMotifRendezVous' ,'middleware' => 'roles' ,'roles'=> ['Admin']]);




Route::get('/admin', ['uses'=>'PatientController@admin', 'as'=>'Admin' ,'middleware' => 'roles' ,'roles'=> ['Admin']] );
Route::get('/secretary',['uses'=>'PatientController@secretary', 'as'=>'secretary' ,'middleware' => 'roles' ,'roles'=> ['Secretary']] );

// route pour Ajouter un Element Antecedent

Route::get('/antecedent-charge', ['uses'=>'AntecedentController@AntecedentCharge','as'=>'AntecedentCharge' ,'middleware' => 'roles' ,'roles'=> ['Admin']]);
Route::post('/elements-add', ['uses'=>'AntecedentController@AntecedentType','as'=>'AntecedentType' ,'middleware' => 'roles' ,'roles'=> ['Admin']]);
Route::post('/antecedent-store', ['uses'=>'AntecedentController@store','as'=>'AntecedentStore' ,'middleware' => 'roles' ,'roles'=> ['Admin']]);

// route pour Interrogation

Route::get('/motif-consultation-charge', ['uses'=>'MotifConsultationController@index','as'=>'InterogationAjouteElement' ,'middleware' => 'roles' ,'roles'=> ['Admin']]);
Route::post('/elements-add-motif-consultation', ['uses'=>'MotifElementController@store','as'=>'MotifsType' ,'middleware' => 'roles' ,'roles'=> ['Admin']]);
Route::post('/interrogatoire-store', ['uses'=>'MotifConsultationController@store','as'=>'MotifConsultationStore' ,'middleware' => 'roles' ,'roles'=> ['Admin']]);


// route pour nouvelle consultation
Route::get('/consultation-new', ['uses'=>'ConsultationController@store','as'=>'StoreConsultation' ,'middleware' => 'roles' ,'roles'=> ['Admin']]);

// route pour cherché consultation
Route::get('/consultation-search', ['uses'=>'ConsultationController@index','as'=>'SearchConsultation' ,'middleware' => 'roles' ,'roles'=> ['Admin']]);
// route pour cherché les antecedents
Route::get('/antecedent-search', ['uses'=>'ConsultationController@searching_antecedent','as'=>'SearchAntecedentByType' ,'middleware' => 'roles' ,'roles'=> ['Admin']]);
// route pour cherché les nom des id sur un antecedents
Route::get('/get-name-element-selected', ['uses'=>'AntecedentController@searching_name_antecedent','as'=>'SearchNameAntecedent' ,'middleware' => 'roles' ,'roles'=> ['Admin']]);
// route pour cherché les nom des elements searching_name_element
Route::get('/get-name-element-controller-selected', ['uses'=>'ConsultationController@searching_name_element','as'=>'SearchingNameElement' ,'middleware' => 'roles' ,'roles'=> ['Admin']]);
// route pour cherché les nom de prestataire et du type bilan
Route::get('/get-name-bilan-element-controller-selected', ['uses'=>'ConsultationController@searching_name_bilan_final_element','as'=>'SearchingNameElementBilan' ,'middleware' => 'roles' ,'roles'=> ['Admin']]);


// route for deleting other consultation not competed  consultation-delete
Route::get('/consultation-delete', ['uses'=>'ConsultationController@destroy','as'=>'DeleteConsultation' ,'middleware' => 'roles' ,'roles'=> ['Admin']]);



// route pour Examan Clinique

Route::post('/elements-add-exament-clinique-consultation', ['uses'=>'ElementTypeExamanController@store','as'=>'ExamanCliniqueElement' ,'middleware' => 'roles' ,'roles'=> ['Admin']]);
     // get par-appareil -list
Route::get('/examan-clinique-par-appareil-charge', ['uses'=>'ElementTypeExamanController@index','as'=>'ParAppareilAddElement' ,'middleware' => 'roles' ,'roles'=> ['Admin']]);
    // get general -list
Route::get('/examan-clinique-general-charge', ['uses'=>'ElementTypeExamanController@index2','as'=>'GeneralAddElement' ,'middleware' => 'roles' ,'roles'=> ['Admin']]);
    // save examan clinique
Route::post('/examan-clinique-store', ['uses'=>'ExamanCliniqueController@store','as'=>'ExamanCliniqueStore' ,'middleware' => 'roles' ,'roles'=> ['Admin']]);


// route pour Bilan ParaClinique

Route::post('/elements-add-bilan-paraclinique-consultation', ['uses'=>'ElementBilanParacliniqueController@store','as'=>'BilanParacliniqueElement' ,'middleware' => 'roles' ,'roles'=> ['Admin']]);
    // get Biologie -list
Route::get('/bilan-paraclinique-biologie-charge', ['uses'=>'ElementBilanParacliniqueController@index','as'=>'BiologieAddElement' ,'middleware' => 'roles' ,'roles'=> ['Admin']]);
   // get Radiologie -list
Route::get('/bilan-paraclinique-radiologie-charge', ['uses'=>'ElementBilanParacliniqueController@index2','as'=>'RadiologieAddElement' ,'middleware' => 'roles' ,'roles'=> ['Admin']]);

  // save examan clinique
Route::post('/bilan-paraclinique-store', ['uses'=>'BilanParacliniqueController@store','as'=>'BilanParacliniqueStore' ,'middleware' => 'roles' ,'roles'=> ['Admin']]);


// route pour Ordonnance
Route::post('/add-element-ordonnance', ['uses'=>'OrdonnanceDetailController@store','as'=>'OrdonnanceDetailElement' ,'middleware' => 'roles' ,'roles'=> ['Admin']]);
    // route for deleting ordonnance-detail
Route::get('/delete-ordonnance-detail', ['uses'=>'OrdonnanceDetailController@destroy','as'=>'DeleteOrdonnanceDetail' ,'middleware' => 'roles' ,'roles'=> ['Admin']]);
    // add ordonnance detail
Route::post('/edit-ordonnance', ['uses'=>'OrdonnanceDetailController@edit','as'=>'EditOrdonnanceDetail' ,'middleware' => 'roles' ,'roles'=> ['Admin']]);

// route pour Certification
Route::post('/save-certificat', ['uses'=>'CertificatMedicalController@store','as'=>'SaveCertificatMedical' ,'middleware' => 'roles' ,'roles'=> ['Admin']]);

        // route for add prestataire by speed adding
Route::post('/add-element-prestataire', ['uses'=>'PrestataireController@store','as'=>'PrestataireElement' ,'middleware' => 'roles' ,'roles'=> ['Admin']]);
        // route for add prestataier all information by big adding admin
Route::post('/prestataire-big-store', ['uses'=>'PrestataireController@big_store','as'=>'PrestataireAddBig' ,'middleware' => 'roles' ,'roles'=> ['Admin']]);
        // route for edit prestataire all information by big edit admin
Route::post('/prestataire-big-edit', ['uses'=>'PrestataireController@big_edit','as'=>'PrestataireEditBig' ,'middleware' => 'roles' ,'roles'=> ['Admin']]);


// route for add-element-type_bilan_radiologie
Route::post('/add-element-type_bilan_radiologie', ['uses'=>'TypeBilanConsultationController@store_radiologie','as'=>'RadiologieBilanControllerTypeElement' ,'middleware' => 'roles' ,'roles'=> ['Admin']]);

// route for add-element-type_bilan_Biologie
Route::post('/add-element-type_bilan_biologie', ['uses'=>'TypeBilanConsultationController@store_biologie','as'=>'BiologieBilanControllerTypeElement' ,'middleware' => 'roles' ,'roles'=> ['Admin']]);


//  add bilan radiologie consultation all
Route::post('/add-bilan-radiologie-consultation-all', ['uses'=>'BilanConsultationController@store_radiologie','as'=>'AddBilanRadiologie' ,'middleware' => 'roles' ,'roles'=> ['Admin']]);
//  add bilan radiologie consultation all
Route::post('/add-bilan-biologie-consultation-all', ['uses'=>'BilanConsultationController@store_biologie','as'=>'AddBilanBiologie' ,'middleware' => 'roles' ,'roles'=> ['Admin']]);

//  SAVE-FINISH
Route::post('/save-finish', ['uses'=>'ConsultationController@save_finish','as'=>'Save_Finish' ,'middleware' => 'roles' ,'roles'=> ['Admin']]);



// route for geting list medicament
Route::get('/medicament-list', ['uses'=>'MedicamentController@index','as'=>'getMedicament' ,'middleware' => 'roles' ,'roles'=> ['Admin']]);

// route for geting list type of certificat medicals
Route::get('/type-certificat-list', ['uses'=>'TypeCertificationController@index','as'=>'GetTypeCertificat' ,'middleware' => 'roles' ,'roles'=> ['Admin']]);
// route for geting list type of prestataire

Route::get('/prestataire-list', ['uses'=>'PrestataireController@index','as'=>'GetPrestataire' ,'middleware' => 'roles' ,'roles'=> ['Admin']]);

// route for getting list type bilan radiologie consultation
Route::get('/bilan-radiologie-consultation-list', ['uses'=>'TypeBilanConsultationController@index_radiologie','as'=>'GetbilanRadiologieConsultation' ,'middleware' => 'roles' ,'roles'=> ['Admin']]);

// route for getting list type bilan-biologie-consultation-list
Route::get('/bilan-biologie-consultation-list', ['uses'=>'TypeBilanConsultationController@index_biologie','as'=>'GetbilanBiologieConsultation' ,'middleware' => 'roles' ,'roles'=> ['Admin']]);

// route for geting list  select-antecedent-list
Route::get('/select-antecedent-list', ['uses'=>'AntecedentController@list_all_select_antecedent','as'=>'AllgetListElementAntecedent' ,'middleware' => 'roles' ,'roles'=> ['Admin']]);
/* route for getting medicaments all */
Route::get('/select-medicament-list', ['uses'=>'MedicamentController@index','as'=>'AllgetListMedicament' ,'middleware' => 'roles' ,'roles'=> ['Admin']]);





   // route for input editing
//  get consultation familiaux
Route::get('/get-consultation-info', ['uses'=>'ConsultationController@GetingAllConsultationInfo','as'=>'GetingAllConsultationInfo' ,'middleware' => 'roles' ,'roles'=> ['Admin']]);
//  get-name-familiaux by id antecedent
Route::get('/get-name-familiaux', ['uses'=>'ConsultationController@GetingNameAllByIdAntecedent','as'=>'GetingNameAllByIdAntecedent' ,'middleware' => 'roles' ,'roles'=> ['Admin']]);
// get consultation-all-familie
Route::get('/consultation-all-familie', ['uses'=>'ConsultationController@show','as'=>'GetingAllFamiliauxElement' ,'middleware' => 'roles' ,'roles'=> ['Admin']]);

     /* route pour Rendez_vous Annulation / Suppression */
 // Annulation admin  annulation-rendez-vous-ad
Route::get('/annulation-rendez-vous-ad', ['uses'=>'RendezVousController@annulation','as'=>'AnnulationRendezVousAdmin' ,'middleware' => 'roles' ,'roles'=> ['Admin']]);
 // Suppression rendez_vous
Route::get('/confirmation-delete', ['uses'=>'RendezVousController@destroy','as'=>'DeleteWithConfirmation' ,'middleware' => 'roles' ,'roles'=> ['Admin']]);



        /*  Route pour Element CRUD */
            /* CRUD Medicament */
Route::post('/add-medicament', ['uses'=>'MedicamentController@store','as'=>'AddMedicament' ,'middleware' => 'roles' ,'roles'=> ['Admin']]);
Route::post('/add-big-medicament', ['uses'=>'MedicamentController@big_store','as'=>'AddBigMedicament' ,'middleware' => 'roles' ,'roles'=> ['Admin']]);

Route::post('/medicament-edit', ['uses'=>'MedicamentController@edit','as'=>'MedicamentEdit' ,'middleware' => 'roles' ,'roles'=> ['Admin']]);
            /* CRUD Antecedent Familiaux ;  Habitudes alcoolo-tabagique ; Chirurgicaux,Complications */
Route::post('/familiaux-edit', ['uses'=>'AntecedentController@EditElementFamiliaux','as'=>'FamiliauxElementEdit' ,'middleware' => 'roles' ,'roles'=> ['Admin']]);
Route::post('/habitudes-alcoolo-tabagique-edit', ['uses'=>'AntecedentController@EditElementHabitudesAlcooloTabagique','as'=>'HabitudesAlcooloTabagiqueElementEdit' ,'middleware' => 'roles' ,'roles'=> ['Admin']]);
Route::post('/chirurgicaux-complications-edit', ['uses'=>'AntecedentController@EditElementChirurgicauxComplicationsEdit','as'=>'ChirurgicauxComplicationsElementEdit' ,'middleware' => 'roles' ,'roles'=> ['Admin']]);
            /* CRUD Motif Consultation */
Route::post('/motif-consultation-edit', ['uses'=>'MotifElementController@edit','as'=>'MotifConsultationElementEdit' ,'middleware' => 'roles' ,'roles'=> ['Admin']]);
            /* CRUD Examan General */
Route::post('/examan-general-edit', ['uses'=>'ExamanCliniqueController@GeneralElementEdit','as'=>'ExamanCliniqueGeneralElementEdit' ,'middleware' => 'roles' ,'roles'=> ['Admin']]);
            /* CRUD Examan Par Appareil */
Route::post('/examan-par_appareil-edit', ['uses'=>'ExamanCliniqueController@ParAppareilElementEdit','as'=>'ExamanParAppareilElementEdit' ,'middleware' => 'roles' ,'roles'=> ['Admin']]);
            /* CRUD Bilan Paraclinique Element  */
Route::post('/bilan-biologie-edit', ['uses'=>'ElementBilanParacliniqueController@BilanParacliniqueBiologieElementEdit','as'=>'BilanParacliniqueBiologieElementEdit' ,'middleware' => 'roles' ,'roles'=> ['Admin']]);
Route::post('/bilan-radiologie-edit', ['uses'=>'ElementBilanParacliniqueController@BilanParacliniqueRadiologieElementEdit','as'=>'BilanParacliniqueRadiologieElementEdit' ,'middleware' => 'roles' ,'roles'=> ['Admin']]);
            /* CRUD Type Bilan  */
Route::post('/type-bilan-biologie-edit', ['uses'=>'TypeBilanConsultationController@EditTypeBiologie','as'=>'EditTypeBiologie' ,'middleware' => 'roles' ,'roles'=> ['Admin']]);
Route::post('/type-bilan-radiologie-edit', ['uses'=>'TypeBilanConsultationController@EditTypeRadiologie','as'=>'EditTypeRadiologie' ,'middleware' => 'roles' ,'roles'=> ['Admin']]);
            /* CRUD Rubriques Medicaux */
Route::post('/medicaux-edit', ['uses'=>'AntecedentController@MedicauxElementEdit','as'=>'MedicauxElementEdit' ,'middleware' => 'roles' ,'roles'=> ['Admin']]);







