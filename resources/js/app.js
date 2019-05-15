
require('./bootstrap');

window.Vue = require('vue');

import BootstrapVue from 'bootstrap-vue'

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

Vue.component('cookbook', require('./components/cookbook'));

Vue.component('testimonial_section', require('./components/testimonial_section'));

Vue.component('recipe_plan', require('./components/recipe_plan'));

const app = new Vue({

    el: '#app',

});
