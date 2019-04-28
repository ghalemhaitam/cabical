<?php

namespace App\Http\Controllers;

use App\ElementTypeAntecedent;
use App\ElementTypeExaman;
use App\TypeExamanClinique;
use Illuminate\Http\Request;

class ElementTypeExamanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        try{
            $type_examan = TypeExamanClinique::where('nom','Par Appareil')->first();
            $element_examan_clinique_typée= $type_examan->ElementTypeExamans;

            return response()->json($element_examan_clinique_typée);

        }catch (\Exception $e){
            return response()->json(['error'=>" "]);
        }
    }

    public function index2()
    {
        try{
            $type_examan = TypeExamanClinique::where('nom','General')->first();
            $element_examan_clinique_typé= $type_examan->ElementTypeExamans;

            return response()->json($element_examan_clinique_typé);

        }catch (\Exception $e){
            return response()->json(['error'=>" "]);
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
              if($request->type_antecedent == "General") {
                  $search_general = TypeExamanClinique::where('nom', 'General')->first();
                  if (count($search_general) > 0) {
                      $TypeNew = new ElementTypeExaman();
                      $TypeNew->nom = $request->nom;
                      $TypeNew->type_examan_clinique_id = $search_general->id;
                      $TypeNew->save();
                      return response()->json($TypeNew);
                  } else {
                      return response()->json(['error' => ""]);
                  }
              }else if ($request->type_antecedent == "Par Appareil"){
                  $search_par_appareil= TypeExamanClinique::where('nom', 'Par Appareil')->first();
                  if (count($search_par_appareil) > 0) {
                      $TypeNew = new ElementTypeExaman();
                      $TypeNew->nom = $request->nom;
                      $TypeNew->type_examan_clinique_id = $search_par_appareil->id;
                      $TypeNew->save();
                      return response()->json($TypeNew);
                  } else {
                      return response()->json(['error' => ""]);
                  }
              }

            }
        }catch (\Exception $e){
            return response()->json(['error'=>""]);
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
    public function destroy($id)
    {
        //
    }
}
