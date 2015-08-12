
module.exports = {

    template: require('./quote.template.html'),

    data: function() {
        return {
            //cost: 0
            //discount: 0
        };
    },

    components: {
        material: require('../components/Material')
    },

    filters: {
        //material: function(cost) {
        //    return cost / 0.454;
        //}
    },

    methods: {
        //applyDiscount: function(discount) {
        //    this.discount = discount;
        //}
    }
};