
$(document).on('click', 'td.click_show_consultation_exist',function () {

    var consultation_id_exist = $.trim($(this).parent('.click_show').data('id'));
    var patient_consultation_date = $.trim($(this).parent('.click_show').data('date'));
    var patient_consultation_nom_prenom = $.trim($(this).parent('.click_show').data('patient'));
    var patient_consultation_type_motif =$.trim($(this).parent('.click_show').data('type'));
    var patient_id_consultation= $.trim($(this).parent('.click_show').data('patient-id'));

    // clear all resource

    $(".clear_all").each(function() {
        $(this).remove();
    });

    $(".click_edit_delete").each(function() {
        $(this).remove();
    });

    /* fin clear all resource */

   // $(".input_with_id_rendez_vous_save_all").val(consultation_id_exist);
    $(".input_with_id_rendez_vous_save_all").val(' ');

    $("#nom_patient_consultation").text(patient_consultation_nom_prenom);
    $("#date_patient_consultation").text(patient_consultation_date);
    $("#type_motif_patient_consultation").text(patient_consultation_type_motif);

    $(".patient_id_consultation").val(patient_id_consultation);


    // show button save for bilan
    $("#save_radiologie_show").show();
    $("#save_biologie_show").show();


    // ajax delete others consultaton not completed
    $.get('consultation-delete',function (data) {
        // success data

        if(data.error == null){
            //get antecedent familiaux patient
            $.get('antecedent-search?id='+patient_id_consultation+'&antecedent=Familiaux' ,function (data) {
                // success data

                if(data.error != null){


                    $("#erreur_alert_33").slideDown(200);
                    setTimeout(function() {
                        $("#erreur_alert_33").slideUp(200);
                    }, 10000);

                }else{

                    var all_element = data.antecedent_familiaux;

                    if(data.antecedent_familiaux_patient.length !=0){

                        $.each(data.antecedent_familiaux_patient, function(index, itemData) {


                            var description_antecedent = itemData;




                            // #familiaux-input
                            setTimeout(function(){
                                $("<div class='row clear_all'><div class='form-group col-md-4 col-xs-offset-1'><select id='select_familiaux_list'  class='form-control familiaux-list select_familiaux_list_"+itemData.id+"' name='nom_familiaux[]' > </select></div><span class='ti-share col-md-1 add-new-select-element-familiaux' data-html='familiaux' data-toggle='modal' data-target='#modal_add_element' style='padding-left: 0px;line-height: 2'></span> <input class='form-control col-md-2' name='description_familiaux[]' type='text' style='width: 40%' value='"+ itemData.description+"'><span class='di di-trash col-md-1 delete-antecedent' style='padding-left: 0px;line-height: 2'></span></div>").insertBefore('#familiaux-input');
                            }, 1000);


                            $.get('get-name-element-selected?nom_element_id='+itemData.nom_element_id,function (data) {


                                if(data.nom != null){

                                    $.each(all_element,function (index,element) {

                                        if(element.nom == data.nom){
                                            setTimeout(function(){
                                                $('<option value="'+element.nom+'" selected>'+element.nom+'</option>').appendTo('.select_familiaux_list_'+description_antecedent.id);

                                            },1000);

                                        }else{
                                            setTimeout(function(){
                                                $('<option value="'+element.nom+'">'+element.nom+'</option>').appendTo('.select_familiaux_list_'+description_antecedent.id);
                                            },1000);
                                        }
                                    })

                                }else{

                                }
                            })
                        });
                    }

                }
            });

            //get antecedent medicaux patient
            $.get('antecedent-search?id='+patient_id_consultation+'&antecedent=Medicaux' ,function (data) {
                // success data

                if(data.error != null){

                    $("#erreur_alert_33").slideDown(200);
                    setTimeout(function() {
                        $("#erreur_alert_33").slideUp(200);
                    }, 10000);

                }else{

                    var all_element = data.antecedent_familiaux;

                    if(data.antecedent_familiaux_patient.length !=0){

                        $.each(data.antecedent_familiaux_patient, function(index, itemData) {

                            var description_antecedent = itemData;


                            // #familiaux-input
                            setTimeout(function(){
                                $("<div class='row clear_all'><div class='form-group col-md-4 col-xs-offset-1' id='div-select'><select id='select_medicaux_list' class='form-control medicaux-list select_medicaux_list_"+itemData.id+" select-familiaux' name='nom_medicaux[]'></select></div><span class='ti-share col-md-1 add-new-select-element-familiaux' data-html='Medicaux' data-toggle='modal' data-target='#modal_add_element' style='padding-left: 0px;line-height: 2' ></span><input class='form-control col-md-2' name='description_medicaux[]' type='text' value='"+ itemData.description+"' style='width: 40%'><span class='di di-trash col-md-1 delete-antecedent'  style='padding-left: 0px;line-height: 2'></span></div>").insertBefore('#medicaux-input');
                            }, 1000);


                            $.get('get-name-element-selected?nom_element_id='+itemData.nom_element_id,function (data) {


                                if(data.nom != null){

                                    $.each(all_element,function (index,element) {

                                        if(element.nom == data.nom){
                                            setTimeout(function(){
                                                $('<option value="'+element.nom+'" selected>'+element.nom+'</option>').appendTo('.select_medicaux_list_'+description_antecedent.id);

                                            },1000);

                                        }else{
                                            setTimeout(function(){
                                                $('<option value="'+element.nom+'">'+element.nom+'</option>').appendTo('.select_medicaux_list_'+description_antecedent.id);
                                            },1000);
                                        }
                                    })

                                }else{

                                }
                            })
                        });
                    }

                }
            });

            //get antecedent Habitudes alcoolo-tabagique select_habitudes_list
            $.get('antecedent-search?id='+patient_id_consultation+'&antecedent=Habitudes alcoolo-tabagique' ,function (data) {
                // success data

                if(data.error != null){

                    $("#erreur_alert_33").slideDown(200);
                    setTimeout(function() {
                        $("#erreur_alert_33").slideUp(200);
                    }, 10000);

                }else{

                    var all_element = data.antecedent_familiaux;

                    if(data.antecedent_familiaux_patient.length !=0){

                        $.each(data.antecedent_familiaux_patient, function(index, itemData) {

                            var description_antecedent = itemData;


                            // #familiaux-input
                            setTimeout(function(){
                                $("<div class='row clear_all'><div class='form-group col-md-4 col-xs-offset-1' id='div-select'><select id='select_habitudes_list' class='form-control habitude-list  select_habitudes_list_"+itemData.id+" select-familiaux' name='nom_habitude[]'></select></div><span class='ti-share col-md-1 add-new-select-element-familiaux' data-html='Habitudes alcoolo-tabagique' data-toggle='modal' data-target='#modal_add_element' style='padding-left: 0px;line-height: 2' ></span><input class='form-control col-md-2' name='description_habitude[]' type='text' value='"+ itemData.description+"' style='width: 40%'><span class='di di-trash col-md-1 delete-antecedent'  style='padding-left: 0px;line-height: 2'></span></div>").insertBefore('#habitudes-input');

                            }, 1000);


                            $.get('get-name-element-selected?nom_element_id='+itemData.nom_element_id,function (data) {


                                if(data.nom != null){

                                    $.each(all_element,function (index,element) {

                                        if(element.nom == data.nom){
                                            setTimeout(function(){
                                                $('<option value="'+element.nom+'" selected>'+element.nom+'</option>').appendTo('.select_habitudes_list_'+description_antecedent.id);

                                            },1000);

                                        }else{
                                            setTimeout(function(){
                                                $('<option value="'+element.nom+'">'+element.nom+'</option>').appendTo('.select_habitudes_list_'+description_antecedent.id);
                                            },1000);
                                        }
                                    })

                                }else{

                                }
                            })
                        });
                    }

                }
            });

            //get antecedent Chirurgicaux,Complications select_chirurgicaux_list
            $.get('antecedent-search?id='+patient_id_consultation+'&antecedent=Chirurgicaux,Complications' ,function (data) {
                // success data

                if(data.error != null){

                    $("#erreur_alert_33").slideDown(200);
                    setTimeout(function() {
                        $("#erreur_alert_33").slideUp(200);
                    }, 10000);

                }else{

                    var all_element = data.antecedent_familiaux;

                    if(data.antecedent_familiaux_patient.length !=0){

                        $.each(data.antecedent_familiaux_patient, function(index, itemData) {

                            var description_antecedent = itemData;


                            // #familiaux-input
                            setTimeout(function(){
                                $("<div class='row clear_all'><div class='form-group col-md-4 col-xs-offset-1' id='div-select'><select id='select_chirurgicaux_list' class='form-control complications-list select_chirurgicaux_list_"+itemData.id+" select-familiaux' name='nom_complications[]'></select></div><span class='ti-share col-md-1 add-new-select-element-familiaux' data-html='Chirurgicaux,Complications' data-toggle='modal' data-target='#modal_add_element' style='padding-left: 0px;line-height: 2' ></span><input class='form-control col-md-2' name='description_complications[]' value='"+ itemData.description+"' type='text' style='width: 40%'><span class='di di-trash col-md-1 delete-antecedent'  style='padding-left: 0px;line-height: 2'></span></div>").insertBefore('#chirurgicaux-input');

                            }, 1000);


                            $.get('get-name-element-selected?nom_element_id='+itemData.nom_element_id,function (data) {


                                if(data.nom != null){

                                    $.each(all_element,function (index,element) {

                                        if(element.nom == data.nom){
                                            setTimeout(function(){
                                                $('<option value="'+element.nom+'" selected>'+element.nom+'</option>').appendTo('.select_chirurgicaux_list_'+description_antecedent.id);

                                            },1000);


                                        }else{
                                            setTimeout(function(){
                                                $('<option value="'+element.nom+'">'+element.nom+'</option>').appendTo('.select_chirurgicaux_list_'+description_antecedent.id);
                                            },1000);
                                        }
                                    })

                                }else{

                                }
                            })
                        });
                    }
                }
            });


            // ajax for existing consultation

            $.get('consultation-search?id='+consultation_id_exist ,function (data1) {
                // success data

                if(data1.error != null){

                    $("#erreur_alert_33").slideDown(200);

                    setTimeout(function() {
                        $("#erreur_alert_33").slideUp(200);
                    }, 10000);

                }else{


                    $('#consultation_id').text(data1.id);
                    $('#consultation_id').attr('data-id',data1.id);
                    $('.consultation_id_input').val(data1.id);

                    setTimeout(function(){
                        $("#rendez-vous-panel").hide();
                        $("#consultation-list-panel").hide();
                        $("#rendez-vous-consultation-panel").show();

                    },4500);
                }

            });

        }else{
            $("#erreur_alert_33").slideDown(200);

            setTimeout(function() {
                $("#erreur_alert_33").slideUp(200);
            }, 10000);


        }
    });

    //remplire les information  ajax geting


    $.get('get-consultation-info?consultation_id='+consultation_id_exist ,function (data) {

        if(data.error != null) {
            $("#erreur_alert_33").slideDown(200);

            setTimeout(function() {
                $("#erreur_alert_33").slideUp(200);
            }, 10000);
        }else{

            var consultation = data.consultation;

            //si la consultation a des motifs
            if(data.motifs != null){

                if(data.motifs.length >1){
                    $.each(data.motifs,function (index,reponse) {

                        setTimeout(function(){
                            $("<div class='row clear_all'><div class='form-group col-md-4 col-xs-offset-1'><select id='select_motif_consultation_list' class='form-control familiaux-list select_motifs_consultation_list_"+reponse.id+"' name='nom_motif_consultation[]' ></select></div><span class='ti-share col-md-1 add-new-select-element-familiaux' data-html='Motif Consultation' data-toggle='modal' data-target='#modal_add_element' style='padding-left: 0px;line-height: 2'></span> <input class='form-control col-md-2'  value='"+ reponse.description+"' name='description_motif_consultation[]' type='text' style='width: 40%'><span class='di di-trash col-md-1 delete-antecedent' style='padding-left: 0px;line-height: 2'></span></div>").insertBefore('#motif-consultation-input');
                        },1000);
                        var motif = reponse;

                        setTimeout(function(){
                            $.get('get-name-element-controller-selected?nom_element_id='+reponse.motif_element_id+'&type=MotifsElement',function (data) {

                                $('<option value="'+data.nom+'">'+data.nom+'</option>').appendTo('.select_motifs_consultation_list_'+motif.id);

                            });
                        },1500);

                    });

                }else{
                    setTimeout(function(){
                        $("<div class='row clear_all'><div class='form-group col-md-4 col-xs-offset-1'><select id='select_motif_consultation_list' class='form-control familiaux-list select_motifs_consultation_list_"+data.motifs[0].id+"' name='nom_motif_consultation[]' ></select></div><span class='ti-share col-md-1 add-new-select-element-familiaux' data-html='Motif Consultation' data-toggle='modal' data-target='#modal_add_element' style='padding-left: 0px;line-height: 2'></span> <input class='form-control col-md-2'  value='"+ data.motifs[0].description+"' name='description_motif_consultation[]' type='text' style='width: 40%'><span class='di di-trash col-md-1 delete-antecedent' style='padding-left: 0px;line-height: 2'></span></div>").insertBefore('#motif-consultation-input');
                    },1000);
                    var motif = data.motifs[0];

                    setTimeout(function(){
                        $.get('get-name-element-controller-selected?nom_element_id='+data.motifs[0].motif_element_id+'&type=MotifsElement',function (data) {

                            $('<option value="'+data.nom+'">'+data.nom+'</option>').appendTo('.select_motifs_consultation_list_'+motif.id);

                        });
                    },1000);
                }
            }

            //si la consultation a des examan clinique Générale

            if(data.examan_clinique != null){

                if(data.examan_clinique.length >1){
                    $.each(data.examan_clinique,function (index,reponse) {

                        setTimeout(function(){
                            $("<div class='row clear_all'><div class='form-group col-md-4 col-xs-offset-1'><select id='select_general_list' class='form-control general-list familiaux-list select_general_list_"+reponse.id+"' name='nom_general[]' ></select></div><span class='ti-share col-md-1 add-new-select-element-familiaux' data-html='General' data-toggle='modal' data-target='#modal_add_element' style='padding-left: 0px;line-height: 2'></span> <input class='form-control col-md-2' name='description_general[]' value='"+reponse.description+"' type='text' style='width: 40%'><span class='di di-trash col-md-1 delete-antecedent' style='padding-left: 0px;line-height: 2'></span></div>").insertBefore('#general-input');

                        },1000);
                        var examan = reponse;

                        setTimeout(function(){
                            $.get('get-name-element-controller-selected?nom_element_id='+reponse.element_type_examan_id+'&type=ExamanCliniqueGeneral',function (data) {

                                $('<option value="'+data.nom+'">'+data.nom+'</option>').appendTo('.select_general_list_'+examan.id);

                            });
                        },1500);

                    });

                }else{
                    setTimeout(function(){
                        $("<div class='row clear_all'><div class='form-group col-md-4 col-xs-offset-1'><select id='select_general_list' class='form-control general-list familiaux-list select_general_list_"+data.examan_clinique[0].id+"' name='nom_general[]' ></select></div><span class='ti-share col-md-1 add-new-select-element-familiaux' data-html='General' data-toggle='modal' data-target='#modal_add_element' style='padding-left: 0px;line-height: 2'></span> <input class='form-control col-md-2' name='description_general[]' value='"+data.examan_clinique[0].description+"' type='text' style='width: 40%'><span class='di di-trash col-md-1 delete-antecedent' style='padding-left: 0px;line-height: 2'></span></div>").insertBefore('#general-input');

                    },1000);

                    var examan = data.examan_clinique[0];
                    console.log(examan);

                    setTimeout(function(){
                        $.get('get-name-element-controller-selected?nom_element_id='+data.examan_clinique[0].element_type_examan_id+'&type=ExamanCliniqueGeneral',function (data) {

                            $('<option value="'+data.nom+'">'+data.nom+'</option>').appendTo('.select_general_list_'+examan.id);

                        });
                    },1000);
                }
            }

            //si la consultation a des examan clinique Par Appareil
            if(data.examan_clinique_par_appareil != null){

                if(data.examan_clinique_par_appareil.length >1){
                    $.each(data.examan_clinique_par_appareil,function (index,reponse) {

                        setTimeout(function(){
                            $("<div class='row clear_all'><div class='form-group col-md-4 col-xs-offset-1'><select id='select_par_appareil_list' class='form-control familiaux-list select_par_appareil_list_"+reponse.id+"' name='nom_par_appareil[]' ></select></div><span class='ti-share col-md-1 add-new-select-element-familiaux' data-html='Par Appareil' data-toggle='modal' data-target='#modal_add_element' style='padding-left: 0px;line-height: 2'></span> <input class='form-control col-md-2' name='description_par_appareil[]' value='"+reponse.description+"' type='text' style='width: 40%'><span class='di di-trash col-md-1 delete-antecedent' style='padding-left: 0px;line-height: 2'></span></div>").insertBefore('#par-appareil-input');

                        },1000);
                        var examan = reponse;

                        setTimeout(function(){
                            $.get('get-name-element-controller-selected?nom_element_id='+reponse.element_type_examan_id+'&type=ExamanCliniqueParAppareil',function (data) {

                                $('<option value="'+data.nom+'">'+data.nom+'</option>').appendTo('.select_par_appareil_list_'+examan.id);

                            });
                        },1000);

                    });

                }else{
                    setTimeout(function(){
                        $("<div class='row clear_all'><div class='form-group col-md-4 col-xs-offset-1'><select id='select_par_appareil_list' class='form-control familiaux-list select_par_appareil_list_"+data.examan_clinique_par_appareil[0].id+"' name='nom_par_appareil[]' ></select></div><span class='ti-share col-md-1 add-new-select-element-familiaux' data-html='Par Appareil' data-toggle='modal' data-target='#modal_add_element' style='padding-left: 0px;line-height: 2'></span> <input class='form-control col-md-2' name='description_par_appareil[]' value='"+data.examan_clinique_par_appareil[0].description+"' type='text' style='width: 40%'><span class='di di-trash col-md-1 delete-antecedent' style='padding-left: 0px;line-height: 2'></span></div>").insertBefore('#par-appareil-input');

                    },1000);

                    var examan2 = data.examan_clinique_par_appareil[0];
                    console.log(examan2);

                    setTimeout(function(){
                        $.get('get-name-element-controller-selected?nom_element_id='+data.examan_clinique_par_appareil[0].element_type_examan_id+'&type=ExamanCliniqueParAppareil',function (data) {

                            $('<option value="'+data.nom+'">'+data.nom+'</option>').appendTo('.select_par_appareil_list_'+examan2.id);

                        });
                    },1000);
                }
            }


            //si la consultation a des bilans Paraclinique biologie
            if(data.bilan_biologie != null){

                if(data.bilan_biologie.length >1){
                    $.each(data.bilan_biologie,function (index,reponse) {

                        setTimeout(function(){
                            $("<div class='row clear_all'><div class='form-group col-md-4 col-xs-offset-1'><select id='select_bilan_biologie_list' class='form-control biologie-list select_bilan_biologie_list_"+reponse.id+"' name='nom_biologie[]' ></select></div><span class='ti-share col-md-1 add-new-select-element-familiaux' data-html='Biologie' data-toggle='modal' data-target='#modal_add_element' style='padding-left: 0px;line-height: 2'></span> <input class='form-control col-md-2' name='description_biologie[]'  value='"+reponse.description+"' type='text' style='width: 40%'><span class='di di-trash col-md-1 delete-antecedent' style='padding-left: 0px;line-height: 2'></span></div>").insertBefore('#bilan-biologie-input');

                        },1500);
                        var examan = reponse;


                        setTimeout(function(){
                            $.get('get-name-element-controller-selected?nom_element_id='+reponse.element_type_bilan_id+'&type=BilanAntecedentBiologie',function (data) {

                                $('<option value="'+data.nom+'">'+data.nom+'</option>').appendTo('.select_bilan_biologie_list_'+examan.id);

                            });
                        },1500);

                    });

                }else{
                    setTimeout(function(){
                        $("<div class='row clear_all'><div class='form-group col-md-4 col-xs-offset-1'><select id='select_bilan_biologie_list' class='form-control biologie-list select_bilan_biologie_list_"+data.bilan_biologie[0].id+"' name='nom_biologie[]' ></select></div><span class='ti-share col-md-1 add-new-select-element-familiaux' data-html='Biologie' data-toggle='modal' data-target='#modal_add_element' style='padding-left: 0px;line-height: 2'></span> <input class='form-control col-md-2' name='description_biologie[]'  value='"+data.bilan_biologie[0].description+"' type='text' style='width: 40%'><span class='di di-trash col-md-1 delete-antecedent' style='padding-left: 0px;line-height: 2'></span></div>").insertBefore('#bilan-biologie-input');

                    },1500);

                    var examan1 = data.bilan_biologie[0];


                    setTimeout(function(){
                        $.get('get-name-element-controller-selected?nom_element_id='+data.bilan_biologie[0].element_type_bilan_id+'&type=BilanAntecedentBiologie',function (data) {

                            $('<option value="'+data.nom+'">'+data.nom+'</option>').appendTo('.select_bilan_biologie_list_'+examan1.id);

                        });
                    },1500);
                }
            }

            //si la consultation a des bilans Paraclinique radiologie
            if(data.bilan_radiologie != null){

                if(data.bilan_radiologie.length >1){
                    $.each(data.bilan_radiologie,function (index,reponse) {

                        setTimeout(function(){
                            $("<div class='row clear_all'><div class='form-group col-md-4 col-xs-offset-1'><select id='select_bilan_radiologie_list' class='form-control radiologie-list select_bilan_radiologie_list_"+reponse.id+"' name='nom_radiologie[]' ></select></div><span class='ti-share col-md-1 add-new-select-element-familiaux' data-html='Radiologie' data-toggle='modal' data-target='#modal_add_element' style='padding-left: 0px;line-height: 2'></span> <input class='form-control col-md-2' name='description_radiologie[]' value='"+reponse.description+"'  type='text' style='width: 40%'><span class='di di-trash col-md-1 delete-antecedent' style='padding-left: 0px;line-height: 2'></span></div>").insertBefore('#bilan-radiologie-input');

                        },1000);

                        var examan4 = reponse;
                        setTimeout(function(){
                            $.get('get-name-element-controller-selected?nom_element_id='+reponse.element_type_bilan_id+'&type=BilanAntecedentRadiologie',function (data) {

                                $('<option value="'+data.nom+'">'+data.nom+'</option>').appendTo('.select_bilan_radiologie_list_'+examan4.id);

                            });
                        },1000);

                    });

                }else{
                    setTimeout(function(){
                        $("<div class='row clear_all'><div class='form-group col-md-4 col-xs-offset-1'><select id='select_bilan_radiologie_list' class='form-control radiologie-list select_bilan_radiologie_list_"+data.bilan_radiologie[0].id+"' name='nom_radiologie[]' ></select></div><span class='ti-share col-md-1 add-new-select-element-familiaux' data-html='Radiologie' data-toggle='modal' data-target='#modal_add_element' style='padding-left: 0px;line-height: 2'></span> <input class='form-control col-md-2' name='description_radiologie[]' value='"+data.bilan_radiologie[0].description+"'  type='text' style='width: 40%'><span class='di di-trash col-md-1 delete-antecedent' style='padding-left: 0px;line-height: 2'></span></div>").insertBefore('#bilan-radiologie-input');

                    },1000);

                    var examan3 = data.bilan_radiologie[0];
                    console.log(examan3);


                    setTimeout(function(){
                        $.get('get-name-element-controller-selected?nom_element_id='+data.bilan_radiologie[0].element_type_bilan_id+'&type=BilanAntecedentRadiologie',function (data) {

                            $('<option value="'+data.nom+'">'+data.nom+'</option>').appendTo('.select_bilan_radiologie_list_'+examan3.id);

                        });
                    },1000);
                }
            }

            //si la consultation a un certificat medical
            if((data.certifica_medical != -1)&&(data.certifica_medical != null)){


                var examan5 = data.certifica_medical;

                $('#Durée_par_jour').text(examan5.duree_par_jour);

                var date = new Date(examan5.de);
                var date2 = new Date(examan5.a);


                $("#date_du").val(date.getDate() + '/' + (date.getMonth() + 1)+ '/' +  date.getFullYear());

                $('#date_au').val(date2.getDate() + '/' + (date2.getMonth() + 1)+ '/' +  date2.getFullYear());

                setTimeout(function(){
                    $.get('get-name-element-controller-selected?nom_element_id='+examan5.type_certification_id+'&type=TypeCertificat',function (data) {

                        console.log(data);
                        $('<option value="'+data.nom+'">'+data.nom+'</option>').appendTo('div #select_type_certificat');

                    });
                },1050);


            }

            // si la consultation a une ordonnance avec medicament
            if((data.ordonnance_detail != null)&&(data.ordonnance_detail != -1)){

                if(data.ordonnance_detail.length >1){

                    $.each(data.ordonnance_detail,function (index,reponse) {

                        var ordonnance = reponse;

                        setTimeout(function(){
                            $.get('get-name-element-controller-selected?nom_element_id='+reponse.medicament_id+'&type=Medicament',function (data) {

                                $("<tr class='click_edit_delete ordo-"+reponse.id+"' data-id='"+reponse.id+"' data-medicament='"+data.nom+"' data-quantite='"+reponse.quantite+"' data-prise='"+reponse.prise+"' data-periode='"+reponse.periode+"' data-nombre-par-jour='"+reponse.nombre_par_jour+"' data-quand='"+reponse.quand+"' data-remarque='"+reponse.remarque+"'  ><td class='open-modal-edit' data-toggle='modal-float' data-target='#fModalRightOne'>"+data.nom+"</td><td class='open-modal-edit' data-toggle='modal-float' data-target='#fModalRightOne'>"+reponse.quantite+"</td><td class='open-modal-edit' data-toggle='modal-float' data-target='#fModalRightOne'>"+reponse.prise+"</td><td class='open-modal-edit' data-toggle='modal-float' data-target='#fModalRightOne'>"+reponse.periode+"</td><td class='open-modal-edit' data-toggle='modal-float' data-target='#fModalRightOne'>"+reponse.nombre_par_jour+"</td><td class='open-modal-edit' data-toggle='modal-float' data-target='#fModalRightOne'>"+reponse.quand+"</td><td class='open-modal-edit' data-toggle='modal-float' data-target='#fModalRightOne'>"+reponse.remarque+"</td><td><a class='btn btn-social-icon btn-xs btn-google btn-lg delete-medicament-ordonnance' data-id='"+reponse.id+"' ><span class='fa fa-trash'></span></a></td></tr>").appendTo("#ajouter_un_element_ordonnance_insert");

                            });

                        },600);

                    });

                }else{
                    var ordonnance_one = data.ordonnance_detail[0];
                    setTimeout(function(){
                        $.get('get-name-element-controller-selected?nom_element_id='+ordonnance_one.medicament_id+'&type=Medicament',function (data) {

                            $("<tr class='click_edit_delete ordo-"+ordonnance_one.id+"' data-id='"+ordonnance_one.id+"' data-medicament='"+data.nom+"' data-quantite='"+ordonnance_one.quantite+"' data-prise='"+ordonnance_one.prise+"' data-periode='"+ordonnance_one.periode+"' data-nombre-par-jour='"+ordonnance_one.nombre_par_jour+"' data-quand='"+ordonnance_one.quand+"' data-remarque='"+ordonnance_one.remarque+"'  ><td class='open-modal-edit' data-toggle='modal-float' data-target='#fModalRightOne'>"+data.nom+"</td><td class='open-modal-edit' data-toggle='modal-float' data-target='#fModalRightOne'>"+ordonnance_one.quantite+"</td><td class='open-modal-edit' data-toggle='modal-float' data-target='#fModalRightOne'>"+ordonnance_one.prise+"</td><td class='open-modal-edit' data-toggle='modal-float' data-target='#fModalRightOne'>"+ordonnance_one.periode+"</td><td class='open-modal-edit' data-toggle='modal-float' data-target='#fModalRightOne'>"+ordonnance_one.nombre_par_jour+"</td><td class='open-modal-edit' data-toggle='modal-float' data-target='#fModalRightOne'>"+ordonnance_one.quand+"</td><td class='open-modal-edit' data-toggle='modal-float' data-target='#fModalRightOne'>"+ordonnance_one.remarque+"</td><td><a class='btn btn-social-icon btn-xs btn-google btn-lg delete-medicament-ordonnance' data-id='"+ordonnance_one.id+"' ><span class='fa fa-trash'></span></a></td></tr>").appendTo("#ajouter_un_element_ordonnance_insert");

                        });

                    },600);
                }
            }


            // si la consultation a un bilan final de type Radiologie
            if((data.bilan_radiologie_consultation != null )&&(data.bilan_radiologie_consultation != -1)){

                if(data.bilan_radiologie_consultation.length == 1){

                    $('#rc-bilan-radiologie-input').text(data.bilan_radiologie_consultation[0].rc);

                    setTimeout(function(){
                        $.get('get-name-bilan-element-controller-selected?nom_prestataire_id='+data.bilan_radiologie_consultation[0].prestataire_id+'&type=BilanConsultationRadiologie&type_bilan_consultation='+data.bilan_radiologie_consultation[0].type_bilan_consultation_id ,function (data) {

                            $('<option value="'+data.nom_prestataire+'">'+data.nom_prestataire+'</option>').appendTo('#select_prestateur_list_all_radiologie');
                            $('<option value="'+data.nom_type_bilan+'">'+data.nom_type_bilan+'</option>').appendTo('#select_type_list_all_radiologie');

                        });
                    },1500);
                }
            }

            // si la consultation a un bilan final de type Biolgoie
            if((data.bilan_biologie_consultation != null )&&(data.bilan_biologie_consultation != -1)){

                if(data.bilan_biologie_consultation.length == 1){

                    $('#rc-bilan-biologie-input').text(data.bilan_biologie_consultation[0].rc);

                    setTimeout(function(){
                        $.get('get-name-bilan-element-controller-selected?nom_prestataire_id='+data.bilan_biologie_consultation[0].prestataire_id+'&type=BilanConsultationBiologie&type_bilan_consultation='+data.bilan_biologie_consultation[0].type_bilan_consultation_id ,function (data) {

                            $('<option value="'+data.nom_prestataire+'">'+data.nom_prestataire+'</option>').appendTo('#select_prestateur_list_all_biologie');
                            $('<option value="'+data.nom_type_bilan+'">'+data.nom_type_bilan+'</option>').appendTo('#select_type_list_all_biologie');

                        });
                    },2000);
                }
            }

            $('#remarque_consultation').text(consultation.remarque);
        }
    });


});


