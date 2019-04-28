$(".click_show_consultation").on('click', function () {
    var patient_rendez_vous_id = $.trim($(this).parent('.click_show').data('id'));
    var patient_rendez_vous_date = $.trim($(this).parent('.click_show').data('date'));
    var patient_rendez_vous_nom_prenom = $.trim($(this).parent('.click_show').data('nomp'));
    var patient_rendez_vous_type_motif = $.trim($(this).parent('.click_show').data('motif'));
    var patient_id_rendez = $.trim($(this).parent('.click_show').data('id-patient'));

    $(".input_with_id_rendez_vous_save_all").val(patient_rendez_vous_id);

    $("#nom_patient_consultation").text(patient_rendez_vous_nom_prenom);
    $("#date_patient_consultation").text(patient_rendez_vous_date);
    $("#type_motif_patient_consultation").text(patient_rendez_vous_type_motif);

    $(".patient_id_consultation").val(patient_id_rendez);


    // clear all resource

    $(".clear_all").each(function () {
        $(this).remove();
    });

    $(".click_edit_delete").each(function () {
        $(this).remove();
    });

    /* fin clear all resource */

    // show button save for bilan
    $("#save_radiologie_show").show();
    $("#save_biologie_show").show();

    // ajax delete others consultaton not completed
    $.get('consultation-delete', function (data) {
        // success data

        if (data.error != null) {

            $("#erreur_alert_33").slideDown(200);

            setTimeout(function () {
                $("#erreur_alert_33").slideUp(200);
            }, 10000);

        } else {
            // ajax for creating new consultation
            // show button save for bilan
            $("#save_radiologie_show").show();
            $("#save_biologie_show").show();

            $.get('consultation-new?id=' + patient_id_rendez + '&type=' + patient_rendez_vous_type_motif, function (data) {
                // success data

                if (data.error != null) {

                    $("#erreur_alert_33").slideDown(200);

                    setTimeout(function () {
                        $("#erreur_alert_33").slideUp(200);
                    }, 10000);

                } else {
                    var patient_id_consultation = patient_id_rendez;


                    //get antecedent familiaux patient
                    $.get('antecedent-search?id=' + patient_id_consultation + '&antecedent=Familiaux', function (data) {
                        // success data

                        if (data.error != null) {


                            $("#erreur_alert_33").slideDown(200);
                            setTimeout(function () {
                                $("#erreur_alert_33").slideUp(200);
                            }, 10000);

                        } else {

                            var all_elementt = data.antecedent_familiaux;

                            if (data.antecedent_familiaux_patient.length != 0) {

                                $.each(data.antecedent_familiaux_patient, function (index, itemData) {


                                    var description_antecedent = itemData;


                                    // #familiaux-input
                                    setTimeout(function () {
                                        $("<div class='row'><div class='form-group col-md-4 col-xs-offset-1'><select id='select_familiaux_list'  class='form-control familiaux-list select_familiaux_list_" + itemData.id + "' name='nom_familiaux[]' > </select></div><span class='ti-share col-md-1 add-new-select-element-familiaux' data-html='familiaux' data-toggle='modal' data-target='#modal_add_element' style='padding-left: 0px;line-height: 2'></span> <input class='form-control col-md-2' name='description_familiaux[]' type='text' style='width: 40%' value='" + itemData.description + "'><span class='di di-trash col-md-1 delete-antecedent' style='padding-left: 0px;line-height: 2'></span></div>").insertBefore('#familiaux-input');
                                    }, 1000);


                                    $.get('get-name-element-selected?nom_element_id=' + itemData.nom_element_id, function (data) {


                                        if (data.nom != null) {

                                            $.each(all_elementt, function (index, element) {

                                                if (element.nom == data.nom) {
                                                    setTimeout(function () {
                                                        $('<option value="' + element.nom + '" selected>' + element.nom + '</option>').appendTo('.select_familiaux_list_' + description_antecedent.id);

                                                    }, 1000);

                                                } else {
                                                    setTimeout(function () {
                                                        $('<option value="' + element.nom + '">' + element.nom + '</option>').appendTo('.select_familiaux_list_' + description_antecedent.id);
                                                    }, 1000);
                                                }
                                            })

                                        } else {

                                        }
                                    })
                                });
                            }

                        }
                    });

                    //get antecedent medicaux patient
                    $.get('antecedent-search?id=' + patient_id_consultation + '&antecedent=Medicaux', function (data) {
                        // success data

                        if (data.error != null) {

                            $("#erreur_alert_33").slideDown(200);
                            setTimeout(function () {
                                $("#erreur_alert_33").slideUp(200);
                            }, 10000);

                        } else {

                            var all_elementt = data.antecedent_familiaux;

                            if (data.antecedent_familiaux_patient.length != 0) {

                                $.each(data.antecedent_familiaux_patient, function (index, itemData) {

                                    var description_antecedent = itemData;


                                    // #familiaux-input
                                    setTimeout(function () {
                                        $("<div class='row'><div class='form-group col-md-4 col-xs-offset-1' id='div-select'><select id='select_medicaux_list' class='form-control medicaux-list select_medicaux_list_" + itemData.id + " select-familiaux' name='nom_medicaux[]'></select></div><span class='ti-share col-md-1 add-new-select-element-familiaux' data-html='Medicaux' data-toggle='modal' data-target='#modal_add_element' style='padding-left: 0px;line-height: 2' ></span><input class='form-control col-md-2' name='description_medicaux[]' type='text' value='" + itemData.description + "' style='width: 40%'><span class='di di-trash col-md-1 delete-antecedent'  style='padding-left: 0px;line-height: 2'></span></div>").insertBefore('#medicaux-input');
                                    }, 1000);


                                    $.get('get-name-element-selected?nom_element_id=' + itemData.nom_element_id, function (data) {


                                        if (data.nom != null) {

                                            $.each(all_elementt, function (index, element) {

                                                if (element.nom == data.nom) {
                                                    setTimeout(function () {
                                                        $('<option value="' + element.nom + '" selected>' + element.nom + '</option>').appendTo('.select_medicaux_list_' + description_antecedent.id);

                                                    }, 1000);

                                                } else {
                                                    setTimeout(function () {
                                                        $('<option value="' + element.nom + '">' + element.nom + '</option>').appendTo('.select_medicaux_list_' + description_antecedent.id);
                                                    }, 1000);
                                                }
                                            })

                                        } else {

                                        }
                                    })
                                });
                            }

                        }
                    });

                    //get antecedent Habitudes alcoolo-tabagique select_habitudes_list
                    $.get('antecedent-search?id=' + patient_id_consultation + '&antecedent=Habitudes alcoolo-tabagique', function (data) {
                        // success data

                        if (data.error != null) {

                            $("#erreur_alert_33").slideDown(200);
                            setTimeout(function () {
                                $("#erreur_alert_33").slideUp(200);
                            }, 10000);

                        } else {

                            var all_elementt = data.antecedent_familiaux;

                            if (data.antecedent_familiaux_patient.length != 0) {

                                $.each(data.antecedent_familiaux_patient, function (index, itemData) {

                                    var description_antecedent = itemData;


                                    // #familiaux-input
                                    setTimeout(function () {
                                        $("<div class='row'><div class='form-group col-md-4 col-xs-offset-1' id='div-select'><select id='select_habitudes_list' class='form-control habitude-list  select_habitudes_list_" + itemData.id + " select-familiaux' name='nom_habitude[]'></select></div><span class='ti-share col-md-1 add-new-select-element-familiaux' data-html='Habitudes alcoolo-tabagique' data-toggle='modal' data-target='#modal_add_element' style='padding-left: 0px;line-height: 2' ></span><input class='form-control col-md-2' name='description_habitude[]' type='text' value='" + itemData.description + "' style='width: 40%'><span class='di di-trash col-md-1 delete-antecedent'  style='padding-left: 0px;line-height: 2'></span></div>").insertBefore('#habitudes-input');

                                    }, 1000);


                                    $.get('get-name-element-selected?nom_element_id=' + itemData.nom_element_id, function (data) {


                                        if (data.nom != null) {

                                            $.each(all_elementt, function (index, element) {

                                                if (element.nom == data.nom) {
                                                    setTimeout(function () {
                                                        $('<option value="' + element.nom + '" selected>' + element.nom + '</option>').appendTo('.select_habitudes_list_' + description_antecedent.id);

                                                    }, 1000);

                                                } else {
                                                    setTimeout(function () {
                                                        $('<option value="' + element.nom + '">' + element.nom + '</option>').appendTo('.select_habitudes_list_' + description_antecedent.id);
                                                    }, 1000);
                                                }
                                            })

                                        } else {

                                        }
                                    })
                                });
                            }

                        }
                    });

                    //get antecedent Chirurgicaux,Complications select_chirurgicaux_list

                    $.get('antecedent-search?id=' + patient_id_consultation + '&antecedent=Chirurgicaux,Complications', function (data) {
                        // success data

                        if (data.error != null) {

                            $("#erreur_alert_33").slideDown(200);
                            setTimeout(function () {
                                $("#erreur_alert_33").slideUp(200);
                            }, 10000);

                        } else {

                            var all_elementt = data.antecedent_familiaux;

                            if (data.antecedent_familiaux_patient.length != 0) {

                                $.each(data.antecedent_familiaux_patient, function (index, itemData) {

                                    var description_antecedent = itemData;


                                    // #familiaux-input
                                    setTimeout(function () {
                                        $("<div class='row'><div class='form-group col-md-4 col-xs-offset-1' id='div-select'><select id='select_chirurgicaux_list' class='form-control complications-list select_chirurgicaux_list_" + itemData.id + " select-familiaux' name='nom_complications[]'></select></div><span class='ti-share col-md-1 add-new-select-element-familiaux' data-html='Chirurgicaux,Complications' data-toggle='modal' data-target='#modal_add_element' style='padding-left: 0px;line-height: 2' ></span><input class='form-control col-md-2' name='description_complications[]' value='" + itemData.description + "' type='text' style='width: 40%'><span class='di di-trash col-md-1 delete-antecedent'  style='padding-left: 0px;line-height: 2'></span></div>").insertBefore('#chirurgicaux-input');

                                    }, 1000);


                                    $.get('get-name-element-selected?nom_element_id=' + itemData.nom_element_id, function (data) {


                                        if (data.nom != null) {

                                            $.each(all_elementt, function (index, element) {

                                                if (element.nom == data.nom) {
                                                    setTimeout(function () {
                                                        $('<option value="' + element.nom + '" selected>' + element.nom + '</option>').appendTo('.select_chirurgicaux_list_' + description_antecedent.id);

                                                    }, 1000);


                                                } else {
                                                    setTimeout(function () {
                                                        $('<option value="' + element.nom + '">' + element.nom + '</option>').appendTo('.select_chirurgicaux_list_' + description_antecedent.id);
                                                    }, 1000);
                                                }
                                            })

                                        } else {

                                        }
                                    })
                                });
                            }
                        }
                    });


                    $('#consultation_id').text(data.id);
                    $('#consultation_id').attr('data-id', data.id);
                    $('.consultation_id_input').val(data.id);

                    setTimeout(function () {
                        $("#rendez-vous-panel").hide();
                        $("#consultation-list-panel").hide();
                        $("#rendez-vous-consultation-panel").show();

                    }, 3000);


                }

            });
        }
    });


});


