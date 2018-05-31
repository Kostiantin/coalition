<template lang="html">
    <div class="products-bucket">
        <product-component v-for="product in products" v-bind:product="product" v-bind:key="product.id"></product-component>
    </div>
</template>

<script>
    export default {
        props: ['products']
    }
</script>
