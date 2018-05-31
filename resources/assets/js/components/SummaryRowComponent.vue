<template lang="html">
    <div class="row summary">
        <div class="col-md-3"></div>
        <div class="col-md-3"><strong>{{ summary.totalQuantity }}</strong></div>
        <div class="col-md-2"><strong>{{ summary.totalPrice }}</strong></div>
        <div class="col-md-2"></div>
        <div class="col-md-2"><strong>{{ summary.totalValue}}</strong></div>
    </div>
</template>

<script>
    export default {
        props: ['summary']
    }
</script>
