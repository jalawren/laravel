import Vue from 'vue';

Vue.use(require('vue-resource'));

import Print   from './components/Print.vue';
import Layout  from './components/Layout.vue';
import Support from './components/Support.vue';


Vue.transition('fade', {
    enterClass: 'fadeInUp',
    leaveClass: 'fadeOutUp'
});



new Vue({

    el: '#app',

    components: {
        Print,
        Layout,
        Support
    },

    data: {

        pos: {
            x: 0,
            y: 0
        }

    }
});