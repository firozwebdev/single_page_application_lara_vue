<template>
    <div class="header clearfix">
        <nav>
            <ul class="nav nav-pills pull-right">
                <router-link to="/login" tag="li" v-if=" ! isAuth">
                    <a>Login</a>
                </router-link>

                <router-link to="/register" tag="li" v-if=" ! isAuth">
                    <a>Register</a>
                </router-link>
                <router-link to="/feed" tag="li" v-if="isAuth">
                    <a>Feed</a>
                </router-link>
                <router-link to="/products/create" tag="li" v-if="isAuth">
                    <a>Create</a>
                </router-link>
                <router-link to="/logout" tag="li" v-if="isAuth">
                    <a>Logout</a>
                </router-link>

            </ul>
        </nav>
        <h3 class="text-muted">Project name</h3>
    </div>
</template>
<script>
 export default{
     data(){
        return {
            isAuth: null
        }
     },
    created(){
        this.isAuth = this.$auth.isAuthenticated()
        this.setAuthenticatedUser()
    },
    methods:{
        setAuthenticatedUser(){
           this.$http.get('api/user')
                   .then(function(res){
                       this.$auth.setAuthenticatedUser(res.body)
                       console.log(this.$auth.getAuthenticatedUser())
                   })
        }
    }
 }
</script>
<style>

</style>