
Vue.http.headers.common['X-CSRF-TOKEN'] = $("#token").attr("value");


 new Vue({
 el : '#manage-vue',
 data : {
 items:[],
 newItem : {
 'cin':'',
 'nom':'',
 'prenom':'',
 'email':'',
 'tel1':'',
 'tel2':'',
 'sexe':'',
 'date_naissance':'',
 'ville':'',
 'ville2':'',
 'mutuelle_check':'',
 'mutuelle_input':''
 }
 }

 });
