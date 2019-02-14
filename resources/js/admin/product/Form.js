import AppForm from '../app-components/Form/AppForm';

Vue.component('product-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                brand_id:  '' ,
                sku:  '' ,
                name:  '' ,
                msrp:  '' ,
                price:  '' ,
                wholesale_price:  '' ,
                discount_available:  false ,
                discount:  '' ,
                enabled:  true ,
                available_date:  '' ,
                units_in_stock:  '' ,
                units_on_order:  0 ,
                minimal_quantity:  1 ,
                width:  '' ,
                height:  '' ,
                depth:  '' ,
                weight:  '' ,
                description:  '' ,
                images:  '' ,
                note:  '' ,
                
            }
        }
    }

});