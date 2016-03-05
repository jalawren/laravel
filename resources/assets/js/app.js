var Vue = require('vue');

import JasonInput from './components/JasonInput.vue';

new Vue({

    el: '#app',


    data: {

        x: 0,
        y: 0,
        key: '',
        page: 1,
        page1: true,
        page2: false,
        page3: false
    },

    components: {

        'test-input' : JasonInput
    },
    methods: {

        setTrue: function() {
            if (this.page1 === true) {
                this.page2 = true;
                this.page1 = false;
            }
        },

        updateCoordinates: function(e) {
            this.x = e.clientX;
            this.y = e.clientY;
        },
        updateKey: function(e) {
            this.key = e.keyCode;

        }
    },


    ready() {

        console.log('Application Ready');
    }

});
