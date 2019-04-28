@extends('layouts.app')

@section('content')

    <div class="main-container" style="margin-left: 176px;" id="manage-vue">    <!-- START: Main Container -->
     <!-- intro to patients_panel-->
        <div id="patients-panel" style="display: none">
            <div class="col-md-12">
                <div class="">

                    <div class="">
                        <div class="panel-body" style="padding-left: 0px">

                            <button class="btn btn-secondary click_add" data-toggle='modal' data-target='#myModal5'><i class="fa fa-user-plus"></i></button>
                        </div>

                        <div class="modal modal-info fade modal_add_patient" id="myModal5" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header" style="padding-bottom: 0px;padding-top: 0px;position: relative;display: flex;" >
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="myModalLabel" style="width: 300px;padding-top: 20px;">Ajouter Patient</h4>
                                        <div id="error_shox" class="jq-toast-single jq-has-icon jq-icon-error" style="padding-bottom: 0px;position:initial;display: none;background-color: rgb(255, 72, 89); text-align: left; width: 400px; ">
                                            <span class="jq-toast-loader"></span>
                                            <span class="close-jq-toast-single">×</span>

                                            <span id="my_error"></span>
                                        </div>

                                        <div id="success_shox" class="jq-toast-single jq-has-icon jq-icon-success" style="background-color: rgb(126, 200, 87); text-align: left; width: 400px; display: none;">
                                            <span class="jq-toast-loader"></span>
                                            <span class="close-jq-toast-single">×</span>
                                            Bien Ajouter
                                        </div>
                                    </div>

                                    <div class="modal-body" style="padding-top: 0px">
                                        <div class="panel">
                                            <div>

                                                <form  method="post" role="form" id="form_add">

                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <div class="form-body" >

                                                        <div class="form-group col-lg-6" style="padding-top:15px">
                                                            <label for="cin_add">Cin</label>
                                                            <input type="text" required class="form-control"  id="cin_add"    name="cin_add" id="firstname" placeholder="Cin">
                                                        </div>
                                                        <div class="form-group col-lg-6" style="padding-top:15px">
                                                            <label for="nom_add">Nom</label>
                                                            <input type="text" required class="form-control"  id="nom_add"   name="nom_add" id="lastname" placeholder="Nom">
                                                        </div>
                                                        <div class="form-group col-lg-6">
                                                            <label for="prenom_add">Prenom</label>
                                                            <input type="text" required class="form-control"  id="prenom_add"   name="prenom_add" id="lastname" placeholder="Prenom">
                                                        </div>
                                                        <div class="form-group col-lg-6">
                                                            <label for="email_add">Email</label>
                                                            <input type="email" required class="form-control"   id="email_add"  name="email_add"  placeholder="Email">
                                                        </div>
                                                        <div class="form-group col-lg-6" style="margin-bottom: 0px">
                                                            <label class="control-label">Sexe</label>
                                                            <div>
                                                                <select name="sexe_add" id="sexe2" class="form-control custom-Select" >
                                                                    <option value="Masculin">Masculin</option>
                                                                    <option value="Féminin">Féminin</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-lg-6">
                                                            <label for="datenaissance_add" class="control-label"  >Date Naissance</label>
                                                            <input type="text" required  name="date_naissance_add" id="datenaissance_add" class="form-control date-picker" id="inputUserName" data-clearBtn="1" placeholder="JJ/MM/AAAA">
                                                        </div>
                                                        <div class="form-group col-lg-6">
                                                            <label for="inputUserName" id="" class="control-label">Tel 1</label>
                                                            <input type="number" minlength="10" maxlength="10" required name="tel1_add"  class="form-control" id="tel1_add" placeholder="Téléphone 1">
                                                        </div>

                                                        <div class="form-group col-lg-6">
                                                            <label  class=" control-label">Tel 2</label>
                                                            <input type="number" minlength="10" maxlength="10" required id="tel2_add"  name="tel2_add" class="form-control"  placeholder="Téléphone 2">
                                                        </div>

                                                        <div class="form-group col-lg-6" style="top: 10px " id="select_ville_existe_add">
                                                            <label for="selectville" class="control-label" style="padding-top: 5px;"> Ville  </label>

                                                            <select class="form-control select2" name="ville_add"  id="selectville_add">
                                                                @foreach($villes as $ville)
                                                                    <option value="{{$ville->nom}}">{{$ville->nom}}</option>
                                                                @endforeach
                                                            </select>&nbsp;&nbsp;

                                                            <span class="ti-share" id="new_ville_add"></span>
                                                            <span class="fs-undo" id="back_ville_add" style="display: none"></span>

                                                            <input type="text" id="input_new_ville_add" name="ville2_add"  class="form-control" placeholder="Nouvelle Ville" style="display: none" >
                                                        </div>

                                                        <div class="form-group col-lg-6">
                                                            <div class="checkbox checkbox-primary" id="check_click_jquery_add" >
                                                                <input id="checkbox1" name="mutuelle_add" class="styled"  type="checkbox" >
                                                                <label for="checkbox1">mutuelle</label>
                                                            </div>
                                                            <input type="text" id="input_mutuelle_add" name="mutuelle2_add"  class="form-control" placeholder="Mutuelle"  style="display: none" >
                                                        </div>

                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                                                            <button type="submit"  class="btn btn-primary">Ajouter</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="content-wrap">

                <div class="row">

                    <div class="col-md-12" style="padding-right: 0.1%;padding-left: 0.9%">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"></h3>
                                <div class="tools">
                                    <a class="btn-link collapses panel-collapse" href="javascript:;"></a>
                                    <a class="btn-link reload" href="javascript:;"><i class="ti-reload"></i></a>
                                </div>
                            </div>

                            <div class="panel-body">
                                <table class="table table-bordered table-dataTable" id="table_patients">
                                    <col width="20px" />
                                    <thead>
                                    <tr role="row">

                                        <th style="width: 20px !important"></th>
                                        <th>Cin</th>
                                        <th>Nom</th>
                                        <th>Prenom</th>
                                        <th>Sexe</th>
                                        <th>Date Naissance</th>
                                        <th>Email</th>
                                        <th>Tel 1</th>
                                        <th>Tel 2</th>
                                        <th>Mutuelle</th>
                                        <th>Ville</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th></th>
                                        <th>Cin</th>
                                        <th>Nom</th>
                                        <th>Prenom</th>
                                        <th>Sexe</th>
                                        <th>Date Naissance</th>
                                        <th>Email</th>
                                        <th>Tel 1</th>
                                        <th>Tel 2</th>
                                        <th>Mutuelle</th>
                                        <th>Ville</th>

                                    </tr>
                                    </tfoot>
                                    <tbody id="table_in_add">
                                    {{ csrf_field() }}
                                    @foreach($patients as $patient)
                                        <tr class="item{{$patient->id}}" data-id="{{$patient->id}}" data-cin="{{$patient->cin}}" data-nom="{{$patient->nom.' '.$patient->prenom}}" data-datenaissance="{{$patient->date_naissance}}"  @if($patient->ville == '') data-ville="Aucune" @else  data-ville="{{$patient->ville->nom}}" @endif data-email="{{$patient->email}}" data-sexe="{{$patient->sexe}}" data-mutuelle="{{$patient->mutuelle}}" data-tel1="{{$patient->tel1}}" data-tel2="{{$patient->tel2}}">
                                            <td style="padding: 5px">
                                                <a class="btn btn-social-icon btn-xs btn-instagram edit-modal"  data-toggle="modal"  data-target="#edit_patient_modal" data-email="{{$patient->email}}" data-id="{{$patient->id}}" @if($patient->ville == '') data-ville="Aucune" @else  data-ville="{{$patient->ville->nom}}" @endif  data-mutuelle="{{$patient->mutuelle}}" data-tel2="0{{$patient->tel2}}" data-tel1="0{{$patient->tel1}}" data-datenaissance="{{$patient->date_naissance}}" data-sexe="{{$patient->sexe}}" data-cin="{{$patient->cin}}" data-nom="{{$patient->nom}}" data-prenom="{{$patient->prenom}}" ><span class="fa fa-edit"></span></a>
                                                <a class="btn btn-social-icon btn-xs btn-google btn-lg  btn-delete-patient " data-id="{{$patient->id}}" data-type="patient"  data-nom="{{$patient->nom}}" data-toggle="modal"  data-target="#modal_delete_confirmation"><span class="fa fa-trash"></span></a>
                                            </td>
                                            <td class="show_patient" style="padding: 5px">{{$patient->cin}}</td>
                                            <td class="show_patient" style="padding: 5px">{{$patient->nom}}</td>
                                            <td class="show_patient" style="padding: 5px">{{$patient->prenom}}</td>
                                            <td class="show_patient" style="padding: 5px">{{$patient->sexe}}</td>
                                            <td class="show_patient" style="padding: 5px">{{$patient->date_naissance}}</td>
                                            <td class="show_patient" style="padding: 5px">{{$patient->email}}</td>
                                            <td class="show_patient" style="padding: 5px">0{{$patient->tel1}}</td>
                                            <td class="show_patient" style="padding: 5px">0{{$patient->tel2}}</td>
                                            <td class="show_patient" style="padding: 5px">{{$patient->mutuelle}}</td>
                                            <td class="show_patient" style="padding: 5px">@if($patient->ville == '') Aucune @else {{$patient->ville->nom}} @endif</td>

                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>



                <div class="jq-toast-wrap bottom-right" id="success_alert" style="display: none;">
                    <div class="jq-toast-single jq-has-icon jq-icon-success" style="background-color: rgb(126, 200, 87); text-align: left; display: block;">
                        <span class="jq-toast-loader"></span>
                        <span class="close-jq-toast-single">×</span>
                        <h2 class="jq-toast-heading">BONNE NOUVELLE</h2>
                        Votre Patient est Bien SUPPRIMER
                    </div>
                </div>
                <div class="jq-toast-wrap bottom-right" id="success_alert_2" style="display: none;">
                    <div class="jq-toast-single jq-has-icon jq-icon-success" style="background-color: rgb(126, 200, 87); text-align: left; display: block;">
                        <span class="jq-toast-loader"></span>
                        <span class="close-jq-toast-single">×</span>
                        <h2 class="jq-toast-heading">BONNE NOUVELLE</h2>
                        Votre Patient est Bien Modifier
                    </div>
                </div>

                <div class="jq-toast-wrap bottom-right" id="erreur_alert_3" style="display: none;">
                    <div class="jq-toast-single jq-has-icon jq-icon-error" style="background-color: rgb(255, 72, 89); text-align: left; display: block;">
                        <span class="jq-toast-loader"></span>
                        <span class="close-jq-toast-single">×</span>
                        <h2 class="jq-toast-heading">Error</h2>
                        <span id="msg_error_edit"></span>
                    </div>
                </div>


            </div>
        </div>

        <!-- Modal for edit patiant -->
        <div class="modal modal-secondary fade" id="edit_patient_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Modifier Patient</h4>
                    </div>
                    <div class="modal-body">
                        <div class="panel ">

                            <div class="panel-body">

                                <form  role="form" id="form_edit">
                                    <!-- { {csrf_field()}} -->
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input id="ThisIsThat" type="text" name="id" style="display: none">
                                    <div class="form-group col-lg-6">
                                        <label for="Cin" class=" control-label">Cin</label>
                                        <input type="text" required name="cin"  class="form-control" id="Cin" placeholder="Full Name">

                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="Nom" class=" control-label">Nom</label>
                                        <input type="text" required name="nom"  class="form-control" id="Nom" placeholder="Full Name">

                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="Prenom" class=" control-label">Prenom</label>
                                        <input type="text" required  name="prenom" class="form-control" id="Prenom" placeholder="Full Name">

                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="Email" class=" control-label">Email</label>
                                        <input type="email" required  name="email" class="form-control" id="Email" placeholder="Email">
                                    </div>

                                    <div class="form-group col-lg-6" style="margin-bottom: 0px">
                                        <label class="control-label" style="">Sexe</label>
                                        <div>
                                            <select name="sexe"  id="sexe" class="form-control custom-Select" >
                                                <option value="Masculin">Masculin</option>
                                                <option value="Féminin">Féminin</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group col-lg-6">
                                        <label for="datenaissance" class=" control-label">Date Naissance</label>
                                        <input type="text" required  name="date_naissance" class="form-control date-picker" id="datenaissance" data-clearBtn="1" placeholder="JJ/MM/AAAA">
                                    </div>

                                    <div class="form-group col-lg-6">
                                        <label for="tel1" class=" control-label">Tel 1</label>
                                        <input type="tel" required name="tel1" class="form-control" id="tel1" placeholder="Téléphone 1">
                                    </div>

                                    <div class="form-group col-lg-6">
                                        <label for="tel2" class=" control-label">Tel 2</label>
                                        <input type="tel"  name="tel2" class="form-control" id="tel2" placeholder="Téléphone 2">
                                    </div>

                                    <div class="form-group col-lg-6" style="top: 10px " id="select_ville_existe">
                                        <label for="selectville" class="control-label" style="padding-top: 5px;"> Ville &nbsp;&nbsp; </label>
                                        <select class="form-control select2" name="ville" id="selectville">
                                            @foreach($villes as $ville)
                                                <option value="{{$ville->nom}}">{{$ville->nom}}</option>
                                            @endforeach

                                        </select>&nbsp;&nbsp;
                                        <span class="ti-share" id="new_ville"></span>
                                        <span class="fs-undo" id="back_ville" style="display: none"></span>

                                        <input type="text" id="input_new_ville" name="ville2" class="form-control" placeholder="Nouvelle Ville" style="display: none" >
                                    </div>

                                    <div class="form-group col-lg-6">
                                        <div class="checkbox " id="check_click_jquery" >
                                            <input id="checkbox11"  name="mutuelle" class="styled" type="checkbox" >
                                            <label for="checkbox11">mutuelle</label>
                                        </div>
                                        <input type="text" id="input_mutuelle"  name="mutuelle2" class="form-control" placeholder="Mutuelle"  style="display: none" >
                                    </div>
                                    <div class="pull-right">
                                        <button type="button" id="annuler_edit" class="btn btn-default" data-dismiss="modal">Annuler</button>
                                        <button type="submit" id="here" data-id=""  class="btn btn-primary">Modifier</button>

                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>


     <!-- consultation_list_panel -->
       <div id="consultation-list-panel" style="display: none">
            <div class="page-header">
                <h1> <i class="fs-bubbles-2"></i> Liste Consultation</h1>
            </div>

            <div class="content-wrap">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">

                                <div class="tools">
                                    <a class="btn-link collapses panel-collapse" href="javascript:;"></a>
                                    <a class="btn-link reload" href="javascript:;"><i class="ti-reload"></i></a>
                                </div>
                            </div>
                            <div class="panel-body">
                                <table class="table table-bordered table-dataTable table-hover table-responsive" id="table_consultation" width="100% !important">

                                    <thead>
                                    <tr>
                                        <th></th>
                                        <th>Patient</th>
                                        <th>Date Consultation</th>
                                        <th>Type</th>
                                        <th>Remarque</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach( $consultation_list_all as $c_l_all )
                                        <?php

                                        $patient_nom = \App\Patient::find($c_l_all->patient_id);
                                        $type_of_consultation_element = \App\MotifsRendezVous::find($c_l_all->type_id);

                                        ?>
                                        <tr class="click_show element-consultation{{$c_l_all->id}}" data-id="{{$c_l_all->id}}" data-patient-id="{{$patient_nom->id}}" data-patient="{{$patient_nom->prenom.' '.$patient_nom->nom }}" data-date="{{$c_l_all->date_consultation}}" data-type="{{$type_of_consultation_element->nom}}">
                                            <td style="padding: 5px">
                                                <a class="btn btn-social-icon btn-xs btn-instagram btn-redirect-profil-patient" data-id="{{  $patient_nom->id }}" ><i class="fa fa-user"></i></a>
                                                <a class="btn btn-social-icon btn-xs btn-google btn-lg" id="btn_delete_consultation" data-id="{{$c_l_all->id}}" data-type="consultation" data-toggle="modal" data-target="#modal_delete_confirmation" ><span class="fa fa-trash"></span></a>
                                            </td>
                                            <td class="click_show_consultation_exist">
                                                <?php

                                                if(count($patient_nom) >0){
                                                    echo  $patient_nom->prenom.' '.$patient_nom->nom;
                                                }else{
                                                    echo "Ce patient n'exist pas";
                                                }
                                                ?>
                                            </td>
                                            <td class="click_show_consultation_exist">
                                                {{$c_l_all->date_consultation}}
                                            </td>
                                            <td class="click_show_consultation_exist">
                                                <?php

                                                if(count($type_of_consultation_element) >0){
                                                    echo $type_of_consultation_element->nom;
                                                }else{
                                                    echo "pas de type";
                                                }
                                                ?>
                                            </td>
                                            <td class="click_show_consultation_exist">
                                                {{  $c_l_all->remarque }}
                                            </td>
                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>

            </div>



        </div>

        <!--  info patient Panel -->
       <div id="Info_patient_panel" style="display:none">


            <div class="page-header">
                <h1><i class="fa fa-bed" ></i> Patient <bold id="nom_patient_panel" style="color: #5F69E0" data-id="" data-nom="">nom patient</bold></h1>

            </div>

            <div class="content-wrap">  <!--START: Content Wrap-->

                <!--panel info patient -->
                <div class="row">

                    <div class="col-md-12" >
                        <div class="panel panel-default " style="padding-top: 30px">
                            <div class="panel-body">
                               <div id="patient_id_for_info" data-id="">
                                   <div class="col-md-4">
                                       <p id="patient_nom_prenom_info"></p>
                                   </div>
                                   <div class="col-md-4">
                                       <p id="patient_cin_info"></p>
                                   </div>
                                   <div class="col-md-4">
                                       <p id="patient_sexe_info"></p>
                                   </div>
                                   <div class="col-md-4">
                                       <p id="patient_email_info"></p>
                                   </div>
                                   <div class="col-md-4">
                                       <p id="patient_ville_info"></p>
                                   </div>
                                   <div class="col-md-4">
                                       <p id="patient_date_naissance_info"></p>
                                   </div>
                                   <div class="col-md-4">
                                       <p id="patient_tel1_info"></p>
                                   </div>
                                   <div class="col-md-4">
                                       <p id="patient_tel2_info"></p>
                                   </div>
                                   <div class="col-md-4">
                                       <p id="patient_mutuelle_info"></p>
                                   </div>
                               </div>

                            </div>
                        </div>
                    </div>

                </div>

                <!--Consultation / rendez_vous-->
                <div class="row">

                    <div class="col-md-7">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <h2>Consultation</h2>

                                <ul class="flik-timeline flik-timeline-1" data-scroll-effect="slide-down-up-effect" id="patient_info_consultation">



                                </ul>

                            </div>
                        </div>
                    </div>

                    <div class="col-md-5">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <h2>Rendez Vous</h2>
                                <!-- BEGIN TIMELINE -->
                                <ul class="flik-timeline flik-timeline-1"  data-scroll-effect="slide-down-up-effect" id="patient_info_rendez_vous_ul">


                                     <!--
                                    <li class="event" data-date="29 June 2016">
                                        <h3>Lorem ipsum dolor sit amet</h3>
                                        <p class="event-content" data-date="29 June 2016">
                                            consectetur adipiscing elit. Aenean vulputate ornare lacinia. Cras ut augue nulla. Nullam quis molestie leo. Integer et vehicula lectus. Quisque cursus lorem sed interdum ultricies.
                                        </p>
                                    </li>
                                    -->


                                </ul> <!-- END TIMELINE -->

                            </div>
                        </div>
                    </div>

                </div>


            </div>

       </div>

     <!-- rendez_vous_panel -->
        <div id="rendez-vous-panel" style="display: block">
            <div class="page-header">
                <h1><i class="fs-stopwatch"></i> Rendez - Vous</h1>
            </div>

            <div class="content-wrap">  <!--START: Content Wrap-->
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default" style="margin-bottom: 0px">
                            <div class="panel-heading">
                                <h3 class="panel-title"></h3>
                                <div class="tools">
                                    <a class="btn-link collapses panel-collapse" href="javascript:;"></a>
                                    <a class="btn-link reload" href="javascript:;"><i class="ti-reload"></i></a>
                                </div>
                            </div>
                            <div class="panel-body">
                                <table class="table table-bordered table-hover">
                                    <col width="20px" />
                                    <thead>
                                    <tr>
                                        <th></th>
                                        <th>Prenom /Nom</th>
                                        <th>Date</th>
                                        <th>Type</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($rendez_vous as $r_v)

                                        <?php
                                        $patient_search_nom_preom_by_id = \App\Patient::find($r_v->patient_id);
                                        $motif_rendez_vous_nom = \App\MotifsRendezVous::find($r_v->motif_id);
                                       ?>

                                        <tr class="click_show element{{$r_v->id }}" data-id="{{$r_v->id}}" data-date="{{$r_v->date_rendez_vous}}" data-motif="@if($motif_rendez_vous_nom == null)...@else{{$motif_rendez_vous_nom->nom}}@endif" data-id-patient="@if($patient_search_nom_preom_by_id == null)...@else{{$patient_search_nom_preom_by_id->id}}@endif" data-nomP="@if($patient_search_nom_preom_by_id == null)...@else{{$patient_search_nom_preom_by_id->prenom.' '.$patient_search_nom_preom_by_id->nom}}@endif">
                                            <td style="padding: 5px">
                                                <a class="btn btn-social-icon btn-xs btn-instagram annulation_rendez_vous" data-toggle="modal" data-id="{{$r_v->id }}"  data-target="#modal_annulation_confirmation" ><span class="fs-rotate-2"></span></a>
                                                <a class="btn btn-social-icon btn-xs btn-google btn-lg delete_element_verification" data-id="{{$r_v->id }}" data-type="rendez_vous" data-toggle="modal" data-target="#modal_delete_confirmation" ><span class="fa fa-trash"></span></a>
                                            </td>

                                            <td class="click_show_consultation">
                                                <?php
                                                    if($patient_search_nom_preom_by_id == null){
                                                       ?> ... <?php
                                                    }else{ ?>

                                                        {{$patient_search_nom_preom_by_id->prenom.' '.$patient_search_nom_preom_by_id->nom}}

                                                    <?php
                                                    }
                                                ?>
                                            </td>
                                            <td class="click_show_consultation">{{$r_v->date_rendez_vous}}</td>
                                            <td class="click_show_consultation">
                                                <?php

                                                    if($motif_rendez_vous_nom == null){
                                                        ?> ... <?php
                                                    }else{
                                                        ?>
                                                        {{$motif_rendez_vous_nom->nom}}
                                                    <?php
                                                    }
                                                ?>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        {{ $rendez_vous->links() }}
                    </div>

                </div>

            </div>

        </div>

     <!-- consultation_panel -->
        <div id="rendez-vous-consultation-panel" style="display: none">

            <div class="content-wrap">  <!--START: Content Wrap-->

                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <div class="panel">
                            <div class="panel-body">
                                <h2>Consultation / <span id="consultation_id" data-id=""></span></h2>
                               <div class="row">
                                   <div class="col-md-5 col-md-offset-1 col-sm-12 ">

                                       <label for="inputUserName" class="col-sm-2  control-label" >Patient</label>
                                       <span  class="col-sm-3  control-label" id="nom_patient_consultation" style="width: 200px"></span>

                                   </div>
                                   <div class="col-md-5 col-sm-12">

                                       <label for="inputUserName" class="col-sm-2  control-label" >Date</label>
                                       <span  class="col-sm-3  control-label" id="date_patient_consultation" style="width: 200px;text-align: center"></span>

                                   </div>
                               </div>

                                <div class="col-md-5 col-md-offset-1 col-sm-12" style="padding-left: 2px">

                                    <label for="inputUserName" class="col-sm-2  control-label" >Type</label>
                                    <span  class="col-sm-3  control-label" id="type_motif_patient_consultation" style="text-align: center"></span>

                                </div>
                            </div>
                            <div class="col-md-12" style="padding: 0px" >
                                <div class="panel panel-inverse">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Information ...</h3>
                                    </div>
                                    <div class="panel-body">

                                        <div class="panel-group accordion" id="accordion">

                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    <h4 class="panel-title">
                                                        <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#consultation" aria-expanded="false">
                                                            <i class="fa fa-cloud"></i> Consultation
                                                        </a>
                                                    </h4>
                                                </div>



                                                <!--Modal edit delete Ordonnance-->
                                                <div class="modal-flot" id="fModalRightOne" data-position='right'>
                                                    <div class="modal-header">
                                                        <h3 class="modal-title">Modifier L'élément</h3>
                                                        <a href="javascript:;" data-dismiss="modal-flot"><i class="ti-close"></i></a>
                                                    </div>
                                                    <form role="form" id="edit_element_ordonnance">
                                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                        <input type="hidden" class="ordon_detail_id_input" name="ordon_detail_id" value="">
                                                        <div class="modal-body" style="padding-top: 0px">
                                                            <div class="form-group">
                                                                <input type="hidden" name="id"/>
                                                                <label>Médicament</label>
                                                                <select class="form-control" id="médicament-edit" name="nom_medicament">

                                                                </select>

                                                                <button type="button" class="btn btn-secondary add-new-select-element-familiaux" data-html="Medicament" data-toggle='modal-float' data-target='#ModalLeftOneMedicament' style="margin-top: 5px;padding-top: 0px;padding-bottom: 0px;">
                                                                    <span class="ti-share"  style="padding-left: 0px;line-height: 2"></span>
                                                                </button>

                                                            </div>

                                                            <div class="form-group">
                                                                <label for="Quantité_edit">Quantité</label>
                                                                <input type="text" name="Quantite" class="form-control" id="Quantité_edit" >
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="Prise_edit">Prise</label>
                                                                <input type="text" name="Prise" class="form-control" id="Prise_edit" >
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="Periode_edit">Période</label>
                                                                <input type="text" name="Periode" class="form-control" id="Periode_edit" >
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="Nombre_Par_Jour_edit">Nombre Par Jour</label>
                                                                <input type="text" name="Nombre_Par_Jour" class="form-control" id="Nombre_Par_Jour_edit" >
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="Quand_edit">Quand</label>
                                                                <input type="text" name="Quand" class="form-control" id="Quand_edit" >
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="Remarque_Ordonnance_edit">Remarque</label>
                                                                <input type="text" name="Remarque" class="form-control" id="Remarque_Ordonnance_edit" >
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-default" id="edit_modal_float" data-dismiss="modal-flot">Annuler</button>
                                                            <button type="submit" class="btn btn-primary">Modifier</button>
                                                        </div>
                                                    </form>
                                                </div>
                                                <!-- Modal add element Ordonance  -->
                                                <div class="modal-flot add-medicament-modal" id="Modal-AddElementOrdonnance" data-position='right'>
                                                    <div class="modal-header">
                                                        <h3 class="modal-title">Ajouter un élément</h3>
                                                        <a href="javascript:;" data-dismiss="modal-flot"><i class="ti-close"></i></a>
                                                    </div>
                                                   <form role="form" id="add_element_ordonnance">
                                                       <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                       <input type="hidden" name="consultation_id" class="consultation_id_input">
                                                    <div class="modal-body" style="padding-top: 0px">
                                                        <div class="form-group">

                                                            <label>Médicament</label>
                                                            <select class="form-control" id="médicament-add" name="nom_medicament">

                                                            </select>

                                                            <button type="button" class="btn btn-secondary add-new-select-element-familiaux" data-html="Medicament" data-toggle='modal-float' data-target='#ModalLeftOneMedicament' style="margin-top: 5px;padding-top: 0px;padding-bottom: 0px;">
                                                                <span class="ti-share"  style="padding-left: 0px;line-height: 2"></span>
                                                            </button>

                                                        </div>

                                                        <div class="form-group">
                                                            <label for="Quantité">Quantité</label>
                                                            <input type="text" name="Quantite" class="form-control" id="Quantité" >
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="Prise">Prise</label>
                                                            <input type="text" name="Prise" class="form-control" id="Prise" >
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="Periode">Période</label>
                                                            <input type="text" name="Periode" class="form-control" id="Periode" >
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="Nombre_Par_Jour">Nombre Par Jour</label>
                                                            <input type="number"  name="Nombre_Par_Jour" class="form-control" id="Nombre_Par_Jour" >
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="Quand">Quand</label>
                                                            <input type="text" name="Quand" class="form-control" id="Quand" >
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="Remarque_Ordonnance">Remarque</label>
                                                            <input type="text" name="Remarque" class="form-control" id="Remarque_Ordonnance" >
                                                        </div>
                                                     </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal-flot" id="add_modal_float">Annuler</button>
                                                        <button type="submit" class="btn btn-primary">Ajouter</button>
                                                    </div>
                                                   </form>
                                                </div>

                                                <div id="consultation" class="panel-collapse collapse" aria-expanded="false" style="height: 2px;">
                                                    <div class="panel-body">
                                                        <div class="panel panel-success">

                                                            <div class="panel-body no-padding">

                                                                <div class="row">
                                                                    <div class="col-md-3 col-sm-3 col-xs-3">
                                                                        <ul class="nav nav-tabs tabs-left">
                                                                            <li class="active" id="Antecedents"><a href="#antecedent" data-toggle="tab"> Antécédents </a></li>
                                                                            <li id="Interrogatoire"><a href="#interrogat" data-toggle="tab"> Interrogatoire </a></li>

                                                                            <li id="Examan_Clinique"><a href="#Examan-Clinique" data-toggle="tab"> Examan Clinique </a></li>
                                                                            <li id="Bilan_Paraclinique"><a href="#Bilan-Paraclinique" data-toggle="tab"> Bilan Paraclinique </a></li>
                                                                        </ul>
                                                                    </div>
                                                                    <div class="col-md-9 col-sm-9 col-xs-9">
                                                                        <div class="tab-content">
                                                                            <div class="tab-pane active" id="antecedent">
                                                                              <form role="form" method="post" id="save_antecedent_all">
                                                                                  <input type="hidden" name="patient_id" class="patient_id_consultation">
                                                                                <button type="submit" class="btn btn-info pull-right">Save</button>
                                                                                <div class="col-md-12 top-class-element-antecedent">
                                                                                    <h4 class="style_titre insert-parent-element col-md-12">Familiaux</h4>

                                                                                    <a  data-type="Familiaux" id="familiaux-input" class="col-md-12 Ajouter-un-element">Ajouter un élément</a>

                                                                                </div>
                                                                                <div class="col-md-12">
                                                                                    <h4 class="style_titre">Medicaux</h4>

                                                                                    <a  data-type="Medicaux" id="medicaux-input"  class="col-md-12 Ajouter-un-element">Ajouter un élément</a>

                                                                                </div>
                                                                                <div class="col-md-12">

                                                                                        <h4 class="style_titre col-md-12">Habitudes alcoolo-tabagique</h4>

                                                                                        <a  id="habitudes-input" data-type="Habitudes alcoolo-tabagique" class="col-md-12 Ajouter-un-element">Ajouter un élément</a>
                                                                                </div>
                                                                                <div class="col-md-12">

                                                                                        <h4 class="style_titre col-md-12">Chirurgicaux,Complications</h4>

                                                                                        <a  id="chirurgicaux-input" data-type="Chirurgicaux,Complications" class="col-md-12 Ajouter-un-element">Ajouter un élément</a>

                                                                                </div>
                                                                              </form>
                                                                           </div>
                                                                            <div class="tab-pane fade" id="interrogat">
                                                                              <form role="form" method="post" id="save_motif_consultation_all">

                                                                                  <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                                                                  <input type="hidden" name="consultation_id" class="consultation_id_input">
                                                                                  <button type="submit" class="btn btn-info pull-right">Save</button>
                                                                                <div class="col-md-12">
                                                                                    <h4 class="style_titre col-md-12">Motif Consultation</h4>

                                                                                    <a id='motif-consultation-input' data-type="Motif_Consultation" class="col-md-12 Ajouter-un-element">Ajouter un élément</a>
                                                                                </div>
                                                                               </form>
                                                                            </div>
                                                                            <div class="tab-pane fade" id="Examan-Clinique">
                                                                                <div class="col-md-12">
                                                                                 <form role="form" method="post" id="save_examan_clinique_all">
                                                                                        <input type="hidden" name="consultation_id" class="consultation_id_input">
                                                                                        <button type="submit" class="btn btn-info pull-right">Save</button>
                                                                                    <h4 class="style_titre col-md-12">Général</h4>


                                                                                    <a id="general-input" data-type="General" class="col-md-12 Ajouter-un-element">Ajouter un élément</a>

                                                                                    <h4 class="style_titre col-md-12">Par Appareil</h4>


                                                                                    <a id="par-appareil-input"  data-type="Par Appareil" class="col-md-12 Ajouter-un-element">Ajouter un élément</a>
                                                                                 </form>

                                                                                </div>
                                                                            </div>
                                                                            <div class="tab-pane fade" id="Bilan-Paraclinique">
                                                                                <div class="col-md-12">
                                                                                 <form role="form" method="post" id="save_bilan_paraclinique_all">
                                                                                     <input type="hidden" name="consultation_id" class="consultation_id_input">
                                                                                      <button type="submit" class="btn btn-info pull-right">Save</button>
                                                                                    <h4 class="style_titre col-md-12">Biologie</h4>


                                                                                    <a id="bilan-biologie-input" data-type="Biologie" class="col-md-12 Ajouter-un-element" >Ajouter un élément</a>

                                                                                    <h4 class="style_titre col-md-12">Radiologie</h4>


                                                                                    <a id="bilan-radiologie-input"  data-type="Radiologie" class="col-md-12 Ajouter-un-element">Ajouter un élément</a>
                                                                                 </form>

                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>


                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    <h4 class="panel-title">
                                                        <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#ordonnance" aria-expanded="false">
                                                            <i class="fa fa-gavel"></i> Ordonnance
                                                        </a>
                                                    </h4>
                                                </div>
                                                <div id="ordonnance" class="panel-collapse collapse" aria-expanded="false">
                                                    <div class="panel-body">
                                                        <table class="table table-bordered table-hover" >
                                                            <thead>
                                                            <tr>
                                                                <th>Médicament</th>
                                                                <th>Quantité</th>
                                                                <th>Prise</th>
                                                                <th>Période</th>
                                                                <th>Nombre Par Jour</th>
                                                                <th>Quand</th>
                                                                <th>Remarque</th>
                                                                <th></th>
                                                            </tr>
                                                            </thead>
                                                            <tbody id="ajouter_un_element_ordonnance_insert">


                                                            </tbody>
                                                        </table>
                                                        <a data-toggle='modal-float' data-target='#Modal-AddElementOrdonnance' >Ajouter un élèment</a>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    <h4 class="panel-title">
                                                        <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#bilan" aria-expanded="false">
                                                            <i class="fa fa-building-o"></i> Bilan
                                                        </a>
                                                    </h4>
                                                </div>
                                                <div id="bilan" class="panel-collapse collapse" aria-expanded="false">
                                                    <div class="panel-body">
                                                        <div class="panel panel-success">

                                                            <div class="panel-body no-padding">

                                                                <div class="row">
                                                                    <div class="col-md-3 col-sm-3 col-xs-3">
                                                                        <ul class="nav nav-tabs tabs-left">
                                                                            <li class="active"><a href="#Radiologie" data-toggle="tab"> Radiologie </a></li>
                                                                            <li><a href="#Biologie" data-toggle="tab"> Biologie </a></li>

                                                                        </ul>
                                                                    </div>
                                                                    <div class="col-md-9 col-sm-9 col-xs-9">
                                                                        <div class="tab-content">
                                                                            <div class="tab-pane active" id="Radiologie">
                                                                                <form class="form-horizontal" id="save_bilan_radiologie_consultation_all">

                                                                                    <div class="col-md-12 col-md-offset-7">
                                                                                        <button type="submit" class="btn btn-info" id="save_radiologie_show">Save</button>
                                                                                        <button id="btn_imprime_radiologie" type="button" class="btn btn-labeled btn-success" style="border-bottom: 5px"><span class="btn-label"><i class="sli-printer icons"></i></span>Imprimer Bilan</button>

                                                                                    </div>
                                                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                                                    <input type="hidden" name="consultation_id" class="consultation_id_input">
                                                                                   <div id="imprimer_radiologie">
                                                                                       <div class="form-group">
                                                                                           <label for="inputUserName" class="control-label">Prestataire</label>
                                                                                           <br>
                                                                                           <div class="col-md-8 ">
                                                                                               <select id="select_prestateur_list_all_radiologie" class="form-control select_prestateur_list_all" name="nom_prestateur">


                                                                                               </select>
                                                                                           </div>
                                                                                           <span class=" col-md-2 ti-share col-md-1 add-new-select-element-familiaux" data-html="Prestataire" data-toggle="modal" data-target="#modal_add_element" style="padding-left: 0px;line-height: 2"></span>

                                                                                       </div>
                                                                                       <div class="form-group">
                                                                                           <label>Type</label>
                                                                                           <br>
                                                                                           <div class="col-md-8 ">
                                                                                               <select id="select_type_list_all_radiologie" class="form-control " id="select_type_bilan_consultation_radiologie" name="nom_type">

                                                                                               </select>
                                                                                           </div>
                                                                                           <span class=" col-md-2 ti-share col-md-1 add-new-select-element-familiaux" data-html="Type Bilan radiologie" data-toggle="modal" data-target="#modal_add_element" style="padding-left: 0px;line-height: 2"></span>

                                                                                       </div>
                                                                                       <div class="form-group">
                                                                                           <label>RC</label>
                                                                                           <textarea id="rc-bilan-radiologie-input" class="form-control txtCharCounter" name="rc"  rows="5" data-warningColor="#E03B30"></textarea>
                                                                                       </div>
                                                                                   </div>
                                                                                    <div id="editor"></div>

                                                                                </form>
                                                                            </div>

                                                                            <div class="tab-pane fade" id="Biologie">
                                                                                <form class="form-horizontal" id="add_bilan_biologie_consultation_all">
                                                                                    <div class="col-md-12 col-md-offset-7">
                                                                                        <button type="submit" class="btn btn-info" id="save_biologie_show">Save</button>
                                                                                        <button id="btn_imprime_biologie" type="button" class="btn btn-labeled btn-success" style="border-bottom: 5px"><span class="btn-label"><i class="sli-printer icons"></i></span>Imprimer Bilan</button>
                                                                                    </div>
                                                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                                                    <input type="hidden" name="consultation_id" class="consultation_id_input">
                                                                                    <div id="imprimer_biologie">
                                                                                      <div class="form-group">
                                                                                        <label for="inputUserName" class="control-label">Prestataire</label>
                                                                                        <br>
                                                                                        <div class="col-md-8 ">
                                                                                            <select id="select_prestateur_list_all_biologie" class="form-control select_prestateur_list_all" name="nom_prestateur">

                                                                                            </select>
                                                                                        </div>
                                                                                        <span class=" col-md-2 ti-share col-md-1 add-new-select-element-familiaux" data-html="Prestataire" data-toggle="modal" data-target="#modal_add_element" style="padding-left: 0px;line-height: 2"></span>

                                                                                    </div>
                                                                                      <div class="form-group">
                                                                                        <label>Type</label>
                                                                                        <br>
                                                                                        <div class="col-md-8 ">
                                                                                            <select id="select_type_list_all_biologie" class="form-control" id="select_type_bilan_consultation_biologie" name="nom_type">

                                                                                            </select>
                                                                                        </div>
                                                                                        <span class=" col-md-2 ti-share col-md-1 add-new-select-element-familiaux" data-html="Type Bilan Biologie" data-toggle="modal" data-target="#modal_add_element" style="padding-left: 0px;line-height: 2"></span>

                                                                                    </div>
                                                                                      <div class="form-group">
                                                                                        <label>RC</label>
                                                                                        <textarea id="rc-bilan-biologie-input" class="form-control txtCharCounter" name="rc"  rows="5" data-warningColor="#E03B30"></textarea>
                                                                                    </div>
                                                                                    </div>

                                                                                </form>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>


                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    <h4 class="panel-title">
                                                        <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#certificat_medical" aria-expanded="false">
                                                            <i class="fa fa-building-o"></i> Certificat Médical
                                                        </a>
                                                    </h4>
                                                </div>
                                                <div id="certificat_medical" class="panel-collapse collapse" aria-expanded="false">
                                                    <div class="panel-body">
                                                      <form role="form" id="save_certifict_medical_all">
                                                        <button type="submit" class="btn btn-info pull-right">Save</button>

                                                          <input type="hidden" name="consultation_id" class="consultation_id_input">

                                                        <div class="form-group">
                                                            <label>Type</label>
                                                            <select id="select_type_certificat" class="form-control" name="type_certification" >

                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Durée (Jour) :</label>
                                                            <span  title="Durée" name="Durée_jour" id="Durée_par_jour"></span>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Du</label>
                                                            <input id="date_du" title="Date Du"  name="date_du" type="text" class="form-control date-picker"  data-date-format="dd/mm/yyyy" placeholder="jj/mm/aaaa">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Au</label>
                                                            <input id="date_au" title="Date Au" name="date_au" type="text" class="form-control date-picker" data-date-format="dd/mm/yyyy" placeholder="jj/mm/aaaa">
                                                        </div>
                                                      </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <form role="form" id="form_save_all_consultation_finish">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <input type="hidden" name="consultation_id" class="consultation_id_input">
                                                <input type="hidden" class="input_with_id_rendez_vous_save_all" name="rendez_vous_id" value="" />
                                                <div class="panel panel-default">
                                                        <div class="panel-heading">
                                                            <h4 class="panel-title">
                                                                <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#remarque" aria-expanded="false">
                                                                    <i class="fa fa-building-o"></i> Remarque
                                                                </a>
                                                            </h4>
                                                        </div>

                                                        <div id="remarque" class="panel-collapse collapse" aria-expanded="false">

                                                                <div class="form-group ">

                                                                  <textarea id="remarque_consultation" class="form-control txtCharCounter" name="remarque"  rows="5" data-warningColor="#E03B30"></textarea>
                                                                </div>

                                                        </div>
                                                    </div>
                                                <button type="submit" class="btn btn-primary">Fin</button>
                                                <button type="button" id="annuller_consultation_all" class="btn btn-warning">Annuler Consultation</button>
                                         </form>
                                        </div>

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
     <!-- intro to patients_panel-->

        <div id="imprimer_bilan_panel" style="display: none">
            <div class="page-header">
                <div class="content-wrap">  <!--START: Content Wrap-->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-default" style="margin-bottom: 0px">
                                <div class="panel-heading" style="height:100px">
                                    <h1 class="panel-title col-md-12"> Bilan <span id="bilan_name_saved"></span></h1>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-default" style="margin-bottom: 0px">
                                <div class="panel-body">
                                    <h2>Prestataire :  </h2> <strong id="nom_prestataire_imprimer"> </strong>
                                    <h2>Type :  </h2> <span id="type_bilan_imprimer"> </span>
                                    <h2>Remarque :  </h2>
                                     <span id="remarque_bilan_imprimer"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

     <!-- prestataire panel-->
        <div id="prestataire_panel" style="display:none;width: 100%;">

            <div class="page-header">
                <h1><i class="fa fa-user-md"></i> Prestataire </h1>
            </div>

            <div class="content-wrap" style="padding-top: 0px">

                <div class="row">
                    <div class="col-md-12">

                            <div class="">
                                <div class="panel-body" style="padding-left: 0px">

                                    <button class="btn btn-secondary click_add" data-toggle='modal' data-target='#modal_add_prestataire_panel'><i class="fa fa-user-plus"></i></button>
                                </div>
                                <!-- Modal Add Prestataire  -->
                                <div class="modal modal-info fade modal_add_prestataire_panel" id="modal_add_prestataire_panel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header" style="padding-bottom: 0px;padding-top: 0px;position: relative;display: flex;" >
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title" id="myModalLabel" style="width: 300px;padding-top: 20px;">Ajouter Prestataire</h4>
                                                <div id="error_shox" class="jq-toast-single jq-has-icon jq-icon-error" style="padding-bottom: 0px;position:initial;display: none;background-color: rgb(255, 72, 89); text-align: left; width: 400px; ">
                                                    <span class="jq-toast-loader"></span>
                                                    <span class="close-jq-toast-single">×</span>

                                                    <span id="my_error"></span>
                                                </div>

                                            </div>

                                            <div class="modal-body" style="padding-top: 0px">
                                                <div class="panel">
                                                    <div>
                                                        <form  method="post" role="form" id="form_add_prestataire">

                                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                            <div class="form-body" >
                                                              <div class="row">
                                                                    <div class="form-group col-lg-6" style="padding-top:15px">
                                                                        <label for="nom_add_prestataire">Nom</label>
                                                                        <input type="text" required class="form-control"  id="nom_add_prestataire"   name="nom_add_prestataire"  placeholder="Nom">
                                                                    </div>
                                                                    <div class="form-group col-lg-6"  style="padding-top:15px">
                                                                        <label for="email_add_prestataire">Email</label>
                                                                        <input type="email"  class="form-control" id="email_add_prestataire"  name="email_add_prestataire"  placeholder="Email">
                                                                    </div>
                                                              </div>

                                                               <div class="row">
                                                                    <div class="form-group col-lg-6">
                                                                        <label for="tel_add_prestataire">Tel</label>
                                                                        <input type="number" maxlength="10" class="form-control"  id="tel_add_prestataire"   name="tel_add_prestataire"  placeholder="Téléphone">
                                                                    </div>

                                                                    <div class="form-group col-lg-6">
                                                                        <label for="ville_add_prestataire">Ville</label>
                                                                        <input type="text"  class="form-control"  id="ville_add_prestataire"   name="ville_add_prestataire" placeholder="Ville">
                                                                    </div>
                                                               </div>

                                                                <div class="row">
                                                                    <div class="form-group col-lg-12">
                                                                        <label for="adresse_add_prestataire">Adresse</label>
                                                                        <input type="text"  class="form-control"  id="adresse_add_prestataire"   name="adresse_add_prestataire" placeholder="Adresse">
                                                                    </div>
                                                                </div>

                                                                <div class="pull-right">
                                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                                                                    <button type="submit"  class="btn btn-primary">Ajouter</button>
                                                                </div>

                                                            </div>

                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <!-- Modal Edit Prestataire  -->
                                <div class="modal modal-info fade modal_edit_prestataire_panel" id="modal_edit_prestataire_panel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header" style="padding-bottom: 0px;padding-top: 0px;position: relative;display: flex;" >
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title" id="myModalLabel" style="width: 300px;padding-top: 20px;">Modifier Prestataire</h4>
                                                <div id="error_shox" class="jq-toast-single jq-has-icon jq-icon-error" style="padding-bottom: 0px;position:initial;display: none;background-color: rgb(255, 72, 89); text-align: left; width: 400px; ">
                                                    <span class="jq-toast-loader"></span>
                                                    <span class="close-jq-toast-single">×</span>

                                                    <span id="my_error"></span>
                                                </div>

                                            </div>

                                            <div class="modal-body" style="padding-top: 0px">
                                                <div class="panel">
                                                    <div>
                                                        <form  method="post" role="form" id="form_edit_prestataire">

                                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                            <input type="hidden" name="prestataire_id" id="prestataire_id_input">

                                                            <div class="form-body" >
                                                                <div class="row">
                                                                    <div class="form-group col-lg-6" style="padding-top:15px">
                                                                        <label for="nom_edit_prestataire">Nom</label>
                                                                        <input type="text" required class="form-control"  id="nom_edit_prestataire"   name="nom_edit_prestataire"  placeholder="Nom">
                                                                    </div>
                                                                    <div class="form-group col-lg-6"  style="padding-top:15px">
                                                                        <label for="email_edit_prestataire">Email</label>
                                                                        <input type="email"  class="form-control" id="email_edit_prestataire"  name="email_edit_prestataire"  placeholder="Email">
                                                                    </div>
                                                                </div>

                                                                <div class="row">
                                                                    <div class="form-group col-lg-6">
                                                                        <label for="tel_edit_prestataire">Tel</label>
                                                                        <input type="number" maxlength="10" class="form-control"  id="tel_edit_prestataire"   name="tel_edit_prestataire"  placeholder="Téléphone">
                                                                    </div>

                                                                    <div class="form-group col-lg-6">
                                                                        <label for="ville_edit_prestataire">Ville</label>
                                                                        <input type="text"  class="form-control"  id="ville_edit_prestataire"   name="ville_edit_prestataire" placeholder="Ville">
                                                                    </div>
                                                                </div>

                                                                <div class="row">
                                                                    <div class="form-group col-lg-12">
                                                                        <label for="adresse_edit_prestataire">Adresse</label>
                                                                        <input type="text"  class="form-control"  id="adresse_edit_prestataire"   name="adresse_edit_prestataire" placeholder="Adresse">
                                                                    </div>
                                                                </div>

                                                                <div class="pull-right">
                                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                                                                    <button type="submit"  class="btn btn-danger">Modifier</button>
                                                                </div>

                                                            </div>

                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                            </div>
                    </div>
                  </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">

                                <div class="tools">
                                    <a class="btn-link collapses panel-collapse" href="javascript:;"></a>
                                    <a class="btn-link reload" href="javascript:;"><i class="ti-reload"></i></a>
                                </div>
                            </div>
                            <div class="panel-body">
                                <table class="table table-bordered table-dataTable" id="table_prestataires" width="100%">

                                    <thead>
                                    <tr>
                                        <th ></th>
                                        <th class="width_modif">Nom</th>
                                        <th class="width_modif">Email</th>
                                        <th class="width_modif">Téléphone</th>
                                        <th class="width_modif">Adresse</th>
                                        <th class="width_modif">Ville</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th ></th>
                                        <th class="width_modif">Nom</th>
                                        <th class="width_modif">Email</th>
                                        <th class="width_modif">Téléphone</th>
                                        <th class="width_modif">Adresse</th>
                                        <th class="width_modif">Ville</th>

                                    </tr>
                                    </tfoot>
                                    <tbody id="tbody_for_after_add_element">
                                    @foreach($prestataires as $prestataire)
                                        <tr class="prestataire{{$prestataire->id}}">
                                            <td style="padding: 5px;text-align: center">
                                                <a class="btn btn-social-icon btn-xs btn-instagram edit_big_btn_prestataire"  data-toggle="modal"  data-target="#modal_edit_prestataire_panel" data-email="{{$prestataire->email}}" data-id="{{$prestataire->id}}" data-ville="{{$prestataire->ville}}"  @if($prestataire->tel =='0') data-tel="" @else data-tel="0{{$prestataire->tel}}" @endif data-nom="{{$prestataire->nom}}" data-adresse="{{$prestataire->adresse}}" ><span class="fa fa-edit"></span></a>
                                                <a class="btn btn-social-icon btn-xs btn-google btn-lg  delete_btn_prestataire " id="delete_btn_prestataire" data-id="{{$prestataire->id}}" data-type="prestataire"  data-toggle="modal"  data-target="#modal_delete_confirmation"><span class="fa fa-trash"></span></a>
                                            </td>
                                            <td style="text-align: center">{{$prestataire->nom}}</td>
                                            <td style="text-align: center">{{$prestataire->email}}</td>
                                            <td style="text-align: center">@if($prestataire->tel =='0')  @else 0{{$prestataire->tel}} @endif</td>
                                            <td style="text-align: center">{{$prestataire->adresse}}</td>
                                            <td style="text-align: center">{{$prestataire->ville}}</td>
                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>





    <!-- Elements CRUD Panel-->
        <!-- Medicaments panel-->
        <div id="Medicament_panel" style="display:none">

            <div class="page-header">
                <h1><i class="fa fa-shield"></i> Médicaments </h1>
            </div>

            <div class="content-wrap" style="padding-top: 0px">

                <div class="row">
                    <div class="col-md-12">
                        <div class="">
                            <div class="panel-body" style="padding-left: 0px">
                                <button class="btn btn-secondary " data-toggle='modal' data-target="#modal_big_add_medicament_panel"><i class="fa fa-plus"></i></button>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">

                                <div class="tools">
                                    <a class="btn-link collapses panel-collapse" href="javascript:;"></a>
                                    <a class="btn-link reload" href="javascript:;"><i class="ti-reload"></i></a>
                                </div>
                            </div>
                            <div class="panel-body table-responsive">
                                <table id="table_medicament" class="table table-bordered table-dataTable" style="width: 100% !important">

                                    <thead>
                                    <tr>
                                        <th style="width: 50px!important"></th>
                                        <th style="text-align: center">Code</th>
                                        <th style="text-align: center">Nom</th>
                                        <th style="text-align: center">Dci</th>
                                        <th style="text-align: center">Dosage</th>
                                        <th style="text-align: center">Unite dosage</th>
                                        <th style="text-align: center">Forme</th>
                                        <th style="text-align: center">Presentation</th>
                                        <th style="text-align: center">PPV</th>
                                        <th style="text-align: center">PH</th>
                                        <th style="text-align: center">Prix br</th>
                                        <th style="text-align: center">Princips generique</th>
                                        <th style="text-align: center">taux remboursement</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th style="width: 50px!important"></th>
                                        <th style="text-align: center">Code</th>
                                        <th style="text-align: center">Nom</th>
                                        <th style="text-align: center">Dci</th>
                                        <th style="text-align: center">Dosage</th>
                                        <th style="text-align: center">Unite dosage</th>
                                        <th style="text-align: center">Forme</th>
                                        <th style="text-align: center">Presentation</th>
                                        <th style="text-align: center">PPV</th>
                                        <th style="text-align: center">PH</th>
                                        <th style="text-align: center">Prix br</th>
                                        <th style="text-align: center">Princips generique</th>
                                        <th style="text-align: center">taux remboursement</th>

                                    </tr>
                                    </tfoot>
                                    <tbody id="tbody_for_datatables_medicament">
                                    @foreach($medicaments as $medicament)
                                        <tr class="medicament{{$medicament->id}}" id="tbody_for_after_add_element_medicament">
                                            <td style="padding: 5px">
                                                <a class="btn btn-social-icon btn-xs btn-instagram edit_big_btn_medicament"  data-toggle="modal"  data-target="#modal_edit_medicament_panel" data-id="{{$medicament->id}}" data-nom="{{$medicament->nom}}"  data-code="{{$medicament->code}}"  data-dci1="{{$medicament->dci1}}" data-dosage1="{{$medicament->dosage1}}" data-unite_dosage1="{{$medicament->unite_dosage1}}" data-forme="{{$medicament->forme}}" data-presentation="{{$medicament->presentation}}" data-ppv="{{$medicament->ppv}}" data-ph="{{$medicament->ph}}" data-prix_br="{{$medicament->prix_br}}" data-princeps_generique="{{$medicament->princeps_generique}}" data-taux_remboursement="{{$medicament->taux_remboursement}}" ><span class="fa fa-edit"></span></a>
                                                <a class="btn btn-social-icon btn-xs btn-google btn-lg  delete_btn_medicament" id="delete_btn_medicament" data-id="{{$medicament->id}}" data-type="medicament"  data-toggle="modal"  data-target="#modal_delete_confirmation"><span class="fa fa-trash"></span></a>
                                            </td>
                                            <td style="text-align: center">{{$medicament->code}}</td>
                                            <td style="text-align: center">{{$medicament->nom}}</td>
                                            <td style="text-align: center">{{$medicament->dci1}}</td>
                                            <td style="text-align: center">{{$medicament->dosage1}}</td>
                                            <td style="text-align: center">{{$medicament->unite_dosage1}}</td>
                                            <td style="text-align: center">{{$medicament->forme}}</td>
                                            <td style="text-align: center">{{$medicament->presentation}}</td>
                                            <td style="text-align: center">{{$medicament->ppv}}</td>
                                            <td style="text-align: center">{{$medicament->ph}}</td>
                                            <td style="text-align: center">{{$medicament->prix_br}}</td>
                                            <td style="text-align: center">{{$medicament->princeps_generique}}</td>
                                            <td style="text-align: center">{{$medicament->taux_remboursement}}</td>

                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>


            </div>

        </div>

        <!-- Rubriques Medicaments panel-->
        <div id="Rubriques_Medicament_panel" style="display:none">

            <div class="page-header">
                <h1><i class="fa fa-shield"></i> Rubriques Médicaux</h1>
            </div>

            <div class="content-wrap" style="padding-top: 0px">

                <div class="row">
                    <div class="col-md-12">
                        <div class="">
                            <div class="panel-body" style="padding-left: 0px">
                                <button class="btn btn-secondary" id="btn_affiche_rubriques_medicament_add_modal" data-html="Medicaux" data-toggle='modal' data-target="#modal_add_element"><i class="fa fa-plus"></i></button>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">

                                <div class="tools">
                                    <a class="btn-link collapses panel-collapse" href="javascript:;"></a>
                                    <a class="btn-link reload" href="javascript:;"><i class="ti-reload"></i></a>
                                </div>
                            </div>
                            <div class="panel-body">
                                <table class="table table-bordered table-dataTable" id="table_Rubriques_Medicament" style="width: 100% !important">

                                    <thead>
                                    <tr>
                                        <th style="width: 50px!important"></th>
                                        <th style="text-align: center">Nom Rubriques </th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th style="width: 50px!important"></th>
                                        <th style="text-align: center">Nom Rubriques</th>

                                    </tr>
                                    </tfoot>
                                    <tbody >
                                    @foreach($rubriques_medicaments as $r_medicament)
                                        <tr class="rubriques_medicament{{$r_medicament->id}}" id="tbody_for_after_add_rubriques_medicament">
                                            <td style="padding: 5px">
                                                <a class="btn btn-social-icon btn-xs btn-instagram edit_big_btn_rubriques_medicament"  data-toggle="modal"  data-target="#modal_edit_rubrique_medicaux_panel" data-id="{{$r_medicament->id}}" data-nom="{{$r_medicament->nom}}" ><span class="fa fa-edit"></span></a>
                                                <a class="btn btn-social-icon btn-xs btn-google btn-lg  delete_btn_rubriques_medicament" id="delete_btn_rubriques_medicament" data-id="{{$r_medicament->id}}" data-type="Medicaux"  data-toggle="modal"  data-target="#modal_delete_confirmation"><span class="fa fa-trash"></span></a>
                                            </td>
                                            <td style="text-align: center">{{$r_medicament->nom}}</td>

                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>


            </div>

        </div>

        <!-- Familiaux Panel -->
        <div id="Familiaux_panel" style="display:none">

            <div class="page-header">
                <h1><i class="fa fa-sitemap"></i> Familiaux </h1>
            </div>

            <div class="content-wrap" style="padding-top: 0px">

                <div class="row">
                    <div class="col-md-12">
                        <div class="">
                            <div class="panel-body" style="padding-left: 0px">
                                <button class="btn btn-secondary" id="btn_affiche_familiaux_add_modal" data-html="familiaux" data-toggle='modal' data-target="#modal_add_element"><i class="fa fa-plus"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">

                                <div class="tools">
                                    <a class="btn-link collapses panel-collapse" href="javascript:;"></a>
                                    <a class="btn-link reload" href="javascript:;"><i class="ti-reload"></i></a>
                                </div>
                            </div>
                            <div class="panel-body">
                                <table class="table table-bordered table-dataTable" id="table_familiaux"  style="width: 100% !important">

                                    <thead>
                                    <tr>
                                        <th  style="width: 50px !important"></th>
                                        <th style="text-align: center">Nom Familiaux</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th  style="width: 50px !important"></th>
                                        <th style="text-align: center">Nom Familiaux</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                    @foreach($familiaux as $familiau)
                                        <tr class="familiaux{{$familiau->id}}" id="tbody_for_after_add_element_familiaux">
                                            <td style="padding: 5px">
                                                <a class="btn btn-social-icon btn-xs btn-instagram edit_big_btn_familiaux"  data-toggle="modal"  data-target="#modal_edit_familiaux_panel" data-id="{{$familiau->id}}" data-nom="{{$familiau->nom}}" ><span class="fa fa-edit"></span></a>
                                                <a class="btn btn-social-icon btn-xs btn-google btn-lg  delete_btn_familiaux" id="delete_btn_familiaux" data-id="{{$familiau->id}}" data-type="familiaux"  data-toggle="modal"  data-target="#modal_delete_confirmation"><span class="fa fa-trash"></span></a>
                                            </td>
                                            <td style="text-align: center">{{$familiau->nom}}</td>
                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>


            </div>

        </div>

        <!-- Habitudes Alcoolo Tabagique Antecedent Panel -->
        <div id="Habitudes_alcoolo_tabagique_panel" style="display:none">

            <div class="page-header">
                <h1><i class="fa fa-glass"></i> Habitudes Alcoolo Tabagique </h1>
            </div>

            <div class="content-wrap" style="padding-top: 0px">

                <div class="row">
                    <div class="col-md-12">
                        <div class="">
                            <div class="panel-body" style="padding-left: 0px">
                                <button class="btn btn-secondary" id="btn_affiche_Habitudes_alcoolo_tabagique_add_modal" data-html="Habitudes alcoolo-tabagique" data-toggle='modal' data-target="#modal_add_element"><i class="fa fa-plus"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">

                                <div class="tools">
                                    <a class="btn-link collapses panel-collapse" href="javascript:;"></a>
                                    <a class="btn-link reload" href="javascript:;"><i class="ti-reload"></i></a>
                                </div>
                            </div>
                            <div class="panel-body">
                                <table class="table table-bordered table-dataTable" id="table_Habitudes"  style="width: 100% !important">

                                    <thead>
                                    <tr>
                                        <th  style="width: 50px !important"></th>
                                        <th style="text-align: center">Nom Habitudes Alcoolo Tabagique</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th  style="width: 50px !important"></th>
                                        <th style="text-align: center">Nom Habitudes Alcoolo Tabagique</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                    @foreach($habitudes_alcoolo_tabagique as $h_a_t)
                                        <tr class="habitudes_alcoolo_tabagique{{$h_a_t->id}}" id="tbody_for_after_add_element_Habitudes_alcoolo_tabagique">
                                            <td style="padding: 5px">
                                                <a class="btn btn-social-icon btn-xs btn-instagram  edit_big_btn_Habitudes_alcoolo_tabagique"  data-toggle="modal"  data-target="#modal_edit_Habitudes_alcoolo_tabagique_panel" data-id="{{$h_a_t->id}}" data-nom="{{$h_a_t->nom}}" ><span class="fa fa-edit"></span></a>
                                                <a class="btn btn-social-icon btn-xs btn-google btn-lg  delete_btn_Habitudes_alcoolo_tabagique" id="delete_btn_Habitudes_alcoolo_tabagique" data-id="{{$h_a_t->id}}" data-type="Habitudes alcoolo-tabagique"  data-toggle="modal"  data-target="#modal_delete_confirmation"><span class="fa fa-trash"></span></a>
                                            </td>
                                            <td style="text-align: center">{{$h_a_t->nom}}</td>
                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- Chirurgicaux,Complications Antecedent Panel -->
        <div id="Chirurgicaux_Complications_panel" style="display:none">

            <div class="page-header">
                <h1><i class="fa fa-link"></i> Chirurgicaux,Complications </h1>
            </div>

            <div class="content-wrap" style="padding-top: 0px">

                <div class="row">
                    <div class="col-md-12">
                        <div class="">
                            <div class="panel-body" style="padding-left: 0px">
                                <button class="btn btn-secondary" id="btn_affiche_Chirurgicaux_Complications_add_modal" data-html="Chirurgicaux,Complications" data-toggle='modal' data-target="#modal_add_element"><i class="fa fa-plus"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">

                                <div class="tools">
                                    <a class="btn-link collapses panel-collapse" href="javascript:;"></a>
                                    <a class="btn-link reload" href="javascript:;"><i class="ti-reload"></i></a>
                                </div>
                            </div>
                            <div class="panel-body">
                                <table class="table table-bordered table-dataTable" id="table_Chirurgicaux_Complications"  style="width: 100% !important">

                                    <thead>
                                    <tr>
                                        <th  style="width: 50px !important"></th>
                                        <th style="text-align: center">Nom Chirurgicaux,Complications</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th  style="width: 50px !important"></th>
                                        <th style="text-align: center">Nom Chirurgicaux,Complications</th>
                                    </tr>
                                    </tfoot>
                                    <tbody >

                                    @foreach($chirurgicaux_complications as $ch_c)
                                        <tr class="Chirurgicaux_Complications{{$ch_c->id}}" id="tbody_for_after_add_element_Chirurgicaux_Complications">
                                            <td style="padding: 5px">
                                                <a class="btn btn-social-icon btn-xs btn-instagram  edit_big_btn_Chirurgicaux_Complications"  data-toggle="modal"  data-target="#modal_edit_Chirurgicaux_Complications_panel" data-id="{{$ch_c->id}}" data-nom="{{$ch_c->nom}}" ><span class="fa fa-edit"></span></a>
                                                <a class="btn btn-social-icon btn-xs btn-google btn-lg  delete_btn_Chirurgicaux_Complications" id="delete_btn_Chirurgicaux_Complications" data-id="{{$ch_c->id}}" data-type="Chirurgicaux,Complications"  data-toggle="modal"  data-target="#modal_delete_confirmation"><span class="fa fa-trash"></span></a>
                                            </td>
                                            <td style="text-align: center">{{$ch_c->nom}}</td>
                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- Motif Consultation  Panel -->
        <div id="Motif_Consultation_panel" style="display:none">

            <div class="page-header">
                <h1><i class="di di-sticky"></i> Motif Consultation </h1>
            </div>

            <div class="content-wrap" style="padding-top: 0px">

                <div class="row">
                    <div class="col-md-12">
                        <div class="">
                            <div class="panel-body" style="padding-left: 0px">
                                <button class="btn btn-secondary" id="btn_affiche_Motif_Consultation_add_modal" data-html="Motif Consultation" data-toggle='modal' data-target="#modal_add_element"><i class="fa fa-plus"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">

                                <div class="tools">
                                    <a class="btn-link collapses panel-collapse" href="javascript:;"></a>
                                    <a class="btn-link reload" href="javascript:;"><i class="ti-reload"></i></a>
                                </div>
                            </div>
                            <div class="panel-body">
                                <table class="table table-bordered table-dataTable" id="table_motif_consultation"  style="width: 100% !important">

                                    <thead>
                                    <tr>
                                        <th  style="width: 50px !important"></th>
                                        <th style="text-align: center">Nom Motif Consultation</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th  style="width: 50px !important"></th>
                                        <th style="text-align: center">Nom Motif Consultation</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>

                                    @foreach($motif_consultation as $m_c)
                                        <tr class="Motif_Consultation{{$m_c->id}}" id="tbody_for_after_add_element_Motif_Consultation">
                                            <td style="padding: 5px">
                                                <a class="btn btn-social-icon btn-xs btn-instagram  edit_big_btn_Motif_Consultation"  data-toggle="modal"  data-target="#modal_edit_Motif_Consultation_panel" data-id="{{$m_c->id}}" data-nom="{{$m_c->nom}}" ><span class="fa fa-edit"></span></a>
                                                <a class="btn btn-social-icon btn-xs btn-google btn-lg  delete_btn_Motif_Consultation" id="delete_btn_Motif_Consultation" data-id="{{$m_c->id}}" data-type="Motif Consultation"  data-toggle="modal"  data-target="#modal_delete_confirmation"><span class="fa fa-trash"></span></a>
                                            </td>
                                            <td style="text-align: center">{{$m_c->nom}}</td>
                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!--  Examan Général  Panel -->
        <div id="Examan_General_panel" style="display:none">

            <div class="page-header">
                <h1><i class="fa fa-heartbeat"></i> Examan Général </h1>
            </div>

            <div class="content-wrap" style="padding-top: 0px">

                <div class="row">
                    <div class="col-md-12">
                        <div class="">
                            <div class="panel-body" style="padding-left: 0px">
                                <button class="btn btn-secondary" id="btn_affiche_Examan_General_add_modal" data-html="General" data-toggle='modal' data-target="#modal_add_element"><i class="fa fa-plus"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">

                                <div class="tools">
                                    <a class="btn-link collapses panel-collapse" href="javascript:;"></a>
                                    <a class="btn-link reload" href="javascript:;"><i class="ti-reload"></i></a>
                                </div>
                            </div>
                            <div class="panel-body">
                                <table class="table table-bordered table-dataTable" id="table_Examan_General"  style="width: 100% !important">

                                    <thead>
                                    <tr>
                                        <th  style="width: 50px !important"></th>
                                        <th style="text-align: center">Nom Element Examan Général</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th  style="width: 50px !important"></th>
                                        <th style="text-align: center">Nom Element Examan Général</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>

                                    @foreach($examan_general as $ex_gl)
                                        <tr class="Examan_General{{$ex_gl->id}} " id="tbody_for_after_add_element_Examan_General">
                                            <td style="padding: 5px">
                                                <a class="btn btn-social-icon btn-xs btn-instagram  edit_big_btn_Examan_General"  data-toggle="modal"  data-target="#modal_edit_Examan_General_panel" data-id="{{$ex_gl->id}}" data-nom="{{$ex_gl->nom}}" ><span class="fa fa-edit"></span></a>
                                                <a class="btn btn-social-icon btn-xs btn-google btn-lg  delete_btn_Examan_General" id="delete_btn_Examan_General" data-id="{{$ex_gl->id}}" data-type="General"  data-toggle="modal"  data-target="#modal_delete_confirmation"><span class="fa fa-trash"></span></a>
                                            </td>
                                            <td style="text-align: center">{{$ex_gl->nom}}</td>
                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!--  Examan Par Appareil  Panel -->
        <div id="Examan_Par_Appareil_panel" style="display:none">

            <div class="page-header">
                <h1><i class="fa fa-heartbeat"></i> Examan Par Appareil </h1>
            </div>

            <div class="content-wrap" style="padding-top: 0px">

                <div class="row">
                    <div class="col-md-12">
                        <div class="">
                            <div class="panel-body" style="padding-left: 0px">
                                <button class="btn btn-secondary" id="btn_affiche_Examan_Par_Appareil_add_modal" data-html="Par Appareil" data-toggle='modal' data-target="#modal_add_element"><i class="fa fa-plus"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">

                                <div class="tools">
                                    <a class="btn-link collapses panel-collapse" href="javascript:;"></a>
                                    <a class="btn-link reload" href="javascript:;"><i class="ti-reload"></i></a>
                                </div>
                            </div>
                            <div class="panel-body">
                                <table class="table table-bordered table-dataTable" id="table_Examan_Par_Appareil"  style="width: 100% !important">

                                    <thead>
                                    <tr>
                                        <th  style="width: 50px !important"></th>
                                        <th style="text-align: center">Nom Element Examan Par Appareil</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th  style="width: 50px !important"></th>
                                        <th style="text-align: center">Nom Element Examan Par Appareil</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>

                                    @foreach($examan_par_appareil as $ex_par_ap)
                                        <tr class="Examan_Par_Appareil{{$ex_par_ap->id}} " id="tbody_for_after_add_element_Examan_Par_Appareil">
                                            <td style="padding: 5px">
                                                <a class="btn btn-social-icon btn-xs btn-instagram  edit_big_btn_Examan_Par_Appareil"  data-toggle="modal"  data-target="#modal_edit_Examan_Par_Appareil_panel" data-id="{{$ex_par_ap->id}}" data-nom="{{$ex_par_ap->nom}}" ><span class="fa fa-edit"></span></a>
                                                <a class="btn btn-social-icon btn-xs btn-google btn-lg  delete_btn_Examan_Par_Appareil" id="delete_btn_Examan_Par_Appareil" data-id="{{$ex_par_ap->id}}" data-type="Par Appareil"  data-toggle="modal"  data-target="#modal_delete_confirmation"><span class="fa fa-trash"></span></a>
                                            </td>
                                            <td style="text-align: center">{{$ex_par_ap->nom}}</td>
                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!--  Bilan Biologie Element  Panel -->
        <div id="Bilan_Biologie_panel" style="display:none">

            <div class="page-header">
                <h1><i class="sli-docs"></i> Bilan Biologie </h1>
            </div>

            <div class="content-wrap" style="padding-top: 0px">

                <div class="row">
                    <div class="col-md-12">
                        <div class="">
                            <div class="panel-body" style="padding-left: 0px">
                                <button class="btn btn-secondary" id="btn_affiche_Bilan_Biologie_add_modal" data-html="Biologie" data-toggle='modal' data-target="#modal_add_element"><i class="fa fa-plus"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">

                                <div class="tools">
                                    <a class="btn-link collapses panel-collapse" href="javascript:;"></a>
                                    <a class="btn-link reload" href="javascript:;"><i class="ti-reload"></i></a>
                                </div>
                            </div>
                            <div class="panel-body">
                                <table class="table table-bordered table-dataTable" id="table_Bilan_Paraclinique_Biologie"  style="width: 100% !important">

                                    <thead>
                                    <tr>
                                        <th  style="width: 50px !important"></th>
                                        <th style="text-align: center">Nom Element Bilan Biologie</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th  style="width: 50px !important"></th>
                                        <th style="text-align: center">Nom Element Bilan Biologie</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>

                                    @foreach($bilan_paraclinique_biologie as $bilan_b)
                                        <tr class="Bilan_Biologie{{$bilan_b->id}} " id="tbody_for_after_add_element_Bilan_Biologie">
                                            <td style="padding: 5px">
                                                <a class="btn btn-social-icon btn-xs btn-instagram  edit_big_btn_Bilan_Biologie"  data-toggle="modal"  data-target="#modal_edit_Bilan_Biologie_panel" data-id="{{$bilan_b->id}}" data-nom="{{$bilan_b->nom}}" ><span class="fa fa-edit"></span></a>
                                                <a class="btn btn-social-icon btn-xs btn-google btn-lg  delete_btn_Bilan_Biologie" id="delete_btn_Bilan_Biologie" data-id="{{$bilan_b->id}}" data-type="Biologie"  data-toggle="modal"  data-target="#modal_delete_confirmation"><span class="fa fa-trash"></span></a>
                                            </td>
                                            <td style="text-align: center">{{$bilan_b->nom}}</td>
                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!--  Bilan Radiologie Element Panel -->
        <div id="Bilan_Radiologie_panel" style="display:none">

            <div class="page-header">
                <h1><i class="sli-docs"></i> Bilan Radiologie </h1>
            </div>

            <div class="content-wrap" style="padding-top: 0px">

                <div class="row">
                    <div class="col-md-12">
                        <div class="">
                            <div class="panel-body" style="padding-left: 0px">
                                <button class="btn btn-secondary" id="btn_affiche_Bilan_Radiologie_add_modal" data-html="Radiologie" data-toggle='modal' data-target="#modal_add_element"><i class="fa fa-plus"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">

                                <div class="tools">
                                    <a class="btn-link collapses panel-collapse" href="javascript:;"></a>
                                    <a class="btn-link reload" href="javascript:;"><i class="ti-reload"></i></a>
                                </div>
                            </div>
                            <div class="panel-body">
                                <table class="table table-bordered table-dataTable" id="table_Bilan_Paraclinique_Radiologie"  style="width: 100% !important">

                                    <thead>
                                    <tr>
                                        <th  style="width: 50px !important"></th>
                                        <th style="text-align: center">Nom Element Bilan Radiologie</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th  style="width: 50px !important"></th>
                                        <th style="text-align: center">Nom Element Bilan Radiologie</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>

                                    @foreach($bilan_paraclinique_radiologie as $bilan_r)
                                        <tr class="Bilan_Radiologie{{$bilan_r->id}} " id="tbody_for_after_add_element_Bilan_Radiologie">
                                            <td style="padding: 5px">
                                                <a class="btn btn-social-icon btn-xs btn-instagram  edit_big_btn_Bilan_Radiologie"  data-toggle="modal"  data-target="#modal_edit_Bilan_Radiologie_panel" data-id="{{$bilan_r->id}}" data-nom="{{$bilan_r->nom}}" ><span class="fa fa-edit"></span></a>
                                                <a class="btn btn-social-icon btn-xs btn-google btn-lg  delete_btn_Bilan_Radiologie" id="delete_btn_Bilan_Radiologie" data-id="{{$bilan_r->id}}" data-type="Radiologie"  data-toggle="modal"  data-target="#modal_delete_confirmation"><span class="fa fa-trash"></span></a>
                                            </td>
                                            <td style="text-align: center">{{$bilan_r->nom}}</td>
                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!--  Type Bilan Biologie Panel -->
        <div id="Type_Bilan_Biologie_panel" style="display:none">

            <div class="page-header">
                <h1><i class="sli-docs"></i> Type Bilan Biologie</h1>
            </div>

            <div class="content-wrap" style="padding-top: 0px">

                <div class="row">
                    <div class="col-md-12">
                        <div class="">
                            <div class="panel-body" style="padding-left: 0px">
                                <button class="btn btn-secondary" id="btn_affiche_Type_Bilan_Biologie_add_modal" data-html="Type Bilan Biologie" data-toggle='modal' data-target="#modal_add_element"><i class="fa fa-plus"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">

                                <div class="tools">
                                    <a class="btn-link collapses panel-collapse" href="javascript:;"></a>
                                    <a class="btn-link reload" href="javascript:;"><i class="ti-reload"></i></a>
                                </div>
                            </div>
                            <div class="panel-body">
                                <table class="table table-bordered table-dataTable" id="table_Type_Bilan_Biologie"  style="width: 100% !important">

                                    <thead>
                                    <tr>
                                        <th  style="width: 50px !important"></th>
                                        <th style="text-align: center">Nom Type Bilan Biologie</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th  style="width: 50px !important"></th>
                                        <th style="text-align: center">Nom Type Bilan Biologie</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>

                                    @foreach($type_bilan_biologie as $type_bilan_b)
                                        <tr class="Type_Bilan_Biologie{{$type_bilan_b->id}} " id="tbody_for_after_add_Type_Bilan_Biologie">
                                            <td style="padding: 5px">
                                                <a class="btn btn-social-icon btn-xs btn-instagram  edit_big_btn_Type_Bilan_Biologie"  data-toggle="modal"  data-target="#modal_edit_Type_Bilan_Biologie_panel" data-id="{{$type_bilan_b->id}}" data-nom="{{$type_bilan_b->nom}}" ><span class="fa fa-edit"></span></a>
                                                <a class="btn btn-social-icon btn-xs btn-google btn-lg  delete_btn_Type_Bilan_Biologie" id="delete_btn_Type_Bilan_Biologie" data-id="{{$type_bilan_b->id}}" data-type="Type Bilan Biologie"  data-toggle="modal"  data-target="#modal_delete_confirmation"><span class="fa fa-trash"></span></a>
                                            </td>
                                            <td style="text-align: center">{{$type_bilan_b->nom}}</td>
                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!--  Type Bilan Radiologie Panel -->
        <div id="Type_Bilan_Radiologie_panel" style="display:none">

            <div class="page-header">
                <h1><i class="sli-docs"></i> Type Bilan Radiologie</h1>
            </div>

            <div class="content-wrap" style="padding-top: 0px">

                <div class="row">
                    <div class="col-md-12">
                        <div class="">
                            <div class="panel-body" style="padding-left: 0px">
                                <button class="btn btn-secondary" id="btn_affiche_Type_Bilan_Radiologie_add_modal" data-html="Type Bilan Radiologie" data-toggle='modal' data-target="#modal_add_element"><i class="fa fa-plus"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">

                                <div class="tools">
                                    <a class="btn-link collapses panel-collapse" href="javascript:;"></a>
                                    <a class="btn-link reload" href="javascript:;"><i class="ti-reload"></i></a>
                                </div>
                            </div>
                            <div class="panel-body">
                                <table class="table table-bordered table-dataTable" id="table_Type_Bilan_Radiologie"  style="width: 100% !important">

                                    <thead>
                                    <tr>
                                        <th  style="width: 50px !important"></th>
                                        <th style="text-align: center">Nom Type Bilan Radiologie</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th  style="width: 50px !important"></th>
                                        <th style="text-align: center">Nom Type Bilan Radiologie</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>

                                    @foreach($type_bilan_radiologie as $type_bilan_r)
                                        <tr class="Type_Bilan_Radiologie{{$type_bilan_r->id}} " id="tbody_for_after_add_Type_Bilan_Radiologie">
                                            <td style="padding: 5px">
                                                <a class="btn btn-social-icon btn-xs btn-instagram  edit_big_btn_Type_Bilan_Radiologie"  data-toggle="modal"  data-target="#modal_edit_Type_Bilan_Radiologie_panel" data-id="{{$type_bilan_r->id}}" data-nom="{{$type_bilan_r->nom}}" ><span class="fa fa-edit"></span></a>
                                                <a class="btn btn-social-icon btn-xs btn-google btn-lg  delete_btn_Type_Bilan_Radiologie" id="delete_btn_Type_Bilan_Radiologie" data-id="{{$type_bilan_r->id}}" data-type="Type Bilan Radiologie"  data-toggle="modal"  data-target="#modal_delete_confirmation"><span class="fa fa-trash"></span></a>
                                            </td>
                                            <td style="text-align: center">{{$type_bilan_r->nom}}</td>
                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>






        <!-- modal confrmation delete -->
        <div class="modal" id="modal_delete_confirmation" tabindex="-1" role="dialog" aria-labelledby="defModalHead" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <h3> IMPORTANT </h3>
                        <p>Voulez-Vous vraiment Supprimer ? </p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Non</button>
                        <a type="button" id="delete_confirmation_btn_oui" data-id="" data-type="" class="btn btn-danger oui_verification" >Oui</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- modal confrmation d'annulation -->
        <div class="modal" id="modal_annulation_confirmation" tabindex="-1" role="dialog" aria-labelledby="defModalHead" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <h3> IMPORTANT </h3>
                        <p>Voulez-Vous vraiment Annuler Ce rendez vous ? </p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Non</button>
                        <a type="button"  data-id=""  class="btn btn-danger oui_verification annulation_confirmation_btn_oui" >Oui</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal elements add-->
        <div class="modal fade" id="modal_add_element" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Ajoute <span id="title_modal_add_element">Familiaux</span></h4>
                    </div>
                    <div class="modal-body">
                        <form method="post" id="save-add-element" role="form">

                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="form-group">
                                <label>Nom</label>

                                <input type="hidden" id="input_type_antecedent" name="type_antecedent" >
                                <input class="form-control" type="text" name="nom" >
                                <!--rja3 hna obda fi jquery dyal famillier modal importation des données-->
                            </div>
                            <div class="">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                                <button type="submit"  data-html="" class="btn btn-primary">Ajouter</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
     <!--Modal Medicament Element -->
        <!-- Modal Add Médicament -->
        <div class="modal-flot"  id="ModalLeftOneMedicament" data-position='left' style="height: 240px">
            <div class="modal-header">
                <h3 class="modal-title">Ajouter Un Médicament</h3>
                <a href="javascript:;" data-dismiss="modal-flot"><i class="ti-close"></i></a>
            </div>
            <form role="form" id="add_medicament_element_nomm">
                <div class="modal-body">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <label for="medic">Nom</label>
                        <input type="text" name="nom" class="form-control" id="medic" >
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal-flot">Annuler</button>
                    <button type="submit" class="btn btn-primary">Ajouter</button>
                </div>
            </form>
        </div>

     <!-- Modal Big Add Medicament  -->
        <div class="modal modal-info fade modal_big_add_medicament_panel" id="modal_big_add_medicament_panel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header" style="padding-bottom: 0px;padding-top: 0px;position: relative;display: flex;" >
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel" style="width: 300px;padding-top: 20px;">Ajouter un Médicament</h4>
                        <div id="error_shox" class="jq-toast-single jq-has-icon jq-icon-error" style="padding-bottom: 0px;position:initial;display: none;background-color: rgb(255, 72, 89); text-align: left; width: 400px; ">
                            <span class="jq-toast-loader"></span>
                            <span class="close-jq-toast-single">×</span>

                            <span id="my_error"></span>
                        </div>

                    </div>

                    <div class="modal-body" style="padding-top: 0px">
                        <div class="panel">
                            <div>
                                <form  method="post" role="form" id="form_big_add_medicament">

                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">


                                    <div class="form-body" >

                                        <div class="row">
                                            <div class="form-group col-lg-3" style="padding-top:15px">
                                                <label for="code_big_add_medicament">Code</label>
                                                <input type="number"  class="form-control"  id="code_big_add_medicament"  name="code_big_add_medicament"  placeholder="Code">
                                            </div>
                                            <div class="form-group col-lg-3" style="padding-top:15px">
                                                <label for="nom_big_add_medicament">Nom</label>
                                                <input type="text" required class="form-control"  id="nom_big_add_medicament"  name="nom_big_add_medicament"  placeholder="Nom Médicament....">
                                            </div>
                                            <div class="form-group col-lg-3" style="padding-top:15px">
                                                <label for="dci1_big_add_medicament">Dci1</label>
                                                <input type="number"  class="form-control"  id="dci1_big_add_medicament"  name="dci1_big_add_medicament"  placeholder="Dci1">
                                            </div>
                                            <div class="form-group col-lg-3" style="padding-top:15px">
                                                <label for="dosage1_big_add_medicament">Dosage1</label>
                                                <input type="number"  class="form-control"  id="dosage1_big_add_medicament"  name="dosage1_big_add_medicament"  placeholder="Dosage1">
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="form-group col-lg-3" style="padding-top:15px">
                                                <label for="unite_dosage1_big_add_medicament">Unite dosage1</label>
                                                <input type="number"  class="form-control"  id="unite_dosage1_big_add_medicament"  name="unite_dosage1_big_add_medicament"  placeholder="Unite dosage1">
                                            </div>
                                            <div class="form-group col-lg-3" style="padding-top:15px">
                                                <label for="forme_big_add_medicament">Forme</label>
                                                <input type="number"  class="form-control"  id="forme_big_add_medicament"  name="forme_big_add_medicament"  placeholder="Forme">
                                            </div>
                                            <div class="form-group col-lg-3" style="padding-top:15px">
                                                <label for="presentation_big_add_medicament">Presentation</label>
                                                <input type="number"  class="form-control"  id="presentation_big_add_medicament"  name="presentation_big_add_medicament"  placeholder="Presentation">
                                            </div>
                                            <div class="form-group col-lg-3" style="padding-top:15px">
                                                <label for="ppv_big_add_medicament">Ppv</label>
                                                <input type="number"  class="form-control"  id="ppv_big_add_medicament"  name="ppv_big_add_medicament"  placeholder="Ppv">
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="form-group col-lg-3" style="padding-top:15px">
                                                <label for="ph_big_add_medicament">Ph</label>
                                                <input type="number"  class="form-control"  id="ph_big_add_medicament"  name="ph_big_add_medicament"  placeholder="Ph">
                                            </div>
                                            <div class="form-group col-lg-3" style="padding-top:15px">
                                                <label for="prix_br_big_add_medicament">Prix_br</label>
                                                <input type="number"  class="form-control"  id="prix_br_big_add_medicament"  name="prix_br_big_add_medicament"  placeholder="Prix br">
                                            </div>
                                            <div class="form-group col-lg-3" style="padding-top:15px">
                                                <label for="Princeps_generiqueique_big_add_medicament">Princeps Generiqueique</label>
                                                <input type="number"  class="form-control"  id="Princeps_generiqueique_big_add_medicament"  name="Princeps_generiqueique_big_add_medicament"  placeholder="Princeps Generiqueique">
                                            </div>
                                            <div class="form-group col-lg-3" style="padding-top:15px">
                                                <label for="taux_remboursement_big_add_medicament">Taux Remboursement</label>
                                                <input type="number"  class="form-control"  id="taux_remboursement_big_add_medicament"  name="taux_remboursement_big_add_medicament"  placeholder="Taux Remboursement">
                                            </div>

                                        </div>

                                        <div class="pull-right">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                                            <button type="submit"  class="btn btn-primary">Ajouter</button>
                                        </div>

                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>


        <!-- Modal Edit Medicament  -->
        <div class="modal modal-info fade modal_edit_medicament_panel" id="modal_edit_medicament_panel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header" style="padding-bottom: 0px;padding-top: 0px;position: relative;display: flex;" >
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel" style="width: 300px;padding-top: 20px;">Modifier Médicaments</h4>
                        <div id="error_shox" class="jq-toast-single jq-has-icon jq-icon-error" style="padding-bottom: 0px;position:initial;display: none;background-color: rgb(255, 72, 89); text-align: left; width: 400px; ">
                            <span class="jq-toast-loader"></span>
                            <span class="close-jq-toast-single">×</span>

                            <span id="my_error"></span>
                        </div>

                    </div>

                    <div class="modal-body" style="padding-top: 0px">
                        <div class="panel">
                            <div>
                                <form  method="post" role="form" id="form_edit_medicament">

                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="hidden" name="medicament_id_input" id="medicament_id_input">

                                    <div class="form-body" >

                                        <div class="row">
                                            <div class="form-group col-lg-3" style="padding-top:15px">
                                                <label for="code_big_edit_medicament">Code</label>
                                                <input type="number"  class="form-control"  id="code_big_edit_medicament"  name="code_big_edit_medicament"  placeholder="Code">
                                            </div>
                                            <div class="form-group col-lg-3" style="padding-top:15px">
                                                <label for="nom_edit_prestataire">Nom</label>
                                                <input type="text" required class="form-control"  id="nom_edit_medicament"  name="nom_edit_medicament"  placeholder="Nom Médicament....">
                                            </div>

                                            <div class="form-group col-lg-3" style="padding-top:15px">
                                                <label for="dci1_big_edit_medicament">Dci1</label>
                                                <input type="number"  class="form-control"  id="dci1_big_edit_medicament"  name="dci1_big_edit_medicament"  placeholder="Dci1">
                                            </div>
                                            <div class="form-group col-lg-3" style="padding-top:15px">
                                                <label for="dosage1_big_edit_medicament">Dosage1</label>
                                                <input type="number"  class="form-control"  id="dosage1_big_edit_medicament"  name="dosage1_big_edit_medicament"  placeholder="Dosage1">
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="form-group col-lg-3" style="padding-top:15px">
                                                <label for="unite_dosage1_big_edit_medicament">Unite dosage1</label>
                                                <input type="number"  class="form-control"  id="unite_dosage1_big_edit_medicament"  name="unite_dosage1_big_edit_medicament"  placeholder="Unite dosage1">
                                            </div>
                                            <div class="form-group col-lg-3" style="padding-top:15px">
                                                <label for="forme_big_edit_medicament">Forme</label>
                                                <input type="number"  class="form-control"  id="forme_big_edit_medicament"  name="forme_big_edit_medicament"  placeholder="Forme">
                                            </div>
                                            <div class="form-group col-lg-3" style="padding-top:15px">
                                                <label for="presentation_big_edit_medicament">Presentation</label>
                                                <input type="number"  class="form-control"  id="presentation_big_edit_medicament"  name="presentation_big_edit_medicament"  placeholder="Presentation">
                                            </div>
                                            <div class="form-group col-lg-3" style="padding-top:15px">
                                                <label for="ppv_big_edit_medicament">Ppv</label>
                                                <input type="number"  class="form-control"  id="ppv_big_edit_medicament"  name="ppv_big_edit_medicament"  placeholder="Ppv">
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="form-group col-lg-3" style="padding-top:15px">
                                                <label for="ph_big_edit_medicament">Ph</label>
                                                <input type="number"  class="form-control"  id="ph_big_edit_medicament"  name="ph_big_edit_medicament"  placeholder="Ph">
                                            </div>
                                            <div class="form-group col-lg-3" style="padding-top:15px">
                                                <label for="prix_br_big_edit_medicament">Prix_br</label>
                                                <input type="number"  class="form-control"  id="prix_br_big_edit_medicament"  name="prix_br_big_edit_medicament"  placeholder="Prix br">
                                            </div>
                                            <div class="form-group col-lg-3" style="padding-top:15px">
                                                <label for="Princeps_generiqueique_big_edit_medicament">Princeps Generiqueique</label>
                                                <input type="number"  class="form-control"  id="Princeps_generiqueique_big_edit_medicament"  name="Princeps_generiqueique_big_edit_medicament"  placeholder="Princeps Generiqueique">
                                            </div>
                                            <div class="form-group col-lg-3" style="padding-top:15px">
                                                <label for="taux_remboursement_big_edit_medicament">Taux Remboursement</label>
                                                <input type="number"  class="form-control"  id="taux_remboursement_big_edit_medicament"  name="taux_remboursement_big_edit_medicament"  placeholder="Taux Remboursement">
                                            </div>

                                        </div>

                                        <div class="pull-right">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                                            <button type="submit"  class="btn btn-danger">Modifier</button>
                                        </div>

                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

     <!-- Modal Familiaux Element -->
        <!-- Modal Edit Familiaux  -->
        <div class="modal modal-info fade modal_edit_familiaux_panel" id="modal_edit_familiaux_panel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header" style="padding-bottom: 0px;padding-top: 0px;position: relative;display: flex;" >
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel" style="width: 300px;padding-top: 20px;">Modifier Familiaux</h4>
                        <div id="error_shox" class="jq-toast-single jq-has-icon jq-icon-error" style="padding-bottom: 0px;position:initial;display: none;background-color: rgb(255, 72, 89); text-align: left; width: 400px; ">
                            <span class="jq-toast-loader"></span>
                            <span class="close-jq-toast-single">×</span>

                            <span id="my_error"></span>
                        </div>

                    </div>

                    <div class="modal-body" style="padding-top: 0px">
                        <div class="panel">
                            <div>
                                <form  method="post" role="form" id="form_edit_familiaux">

                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="hidden" name="familiaux_id_input" id="familiaux_id_input">

                                    <div class="form-body" >
                                        <div class="row">
                                            <div class="form-group col-lg-12" style="padding-top:15px">
                                                <label for="nom_edit_familiaux">Nom</label>
                                                <input type="text" required class="form-control"  id="nom_edit_familiaux"  name="nom_edit_familiaux"  placeholder="Nom Familiaux....">
                                            </div>

                                        </div>

                                        <div class="pull-right">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                                            <button type="submit"  class="btn btn-danger">Modifier</button>
                                        </div>

                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
     <!-- Modal Habitudes alcoolo-tabagique Element -->
        <!-- Modal Edit Habitudes alcoolo-tabagique  -->
        <div class="modal modal-info fade " id="modal_edit_Habitudes_alcoolo_tabagique_panel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header" style="padding-bottom: 0px;padding-top: 0px;position: relative;display: flex;" >
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel" style="width: 300px;padding-top: 20px;">Modifier Habitudes alcoolo-tabagique</h4>
                        <div id="error_shox" class="jq-toast-single jq-has-icon jq-icon-error" style="padding-bottom: 0px;position:initial;display: none;background-color: rgb(255, 72, 89); text-align: left; width: 400px; ">
                            <span class="jq-toast-loader"></span>
                            <span class="close-jq-toast-single">×</span>

                            <span id="my_error"></span>
                        </div>

                    </div>

                    <div class="modal-body" style="padding-top: 0px">
                        <div class="panel">
                            <div>
                                <form  method="post" role="form" id="form_edit_Habitudes_alcoolo_tabagique">

                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="hidden" name="Habitudes_alcoolo_tabagique_id_input" id="Habitudes_alcoolo_tabagique_id_input">

                                    <div class="form-body" >
                                        <div class="row">
                                            <div class="form-group col-lg-12" style="padding-top:15px">
                                                <label for="nom_edit_familiaux">Nom </label>
                                                <input type="text" required class="form-control"  id="nom_edit_Habitudes_alcoolo_tabagique"  name="nom_edit_Habitudes_alcoolo_tabagique"  placeholder="Nom Habitudes alcoolo-tabagique...">
                                            </div>

                                        </div>

                                        <div class="pull-right">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                                            <button type="submit"  class="btn btn-danger">Modifier</button>
                                        </div>

                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

     <!-- Modal Chirurgicaux Complications Element-->
        <!-- Modal Edit Chirurgicaux Complications  -->
        <div class="modal modal-info fade " id="modal_edit_Chirurgicaux_Complications_panel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header" style="padding-bottom: 0px;padding-top: 0px;position: relative;display: flex;" >
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel" style="width: 300px;padding-top: 20px;">Modifier Chirurgicaux Complications</h4>
                        <div id="error_shox" class="jq-toast-single jq-has-icon jq-icon-error" style="padding-bottom: 0px;position:initial;display: none;background-color: rgb(255, 72, 89); text-align: left; width: 400px; ">
                            <span class="jq-toast-loader"></span>
                            <span class="close-jq-toast-single">×</span>

                            <span id="my_error"></span>
                        </div>

                    </div>

                    <div class="modal-body" style="padding-top: 0px">
                        <div class="panel">
                            <div>
                                <form  method="post" role="form" id="form_edit_Chirurgicaux_Complications">

                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="hidden" name="Chirurgicaux_Complications_id_input" id="Chirurgicaux_Complications_id_input">

                                    <div class="form-body" >
                                        <div class="row">
                                            <div class="form-group col-lg-12" style="padding-top:15px">
                                                <label for="nom_edit_familiaux">Nom </label>
                                                <input type="text" required class="form-control"  id="nom_edit_Chirurgicaux_Complications"  name="nom_edit_Chirurgicaux_Complications"  placeholder="Nom Chirurgicaux Complications...">
                                            </div>

                                        </div>

                                        <div class="pull-right">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                                            <button type="submit"  class="btn btn-danger">Modifier</button>
                                        </div>

                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    <!-- Modal Motif Consultation Element -->
        <!-- Modal Edit Motif Consultation Element  -->
        <div class="modal modal-info fade " id="modal_edit_Motif_Consultation_panel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header" style="padding-bottom: 0px;padding-top: 0px;position: relative;display: flex;" >
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel" style="width: 300px;padding-top: 20px;">Modifier Motif Consultation</h4>
                        <div id="error_shox" class="jq-toast-single jq-has-icon jq-icon-error" style="padding-bottom: 0px;position:initial;display: none;background-color: rgb(255, 72, 89); text-align: left; width: 400px; ">
                            <span class="jq-toast-loader"></span>
                            <span class="close-jq-toast-single">×</span>

                            <span id="my_error"></span>
                        </div>

                    </div>

                    <div class="modal-body" style="padding-top: 0px">
                        <div class="panel">
                            <div>
                                <form  method="post" role="form" id="form_edit_Motif_Consultation">

                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="hidden" name="Motif_Consultation_id_input" id="Motif_Consultation_id_input">

                                    <div class="form-body" >
                                        <div class="row">
                                            <div class="form-group col-lg-12" style="padding-top:15px">
                                                <label for="nom_edit_Motif_Consultation">Nom </label>
                                                <input type="text" required class="form-control"  id="nom_edit_Motif_Consultation"  name="nom_edit_Motif_Consultation"  placeholder="Nom Motif Consultation...">
                                            </div>

                                        </div>

                                        <div class="pull-right">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                                            <button type="submit"  class="btn btn-danger">Modifier</button>
                                        </div>

                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    <!-- Modal Examan General Element -->
       <!-- Modal Edit Examan General Element  -->
        <div class="modal modal-info fade " id="modal_edit_Examan_General_panel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header" style="padding-bottom: 0px;padding-top: 0px;position: relative;display: flex;" >
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel" style="width: 300px;padding-top: 20px;">Modifier Examan General</h4>
                        <div id="error_shox" class="jq-toast-single jq-has-icon jq-icon-error" style="padding-bottom: 0px;position:initial;display: none;background-color: rgb(255, 72, 89); text-align: left; width: 400px; ">
                            <span class="jq-toast-loader"></span>
                            <span class="close-jq-toast-single">×</span>

                            <span id="my_error"></span>
                        </div>

                    </div>

                    <div class="modal-body" style="padding-top: 0px">
                        <div class="panel">
                            <div>
                                <form  method="post" role="form" id="form_edit_Examan_General">

                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="hidden" name="Examan_General_id_input" id="Examan_General_id_input">

                                    <div class="form-body" >
                                        <div class="row">
                                            <div class="form-group col-lg-12" style="padding-top:15px">
                                                <label for="nom_edit_Examan_General">Nom </label>
                                                <input type="text" required class="form-control"  id="nom_edit_Examan_General"  name="nom_edit_Examan_General"  placeholder="Nom Element Examan General...">
                                            </div>

                                        </div>

                                        <div class="pull-right">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                                            <button type="submit"  class="btn btn-danger">Modifier</button>
                                        </div>

                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    <!-- Modal Examan Par Appareil Element -->
       <!-- Modal Edit Examan Par Appareil Element  -->
        <div class="modal modal-info fade " id="modal_edit_Examan_Par_Appareil_panel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header" style="padding-bottom: 0px;padding-top: 0px;position: relative;display: flex;" >
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel" style="width: 300px;padding-top: 20px;">Modifier Examan Par Appareil</h4>
                        <div id="error_shox" class="jq-toast-single jq-has-icon jq-icon-error" style="padding-bottom: 0px;position:initial;display: none;background-color: rgb(255, 72, 89); text-align: left; width: 400px; ">
                            <span class="jq-toast-loader"></span>
                            <span class="close-jq-toast-single">×</span>

                            <span id="my_error"></span>
                        </div>

                    </div>

                    <div class="modal-body" style="padding-top: 0px">
                        <div class="panel">
                            <div>
                                <form  method="post" role="form" id="form_edit_Examan_Par_Appareil">

                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="hidden" name="Examan_Par_Appareil_id_input" id="Examan_Par_Appareil_id_input">

                                    <div class="form-body" >
                                        <div class="row">
                                            <div class="form-group col-lg-12" style="padding-top:15px">
                                                <label for="nom_edit_Examan_Par_Appareil">Nom </label>
                                                <input type="text" required class="form-control"  id="nom_edit_Examan_Par_Appareil"  name="nom_edit_Examan_Par_Appareil"  placeholder="Nom Element Examan Par Appareil...">
                                            </div>

                                        </div>

                                        <div class="pull-right">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                                            <button type="submit"  class="btn btn-danger">Modifier</button>
                                        </div>

                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    <!-- Modal Bilan Biologie Paraclinique Element -->
        <!-- Modal Edit Bilan Biologie Element  -->
        <div class="modal modal-info fade " id="modal_edit_Bilan_Biologie_panel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header" style="padding-bottom: 0px;padding-top: 0px;position: relative;display: flex;" >
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel" style="width: 300px;padding-top: 20px;">Modifier Bilan Biologie Element</h4>
                        <div id="error_shox" class="jq-toast-single jq-has-icon jq-icon-error" style="padding-bottom: 0px;position:initial;display: none;background-color: rgb(255, 72, 89); text-align: left; width: 400px; ">
                            <span class="jq-toast-loader"></span>
                            <span class="close-jq-toast-single">×</span>

                            <span id="my_error"></span>
                        </div>

                    </div>

                    <div class="modal-body" style="padding-top: 0px">
                        <div class="panel">
                            <div>
                                <form  method="post" role="form" id="form_edit_Bilan_Biologie">

                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="hidden" name="Bilan_Biologie_id_input" id="Bilan_Biologie_id_input">

                                    <div class="form-body" >
                                        <div class="row">
                                            <div class="form-group col-lg-12" style="padding-top:15px">
                                                <label for="nom_edit_Bilan_Biologie">Nom </label>
                                                <input type="text" required class="form-control"  id="nom_edit_Bilan_Biologie"  name="nom_edit_Bilan_Biologie"  placeholder="Nom Element Bilan Biologie...">
                                            </div>

                                        </div>

                                        <div class="pull-right">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                                            <button type="submit"  class="btn btn-danger">Modifier</button>
                                        </div>

                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    <!-- Modal Bilan Radiologie Paraclinique Element -->
        <!-- Modal Edit Bilan Radiologie Element  -->
        <div class="modal modal-info fade " id="modal_edit_Bilan_Radiologie_panel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header" style="padding-bottom: 0px;padding-top: 0px;position: relative;display: flex;" >
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel" style="width: 300px;padding-top: 20px;">Modifier Bilan Radiologie Element</h4>
                        <div id="error_shox" class="jq-toast-single jq-has-icon jq-icon-error" style="padding-bottom: 0px;position:initial;display: none;background-color: rgb(255, 72, 89); text-align: left; width: 400px; ">
                            <span class="jq-toast-loader"></span>
                            <span class="close-jq-toast-single">×</span>

                            <span id="my_error"></span>
                        </div>
                    </div>

                    <div class="modal-body" style="padding-top: 0px">
                        <div class="panel">
                            <div>
                                <form  method="post" role="form" id="form_edit_Bilan_Radiologie">

                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="hidden" name="Bilan_Radiologie_id_input" id="Bilan_Radiologie_id_input">

                                    <div class="form-body" >
                                        <div class="row">
                                            <div class="form-group col-lg-12" style="padding-top:15px">
                                                <label for="nom_edit_Bilan_Radiologie">Nom </label>
                                                <input type="text" required class="form-control"  id="nom_edit_Bilan_Radiologie"  name="nom_edit_Bilan_Radiologie"  placeholder="Nom Element Bilan Radiologie...">
                                            </div>

                                        </div>

                                        <div class="pull-right">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                                            <button type="submit"  class="btn btn-danger">Modifier</button>
                                        </div>

                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    <!-- Modal Type Bilan Biologie -->
        <!-- Modal Edit Type Bilan Biologie -->
        <div class="modal modal-info fade " id="modal_edit_Type_Bilan_Biologie_panel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header" style="padding-bottom: 0px;padding-top: 0px;position: relative;display: flex;" >
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel" style="width: 300px;padding-top: 20px;">Modifier Type Bilan Biologie </h4>
                        <div id="error_shox" class="jq-toast-single jq-has-icon jq-icon-error" style="padding-bottom: 0px;position:initial;display: none;background-color: rgb(255, 72, 89); text-align: left; width: 400px; ">
                            <span class="jq-toast-loader"></span>
                            <span class="close-jq-toast-single">×</span>

                            <span id="my_error"></span>
                        </div>

                    </div>

                    <div class="modal-body" style="padding-top: 0px">
                        <div class="panel">
                            <div>
                                <form  method="post" role="form" id="form_edit_Type_Bilan_Biologie">

                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="hidden" name="Type_Bilan_Biologie_id_input" id="Type_Bilan_Biologie_id_input">

                                    <div class="form-body" >
                                        <div class="row">
                                            <div class="form-group col-lg-12" style="padding-top:15px">
                                                <label for="nom_edit_Type_Bilan_Biologie">Nom </label>
                                                <input type="text" required class="form-control"  id="nom_edit_Type_Bilan_Biologie"  name="nom_edit_Type_Bilan_Biologie"  placeholder="Nom Type ...">
                                            </div>

                                        </div>

                                        <div class="pull-right">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                                            <button type="submit"  class="btn btn-danger">Modifier</button>
                                        </div>

                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    <!-- Modal Bilan Radiologie  -->
        <!-- Modal Edit Type Bilan Radiologie -->
        <div class="modal modal-info fade " id="modal_edit_Type_Bilan_Radiologie_panel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header" style="padding-bottom: 0px;padding-top: 0px;position: relative;display: flex;" >
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel" style="width: 300px;padding-top: 20px;">Modifier Type Bilan Radiologie </h4>
                        <div id="error_shox" class="jq-toast-single jq-has-icon jq-icon-error" style="padding-bottom: 0px;position:initial;display: none;background-color: rgb(255, 72, 89); text-align: left; width: 400px; ">
                            <span class="jq-toast-loader"></span>
                            <span class="close-jq-toast-single">×</span>

                            <span id="my_error"></span>
                        </div>
                    </div>

                    <div class="modal-body" style="padding-top: 0px">
                        <div class="panel">
                            <div>
                                <form  method="post" role="form" id="form_edit_Type_Bilan_Radiologie">

                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="hidden" name="Type_Bilan_Radiologie_id_input" id="Type_Bilan_Radiologie_id_input">

                                    <div class="form-body" >
                                        <div class="row">
                                            <div class="form-group col-lg-12" style="padding-top:15px">
                                                <label for="nom_edit_Type_Bilan_Radiologie">Nom </label>
                                                <input type="text" required class="form-control"  id="nom_edit_Type_Bilan_Radiologie"  name="nom_edit_Type_Bilan_Radiologie"  placeholder="Nom Type...">
                                            </div>

                                        </div>

                                        <div class="pull-right">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                                            <button type="submit"  class="btn btn-danger">Modifier</button>
                                        </div>

                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    <!-- Modal Rubrique Medicaux  -->
        <!-- Modal Edit Rubrique Medicaux -->
        <div class="modal modal-info fade " id="modal_edit_rubrique_medicaux_panel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header" style="padding-bottom: 0px;padding-top: 0px;position: relative;display: flex;" >
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel" style="width: 300px;padding-top: 20px;">Modifier Rubrique Medicaux </h4>
                        <div id="error_shox" class="jq-toast-single jq-has-icon jq-icon-error" style="padding-bottom: 0px;position:initial;display: none;background-color: rgb(255, 72, 89); text-align: left; width: 400px; ">
                            <span class="jq-toast-loader"></span>
                            <span class="close-jq-toast-single">×</span>

                            <span id="my_error"></span>
                        </div>
                    </div>

                    <div class="modal-body" style="padding-top: 0px">
                        <div class="panel">
                            <div>
                                <form  method="post" role="form" id="form_edit_rubrique_medicaux">

                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="hidden" name="rubrique_medicaux_id_input" id="rubrique_medicaux_id_input">

                                    <div class="form-body" >
                                        <div class="row">
                                            <div class="form-group col-lg-12" style="padding-top:15px">
                                                <label for="nom_edit_rubrique_medicaux">Nom </label>
                                                <input type="text" required class="form-control"  id="nom_edit_rubrique_medicaux"  name="nom_edit_rubrique_medicaux"  placeholder="Nom Rubrique...">
                                            </div>

                                        </div>

                                        <div class="pull-right">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                                            <button type="submit"  class="btn btn-danger">Modifier</button>
                                        </div>

                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>


    </div>


    <!-- END: Main Container -->
