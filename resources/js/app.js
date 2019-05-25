
require('./bootstrap');

window.Vue = require('vue');

import BootstrapVue from 'bootstrap-vue'

import VueProgressBar from 'vue-progressbar'
Vue.use(VueProgressBar, {
    color: 'rgb(143, 255, 199)',
    failedColor: 'red',
    height: '3px'
  })

import Swal from 'sweetalert2'
window.swal = Swal;

const Toast = Swal.mixin({
    toast: true,
    position: 'center',
    showConfirmButton: false,
    timer: 3000
  });

  window.Toast = Toast;

  const Alert = Swal.mixin({
    toast: false,
    position: 'center',
    showConfirmButton: true,
  });

  window.Alert = Alert;


Vue.use(BootstrapVue);



Vue.component('meal-header', require('./components/meal-header'));

Vue.component('tabs', require('./components/tabs'));

Vue.component('tab', require('./components/tab'));

Vue.component('how_it_work_modal', require('./components/how_it_work_modal'));
//ME
Vue.component('question', require('./components/question'));

Vue.component('tow_person_plan', require('./components/tow_person_plan'));

Vue.component('family_plan', require('./components/family_plan'));

Vue.component('gifts_content', require('./components/gifts_content'));

Vue.component('recipe_reaction', require('./components/recipe_reaction'));

Vue.component('recipe_ingredients', require('./components/recipe_ingredients'));

Vue.component('sign_up', require('./components/sign_up'));

Vue.component('sign_up_plan', require('./components/sign_up_plan'));

Vue.component('cookbook', require('./components/cookbook'));

Vue.component('testimonial_section', require('./components/testimonial_section'));

Vue.component('recipe_plan', require('./components/recipe_plan'));

Vue.component('price_show', require('./components/price_show'));


const app = new Vue({

    el: '#app',
    data() {
        return {
            planId:"",
            servingCost:"",
            weekCost:"",
            shippingCost:"",
            total:"",
            serve:"",
            title:"",
            step:1,
        }
    },

});
