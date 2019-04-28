

/* Transfer Data Medicament */
// transfer data to modal delete Medicament
$(document).on('click','td > .delete_btn_medicament',function () {

    $('#delete_confirmation_btn_oui').attr('data-id',$(this).data('id'));
    $('#delete_confirmation_btn_oui').attr('data-type',$(this).data('type'));
    // la suite du code dur le modal delete et sur le fichier js rendez_vous . Merci [ #delete_confirmation_btn_oui ]
});

// transfer data to modal edit Medicament
$(document).on('click','td > .edit_big_btn_medicament',function () {

    $('#medicament_id_input').val($(this).data('id'));
    $('#code_big_edit_medicament').val($(this).data('code'));
    $('#dci1_big_edit_medicament').val($(this).data('dci1'));
    $('#nom_edit_medicament').val($(this).data('nom'));
    $('#dosage1_big_edit_medicament').val($(this).data('dosage1'));
    $('#unite_dosage1_big_edit_medicament').val($(this).data('unite_dosage1'));
    $('#forme_big_edit_medicament').val($(this).data('forme'));
    $('#presentation_big_edit_medicament').val($(this).data('presentation'));
    $('#ppv_big_edit_medicament').val($(this).data('ppv'));
    $('#ph_big_edit_medicament').val($(this).data('ph'));
    $('#prix_br_big_edit_medicament').val($(this).data('prix_br'));
    $('#Princeps_generiqueique_big_edit_medicament').val($(this).data('princeps_generique'));
    $('#taux_remboursement_big_edit_medicament').val($(this).data('taux_remboursement'));

    /*
     data-code
     data-dci1='"+data.dci1+"'
     data-dosage1='"+data.dosage1+"'
     data-unite_dosage1='"+data.unite_dosage1+"'
     data-forme='"+data.forme+"'
     data-presentation='"+data.presentation+"'
     data-ppv='"+data.ppv+"'
     data-ph='"+data.ph+"'
     data-prix_br='"+data.prix_br+"'
     data-princeps_generique='"+data.princeps_generique+"'
     data-taux_remboursement='"+data.taux_remboursement+"'
     */
});




