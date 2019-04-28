
/* transfer Data Type Bilan Biologie */
// transfer Data to modal Add Type Bilan Biologie
$(document).on('click','#btn_affiche_Type_Bilan_Biologie_add_modal',function () {
    $('#input_type_antecedent').val($(this).data('html'));
    $('#title_modal_add_element').text($(this).data('html'));
});
// transfer data to modal delete Type Bilan Biologie
$(document).on('click','td > .delete_btn_Type_Bilan_Biologie',function () {

    $('#delete_confirmation_btn_oui').attr('data-id',$(this).data('id'));
    $('#delete_confirmation_btn_oui').attr('data-type',$(this).data('type'));

});
// transfer data to modal edit Type Bilan Biologie
$(document).on('click','td > .edit_big_btn_Type_Bilan_Biologie',function () {

    $('#Type_Bilan_Biologie_id_input').val($(this).data('id'));
    $('#nom_edit_Type_Bilan_Biologie').val($(this).data('nom'));

});





/* transfer Data Type Bilan Radiologie */
// transfer Data to modal Add Type Bilan Radiologie
$(document).on('click','#btn_affiche_Type_Bilan_Radiologie_add_modal',function () {
    $('#input_type_antecedent').val($(this).data('html'));
    $('#title_modal_add_element').text($(this).data('html'));
});
// transfer data to modal delete Type Bilan Radiologie
$(document).on('click','td > .delete_btn_Type_Bilan_Radiologie',function () {
    $('#delete_confirmation_btn_oui').attr('data-id',$(this).data('id'));
    $('#delete_confirmation_btn_oui').attr('data-type',$(this).data('type'));
});
// transfer data to modal edit Type Bilan Radiologie
$(document).on('click','td > .edit_big_btn_Type_Bilan_Radiologie',function () {
    $('#Type_Bilan_Radiologie_id_input').val($(this).data('id'));
    $('#nom_edit_Type_Bilan_Radiologie').val($(this).data('nom'));
});






// Edit Type Bilan Biologie
$("#form_edit_Type_Bilan_Biologie").on('submit',function (e) {
    e.preventDefault();

    var data =$(this).serializeArray();

    $.ajax({
        type:'POST',
        url: 'type-bilan-biologie-edit',
        dataType: 'json',
        data: data,

        success: function (data) {

            if(data.error != null){

                $("#erreur_alert_33").slideDown(200).effect( "shake" );
                setTimeout(function() {
                    $("#erreur_alert_33").effect("bounce").slideUp(200);
                }, 8000);

            }else{


                var t = $('#table_Type_Bilan_Biologie').DataTable();
                // remove past

                t.row("tbody >.Type_Bilan_Biologie"+data.id )
                    .remove()
                    .draw();


                // add new modified

                var row_t = t.row.add([
                    "<a class='btn btn-social-icon btn-xs btn-instagram edit_big_btn_Type_Bilan_Biologie' data-toggle='modal' data-target='#modal_edit_Type_Bilan_Biologie_panel'  data-id='"+data.id+"' data-nom='"+data.nom+"' ><span class='fa fa-edit'></span></a> <a class='btn btn-social-icon btn-xs btn-google btn-lg  delete_btn_Type_Bilan_Biologie' id='delete_btn_Type_Bilan_Biologie' data-id='"+data.id+"' data-type='Type Bilan Biologie' data-toggle='modal' data-target='#modal_delete_confirmation'><span class='fa fa-trash'></span></a>",
                    data.nom

                ]).draw( true )
                    .node();
                $(row_t).addClass('Type_Bilan_Biologie'+data.id);
                $(row_t).children('td').css('text-align','center');


                $('#modal_edit_Type_Bilan_Biologie_panel').modal('toggle');
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

// Edit Type Bilan Radiologie
$("#form_edit_Type_Bilan_Radiologie").on('submit',function (e) {
    e.preventDefault();

    var data =$(this).serializeArray();

    $.ajax({
        type:'POST',
        url: 'type-bilan-radiologie-edit',
        dataType: 'json',
        data: data,

        success: function (data) {

            if(data.error != null){

                $("#erreur_alert_33").slideDown(200).effect( "shake" );
                setTimeout(function() {
                    $("#erreur_alert_33").effect("bounce").slideUp(200);
                }, 8000);

            }else{

                var t = $('#table_Type_Bilan_Radiologie').DataTable();
                // remove past

                t.row("tbody >.Type_Bilan_Radiologie"+data.id )
                    .remove()
                    .draw();


                // add new modified

                var row_t = t.row.add([
                    "<a class='btn btn-social-icon btn-xs btn-instagram edit_big_btn_Type_Bilan_Radiologie' data-toggle='modal' data-target='#modal_edit_Type_Bilan_Radiologie_panel'  data-id='"+data.id+"' data-nom='"+data.nom+"' ><span class='fa fa-edit'></span></a> <a class='btn btn-social-icon btn-xs btn-google btn-lg  delete_btn_Type_Bilan_Radiologie' id='delete_btn_Type_Bilan_Radiologie' data-id='"+data.id+"' data-type='Type Bilan Radiologie' data-toggle='modal' data-target='#modal_delete_confirmation'><span class='fa fa-trash'></span></a>",
                    data.nom

                ]).draw( true )
                    .node();
                $(row_t).addClass('Type_Bilan_Radiologie'+data.id);
                $(row_t).children('td').css('text-align','center');


                $('#modal_edit_Type_Bilan_Radiologie_panel').modal('toggle');
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