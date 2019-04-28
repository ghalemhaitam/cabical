
/* Transfer Data Motif Consultation Element */
// transfer Data to modal Add Motif Consultation
$(document).on('click','#btn_affiche_Motif_Consultation_add_modal',function () {
    $('#input_type_antecedent').val($(this).data('html'));
    $('#title_modal_add_element').text($(this).data('html'));
});
// transfer data to modal delete Motif Consultation
$(document).on('click','td > .delete_btn_Motif_Consultation',function () {

    $('#delete_confirmation_btn_oui').attr('data-id',$(this).data('id'));
    $('#delete_confirmation_btn_oui').attr('data-type',$(this).data('type'));

});
// transfer data to modal edit Motif Consultation Element
$(document).on('click','td > .edit_big_btn_Motif_Consultation',function () {

    $('#Motif_Consultation_id_input').val($(this).data('id'));
    $('#nom_edit_Motif_Consultation').val($(this).data('nom'));

});





// Edit Motif Consultation Element
$("#form_edit_Motif_Consultation").on('submit',function (e) {
    e.preventDefault();

    var data =$(this).serializeArray();

    $.ajax({
        type:'POST',
        url: 'motif-consultation-edit',
        dataType: 'json',
        data: data,

        success: function (data) {

            if(data.error != null){

                $("#erreur_alert_33").slideDown(200).effect( "shake" );
                setTimeout(function() {
                    $("#erreur_alert_33").effect("bounce").slideUp(200);
                }, 8000);

            }else{

                // remove past prestataire
                //$("tbody >.Motif_Consultation"+data.id).remove();
                // add new medicament modified
                //$("<tr class='Motif_Consultation"+data.id+"' role='row'><td style='padding: 5px'> <a class='btn btn-social-icon btn-xs btn-instagram edit_big_btn_Motif_Consultation' data-toggle='modal' data-target='#modal_edit_Motif_Consultation_panel'  data-id='"+data.id+"' data-nom='"+data.nom+"' ><span class='fa fa-edit'></span></a> <a class='btn btn-social-icon btn-xs btn-google btn-lg  delete_btn_Motif_Consultation' id='delete_btn_Motif_Consultation' data-id='"+data.id+"' data-type='Motif Consultation' data-toggle='modal' data-target='#modal_delete_confirmation'><span class='fa fa-trash'></span></a> </td> <td style='text-align: center'>"+data.nom+"</td> </tr>").insertAfter("#tbody_for_after_add_element_Motif_Consultation");



                var t = $('#table_motif_consultation').DataTable();
                // remove past

                t.row("tbody >.Motif_Consultation"+data.id )
                    .remove()
                    .draw();


                // add new modified

                var row_t = t.row.add([
                    "<a class='btn btn-social-icon btn-xs btn-instagram edit_big_btn_Motif_Consultation' data-toggle='modal' data-target='#modal_edit_Motif_Consultation_panel'  data-id='"+data.id+"' data-nom='"+data.nom+"' ><span class='fa fa-edit'></span></a> <a class='btn btn-social-icon btn-xs btn-google btn-lg  delete_btn_Motif_Consultation' id='delete_btn_Motif_Consultation' data-id='"+data.id+"' data-type='Motif Consultation' data-toggle='modal' data-target='#modal_delete_confirmation'><span class='fa fa-trash'></span></a>",
                    data.nom

                ]).draw( true )
                    .node();
                $(row_t).addClass('Motif_Consultation'+data.id);
                $(row_t).children('td').css('text-align','center');



                $('#modal_edit_Motif_Consultation_panel').modal('toggle');
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