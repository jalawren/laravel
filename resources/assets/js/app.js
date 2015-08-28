var Vue = require('vue');

Vue.use(require('vue-resource'));

new Vue({

    el:'#price-quote',

    ready: function() {
    //

    },

    data: {

        customer_id: "",
        material_id: "",

        material_valid: false,
        customer_valid: false,
        cmir_valid: false
    },

    methods: {

        /**
         * Runs Ajax server requests
         */
        update: function () {

            this.getCustomers();
            this.getMaterials();
            this.getCustomerMaterials();
            this.getBoms();
            this.getBase();
        },

        /*
         * Resets Form
         */
        reset: function () {

            this.$set('customer_id', "");
            this.$set('material_id', "");

            this.$set('customer_valid', false);
            this.$set('material_valid', false);
            this.$set('cmir_valid', false);
        },

        /**
         * Call Material AJAX request
         */
        getMaterials: function () {

            this.$http.get('/materials/' + this.material_id)

                .success(function (material) {

                    this.$set('material', material);
                    this.$set('material_valid', true);
                })

                .error(function () {

                    this.$set('material', null);
                    this.$set('material_valid', false);
                });
        },

        /**
         * Boms AJAX
         */
        getBoms: function () {

            this.$http.get('/boms/' + this.material_id, function (boms) {

                this.$set('boms', boms);
            });

        },

        getBase: function () {

            this.$http.get('/boms/base/' + this.material_id, function (base) {

                this.$set('base', base);
            });
        },

        /**
         * Customer AJAX
         */
        getCustomers: function () {

            this.$http.get('/customers/' + this.customer_id)

                .success(function (customer) {

                    this.$set('customer', customer);
                    this.$set('customer_valid', true);
                  })

                .error(function () {

                    this.$set('customer', null);
                    this.$set('customer_valid', false);
                });
        },

        /**
         * CMIR AJAX
         */
        getCustomerMaterials: function () {

            this.$http.get('/cmir/' + this.customer_id + "/" + this.material_id)

                .success(function (customer_material) {

                    this.$set('customer_material', customer_material);
                    this.$set('cmir_valid', true);
                })

                .error(function () {

                    this.$set('customer_material', null);
                    this.$set('cmir_valid', false);
                });
        }
    }
});