// partie Imprimer bilan Radiologie  et Biologie .



$("#btn_imprime_radiologie").on('click',function(){
    var doc = new jsPDF();
    $("#bilan_name_saved").text('Radiologie');
    $('#nom_prestataire_imprimer').text($('#select_prestateur_list_all_radiologie').val());
    $('#type_bilan_imprimer').text($('#select_type_list_all_radiologie').val());
    $('#remarque_bilan_imprimer').text($('#rc-bilan-radiologie-input').val());

    doc.fromHTML($('#imprimer_bilan_panel').html(), 15, 15, {
        'width': 170
    });
    doc.save('sample-file.pdf');

});

$("#btn_imprime_biologie").on('click',function () {
    var doc = new jsPDF();
    $("#bilan_name_saved").text('Biologie');
    $('#nom_prestataire_imprimer').text($('#select_prestateur_list_all_biologie').val());
    $('#type_bilan_imprimer').text($('#select_type_list_all_biologie').val());
    $('#remarque_bilan_imprimer').text($('#rc-bilan-biologie-input').val());


    doc.fromHTML($('#imprimer_bilan_panel').html(), 15, 15, {
        'width': 170

    });
    doc.save('sample-file.pdf');
});



// Delete consultation by admin just transfer data to modal

$(document).on('click','td > #btn_delete_consultation',function () {

    $('#delete_confirmation_btn_oui').attr('data-id',$(this).data('id'));
    $('#delete_confirmation_btn_oui').attr('data-type',$(this).data('type'));
    // la suite du code dur le modal delete et sur le fichier js rendez_vous . Merci [ #delete_confirmation_btn_oui ]
});