@endsection


@section('script_section')


    <!--
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.1.10/vue.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue-resource/1.2.0/vue-resource.min.js"></script>
    <script src="js/app.js"></script>
    <script src="js/patient.js"></script>
-->

    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

    <script type="text/javascript" src="{{URL::asset('assets/assetsAdmin/plugins/lib/jquery-2.2.4.min.js')}}"></script>
    <script type="text/javascript" src="{{URL::asset('assets/assetsAdmin/plugins/lib/jquery-ui.min.js')}}"></script>
    <script type="text/javascript" src="{{URL::asset('assets/assetsAdmin/plugins/bootstrap/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{URL::asset('assets/assetsAdmin/plugins/lib/plugins.js')}}"></script>

    <script type="text/javascript" src="{{URL::asset('assets/assetsAdmin/plugins/datatable/jquery.dataTables.min.js')}}"></script>
    <script type="text/javascript" src="{{URL::asset('assets/assetsAdmin/plugins/datatable/dataTables.bootstrap.min.js')}}"></script>

    <script type="text/javascript" src="{{URL::asset('assets/assetsAdmin/plugins/customselect/jquery.customselect.js')}}"></script>
    <script type="text/javascript" src="{{URL::asset('assets/assetsAdmin/plugins/select2/js/select2.min.js')}}"></script>


    <script type="text/javascript" src="{{URL::asset('assets/assetsAdmin/plugins/date-picker/js/bootstrap-datepicker.min.js')}}"></script>
    <script type="text/javascript" src="{{URL::asset('assets/assetsAdmin/plugins/dateTime-picker/js/bootstrap-datetimepicker.min.js')}}"></script>

    <script type="text/javascript" src="{{URL::asset('assets/assetsAdmin/plugins/jasny-bootstrap/js/jasny-bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{URL::asset('assets/assetsAdmin/plugins/lib/characterCounter.min.js')}}"></script>
    <script type="text/javascript" src="{{URL::asset('assets/assetsAdmin/plugins/emojionearea/emojionearea.min.js')}}"></script>
    <script type="text/javascript" src="{{URL::asset('assets/assetsAdmin/plugins/timepicker/bootstrap-timepicker.min.js')}}"></script>
    <script type="text/javascript" src="{{URL::asset('assets/assetsAdmin/plugins/colorpicker/js/bootstrap-colorpicker.min.js')}}"></script>
    <script type="text/javascript" src="{{URL::asset('assets/assetsAdmin/plugins/toast/jquery.toast.min.js')}}"></script>
    <script type="text/javascript" src="{{URL::asset('assets/assetsAdmin/js/cmp-alerts.js')}}"></script>

    <script type="text/javascript" src="{{URL::asset('assets/assetsAdmin/js/page-table.js')}}"></script>


    <script type="text/javascript" src="{{URL::asset('assets/assetsAdmin/plugins/validation/jquery.validate.min.js')}}"></script>
    <script type="text/javascript" src="{{URL::asset('assets/assetsAdmin/plugins/validation/localization/messages_fr.js')}}"></script>

    <script type="text/javascript" src="{{URL::asset('assets/assetsAdmin/plugins/validationEngine/jquery.validationEngine.js')}}"></script>
    <script type="text/javascript" src="{{URL::asset('assets/assetsAdmin/plugins/validationEngine/languages/jquery.validationEngine-fr.js')}}"></script>


    <script type="text/javascript" src="{{URL::asset('assets/assetsAdmin/js/page-validation.js')}}"></script>

    <script type="text/javascript" src="{{URL::asset('assets/assetsAdmin/js/app.base.js')}}"></script>
    <script type="text/javascript" src="{{URL::asset('assets/assetsAdmin/js/cmp-todo.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.min.js"></script>


    <script>
        jQuery(document).ready(function () {
            DataTableBasic.init();
        });
    </script>
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    <script>
        jQuery(document).ready(function () {
            FormValidationInline.init();
            FormValidationTooltip.init();
        });

    </script>
    <!-- <script src="{ {URL::asset('js/patient.js')}}"></script> -->

    <script src="js/patient.js"></script>
    <script src="js/rendez_vous.js"></script>
    <script src="js/consultations.js"></script>
    <script src="js/prestataire.js"></script>
    <!--Script Elements -->
    <script src="js/elements/medicaments.js"></script>
    <script src="js/elements/bilan_paraclinique.js"></script>
    <script src="js/elements/examan_clinique.js"></script>
    <script src="js/elements/motifs_consultation.js"></script>
    <script src="js/elements/type_bilan.js"></script>

    <script src="js/elements/antecedents/chirurgicaux.js"></script>
    <script src="js/elements/antecedents/familiaux.js"></script>
    <script src="js/elements/antecedents/habitudes.js"></script>
    <script src="js/elements/antecedents/medicaux.js"></script>

    <script>
        // validation jquery

        /* Validation formulaire */
        $('#form_big_add_medicament').validate();

        /* Validation Add patient */
        $('#form_add').validate();
    </script>






    <style>
        #DataTables_Table_0{
            width: 100% !important;
        }
        .error{
            color:red;
        }

        .width_modif{
            width:20%;
        }
        table > tr > td {
            text-align: center;
        }
        table {
            width: 100% !important;
        }

    </style>

@endsection
