@extends('layouts.app')

@section('content')

    @if ($message = Session::get('error'))
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-danger" role="alert">
                    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                    <strong>Important!</strong> {{ $message }}
                </div>
            </div>
        </div>
    @endif
    @if ($message = Session::get('success'))
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-success" role="alert">
                    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                    <strong>Important!</strong> {{ $message }}
                </div>
            </div>
        </div>
    @endif

        <div class="main-container" style="margin-left: 176px" id="manage-vue">    <!-- START: Main Container -->

          <div id="patient-panel" style="display: block">
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
                                                            <input type="number" required name="tel1_add"  class="form-control" id="tel1_add" placeholder="Téléphone 1">
                                                        </div>

                                                        <div class="form-group col-lg-6">
                                                            <label  class=" control-label">Tel 2</label>
                                                            <input type="number" required id="tel2_add"  name="tel2_add" class="form-control"  placeholder="Téléphone 2">
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
                                <h3 class="panel-title">Panel title</h3>
                                <div class="tools">
                                    <a class="btn-link collapses panel-collapse" href="javascript:;"></a>
                                    <a class="btn-link reload" href="javascript:;"><i class="ti-reload"></i></a>
                                </div>
                            </div>

                            <div class="panel-body">
                                <table class="table table-bordered table-dataTable">
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
                                        <tr class="item{{$patient->id}}">
                                            <td style="padding: 5px">
                                                <a class="btn btn-social-icon btn-xs btn-instagram edit-modal" data-email="{{$patient->email}}" data-id="{{$patient->id}}" @if($patient->ville == '') data-ville="Aucune" @else  data-ville="{{$patient->ville->nom}}" @endif  data-mutuelle="{{$patient->mutuelle}}" data-tel2="0{{$patient->tel2}}" data-tel1="0{{$patient->tel1}}" data-datenaissance="{{$patient->date_naissance}}" data-sexe="{{$patient->sexe}}" data-cin="{{$patient->cin}}" data-nom="{{$patient->nom}}" data-prenom="{{$patient->prenom}}" data-toggle="modal" data-target="#myModal8"><span class="fa fa-edit"></span></a>
                                                <a class="btn btn-social-icon btn-xs btn-google btn-lg delete-modal" data-id="{{$patient->id}}" data-nom="{{$patient->nom}}" data-toggle="modal" data-target="#delete_model"><span class="fa fa-trash"></span></a>
                                            </td>
                                            <td style="padding: 5px">{{$patient->cin}}</td>
                                            <td style="padding: 5px">{{$patient->nom}}</td>
                                            <td style="padding: 5px">{{$patient->prenom}}</td>
                                            <td style="padding: 5px">{{$patient->sexe}}</td>
                                            <td style="padding: 5px">{{$patient->date_naissance}}</td>
                                            <td style="padding: 5px">{{$patient->email}}</td>
                                            <td style="padding: 5px">0{{$patient->tel1}}</td>
                                            <td style="padding: 5px">0{{$patient->tel2}}</td>
                                            <td style="padding: 5px">{{$patient->mutuelle}}</td>
                                            <td style="padding: 5px">@if($patient->ville == '') Aucune @else {{$patient->ville->nom}} @endif</td>

                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- Modal for delete-->

                    <div id="delete_model" class="modal fade in">
                        <div class="modal-dialog">
                            <div class="modal-content">

                                <div class="modal-header" style="background-color: rgba(212, 54, 54, 0.96)">

                                    <h4 class="modal-title" id="label">AVERTISSEMENT</h4>
                                </div>
                                <div class="modal-body">
                                    Voulez-vous vraiment Suprimer Patient : <span id="ThisIsThatDelete"></span> ?
                                </div>
                                <div class="modal-footer">
                                    <div class="btn-group">
                                        <button class="btn btn-primary" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Non</button>
                                        <button class="btn btn-danger" id="click_delete_modal"><span class="glyphicon glyphicon-check"></span> Oui</button>
                                    </div>
                                </div>

                            </div><!-- /.modal-content -->
                        </div><!-- /.modal-dalog -->
                    </div><!-- /.modal -->

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

                    <!-- Modal for edit-->
                <div class="modal modal-secondary fade" id="myModal8" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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

            </div>
          </div>
        </div>


    <!-- END: Main Container -->
@endsection


@section('script_section')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.1.10/vue.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue-resource/1.2.0/vue-resource.min.js"></script>
    <!--
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

    <script type="text/javascript" src="{{URL::asset('assets/assetsAdmin/plugins/validationEngine/jquery.validationEngine.js')}}"></script>
    <script type="text/javascript" src="{{URL::asset('assets/assetsAdmin/plugins/validationEngine/languages/jquery.validationEngine-en.js')}}"></script>
    <script type="text/javascript" src="{{URL::asset('assets/assetsAdmin/plugins/validation/jquery.validate.min.js')}}"></script>
    <script type="text/javascript" src="{{URL::asset('assets/assetsAdmin/js/page-validation.js')}}"></script>

    <script type="text/javascript" src="{{URL::asset('assets/assetsAdmin/js/app.base.js')}}"></script>
    <script type="text/javascript" src="{{URL::asset('assets/assetsAdmin/js/cmp-todo.js')}}"></script>

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


@endsection
