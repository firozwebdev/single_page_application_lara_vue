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
                    @click="create">Create</button>
                </div>
            </div>
        </div>
    </div>
</template>
<style>

</style>
<script type="text/babel">
    export default{
        data(){
            return {
                product:{
                    name: '',
                    price: 0,
                    description:''
                }
            }
        },
        methods:{
            create(){
                this.$http.post('api/products',this.product)
                        .then(function(res){

                            this.$router.push('/feed');
                        });
            }
        }
    }
</script>