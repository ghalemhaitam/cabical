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
use App\Patient;
use App\Prestataire;
use App\RendezVous;
use App\TypeBilanConsultation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class RendezVousController extends Controller
{
    public function index()
    {
        //
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

    public function annulation()
    {
        try{
            $rendez_vous_id = Input::get('id');

            $rendez_vous = RendezVous::find($rendez_vous_id);
            if(count($rendez_vous) > 0){
                $rendez_vous->annuller = 'OUI';
                $rendez_vous->save();

                return response()->json(['success'=>' ','id_rendez_vous'=>$rendez_vous_id]);
            }else{
                return response()->json(['error'=>' ']);
            }
        }catch (\Exception $e){
            return response()->json(['error'=>' ']);
        }



    }



    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        //
    }


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

            $type = Input::get('type');


            if($type == 'rendez_vous'){
                $rendez_vous_id = Input::get('id');
                $rendez_vous = RendezVous::find($rendez_vous_id);
                if(count($rendez_vous) > 0){
                    $rendez_vous->delete();
                    return response()->json(['success'=>' ','id_rendez_vous'=>$rendez_vous_id]);

                }else{
                    return response()->json(['error'=>' ']);
                }
            }else if ($type == 'consultation') {
                // delete consultation
                $consultation_id = Input::get('id');
                $consultation = Consultation::find($consultation_id);
                if(count($consultation) > 0){

                    if(count($consultation->MotifConsultations) > 0){
                        foreach ($consultation->MotifConsultations as $c_n_v_motif){

                            $c_n_v_motif->delete();
                        }
                    }
                    if(count($consultation->ExamansClinique) > 0){
                        foreach ($consultation->ExamansClinique as $c_n_v_e_c){
                            $c_n_v_e_c->delete();
                        }
                    }
                    if(count($consultation->BilanParaclinique) > 0){
                        foreach ($consultation->BilanParaclinique as $c_n_v_b_p){
                            $c_n_v_b_p->delete();
                        }
                    }

                    if(count($consultation->Ordonnance) > 0){

                        if(count($consultation->Ordonnance->OrdonnanceDetails) > 0){
                            foreach ($consultation->Ordonnance->OrdonnanceDetails as $c_n_v_o_d){
                                $c_n_v_o_d->delete();
                            }
                            $consultation->Ordonnance->delete();
                        }else{
                            $consultation->Ordonnance->delete();
                        }
                    }

                    if(count($consultation->BilanConsultation) > 0){
                        foreach ($consultation->BilanConsultation as $c_n_v_b){
                            $c_n_v_b->delete();
                        }

                    }

                    $certificat = CertificatMedical::where('consultation_id',$consultation->id)->first();
                    if(count($certificat) == 1){

                        $certificat->delete();

                    }

                    $consultation->delete();
                    return response()->json(['success'=>' ','id_consultation'=>$consultation->id]);


                }else{
                    return response()->json(['error'=>' ']);
                }

            }else if($type =='patient') {

                $patient_id = Input::get('id');
                $patient = Patient::find($patient_id);


                if(count($patient)>0){
                    $consultation = Consultation::where('patient_id',$patient->id)->get();
                    $rendez_vous = RendezVous::where('patient_id',$patient->id)->get();


                   if(count($consultation)>0 ){
                       foreach ($consultation as $p_c){

                           if(count($p_c->MotifConsultations) > 0){
                               foreach ($p_c->MotifConsultations as $c_n_v_motif){

                                   $c_n_v_motif->delete();
                               }
                           }
                           if(count($p_c->ExamansClinique) > 0){
                               foreach ($p_c->ExamansClinique as $c_n_v_e_c){
                                   $c_n_v_e_c->delete();
                               }
                           }
                           if(count($p_c->BilanParaclinique) > 0){
                               foreach ($p_c->BilanParaclinique as $c_n_v_b_p){
                                   $c_n_v_b_p->delete();
                               }
                           }

                           if(count($p_c->Ordonnance) > 0){

                               if(count($p_c->Ordonnance->OrdonnanceDetails) > 0){
                                   foreach ($p_c->Ordonnance->OrdonnanceDetails as $c_n_v_o_d){
                                       $c_n_v_o_d->delete();
                                   }
                                   $p_c->Ordonnance->delete();
                               }else{
                                   $p_c->Ordonnance->delete();
                               }
                           }

                           if(count($p_c->BilanConsultation) > 0){
                               foreach ($p_c->BilanConsultation as $c_n_v_b){
                                   $c_n_v_b->delete();
                               }

                           }

                           $certificat = CertificatMedical::where('consultation_id',$p_c->id)->first();
                           if(count($certificat) == 1){

                               $certificat->delete();

                           }
                           if(count($rendez_vous)>0){
                               foreach ($rendez_vous as $r_v){
                                   $r_v->delete();
                               }
                           }
                           if(count($patient->Antecedents)>0){
                               foreach ($patient->Antecedents as $p_a){
                                   $p_a->delete();
                               }
                           }

                           $p_c->delete();
                       }
                   }
                   $patient->delete();

                    return response()->json(['success'=>' ','id_patient'=>$patient->id]);

                }else{
                    return response()->json(['error'=>' ']);
                }



            }else if($type == 'prestataire'){

                $prestataire_id = Input::get('id');
                $prestataire = Prestataire::find($prestataire_id);

                if(count($prestataire)>0){

                    if(count($prestataire->BilanConsultations)>0){
                        foreach ($prestataire->BilanConsultations as $p_bilan){
                            $p_bilan->delete();
                        }
                    }

                    $prestataire->delete();
                    return response()->json(['success'=>' ','id_prestataire'=>$prestataire->id]);


                }else{
                    return response()->json(['error'=>' ']);
                }
            }else if($type == 'medicament'){

                $medicament_id = Input::get('id');
                $medicament = Medicament::find($medicament_id);

                if(count($medicament)>0){

                    $medicament->delete();
                    return response()->json(['success'=>' ','id_medicament'=>$medicament->id]);

                }else{
                    return response()->json(['error'=>"Il n'existe pas ce médicament !"]);
                }
            }else if($type == 'familiaux'){

                $familiaux_id = Input::get('id');
                $familiaux = ElementTypeAntecedent::find($familiaux_id);

                if(count($familiaux)>0){
                    $familiaux_get_antecedent =Antecedent::where('nom_element_id',$familiaux->id)->get();
                    if(count($familiaux_get_antecedent) >0){
                        foreach ($familiaux_get_antecedent as $f_g_a){
                            $f_g_a->delete();
                        }
                    }


                    $familiaux->delete();
                    return response()->json(['success'=>' ','id_familiaux'=>$familiaux->id]);

                }else{
                    return response()->json(['error'=>"Il n'existe pas ce familiaux !"]);
                }
            }else if($type == 'Habitudes alcoolo-tabagique'){

                $habitudes_alcoolo_tabagique_id = Input::get('id');
                $habitudes_alcoolo_tabagique = ElementTypeAntecedent::find($habitudes_alcoolo_tabagique_id);

                if(count($habitudes_alcoolo_tabagique)>0){

                    $habitudes_alcoolo_tabagique_get_antecedent =Antecedent::where('nom_element_id',$habitudes_alcoolo_tabagique->id)->get();
                    if(count($habitudes_alcoolo_tabagique_get_antecedent) >0){
                        foreach ($habitudes_alcoolo_tabagique_get_antecedent as $h_a_t_g_a){
                            $h_a_t_g_a->delete();
                        }
                    }


                    $habitudes_alcoolo_tabagique->delete();
                    return response()->json(['success'=>' ','id_habitudes_alcoolo_tabagique'=>$habitudes_alcoolo_tabagique->id]);

                }else{
                    return response()->json(['error'=>"Il n'existe pas l'élément !"]);
                }
            }else if($type == 'Chirurgicaux,Complications'){

                $chirurgicaux_complications_id = Input::get('id');
                $chirurgicaux_complications = ElementTypeAntecedent::find($chirurgicaux_complications_id);

                if(count($chirurgicaux_complications)>0){


                    $chirurgicaux_complications_get_antecedent =Antecedent::where('nom_element_id',$chirurgicaux_complications->id)->get();
                    if(count($chirurgicaux_complications_get_antecedent) >0){
                        foreach ($chirurgicaux_complications_get_antecedent as $c_c_g_a){
                            $c_c_g_a->delete();
                        }
                    }

                    $chirurgicaux_complications->delete();
                    return response()->json(['success'=>' ','id_chirurgicaux_complications'=>$chirurgicaux_complications->id]);

                }else{
                    return response()->json(['error'=>"Il n'existe pas l'élément !"]);
                }
            }else if($type == 'Motif Consultation'){

                $motif_consultation_id = Input::get('id');
                $motif_consultation = MotifElements::find($motif_consultation_id);

                if(count($motif_consultation)>0){

                    $motif_consultation->delete();
                    return response()->json(['success'=>' ','id_motif_consultation'=>$motif_consultation->id]);

                }else{
                    return response()->json(['error'=>"Il n'existe pas l'élément !"]);
                }
            }else if($type == 'General'){

                $examan_general_id = Input::get('id');
                $examan_general = ElementTypeExaman::find($examan_general_id);

                if(count($examan_general)>0){

                    $examan_general->delete();
                    return response()->json(['success'=>' ','id_examan_general'=>$examan_general->id]);

                }else{
                    return response()->json(['error'=>"Il n'existe pas l'élément !"]);
                }
            }else if($type == 'Par Appareil'){

                $examan_par_appareil_id = Input::get('id');
                $examan_par_appareil = ElementTypeExaman::find($examan_par_appareil_id);

                if(count($examan_par_appareil)>0){

                    $examan_par_appareil->delete();
                    return response()->json(['success'=>' ','id_examan_par_appareil'=>$examan_par_appareil->id]);

                }else{
                    return response()->json(['error'=>"Il n'existe pas l'élément !"]);
                }
            }else if($type == 'Biologie'){

                $bilan_biologie_id = Input::get('id');
                $bilan_biologie = ElementTypeBilan::find($bilan_biologie_id);

                if(count($bilan_biologie)>0){

                    $bilan_biologie->delete();
                    return response()->json(['success'=>' ','id_bilan_biologie'=>$bilan_biologie->id]);

                }else{
                    return response()->json(['error'=>"Il n'existe pas l'élément !"]);
                }
            }else if($type == 'Radiologie'){

                $bilan_radiologie_id = Input::get('id');
                $bilan_radiologie = ElementTypeBilan::find($bilan_radiologie_id);

                if(count($bilan_radiologie)>0){

                    $bilan_radiologie->delete();
                    return response()->json(['success'=>' ','id_bilan_radiologie'=>$bilan_radiologie->id]);

                }else{
                    return response()->json(['error'=>"Il n'existe pas l'élément !"]);
                }
            }else if($type == 'Type Bilan Biologie'){

                $bilan_type_biologie_id = Input::get('id');
                $bilan_type_biologie = TypeBilanConsultation::find($bilan_type_biologie_id);

                if(count($bilan_type_biologie)>0){

                    $bilan_type_biologie->delete();
                    return response()->json(['success'=>' ','id_type_bilan_biologie'=>$bilan_type_biologie->id]);

                }else{
                    return response()->json(['error'=>"Il n'existe pas l'élément !"]);
                }
            }else if($type == 'Type Bilan Radiologie'){

                $bilan_type_radiologie_id = Input::get('id');
                $bilan_type_radiologie = TypeBilanConsultation::find($bilan_type_radiologie_id);

                if(count($bilan_type_radiologie)>0){

                    $bilan_type_radiologie->delete();
                    return response()->json(['success'=>' ','id_type_bilan_radiologie'=>$bilan_type_radiologie->id]);

                }else{
                    return response()->json(['error'=>"Il n'existe pas l'élément !"]);
                }
            }else if($type == 'Medicaux'){

                $medicaux_id = Input::get('id');
                $medicaux = ElementTypeAntecedent::find($medicaux_id);

                if(count($medicaux)>0){
                    $medicaux_get_antecedent =Antecedent::where('nom_element_id',$medicaux->id)->get();
                    if(count($medicaux_get_antecedent) >0){

                        foreach ($medicaux_get_antecedent as $m_g_a){
                            $m_g_a->delete();
                        }
                    }

                    $medicaux->delete();
                    return response()->json(['success'=>' ','id_medicaux'=>$medicaux->id]);

                }else{
                    return response()->json(['error'=>"Il n'existe pas l'élément !"]);
                }
            }else
            {
                return response()->json(['error'=>"Il n'existe pas l'élément "]);
            }
        }catch (\Exception $e){
            return response()->json(['error'=>"Un erreur s'est produit .Veuiller réssayer !"]);
        }
    }
}
