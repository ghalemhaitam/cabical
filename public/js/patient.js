


$("#new_ville").on('click',function () {
    $('#select_ville_existe > .select2-container--default,.select2-container--below ,.select2-container--focus').css('display','none');
    $(this).css('display','none');
    $('#back_ville').css('display','block');
    $('#input_new_ville').css('display','block');
});
$("#back_ville").on('click',function () {

    $(this).css('display','none');
    $('#input_new_ville').val('');
    $('#input_new_ville').css('display','none');

    $('#select_ville_existe > .select2-container--default,.select2-container--below ,.select2-container--focus').css('display','');
    $('#new_ville').css('display','');

});

// jquery for ville in ADD
$("#new_ville_add").on('click',function () {
    $('#select_ville_existe_add > .select2-container--default,.select2-container--below ,.select2-container--focus').css('display','none');
    $(this).css('display','none');
    $('#back_ville_add').css('display','block');
    $('#input_new_ville_add').css('display','block');
});
$("#back_ville_add").on('click',function () {

    $(this).css('display','none');
    $('#input_new_ville_add').val('');
    $('#input_new_ville_add').css('display','none');

    $('#select_ville_existe_add > .select2-container--default,.select2-container--below ,.select2-container--focus').css('display','');
    $('#new_ville_add').css('display','');

});


// jquery for Mutuelle
$( "#check_click_jquery" ).on('click',function () {
    if($(this).hasClass( "checkbox-primary" )){
        $(this).removeClass( "checkbox-primary");
        $('#input_mutuelle').val('');
        $("#checkbox11").removeAttr('checked');
        $("#input_mutuelle").css('display','none');

    }else{
        $(this).addClass("checkbox-primary");
        $("#checkbox11").attr( "checked", 'checked' );
        $("#input_mutuelle").css('display','');
    }
});

$( "#check_click_jquery_add" ).on('click',function () {
    if($(this).hasClass("checkbox-primary")){
        $(this).removeClass("checkbox-primary");
        $('#input_mutuelle_add').val('');
        $("#checkbox1").removeAttr('checked');
        $("#input_mutuelle_add").css('display','none');

    }else{
        $(this).addClass("checkbox-primary");
        $("#checkbox1").attr( "checked", 'checked' );
        $('#input_mutuelle_add').val('');
        $("#input_mutuelle_add").css('display','');
    }
});


// modal Edit

