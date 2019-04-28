/*  File for Prestataire Add / Edit / Delete big Information with Haitam Ghalem Developed */


// validation add prestataire
$('#form_add_prestataire').validate();
// validation edit prestataire
$('#form_edit_prestataire').validate();


// Add Prestataire get value input

$("#form_add_prestataire").on('submit', function (e) {
    e.preventDefault();

    var data = $(this).serializeArray();

    $.ajax({
        type: 'POST',
        url: 'prestataire-big-store',
        dataType: 'json',
        data: data,

        success: function (data) {

            if (data.error != null) {
                console.log(data);

                $("#erreur_alert_33").slideDown(200);

                setTimeout(function () {
                    $("#erreur_alert_33").slideUp(200);
                }, 10000);

            } else {
                var tel = ' ';
                if ($.trim(data.tel) == 0) {
                    tel = ' ';
                } else {
                    tel = data.tel;
                }

                //$("<tr class='prestataire" + data.id + "'   role='row'><td style='padding: 5px'> <a class='btn btn-social-icon btn-xs btn-instagram edit_big_btn_prestataire' data-toggle='modal' data-target='#modal_edit_prestataire_panel' data-email='" + data.email + "' data-id='" + data.id + "' data-ville='" + data.ville + "' data-tel='" + tel + "' data-nom='" + data.nom + "' data-adresse='" + data.adresse + "'><span class='fa fa-edit'></span></a> <a class='btn btn-social-icon btn-xs btn-google btn-lg  delete_btn_prestataire ' id='delete_btn_prestataire' data-id='" + data.id + "' data-type='prestataire' data-toggle='modal' data-target='#modal_delete_confirmation'><span class='fa fa-trash'></span></a> </td> <td>" + data.nom + "</td> <td>" + data.email + "</td> <td>" + tel + "</td> <td>" + data.adresse + "</td><td>" + data.ville + "</td></tr>").appendTo("#tbody_for_after_add_element");
                var t= $('#table_prestataires').DataTable();
                // add new medicament modifie
                var row_t = t.row.add([
                    "<a class='btn btn-social-icon btn-xs btn-instagram edit_big_btn_prestataire' data-toggle='modal' data-target='#modal_edit_prestataire_panel' data-email='" + data.email + "' data-id='" + data.id + "' data-ville='" + data.ville + "' data-tel='" + tel + "' data-nom='" + data.nom + "' data-adresse='" + data.adresse + "'><span class='fa fa-edit'></span></a><a class='btn btn-social-icon btn-xs btn-google btn-lg  delete_btn_prestataire ' id='delete_btn_prestataire' data-id='" + data.id + "' data-type='prestataire' data-toggle='modal' data-target='#modal_delete_confirmation'><span class='fa fa-trash'></span></a>",

                    data.nom,
                    data.email,
                    tel,
                    data.adresse,
                    data.ville



                ]).draw( true )
                    .node();
                $(row_t).addClass('prestataire'+data.id);
                $(row_t).children('td').css('text-align','center');


                $('#modal_add_prestataire_panel').modal('toggle');
                $("#success_alert_22").slideDown(200);
                setTimeout(function () {
                    $("#success_alert_22").slideUp(200);
                }, 6000);

            }
        },
        error: function (data) {
            $("#erreur_alert_33").slideDown(200);

            setTimeout(function () {
                $("#erreur_alert_33").slideUp(200);
            }, 6000);
        }
    });
});
// Edit Prestataire
$("#form_edit_prestataire").on('submit', function (e) {
    e.preventDefault();

    var data = $(this).serializeArray();
    console.log(data);

    $.ajax({
        type: 'POST',
        url: 'prestataire-big-edit',
        dataType: 'json',
        data: data,

        success: function (data) {

            if (data.error != null) {


                $("#erreur_alert_33").slideDown(200);

                setTimeout(function () {
                    $("#erreur_alert_33").slideUp(200);
                }, 10000);

            } else {

                // remove past prestataire
               // $("tbody >.prestataire" + data.id).remove();
                // add new prestataire modified
                $("<tr class='prestataire" + data.id + "'   role='row'><td style='padding: 5px'> <a class='btn btn-social-icon btn-xs btn-instagram edit_big_btn_prestataire' data-toggle='modal' data-target='#modal_edit_prestataire_panel' data-email='" + data.email + "' data-id='" + data.id + "' data-ville='" + data.ville + "' data-tel='" + tel + "' data-nom='" + data.nom + "' data-adresse='" + data.adresse + "'><span class='fa fa-edit'></span></a> <a class='btn btn-social-icon btn-xs btn-google btn-lg  delete_btn_prestataire ' id='delete_btn_prestataire' data-id='" + data.id + "' data-type='prestataire' data-toggle='modal' data-target='#modal_delete_confirmation'><span class='fa fa-trash'></span></a> </td> <td>" + data.nom + "</td> <td>" + data.email + "</td> <td>" + tel + "</td> <td>" + data.adresse + "</td><td>" + data.ville + "</td></tr>").appendTo("#tbody_for_after_add_element");




                var tel = ' ';
                if ($.trim(data.tel) == 0) {
                    tel = ' ';
                } else {
                    tel = data.tel;
                }
                var t = $('#table_prestataires').DataTable();
                // remove past
                t.row("tbody >.prestataire"+data.id )
                    .remove()
                    .draw();
                // add new medicament modifie


                var row_t = t.row.add([
                    "<a class='btn btn-social-icon btn-xs btn-instagram edit_big_btn_prestataire' data-toggle='modal' data-target='#modal_edit_prestataire_panel' data-email='" + data.email + "' data-id='" + data.id + "' data-ville='" + data.ville + "' data-tel='" + tel + "' data-nom='" + data.nom + "' data-adresse='" + data.adresse + "'><span class='fa fa-edit'></span></a><a class='btn btn-social-icon btn-xs btn-google btn-lg  delete_btn_prestataire ' id='delete_btn_prestataire' data-id='" + data.id + "' data-type='prestataire' data-toggle='modal' data-target='#modal_delete_confirmation'><span class='fa fa-trash'></span></a>",

                    data.nom,
                    data.email,
                    tel,
                    data.adresse,
                    data.ville



                ]).draw( true )
                    .node();
                $(row_t).addClass('prestataire'+data.id);
                $(row_t).children('td').css('text-align','center');




                $('#modal_edit_prestataire_panel').modal('toggle');
                $("#success_alert_22").slideDown(200);
                setTimeout(function () {
                    $("#success_alert_22").slideUp(200);
                }, 6000);

            }
        },
        error: function (data) {
            $("#erreur_alert_33").slideDown(200);

            setTimeout(function () {
                $("#erreur_alert_33").slideUp(200);
            }, 6000);
        }
    });
});


// transfer data to model delete Prestataire

$(document).on('click', 'td > .delete_btn_prestataire', function () {

    $('#delete_confirmation_btn_oui').attr('data-id', $(this).data('id'));
    $('#delete_confirmation_btn_oui').attr('data-type', $(this).data('type'));
    // la suite du code dur le modal delete et sur le fichier js rendez_vous . Merci [ #delete_confirmation_btn_oui ]
});
// transfer data to model edit Prestataire

$(document).on('click', 'td > .edit_big_btn_prestataire', function () {

    $('#prestataire_id_input').val($(this).data('id'));
    $('#nom_edit_prestataire').val($(this).data('nom'));
    $('#email_edit_prestataire').val($(this).data('email'));
    $('#tel_edit_prestataire').val($(this).data('tel'));
    $('#ville_edit_prestataire').val($(this).data('ville'));
    $('#adresse_edit_prestataire').val($(this).data('adresse'));

});

