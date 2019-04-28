<?php

namespace App\Http\Controllers;

use App\Consultation;
use App\MotifsRendezVous;
use App\RendezVous;
use Illuminate\Http\Request;
use App\Patient;
use App\Http\Requests;
use phpDocumentor\Reflection\Types\Null_;
use Validator;
use Response;
use App\Ville;
use Illuminate\Support\Facades\Input;





class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function admin()
    {

    }
    public function secretary()
    {

    }
    public function index()
    {

        $patients = Patient::orderBy('id', 'desc')->get();
        $villes = Ville::all();

        return view('home')
            ->with(['patients'=>$patients,'villes'=>$villes]);

    }
   public function FindPatient(){
       try{

           $patient_id = Input::get('patient');
           $type_id = Input::get('type');

           $patient = Patient::find($patient_id);
           $type = MotifsRendezVous::find($type_id);


           if((count($patient)>0)&&(count($type)>0)){

               return response()->json(['patient_nom'=>$patient->nom,'type'=>$type->nom]);

           }else{
               return response()->json(['error'=>'b']);
           }


       }catch (\Exception $e){
           return response()->json(['error'=>'c']);
       }
   }


   public function FindPatientConsultation (){
       try{

           $patient_id = Input::get('id');
           $patient = Patient::find($patient_id);

           if(count($patient)>0){

               $patient_rendez_vous = RendezVous::where('patient_id',$patient->id)->where('accepte','OUI')->where('annuller','NON')->get();
               $patient_consultations = Consultation::where('patient_id',$patient->id)->where('valide','OUI')->get();


               return response()->json(['consultations'=>$patient_consultations,'rendez_vous'=>$patient_rendez_vous]);

           }else{
               return response()->json(['error'=>' ']);
           }


       }catch (\Exception $e){
           return response()->json(['error'=>' ']);
       }
   }


    public function VueCrudPatient(){
            return view('/Admin/Patients');

    }

    public function create()
    {
        dd('create');
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
                // return response()->json($request);

                $patient = new Patient();
                $cin_add_recherche = Patient::where('cin',$request->cin_add)->first();
                if($cin_add_recherche == null){
                    $patient->cin = $request->cin_add;
                }else{
                    return response()->json(['msg'=>"La CIN existe déjà !"]);
                }

                $patient->nom = $request->nom_add;

                $patient->prenom = $request->prenom_add;
                $patient->sexe = $request->sexe_add;
                $email_add_recherche = Patient::where('email',$request->email_add)->first();
                if($email_add_recherche == null){
                    $patient->email = $request->email_add;
                }else{
                    return response()->json(['msg'=>"L'Email existe déjà !"]);
                }

                $patient->date_naissance = date("Y-m-d", strtotime($request->date_naissance_add));
                $patient->tel1 = $request->tel1_add;
                $patient->tel2 = $request->tel2_add;

                if(trim($request->mutuelle2_add == '')){
                    $patient->mutuelle = '---';
                }else{
                    $patient->mutuelle = $request->mutuelle2_add;
                }

                if(trim($request->ville2_add) == ''){

                    $ville = Ville::where('nom',trim($request->ville_add))->first();

                    if($ville == null){
                    }else{
                        $patient->ville_id = $ville->id;
                    }

                }else{

                    $ville_existe = Ville::where('nom',$request->ville2_add)->first();

                    if($ville_existe == null){
                        $VILLE= new Ville();
                        $VILLE->nom = $request->ville2_add;
                        $VILLE->save();


                        $ville_recherche = Ville::where('nom',$request->ville2_add)->first();


                        if($ville_recherche == null){

                            return response()->json(['msg'=>"Votre ville n'est pas bien Ajouter"]);
                        }else{

                            $patient->ville_id = $ville_recherche->id;

                        }
                    }else{
                        return response()->json(['msg'=>'La Ville que vous avez ajouté existe déjà']);
                    }
                }
                //return response()->json($patient);


                if($patient->save()){
                    return response()->json($patient);
                }else{
                    return response()->json(['msg'=>'Not Iserted']);
                }

            }
        } catch (\Exception $e){
            return response()->json(['msg'=>"Erreur ! Retapez vos données s'il vous plaît"]);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {

        try{

            if($request->ajax()){
                $patient = Patient::find($request->id);

                //return response()->json($request);
                //return response()->json($patient);
                $patient->cin = $request->cin;
                $patient->nom = $request->nom;

                $patient->prenom = $request->prenom;
                $patient->sexe = $request->sexe;
                $patient->email = $request->email;
                $patient->date_naissance = $request->date_naissance;
                $patient->tel1 = $request->tel1;
                $patient->tel2 = $request->tel2;

                if(trim($request->mutuelle2 == '')){
                    $patient->mutuelle = '---';
                }else{
                    $patient->mutuelle = $request->mutuelle2;
                }

                if(trim($request->ville2) == ''){
                    $ville = Ville::where('nom',$request->ville)->first();
                    $patient->ville_id = $ville->id;
                }else{
                    $VILLE= new Ville();
                    $VILLE->nom = $request->ville2;
                    $VILLE->save();
                    $ville_new = Ville::where('nom',$VILLE->nom)->first();
                    $patient->ville_id = $ville_new->id;
                }


                if($patient->save()){
                    return response()->json($patient);
                }else{
                    return response()->json(['msg'=>"Erreur ! Retapez vos données s'il vous plaît"]);
                }

            }

        }catch (\Exception $e){
            return response()->json(['msg'=>"Erreur ! Retapez vos données s'il vous plaît"]);
        }

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

        $this->validate($request,[
            'nom' => 'required',
            'prenom' => 'required',
            'cin' => 'required',
            'sexe' => 'required',
            'date_naissance' => 'required|date',
            'tel1' => 'required',
            'email' => 'required',
            'mutuelle' => 'required',
            'etat_civil' => 'required'
        ]);
        $edit = Patient::find($id)->update($request->all());
        return response()->json($edit);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {


    }
}
