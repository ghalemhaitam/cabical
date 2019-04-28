<!DOCTYPE html>
<html lang="fr-FR">
<!-- code existing in lang  { { config('app.locale') }}-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="_token" content="{!! csrf_token() !!}"/>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Cabi Cal</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="author" content="Prakasam Mathaiyan">
    <meta name="description" content="">
    <!--  href="{ {URL::asset('assets/assetsAdmin/css/cropper/cropper.min.css')}}" -->
<!--[if IE]>
    <link rel="stylesheet" type="text/css" href="{{URL::asset('css/modal_delete.css')}}">

    <!- loader link -->
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>

    <script type="text/javascript" src="assets/plugins/lib/modernizr.js"></script>
    <link rel="icon" href="assets/images/favicon.png" type="image/gif">



    <![endif]-->
    <link rel="stylesheet" type="text/css" href="{{URL::asset('css/loader.css')}}">
    <script type="text/javascript" src="{{URL::asset('assets/assetsAdmin/plugins/lib/modernizr.js')}}"></script>

    <link rel="icon" href="{{URL::asset('assets/assetsAdmin/images/icon_app.png')}}" type="image/gif">

    <link rel="stylesheet" type="text/css" href="{{URL::asset('assets/assetsAdmin/plugins/toast/jquery.toast.min.css')}}" />

    <link rel="stylesheet" type="text/css" href="{{URL::asset('assets/assetsAdmin/plugins/date-picker/css/bootstrap-datepicker3.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{URL::asset('assets/assetsAdmin/plugins/dateTime-picker/css/bootstrap-datetimepicker.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{URL::asset('assets/assetsAdmin/plugins/timepicker/bootstrap-timepicker.min.css')}}">



    <link rel="stylesheet" type="text/css" href="{{URL::asset('assets/assetsAdmin/plugins/bootstrap/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{URL::asset('assets/assetsAdmin/plugins/monthly/css/monthly.css')}}">
    <link rel="stylesheet" type="text/css" href="{{URL::asset('assets/assetsAdmin/plugins/emojionearea/emojionearea.min.css')}}">

    <link rel="stylesheet" type="text/css" href="{{URL::asset('assets/assetsAdmin/plugins/customselect/customselect.css')}}">
    <link rel="stylesheet" type="text/css" href="{{URL::asset('assets/assetsAdmin/plugins/select2/css/select2.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{URL::asset('assets/assetsAdmin/plugins/bootstrap/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{URL::asset('assets/assetsAdmin/plugins/datatable/dataTables.bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{URL::asset('assets/assetsAdmin/css/lib/page-acctivity-timeline.css')}}">


    <link rel="stylesheet" type="text/css" href="{{URL::asset('assets/assetsAdmin/css/main.css')}}">
    <link rel="stylesheet" type="text/css" href="{{URL::asset('assets/assetsAdmin/css/style-default.css')}}">
    <link rel="stylesheet" type="text/css" href="{{URL::asset('css/animate.css')}}">

    <script>
        window.Laravel ={!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body>
<div class="wrapper has-footer">

    <header class="header-top navbar fixed-top">

        <div class="top-bar">   <!-- START: Responsive Search -->
            <div class="container">
                <div class="main-search">
                    <div class="input-wrap">
                        <input class="form-control" type="text" placeholder="Search Here...">
                        <a href="page-search.html"><i class="sli-magnifier"></i></a>
                    </div>
                    <span class="close-search search-toggle"><i class="ti-close"></i></span>
                </div>
            </div>
        </div>  <!-- END: Responsive Search -->

        <div class="navbar-header" style="width: 180px">
            <button type="button" class="navbar-toggle side-nav-toggle">
                <i class="ti-align-left"></i>
            </button>

            <a class="navbar-brand " id="logo_menu" href="{{route('home')}}" >
                <img src="{{URL::asset('assets/assetsAdmin/images/icon_app.png')}}">
                <span>Cabi Cal</span>
            </a>

            <ul class="nav navbar-nav-xs">  <!-- START: Responsive Top Right tool bar -->
                <li>
                    <a href="javascript:;" class="collapse" data-toggle="collapse" data-target="#headerNavbarCollapse">
                        <i class="sli-user"></i>
                    </a>
                </li>
                <li>
                    <a href="javascript:;" class="search-toggle">
                        <i class="sli-magnifier"></i>
                    </a>
                </li>

            </ul>   <!-- END: Responsive Top Right tool bar -->

        </div>

        <div class="collapse navbar-collapse" id="headerNavbarCollapse">

            <ul class="nav navbar-nav">

                <!--
                <li class="hidden-xs" >
                    <a href="javascript:;" class="sidenav-size-toggle">
                        <i class="ti-align-left"></i>
                    </a>
                </li>
                -->


            </ul>

            <ul class="nav navbar-nav navbar-right">



                <li class="user-profile">
                    <!-- Authentication Links -->
                @if (Auth::guest())
                    <li><a href="{{ route('login') }}">Login</a></li>
                    <li><a href="{{ route('register') }}">Register</a></li>
                @else
                    <a href="javascript:;" class="clearfix dropdown-toggle" data-toggle="dropdown">
                        <img src="{{URL::asset('assets/demo/users/'.Auth::user()->avatar)}}" alt="" class="hidden-sm">
                        <div class="user-name">{{ Auth::user()->name }}</div>
                    </a>
                    @endif
                    </li>
                    <li class="">
                        <a href="{{ route('logout') }}"  onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"
                        >
                            <i class="fs-switch"></i>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>

            </ul>

        </div><!-- END: Navbar-collapse -->

    </header>   <!-- END: Header -->

    <aside class="side-navigation-wrap sidebar-fixed " style="width: 180px">  <!-- START: Side Navigation -->
        <div class="sidenav-inner  ">

            <ul class="side-nav magic-nav niv-class-animate">
                <li class="side-nav-header" style="padding: 0">
                    <!-- Authentication Links -->
                @if (Auth::guest())
                    <li><a href="{{ route('login') }}">Login</a></li>
                    <li><a href="{{ route('register') }}">Register</a></li>
                @else
                    <div class="clearfix " style="padding: 15px 15px 15px 15px">
                        <img src="{{URL::asset('assets/demo/users/'.Auth::user()->avatar)}}" alt="profil"  style="margin-left: 20%;border-radius: 50%;width: 70px;height: 70px;">
                        <!-- icon profil secretaire
                        <a href="user-profile.html" style="padding-right: 10px;padding-left: 10px;font-size: 17px"><i class="fa fa-user"></i> </a>

                        <a href="{ { route('logout') }}"  style="padding-right: 20px;padding-left: 10px" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"
                        >

                            <i class="fs-switch"></i>
                        </a>
                        -->
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                        <span style="padding-top:6px;font-size: 15px;text-align: center;display: block;color: white">SC . {{ Auth::user()->name }}</span>
                    </div>

                    <ul class="dropdown-menu dropdown-animated pop-effect" role="menu">


                        <li></li>
                        <li><a href="app-calendar.html"><i class="sli-calendar"></i> Calendar</a></li>
                        <li><a href="msg-inbox.html"><i class="fa fa-envelope-o"></i> Inbox</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="page-faq.html"><i class="sli-question"></i> FAQ's</a></li>
                        <li><a href="{{ route('logout') }}"  onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"
                            >
                                <i class="sli-logout"></i> Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                    @endif
                    </li>


                    <li class="menu_principale" id="elements_in_menu_principal">
                        <a>
                            <i class="fa fa-cogs"></i> <span class="nav-text">Paramètres</span>
                        </a>
                    </li>
                    <li class="side-nav-header menu_principale" style="color: #5F69E0;font-size: 20px;font-weight: bold">Consultation</li>
                    <li id="Consultation" class="menu_principale">
                        <a ><i class="fs-bubbles-2"></i> <span class="nav-text">Consultation</span></a>
                    </li>
                    <li id="RendezVous" class="menu_principale">
                        <a  href="{{route('home')}}">
                            <i class="fs-stopwatch"></i> <span class="nav-text">Rendez-Vous</span>
                        </a>
                    </li>
                    <li class="side-nav-header menu_principale" style="color: #5F69E0;font-size: 20px;font-weight: bold">Patient</li>
                    <li id="Patients" class="menu_principale">
                        <a >
                            <i class="fa fa-bed"></i> <span class="nav-text">Patient</span>
                        </a>
                    </li>
                    <li class="side-nav-header menu_principale" style="color: #5F69E0;font-size: 20px;font-weight: bold">Prestataires</li>
                    <li class="menu_principale">
                        <a  id="Prestataires"><i class="fa fa-user-md"></i> <span class="nav-text">Prestataire</span></a>
                    </li>

                    <li class="menu_principale">
                        <div class="dropdown">
                            <a href="#" data-toggle="dropdown" class="dropdown-toggle"><i class="icon-cog"></i></a>
                            <ul class="dropdown-menu dropdown-animated pop-effect pull-right">
                                <li><a href="#">Add new milestone</a></li>
                                <li><a href="#">Remove milestone</a></li>
                            </ul>
                        </div>
                    </li>


                    <!-- Menu Elements -->

                    <li class="side-nav-header menu_second" style="padding-top:1px;padding-bottom:0px;color: #5F69E0;font-size: 20px;font-weight: bold">
                        <div class="preview">
                            <a href="#" id="back_to_menu_principal" class="show-code">
                                <i class="sli-arrow-left icons"></i>
                                <span class="name" style="display: inline;"></span>
                            </a>
                        </div>
                    </li>

                    <li class="side-nav-header menu_second" style="padding-top:0px;color: #5F69E0;font-size: 20px;font-weight: bold">Paramètres</li>
                    <li id="Medicaments_menu" class="menu_second">
                        <a ><i class="fa fa-shield"></i> <span class="nav-text">Médicaments</span></a>
                    </li>
                    <li id="Rubrique_Medicaments_menu" class="menu_second">
                        <a ><i class="fa fa-cog"></i> <span class="nav-text">Rubrique Médicaux</span></a>
                    </li>
                    <li id="Familiaux_menu" class="menu_second">
                        <a ><i class="fa fa-sitemap"></i> <span class="nav-text">Familiaux</span></a>
                    </li>
                    <li id="Habitudes_alcoolo_tabagique_menu" class="menu_second">
                        <a ><i class="fa fa-glass"></i> <span class="nav-text">Habitudes alcoolo-tabagique</span></a>
                    </li>
                    <li id="Chirurgicaux_Complications_menu" class="menu_second">
                        <a ><i class="fa fa-link"></i> <span class="nav-text">Chirurgicaux,Complications</span></a>
                    </li>

                    <li id="Motif_Consultation_menu" class="menu_second">
                        <a ><i class="di di-sticky"></i> <span class="nav-text">Motif Consultation</span></a>
                    </li>
                    <li id="Examan_Général_menu" class="menu_second">
                        <a ><i class="fa fa-heartbeat"></i> <span class="nav-text">Examan Général</span></a>
                    </li>
                    <li id="Examan_Par_Appareil_menu" class="menu_second">
                        <a > <i class="fa fa-heartbeat"></i> <span class="nav-text">Examan Par Appareil</span></a>
                    </li>

                    <li class="has-submenu menu_second">
                        <a href="#submenuFour" data-toggle="collapse" aria-expanded="false" class="collapsed">
                            <i class="sli-docs"></i>
                            <span class="nav-text">Bilan Paraclinique</span>
                        </a>
                        <div class="sub-menu secondary collapse" id="submenuFour" aria-expanded="false" style="height: 0px;">
                            <ul>

                                <li id="Bilan_Biologie_menu" class="menu_second">
                                    <a > <i class="fs-file-2"></i> <span class="nav-text">Biologie</span></a>
                                </li>
                                <li id="Bilan_Radiologie_menu" class="menu_second">
                                    <a > <i class="fs-file-2"></i>  <span class="nav-text">Radiologie</span></a>
                                </li>

                            </ul>
                        </div>
                    </li>

                    <li class="has-submenu menu_second" >

                        <a href="#BilanType" data-toggle="collapse" aria-expanded="false" class="collapsed">
                            <i class="sli-docs"></i>
                            <span class="nav-text">Type Bilan</span>
                        </a>
                        <div class="sub-menu secondary collapse" id="BilanType" aria-expanded="false" style="height: 0px;">
                            <ul>

                                <li id="Bilan_Biologie_Type_menu" class="menu_second">
                                    <a > <i class="fs-file-2"></i> <span class="nav-text">Biologie</span></a>
                                </li>
                                <li id="Bilan_Radiologie_Type_menu" class="menu_second">
                                    <a > <i class="fs-file-2"></i>  <span class="nav-text">Radiologie</span></a>
                                </li>

                            </ul>
                        </div>
                    </li>


            </ul>

        </div><!-- END: sidebar-inner -->

    </aside>
    <!-- END: Side Navigation -->
    <div class="jq-toast-wrap bottom-right" id="success_alert_22" style="display: none;">
        <div class="jq-toast-single jq-has-icon jq-icon-success" style="background-color: rgb(126, 200, 87); text-align: left; display: block;">
            <span class="jq-toast-loader"></span>
            <span class="close-jq-toast-single">×</span>
            <h2 class="jq-toast-heading">BONNE NOUVELLE</h2>
            Sauvegarde Avec Success
        </div>
    </div>

    <div class="jq-toast-wrap bottom-right" id="erreur_alert_33" style="display: none;">
        <div class="jq-toast-single jq-has-icon jq-icon-error" style="background-color: rgb(255, 72, 89); text-align: left; display: block;">
            <span class="jq-toast-loader"></span>
            <span class="close-jq-toast-single">×</span>
            <h2 class="jq-toast-heading">Error</h2>
            Il existe une ERREUR veuillez réessayez !
        </div>
    </div>


    <div id="overlay">

        <div class="loader">

            <div class="loader-inner" style="background: #5697e0;"></div>
            <div class="loader-inner" style="background: #19e08b;"></div>
            <div class="loader-inner" style="background: #00dfe0;"></div>
            <div class="loader-inner" style="background: #6459e0;"></div>

        </div>



    </div>
@yield('content')

<!-- Scripts -->
</div>



@yield('script_section')



<script>
    /* Menu On resize for mobile */
    $( window ).resize(function() {
        if($(window).width() <= 780){
            $('.navbar-header').css('width','100%');
            $('.main-container').css('margin-left','1px');
        }else{
            $('.navbar-header').css('width','180px');
            $('.main-container').css('margin-left','180px');
        }
    });
    /* Menu On load for mobile */
    $(window).load(function () {
        if($(window).width() <= 780){
            $('.navbar-header').css('width','100%');
            $('.main-container').css('margin-left','1px');
        }else{
            $('.navbar-header').css('width','180px');
            $('.main-container').css('margin-left','180px');
        }
        $('#overlay').hide("fade");
        // animation on load menu
        $('.niv-class-animate').addClass('animated bounceInLeft');
        $('#logo_menu').addClass('animated bounceInRight');


        $('#rendez-vous-panel').animateCssShow('zoomInDown');


    });







    $('#Patients').on('click',function () {


        if($('#rendez-vous-consultation-panel').css('display') != 'none'){
            $('#rendez-vous-consultation-panel').animateCssHide('zoomOutRight');
        }
        if($('#rendez-vous-panel').css('display') != 'none'){
            $('#rendez-vous-panel').animateCssHide('zoomOutRight');
        }
        if($('#consultation-list-panel').css('display') != 'none'){
            $('#consultation-list-panel').animateCssHide('zoomOutRight');
        }
        if($('#prestataire_panel').css('display') != 'none'){
            $('#prestataire_panel').animateCssHide('zoomOutRight');
        }
        if($('#Info_patient_panel').css('display') != 'none'){
            $('#Info_patient_panel').animateCssHide('zoomOutRight');
        }

        setTimeout(function () {
            $('#patients-panel').animateCssShow('zoomInDown');
        },700);

    });

    $('#Consultation').on('click',function () {


        if($('#rendez-vous-consultation-panel').css('display') != 'none'){
            $('#rendez-vous-consultation-panel').animateCssHide('zoomOutRight');
        }
        if($('#rendez-vous-panel').css('display') != 'none'){
            $('#rendez-vous-panel').animateCssHide('zoomOutRight');
        }
        if($('#patients-panel').css('display') != 'none'){
            $('#patients-panel').animateCssHide('zoomOutRight');
        }
        if($('#prestataire_panel').css('display') != 'none'){
            $('#prestataire_panel').animateCssHide('zoomOutRight');
        }
        if($('#Info_patient_panel').css('display') != 'none'){
            $('#Info_patient_panel').animateCssHide('zoomOutRight');
        }

        setTimeout(function () {
            $('#consultation-list-panel').animateCssShow('zoomInDown');
        },700);

    });

    $('#Prestataires').on('click',function () {


        if($('#rendez-vous-consultation-panel').css('display') != 'none'){
            $('#rendez-vous-consultation-panel').animateCssHide('zoomOutRight');
        }
        if($('#rendez-vous-panel').css('display') != 'none'){
            $('#rendez-vous-panel').animateCssHide('zoomOutRight');
        }
        if($('#patients-panel').css('display') != 'none'){
            $('#patients-panel').animateCssHide('zoomOutRight');
        }
        if($('#consultation-list-panel').css('display') != 'none'){
            $('#consultation-list-panel').animateCssHide('zoomOutRight');
        }
        if($('#Info_patient_panel').css('display') != 'none'){
            $('#Info_patient_panel').animateCssHide('zoomOutRight');
        }

        setTimeout(function () {
            $('#prestataire_panel').animateCssShow('zoomInDown');
        },700);


    });


    // animation change menu
    $('#elements_in_menu_principal').on('click',function (e) {
        e.preventDefault();




        if($('#rendez-vous-consultation-panel').css('display') != 'none'){
            $('#rendez-vous-consultation-panel').animateCssHide('zoomOutRight');
        }
        if($('#patients-panel').css('display') != 'none'){
            $('#patients-panel').animateCssHide('zoomOutRight');
        }
        if($('#rendez-vous-panel').css('display') != 'none'){
            $('#rendez-vous-panel').animateCssHide('zoomOutRight');
        }
        if($('#consultation-list-panel').css('display') != 'none'){
            $('#consultation-list-panel').animateCssHide('zoomOutRight');
        }
        if($('#prestataire_panel').css('display') != 'none'){
            $('#prestataire_panel').animateCssHide('zoomOutRight');
        }
        if($('#Info_patient_panel').css('display') != 'none'){
            $('#Info_patient_panel').animateCssHide('zoomOutRight');
        }





        $('.menu_principale').animate({
            opacity:0,
            marginLeft: '-200px'
        }, 'slow' ,'linear', function() {
            $(this).hide();
        });
        $('.menu_second').animate({
            opacity:1,
            marginLeft: '+0px'
        }, 'slow','linear' , function() {
            $(this).slideDown();
        });
        /* Affichage panel */

        setTimeout(function () {
            $('#Medicament_panel').animateCssShow('zoomInDown');
        },700);

    });

    $('#back_to_menu_principal').on('click',function (e) {
        e.preventDefault();

        $("#rendez-vous-consultation-panel").hide();
        $("#patients-panel").hide();
        $("#consultation-list-panel").hide();
        $("#prestataire_panel").hide();
        setTimeout(function () {
            $('#rendez-vous-panel').animateCssShow('zoomInDown');
        },700);


        /* caché les elements de parametre */
        $(function () {
            if($('#Motif_Consultation_panel').css('display') != 'none'){
                $('#Motif_Consultation_panel').animateCssHide('zoomOutRight');
            }
            if($('#Familiaux_panel').css('display') != 'none'){
                $('#Familiaux_panel').animateCssHide('zoomOutRight');
            }
            if($('#Habitudes_alcoolo_tabagique_panel').css('display') != 'none'){
                $('#Habitudes_alcoolo_tabagique_panel').animateCssHide('zoomOutRight');
            }
            if($('#Chirurgicaux_Complications_panel').css('display') != 'none'){
                $('#Chirurgicaux_Complications_panel').animateCssHide('zoomOutRight');
            }
            if($('#Type_Bilan_Radiologie_panel').css('display') != 'none'){
                $('#Type_Bilan_Radiologie_panel').animateCssHide('zoomOutRight');
            }
            if($('#Type_Bilan_Biologie_panel').css('display') != 'none'){
                $('#Type_Bilan_Biologie_panel').animateCssHide('zoomOutRight');
            }
            if($('#Bilan_Radiologie_panel').css('display') != 'none'){
                $('#Bilan_Radiologie_panel').animateCssHide('zoomOutRight');
            }
            if($('#Bilan_Biologie_panel').css('display') != 'none'){
                $('#Bilan_Biologie_panel').animateCssHide('zoomOutRight');
            }
            if($('#Examan_Par_Appareil_panel').css('display') != 'none'){
                $('#Examan_Par_Appareil_panel').animateCssHide('zoomOutRight');
            }
            if($('#Examan_General_panel').css('display') != 'none'){
                $('#Examan_General_panel').animateCssHide('zoomOutRight');
            }
            if($('#Rubriques_Medicament_panel').css('display') != 'none'){
                $('#Rubriques_Medicament_panel').animateCssHide('zoomOutRight');
            }
            if($('#Medicament_panel').css('display') != 'none'){
                $('#Medicament_panel').animateCssHide('zoomOutRight');
            }
        });
        /* Fin  caché les elements */

        $('.menu_second').animate({
            opacity:0,
            marginLeft: '-208px'
        }, 'slow','linear', function() {

            $(this).hide();
        });
        $('.menu_principale').animate({
            opacity:1,
            marginLeft: '+0px'
        }, 'slow','linear', function() {
            $(this).slideDown();

        });
    });





    // function to animate.css
    $.fn.extend({

        animateCssShow: function (animationNamee) {
            $(this).show();
            var animationEndd = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';
            this.addClass('animated ' + animationNamee).one(animationEndd, function() {
                $(this).removeClass('animated ' + animationNamee);

            });
        },
        animateCssHide: function (animationName) {
            var animationEnd = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';
            this.addClass('animated ' + animationName).one(animationEnd, function() {
                $(this).removeClass('animated ' + animationName);
                $(this).hide();
            });
        }
    });


    /* All Element Menu seconde  click*/

    $('#Medicaments_menu').on('click',function () {

        if($('#Motif_Consultation_panel').css('display') != 'none'){
            $('#Motif_Consultation_panel').animateCssHide('zoomOutRight');
        }
        if($('#Familiaux_panel').css('display') != 'none'){
            $('#Familiaux_panel').animateCssHide('zoomOutRight');
        }
        if($('#Habitudes_alcoolo_tabagique_panel').css('display') != 'none'){
            $('#Habitudes_alcoolo_tabagique_panel').animateCssHide('zoomOutRight');
        }
        if($('#Chirurgicaux_Complications_panel').css('display') != 'none'){
            $('#Chirurgicaux_Complications_panel').animateCssHide('zoomOutRight');
        }
        if($('#Type_Bilan_Radiologie_panel').css('display') != 'none'){
            $('#Type_Bilan_Radiologie_panel').animateCssHide('zoomOutRight');
        }
        if($('#Type_Bilan_Biologie_panel').css('display') != 'none'){
            $('#Type_Bilan_Biologie_panel').animateCssHide('zoomOutRight');
        }
        if($('#Bilan_Radiologie_panel').css('display') != 'none'){
            $('#Bilan_Radiologie_panel').animateCssHide('zoomOutRight');
        }
        if($('#Bilan_Biologie_panel').css('display') != 'none'){
            $('#Bilan_Biologie_panel').animateCssHide('zoomOutRight');
        }
        if($('#Examan_Par_Appareil_panel').css('display') != 'none'){
            $('#Examan_Par_Appareil_panel').animateCssHide('zoomOutRight');
        }
        if($('#Examan_General_panel').css('display') != 'none'){
            $('#Examan_General_panel').animateCssHide('zoomOutRight');
        }
        if($('#Rubriques_Medicament_panel').css('display') != 'none'){
            $('#Rubriques_Medicament_panel').animateCssHide('zoomOutRight');
        }
        setTimeout(function () {
            $('#Medicament_panel').animateCssShow('zoomInDown');
        },700);


    });
    $('#Familiaux_menu').on('click',function () {

        if($('#Motif_Consultation_panel').css('display') != 'none'){
            $('#Motif_Consultation_panel').animateCssHide('zoomOutRight');
        }
        if($('#Medicament_panel').css('display') != 'none'){
            $('#Medicament_panel').animateCssHide('zoomOutRight');
        }
        if($('#Habitudes_alcoolo_tabagique_panel').css('display') != 'none'){
            $('#Habitudes_alcoolo_tabagique_panel').animateCssHide('zoomOutRight');
        }
        if($('#Chirurgicaux_Complications_panel').css('display') != 'none'){
            $('#Chirurgicaux_Complications_panel').animateCssHide('zoomOutRight');
        }
        if($('#Type_Bilan_Radiologie_panel').css('display') != 'none'){
            $('#Type_Bilan_Radiologie_panel').animateCssHide('zoomOutRight');
        }
        if($('#Type_Bilan_Biologie_panel').css('display') != 'none'){
            $('#Type_Bilan_Biologie_panel').animateCssHide('zoomOutRight');
        }
        if($('#Bilan_Radiologie_panel').css('display') != 'none'){
            $('#Bilan_Radiologie_panel').animateCssHide('zoomOutRight');
        }
        if($('#Bilan_Biologie_panel').css('display') != 'none'){
            $('#Bilan_Biologie_panel').animateCssHide('zoomOutRight');
        }
        if($('#Examan_Par_Appareil_panel').css('display') != 'none'){
            $('#Examan_Par_Appareil_panel').animateCssHide('zoomOutRight');
        }
        if($('#Examan_General_panel').css('display') != 'none'){
            $('#Examan_General_panel').animateCssHide('zoomOutRight');
        }
        if($('#Rubriques_Medicament_panel').css('display') != 'none'){
            $('#Rubriques_Medicament_panel').animateCssHide('zoomOutRight');
        }
        setTimeout(function () {
            $('#Familiaux_panel').animateCssShow('zoomInDown');
        },700);

    });
    $('#Habitudes_alcoolo_tabagique_menu').on('click',function () {

        if($('#Motif_Consultation_panel').css('display') != 'none'){
            $('#Motif_Consultation_panel').animateCssHide('zoomOutRight');
        }
        if($('#Familiaux_panel').css('display') != 'none'){
            $('#Familiaux_panel').animateCssHide('zoomOutRight');
        }
        if($('#Medicament_panel').css('display') != 'none'){
            $('#Medicament_panel').animateCssHide('zoomOutRight');
        }
        if($('#Chirurgicaux_Complications_panel').css('display') != 'none'){
            $('#Chirurgicaux_Complications_panel').animateCssHide('zoomOutRight');
        }
        if($('#Type_Bilan_Radiologie_panel').css('display') != 'none'){
            $('#Type_Bilan_Radiologie_panel').animateCssHide('zoomOutRight');
        }
        if($('#Type_Bilan_Biologie_panel').css('display') != 'none'){
            $('#Type_Bilan_Biologie_panel').animateCssHide('zoomOutRight');
        }
        if($('#Bilan_Radiologie_panel').css('display') != 'none'){
            $('#Bilan_Radiologie_panel').animateCssHide('zoomOutRight');
        }
        if($('#Bilan_Biologie_panel').css('display') != 'none'){
            $('#Bilan_Biologie_panel').animateCssHide('zoomOutRight');
        }
        if($('#Examan_Par_Appareil_panel').css('display') != 'none'){
            $('#Examan_Par_Appareil_panel').animateCssHide('zoomOutRight');
        }
        if($('#Examan_General_panel').css('display') != 'none'){
            $('#Examan_General_panel').animateCssHide('zoomOutRight');
        }
        if($('#Rubriques_Medicament_panel').css('display') != 'none'){
            $('#Rubriques_Medicament_panel').animateCssHide('zoomOutRight');
        }
        setTimeout(function () {
            $('#Habitudes_alcoolo_tabagique_panel').animateCssShow('zoomInDown')
        },700);
    });
    $('#Chirurgicaux_Complications_menu').on('click',function () {

        if($('#Motif_Consultation_panel').css('display') != 'none'){
            $('#Motif_Consultation_panel').animateCssHide('zoomOutRight');
        }
        if($('#Familiaux_panel').css('display') != 'none'){
            $('#Familiaux_panel').animateCssHide('zoomOutRight');
        }
        if($('#Habitudes_alcoolo_tabagique_panel').css('display') != 'none'){
            $('#Habitudes_alcoolo_tabagique_panel').animateCssHide('zoomOutRight');
        }
        if($('#Medicament_panel').css('display') != 'none'){
            $('#Medicament_panel').animateCssHide('zoomOutRight');
        }
        if($('#Type_Bilan_Radiologie_panel').css('display') != 'none'){
            $('#Type_Bilan_Radiologie_panel').animateCssHide('zoomOutRight');
        }
        if($('#Type_Bilan_Biologie_panel').css('display') != 'none'){
            $('#Type_Bilan_Biologie_panel').animateCssHide('zoomOutRight');
        }
        if($('#Bilan_Radiologie_panel').css('display') != 'none'){
            $('#Bilan_Radiologie_panel').animateCssHide('zoomOutRight');
        }
        if($('#Bilan_Biologie_panel').css('display') != 'none'){
            $('#Bilan_Biologie_panel').animateCssHide('zoomOutRight');
        }
        if($('#Examan_Par_Appareil_panel').css('display') != 'none'){
            $('#Examan_Par_Appareil_panel').animateCssHide('zoomOutRight');
        }
        if($('#Examan_General_panel').css('display') != 'none'){
            $('#Examan_General_panel').animateCssHide('zoomOutRight');
        }
        if($('#Rubriques_Medicament_panel').css('display') != 'none'){
            $('#Rubriques_Medicament_panel').animateCssHide('zoomOutRight');
        }
        setTimeout(function () {
            $('#Chirurgicaux_Complications_panel').animateCssShow('zoomInDown')
        },700);

    });
    $('#Motif_Consultation_menu').on('click',function () {

        if($('#Medicament_panel').css('display') != 'none'){
            $('#Medicament_panel').animateCssHide('zoomOutRight');
        }
        if($('#Familiaux_panel').css('display') != 'none'){
            $('#Familiaux_panel').animateCssHide('zoomOutRight');
        }
        if($('#Habitudes_alcoolo_tabagique_panel').css('display') != 'none'){
            $('#Habitudes_alcoolo_tabagique_panel').animateCssHide('zoomOutRight');
        }
        if($('#Chirurgicaux_Complications_panel').css('display') != 'none'){
            $('#Chirurgicaux_Complications_panel').animateCssHide('zoomOutRight');
        }
        if($('#Type_Bilan_Radiologie_panel').css('display') != 'none'){
            $('#Type_Bilan_Radiologie_panel').animateCssHide('zoomOutRight');
        }
        if($('#Type_Bilan_Biologie_panel').css('display') != 'none'){
            $('#Type_Bilan_Biologie_panel').animateCssHide('zoomOutRight');
        }
        if($('#Bilan_Radiologie_panel').css('display') != 'none'){
            $('#Bilan_Radiologie_panel').animateCssHide('zoomOutRight');
        }
        if($('#Bilan_Biologie_panel').css('display') != 'none'){
            $('#Bilan_Biologie_panel').animateCssHide('zoomOutRight');
        }
        if($('#Examan_Par_Appareil_panel').css('display') != 'none'){
            $('#Examan_Par_Appareil_panel').animateCssHide('zoomOutRight');
        }
        if($('#Examan_General_panel').css('display') != 'none'){
            $('#Examan_General_panel').animateCssHide('zoomOutRight');
        }
        if($('#Rubriques_Medicament_panel').css('display') != 'none'){
            $('#Rubriques_Medicament_panel').animateCssHide('zoomOutRight');
        }
        setTimeout(function () {
            $('#Motif_Consultation_panel').animateCssShow('zoomInDown');
        },700);
    });
    $('#Examan_Général_menu').on('click',function () {


        if($('#Motif_Consultation_panel').css('display') != 'none'){
            $('#Motif_Consultation_panel').animateCssHide('zoomOutRight');
        }
        if($('#Familiaux_panel').css('display') != 'none'){
            $('#Familiaux_panel').animateCssHide('zoomOutRight');
        }
        if($('#Habitudes_alcoolo_tabagique_panel').css('display') != 'none'){
            $('#Habitudes_alcoolo_tabagique_panel').animateCssHide('zoomOutRight');
        }
        if($('#Chirurgicaux_Complications_panel').css('display') != 'none'){
            $('#Chirurgicaux_Complications_panel').animateCssHide('zoomOutRight');
        }
        if($('#Type_Bilan_Radiologie_panel').css('display') != 'none'){
            $('#Type_Bilan_Radiologie_panel').animateCssHide('zoomOutRight');
        }
        if($('#Type_Bilan_Biologie_panel').css('display') != 'none'){
            $('#Type_Bilan_Biologie_panel').animateCssHide('zoomOutRight');
        }
        if($('#Bilan_Radiologie_panel').css('display') != 'none'){
            $('#Bilan_Radiologie_panel').animateCssHide('zoomOutRight');
        }
        if($('#Bilan_Biologie_panel').css('display') != 'none'){
            $('#Bilan_Biologie_panel').animateCssHide('zoomOutRight');
        }
        if($('#Examan_Par_Appareil_panel').css('display') != 'none'){
            $('#Examan_Par_Appareil_panel').animateCssHide('zoomOutRight');
        }
        if($('#Medicament_panel').css('display') != 'none'){
            $('#Medicament_panel').animateCssHide('zoomOutRight');
        }
        if($('#Rubriques_Medicament_panel').css('display') != 'none'){
            $('#Rubriques_Medicament_panel').animateCssHide('zoomOutRight');
        }
        setTimeout(function () {
            $('#Examan_General_panel').animateCssShow('zoomInDown');
        },700);
    });
    $('#Examan_Par_Appareil_menu').on('click',function () {

        if($('#Motif_Consultation_panel').css('display') != 'none'){
            $('#Motif_Consultation_panel').animateCssHide('zoomOutRight');
        }
        if($('#Familiaux_panel').css('display') != 'none'){
            $('#Familiaux_panel').animateCssHide('zoomOutRight');
        }
        if($('#Habitudes_alcoolo_tabagique_panel').css('display') != 'none'){
            $('#Habitudes_alcoolo_tabagique_panel').animateCssHide('zoomOutRight');
        }
        if($('#Chirurgicaux_Complications_panel').css('display') != 'none'){
            $('#Chirurgicaux_Complications_panel').animateCssHide('zoomOutRight');
        }
        if($('#Type_Bilan_Radiologie_panel').css('display') != 'none'){
            $('#Type_Bilan_Radiologie_panel').animateCssHide('zoomOutRight');
        }
        if($('#Type_Bilan_Biologie_panel').css('display') != 'none'){
            $('#Type_Bilan_Biologie_panel').animateCssHide('zoomOutRight');
        }
        if($('#Bilan_Radiologie_panel').css('display') != 'none'){
            $('#Bilan_Radiologie_panel').animateCssHide('zoomOutRight');
        }
        if($('#Bilan_Biologie_panel').css('display') != 'none'){
            $('#Bilan_Biologie_panel').animateCssHide('zoomOutRight');
        }
        if($('#Medicament_panel').css('display') != 'none'){
            $('#Medicament_panel').animateCssHide('zoomOutRight');
        }
        if($('#Examan_General_panel').css('display') != 'none'){
            $('#Examan_General_panel').animateCssHide('zoomOutRight');
        }
        if($('#Rubriques_Medicament_panel').css('display') != 'none'){
            $('#Rubriques_Medicament_panel').animateCssHide('zoomOutRight');
        }
        setTimeout(function () {
            $('#Examan_Par_Appareil_panel').animateCssShow('zoomInDown')
        },700);

    });
    $('#Bilan_Biologie_menu').on('click',function () {

        if($('#Motif_Consultation_panel').css('display') != 'none'){
            $('#Motif_Consultation_panel').animateCssHide('zoomOutRight');
        }
        if($('#Familiaux_panel').css('display') != 'none'){
            $('#Familiaux_panel').animateCssHide('zoomOutRight');
        }
        if($('#Habitudes_alcoolo_tabagique_panel').css('display') != 'none'){
            $('#Habitudes_alcoolo_tabagique_panel').animateCssHide('zoomOutRight');
        }
        if($('#Chirurgicaux_Complications_panel').css('display') != 'none'){
            $('#Chirurgicaux_Complications_panel').animateCssHide('zoomOutRight');
        }
        if($('#Type_Bilan_Radiologie_panel').css('display') != 'none'){
            $('#Type_Bilan_Radiologie_panel').animateCssHide('zoomOutRight');
        }
        if($('#Type_Bilan_Biologie_panel').css('display') != 'none'){
            $('#Type_Bilan_Biologie_panel').animateCssHide('zoomOutRight');
        }
        if($('#Bilan_Radiologie_panel').css('display') != 'none'){
            $('#Bilan_Radiologie_panel').animateCssHide('zoomOutRight');
        }
        if($('#Medicament_panel').css('display') != 'none'){
            $('#Medicament_panel').animateCssHide('zoomOutRight');
        }
        if($('#Examan_Par_Appareil_panel').css('display') != 'none'){
            $('#Examan_Par_Appareil_panel').animateCssHide('zoomOutRight');
        }
        if($('#Examan_General_panel').css('display') != 'none'){
            $('#Examan_General_panel').animateCssHide('zoomOutRight');
        }
        if($('#Rubriques_Medicament_panel').css('display') != 'none'){
            $('#Rubriques_Medicament_panel').animateCssHide('zoomOutRight');
        }
        setTimeout(function () {
            $('#Bilan_Biologie_panel').animateCssShow('zoomInDown')
        },700);

    });
    $('#Bilan_Radiologie_menu').on('click',function () {

        if($('#Motif_Consultation_panel').css('display') != 'none'){
            $('#Motif_Consultation_panel').animateCssHide('zoomOutRight');
        }
        if($('#Familiaux_panel').css('display') != 'none'){
            $('#Familiaux_panel').animateCssHide('zoomOutRight');
        }
        if($('#Habitudes_alcoolo_tabagique_panel').css('display') != 'none'){
            $('#Habitudes_alcoolo_tabagique_panel').animateCssHide('zoomOutRight');
        }
        if($('#Chirurgicaux_Complications_panel').css('display') != 'none'){
            $('#Chirurgicaux_Complications_panel').animateCssHide('zoomOutRight');
        }
        if($('#Type_Bilan_Radiologie_panel').css('display') != 'none'){
            $('#Type_Bilan_Radiologie_panel').animateCssHide('zoomOutRight');
        }
        if($('#Type_Bilan_Biologie_panel').css('display') != 'none'){
            $('#Type_Bilan_Biologie_panel').animateCssHide('zoomOutRight');
        }
        if($('#Medicament_panel').css('display') != 'none'){
            $('#Medicament_panel').animateCssHide('zoomOutRight');
        }
        if($('#Bilan_Biologie_panel').css('display') != 'none'){
            $('#Bilan_Biologie_panel').animateCssHide('zoomOutRight');
        }
        if($('#Examan_Par_Appareil_panel').css('display') != 'none'){
            $('#Examan_Par_Appareil_panel').animateCssHide('zoomOutRight');
        }
        if($('#Examan_General_panel').css('display') != 'none'){
            $('#Examan_General_panel').animateCssHide('zoomOutRight');
        }
        if($('#Rubriques_Medicament_panel').css('display') != 'none'){
            $('#Rubriques_Medicament_panel').animateCssHide('zoomOutRight');
        }
        setTimeout(function () {
            $('#Bilan_Radiologie_panel').animateCssShow('zoomInDown')
        },700);

    });
    $('#Bilan_Biologie_Type_menu').on('click',function () {

        if($('#Motif_Consultation_panel').css('display') != 'none'){
            $('#Motif_Consultation_panel').animateCssHide('zoomOutRight');
        }
        if($('#Familiaux_panel').css('display') != 'none'){
            $('#Familiaux_panel').animateCssHide('zoomOutRight');
        }
        if($('#Habitudes_alcoolo_tabagique_panel').css('display') != 'none'){
            $('#Habitudes_alcoolo_tabagique_panel').animateCssHide('zoomOutRight');
        }
        if($('#Chirurgicaux_Complications_panel').css('display') != 'none'){
            $('#Chirurgicaux_Complications_panel').animateCssHide('zoomOutRight');
        }
        if($('#Type_Bilan_Radiologie_panel').css('display') != 'none'){
            $('#Type_Bilan_Radiologie_panel').animateCssHide('zoomOutRight');
        }
        if($('#Medicament_panel').css('display') != 'none'){
            $('#Medicament_panel').animateCssHide('zoomOutRight');
        }
        if($('#Bilan_Radiologie_panel').css('display') != 'none'){
            $('#Bilan_Radiologie_panel').animateCssHide('zoomOutRight');
        }
        if($('#Bilan_Biologie_panel').css('display') != 'none'){
            $('#Bilan_Biologie_panel').animateCssHide('zoomOutRight');
        }
        if($('#Examan_Par_Appareil_panel').css('display') != 'none'){
            $('#Examan_Par_Appareil_panel').animateCssHide('zoomOutRight');
        }
        if($('#Examan_General_panel').css('display') != 'none'){
            $('#Examan_General_panel').animateCssHide('zoomOutRight');
        }
        if($('#Rubriques_Medicament_panel').css('display') != 'none'){
            $('#Rubriques_Medicament_panel').animateCssHide('zoomOutRight');
        }
        setTimeout(function () {
            $('#Type_Bilan_Biologie_panel').animateCssShow('zoomInDown')
        },700);

    });
    $('#Bilan_Radiologie_Type_menu').on('click',function () {
        if($('#Motif_Consultation_panel').css('display') != 'none'){
            $('#Motif_Consultation_panel').animateCssHide('zoomOutRight');
        }
        if($('#Familiaux_panel').css('display') != 'none'){
            $('#Familiaux_panel').animateCssHide('zoomOutRight');
        }
        if($('#Habitudes_alcoolo_tabagique_panel').css('display') != 'none'){
            $('#Habitudes_alcoolo_tabagique_panel').animateCssHide('zoomOutRight');
        }
        if($('#Chirurgicaux_Complications_panel').css('display') != 'none'){
            $('#Chirurgicaux_Complications_panel').animateCssHide('zoomOutRight');
        }
        if($('#Medicament_panel').css('display') != 'none'){
            $('#Medicament_panel').animateCssHide('zoomOutRight');
        }
        if($('#Type_Bilan_Biologie_panel').css('display') != 'none'){
            $('#Type_Bilan_Biologie_panel').animateCssHide('zoomOutRight');
        }
        if($('#Bilan_Radiologie_panel').css('display') != 'none'){
            $('#Bilan_Radiologie_panel').animateCssHide('zoomOutRight');
        }
        if($('#Bilan_Biologie_panel').css('display') != 'none'){
            $('#Bilan_Biologie_panel').animateCssHide('zoomOutRight');
        }
        if($('#Examan_Par_Appareil_panel').css('display') != 'none'){
            $('#Examan_Par_Appareil_panel').animateCssHide('zoomOutRight');
        }
        if($('#Examan_General_panel').css('display') != 'none'){
            $('#Examan_General_panel').animateCssHide('zoomOutRight');
        }
        if($('#Rubriques_Medicament_panel').css('display') != 'none'){
            $('#Rubriques_Medicament_panel').animateCssHide('zoomOutRight');
        }
        setTimeout(function () {
            $('#Type_Bilan_Radiologie_panel').animateCssShow('zoomInDown')
        },700);

    });
    $('#Rubrique_Medicaments_menu').on('click',function () {

        if($('#Motif_Consultation_panel').css('display') != 'none'){
            $('#Motif_Consultation_panel').animateCssHide('zoomOutRight');
        }
        if($('#Familiaux_panel').css('display') != 'none'){
            $('#Familiaux_panel').animateCssHide('zoomOutRight');
        }
        if($('#Habitudes_alcoolo_tabagique_panel').css('display') != 'none'){
            $('#Habitudes_alcoolo_tabagique_panel').animateCssHide('zoomOutRight');
        }
        if($('#Chirurgicaux_Complications_panel').css('display') != 'none'){
            $('#Chirurgicaux_Complications_panel').animateCssHide('zoomOutRight');
        }
        if($('#Type_Bilan_Radiologie_panel').css('display') != 'none'){
            $('#Type_Bilan_Radiologie_panel').animateCssHide('zoomOutRight');
        }
        if($('#Type_Bilan_Biologie_panel').css('display') != 'none'){
            $('#Type_Bilan_Biologie_panel').animateCssHide('zoomOutRight');
        }
        if($('#Bilan_Radiologie_panel').css('display') != 'none'){
            $('#Bilan_Radiologie_panel').animateCssHide('zoomOutRight');
        }
        if($('#Bilan_Biologie_panel').css('display') != 'none'){
            $('#Bilan_Biologie_panel').animateCssHide('zoomOutRight');
        }
        if($('#Examan_Par_Appareil_panel').css('display') != 'none'){
            $('#Examan_Par_Appareil_panel').animateCssHide('zoomOutRight');
        }
        if($('#Examan_General_panel').css('display') != 'none'){
            $('#Examan_General_panel').animateCssHide('zoomOutRight');
        }
        if($('#Medicament_panel').css('display') != 'none'){
            $('#Medicament_panel').animateCssHide('zoomOutRight');
        }
        setTimeout(function () {
            $('#Rubriques_Medicament_panel').animateCssShow('zoomInDown')
        },700);

    });



</script>
<style>
    .style_titre{
        background-color: #7676ff;
        border-radius: 25px;
        padding: 5px;
        color: white;
        text-align: center;
    }
    .menu_second{
        margin-left: -205px;
        display: none;
    }

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





</body>
</html>
