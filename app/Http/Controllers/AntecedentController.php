<?php

namespace App\Http\Controllers;

use App\Antecedent;
use App\ElementTypeAntecedent;
use App\ElementTypeExaman;
use App\MotifConsultation;
use App\MotifElements;
use App\Patient;
use App\TypeAntecedents;
use App\TypeBilan;
use App\TypeExamanClinique;
use Illuminate\Auth\Access\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class AntecedentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function AntecedentCharge(){

        //return response()->json(['msg' => $nom_type_antecedent]);
        try{
            $nom_type_antecedent = trim(Input::get('id'));
            if($nom_type_antecedent==''){
                return response()->json(['msg' => " "]);
            }

            $type_antecedent = TypeAntecedents::where('nom',$nom_type_antecedent)->first();
            if(count($type_antecedent) <= 0 ){
                return response()->json(['msg' => " "]);
            }
           $element_type_antecedent = ElementTypeAntecedent::where('type_antecedent_id',$type_antecedent->id)->get();

            if(count($element_type_antecedent)> 0 ){
                return response()->json ($element_type_antecedent);

            }else{
                return response()->json(['msg' => " "]);
            }


      }catch (\Exception $e){
            return response()->json(['msg'=>""]);
      }
    }

    public function AntecedentType(Request $request){

        try{
            if($request->ajax()){

                $TypeNew = new ElementTypeAntecedent();
                $TypeNew->nom = $request->nom;
                $type_search = TypeAntecedents::where('nom',$request->type_antecedent)->first();
                $TypeNew->type_antecedent_id = $type_search->id;
                $TypeNew->save();
                return response()->json($TypeNew);

            }
        }catch (\Exception $e){
            return response()->json(['msg'=>""]);
        }
    }

    public function list_all_select_antecedent(){
        try{

            $type = Input::get('type');

            if($type == 'Familiaux'){
                $familiaux = TypeAntecedents::where('nom','Familiaux')->first();


                if(count($familiaux)>0){

                    $element = ElementTypeAntecedent::where('type_antecedent_id',$familiaux->id)->get();
                    return response()->json($element);
                }else{
                    return response()->json(['error'=>""]);
                }
            }else if ($type == 'Medicaux'){

                $medicaux = TypeAntecedents::where('nom','Medicaux')->first();


                if(count($medicaux)>0){
                    $element = ElementTypeAntecedent::where('type_antecedent_id',$medicaux->id)->get();
                    return response()->json($element);
                }else{
                    return response()->json(['error'=>""]);
                }
            }else if ($type == 'Habitudes alcoolo-tabagique'){

                $medicaux = TypeAntecedents::where('nom','Habitudes alcoolo-tabagique')->first();


                if(count($medicaux)>0){
                    $element = ElementTypeAntecedent::where('type_antecedent_id',$medicaux->id)->get();
                    return response()->json($element);
                }else{
                    return response()->json(['error'=>""]);
                }
            }else if ($type == 'Chirurgicaux,Complications'){

                $chirurgiaux = TypeAntecedents::where('nom','Chirurgicaux,Complications')->first();


                if(count($chirurgiaux)>0){
                    $element = ElementTypeAntecedent::where('type_antecedent_id',$chirurgiaux->id)->get();
                    return response()->json($element);
                }else{
                    return response()->json(['error'=>""]);
                }
            }else if ($type == 'MotifsConsultation'){

                $motif_all = MotifElements::all();

                if(count($motif_all)>0){

                    return response()->json($motif_all);
                }else{
                    return response()->json(['error'=>""]);
                }
            }else if($type == 'ExamanCliniqueGeneral') {

                $type_examan = TypeExamanClinique::where('nom', 'General')->first();

                if (count($type_examan) > 0) {
                    $element_type = $type_examan->ElementTypeExamans;
                    if (count($element_type) > 0) {

                        return response()->json($element_type);
                    } else {

                        return response()->json(['error' => ""]);
                    }

                }else {
                    return response()->json(['error' => " "]);
                }
            }else if ($type =='ParAppareil') {

                $type_examan_appareil = TypeExamanClinique::where('nom', 'Par Appareil')->first();

                if (count($type_examan_appareil) > 0) {
                    $element_type = $type_examan_appareil->ElementTypeExamans;

                    if (count($element_type) > 0) {

                        return response()->json($element_type);
                    } else {

                        return response()->json(['error' => ""]);
                    }

                } else {
                    return response()->json(['error' => ""]);
                }
            }else if ($type =='BilanAntecedentBiologie') {

                $type_bilan_biologie = TypeBilan::where('nom', 'Biologie')->first();

                if(count($type_bilan_biologie) > 0) {
                    $element_type = $type_bilan_biologie->ElementTypeBilan;

                    if (count($element_type) > 0) {

                        return response()->json($element_type);
                    }else{

                        return response()->json(['error' => ""]);
                    }

                } else {
                    return response()->json(['error' => ""]);
                }
            }else if ($type =='BilanAntecedentRadiologie') {

                $type_bilan_radiologie = TypeBilan::where('nom', 'Radiologie')->first();

                if(count($type_bilan_radiologie) > 0) {
                    $element_type = $type_bilan_radiologie->ElementTypeBilan;

                    if (count($element_type) > 0) {

                        return response()->json($element_type);
                    }else{

                        return response()->json(['error' => ""]);
                    }

                } else {
                    return response()->json(['error' => ""]);
                }
            }
        }catch (\Exception $e){
            return response()->json(['error'=>""]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        try{
            if($request->ajax()){
                $famil = TypeAntecedents::where('nom','Familiaux')->first();
                $medic = TypeAntecedents::where('nom','Medicaux')->first();
                $habitud = TypeAntecedents::where('nom','Habitudes alcoolo-tabagique')->first();
                $complicat = TypeAntecedents::where('nom','Chirurgicaux,Complications')->first();
                if($request->description_familiaux){


                    $famil = TypeAntecedents::where('nom','Familiaux')->first();


                     Antecedent::where('patient_id',$request->patient_id)->where('type_antecedent_id',$famil->id)->delete();

                    for($i=0;$i<count($request->nom_familiaux);$i++){

                        $familiaux_antecedent = new Antecedent();
                            $element_type_ant = ElementTypeAntecedent::where('nom',$request->nom_familiaux[$i])->first();
                            if(count($element_type_ant) <= 0){
                                return response()->json(['msg'=>"l'element n'existe pas"]);
                            }else{

                                $familiaux_antecedent->nom_element_id= $element_type_ant->id;
                                if(trim($request->description_familiaux[$i]) == ''){
                                    $familiaux_antecedent->description = ' ';
                                }else
                                    {
                                        $familiaux_antecedent->description = trim($request->description_familiaux[$i]);
                                    };
                                $familiaux_antecedent->patient_id = $request->patient_id;
                                $familiaux_antecedent->type_antecedent_id = $element_type_ant->type_antecedent_id;
                                $familiaux_antecedent->save();

                            }

                    }


                }else{
                    Antecedent::where('patient_id',$request->patient_id)->where('type_antecedent_id',$famil->id)->delete();
                }
                if ($request->description_medicaux){


                    Antecedent::where('patient_id',$request->patient_id)->where('type_antecedent_id',$medic->id)->delete();



                    for($j=0 ; $j < count($request->nom_medicaux);$j++){


                        $medicaux_antecedent = new Antecedent();
                        $element_type_ant = ElementTypeAntecedent::where('nom',$request->nom_medicaux[$j])->first();
                        if(count($element_type_ant) <= 0){
                            return response()->json(['msg'=>"l'element n'existe pas"]);
                        }else{

                            $medicaux_antecedent->nom_element_id= $element_type_ant->id;

                            if(trim($request->description_medicaux[$j]) == ''){
                                $medicaux_antecedent->description  = ' ';
                            }else
                            {
                                $medicaux_antecedent->description  = $request->description_medicaux[$j];
                            };

                            $medicaux_antecedent->patient_id = $request->patient_id;
                            $medicaux_antecedent->type_antecedent_id = $element_type_ant->type_antecedent_id;
                            $medicaux_antecedent->save();

                        }
                    }


                }else{
                    Antecedent::where('patient_id',$request->patient_id)->where('type_antecedent_id',$medic->id)->delete();
                }
                if ($request->description_habitude){

                    Antecedent::where('patient_id',$request->patient_id)->where('type_antecedent_id',$habitud->id)->delete();



                    for($h=0 ; $h < count($request->nom_habitude);$h++){


                        $habitud_antecedent = new Antecedent();
                        $element_type_ant = ElementTypeAntecedent::where('nom',$request->nom_habitude[$h])->first();
                        if(count($element_type_ant) <= 0){
                            return response()->json(['msg'=>"l'element n'existe pas"]);
                        }else{

                            if(trim($request->description_habitude[$h]) == ''){
                                $habitud_antecedent->description  = ' ';
                            }else
                            {
                                $habitud_antecedent->description  = trim($request->description_habitude[$h]);
                            };

                            $habitud_antecedent->nom_element_id= $element_type_ant->id;

                            $habitud_antecedent->patient_id = $request->patient_id;
                            $habitud_antecedent->type_antecedent_id = $element_type_ant->type_antecedent_id;
                            $habitud_antecedent->save();

                        }
                    }


                }else{
                    Antecedent::where('patient_id',$request->patient_id)->where('type_antecedent_id',$habitud->id)->delete();
                }

                if($request->description_complications){


                    Antecedent::where('patient_id',$request->patient_id)->where('type_antecedent_id',$complicat->id)->delete();



                    for($p=0 ; $p<count($request->nom_complications);$p++){
                        //return response()->json(count($request->nom_complications));


                        $complication_antecedent = new Antecedent();
                        $element_type_antt = ElementTypeAntecedent::where('nom',$request->nom_complications[$p])->first();


                        if(count($element_type_antt) <= 0){
                            return response()->json(['msg'=>"l'element n'existe pas"]);
                        }else{

                            if(trim($request->description_complications[$p]) == ''){
                                $complication_antecedent->description  = ' ';
                            }else
                            {
                                $complication_antecedent->description  = trim($request->description_complications[$p]);
                            };

                            $complication_antecedent->nom_element_id = $element_type_antt->id;

                            $complication_antecedent->patient_id = $request->patient_id;
                            $complication_antecedent->type_antecedent_id = $element_type_antt->type_antecedent_id;
                            $complication_antecedent->save();


                        }
                    }

                }else{
                    Antecedent::where('patient_id',$request->patient_id)->where('type_antecedent_id',$complicat->id)->delete();
                }
                return response()->json(['success'=>"Sauvegarde avec success"]);


            }
        }catch (\Exception $e){
            return response()->json(['error'=>"Il existe une ERREUR veuillez redémarrer le systeme"]);
        }
    }

    public function EditElementFamiliaux(Request $request){
        try {
            if ($request->ajax()) {

                    $familiauxElement = ElementTypeAntecedent::find($request->familiaux_id_input);

                    if (count($familiauxElement) > 0) {
                        /* validation nom */
                        $familiauxElement->nom = $request->nom_edit_familiaux;
                        $familiauxElement->save();

                        return response()->json($familiauxElement);

                    } else {
                        return response()->json(['error' => "Une erreur est produit. Veuiller réssayer"]);
                    }

            }

        }catch
        (\Exception $e){
            return response()->json(['error' => "Une erreur est produit. Veuiller réssayer"]);
        }
    }

    public  function EditElementHabitudesAlcooloTabagique(Request $request){
        try {
            if ($request->ajax()) {

                $HabitudesAlcooloTabagiqueElement = ElementTypeAntecedent::find($request->Habitudes_alcoolo_tabagique_id_input);

                if (count($HabitudesAlcooloTabagiqueElement) > 0) {
                    /* validation nom */
                    $HabitudesAlcooloTabagiqueElement->nom = $request->nom_edit_Habitudes_alcoolo_tabagique;
                    $HabitudesAlcooloTabagiqueElement->save();

                    return response()->json($HabitudesAlcooloTabagiqueElement);

                } else {
                    return response()->json(['error' => "Une erreur est produit. Veuiller réssayer"]);
                }

            }

        }catch
        (\Exception $e){
            return response()->json(['error' => "Une erreur est produit. Veuiller réssayer"]);
        }
    }

    public function EditElementChirurgicauxComplicationsEdit(Request $request){
        try {
            if ($request->ajax()) {

                $ChirurgicauxComplicationsElement = ElementTypeAntecedent::find($request->Chirurgicaux_Complications_id_input);

                if (count($ChirurgicauxComplicationsElement) > 0) {
                    /* validation nom */
                    $ChirurgicauxComplicationsElement->nom = $request->nom_edit_Chirurgicaux_Complications;
                    $ChirurgicauxComplicationsElement->save();

                    return response()->json($ChirurgicauxComplicationsElement);

                } else {
                    return response()->json(['error' => "Une erreur est produit. Veuiller réssayer"]);
                }

            }

        }catch
        (\Exception $e){
            return response()->json(['error' => "Une erreur est produit. Veuiller réssayer"]);
        }
    }

    public function MedicauxElementEdit(Request $request){
        try {
            if ($request->ajax()) {

                $medicauxElement = ElementTypeAntecedent::find($request->rubrique_medicaux_id_input);

                if (count($medicauxElement) > 0) {
                    /* validation nom */
                    $medicauxElement->nom = $request->nom_edit_rubrique_medicaux;
                    $medicauxElement->save();

                    return response()->json($medicauxElement);

                } else {
                    return response()->json(['error' => "Une erreur est produit. Veuiller réssayer"]);
                }

            }

        }catch
        (\Exception $e){
            return response()->json(['error' => "Une erreur est produit. Veuiller réssayer"]);
        }
    }

    public function searching_name_antecedent(){
        try{

            $element_type_id = Input::get('nom_element_id');
            $element = ElementTypeAntecedent::find($element_type_id);

            if(count($element)>0){
                return response()->json(['nom'=>$element->nom]);
            }else{
                return response()->json(['error'=>" "]);
            }



        }catch(\Exception $e){
            return response()->json(['error'=>" "]);
        }
    }
}
