<?php

namespace App\Http\Controllers;

use App\MotifElements;
use Illuminate\Http\Request;

class MotifElementController extends Controller
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

                $TypeNew = new MotifElements();
                $TypeNew->nom = $request->nom;
                $TypeNew->save();
                return response()->json($TypeNew);

            }
        }catch (\Exception $e){
            return response()->json(['msg'=>""]);
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
        try {
            if ($request->ajax()) {

                $MotifElements = MotifElements::find($request->Motif_Consultation_id_input);

                if (count($MotifElements) > 0) {
                    /* validation nom */
                    $MotifElements->nom = $request->nom_edit_Motif_Consultation;
                    $MotifElements->save();

                    return response()->json($MotifElements);

                } else {
                    return response()->json(['error' => "Une erreur est produit. Veuiller réssayer"]);
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
