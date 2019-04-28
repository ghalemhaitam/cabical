<?php

namespace App\Http\Controllers;

use App\Antecedent;
use App\Consultation;
use App\ElementTypeAntecedent;
use App\ElementTypeBilan;
use App\ElementTypeExaman;
use App\Medicament;
use App\MotifElements;
use App\Prestataire;
use App\RendezVous;
use App\TypeAntecedents;
use App\TypeBilan;
use App\TypeBilanConsultation;
use Illuminate\Http\Request;
use App\Patient;
use App\Http\Requests;
use Illuminate\Support\Facades\Artisan;
use phpDocumentor\Reflection\Types\Null_;
use Validator;
use Response;
use App\Ville;
use Illuminate\Support\Facades\Input;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Artisan::call('migrate', array('--path' => 'app/migrations'));
        $patients = Patient::orderBy('id', 'desc')->get();
        $villes = Ville::all();
        $rendez_vous = RendezVous::where('accepte','oui')->where('annuller','non')->orderBy('date_rendez_vous', 'desc')->paginate(20);
        $consultation_list_all = Consultation::where('valide','OUI')->orderBy('id', 'desc')->get();
        $prestataires = Prestataire::all();

        $medicaments = Medicament::orderBy('nom')->get();
        $type_medicaux = TypeAntecedents::where('nom','Medicaux')->first();
        $rubriques_medicaments = ElementTypeAntecedent::where('type_antecedent_id',$type_medicaux->id)->get();


        $typefamiliaux = TypeAntecedents::where('nom','Familiaux')->first();
        $familiaux = ElementTypeAntecedent::where('type_antecedent_id',$typefamiliaux->id)->get();

        $type_habitudes_alcoolo_tabagique = TypeAntecedents::where('nom','Habitudes alcoolo-tabagique')->first();
        $habitudes_alcoolo_tabagique = ElementTypeAntecedent::where('type_antecedent_id',$type_habitudes_alcoolo_tabagique->id)->get();

        $type_chirurgicaux_complications = TypeAntecedents::where('nom','Chirurgicaux,Complications')->first();
        $chirurgicaux_complications = ElementTypeAntecedent::where('type_antecedent_id',$type_chirurgicaux_complications->id)->get();


        $motif_consultation = MotifElements::all();
        $examan_general = ElementTypeExaman::where('type_examan_clinique_id',1)->get();
        $examan_par_appareil = ElementTypeExaman::where('type_examan_clinique_id',2)->get();

        $bilan_paraclinique_biologie = ElementTypeBilan::where('type_bilan_id',1)->get();
        $bilan_paraclinique_radiologie = ElementTypeBilan::where('type_bilan_id',2)->get();

        $type_bilan_biologie = TypeBilanConsultation::where('type_bilan_id',1)->get();
        $type_bilan_radiologie = TypeBilanConsultation::where('type_bilan_id',2)->get();


        return view('home')
            ->with(['rubriques_medicaments'=>$rubriques_medicaments,'type_bilan_radiologie'=>$type_bilan_radiologie,'type_bilan_biologie'=>$type_bilan_biologie,'bilan_paraclinique_radiologie'=>$bilan_paraclinique_radiologie,'bilan_paraclinique_biologie'=>$bilan_paraclinique_biologie,'examan_par_appareil'=>$examan_par_appareil,'examan_general'=>$examan_general,'motif_consultation'=>$motif_consultation,'chirurgicaux_complications'=>$chirurgicaux_complications,'habitudes_alcoolo_tabagique'=>$habitudes_alcoolo_tabagique,'familiaux'=>$familiaux,'medicaments'=>$medicaments,'prestataires'=>$prestataires,'consultation_list_all'=>$consultation_list_all,'patients'=>$patients,'villes'=>$villes,'rendez_vous'=>$rendez_vous]);

    }

    public function index_secretaire (){
        return view('secretaire');
    }

}
