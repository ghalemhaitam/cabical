<?php

namespace App\Http\Controllers;

use App\Medicament;
use Illuminate\Http\Request;

class MedicamentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        try {
            $medicaments = Medicament::orderBy('nom')->get();
            if (count($medicaments) > 0) {

                return response()->json($medicaments);

            } else {

                return response()->json(['error' => ' ']);

            }

        } catch (\Exception $e) {
            return response()->json(['error' => "Il existe une ERREUR veuillez redémarrer le systeme"]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            if ($request->ajax()) {

                $medicament = new Medicament();
                $medicament->nom = $request->nom;
                $medicament->code = 0;
                $medicament->dci1 = 0;
                $medicament->dosage1 = 0;
                $medicament->unite_dosage1 = 0;
                $medicament->forme = 0;
                $medicament->presentation = 0;
                $medicament->ppv = 0;
                $medicament->ph = 0;
                $medicament->prix_br = 0;
                $medicament->princeps_generique = 0;
                $medicament->taux_remboursement = 0;
                $medicament->save();

                return response()->json($medicament);

            } else {
                return response()->json(['error' => " "]);
            }
        } catch (\Exception $e) {
            return response()->json(['error' => " "]);
        }
    }

    public function big_store(Request $request)
    {

        try {
            if ($request->ajax()) {

                $medicament = new Medicament();
                $medicament->nom = $request->nom_big_add_medicament;


                if ($request->code_big_add_medicament == '') {
                    $medicament->code = 0;
                } else {
                    $medicament->code = $request->code_big_add_medicament;
                }
                if ($request->dci1_big_add_medicament == "") {
                    $medicament->dci1 = 0;
                } else {
                    $medicament->dci1 = $request->dci1_big_add_medicament;
                }
                if ($request->dosage1_big_add_medicament == "") {
                    $medicament->dosage1 = 0;
                } else {

                    $medicament->dosage1 = $request->dosage1_big_add_medicament;
                }
                if ($request->unite_dosage1_big_add_medicament == "") {
                    $medicament->unite_dosage1 = 0;
                } else {
                    $medicament->unite_dosage1 = $request->unite_dosage1_big_add_medicament;
                }

                if ($request->forme_big_add_medicament == "") {
                    $medicament->forme = 0;
                } else {

                    $medicament->forme = $request->forme_big_add_medicament;
                }
                if ($request->presentation_big_add_medicament == "") {
                    $medicament->presentation = 0;
                } else {
                    $medicament->presentation = $request->presentation_big_add_medicament;

                }
                if ($request->ppv_big_add_medicament == "") {

                    $medicament->ppv = 0;
                } else {
                    $medicament->ppv = $request->ppv_big_add_medicament;
                }
                if ($request->ph_big_add_medicament == "") {
                    $medicament->ph = 0;
                } else {
                    $medicament->ph = $request->ph_big_add_medicament;
                }
                if ($request->prix_br_big_add_medicament == "") {
                    $medicament->prix_br = 0;
                } else {
                    $medicament->prix_br = $request->prix_br_big_add_medicament;
                }
                if ($request->Princeps_generiqueique_big_add_medicament == "") {
                    $medicament->princeps_generique = 0;
                } else {
                    $medicament->princeps_generique = $request->Princeps_generiqueique_big_add_medicament;
                }
                if ($request->taux_remboursement_big_add_medicament == "") {
                    $medicament->taux_remboursement = 0;
                } else {
                    $medicament->taux_remboursement = $request->taux_remboursement_big_add_medicament;
                }
                $medicament->save();

                return response()->json($medicament);

            } else {
                return response()->json(['error' => " "]);
            }
        } catch (\Exception $e) {
            return response()->json(['error' => " "]);
        }
    }


    public function edit(Request $request)
    {
        try {
            if ($request->ajax()) {

                $medicament = Medicament::find($request->medicament_id_input);

                if (count($medicament) > 0) {
                    /* validation nom */
                    $medicament->nom = $request->nom_edit_medicament;
                    if (trim($request->code_big_edit_medicament) == '') {
                        $medicament->code = 0;
                    } else {
                        $medicament->code = $request->code_big_edit_medicament;
                    }
                    if (trim($request->dci1_big_edit_medicament) == "") {
                        $medicament->dci1 = 0;
                    } else {
                        $medicament->dci1 = $request->dci1_big_edit_medicament;
                    }
                    if (trim($request->dosage1_big_edit_medicament) == "") {
                        $medicament->dosage1 = 0;
                    } else {

                        $medicament->dosage1 = $request->dosage1_big_edit_medicament;
                    }
                    if (trim($request->unite_dosage1_big_edit_medicament) == "") {
                        $medicament->unite_dosage1 = 0;
                    } else {
                        $medicament->unite_dosage1 = $request->unite_dosage1_big_edit_medicament;
                    }

                    if (trim($request->forme_big_edit_medicament) == "") {
                        $medicament->forme = 0;
                    } else {

                        $medicament->forme = $request->forme_big_edit_medicament;
                    }
                    if (trim($request->presentation_big_edit_medicament) == "") {
                        $medicament->presentation = 0;
                    } else {
                        $medicament->presentation = $request->presentation_big_edit_medicament;

                    }
                    if (trim($request->ppv_big_edit_medicament) == "") {

                        $medicament->ppv = 0;
                    } else {
                        $medicament->ppv = $request->ppv_big_edit_medicament;
                    }
                    if (trim($request->ph_big_edit_medicament) == "") {
                        $medicament->ph = 0;
                    } else {
                        $medicament->ph = $request->ph_big_edit_medicament;
                    }
                    if (trim($request->prix_br_big_edit_medicament) == "") {
                        $medicament->prix_br = 0;
                    } else {
                        $medicament->prix_br = $request->prix_br_big_edit_medicament;
                    }
                    if (trim($request->Princeps_generiqueique_big_edit_medicament) == "") {
                        $medicament->princeps_generique = 0;
                    } else {
                        $medicament->princeps_generique = $request->Princeps_generiqueique_big_edit_medicament;
                    }
                    if (trim($request->taux_remboursement_big_edit_medicament) == "") {
                        $medicament->taux_remboursement = 0;
                    } else {
                        $medicament->taux_remboursement = $request->taux_remboursement_big_edit_medicament;
                    }

                    $medicament->save();

                    return response()->json($medicament);

                } else {
                    return response()->json(['error' => "Une erreur est produit. Veuiller réssayer"]);
                }

            }
        } catch
        (\Exception $e) {
            return response()->json(['error' => "Une erreur est produit. Veuiller réssayer"]);
        }

    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

