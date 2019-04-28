
/* transfer Data Rubriques Medicaux */
//  transfer Data to modal Add Rubriques Medicaux
$(document).on('click','#btn_affiche_rubriques_medicament_add_modal',function () {
    $('#input_type_antecedent').val($(this).data('html'));
    $('#title_modal_add_element').text($(this).data('html'));
});
// transfer data to modal delete Rubriques Medicaux
$(document).on('click','td > .delete_btn_rubriques_medicament',function () {
    $('#delete_confirmation_btn_oui').attr('data-id',$(this).data('id'));
    $('#delete_confirmation_btn_oui').attr('data-type',$(this).data('type'));
});
// transfer data to modal edit Rubriques Medicaux
$(document).on('click','td > .edit_big_btn_rubriques_medicament',function () {
    $('#rubrique_medicaux_id_input').val($(this).data('id'));
    $('#nom_edit_rubrique_medicaux').val($(this).data('nom'));
});



// Edit Rubrique Medicaux   Element
$("#form_edit_rubrique_medicaux").on('submit',function (e) {
    e.preventDefault();

    var data =$(this).serializeArray();


    $.ajax({
        type:'POST',
        url: 'medicaux-edit',
        dataType: 'json',
        data: data,

        success: function (data) {


            if(data.error != null){

                $("#erreur_alert_33").slideDown(200).effect( "shake" );
                setTimeout(function() {
                    $("#erreur_alert_33").effect("bounce").slideUp(200);
                }, 8000);

            }else{

                var t = $('#table_Rubriques_Medicament').DataTable();
                // remove past

                t.row("tbody >.rubriques_medicament"+data.id )
                    .remove()
                    .draw();
                // add new medicament modified


                var row_t = t.row.add([
                    "<a class='btn btn-social-icon btn-xs btn-instagram edit_big_btn_rubriques_medicament' data-toggle='modal' data-target='#modal_edit_rubrique_medicaux_panel'  data-id='"+data.id+"' data-nom='"+data.nom+"' ><span class='fa fa-edit'></span></a> <a class='btn btn-social-icon btn-xs btn-google btn-lg  delete_btn_rubriques_medicament' id='delete_btn_rubriques_medicament' data-id='"+data.id+"' data-type='Medicaux' data-toggle='modal' data-target='#modal_delete_confirmation'><span class='fa fa-trash'></span></a>",

                    data.nom

                ]).draw( true )
                    .node();
                $(row_t).addClass('rubriques_medicament'+data.id);
                $(row_t).children('td').css('text-align','center');


                $('#modal_edit_rubriques_medicament_panel').modal('toggle');
                $("#success_alert_22").slideDown(200).effect( "shake" );
                setTimeout(function() {
                    $("#success_alert_22").effect("bounce").slideUp(200);
                }, 6000);

            }
        },
        error: function(data) {
            $("#erreur_alert_33").slideDown(200);

            setTimeout(function() {
                $("#erreur_alert_33").slideUp(200);
            }, 6000);
        }
    });
});