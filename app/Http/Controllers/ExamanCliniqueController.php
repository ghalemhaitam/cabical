<?php

namespace App\Http\Controllers;

use App\Consultation;
use App\ElementTypeExaman;
use App\ExamanClinique;
use App\TypeExamanClinique;
use Illuminate\Http\Request;

class ExamanCliniqueController extends Controller
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



    public function store(Request $request)
    {
        try{
            if($request->ajax()){

                $consultation = Consultation::find($request->consultation_id);

                if($request->description_general){

                    if(count($consultation)>0){

                        foreach ($consultation->ExamansClinique as $e_c){

                            $get_element = ElementTypeExaman::find($e_c->element_type_examan_id);

                            if(count($get_element) >0){
                                $get_type = TypeExamanClinique::find($get_element->type_examan_clinique_id);
                                if(count($get_type) >0){
                                    if($get_type->nom == 'General'){
                                        $e_c->delete();
                                    }
                                }else{
                                    return response()->json(['error'=>'']);
                                }

                            }else{
                                return response()->json(['error'=>'']);
                            }
                        }

                    }else{
                        return response()->json(['error'=>'']);
                    }


                    for($i=0;$i<count($request->nom_general);$i++){

                        $ExamanCliniqueNew = new ExamanClinique();
                        $element_type = ElementTypeExaman::where('nom',$request->nom_general[$i])->first();

                        if(count($element_type) <= 0){
                            return response()->json(['error'=>"l'element n'existe pas"]);
                        }else{

                            $ExamanCliniqueNew->element_type_examan_id = $element_type->id;

                            if(trim($request->description_general[$i]) == ''){
                                $ExamanCliniqueNew->description = ' ';
                            }else
                            {
                                $ExamanCliniqueNew->description = trim($request->description_general[$i]);
                            };

                            $ExamanCliniqueNew->consultation_id = $consultation->id ;
                            $ExamanCliniqueNew->save();

                        }

                    }

                }else{

                    if(count($consultation)>0){

                        foreach ($consultation->ExamansClinique as $e_c){

                            $get_element = ElementTypeExaman::find($e_c->element_type_examan_id);

                            if(count($get_element) >0){
                                $get_type = TypeExamanClinique::find($get_element->type_examan_clinique_id);
                                if(count($get_type) >0){
                                    if($get_type->nom == 'General'){
                                        $e_c->delete();
                                    }
                                }else{
                                    return response()->json(['error'=>'']);
                                }

                            }else{
                                return response()->json(['error'=>'']);
                            }
                        }
                    }else{
                        return response()->json(['error'=>'']);
                    }

                }

                // this now for Examan Clinique (Par Appareil)

                if($request->description_par_appareil){

                    if(count($consultation)>0){

                        foreach ($consultation->ExamansClinique as $e_c){

                            $get_element = ElementTypeExaman::find($e_c->element_type_examan_id);

                            if(count($get_element) >0){
                                $get_type = TypeExamanClinique::find($get_element->type_examan_clinique_id);
                                if(count($get_type) >0){
                                    if($get_type->nom == 'Par Appareil'){
                                        $e_c->delete();
                                    }
                                }else{
                                    return response()->json(['error'=>'']);
                                }

                            }else{
                                return response()->json(['error'=>'']);
                            }
                        }

                    }else{
                        return response()->json(['error'=>'']);
                    }


                    for($i=0;$i<count($request->nom_par_appareil);$i++){

                        $ExamanCliniqueNew = new ExamanClinique();
                        $element_type = ElementTypeExaman::where('nom',$request->nom_par_appareil[$i])->first();

                        if(count($element_type) <= 0){
                            return response()->json(['error'=>"l'element n'existe pas"]);
                        }else{

                            $ExamanCliniqueNew->element_type_examan_id = $element_type->id;

                            if(trim($request->description_par_appareil[$i]) == ''){
                                $ExamanCliniqueNew->description = ' ';
                            }else
                            {
                                $ExamanCliniqueNew->description = trim($request->description_par_appareil[$i]);
                            };

                            $ExamanCliniqueNew->consultation_id = $consultation->id ;
                            $ExamanCliniqueNew->save();

                        }

                    }

                }else{

                    if(count($consultation)>0){

                        foreach ($consultation->ExamansClinique as $e_c){

                            $get_element = ElementTypeExaman::find($e_c->element_type_examan_id);

                            if(count($get_element) >0){
                                $get_type = TypeExamanClinique::find($get_element->type_examan_clinique_id);
                                if(count($get_type) >0){
                                    if($get_type->nom == 'Par Appareil'){
                                        $e_c->delete();
                                    }
                                }else{
                                    return response()->json(['error'=>'']);
                                }

                            }else{
                                return response()->json(['error'=>'']);
                            }
                        }
                    }else{
                        return response()->json(['error'=>'']);
                    }

                }



                return response()->json(['success'=>"Sauvegarde avec success"]);

            }
        }catch (\Exception $e){
            return response()->json(['error'=>"Il existe une ERREUR veuillez redémarrer le systeme"]);
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function GeneralElementEdit(Request $request){
        try {
            if ($request->ajax()) {

                $ExamanGeneralSelected = ElementTypeExaman::find($request->Examan_General_id_input);

                if (count($ExamanGeneralSelected) > 0) {
                    /* validation nom */
                    $ExamanGeneralSelected->nom = $request->nom_edit_Examan_General;
                    $ExamanGeneralSelected->save();

                    return response()->json($ExamanGeneralSelected);

                } else {
                    return response()->json(['error' => "Une erreur est produit. L'élément n'existe pas !"]);
                }

            }

        }catch
        (\Exception $e){
            return response()->json(['error' => "Une erreur est produit. Veuiller réssayer"]);
        }
    }

    public function ParAppareilElementEdit(Request $request){
        try {
            if ($request->ajax()) {

                $ExamanParAppareilSelected = ElementTypeExaman::find($request->Examan_Par_Appareil_id_input);

                if (count($ExamanParAppareilSelected) > 0) {
                    /* validation nom */
                    $ExamanParAppareilSelected->nom = $request->nom_edit_Examan_Par_Appareil;
                    $ExamanParAppareilSelected->save();

                    return response()->json($ExamanParAppareilSelected);

                } else {
                    return response()->json(['error' => "Une erreur est produit. L'élément n'existe pas !"]);
                }

            }

        }catch
        (\Exception $e){
            return response()->json(['error' => "Une erreur est produit. Veuiller réssayer"]);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