/*
 var template = ' <div class="form-group category-select-container"> '+
 '<label class="col-md-3 col-xs-12 control-label ">Matiere </label>'+
 ' <div class="col-md-9"> '+
 ' <div class="col-md-5  col-xs-6 "> '+
 '{ !! Form::select('list_matiere[]',$list_matiere,null,[ 'class'=>'form-control  select ' ]) !!}'+
 ' </div>'+
 ' <div class="col-md-4"> '+
 ' <a class="btn btn-danger btn-rounded btn-condensed btn-sm btn-remove"> <span class="fa fa-times"></span> </a> '+
 ' </div></div></div>';
 */
$('.btn-add-familiaux-select').on('click', function (e) {
    e.preventDefault();
    $('#first').before(template);

});
$(document).on('click', '.btn-remove', function (e) {
    e.preventDefault();
    $(this).parents('.category-select-container').remove();
});

/*
 var testimonialElements = $(".testimonial");
 for(var i=0; i<testimonialElements.length; i++){
 var element = testimonialElements.eq(i);
 //do something with element
 }
 */


$(".Ajouter-un-element").on('click', function (e) {
    e.preventDefault();

    $.ajaxSetup({
        headers: {
            'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var nom_type_antecedent = $(this).data('type');
    var ajouter_un_element = $(this);
    var get_parent_for_insert = $(this).parent('.top-class-element-antecedent');
    var take_my_element_h4 = get_parent_for_insert.find('.insert-parent-element');

    if (nom_type_antecedent == 'Familiaux') {
        // ajax for geting element_type

        $.get('antecedent-charge?id=' + nom_type_antecedent, function (data) {
            // success data
            $("<div class='row clear_all'><div class='form-group col-md-4 col-xs-offset-1'><select id='select_familiaux_list'  class='form-control familiaux-list' name='nom_familiaux[]' ></select></div><span class='ti-share col-md-1 add-new-select-element-familiaux' data-html='familiaux' data-toggle='modal' data-target='#modal_add_element' style='padding-left: 0px;line-height: 2'></span> <input class='form-control col-md-2' name='description_familiaux[]' type='text' style='width: 40%'><span class='di di-trash col-md-1 delete-antecedent' style='padding-left: 0px;line-height: 2'></span></div>").insertBefore(ajouter_un_element);

            $.each(data, function (index, reponse) {

                //  $('<option value="'+reponse.nom+'">'+reponse.nom+'</option>').append($(".familiaux-list" ).last());
                $($(".familiaux-list").last()).append('<option value="' + reponse.nom + '">' + reponse.nom + '</option>');

            });
        });

    } else if (nom_type_antecedent == 'Medicaux') {

        // ajax for geting element_type

        $.get('antecedent-charge?id=' + nom_type_antecedent, function (data) {
            // success data
            $("<div class='row clear_all'><div class='form-group col-md-4 col-xs-offset-1' id='div-select'><select class='form-control medicaux-list select-familiaux' id='select_medicaux_list' name='nom_medicaux[]'></select></div><span class='ti-share col-md-1 add-new-select-element-familiaux' data-html='Medicaux' data-toggle='modal' data-target='#modal_add_element' style='padding-left: 0px;line-height: 2' ></span><input class='form-control col-md-2' name='description_medicaux[]' type='text' style='width: 40%'><span class='di di-trash col-md-1 delete-antecedent'  style='padding-left: 0px;line-height: 2'></span></div>").insertBefore(ajouter_un_element);

            $.each(data, function (index, reponse) {

                //  $('<option value="'+reponse.nom+'">'+reponse.nom+'</option>').append($(".familiaux-list" ).last());
                $($(".medicaux-list").last()).append('<option value="' + reponse.nom + '">' + reponse.nom + '</option>');


            });
        });

    } else if (nom_type_antecedent == 'Habitudes alcoolo-tabagique') {

        // ajax for geting element_type

        $.get('antecedent-charge?id=' + nom_type_antecedent, function (data) {
            // success data
            $("<div class='row clear_all'><div class='form-group col-md-4 col-xs-offset-1' id='div-select'><select class='form-control habitude-list select-familiaux' name='nom_habitude[]'></select></div><span class='ti-share col-md-1 add-new-select-element-familiaux' data-html='Habitudes alcoolo-tabagique' data-toggle='modal' data-target='#modal_add_element' style='padding-left: 0px;line-height: 2' ></span><input class='form-control col-md-2' name='description_habitude[]' type='text' style='width: 40%'><span class='di di-trash col-md-1 delete-antecedent'  style='padding-left: 0px;line-height: 2'></span></div>").insertBefore(ajouter_un_element);

            $.each(data, function (index, reponse) {

                //  $('<option value="'+reponse.nom+'">'+reponse.nom+'</option>').append($(".familiaux-list" ).last());
                $($(".habitude-list").last()).append('<option value="' + reponse.nom + '">' + reponse.nom + '</option>');


            });
        });

    } else if (nom_type_antecedent == 'Chirurgicaux,Complications') {

        // ajax for geting element_type

        $.get('antecedent-charge?id=' + nom_type_antecedent, function (data) {
            // success data
            $("<div class='row clear_all'><div class='form-group col-md-4 col-xs-offset-1' id='div-select'><select id='select_chirurgicaux_list' class='form-control complications-list select-familiaux' name='nom_complications[]'></select></div><span class='ti-share col-md-1 add-new-select-element-familiaux' data-html='Chirurgicaux,Complications' data-toggle='modal' data-target='#modal_add_element' style='padding-left: 0px;line-height: 2' ></span><input class='form-control col-md-2' name='description_complications[]' type='text' style='width: 40%'><span class='di di-trash col-md-1 delete-antecedent'  style='padding-left: 0px;line-height: 2'></span></div>").insertBefore(ajouter_un_element);

            $.each(data, function (index, reponse) {

                //  $('<option value="'+reponse.nom+'">'+reponse.nom+'</option>').append($(".familiaux-list" ).last());
                $($(".complications-list").last()).append('<option value="' + reponse.nom + '">' + reponse.nom + '</option>');


            });
        });

    } else if (nom_type_antecedent == 'Motif_Consultation') {
        // ajax for geting element_type

        $.get('motif-consultation-charge', function (data) {
            // success data
            $("<div class='row clear_all'><div class='form-group col-md-4 col-xs-offset-1'><select id='select_motif_consultation_list' class='form-control familiaux-list' name='nom_motif_consultation[]' ></select></div><span class='ti-share col-md-1 add-new-select-element-familiaux' data-html='Motif Consultation' data-toggle='modal' data-target='#modal_add_element' style='padding-left: 0px;line-height: 2'></span> <input class='form-control col-md-2' name='description_motif_consultation[]' type='text' style='width: 40%'><span class='di di-trash col-md-1 delete-antecedent' style='padding-left: 0px;line-height: 2'></span></div>").insertBefore(ajouter_un_element);

            $.each(data, function (index, reponse) {

                $($(".familiaux-list").last()).append('<option value="' + reponse.nom + '">' + reponse.nom + '</option>');

            });
        });

    } else if (nom_type_antecedent == 'Par Appareil') {
        $.get('examan-clinique-par-appareil-charge', function (data) {

            // success data
            $("<div class='row clear_all'><div class='form-group col-md-4 col-xs-offset-1'><select id='select_par_appareil_list' class='form-control familiaux-list' name='nom_par_appareil[]' ></select></div><span class='ti-share col-md-1 add-new-select-element-familiaux' data-html='Par Appareil' data-toggle='modal' data-target='#modal_add_element' style='padding-left: 0px;line-height: 2'></span> <input class='form-control col-md-2' name='description_par_appareil[]' type='text' style='width: 40%'><span class='di di-trash col-md-1 delete-antecedent' style='padding-left: 0px;line-height: 2'></span></div>").insertBefore(ajouter_un_element);

            $.each(data, function (index, reponse) {

                $($(".familiaux-list").last()).append('<option value="' + reponse.nom + '">' + reponse.nom + '</option>');

            });
        });
    } else if (nom_type_antecedent == 'General') {
        $.get('examan-clinique-general-charge', function (data) {

            // success data
            $("<div class='row clear_all'><div class='form-group col-md-4 col-xs-offset-1'><select id='select_general_list' class='form-control general-list' name='nom_general[]' ></select></div><span class='ti-share col-md-1 add-new-select-element-familiaux' data-html='General' data-toggle='modal' data-target='#modal_add_element' style='padding-left: 0px;line-height: 2'></span> <input class='form-control col-md-2' name='description_general[]' type='text' style='width: 40%'><span class='di di-trash col-md-1 delete-antecedent' style='padding-left: 0px;line-height: 2'></span></div>").insertBefore(ajouter_un_element);

            $.each(data, function (index, reponse) {

                $($(".general-list").last()).append('<option value="' + reponse.nom + '">' + reponse.nom + '</option>');

            });
        });
    } else if (nom_type_antecedent == 'Biologie') {
        $.get('bilan-paraclinique-biologie-charge', function (data) {

            // success data
            $("<div class='row clear_all'><div class='form-group col-md-4 col-xs-offset-1'><select id='select_bilan_biologie_list' class='form-control biologie-list' name='nom_biologie[]' ></select></div><span class='ti-share col-md-1 add-new-select-element-familiaux' data-html='Biologie' data-toggle='modal' data-target='#modal_add_element' style='padding-left: 0px;line-height: 2'></span> <input class='form-control col-md-2' name='description_biologie[]' type='text' style='width: 40%'><span class='di di-trash col-md-1 delete-antecedent' style='padding-left: 0px;line-height: 2'></span></div>").insertBefore(ajouter_un_element);

            $.each(data, function (index, reponse) {

                $($(".biologie-list").last()).append('<option value="' + reponse.nom + '">' + reponse.nom + '</option>');

            });
        });
    } else if (nom_type_antecedent == 'Radiologie') {
        $.get('bilan-paraclinique-radiologie-charge', function (data) {

            // success data
            $("<div class='row clear_all'><div class='form-group col-md-4 col-xs-offset-1'><select id='select_bilan_radiologie_list' class='form-control radiologie-list' name='nom_radiologie[]' ></select></div><span class='ti-share col-md-1 add-new-select-element-familiaux' data-html='Radiologie' data-toggle='modal' data-target='#modal_add_element' style='padding-left: 0px;line-height: 2'></span> <input class='form-control col-md-2' name='description_radiologie[]' type='text' style='width: 40%'><span class='di di-trash col-md-1 delete-antecedent' style='padding-left: 0px;line-height: 2'></span></div>").insertBefore(ajouter_un_element);

            $.each(data, function (index, reponse) {

                $($(".radiologie-list").last()).append('<option value="' + reponse.nom + '">' + reponse.nom + '</option>');

            });
        });
    }

});


$(document).on('click', 'span.add-new-select-element-familiaux', function () {

    $('#title_modal_add_element').text($(this).data('html'));
    $('#input_type_antecedent').val($(this).data('html'));
});


// ajax add element

$("#save-add-element").on('submit', function (e) {
    e.preventDefault();

    $.ajaxSetup({
        headers: {
            'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var data = $(this).serializeArray();
    var data2 = $(this).serializeArray();

    if (data[1]['value'] == "Motif Consultation") {

        $.ajax({
            type: 'POST',
            url: 'elements-add-motif-consultation',
            dataType: 'json',
            data: data,

            success: function (data) {

                // add new modified
                var t_motif_con = $('#table_motif_consultation').DataTable();
                var row_t_m = t_motif_con.row.add([
                    "<a class='btn btn-social-icon btn-xs btn-instagram edit_big_btn_Motif_Consultation' data-toggle='modal' data-target='#modal_edit_Motif_Consultation_panel'  data-id='"+data.id+"' data-nom='"+data.nom+"' ><span class='fa fa-edit'></span></a> <a class='btn btn-social-icon btn-xs btn-google btn-lg  delete_btn_Motif_Consultation' id='delete_btn_Motif_Consultation' data-id='"+data.id+"' data-type='Motif Consultation' data-toggle='modal' data-target='#modal_delete_confirmation'><span class='fa fa-trash'></span></a>",
                    data.nom

                ]).draw( true )
                    .node();
                $(row_t_m).addClass('Motif_Consultation'+data.id);
                $(row_t_m).children('td').css('text-align','center');



                $('#modal_add_element').modal('toggle');
                $("#success_alert_22").slideDown(200);
                setTimeout(function () {
                    $("#success_alert_22").slideUp(200);
                }, 6000);
            },
            error: function (data) {

                $("#success_alert_22").slideDown(200);
                setTimeout(function () {
                    $("#success_alert_22").slideUp(200);
                }, 6000);
            }
        });

    } else if (data[1]['value'] == "General" || data[1]['value'] == "Par Appareil") {
        // add element for list general or Par Appareil in Examan Clinique

        $.ajax({
            type: 'POST',
            url: 'elements-add-exament-clinique-consultation',

            dataType: 'json',
            data: data,

            success: function (data) {

                if (data.error != null) {


                    $("#erreur_alert_33").slideDown(200);

                    setTimeout(function () {
                        $("#erreur_alert_33").slideUp(200);
                    }, 10000);

                } else {
                    if(data2[1]['value'] == "General"){
                        var t_e_g = $('#table_Examan_General').DataTable();

                        // add new modified

                        var row_t_e_g = t_e_g.row.add([
                            "<a class='btn btn-social-icon btn-xs btn-instagram edit_big_btn_Examan_General' data-toggle='modal' data-target='#modal_edit_Examan_General_panel'  data-id='"+data.id+"' data-nom='"+data.nom+"' ><span class='fa fa-edit'></span></a> <a class='btn btn-social-icon btn-xs btn-google btn-lg  delete_btn_Examan_General' id='delete_btn_Examan_General' data-id='"+data.id+"' data-type='General' data-toggle='modal' data-target='#modal_delete_confirmation'><span class='fa fa-trash'></span></a>",
                            data.nom

                        ]).draw( true )
                            .node();
                        $(row_t_e_g).addClass('Examan_General'+data.id);
                        $(row_t_e_g).children('td').css('text-align','center');

                    }else if(data2[1]['value'] == "Par Appareil"){

                        // add new modified
                        var t_e_p_a = $('#table_Examan_Par_Appareil').DataTable();
                        var row_t_e_p_a = t_e_p_a.row.add([
                            "<a class='btn btn-social-icon btn-xs btn-instagram edit_big_btn_Examan_Par_Appareil' data-toggle='modal' data-target='#modal_edit_Examan_Par_Appareil_panel'  data-id='"+data.id+"' data-nom='"+data.nom+"' ><span class='fa fa-edit'></span></a> <a class='btn btn-social-icon btn-xs btn-google btn-lg  delete_btn_Examan_Par_Appareil' id='delete_btn_Examan_Par_Appareil' data-id='"+data.id+"' data-type='Par Appareil' data-toggle='modal' data-target='#modal_delete_confirmation'><span class='fa fa-trash'></span></a>",
                            data.nom

                        ]).draw( true )
                            .node();
                        $(row_t_e_p_a).addClass('Examan_Par_Appareil'+data.id);
                        $(row_t_e_p_a).children('td').css('text-align','center');
                    }

                    $('#modal_add_element').modal('toggle');
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
                }, 10000);
            }
        });


    } else if (data[1]['value'] == "Biologie" || data[1]['value'] == "Radiologie") {

        // add element for list Biologie or Radiologie in BilanParaclinique

        $.ajax({
            type: 'POST',
            url: 'elements-add-bilan-paraclinique-consultation',

            dataType: 'json',
            data: data,

            success: function (data) {


                if (data.error != null) {


                    $("#erreur_alert_33").slideDown(200);

                    setTimeout(function () {
                        $("#erreur_alert_33").slideUp(200);
                    }, 10000);

                } else {

                    if(data2[1]['value'] == "Biologie"){
                        // add new modified

                        var t_b_b = $('#table_Bilan_Paraclinique_Biologie').DataTable();
                        var row_t_b_b = t_b_b.row.add([
                            "<a class='btn btn-social-icon btn-xs btn-instagram edit_big_btn_Bilan_Biologie' data-toggle='modal' data-target='#modal_edit_Bilan_Biologie_panel'  data-id='"+data.id+"' data-nom='"+data.nom+"' ><span class='fa fa-edit'></span></a> <a class='btn btn-social-icon btn-xs btn-google btn-lg  delete_btn_Bilan_Biologie' id='delete_btn_Bilan_Biologie' data-id='"+data.id+"' data-type='Biologie' data-toggle='modal' data-target='#modal_delete_confirmation'><span class='fa fa-trash'></span></a>",
                            data.nom

                        ]).draw( true )
                            .node();
                        $(row_t_b_b).addClass('Bilan_Biologie'+data.id);
                        $(row_t_b_b).children('td').css('text-align','center');

                    }else if(data2[1]['value'] == "Radiologie"){
                        // add new modified

                        var t_b_r = $('#table_Bilan_Paraclinique_Radiologie').DataTable();
                        var row_t_b_r = t_b_r.row.add([
                            "<a class='btn btn-social-icon btn-xs btn-instagram edit_big_btn_Bilan_Radiologie' data-toggle='modal' data-target='#modal_edit_Bilan_Radiologie_panel'  data-id='"+data.id+"' data-nom='"+data.nom+"' ><span class='fa fa-edit'></span></a> <a class='btn btn-social-icon btn-xs btn-google btn-lg  delete_btn_Bilan_Radiologie' id='delete_btn_Bilan_Radiologie' data-id='"+data.id+"' data-type='Radiologie' data-toggle='modal' data-target='#modal_delete_confirmation'><span class='fa fa-trash'></span></a>",
                            data.nom

                        ]).draw( true )
                            .node();
                        $(row_t_b_r).addClass('Bilan_Radiologie'+data.id);
                        $(row_t_b_r).children('td').css('text-align','center');
                    }

                    $('#modal_add_element').modal('toggle');
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
                }, 10000);
            }
        });

    } else if (data[1]['value'] == "Prestataire") {

        // add element to list Prestateur  Type Bilan

        $.ajax({
            type: 'POST',
            url: 'add-element-prestataire',
            dataType: 'json',
            data: data,

            success: function (data) {


                if (data.error != null) {


                    $("#erreur_alert_33").slideDown(200);

                    setTimeout(function () {
                        $("#erreur_alert_33").slideUp(200);
                    }, 10000);

                } else {
                    $('#modal_add_element').modal('toggle');
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
                }, 10000);
            }
        });

    } else if (data[1]['value'] == "Type Bilan Radiologie") {

        // add element to list Type Bilan

        $.ajax({
            type: 'POST',
            url: 'add-element-type_bilan_radiologie',
            dataType: 'json',
            data: data,

            success: function (data) {


                if (data.error != null) {


                    $("#erreur_alert_33").slideDown(200);

                    setTimeout(function () {
                        $("#erreur_alert_33").slideUp(200);
                    }, 10000);

                } else {

                    // add new modified
                    var t_t_b_r = $('#table_Type_Bilan_Radiologie').DataTable();

                    var row_t_t_b_rr = t_t_b_r.row.add([
                        "<a class='btn btn-social-icon btn-xs btn-instagram edit_big_btn_Type_Bilan_Radiologie' data-toggle='modal' data-target='#modal_edit_Type_Bilan_Radiologie_panel'  data-id='"+data.id+"' data-nom='"+data.nom+"' ><span class='fa fa-edit'></span></a> <a class='btn btn-social-icon btn-xs btn-google btn-lg  delete_btn_Type_Bilan_Radiologie' id='delete_btn_Type_Bilan_Radiologie' data-id='"+data.id+"' data-type='Type Bilan Radiologie' data-toggle='modal' data-target='#modal_delete_confirmation'><span class='fa fa-trash'></span></a>",
                        data.nom

                    ]).draw( true )
                        .node();
                    $(row_t_t_b_rr).addClass('Type_Bilan_Radiologie'+data.id);
                    $(row_t_t_b_rr).children('td').css('text-align','center');


                    $('#modal_add_element').modal('toggle');
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
                }, 10000);
            }
        });

    } else if (data[1]['value'] == "Type Bilan Biologie") {

        // add element to list Type Bilan

        $.ajax({
            type: 'POST',
            url: 'add-element-type_bilan_biologie',
            dataType: 'json',
            data: data,

            success: function (data) {


                if (data.error != null) {


                    $("#erreur_alert_33").slideDown(200);

                    setTimeout(function () {
                        $("#erreur_alert_33").slideUp(200);
                    }, 10000);

                } else {
                    // add new modified

                    var t_t_b_b = $('#table_Type_Bilan_Biologie').DataTable();

                    var row_t_t_b_b = t_t_b_b.row.add([
                        "<a class='btn btn-social-icon btn-xs btn-instagram edit_big_btn_Type_Bilan_Biologie' data-toggle='modal' data-target='#modal_edit_Type_Bilan_Biologie_panel'  data-id='"+data.id+"' data-nom='"+data.nom+"' ><span class='fa fa-edit'></span></a> <a class='btn btn-social-icon btn-xs btn-google btn-lg  delete_btn_Type_Bilan_Biologie' id='delete_btn_Type_Bilan_Biologie' data-id='"+data.id+"' data-type='Type Bilan Biologie' data-toggle='modal' data-target='#modal_delete_confirmation'><span class='fa fa-trash'></span></a>",
                        data.nom

                    ]).draw( true )
                        .node();
                    $(row_t_t_b_b).addClass('Type_Bilan_Biologie'+data.id);
                    $(row_t_t_b_b).children('td').css('text-align','center');

                    $('#modal_add_element').modal('toggle');
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
                }, 10000);
            }
        });

    } else {

        // else ici sa veut dit les ajoutes des autres 4 element Antecedent Habitudes alcoolo-tabagique, Chirurgicaux,Complications, Medicaux , Familiaux
        $.ajax({
            type: 'POST',
            url: 'elements-add',
            dataType: 'json',
            data: data,

            success: function (data) {

                if(data2[1]['value'] == "Medicaux"){

                    // add new medicament modified
                    var t_r_m = $('#table_Rubriques_Medicament').DataTable();
                    var row_t_m = t_r_m.row.add([
                        "<a class='btn btn-social-icon btn-xs btn-instagram edit_big_btn_rubriques_medicament' data-toggle='modal' data-target='#modal_edit_rubrique_medicaux_panel'  data-id='"+data.id+"' data-nom='"+data.nom+"' ><span class='fa fa-edit'></span></a> <a class='btn btn-social-icon btn-xs btn-google btn-lg  delete_btn_rubriques_medicament' id='delete_btn_rubriques_medicament' data-id='"+data.id+"' data-type='Medicaux' data-toggle='modal' data-target='#modal_delete_confirmation'><span class='fa fa-trash'></span></a>",

                        data.nom

                    ]).draw( true )
                        .node();
                    $(row_t_m).addClass('rubriques_medicament'+data.id);
                    $(row_t_m).children('td').css('text-align','center');

                }else if(data2[1]['value'] == "familiaux"){

                    // add new  modified
                    var t_r_f = $('#table_familiaux').DataTable();
                    var row_t_f = t_r_f.row.add([
                        "<a class='btn btn-social-icon btn-xs btn-instagram edit_big_btn_familiaux' data-toggle='modal' data-target='#modal_edit_familiaux_panel'  data-id='"+data.id+"' data-nom='"+data.nom+"' ><span class='fa fa-edit'></span></a> <a class='btn btn-social-icon btn-xs btn-google btn-lg  delete_btn_familiaux' id='delete_btn_familiaux' data-id='"+data.id+"' data-type='familiaux' data-toggle='modal' data-target='#modal_delete_confirmation'><span class='fa fa-trash'></span></a>",

                        data.nom

                    ]).draw( true )
                        .node();
                    $(row_t_f).addClass('familiaux'+data.id);
                    $(row_t_f).children('td').css('text-align','center');

                }else if(data2[1]['value'] == "Chirurgicaux,Complications"){

                    // add new  modified
                    var t_r_c_c = $('#table_Chirurgicaux_Complications').DataTable();
                    var row_t_c_c = t_r_c_c.row.add([
                        "<a class='btn btn-social-icon btn-xs btn-instagram edit_big_btn_Chirurgicaux_Complications' data-toggle='modal' data-target='#modal_edit_Chirurgicaux_Complications_panel'  data-id='"+data.id+"' data-nom='"+data.nom+"' ><span class='fa fa-edit'></span></a> <a class='btn btn-social-icon btn-xs btn-google btn-lg  delete_btn_Chirurgicaux_Complications' id='delete_btn_Chirurgicaux_Complications' data-id='"+data.id+"' data-type='Chirurgicaux,Complications' data-toggle='modal' data-target='#modal_delete_confirmation'><span class='fa fa-trash'></span></a>",
                        data.nom

                    ]).draw( true )
                        .node();
                    $(row_t_c_c).addClass('Chirurgicaux_Complications'+data.id);
                    $(row_t_c_c).children('td').css('text-align','center');

                }else if(data2[1]['value'] == "Habitudes alcoolo-tabagique"){

                    // add new  modified
                    var t_r_h = $('#table_Habitudes').DataTable();
                    var row_t_h = t_r_h.row.add([
                        "<a class='btn btn-social-icon btn-xs btn-instagram edit_big_btn_Habitudes_alcoolo_tabagique' data-toggle='modal' data-target='#modal_edit_Habitudes_alcoolo_tabagique_panel'  data-id='"+data.id+"' data-nom='"+data.nom+"' ><span class='fa fa-edit'></span></a> <a class='btn btn-social-icon btn-xs btn-google btn-lg  delete_btn_Habitudes_alcoolo_tabagique' id='delete_btn_Habitudes_alcoolo_tabagique' data-id='"+data.id+"' data-type='Habitudes alcoolo-tabagique' data-toggle='modal' data-target='#modal_delete_confirmation'><span class='fa fa-trash'></span></a>",

                        data.nom

                    ]).draw( true )
                        .node();
                    $(row_t_h).addClass('habitudes_alcoolo_tabagique'+data.id);
                    $(row_t_h).children('td').css('text-align','center');

                }
                $('#modal_add_element').modal('toggle');
                $("#success_alert_22").slideDown(200);
                setTimeout(function () {
                    $("#success_alert_22").slideUp(200);
                }, 6000);

            },
            error: function (data) {

                $("#erreur_alert_33").slideDown(200);

                setTimeout(function () {
                    $("#erreur_alert_33").slideUp(200);
                }, 7000);
            }
        });
    }

});

$("#save_antecedent_all").on('submit', function (e) {
    e.preventDefault();

    $.ajaxSetup({
        headers: {
            'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var data = $(this).serializeArray();
    console.log(data);

    $.ajax({
        type: 'POST',
        url: 'antecedent-store',
        dataType: 'json',
        data: data,

        success: function (data) {


            if (data.error != null) {


                $("#erreur_alert_33").slideDown(200);

                setTimeout(function () {
                    $("#erreur_alert_33").slideUp(200);
                }, 10000);

            } else {

                $("#success_alert_22").slideDown(200);
                setTimeout(function () {
                    $("#success_alert_22").slideUp(200);
                }, 6000);

            }

        },
        error: function (data) {
            alert("fail");
        }
    });
});


// suprimer un  familiaux

$(document).on('click', 'span.delete-antecedent', function () {
    $(this).parent(".row").remove();
});


// save for motif_consultation  all
$("#save_motif_consultation_all").on('submit', function (e) {

    e.preventDefault();

    $.ajaxSetup({
        headers: {
            'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var data = $(this).serializeArray();


    $.ajax({
        type: 'post',
        url: 'interrogatoire-store',
        dataType: 'json',
        data: data,

        success: function (data) {


            if (data.error != null) {

                $("#erreur_alert_33").slideDown(200);

                setTimeout(function () {
                    $("#erreur_alert_33").slideUp(200);
                }, 10000);

            } else {

                $("#success_alert_22").slideDown(200);
                setTimeout(function () {
                    $("#success_alert_22").slideUp(200);
                }, 6000);

            }

        },
        error: function (data) {
            alert("Veuilliez redemarer le system ");
        }
    });


});
// save for examan clinique  all
$("#save_examan_clinique_all").on('submit', function (e) {

    e.preventDefault();

    $.ajaxSetup({
        headers: {
            'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var data = $(this).serializeArray();
    console.log(data);

    $.ajax({
        type: 'post',
        url: 'examan-clinique-store',
        dataType: 'json',
        data: data,

        success: function (data) {

            console.log(data);
            if (data.error != null) {

                $("#erreur_alert_33").slideDown(200);

                setTimeout(function () {
                    $("#erreur_alert_33").slideUp(200);
                }, 10000);

            } else {

                $("#success_alert_22").slideDown(200);
                setTimeout(function () {
                    $("#success_alert_22").slideUp(200);
                }, 6000);

            }

        },
        error: function (data) {
            alert("Veuilliez redemarer le system");
        }
    });


});
// save for bilan paraclinique  all
$("#save_bilan_paraclinique_all").on('submit', function (e) {

    e.preventDefault();

    $.ajaxSetup({
        headers: {
            'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var data = $(this).serializeArray();


    $.ajax({
        type: 'post',
        url: 'bilan-paraclinique-store',
        dataType: 'json',
        data: data,

        success: function (data) {

            console.log(data);
            if (data.error != null) {

                $("#erreur_alert_33").slideDown(200);

                setTimeout(function () {
                    $("#erreur_alert_33").slideUp(200);
                }, 10000);

            } else {

                $("#success_alert_22").slideDown(200);
                setTimeout(function () {
                    $("#success_alert_22").slideUp(200);
                }, 6000);

            }

        },
        error: function (data) {
            alert("Veuilliez redemarer le system");
        }
    });


});


$('#add_element_ordonnance').on('submit', function (e) {

    e.preventDefault();

    $.ajaxSetup({
        headers: {
            'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var data = $(this).serializeArray();
    console.log(data[6].value);
    if ($.trim(data[6].value) == '' || data[6].value < 0) {

        $("#erreur_alert_33").slideDown(200);
        setTimeout(function () {
            $("#erreur_alert_33").slideUp(200);
        }, 10000);
    } else {
        var tbod = $("#ajouter_un_element_ordonnance_insert");


        $.ajax({
            type: 'POST',
            url: 'add-element-ordonnance',
            dataType: 'json',
            data: data,

            success: function (data) {


                $("<tr class='click_edit_delete ordo-" + data.data.id + "' data-id='" + data.data.id + "' data-medicament='" + data.medicament + "' data-quantite='" + data.data.quantite + "' data-prise='" + data.data.prise + "' data-periode='" + data.data.periode + "' data-nombre-par-jour='" + data.data.nombre_par_jour + "' data-quand='" + data.data.quand + "' data-remarque='" + data.data.remarque + "'  ><td class='open-modal-edit' data-toggle='modal-float' data-target='#fModalRightOne'>" + data.medicament + "</td><td class='open-modal-edit' data-toggle='modal-float' data-target='#fModalRightOne'>" + data.data.quantite + "</td><td class='open-modal-edit' data-toggle='modal-float' data-target='#fModalRightOne'>" + data.data.prise + "</td><td class='open-modal-edit' data-toggle='modal-float' data-target='#fModalRightOne'>" + data.data.periode + "</td><td class='open-modal-edit' data-toggle='modal-float' data-target='#fModalRightOne'>" + data.data.nombre_par_jour + "</td><td class='open-modal-edit' data-toggle='modal-float' data-target='#fModalRightOne'>" + data.data.quand + "</td><td class='open-modal-edit' data-toggle='modal-float' data-target='#fModalRightOne'>" + data.data.remarque + "</td><td><a class='btn btn-social-icon btn-xs btn-google btn-lg delete-medicament-ordonnance' data-id='" + data.data.id + "' ><span class='fa fa-trash'></span></a></td></tr>").appendTo("#ajouter_un_element_ordonnance_insert");

                if (data.error != null) {


                    $("#erreur_alert_33").slideDown(200);

                    setTimeout(function () {
                        $("#erreur_alert_33").slideUp(200);
                    }, 10000);

                } else {

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
                }, 10000);
            }
        });
    }


});
// add medicament small modal just name
$('#add_medicament_element_nomm').on('submit', function (e) {
    e.preventDefault();


    var data = $(this).serializeArray();

    $.ajax({
        type: 'POST',
        url: 'add-medicament',
        dataType: 'json',
        data: data,

        success: function (data) {
            console.log(data);

            if (data.error != null) {

                $("#erreur_alert_33").slideDown(200);

                setTimeout(function () {
                    $("#erreur_alert_33").slideUp(200);
                }, 10000);

            } else {

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




                // $('#add_modal_float').click();
                //$('#ModalLeftOneMedicament').modal('toggle');
                $("#success_alert_22").slideDown(200);
                setTimeout(function () {
                    $("#success_alert_22").slideUp(200);
                   // $('#tbody_for_datatables_medicament').find('.delete_btn_medicament').parents('tr').addClass('medicament'+data.id);
                }, 6000);

            }
        },
        error: function (data) {

            $("#erreur_alert_33").slideDown(200);

            setTimeout(function () {
                $("#erreur_alert_33").slideUp(200);
            }, 10000);
        }
    });
});





// add bilan consultation radiologie
$('#save_bilan_radiologie_consultation_all').on('submit', function (e) {
    e.preventDefault();

    $.ajaxSetup({
        headers: {
            'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var data = $(this).serializeArray();

    $.ajax({
        type: 'POST',
        url: 'add-bilan-radiologie-consultation-all',
        dataType: 'json',
        data: data,

        success: function (data) {

            if (data.error != null) {

                $("#erreur_alert_33").slideDown(200);

                setTimeout(function () {
                    $("#erreur_alert_33").slideUp(200);
                }, 10000);

            } else {

                $('#save_radiologie_show').hide();


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
            }, 10000);
        }
    });
});

// add_bilan_biologie_consultation_all
$('#add_bilan_biologie_consultation_all').on('submit', function (e) {
    e.preventDefault();

    $.ajaxSetup({
        headers: {
            'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var data = $(this).serializeArray();

    $.ajax({
        type: 'POST',
        url: 'add-bilan-biologie-consultation-all',
        dataType: 'json',
        data: data,

        success: function (data) {

            if (data.error != null) {

                $("#erreur_alert_33").slideDown(200);

                setTimeout(function () {
                    $("#erreur_alert_33").slideUp(200);
                }, 10000);

            } else {


                $('#save_biologie_show').hide();
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
            }, 10000);
        }
    });
});

// sav_finish_all_consultattion
$('#form_save_all_consultation_finish').on('submit', function (e) {
    e.preventDefault();

    $.ajaxSetup({
        headers: {
            'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var data = $(this).serializeArray();

    $.ajax({
        type: 'POST',
        url: 'save-finish',
        dataType: 'json',
        data: data,

        success: function (data) {


            if (data.error != null) {

                $("#erreur_alert_33").slideDown(200);

                setTimeout(function () {
                    $("#erreur_alert_33").slideUp(200);
                }, 10000);

            } else if (data.edit != null) {

                $('#rendez-vous-consultation-panel').hide();
                $('#rendez-vous-panel').show();
                $("#success_alert_22").slideDown(200);
                setTimeout(function () {
                    $("#success_alert_22").slideUp(200);
                }, 6000);
            } else {
                // find rendez_vous and delete

               $('tbody > tr.element'+data.rendez_vous_id).remove();


                var t_consultation = $('#table_consultation').DataTable();

                // add new medicament modified

           // <tr class="click_show element-consultation477 odd" data-id="477" data-patient-id="114" data-patient="Rutherford Genoveva Daugherty Sr." data-date="2017-04-08 10:00:46" data-type="Consultation" role="row">
           //         <td style="padding: 5px" class="sorting_1">
           //         <a class="btn btn-social-icon btn-xs btn-instagram btn-redirect-profil-patient" data-id="114"><i class="fa fa-user"></i></a>
           //         <a class="btn btn-social-icon btn-xs btn-google btn-lg" id="btn_delete_consultation" data-id="477" data-type="consultation" data-toggle="modal" data-target="#modal_delete_confirmation"><span class="fa fa-trash"></span></a>
           //         </td>
           //         <td class="click_show_consultation_exist">
           //         Rutherford Genoveva Daugherty Sr.                                            </td>
           //     <td class="click_show_consultation_exist">
           //         2017-04-08 10:00:46
           //     </td>
           //     <td class="click_show_consultation_exist">
           //         Consultation                                            </td>
           //         <td class="click_show_consultation_exist">
           //         remarque1
           //         </td>
           //         </tr>

                $.get('patient-search?patient='+data.consultation.patient_id+'&type='+data.consultation.type_id, function (data_search) {

                    if (data_search.error != null) {

                        $("#erreur_alert_33").slideDown(200);

                        setTimeout(function () {
                            $("#erreur_alert_33").slideUp(200);
                        }, 10000);

                    }else{
                    // success data
                        var data_return_info ;
                          data_return_info = data_search;

                        var row_t_add = t_consultation.row.add([

                            "<a class='btn btn-social-icon btn-xs btn-instagram btn-redirect-profil-patient' data-id='"+data.consultation.id+"'><i class='fa fa-user'></i></a> <a class='btn btn-social-icon btn-xs btn-google btn-lg' id='btn_delete_consultation' data-id='"+data.consultation.id+"' data-type='consultation' data-toggle='modal' data-target='#modal_delete_confirmation'><span class='fa fa-trash'></span></a>",
                            data_return_info.patient_nom,
                            data.consultation.date_consultation,
                            data_return_info.type,
                            data.consultation.remarque

                        ]).draw( true )
                            .node();
                        $(row_t_add).addClass('click_show element-consultation'+data.consultation.id);
                        $(row_t_add).attr('data-id',data.consultation.id);
                        $(row_t_add).attr('data-patient-id',data.consultation.patient_id);
                        $(row_t_add).attr('data-patient',data_return_info.patient_nom);
                        $(row_t_add).attr('data-date',data.consultation.date_consultation);
                        $(row_t_add).attr('data-type',data_return_info.type);
                        $(row_t_add).children('td').eq(1).addClass('click_show_consultation_exist');
                        $(row_t_add).children('td').eq(2).addClass('click_show_consultation_exist');
                        $(row_t_add).children('td').eq(3).addClass('click_show_consultation_exist');
                        $(row_t_add).children('td').eq(4).addClass('click_show_consultation_exist');


                        $('#rendez-vous-consultation-panel').hide();
                        $('#rendez-vous-panel').show();
                        $("#success_alert_22").slideDown(200);
                        setTimeout(function () {
                            $("#success_alert_22").slideUp(200);
                        }, 6000);

                    }

                });

            }
        },
        error: function (data) {

            $("#erreur_alert_33").slideDown(200);

            setTimeout(function () {
                $("#erreur_alert_33").slideUp(200);
            }, 10000);
        }
    });
});


// Edit an element to ordonnance


// delete an element to ordonnance
$(document).on('click', 'a.delete-medicament-ordonnance', function () {
    var id = $(this).data('id');
    var element_deleted = $(this).parents('tr');
    console.log(id);

    $.get('delete-ordonnance-detail?id=' + id, function (data) {
        console.log(data);
        // success data

        if (data.error != null) {

            $("#erreur_alert_33").slideDown(200);

            setTimeout(function () {
                $("#erreur_alert_33").slideUp(200);
            }, 10000);

        } else {
            element_deleted.remove();
            $("#success_alert_22").slideDown(200);
            setTimeout(function () {
                $("#success_alert_22").slideUp(200);
            }, 6000);

        }

    });


});

$(document).on('click', 'td.open-modal-edit', function (e) {

    var parent_data = $(this).parents('tr.click_edit_delete');


    e.preventDefault();
    // ajax for geting liste medicament
    $("#médicament-edit").empty();
    var medicam = $("#médicament-edit");


    $.get('medicament-list', function (data) {
        // success data

        $.each(data, function (index, reponse) {
            if (parent_data.data('medicament') == reponse.nom) {
                console.log(reponse.nom);
                $(medicam).append('<option  value="' + reponse.nom + '" selected >' + reponse.nom + '</option>');
            } else {
                $(medicam).append('<option  value="' + reponse.nom + '" >' + reponse.nom + '</option>');
            }
        });
    });

    $("#Quantité_edit").val(parent_data.data('quantite'));
    $("#Prise_edit").val(parent_data.data('prise'));
    $("#Periode_edit").val(parent_data.data('periode'));
    $("#Nombre_Par_Jour_edit").val(parent_data.data('nombre-par-jour'));
    $("#Quand_edit").val(parent_data.data('quand'));
    $("#Remarque_Ordonnance_edit").val(parent_data.data('remarque'));
    $(".ordon_detail_id_input").val(parent_data.data('id'));

});


$('#edit_element_ordonnance').on('submit', function (e) {
    e.preventDefault();

    $.ajaxSetup({
        headers: {
            'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var data = $(this).serializeArray();

    $.ajax({
        type: 'POST',
        url: 'edit-ordonnance',
        dataType: 'json',
        data: data,

        success: function (data) {

            if (data.error != null) {

                $("#erreur_alert_33").slideDown(200).effect("shake");
                setTimeout(function () {
                    $("#erreur_alert_33").effect("bounce").slideUp(200);
                }, 8000);

            } else {
                $(".ordo-" + data.data.id).replaceWith("<tr class='click_edit_delete ordo-" + data.data.id + "' data-id='" + data.data.id + "' data-medicament='" + data.medicament + "' data-quantite='" + data.data.quantite + "' data-prise='" + data.data.prise + "' data-periode='" + data.data.periode + "' data-nombre-par-jour='" + data.data.nombre_par_jour + "' data-quand='" + data.data.quand + "' data-remarque='" + data.data.remarque + "'  ><td class='open-modal-edit' data-toggle='modal-float' data-target='#fModalRightOne'>" + data.medicament + "</td><td class='open-modal-edit' data-toggle='modal-float' data-target='#fModalRightOne'>" + data.data.quantite + "</td><td class='open-modal-edit' data-toggle='modal-float' data-target='#fModalRightOne'>" + data.data.prise + "</td><td class='open-modal-edit' data-toggle='modal-float' data-target='#fModalRightOne'>" + data.data.periode + "</td><td class='open-modal-edit' data-toggle='modal-float' data-target='#fModalRightOne'>" + data.data.nombre_par_jour + "</td><td class='open-modal-edit' data-toggle='modal-float' data-target='#fModalRightOne'>" + data.data.quand + "</td><td class='open-modal-edit' data-toggle='modal-float' data-target='#fModalRightOne'>" + data.data.remarque + "</td><td><a class='btn btn-social-icon btn-xs btn-google btn-lg delete-medicament-ordonnance' data-id='" + data.data.id + "' ><span class='fa fa-trash'></span></a></td></tr>");


                $("#success_alert_22").slideDown(200);
                setTimeout(function () {
                    $("#success_alert_22").slideUp(200);
                }, 6000);

            }
        },
        error: function (data) {

            $("#erreur_alert_33").slideDown(200).effect("shake");
            setTimeout(function () {
                $("#erreur_alert_33").effect("bounce").slideUp(200);
            }, 8000);
        }
    });
});

// save all CERTIFICAT MEDICAL
$('#save_certifict_medical_all').on('submit', function (e) {
    e.preventDefault();

    $.ajaxSetup({
        headers: {
            'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var data = $(this).serializeArray();

    $.ajax({
        type: 'POST',
        url: 'save-certificat',
        dataType: 'json',
        data: data,

        success: function (data) {

            console.log(data);
            if (data.error != null) {

                $("#erreur_alert_33").slideDown(200).effect("shake");
                setTimeout(function () {
                    $("#erreur_alert_33").effect("bounce").slideUp(200);
                }, 8000);

            } else {
                $("#Durée_par_jour").text(data);

                $("#success_alert_22").slideDown(200);
                setTimeout(function () {
                    $("#success_alert_22").slideUp(200);
                }, 6000);

            }
        },
        error: function (data) {

            $("#erreur_alert_33").slideDown(200).effect("shake");
            setTimeout(function () {
                $("#erreur_alert_33").effect("bounce").slideUp(200);
            }, 8000);
        }
    });
});

// btn- Annuller tout la consultation
$("#annuller_consultation_all").on('click', function () {
    $("#rendez-vous-consultation-panel").hide();
    $("#rendez-vous-panel").show();
});


// geting list
// get list of medicament to select
$("#médicament-add,#médicament-edit").focus(function (e) {
    e.preventDefault();
    // ajax for geting liste medicament
    $(this).empty();
    var medicam = $(this);


    $.get('medicament-list', function (data) {
        // success data

        $.each(data, function (index, reponse) {

            $(medicam).append('<option value="' + reponse.nom + '">' + reponse.nom + '</option>');

        });
    });
});
// get list of type Certificat Medicals to  select_type_certificat
$("#select_type_certificat").focus(function (e) {
    e.preventDefault();
    // ajax for geting liste of type
    $(this).empty();
    var certificat_type = $(this);


    $.get('type-certificat-list', function (data) {
        // success data

        $.each(data, function (index, reponse) {

            $(certificat_type).append('<option value="' + reponse.nom + '">' + reponse.nom + '</option>');

        });
    });
});

// get list of type Prestataires
$(".select_prestateur_list_all").focus(function (e) {
    e.preventDefault();
    // ajax for geting liste of type
    $(this).empty();
    var bilanconsultation = $(this);

    $.get('prestataire-list', function (data) {
        // success data
        console.log(data);
        $.each(data, function (index, reponse) {

            $(bilanconsultation).append('<option value="' + reponse.nom + '">' + reponse.nom + '</option>');

        });
    });
});

// get list of type type bilan_consultation_radiologie
$("#select_type_list_all_radiologie").focus(function (e) {
    e.preventDefault();
    // ajax for geting liste of type
    $(this).empty();
    var bilanconsultationradiologie = $(this);

    $.get('bilan-radiologie-consultation-list', function (data) {
        // success data
        console.log(data);
        $.each(data, function (index, reponse) {

            $(bilanconsultationradiologie).append('<option value="' + reponse.nom + '">' + reponse.nom + '</option>');

        });
    });
});

// get list of type type bilan_consultation_biologie
$("#select_type_list_all_biologie").focus(function (e) {
    e.preventDefault();
    // ajax for geting liste of type
    $(this).empty();
    var bilanconsultationradiologie = $(this);

    $.get('bilan-biologie-consultation-list', function (data) {
        // success data

        $.each(data, function (index, reponse) {

            $(bilanconsultationradiologie).append('<option value="' + reponse.nom + '">' + reponse.nom + '</option>');

        });
    });
});


// get list of element familiaux antecedent
$(document).on('focus', 'div #select_familiaux_list', function () {

    // ajax for geting liste of type
    $(this).empty();
    var listFamiliaux = $(this);

    $.get('select-antecedent-list?type=Familiaux', function (data) {
        // success data

        if (data.error != null) {

        } else {
            if (data.length > 1) {
                $.each(data, function (index, reponse) {

                    $(listFamiliaux).append('<option value="' + reponse.nom + '">' + reponse.nom + '</option>');

                });
                //$('div #select_familiaux_list').click();
                //$(listFamiliaux).trigger('click');




            } else {
                $(listFamiliaux).append('<option value="' + data.nom + '">' + data.nom + '</option>');

            }


        }


    });


});



// get list of element medicaux antecedent
$(document).on('focus', 'div #select_medicaux_list', function () {

    // ajax for geting liste of type
    $(this).empty();
    var listMedicauxAntecedent = $(this);


    $.get('select-antecedent-list?type=Medicaux', function (data) {

        if (data.error != null) {

        } else {
            console.log(data);
            if (data.length > 1) {
                $.each(data, function (index, reponse) {
                    //console.log(reponse);

                    $(listMedicauxAntecedent).append('<option value="' + reponse.nom + '">' + reponse.nom + '</option>');

                });
            } else {
                $(listMedicauxAntecedent).append('<option value="' + data.nom + '">' + data.nom + '</option>');

            }
        }
    });
});


// get list of element habitudes alcolos-tabagique
$(document).on('focus', 'div #select_habitudes_list', function () {

    // ajax for geting liste of type
    $(this).empty();
    var listHabitudeAntecedent = $(this);
    console.log(listHabitudeAntecedent);

    $.get('select-antecedent-list?type=Habitudes alcoolo-tabagique', function (data) {

        if (data.error != null) {

        } else {
            console.log(data);
            if (data.length > 1) {
                $.each(data, function (index, reponse) {
                    //console.log(reponse);

                    $(listHabitudeAntecedent).append('<option value="' + reponse.nom + '">' + reponse.nom + '</option>');

                });
            } else {
                $(listHabitudeAntecedent).append('<option value="' + data.nom + '">' + data.nom + '</option>');

            }
        }
    });
});

// get list of element chirurgicaux
$(document).on('focus', 'div #select_chirurgicaux_list', function () {

    // ajax for geting liste of type
    $(this).empty();
    var listChirurgiauxAntecedent = $(this);


    $.get('select-antecedent-list?type=Chirurgicaux,Complications', function (data) {

        if (data.error != null) {

        } else {

            if (data.length > 1) {
                $.each(data, function (index, reponse) {
                    //console.log(reponse);

                    $(listChirurgiauxAntecedent).append('<option value="' + reponse.nom + '">' + reponse.nom + '</option>');

                });
            } else {
                $(listChirurgiauxAntecedent).append('<option value="' + data.nom + '">' + data.nom + '</option>');

            }
        }
    });
});

// get list of element motif consultation
$(document).on('focus', 'div #select_motif_consultation_list', function () {

    // ajax for geting liste of type
    $(this).empty();
    var listMotifConsultation = $(this);


    $.get('select-antecedent-list?type=MotifsConsultation', function (data) {

        if (data.error != null) {

        } else {

            if (data.length > 1) {
                $.each(data, function (index, reponse) {
                    //console.log(reponse);

                    $(listMotifConsultation).append('<option value="' + reponse.nom + '">' + reponse.nom + '</option>');

                });
            } else {
                $(listMotifConsultation).append('<option value="' + data.nom + '">' + data.nom + '</option>');

            }
        }
    });
});

// get list of element examan clinique general
$(document).on('focus', 'div #select_general_list', function () {

    // ajax for geting liste of type
    $(this).empty();
    var listExamanClinique = $(this);


    $.get('select-antecedent-list?type=ExamanCliniqueGeneral', function (data) {


        if (data.error != null) {

        } else {

            if (data.length > 1) {
                $.each(data, function (index, reponse) {

                    $(listExamanClinique).append('<option value="' + reponse.nom + '">' + reponse.nom + '</option>');

                });
            } else {
                $(listExamanClinique).append('<option value="' + data.nom + '">' + data.nom + '</option>');

            }
        }
    });

});

// get list of element examan clinique par appareil
$(document).on('focus', 'div #select_par_appareil_list', function () {

    // ajax for geting liste of type
    $(this).empty();
    var listExamanCliniquee = $(this);


    $.get('select-antecedent-list?type=ParAppareil', function (data) {

        console.log(data);
        if (data.error != null) {

        } else {

            if (data.length > 1) {
                $.each(data, function (index, reponse) {

                    $(listExamanCliniquee).append('<option value="' + reponse.nom + '">' + reponse.nom + '</option>');

                });
            } else {
                $(listExamanCliniquee).append('<option value="' + data.nom + '">' + data.nom + '</option>');

            }
        }
    });
});

// get list of element bilan sur consultation biologie
$(document).on('focus', 'div #select_bilan_biologie_list', function () {

    // ajax for geting liste of type
    $(this).empty();
    var listExamanCliniquee = $(this);


    $.get('select-antecedent-list?type=BilanAntecedentBiologie', function (data) {

        console.log(data);
        if (data.error != null) {

        } else {

            if (data.length > 1) {
                $.each(data, function (index, reponse) {

                    $(listExamanCliniquee).append('<option value="' + reponse.nom + '">' + reponse.nom + '</option>');

                });
            } else {
                $(listExamanCliniquee).append('<option value="' + data.nom + '">' + data.nom + '</option>');

            }
        }
    });
});

// get list of element bilan sur consultation radiologie
$(document).on('focus', 'div #select_bilan_radiologie_list', function () {

    // ajax for geting liste of type
    $(this).empty();
    var listExamanCliniquee = $(this);


    $.get('select-antecedent-list?type=BilanAntecedentRadiologie', function (data) {

        console.log(data);
        if (data.error != null) {

        } else {

            if (data.length > 1) {
                $.each(data, function (index, reponse) {

                    $(listExamanCliniquee).append('<option value="' + reponse.nom + '">' + reponse.nom + '</option>');

                });
            } else {
                $(listExamanCliniquee).append('<option value="' + data.nom + '">' + data.nom + '</option>');

            }
        }
    });
});


// Annulation d'un rendez vous par l'admin
$(document).on('click', 'td > .annulation_rendez_vous', function () {
    $('.annulation_confirmation_btn_oui').attr('data-id', $(this).data('id'));
});
$('.annulation_confirmation_btn_oui').on('click', function () {

    $.get('annulation-rendez-vous-ad?id=' + $(this).attr('data-id'), function (data) {

        if (data.error != null) {
            $("#erreur_alert_33").slideDown(200).effect("shake");
            setTimeout(function () {
                $("#erreur_alert_33").effect("bounce").slideUp(200);
            }, 8000);

        } else {
            if (data.id_rendez_vous != null) {
                $('tr.element' + data.id_rendez_vous).remove();

                $("#success_alert_22").slideDown(200);
                setTimeout(function () {
                    $("#success_alert_22").slideUp(200);
                }, 6000);
            }

        }
    });


});


// Delete one rendez vous by Admin Modal
$(document).on('click', 'td > .delete_element_verification', function () {
    $('#delete_confirmation_btn_oui').attr('data-id', $(this).data('id'));
    $('#delete_confirmation_btn_oui').attr('data-type', $(this).data('type'));
});
/* this is validation of all delete in this project */
$('#delete_confirmation_btn_oui').on('click', function () {
    //console.log($(this).attr('data-id'),$(this).attr('data-type'));

    $.get('confirmation-delete?id=' + $(this).attr('data-id') + '&type=' + $(this).attr('data-type'), function (data) {


        if (data.error != null) {
            $("#erreur_alert_33").slideDown(200).effect("shake");
            setTimeout(function () {
                $("#erreur_alert_33").effect("bounce").slideUp(200);
            }, 8000);

        } else {
            if (data.id_rendez_vous != null) {
                $('tr.element' + data.id_rendez_vous).remove();
                $('#modal_delete_confirmation').modal('toggle');

                $("#success_alert_22").slideDown(200).effect("shake");
                setTimeout(function () {
                    $("#success_alert_22").effect("bounce").slideUp(200);
                }, 6000);
            } else if (data.id_consultation != null) {
                $('tr.element-consultation' + data.id_consultation).remove();
                // remove row
                var t_consultation_remove = $('#table_consultation').DataTable();
                t_consultation_remove.row('tbody >.element-consultation'+data.id_consultation)
                    .remove()
                     .draw();


                $('#modal_delete_confirmation').modal('toggle');
                $("#success_alert_22").slideDown(200).effect("shake");
                setTimeout(function () {
                    $("#success_alert_22").effect("bounce").slideUp(200);
                }, 6000);
            } else if (data.id_patient != null) {

                var t_patient = $('#table_patients').DataTable();
                // remove past

                t_patient.row("tbody >.item"+data.id_patient )
                    .remove()
                    .draw();

                $('#modal_delete_confirmation').modal('toggle');
                $("#success_alert_22").slideDown(200).effect("shake");
                setTimeout(function () {
                    $("#success_alert_22").effect("bounce").slideUp(200);
                }, 6000);
            } else if (data.id_prestataire != null) {

                var t_prestataire = $('#table_prestataires').DataTable();
                // remove past
                t_prestataire.row("tbody >.prestataire"+data.id_prestataire )
                    .remove()
                    .draw();

                $('#modal_delete_confirmation').modal('toggle');
                $("#success_alert_22").slideDown(200).effect("shake");
                setTimeout(function () {
                    $("#success_alert_22").effect("bounce").slideUp(200);
                }, 6000);

            } else if (data.id_medicament != null) {

                var t = $('#table_medicament').DataTable();
                t.row("tbody >.medicament"+data.id_medicament )
                    .remove()
                    .draw();


                $('#modal_delete_confirmation').modal('toggle');

                $("#success_alert_22").slideDown(200).effect("shake");
                setTimeout(function () {
                    $("#success_alert_22").effect("bounce").slideUp(200);
                }, 6000);

            } else if (data.id_familiaux != null) {


                var t_f = $('#table_familiaux').DataTable();
                // remove past

                t_f.row("tbody >.familiaux"+data.id_familiaux )
                    .remove()
                    .draw();

                $('#modal_delete_confirmation').modal('toggle');
                $("#success_alert_22").slideDown(200).effect("shake");
                setTimeout(function () {
                    $("#success_alert_22").effect("bounce").slideUp(200);
                }, 6000);

            } else if (data.id_habitudes_alcoolo_tabagique != null) {


                var t_h = $('#table_Habitudes').DataTable();
                t_h.row("tbody >.habitudes_alcoolo_tabagique"+data.id_habitudes_alcoolo_tabagique )
                    .remove()
                    .draw();


                $('#modal_delete_confirmation').modal('toggle');
                $("#success_alert_22").slideDown(200).effect("shake");
                setTimeout(function () {
                    $("#success_alert_22").effect("bounce").slideUp(200);
                }, 6000);

            } else if (data.id_chirurgicaux_complications != null) {


                var t_c_c = $('#table_Chirurgicaux_Complications').DataTable();
                // remove past

                t_c_c.row("tbody >.Chirurgicaux_Complications"+data.id_chirurgicaux_complications )
                    .remove()
                    .draw();


                $('#modal_delete_confirmation').modal('toggle');
                $("#success_alert_22").slideDown(200).effect("shake");
                setTimeout(function () {
                    $("#success_alert_22").effect("bounce").slideUp(200);
                }, 6000);

            } else if (data.id_motif_consultation != null) {

                // remove in the datatable
                var t_m_co = $('#table_motif_consultation').DataTable();
                // remove past

                t_m_co.row("tbody >.Motif_Consultation"+data.id_motif_consultation )
                    .remove()
                    .draw();

                $('#modal_delete_confirmation').modal('toggle');
                $("#success_alert_22").slideDown(200).effect("shake");
                setTimeout(function () {
                    $("#success_alert_22").effect("bounce").slideUp(200);
                }, 6000);

            } else if (data.id_examan_general != null) {



                var t_e_g = $('#table_Examan_General').DataTable();
                // remove past

                t_e_g.row("tbody >.Examan_General"+data.id_examan_general )
                    .remove()
                    .draw();


                $('#modal_delete_confirmation').modal('toggle');
                $("#success_alert_22").slideDown(200).effect("shake");
                setTimeout(function () {
                    $("#success_alert_22").effect("bounce").slideUp(200);
                }, 6000);

            } else if (data.id_examan_par_appareil != null) {



                var t_e_p_a = $('#table_Examan_Par_Appareil').DataTable();
                // remove past

                t_e_p_a.row("tbody >.Examan_Par_Appareil"+data.id_examan_par_appareil )
                    .remove()
                    .draw();


                $('#modal_delete_confirmation').modal('toggle');
                $("#success_alert_22").slideDown(200).effect("shake");
                setTimeout(function () {
                    $("#success_alert_22").effect("bounce").slideUp(200);
                }, 6000);

            } else if (data.id_bilan_biologie != null) {


                var t_b_b = $('#table_Bilan_Paraclinique_Biologie').DataTable();
                // remove past

                t_b_b.row("tbody >.Bilan_Biologie"+data.id_bilan_biologie )
                    .remove()
                    .draw();

                $('#modal_delete_confirmation').modal('toggle');
                $("#success_alert_22").slideDown(200).effect("shake");
                setTimeout(function () {
                    $("#success_alert_22").effect("bounce").slideUp(200);
                }, 6000);

            } else if (data.id_bilan_radiologie != null) {


                var t_b_p_b = $('#table_Bilan_Paraclinique_Radiologie').DataTable();
                // remove past

                t_b_p_b.row("tbody >.Bilan_Radiologie"+data.id_bilan_radiologie )
                    .remove()
                    .draw();

                $('#modal_delete_confirmation').modal('toggle');
                $("#success_alert_22").slideDown(200).effect("shake");
                setTimeout(function () {
                    $("#success_alert_22").effect("bounce").slideUp(200);
                }, 6000);

            } else if (data.id_type_bilan_biologie != null) {


                var t_t_b_b = $('#table_Type_Bilan_Biologie').DataTable();
                // remove past

                t_t_b_b.row("tbody >.Type_Bilan_Biologie"+data.id_type_bilan_biologie )
                    .remove()
                    .draw();

                $('#modal_delete_confirmation').modal('toggle');
                $("#success_alert_22").slideDown(200).effect("shake");
                setTimeout(function () {
                    $("#success_alert_22").effect("bounce").slideUp(200);
                }, 6000);

            } else if (data.id_type_bilan_radiologie != null) {

                // remove past
                var t_t_b_r = $('#table_Type_Bilan_Radiologie').DataTable();
                t_t_b_r.row("tbody >.Type_Bilan_Radiologie"+data.id_type_bilan_radiologie )
                    .remove()
                    .draw();

                $('#modal_delete_confirmation').modal('toggle');
                $("#success_alert_22").slideDown(200).effect("shake");
                setTimeout(function () {
                    $("#success_alert_22").effect("bounce").slideUp(200);
                }, 6000);

            } else if (data.id_medicaux != null) {


                var trm = $('#table_Rubriques_Medicament').DataTable();
                // remove past

                trm.row("tbody >.rubriques_medicament"+data.id_medicaux )
                    .remove()
                    .draw();


                $('#modal_delete_confirmation').modal('toggle');

                $("#success_alert_22").slideDown(200).effect("shake");
                setTimeout(function () {
                    $("#success_alert_22").effect("bounce").slideUp(200);
                }, 6000);

            } else {
                $("#erreur_alert_33").slideDown(200).effect("shake");
                setTimeout(function () {
                    $("#erreur_alert_33").effect("bounce").slideUp(200);
                }, 8000);
            }
        }
    });


});