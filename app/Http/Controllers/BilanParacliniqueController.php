<?php

namespace App\Http\Controllers;

use App\BilanParaclinique;
use App\Consultation;
use App\ElementTypeBilan;
use App\TypeBilan;
use Illuminate\Http\Request;

class BilanParacliniqueController extends Controller
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

                $consultation = Consultation::find($request->consultation_id);

                if($request->description_biologie){

                    if(count($consultation)>0){

                        foreach ($consultation->BilanParaclinique as $b_p){

                            $get_element = ElementTypeBilan::find($b_p->element_type_bilan_id);

                            if(count($get_element) >0){
                                $get_type = TypeBilan::find($get_element->type_bilan_id);
                                if(count($get_type) >0){
                                    if($get_type->nom == 'Biologie'){
                                        $b_p->delete();
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


                    for($i=0;$i<count($request->nom_biologie);$i++){

                        $BilanParacliniqueNew = new BilanParaclinique();
                        $element_type = ElementTypeBilan::where('nom',$request->nom_biologie[$i])->first();

                        if(count($element_type) <= 0){
                            return response()->json(['error'=>"l'element n'existe pas"]);
                        }else{

                            $BilanParacliniqueNew->element_type_bilan_id = $element_type->id;

                            if(trim($request->description_biologie[$i]) == ''){
                                $BilanParacliniqueNew->description = ' ';
                            }else
                            {
                                $BilanParacliniqueNew->description = trim($request->description_biologie[$i]);
                            };

                            $BilanParacliniqueNew->consultation_id = $consultation->id ;
                            $BilanParacliniqueNew->save();

                        }

                    }

                }else{

                    if(count($consultation)>0){

                        foreach ($consultation->BilanParaclinique as $b_p){

                            $get_element = ElementTypeBilan::find($b_p->element_type_bilan_id);

                            if(count($get_element) >0){
                                $get_type = TypeBilan::find($get_element->type_bilan_id);
                                if(count($get_type) >0){
                                    if($get_type->nom == 'Biologie'){
                                        $b_p->delete();
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

                // this now for Bilan Parclinique (Radiologie)

                if($request->description_radiologie){

                    if(count($consultation)>0){

                        foreach ($consultation->BilanParaclinique as $b_pp){

                            $get_element = ElementTypeBilan::find($b_pp->element_type_bilan_id);

                            if(count($get_element) >0){
                                $get_type = TypeBilan::find($get_element->type_bilan_id);
                                if(count($get_type) >0){
                                    if($get_type->nom == 'Radiologie'){
                                        $b_pp->delete();
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


                    for($i=0;$i<count($request->nom_radiologie);$i++){

                        $BilanParacliniqueNew = new BilanParaclinique();
                        $element_type = ElementTypeBilan::where('nom',$request->nom_radiologie[$i])->first();

                        if(count($element_type) <= 0){
                            return response()->json(['error'=>"l'element n'existe pas"]);
                        }else{

                            $BilanParacliniqueNew->element_type_bilan_id = $element_type->id;

                            if(trim($request->description_radiologie[$i]) == ''){
                                $BilanParacliniqueNew->description = ' ';
                            }else
                            {
                                $BilanParacliniqueNew->description = trim($request->description_radiologie[$i]);
                            };

                            $BilanParacliniqueNew->consultation_id = $consultation->id ;
                            $BilanParacliniqueNew->save();

                        }

                    }

                }else{

                    if(count($consultation)>0){

                        foreach ($consultation->BilanParaclinique as $b_pp){

                            $get_element = ElementTypeBilan::find($b_pp->element_type_bilan_id);

                            if(count($get_element) >0){
                                $get_type = TypeBilan::find($get_element->type_bilan_id);
                                if(count($get_type) >0){
                                    if($get_type->nom == 'Radiologie'){
                                        $b_pp->delete();
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