$(document).on('click','.edit-modal',function () {
    var ville = $.trim($(this).data('ville'));
    var sexe = $.trim($(this).data('sexe'));
    var mutuelle = $.trim($(this).data('mutuelle'));
    var return_loop = 0;
    $('#ThisIsThat').val($(this).data('id'));
    $('#here').attr('data-id',$(this).data('id'));
    $('#Cin').val($(this).data('cin'));
    $('#Nom').val($(this).data('nom'));
    $('#Prenom').val($(this).data('prenom'));
    $('#Email').val($(this).data('email'));
    $('#datenaissance').val($(this).data('datenaissance'));
    $('#tel1').val($(this).data('tel1'));
    $('#tel2').val($(this).data('tel2'));


    // jquery for mutuelle

    if(mutuelle != '---' ){
        $('#check_click_jquery').addClass("checkbox-primary");
        $("#checkbox11").attr( "checked", 'checked' );
        $('#input_mutuelle').val(mutuelle);
        $("#input_mutuelle").css('display','');
    }else {
        $('#check_click_jquery').removeClass( "checkbox-primary");
        $('#input_mutuelle').val('');
        $("#checkbox11").removeAttr('checked');
        $("#input_mutuelle").css('display','none');
    }


    // for select sexe
    $("#sexe > option").each(function () {
        if($.trim(this.value) === sexe){
            $(this).attr('selected', true);
            $('.SlectBox > span').text(sexe);
        }else{
            $(this).removeAttr('selected');
        }
    });

    // code for ville
    $("#selectville > option").each(function() {

        if($.trim(this.value) === ville){
            $(this).attr('selected', true);
            $('#select2-selectville-container').attr('title',ville);
            $('#select2-selectville-container').text(ville);
            // for design
            $('#back_ville').css('display','none');
            $('#back_ville').css('display','none');
            $('#input_new_ville').val('');
            $('#input_new_ville').css('display','none');

            $('#select_ville_existe > .select2-container--default,.select2-container--below ,.select2-container--focus').css('display','');
            $('#new_ville').css('display','');

            return_loop += 1;

        }else {
            if(return_loop == 0){

                $('#select_ville_existe > .select2-container--default,.select2-container--below ,.select2-container--focus').css('display','none');
                $('#new_ville').css('display','none');
                $('#back_ville').css('display','block');

                $('#input_new_ville').css('display','block');
                $('#input_new_ville').val(ville);
                $(this).removeProp('selected');
            }
            $(this).removeProp('selected');

        }

    });

});
var Aucune = "Aucune";
// ajax for edit
$("#form_edit").on('submit',function (e) {
    e.preventDefault();
    $.ajaxSetup({
        headers: {
            'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var data =$(this).serializeArray();

    $.ajax({
        type:'POST',
        url: 'patient-edit',
        dataType: 'json',
        data: data
        /*
         {
         //'_token': "{ { csrf_token() }}",
         '_token':  DataAll[0].value ,
         'id': $('#here').data('id'),
         'cin': $('#Cin').val(),
         'nom': $('#Nom').val(),
         'date_naissance': $('#datenaissance').val(),
         'prenom': $('#Prenom').val(),
         'email': $('#Email').val(),
         'tel1': $('#tel1').val(),
         'tel2': $('#tel2').val(),
         'sexe': $('#sexe').val(),
         'mutuelle': $('#input_mutuelle').val(),
         'new_ville': $('#new_ville').val(),
         'ville': $('#selectville').val(),
         //'token': $('meta[name="csrf-token"]').attr('content')

         }
         */,

        success: function (data) {

            if(data.msg == null){
                //$('.item' + data.id).hide();
                //$("<tr class='item"+data.id+"'><td style=' padding: 5px; border: 1px solid rgb(221, 221, 221); color: rgb(114, 114, 141);'> <a class='btn btn-social-icon btn-xs btn-instagram edit-modal' data-email='"+data.email+"' data-id='"+data.id+"' data-ville='"+$('#selectville').val()+"'  data-mutuelle='"+data.mutuelle+"' data-tel2='0"+data.tel2+"' data-tel1='0"+data.tel1+"' data-datenaissance='"+data.date_naissance+"' data-sexe='"+data.sexe+"' data-cin='"+data.cin+"' data-nom='"+data.nom+"' data-prenom='"+data.prenom+"' data-toggle='modal' data-target='#edit_patient_modal'><span class='fa fa-edit'></span></a> <a class='btn btn-social-icon btn-xs btn-google btn-lg delete-modal ' data-id='"+data.id+"' data-nom='"+data.nom+"' data-toggle='modal' data-target='#modal_delete_confirmation' ><span class='fa fa-trash'></span></a></td><td style='padding: 5px;border: 1px solid rgb(221, 221, 221); color: rgb(114, 114, 141);'> "+data.cin+"</td><td style='padding: 5px;border: 1px solid rgb(221, 221, 221); color: rgb(114, 114, 141);'> "+data.nom+"</td><td style='padding: 5px;border: 1px solid rgb(221, 221, 221); color: rgb(114, 114, 141);'> "+data.prenom+"</td><td style='padding: 5px; border: 1px solid rgb(221, 221, 221); color: rgb(114, 114, 141);'> "+data.sexe+"</td><td style='padding: 5px; border: 1px solid rgb(221, 221, 221); color: rgb(114, 114, 141);'> "+data.date_naissance+"</td><td style='padding: 5px; border: 1px solid rgb(221, 221, 221); color: rgb(114, 114, 141);'> "+data.email+"</td><td style='padding: 5px; border: 1px solid rgb(221, 221, 221); color: rgb(114, 114, 141);'> "+data.tel1+"</td><td style=' padding: 5px; border: 1px solid rgb(221, 221, 221); color: rgb(114, 114, 141);'> "+data.tel2+"</td><td style=' padding: 5px; border: 1px solid rgb(221, 221, 221); color: rgb(114, 114, 141);'> "+data.mutuelle+"</td><td style='padding: 5px; border: 1px solid rgb(221, 221, 221); color: rgb(114, 114, 141);'> "+$('#selectville').val() +"</td></tr>").insertAfter("#table_in_add");



                var t = $('#table_patients').DataTable();
                // remove past

                t.row("tbody >.item"+data.id )
                    .remove()
                    .draw();

                // add new  modified

                var row_t = t.row.add([
                    "<a class='btn btn-social-icon btn-xs btn-instagram edit-modal' data-email='"+data.email+"' data-id='"+data.id+"' data-ville='"+$('#selectville').val()+"'  data-mutuelle='"+data.mutuelle+"' data-tel2='0"+data.tel2+"' data-tel1='0"+data.tel1+"' data-datenaissance='"+data.date_naissance+"' data-sexe='"+data.sexe+"' data-cin='"+data.cin+"' data-nom='"+data.nom+"' data-prenom='"+data.prenom+"' data-toggle='modal' data-target='#edit_patient_modal'><span class='fa fa-edit'></span></a><a class='btn btn-social-icon btn-xs btn-google btn-lg delete-modal btn-delete-patient ' data-id='"+data.id+"' data-nom='"+data.nom+"' data-toggle='modal' data-target='#modal_delete_confirmation' ><span class='fa fa-trash'></span></a>",
                    data.cin,
                    data.nom,
                    data.prenom,
                    data.sexe,
                    data.date_naissance,
                    data.email,
                    data.tel1,
                    data.tel2,
                    data.mutuelle,
                    $('#selectville').val()


                ]).draw( true )
                    .node();

                $(row_t).addClass('item'+data.id);
                $(row_t).children('td').css('text-align','center');
                $(row_t).attr('data-id',data.id);
                $(row_t).attr('data-nom',data.nom+' '+data.prenom);
                $(row_t).attr('data-datenaissance',data.date_naissance);
                $(row_t).attr('data-email',data.email);
                $(row_t).attr('data-sexe',data.sexe);
                $(row_t).attr('data-mutuelle',data.mutuelle);
                $(row_t).attr('data-tel1',data.tel1);
                $(row_t).attr('data-tel2',data.tel2);
                $(row_t).attr('data-cin',data.cin);
                if(data.ville == ''){
                    $(row_t).attr('data-ville','Aucune Ville');
                }else{
                    $(row_t).attr('data-ville',data.ville.nom);
                }





                $('#edit_patient_modal').modal('toggle');
                $("#success_alert_2").show(200);
                setTimeout(function() {
                    $("#success_alert_2").fadeOut(200);
                }, 6000);
            }else {
                $('#msg_error_edit').text(data.msg);
                $("#erreur_alert_3").show(200);
                setTimeout(function() {
                    $("#erreur_alert_3").fadeOut(200);
                }, 6000);
            }


        },
        error: function(data) {
            alert("fail");
        }
    });
});

// model Add

// ajax for add
$("#form_add").on('submit',function (e) {
    e.preventDefault();
    $.ajaxSetup({
        headers: {
            'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var data =$(this).serializeArray();
    console.log(data);
    $.ajax({
        type:'POST',
        url: 'patient-add',
        dataType: 'json',
        data: data
        ,
        success: function (data) {


            if(data.msg != null){

                $("#my_error").text(data.msg);
                $("#error_shox").slideDown(200);

                setTimeout(function() {
                    $("#error_shox").slideUp(200);
                }, 6000);

            }else{
                var t = $('#table_patients').DataTable();
                // add new  modified

                var row_t = t.row.add([
                    "<a class='btn btn-social-icon btn-xs btn-instagram edit-modal' data-email='"+data.email+"' data-id='"+data.id+"' data-ville='"+$('#selectville').val()+"'  data-mutuelle='"+data.mutuelle+"' data-tel2='0"+data.tel2+"' data-tel1='0"+data.tel1+"' data-datenaissance='"+data.date_naissance+"' data-sexe='"+data.sexe+"' data-cin='"+data.cin+"' data-nom='"+data.nom+"' data-prenom='"+data.prenom+"' data-toggle='modal' data-target='#edit_patient_modal'><span class='fa fa-edit'></span></a><a class='btn btn-social-icon btn-xs btn-google btn-lg delete-modal btn-delete-patient ' data-id='"+data.id+"' data-nom='"+data.nom+"' data-toggle='modal' data-target='#modal_delete_confirmation' ><span class='fa fa-trash'></span></a>",
                    data.cin,
                    data.nom,
                    data.prenom,
                    data.sexe,
                    data.date_naissance,
                    data.email,
                    data.tel1,
                    data.tel2,
                    data.mutuelle,
                    $('#selectville_add').val()


                ]).draw( true )
                    .node();
                $(row_t).addClass('item'+data.id);
                $(row_t).children('td').css('text-align','center');
                $(row_t).attr('data-id',data.id);
                $(row_t).attr('data-nom',data.nom+' '+data.prenom);
                $(row_t).attr('data-datenaissance',data.date_naissance);
                $(row_t).attr('data-email',data.email);
                $(row_t).attr('data-sexe',data.sexe);
                $(row_t).attr('data-mutuelle',data.mutuelle);
                $(row_t).attr('data-tel1',data.tel1);
                $(row_t).attr('data-tel2',data.tel2);
                $(row_t).attr('data-cin',data.cin);

                if(data.ville == ''){
                    $(row_t).attr('data-ville','Aucune Ville');
                }else{
                    $(row_t).attr('data-ville',data.ville.nom);
                }

                // add class to td for click
                $(row_t).children('td').eq(1).addClass('show_patient');
                $(row_t).children('td').eq(2).addClass('show_patient');
                $(row_t).children('td').eq(3).addClass('show_patient');
                $(row_t).children('td').eq(4).addClass('show_patient');
                $(row_t).children('td').eq(5).addClass('show_patient');
                $(row_t).children('td').eq(6).addClass('show_patient');
                $(row_t).children('td').eq(7).addClass('show_patient');
                $(row_t).children('td').eq(8).addClass('show_patient');
                $(row_t).children('td').eq(8).addClass('show_patient');
                $(row_t).children('td').eq(9).addClass('show_patient');
                $(row_t).children('td').eq(10).addClass('show_patient');



                $('#myModal5').modal('toggle');
                $("#success_shox").slideDown(200);
                setTimeout(function() {
                    $("#success_shox").slideUp(200);
                }, 6000);


                $('#cin_add').val("");
                $('#nom_add').val("");
                $('#datenaissance_add').val("");
                $('#prenom_add').val("");
                $('#email_add').val("");
                $('#tel1_add').val("");
                $('#tel2_add').val("");
                $('#input_mutuelle_add').val("");
                $('#new_ville_add').val("");
            }
        },
        error: function(data) {
            alert("fail");
        }
    });
});

//form delete
$(document).on('click','.delete-modal',function () {
    var id = $.trim($(this).data('id'));
    var nom = $.trim($(this).data('nom'));

    $('#ThisIsThatDelete').text(nom);
    $('#click_delete_modal').attr('data-id',id);


});



// delete patient with all consultation
$(document).on('click','td > .btn-delete-patient',function () {

    $('#delete_confirmation_btn_oui').attr('data-id',$(this).data('id'));
    $('#delete_confirmation_btn_oui').attr('data-type',$(this).data('type'));
    // la suite du code sur le modal delete et sur le fichier js rendez_vous . Merci [ #delete_confirmation_btn_oui ]
});




// on click show all info patient

$(document).on('click',' tr > .show_patient' , function () {
    var parent_tr =$(this).parent('tr');

    var patient_id = parent_tr.attr('data-id');
    var patient_cin = parent_tr.attr('data-cin');
    var patient_nom  = parent_tr.attr('data-nom');
    var patient_date_naissance = parent_tr.attr('data-datenaissance');
    var patient_ville  = parent_tr.attr('data-ville');
    var patient_email  = parent_tr.attr('data-email');
    var patient_sexe = parent_tr.attr('data-sexe');
    var patient_mutuelle  = parent_tr.attr('data-mutuelle');
    var patient_tel1  = parent_tr.attr('data-tel1');
    var patient_tel2  = parent_tr.attr('data-tel2');


    // initioalisation info patient to panel show

    $('#patient_nom_prenom_info').text(patient_nom);
    $('#patient_cin_info').text(patient_cin);
    $('#patient_sexe_info').text(patient_sexe);
    $('#patient_email_info').text(patient_email);
    $('#patient_ville_info').text(patient_ville);
    $('#patient_date_naissance_info').text(patient_date_naissance);
    $('#patient_tel1_info').text('0' + patient_tel1);
    $('#patient_tel2_info').text('0' + patient_tel2);
    $('#patient_mutuelle_info').text('Mutuelle : ' + patient_mutuelle);
    $('#patient_id_for_info').attr('data-id',patient_id);



    // fin initialisation

    /* Get Consultation  rendez_vous  Patient */
    $.get('patient-search-consultation?id='+patient_id,function (data) {


        if(data.consultations != null){

        /* Rendez_vous */


            if(data.rendez_vous.length  == 1 ){

                $("#patient_info_rendez_vous_ul").empty();

                $.get('search-motif?id='+data.rendez_vous[0].motif_id,function (data1) {

                    if(data1.error != null){
                        $("#patient_info_rendez_vous_ul").append("<li class='event' data-date='"+data.rendez_vous[0].date_rendez_vous.substr(0,data.rendez_vous[0].date_rendez_vous.indexOf(' '))+"'><h3>- - -</h3><p class='event-content' data-date='"+data.rendez_vous[0].date_rendez_vous.substr(0,data.rendez_vous[0].date_rendez_vous.indexOf(' '))+"'></p></li>");

                    }else{

                        $("#patient_info_rendez_vous_ul").append("<li class='event' data-date='"+data.rendez_vous[0].date_rendez_vous.substr(0,data.rendez_vous[0].date_rendez_vous.indexOf(' '))+"'><h3>"+data1.nom+"</h3><p class='event-content' data-date='"+data.rendez_vous[0].date_rendez_vous.substr(0,data.rendez_vous[0].date_rendez_vous.indexOf(' '))+"'></p></li>");
                    }

                });
            }
            else if(data.rendez_vous.length  > 0 ){


                $("#patient_info_rendez_vous_ul").empty();

                $.each(data.rendez_vous, function (index, element) {

                    $.get('search-motif?id='+element.motif_id,function (data1) {

                        if(data1.error != null){
                            $("#patient_info_rendez_vous_ul").append("<li class='event' data-date='"+element.date_rendez_vous.substr(0,element.date_rendez_vous.indexOf(' '))+"'><h3>- - -</h3><p class='event-content' data-date='"+element.date_rendez_vous.substr(0,element.date_rendez_vous.indexOf(' '))+"'></p></li>");

                        }else{

                            $("#patient_info_rendez_vous_ul").append("<li class='event' data-date='"+element.date_rendez_vous.substr(0,element.date_rendez_vous.indexOf(' '))+"'><h3>"+data1.nom+"</h3><p class='event-content' data-date='"+element.date_rendez_vous.substr(0,element.date_rendez_vous.indexOf(' '))+"'></p></li>");
                        }

                    });

                })

            }
            else{
                $("#patient_info_rendez_vous_ul").empty();
            }




        /* consultation */
        // Lily Stehr MD /name for test
            if(data.consultations.length  == 1 ){

                $("#patient_info_consultation").empty();

                $.get('search-motif?id='+data.consultations[0].type_id,function (data1) {

                    if(data1.error != null){
                        $("#patient_info_consultation").append("<li class='event' data-date='"+data.consultations[0].date_consultation.substr(0,data.consultations[0].date_consultation.indexOf(' '))+"'><h3>- - -</h3><p class='event-content' data-date='"+data.consultations[0].date_consultation.substr(0,data.consultations[0].date_consultation.indexOf(' '))+"'>"+data.consultations[0].remarque+"</p></li>");

                    }else{

                        $("#patient_info_consultation").append("<li class='event' data-date='"+data.consultations[0].date_consultation.substr(0,data.consultations[0].date_consultation.indexOf(' '))+"'><h3>"+data1.nom+"</h3><p class='event-content' data-date='"+data.consultations[0].date_consultation.substr(0,data.consultations[0].date_consultation.indexOf(' '))+"'>"+data.consultations[0].remarque+"</p></li>");
                    }

                });

            }else if(data.consultations.length  > 0 ){
                $("#patient_info_consultation").empty();

                $.each(data.consultations, function (index, element) {

                    $.get('search-motif?id='+element.type_id,function (data1) {

                        if(data1.error != null){
                            $("#patient_info_consultation").append("<li class='event' data-date='"+element.date_consultation.substr(0,element.date_consultation.indexOf(' '))+"'><h3>- - -</h3><p class='event-content' data-date='"+element.date_consultation.substr(0,element.date_consultation.indexOf(' '))+"'>"+element.remarque+"</p></li>");

                        }else{

                            $("#patient_info_consultation").append("<li class='event' data-date='"+element.date_consultation.substr(0,element.date_consultation.indexOf(' '))+"'><h3>"+data1.nom+"</h3><p class='event-content' data-date='"+element.date_consultation.substr(0,element.date_consultation.indexOf(' '))+"'>"+element.remarque+"</p></li>");
                        }

                    });

                })

            }else{
                $("#patient_info_consultation").empty();
            }



                // Animation show info
                $('#patients-panel').animateCssHide('zoomOutRight');
                setTimeout(function () {
                    $('#Info_patient_panel').animateCssShow('zoomInDown')
                },700);



        }else if( data.error != null){
            // erreur

        }
    })


});