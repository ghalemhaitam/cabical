
/* Transfer Data Habitudes */
// transfer data to modal add Habitudes Antecedent
$(document).on('click','#btn_affiche_Habitudes_alcoolo_tabagique_add_modal',function () {
    $('#input_type_antecedent').val($(this).data('html'));
    $('#title_modal_add_element').text($(this).data('html'));
});
// transfer data to modal delete Habitudes Antecedent
$(document).on('click','td > .delete_btn_Habitudes_alcoolo_tabagique ',function () {

    $('#delete_confirmation_btn_oui').attr('data-id',$(this).data('id'));
    $('#delete_confirmation_btn_oui').attr('data-type',$(this).data('type'));

});
// transfer data to modal edit Habitudes Antecedent
$(document).on('click','td > .edit_big_btn_Habitudes_alcoolo_tabagique',function () {

    $('#Habitudes_alcoolo_tabagique_id_input').val($(this).data('id'));
    $('#nom_edit_Habitudes_alcoolo_tabagique').val($(this).data('nom'));

});




// Edit Habitudes Antecedent Element
$("#form_edit_Habitudes_alcoolo_tabagique").on('submit',function (e) {
    e.preventDefault();

    var data =$(this).serializeArray();


    $.ajax({
        type:'POST',
        url: 'habitudes-alcoolo-tabagique-edit',
        dataType: 'json',
        data: data,

        success: function (data) {

            if(data.error != null){

                $("#erreur_alert_33").slideDown(200).effect( "shake" );
                setTimeout(function() {
                    $("#erreur_alert_33").effect("bounce").slideUp(200);
                }, 8000);

            }else{


                // add new medicament modified

                var t = $('#table_Habitudes').DataTable();
                // remove past

                t.row("tbody >.habitudes_alcoolo_tabagique"+data.id )
                    .remove()
                    .draw();


                // add new modified

                var row_t = t.row.add([
                    "<a class='btn btn-social-icon btn-xs btn-instagram edit_big_btn_Habitudes_alcoolo_tabagique' data-toggle='modal' data-target='#modal_edit_Habitudes_alcoolo_tabagique_panel'  data-id='"+data.id+"' data-nom='"+data.nom+"' ><span class='fa fa-edit'></span></a> <a class='btn btn-social-icon btn-xs btn-google btn-lg  delete_btn_Habitudes_alcoolo_tabagique' id='delete_btn_Habitudes_alcoolo_tabagique' data-id='"+data.id+"' data-type='Habitudes alcoolo-tabagique' data-toggle='modal' data-target='#modal_delete_confirmation'><span class='fa fa-trash'></span></a>",
                    data.nom

                ]).draw( true )
                    .node();
                $(row_t).addClass('habitudes_alcoolo_tabagique'+data.id);
                $(row_t).children('td').css('text-align','center');



                $('#modal_edit_Habitudes_alcoolo_tabagique_panel').modal('toggle');
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