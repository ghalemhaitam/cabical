
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

//Vue.component('example', require('./components/Example.vue'));
//Vue.component('patient',require('./components/Patient.vue'));

const app = new Vue({
    el : '#manage-vue',
    data : {
        items: []
    },
    mounted () {
        //this.GetTableData();
        axios.get('get_patient').then(response => {

         this.items = response.data;


    });
    }
    ,

    methods: {
        GetTableData: function() {
            /*
             this.$http.get('/get_patient').then(function (response) {
             // success callback
             console.log(response);

             }, function (response) {
             // error callback
             });
             */
        }
    },
    created() {

    }
});




