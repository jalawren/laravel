module.exports = {
    template: require('./material.template.html'),

    //props: ['when-applied'],

    data: function() {
        return {
            material: {
                id: '',
                description: '',
                emg: '',
                cost: 0
            },

            valid: false
        };
    },

    methods: {
        find_material: function() {
            this.$http.get('/materials/97100206')
                .success(function(material) {
                    this.material = material;
                    this.valid = true;

                  //  this.whenApplied(coupon.discount);
                })
                .error(function() {
                    this.material.id = '';
                    this.material.description = 'Sorry, that material does not exist.';
                });
        }
    }
};