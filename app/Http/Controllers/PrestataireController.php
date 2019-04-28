<?php

namespace App\Http\Controllers;

use App\Prestataire;
use Illuminate\Http\Request;

class PrestataireController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $TypeCertifat = Prestataire::all();
            return response()->json($TypeCertifat);
        }catch (\Exception $e){
            return response()->json(['error'=>' ']);
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

    public function big_store(Request $request){
        try{
            if($request->ajax()){
                $prestataire = new Prestataire();

                     /* validation nom*/
                $prestataire->nom = $request->nom_add_prestataire ;
                    /* Validate email */
                if(trim($request->email_add_prestataire) == "") {
                    $prestataire->email = " ";
                }else {

                    if (!filter_var($request->email_add_prestataire, FILTER_VALIDATE_EMAIL) === false) {
                        $prestataire->email = $request->email_add_prestataire ;
                    } else {
                        return response()->json(['error'=>" email"]);
                    }
                }
                    /* validation tél */
               if(strlen($request->tel_add_prestataire) == 10){
                   if(substr($request->tel_add_prestataire, 0, 1) == 0){
                       $prestataire->tel = $request->tel_add_prestataire;
                   }else{
                       return response()->json(['error'=>" tel"]);
                   }
               }else if(strlen($request->tel_add_prestataire) == 0){
                   $prestataire->tel = 0 ;
               }else{
                   return response()->json(['error'=>" tel"]);
               }
                    /* validation Ville */
               if(trim( $request->ville_add_prestataire ) == ''){
                   $prestataire->ville = ' ';
               }else{
                   $prestataire->ville = $request->ville_add_prestataire ;
               }
                    /* validation Adresse */
                if(trim($request->adresse_add_prestataire) == ''){
                    $prestataire->adresse = ' ';
                }else{
                    $prestataire->adresse = $request->adresse_add_prestataire ;
                }

               $prestataire->save();
                return response()->json($prestataire);
            }

        }catch (\Exception $e){
            return response()->json(['error'=>" "]);
        }
    }

    public function store(Request $request)
    {
        try{
            if($request->ajax()){
                if($request->type_antecedent == "Prestataire") {
                    $prestataire = new Prestataire();
                    $prestataire->nom= $request->nom ;
                    $prestataire->save();
                    return response()->json(['success'=>" "]);
                }else {
                    return response()->json(['error'=>" "]);
                }

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

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function big_edit(Request $request)
    {
        try{
            if($request->ajax()){

                $prestataire = Prestataire::find($request->prestataire_id);
                if( count($prestataire)>0 ){
                    /* validation nom*/
                    $prestataire->nom = $request->nom_edit_prestataire ;
                    /* Validate email */
                    if(trim($request->email_edit_prestataire) == "") {
                        $prestataire->email = " ";
                    }else {

                        if (!filter_var($request->email_edit_prestataire, FILTER_VALIDATE_EMAIL) === false) {
                            $prestataire->email = $request->email_edit_prestataire ;
                        } else {
                            return response()->json(['error'=>" email"]);
                        }
                    }
                    /* validation tél */
                    if(strlen($request->tel_edit_prestataire) == 10){
                        if(substr($request->tel_edit_prestataire, 0, 1) == 0){
                            $prestataire->tel = $request->tel_edit_prestataire;
                        }else{
                            return response()->json(['error'=>" tel"]);
                        }
                    }else if(strlen($request->tel_edit_prestataire) == 0){
                        $prestataire->tel = 0 ;
                    }else{
                        return response()->json(['error'=>" tel"]);
                    }
                    /* validation Ville */
                    if(trim( $request->ville_edit_prestataire ) == ''){
                        $prestataire->ville = ' ';
                    }else{
                        $prestataire->ville = $request->ville_edit_prestataire ;
                    }
                    /* validation Adresse */
                    if(trim($request->adresse_edit_prestataire) == ''){
                        $prestataire->adresse = ' ';
                    }else{
                        $prestataire->adresse = $request->adresse_edit_prestataire ;
                    }

                    $prestataire->save();
                    return response()->json($prestataire);
                }else{
                    return response()->json(['error'=>" "]);
                }

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
    public function destroy($id)
    {
        //
    }
}
