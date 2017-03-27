<template>
    <div>
        <my-product v-for="product in products"
                    :product="product"
                    @delete-product="deleteProduct(product)"
                     :authenticatedUser="authenticatedUser"></my-product>

    </div>
</template>
<script>
    import Product from './Product.vue'
    import swal from 'sweetalert'
    export default{
        data(){
            return {
                products: [],

            }
        },

        components: {
            'my-product': Product
        },

        computed: {
            authenticatedUser(){
                return this.$auth.getAuthenticatedUser();
            }
        },

        created(){
            this.$http.get('api/products')
                .then(function (res) {
                    this.products = res.body
                })
        },


        methods: {
            deleteProduct (product) {
                swal({
                    title: "Are you sure?",
                    text: "You will not be able to recover this product!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Yes, delete it!",
                    closeOnConfirm: false
                },
                function(){
                    this.$http.delete('api/products/'+ product.id)
                        .then(res =>{
                            let index = this.products.indexOf(product)
                            this.products.splice(index,1)

                            swal("Deleted!", "Your product file has been deleted.", "success");
                    })

                }.bind(this));
            }

        }
    }
</script>