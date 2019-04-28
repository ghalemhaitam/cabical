
/* Transfer Data Examan Général Element */
// transfer Data to modal Add Examan Général
$(document).on('click','#btn_affiche_Examan_General_add_modal',function () {
    $('#input_type_antecedent').val($(this).data('html'));
    $('#title_modal_add_element').text($(this).data('html'));
});
// transfer data to modal delete Examan Général
$(document).on('click','td > .delete_btn_Examan_General',function () {

    $('#delete_confirmation_btn_oui').attr('data-id',$(this).data('id'));
    $('#delete_confirmation_btn_oui').attr('data-type',$(this).data('type'));

});
// transfer data to modal edit Examan Général Element
$(document).on('click','td > .edit_big_btn_Examan_General',function () {

    $('#Examan_General_id_input').val($(this).data('id'));
    $('#nom_edit_Examan_General').val($(this).data('nom'));

});





/* Transfer Data Examan Par Appareil Element */
// transfer Data to modal Add Examan Par Appareil Element
$(document).on('click','#btn_affiche_Examan_Par_Appareil_add_modal',function () {
    $('#input_type_antecedent').val($(this).data('html'));
    $('#title_modal_add_element').text($(this).data('html'));
});
// transfer data to modal delete Examan Par Appareil
$(document).on('click','td > .delete_btn_Examan_Par_Appareil',function () {

    $('#delete_confirmation_btn_oui').attr('data-id',$(this).data('id'));
    $('#delete_confirmation_btn_oui').attr('data-type',$(this).data('type'));

});
// transfer data to modal edit Examan Par Appareil Element
$(document).on('click','td > .edit_big_btn_Examan_Par_Appareil',function () {

    $('#Examan_Par_Appareil_id_input').val($(this).data('id'));
    $('#nom_edit_Examan_Par_Appareil').val($(this).data('nom'));

});







// Edit Examan Clinique general Element
$("#form_edit_Examan_General").on('submit',function (e) {
    e.preventDefault();

    var data =$(this).serializeArray();

    $.ajax({
        type:'POST',
        url: 'examan-general-edit',
        dataType: 'json',
        data: data,

        success: function (data) {

            if(data.error != null){

                $("#erreur_alert_33").slideDown(200).effect( "shake" );
                setTimeout(function() {
                    $("#erreur_alert_33").effect("bounce").slideUp(200);
                }, 8000);

            }else{

                // remove past element
                //$("tbody >.Examan_General"+data.id).remove();
                // add new element modified
                //$("<tr class='Examan_General"+data.id+"' role='row'><td style='padding: 5px'> <a class='btn btn-social-icon btn-xs btn-instagram edit_big_btn_Examan_General' data-toggle='modal' data-target='#modal_edit_Examan_General_panel'  data-id='"+data.id+"' data-nom='"+data.nom+"' ><span class='fa fa-edit'></span></a> <a class='btn btn-social-icon btn-xs btn-google btn-lg  delete_btn_Examan_General' id='delete_btn_Examan_General' data-id='"+data.id+"' data-type='General' data-toggle='modal' data-target='#modal_delete_confirmation'><span class='fa fa-trash'></span></a> </td> <td style='text-align: center'>"+data.nom+"</td> </tr>").insertAfter("#tbody_for_after_add_element_Examan_General");


                var t = $('#table_Examan_General').DataTable();
                // remove past

                t.row("tbody >.Examan_General"+data.id )
                    .remove()
                    .draw();


                // add new modified

                var row_t = t.row.add([
                    "<a class='btn btn-social-icon btn-xs btn-instagram edit_big_btn_Examan_General' data-toggle='modal' data-target='#modal_edit_Examan_General_panel'  data-id='"+data.id+"' data-nom='"+data.nom+"' ><span class='fa fa-edit'></span></a> <a class='btn btn-social-icon btn-xs btn-google btn-lg  delete_btn_Examan_General' id='delete_btn_Examan_General' data-id='"+data.id+"' data-type='General' data-toggle='modal' data-target='#modal_delete_confirmation'><span class='fa fa-trash'></span></a>",
                    data.nom

                ]).draw( true )
                    .node();
                $(row_t).addClass('Examan_General'+data.id);
                $(row_t).children('td').css('text-align','center');



                $('#modal_edit_Examan_General_panel').modal('toggle');
                $("#success_alert_22").slideDown(200).effect( "shake" );
                setTimeout(function() {
                    $("#success_alert_22").effect("bounce").slideUp(200);
                }, 6000);

            }
        },
        error: function(data) {
            $("#erreur_alert_33").slideDown(200).effect( "shake" );
            setTimeout(function() {
                $("#erreur_alert_33").effect("bounce").slideUp(200);
            }, 8000);
        }
    });
});

// Edit Examan Par Appareil Element
$("#form_edit_Examan_Par_Appareil").on('submit',function (e) {
    e.preventDefault();

    var data =$(this).serializeArray();

    $.ajax({
        type:'POST',
        url: 'examan-par_appareil-edit',
        dataType: 'json',
        data: data,

        success: function (data) {

            if(data.error != null){

                $("#erreur_alert_33").slideDown(200).effect( "shake" );
                setTimeout(function() {
                    $("#erreur_alert_33").effect("bounce").slideUp(200);
                }, 8000);

            }else{


                var t = $('#table_Examan_Par_Appareil').DataTable();
                // remove past

                t.row("tbody >.Examan_Par_Appareil"+data.id )
                    .remove()
                    .draw();


                // add new modified

                var row_t = t.row.add([
                    "<a class='btn btn-social-icon btn-xs btn-instagram edit_big_btn_Examan_Par_Appareil' data-toggle='modal' data-target='#modal_edit_Examan_Par_Appareil_panel'  data-id='"+data.id+"' data-nom='"+data.nom+"' ><span class='fa fa-edit'></span></a> <a class='btn btn-social-icon btn-xs btn-google btn-lg  delete_btn_Examan_Par_Appareil' id='delete_btn_Examan_Par_Appareil' data-id='"+data.id+"' data-type='Par Appareil' data-toggle='modal' data-target='#modal_delete_confirmation'><span class='fa fa-trash'></span></a>",
                    data.nom

                ]).draw( true )
                    .node();
                $(row_t).addClass('Examan_Par_Appareil'+data.id);
                $(row_t).children('td').css('text-align','center');

                $('#modal_edit_Examan_Par_Appareil_panel').modal('toggle');
                $("#success_alert_22").slideDown(200).effect( "shake" );
                setTimeout(function() {
                    $("#success_alert_22").effect("bounce").slideUp(200);
                }, 6000);

            }
        },
        error: function(data) {
            $("#erreur_alert_33").slideDown(200).effect( "shake" );
            setTimeout(function() {
                $("#erreur_alert_33").effect("bounce").slideUp(200);
            }, 8000);
        }
    });
});

