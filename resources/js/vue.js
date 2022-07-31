window.Vue = require('vue').default;


import Toasted from 'vue-toasted';

// you can also pass options, check options reference below
Vue.use(Toasted, {
  position: 'top-right',
  duration: 2500,
})

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('text-input', require('./components/Inputs/TextInput.vue').default);
Vue.component('side-modal', require('./components/SideModal.vue').default);

Vue.component('add-player', require('./components/AddPlayer.vue').default);
Vue.component('data-import', require('./components/DataImport.vue').default);
Vue.component('fetch-players', require('./components/FetchPlayers.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});
