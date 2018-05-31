
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('product-component', require('./components/ProductComponent.vue'));
Vue.component('products-bucket-component', require('./components/ProductsBucketComponent.vue'));
Vue.component('summary-row-component', require('./components/SummaryRowComponent.vue'));

const app = new Vue({
    el: '#app',
    data: {
        products: [],
        summary: {
            'totalQuantity': 0,
            'totalPrice': 0,
            'totalValue': 0
        }
    },
    methods: {
        getExistingProducts()
        {
            var _vueObj = this;
            axios.get(
                '/getallproducts'
            ).then(function(response) {

                _vueObj.products = response.data.products;
                if (_vueObj.products != null && _vueObj.products.length > 0) {

                    _vueObj.summary.totalQuantity = 0;
                    _vueObj.summary.totalPrice = 0;
                    _vueObj.summary.totalValue = 0;

                    for (var i =0; i < _vueObj.products.length; i++) {
                        _vueObj.summary.totalQuantity = parseInt(_vueObj.summary.totalQuantity) + parseInt(_vueObj.products[i].quantity);
                        var _tmp_result = parseFloat(_vueObj.summary.totalPrice) + parseFloat(_vueObj.products[i].price);
                        _vueObj.summary.totalPrice = _tmp_result;
                        _vueObj.summary.totalValue += (_vueObj.products[i].quantity * _vueObj.products[i].price);
                    }
                    $('.existing-products').show();
                }
            });
        }

},
    created() {

        this.getExistingProducts();
        var _vueObj = this;

        $(document).on('click', '#products-form button[type="submit"]', function(e){

            $('.error-message').css('opacity', '0');

            e.preventDefault();

            var _name = $('#productName').val();
            var _quantity = $('#quantityInStock').val();
            var _price = $('#pricePerItem').val();

            // check if data exists and correct
            if (_name != '' &&  (_quantity != '' && !isNaN(_quantity)) && (_price != '' && !isNaN(_price))) {
                axios.post( // send and save new product data
                    '/store',
                    {name:_name, quantity: parseInt(_quantity), price: parseInt(_price)}
                ).then(function(response) { // get all products
                        _vueObj.getExistingProducts();
                        $('#productName').val('');
                        $('#quantityInStock').val('');
                        $('#pricePerItem').val('');
                    });
            }
            else {
                $('.error-message').css('opacity','1');
            }

        });
    }
});


