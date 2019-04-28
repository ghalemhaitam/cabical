@extends('layouts.secretaire')

@section('content')
    <div class="main-container" style="margin-left: 176px;" id="manage-vue">
        <div class="content-wrap">
            <!--START: Content Wrap-->

            <div class="row">

                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h1> Bienvenue sur <strong>Cabi Cal</strong>  <span style="font-size: 12px">Cette version est payante veuillez nous contacter</span> </h1>

                        </div>
                        <div class="panel-body">
                            <img src="{{URL::asset('assets/assetsAdmin/images/secretaire_presentation.jpg')}}" alt="bienvenue" class="img-rounded" style="width: 100%">
                            <p> </p>
                        </div>
                    </div>
                </div>

            </div>


        </div>
    </div>

        @endsection


        @section('script_section')


            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

            <script type="text/javascript"
                    src="{{URL::asset('assets/assetsAdmin/plugins/lib/jquery-2.2.4.min.js')}}"></script>
            <script type="text/javascript"
                    src="{{URL::asset('assets/assetsAdmin/plugins/lib/jquery-ui.min.js')}}"></script>
            <script type="text/javascript"
                    src="{{URL::asset('assets/assetsAdmin/plugins/bootstrap/bootstrap.min.js')}}"></script>
            <script type="text/javascript"
                    src="{{URL::asset('assets/assetsAdmin/plugins/lib/plugins.js')}}"></script>

            <script type="text/javascript"
                    src="{{URL::asset('assets/assetsAdmin/plugins/datatable/jquery.dataTables.min.js')}}"></script>
            <script type="text/javascript"
                    src="{{URL::asset('assets/assetsAdmin/plugins/datatable/dataTables.bootstrap.min.js')}}"></script>

            <script type="text/javascript"
                    src="{{URL::asset('assets/assetsAdmin/plugins/customselect/jquery.customselect.js')}}"></script>
            <script type="text/javascript"
                    src="{{URL::asset('assets/assetsAdmin/plugins/select2/js/select2.min.js')}}"></script>


            <script type="text/javascript"
                    src="{{URL::asset('assets/assetsAdmin/plugins/date-picker/js/bootstrap-datepicker.min.js')}}"></script>
            <script type="text/javascript"
                    src="{{URL::asset('assets/assetsAdmin/plugins/dateTime-picker/js/bootstrap-datetimepicker.min.js')}}"></script>

            <script type="text/javascript"
                    src="{{URL::asset('assets/assetsAdmin/plugins/jasny-bootstrap/js/jasny-bootstrap.min.js')}}"></script>
            <script type="text/javascript"
                    src="{{URL::asset('assets/assetsAdmin/plugins/lib/characterCounter.min.js')}}"></script>
            <script type="text/javascript"
                    src="{{URL::asset('assets/assetsAdmin/plugins/emojionearea/emojionearea.min.js')}}"></script>
            <script type="text/javascript"
                    src="{{URL::asset('assets/assetsAdmin/plugins/timepicker/bootstrap-timepicker.min.js')}}"></script>
            <script type="text/javascript"
                    src="{{URL::asset('assets/assetsAdmin/plugins/colorpicker/js/bootstrap-colorpicker.min.js')}}"></script>
            <script type="text/javascript"
                    src="{{URL::asset('assets/assetsAdmin/plugins/toast/jquery.toast.min.js')}}"></script>
            <script type="text/javascript"
                    src="{{URL::asset('assets/assetsAdmin/js/cmp-alerts.js')}}"></script>

            <script type="text/javascript"
                    src="{{URL::asset('assets/assetsAdmin/js/page-table.js')}}"></script>


            <script type="text/javascript"
                    src="{{URL::asset('assets/assetsAdmin/plugins/validation/jquery.validate.min.js')}}"></script>
            <script type="text/javascript"
                    src="{{URL::asset('assets/assetsAdmin/plugins/validation/localization/messages_fr.js')}}"></script>

            <script type="text/javascript"
                    src="{{URL::asset('assets/assetsAdmin/plugins/validationEngine/jquery.validationEngine.js')}}"></script>
            <script type="text/javascript"
                    src="{{URL::asset('assets/assetsAdmin/plugins/validationEngine/languages/jquery.validationEngine-fr.js')}}"></script>


            <script type="text/javascript"
                    src="{{URL::asset('assets/assetsAdmin/js/page-validation.js')}}"></script>

            <script type="text/javascript"
                    src="{{URL::asset('assets/assetsAdmin/js/app.base.js')}}"></script>
            <script type="text/javascript"
                    src="{{URL::asset('assets/assetsAdmin/js/cmp-todo.js')}}"></script>
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







            <style>
                #DataTables_Table_0 {
                    width: 100% !important;
                }

                .error {
                    color: red;
                }

                .width_modif {
                    width: 20%;
                }

                table > tr > td {
                    text-align: center;
                }

            </style>

@endsection