var Vue = require('vue');

Vue.use(require('vue-resource'));

new Vue({
    el: '#app',

    data: {
        currentView: 'quote'
    },

    components: {
        'quote': require('./components/Material')
    }
});