<template>
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="form-group">
                        <input type="text" v-model="name" placeholder="Name" class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="email" v-model="email" placeholder="Email" class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="password" v-model="password" placeholder="Password" class="form-control">
                    </div>
                    <button  class="btn btn-success pull-right">Login</button>

                </div>
            </div>
        </div>

    </div>
</template>
<script>
    export default {
        data(){
            return {
                name: '',
                email: '',
                password: '',
            }
        },


    }
</script>
<style>

</style>