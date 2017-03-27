<template>
    <div class="col-md-4">
        <div class="thumbnail">
            <img src="https://encrypted-tbn1.gstatic.com/images?q=tbn:ANd9GcRx5xjw2nOpS7RU9STVzMmGh_FONseDGL5vLVpdpVx-6avQo1Pxdg" alt="">

            <div class="caption">
                {{ product.user_id }}
                <h3>{{product.name}}</h3>
                <p>$ {{product.price}}</p>
                <hr>
                <p>
                    <!--<a href="#" class="btn btn-default">
                        Wishlist
                    </a>-->
                    <a href="#" class="btn btn-success">Buy</a>
                    <span v-if="product.user_id == authenticatedUser.id">
                         <router-link  class="btn btn-warning" :to="'/products/' + product.id + '/edit'">Edit</router-link>
                        <a href="#" class="btn btn-danger" role="button"  @click="$emit('delete-product')">Delete</a>

                    </span>
                </p>

            </div>
        </div>

    </div>
</template>
<script>

    export default{
        props:['product','authenticatedUser'],

    }

</script>