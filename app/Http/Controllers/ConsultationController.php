<?php

namespace App\Http\Controllers;

use App\Antecedent;
use App\CertificatMedical;
use App\Consultation;
use App\ElementTypeAntecedent;
use App\ElementTypeBilan;
use App\ElementTypeExaman;
use App\Medicament;
use App\MotifElements;
use App\MotifsRendezVous;
use App\Ordonnance;
use App\Patient;
use App\Prestataire;
use App\RendezVous;
use App\TypeAntecedents;
use App\TypeBilan;
use App\TypeBilanConsultation;
use App\TypeCertification;
use App\TypeExamanClinique;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use League\Flysystem\Exception;
use Symfony\Component\HttpFoundation\IpUtils;

class ConsultationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{

            $id = Input::get('id');

            $consultation = Consultation::find($id);

            if((count($consultation)>0)){


                return response()->json($consultation);

            }else{
                return response()->json(['error'=>'non']);
            }

        }catch (\Exception $e){
            return response()->json(['error'=>'non']);
        }
    }

    public function searching_antecedent(){
        try{

            $patient_id = Input::get('id');
            $typeantecedent_nom = Input::get('antecedent');

            $patient = Patient::find($patient_id);
            $typeantecedent = TypeAntecedents::where('nom',$typeantecedent_nom)->first();


            if((count($patient)>0)&&(count($typeantecedent)>0)){

                $antecedent_familaux = ElementTypeAntecedent::where('type_antecedent_id',$typeantecedent->id)->get();
                $antecedent_familiaux_patient = Antecedent::where('patient_id',$patient->id)->where('type_antecedent_id',$typeantecedent->id)->get();

                if((count($antecedent_familaux)>0)&&(count($antecedent_familiaux_patient)>=0)){
                    return response()->json(['antecedent_familiaux_patient'=>$antecedent_familiaux_patient,'antecedent_familiaux'=>$antecedent_familaux]);
                }else{
                    return response()->json(['error'=>'a ']);
                }

            }else{
                return response()->json(['error'=>'b ']);
            }


        }catch (\Exception $e){
            return response()->json(['error'=>'c ']);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function GetingAllConsultationInfo()
    {
        try{

            $consultation_id = Input::get('consultation_id');
            $consultation = Consultation::find($consultation_id);

            if( count($consultation) > 0 ){

                if(count($consultation->MotifConsultations)>0){

                    $motifs_consultation = $consultation->MotifConsultations;

                }else{

                    $motifs_consultation = 1;
                }

                // get consultation examan
                if(count($consultation->ExamansClinique)>0){

                    $examan_clinique_consultation = [];
                    $examan_clinique_consultation_par_appareil = [];

                    foreach ($consultation->ExamansClinique as $es_c){
                        if(count($es_c) == 1){
                            $e_e_c = $es_c->ElementTypeExaman;

                            $type_examan_general = TypeExamanClinique::where('id',$e_e_c->type_examan_clinique_id)->where('nom','General')->first();
                            $type_examan_par_appareil = TypeExamanClinique::where('id',$e_e_c->type_examan_clinique_id)->where('nom','Par Appareil')->first();

                            if(count($type_examan_general)>0){

                                array_push($examan_clinique_consultation, $es_c);
                            }
                            if(count($type_examan_par_appareil)>0){

                                array_push($examan_clinique_consultation_par_appareil,$es_c);
                            }

                        }else{

                            foreach ($es_c->ElementTypeExaman as $e_e_c){

                                $type_examan_general = TypeExamanClinique::where('id',$e_e_c->type_examan_clinique_id)->where('nom','General')->first();
                                $type_examan_par_appareil = TypeExamanClinique::where('id',$e_e_c->type_examan_clinique_id)->where('nom','Par Appareil')->first();

                                if(count($type_examan_general)>0){
                                    array_push($examan_clinique_consultation, $es_c);
                                }
                                if(count($type_examan_par_appareil)>0){

                                    array_push($examan_clinique_consultation_par_appareil,$es_c);
                                }
                            }
                        }
                    }

                }else{
                    $examan_clinique_consultation = 1;
                    $examan_clinique_consultation_par_appareil = 1;
                }

                if(count($examan_clinique_consultation)==0){
                    $examan_clinique_consultation = 1;
                }
                if(count($examan_clinique_consultation_par_appareil)==0){
                    $examan_clinique_consultation_par_appareil = 1;
                }
                // get consultation Bilan Paraclinique

                if(count($consultation->BilanParaclinique)>0){

                    $bilan_biologie_consultation = [];
                    $bilan_radiologie_consultation = [];

                    foreach ($consultation->BilanParaclinique as $b_p){
                        if(count($b_p) == 1){
                            $e_b_c = $b_p->ElementTypeBilan;

                            $type_bilan_biologie = TypeBilan::where('id',$e_b_c->type_bilan_id)->where('nom','Biologie')->first();
                            $type_bilan_radiologie = TypeBilan::where('id',$e_b_c->type_bilan_id)->where('nom','Radiologie')->first();

                            if(count($type_bilan_biologie)>0){

                                array_push($bilan_biologie_consultation, $b_p);
                            }
                            if(count($type_bilan_radiologie)>0){

                                array_push($bilan_radiologie_consultation,$b_p);
                            }

                        }else{
                            foreach ($b_p->ElementTypeBilan as $e_b_c){

                                $type_bilan_biologie = TypeBilan::where('id',$e_b_c->type_bilan_id)->where('nom','Biologie')->first();
                                $type_bilan_radiologie = TypeBilan::where('id',$e_b_c->type_bilan_id)->where('nom','Radiologie')->first();

                                if(count($type_bilan_biologie)>0){
                                    array_push($bilan_biologie_consultation, $b_p);
                                }
                                if(count($type_bilan_radiologie)>0){

                                    array_push($bilan_radiologie_consultation,$b_p);
                                }
                            }
                        }
                    }
                }else{
                    $bilan_biologie_consultation = 1;
                    $bilan_radiologie_consultation = 1;
                }
                if(count($bilan_biologie_consultation)==0){
                    $bilan_biologie_consultation = 1;
                }
                if(count($bilan_radiologie_consultation)==0){
                    $bilan_radiologie_consultation = 1;
                }

                // get consultation Certificat
                $certificat = CertificatMedical::where('consultation_id',$consultation->id)->first();

                if(count($certificat)>0){
                    $certifica_medical_consultation = $certificat;

                }else{
                    $certifica_medical_consultation = -1;
                }

                //get consultation ordonnance
                if(count($consultation->Ordonnance)>0){
                    if(count($consultation->Ordonnance->OrdonnanceDetails)>0){

                        if(count($consultation->Ordonnance->OrdonnanceDetails)>0){
                            $ordonnance_detail = $consultation->Ordonnance->OrdonnanceDetails ;
                        }else{
                            $ordonnance_detail =-1;
                        }
                    }else{
                        $ordonnance_detail =-1;
                    }
                }else{
                    $ordonnance_detail =-1;
                }

                //get consultation bilan consulatation final
                if(count($consultation->BilanConsultation)>0){

                    $bilan_biologie = [];
                    $bilan_radiologie = [];

                    foreach ($consultation->BilanConsultation as $b_p){
                        if(count($b_p) == 1){
                            $e_b_c = $b_p->TypeBilanConsultation;

                            $type_bilan_biologie = TypeBilan::where('id',$e_b_c->type_bilan_id)->where('nom','Biologie')->first();
                            $type_bilan_radiologie = TypeBilan::where('id',$e_b_c->type_bilan_id)->where('nom','Radiologie')->first();

                            if(count($type_bilan_biologie)>0){

                                array_push($bilan_biologie, $b_p);
                            }
                            if(count($type_bilan_radiologie)>0){

                                array_push($bilan_radiologie,$b_p);
                            }


                        }else{
                            foreach ($b_p->TypeBilanConsultation as $e_b_c){

                                $type_bilan_biologie = TypeBilan::where('id',$e_b_c->type_bilan_id)->where('nom','Biologie')->first();
                                $type_bilan_radiologie = TypeBilan::where('id',$e_b_c->type_bilan_id)->where('nom','Radiologie')->first();

                                if(count($type_bilan_biologie)>0){
                                    array_push($bilan_biologie, $b_p);
                                }
                                if(count($type_bilan_radiologie)>0){

                                    array_push($bilan_radiologie,$b_p);
                                }
                            }
                        }
                    }
                }else{
                    $bilan_biologie = 1;
                    $bilan_radiologie = 1;
                }
                if(count($bilan_biologie)==0){
                    $bilan_biologie = 1;
                }
                if(count($bilan_radiologie)==0){
                    $bilan_radiologie = 1;
                }



                return response()->json(['bilan_biologie_consultation'=>$bilan_biologie,'bilan_radiologie_consultation'=>$bilan_radiologie,'ordonnance_detail'=>$ordonnance_detail,'certifica_medical'=>$certifica_medical_consultation,'bilan_radiologie'=>$bilan_radiologie_consultation,'bilan_biologie'=>$bilan_biologie_consultation,'examan_clinique_par_appareil'=>$examan_clinique_consultation_par_appareil,'examan_clinique'=>$examan_clinique_consultation,'consultation'=>$consultation,'motifs'=>$motifs_consultation]);

            }else{
                return response()->json(['error'=>' ']);
            }


        }catch (\Exception $e){
            return response()->json(['error'=>'non']);
        }

    }

    public function searching_name_bilan_final_element(){

        try{

            $prestataire_id = Input::get('nom_prestataire_id');
            $type = Input::get('type');
            $type_bilan_consultation = Input::get('type_bilan_consultation');
            if($type == 'BilanConsultationRadiologie'){

                $prestataire = Prestataire::find($prestataire_id);
                $type_bilan = TypeBilanConsultation::find($type_bilan_consultation);

                if((count($prestataire)>0)&&(count($type_bilan)>0)){
                    return response()->json(['nom_prestataire'=>$prestataire->nom,'nom_type_bilan'=>$type_bilan->nom]);
                }else{
                    return response()->json(['error'=>" "]);
                }

            }else if($type == 'BilanConsultationBiologie'){

                $prestataire = Prestataire::find($prestataire_id);
                $type_bilan = TypeBilanConsultation::find($type_bilan_consultation);

                if((count($prestataire)>0)&&(count($type_bilan)>0)){
                    return response()->json(['nom_prestataire'=>$prestataire->nom,'nom_type_bilan'=>$type_bilan->nom]);
                }else{
                    return response()->json(['error'=>" "]);
                }
            }


        }catch (\Exception $e){
            return response()->json(['error'=>'non']);
        }
    }




    public function GetingNameAllByIdAntecedent(){
         try{
             $antecedent_id = Input::get('id-antecedent');

             $antecedent = Antecedent::find($antecedent_id);

             if((count($antecedent) > 0)){

                 $patient = Patient::find($antecedent->patient_id);
                 $type_element = ElementTypeAntecedent::find($antecedent->nom_element_id);
                 if((count($patient)>0)&&(count($type_element)>0)){
                    return response()->json(['patient'=>$patient->nom,'elementtype'=>$type_element->nom]);

                 }else{
                     return response()->json(['error'=>'non']);
                 }
             }else{
                 return response()->json(['error'=>'non']);
             }

         }catch (\Exception $e){
             return response()->json(['error'=>'non']);
         }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        try{
            $id = Input::get('id');
            $type = Input::get('type');
            $patient = Patient::find($id);
            $type_search = MotifsRendezVous::where('nom',$type)->first();
            if((count($patient)>0) && (count($type_search)>0)){

                $consultation = new Consultation();
                $consultation->patient_id =$patient->id ;
                $consultation->type_id =$type_search->id ;
                $consultation->date_consultation = date("Y-m-d H:i:s");
                $consultation->save();

                $ordonnance = new Ordonnance();
                $ordonnance->consultation_id = $consultation->id;
                $ordonnance->save();

                return response()->json($consultation);
            }else{
                return response()->json(['error'=>'non']);
            }

        }catch (\Exception $e){
            return response()->json(['error'=>'non']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function save_finish(Request $request)
    {
        try{
            if($request->ajax()){
               $consultation = Consultation::find($request->consultation_id);
               $rendez_vous = RendezVous::find($request->rendez_vous_id);


                if(count($consultation) > 0){
                    if(count($rendez_vous) > 0){
                        if(trim($request->remarque) ==''){

                            $consultation->remarque = " ";
                            $consultation->valide = "OUI";
                            $consultation->save();

                            $get_id_rendez_vous = $rendez_vous->id;
                            $rendez_vous->delete();

                            return response()->json(['rendez_vous_id'=>$get_id_rendez_vous,'consultation'=>$consultation]);
                        }else{
                            $consultation->remarque = trim($request->remarque);
                            $consultation->valide = "OUI";
                            $consultation->save();

                            $get_id_rendez_vous = $rendez_vous->id;
                            $rendez_vous->delete();

                            return response()->json(['rendez_vous_id'=>$get_id_rendez_vous,'consultation'=>$consultation]);
                        }
                    }else if(count($rendez_vous) == 0){

                        if(trim($request->remarque) ==''){
                            $consultation->remarque = " ";
                            $consultation->valide = "OUI";

                            $consultation->save();


                            return response()->json(['edit'=>$consultation]);
                        }else{
                            $consultation->remarque = trim($request->remarque);
                            $consultation->valide = "OUI";

                            $consultation->save();


                            return response()->json(['edit'=>$consultation]);
                        }

                    }else{
                        return response()->json(['error'=>"1"]);
                    }
                }else{
                    return response()->json(['error'=>"2"]);
                }
            }else{
                return response()->json(['error'=>"3"]);
            }
        }catch (\Exception $e){
            return response()->json(['error'=>"4"]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        try{

            $consultation_non_valide = Consultation::where('valide','NON')->get();
            if(count($consultation_non_valide) > 0){

                foreach ($consultation_non_valide as $c_n_v){

                    if(count($c_n_v->MotifConsultations) > 0){
                        foreach ($c_n_v->MotifConsultations as $c_n_v_motif){

                            $c_n_v_motif->delete();
                        }
                    }
                    if(count($c_n_v->ExamansClinique) > 0){
                        foreach ($c_n_v->ExamansClinique as $c_n_v_e_c){
                            $c_n_v_e_c->delete();
                        }
                    }
                    if(count($c_n_v->BilanParaclinique) > 0){
                        foreach ($c_n_v->BilanParaclinique as $c_n_v_b_p){
                            $c_n_v_b_p->delete();
                        }
                    }

                    if(count($c_n_v->Ordonnance) > 0){

                        if(count($c_n_v->Ordonnance->OrdonnanceDetails) > 0){
                            foreach ($c_n_v->Ordonnance->OrdonnanceDetails as $c_n_v_o_d){
                                $c_n_v_o_d->delete();
                            }
                            $c_n_v->Ordonnance->delete();
                        }else{
                            $c_n_v->Ordonnance->delete();
                        }
                    }

                    if(count($c_n_v->BilanConsultation) > 0){
                        foreach ($c_n_v->BilanConsultation as $c_n_v_b){
                            $c_n_v_b->delete();
                        }

                    }

                    $certificat = CertificatMedical::where('consultation_id',$c_n_v->id)->first();
                    if(count($certificat) == 1){

                        $certificat->delete();

                    }

                    $c_n_v->delete();

                }
                return response()->json($consultation_non_valide);
            }else{
                return response()->json(['success'=>' ']);
            }

        }catch (\Exception $e){
            return response()->json(['error'=>' ']);
        }
    }

    public function searching_name_element(){
        try{

            $element_type_id = Input::get('nom_element_id');
            $type = Input::get('type');

            if($type =='MotifsElement'){

                $element = MotifElements::find($element_type_id);

                if(count($element)>0){
                    return response()->json(['nom'=>$element->nom]);
                }else{
                    return response()->json(['error'=>" "]);
                }

            }else if($type =='ExamanCliniqueGeneral') {

                $element = ElementTypeExaman::find($element_type_id);

                if(count($element)>0){
                    return response()->json(['nom'=>$element->nom]);
                }else{
                    return response()->json(['error'=>" "]);
                }

            }else if($type =='ExamanCliniqueParAppareil') {

                $element = ElementTypeExaman::find($element_type_id);

                if(count($element)>0){
                    return response()->json(['nom'=>$element->nom]);
                }else{
                    return response()->json(['error'=>" "]);
                }

            }else if($type == 'BilanAntecedentBiologie'){

                $element = ElementTypeBilan::find($element_type_id);

                if(count($element)>0){
                    return response()->json(['nom'=>$element->nom]);
                }else{
                    return response()->json(['error'=>" "]);
                }

            }else if($type == 'BilanAntecedentRadiologie'){

                $element = ElementTypeBilan::find($element_type_id);

                if(count($element)>0){
                    return response()->json(['nom'=>$element->nom]);
                }else{
                    return response()->json(['error'=>" "]);
                }

            }else if($type == 'TypeCertificat'){

                $element = TypeCertification::find($element_type_id);

                if(count($element)>0){
                    return response()->json(['nom'=>$element->nom]);
                }else{
                    return response()->json(['error'=>" "]);
                }

            }else if($type == 'Medicament'){
                $element = Medicament::find($element_type_id);

                if(count($element)>0){
                    return response()->json(['nom'=>$element->nom]);
                }else{
                    return response()->json(['error'=>" "]);
                }
            }else{
                return response()->json(['error'=>" "]);
            }

        }catch(\Exception $e){
            return response()->json(['error'=>" "]);
        }
    }
}
