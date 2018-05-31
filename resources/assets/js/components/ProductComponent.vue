<template lang="html">
    <div class="row product">
        <div class="col-md-3">{{ product.name }}</div>
        <div class="col-md-3">{{ product.quantity }}</div>
        <div class="col-md-2">{{ product.price }}</div>
        <div class="col-md-2">{{ product.date_added }}</div>
        <div class="col-md-2">{{ product.quantity * product.price}}</div>
    </div>
</template>

<script>
    export default {
        props: ['product']
    }
</script>
