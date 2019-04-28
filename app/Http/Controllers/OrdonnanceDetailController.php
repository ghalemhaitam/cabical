<?php

namespace App\Http\Controllers;

use App\Consultation;
use App\Medicament;
use App\OrdonnanceDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class OrdonnanceDetailController extends Controller
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
                if(count($consultation) > 0){

                    $ordonnance = $consultation->Ordonnance;


                    if(count($ordonnance) >0){
                        $medicament = Medicament::where('nom',$request->nom_medicament)->first();
                        if(count($medicament) > 0){
                            $ordonnance_detail = New OrdonnanceDetail();
                            $ordonnance_detail->medicament_id =$medicament->id;
                            $ordonnance_detail->ordonnance_id = $ordonnance->id;
                             if(trim($request->Prise) == ''){
                                 $ordonnance_detail->prise =" ";
                            }else{
                                 $ordonnance_detail->prise =$request->Prise;
                             }

                            if(trim($request->Quantite) == ''){
                                $ordonnance_detail->quantite =" ";
                            }else{
                                $ordonnance_detail->quantite =$request->Quantite;
                            }

                            if(trim($request->Periode) == ''){
                                $ordonnance_detail->periode =" ";
                            }else{
                                $ordonnance_detail->periode = $request->Periode;
                            }

                            if(trim($request->Quand) == ''){
                                $ordonnance_detail->quand =" ";
                            }else{
                                $ordonnance_detail->quand = $request->Quand;
                            }

                            if(trim($request->Remarque) == ''){
                                $ordonnance_detail->remarque =" ";
                            }else{
                                $ordonnance_detail->remarque = $request->Remarque;
                            }

                            if(trim($request->Nombre_Par_Jour) == '' || $request->Nombre_Par_Jour <0){
                                return response()->json(['error'=>" "]);
                            }else{
                                $ordonnance_detail->nombre_par_jour = $request->Nombre_Par_Jour;
                            }

                            $ordonnance_detail->save();

                            return response()->json(['data' =>$ordonnance_detail , 'medicament'=>$medicament->nom]);

                        }else{
                            return response()->json(['error'=>" "]);
                        }

                    }else{
                        return response()->json(['error'=>" "]);
                    }
                }else{
                    return response()->json(['error'=>" "]);
                }


                return response()->json(['success'=>"Sauvegarde avec success"]);

            }else{
                return response()->json(['error'=>" "]);
            }
        }catch (\Exception $e){
            return response()->json(['error'=>" "]);
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
    public function edit(Request $request)
    {
        try{
            if($request->ajax()){

                $ordonnance_detail = OrdonnanceDetail::find($request->ordon_detail_id);


                    if(count($ordonnance_detail) >0){
                        $medicament = Medicament::where('nom',$request->nom_medicament)->first();
                        if(count($medicament) > 0){

                            $ordonnance_detail->medicament_id =$medicament->id;

                            if(trim($request->Prise) == ''){
                                $ordonnance_detail->prise =" ";
                            }else{
                                $ordonnance_detail->prise =$request->Prise;
                            }

                            if(trim($request->Quantite) == ''){
                                $ordonnance_detail->quantite =" ";
                            }else{
                                $ordonnance_detail->quantite =$request->Quantite;
                            }

                            if(trim($request->Periode) == ''){
                                $ordonnance_detail->periode =" ";
                            }else{
                                $ordonnance_detail->periode = $request->Periode;
                            }

                            if(trim($request->Quand) == ''){
                                $ordonnance_detail->quand =" ";
                            }else{
                                $ordonnance_detail->quand = $request->Quand;
                            }

                            if(trim($request->Remarque) == ''){
                                $ordonnance_detail->remarque =" ";
                            }else{
                                $ordonnance_detail->remarque = $request->Remarque;
                            }

                            if(trim($request->Nombre_Par_Jour) == '' || $request->Nombre_Par_Jour <0){
                                return response()->json(['error'=>" "]);
                            }else{
                                $ordonnance_detail->nombre_par_jour = $request->Nombre_Par_Jour;
                            }

                            $ordonnance_detail->save();

                            return response()->json(['data' =>$ordonnance_detail , 'medicament'=>$medicament->nom]);

                        }else{
                            return response()->json(['error'=>" "]);
                        }

                    }else{
                        return response()->json(['error'=>" "]);
                    }



                return response()->json(['success'=>"Sauvegarde avec success"]);

            }else{
                return response()->json(['error'=>" "]);
            }
        }catch (\Exception $e){
            return response()->json(['error'=>" "]);
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
    public function destroy()
    {
        try{
            $id = Input::get('id');
            OrdonnanceDetail::find($id)->delete();

        }catch (\Exception $e){
            return response()->json(['error'=>' ']);
        }
    }
}