// Big Add  Medicament
$("#form_big_add_medicament").on('submit',function (e) {
    e.preventDefault();

    var data =$(this).serializeArray();


    $.ajax({
        type:'POST',
        url: 'add-big-medicament',
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
                //$("tbody >.medicament"+data.id).remove();

                // add new medicament modified
                //$("<tr class='medicament"+data.id+"' role='row'><td style='padding: 5px'> <a class='btn btn-social-icon btn-xs btn-instagram edit_big_btn_medicament' data-toggle='modal' data-target='#modal_edit_medicament_panel'  data-id='"+data.id+"' data-code='"+data.code+"' data-nom='"+data.nom+"'  data-dci1='"+data.dci1+"' data-dosage1='"+data.dosage1+"' data-unite_dosage1='"+data.unite_dosage1+"' data-forme='"+data.forme+"' data-presentation='"+data.presentation+"' data-ppv='"+data.ppv+"' data-ph='"+data.ph+"' data-prix_br='"+data.prix_br+"' data-princeps_generique='"+data.princeps_generique+"' data-taux_remboursement='"+data.taux_remboursement+"'    ><span class='fa fa-edit'></span></a> <a class='btn btn-social-icon btn-xs btn-google btn-lg  delete_btn_medicament ' id='delete_btn_medicament' data-id='"+data.id+"' data-type='medicament' data-toggle='modal' data-target='#modal_delete_confirmation'><span class='fa fa-trash'></span></a> </td> <td style='text-align: center'>"+data.code+"</td><td style='text-align: center'>"+data.nom+"</td> <td style='text-align: center'>"+data.dci1+"</td> <td style='text-align: center'>"+data.dosage1+"</td> <td style='text-align: center'>"+data.unite_dosage1+"</td> <td style='text-align: center'>"+data.forme+"</td> <td style='text-align: center'>"+data.presentation+"</td> <td style='text-align: center'>"+data.ppv+"</td> <td style='text-align: center'>"+data.ph+"</td> <td style='text-align: center'>"+data.prix_br+"</td> <td style='text-align: center'>"+data.princeps_generique+"</td> <td style='text-align: center'>"+data.taux_remboursement+"</td> </tr>").insertAfter("#tbody_for_after_add_element_medicament");

                /*
                 data-dci1='"+data.dci1+"'
                 data-dosage1='"+data.dosage1+"'
                 data-unite_dosage1='"+data.unite_dosage1+"'
                 data-forme='"+data.forme+"'
                 data-presentation='"+data.presentation+"'
                 data-ppv='"+data.ppv+"'
                 data-ph='"+data.ph+"'
                 data-prix_br='"+data.prix_br+"'
                 data-princeps_generique='"+data.princeps_generique+"'
                 data-taux_remboursement='"+data.taux_remboursement+"'
                 */
                // add element in the table

                var t = $('#table_medicament').DataTable();

                var row_t = t.row.add([
                    "<a class='btn btn-social-icon btn-xs btn-instagram edit_big_btn_medicament ' data-toggle='modal' data-target='#modal_edit_medicament_panel'  data-id='"+data.id+"' data-code='"+data.code+"' data-nom='"+data.nom+"'  data-dci1='"+data.dci1+"'data-dosage1='"+data.dosage1+"'data-unite_dosage1='"+data.unite_dosage1+"'data-forme='"+data.forme+"'data-presentation='"+data.presentation+"'data-ppv='"+data.ppv+"'data-ph='"+data.ph+"'data-prix_br='"+data.prix_br+"'data-princeps_generique='"+data.princeps_generique+"'data-taux_remboursement='"+data.taux_remboursement+"' ><span class='fa fa-edit'></span></a> <a class='btn btn-social-icon btn-xs btn-google btn-lg  delete_btn_medicament  push_class_"+data.id+"' id='delete_btn_medicament' data-id='"+data.id+"' data-type='medicament' data-toggle='modal' data-target='#modal_delete_confirmation'><span class='fa fa-trash'></span></a>",
                    data.code,
                    data.nom,
                    data.dci1,
                    data.dosage1,
                    data.unite_dosage1,
                    data.forme,
                    data.presentation,
                    data.ppv,
                    data.ph,
                    data.prix_br,
                    data.princeps_generique,
                    data.taux_remboursement,
                    data.princeps_generique,
                    data.taux_remboursement

                ]).draw( true )
                    .node();
                $(row_t).addClass('medicament'+data.id);
                $(row_t).children('td').css('text-align','center');

                $('#modal_big_add_medicament_panel').modal('toggle');
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

// Edit Medicament
$("#form_edit_medicament").on('submit',function (e) {
    e.preventDefault();

    var data =$(this).serializeArray();


    $.ajax({
        type:'POST',
        url: 'medicament-edit',
        dataType: 'json',
        data: data,

        success: function (data) {

            if(data.error != null){

                $("#erreur_alert_33").slideDown(200).effect( "shake" );
                setTimeout(function() {
                    $("#erreur_alert_33").effect("bounce").slideUp(200);
                }, 8000);

            }else{
                var t = $('#table_medicament').DataTable();
                // remove past

                t.row("tbody >.medicament"+data.id )
                    .remove()
                    .draw();


                // add new medicament modified

                var row_t = t.row.add([
                    "<a class='btn btn-social-icon btn-xs btn-instagram edit_big_btn_medicament ' data-toggle='modal' data-target='#modal_edit_medicament_panel'  data-id='"+data.id+"' data-code='"+data.code+"' data-nom='"+data.nom+"'  data-dci1='"+data.dci1+"'data-dosage1='"+data.dosage1+"'data-unite_dosage1='"+data.unite_dosage1+"'data-forme='"+data.forme+"'data-presentation='"+data.presentation+"'data-ppv='"+data.ppv+"'data-ph='"+data.ph+"'data-prix_br='"+data.prix_br+"'data-princeps_generique='"+data.princeps_generique+"'data-taux_remboursement='"+data.taux_remboursement+"' ><span class='fa fa-edit'></span></a> <a class='btn btn-social-icon btn-xs btn-google btn-lg  delete_btn_medicament  push_class_"+data.id+"' id='delete_btn_medicament' data-id='"+data.id+"' data-type='medicament' data-toggle='modal' data-target='#modal_delete_confirmation'><span class='fa fa-trash'></span></a>",
                    data.code,
                    data.nom,
                    data.dci1,
                    data.dosage1,
                    data.unite_dosage1,
                    data.forme,
                    data.presentation,
                    data.ppv,
                    data.ph,
                    data.prix_br,
                    data.princeps_generique,
                    data.taux_remboursement,
                    data.princeps_generique,
                    data.taux_remboursement

                ]).draw( true )
                    .node();
                $(row_t).addClass('medicament'+data.id);
                $(row_t).children('td').css('text-align','center');


                $('#modal_edit_medicament_panel').modal('toggle');
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

