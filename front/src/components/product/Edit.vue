<template>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" v-model="product.name">
                    </div>
                    <div class="form-group">
                        <label>Price</label>
                        <input type="number" class="form-control" v-model="product.price">
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea  class="form-control" v-model="product.description"></textarea>
                    </div>
                    <button class="btn btn-success pull-right"
                            v-show="product.name && product.price && product.description"
                            @click="update">Update</button>
                </div>
            </div>
        </div>
    </div>
</template>
<style>

</style>
<script type="text/babel">
    import swal from 'sweetalert'
    export default{

        data(){
            return {
                product:{}
            }
        },
        created(){
            this.getProduct()
        },
        methods:{
            getProduct(){
              this.$http.get('api/products/' + this.$route.params.product)
                  .then(function(res){
                      this.product = res.body
                  })
            },
            update(){
                this.$http.put('api/products/'+ this.$route.params.product, this.product)
                    .then(function(res){

                        swal("Updated","Your product has been udpated !","success");
                    });
            }
        }
    }
</script>