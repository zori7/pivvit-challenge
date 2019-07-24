<template>
    <div>
        <h1 class="mb-4">Purchases</h1>

        <a class="btn btn-primary" href="/purchases/create">Create</a>

        <div>
            <div class="card my-2" v-for="purchase in purchases">
                <div class="card-header">
                    Purchase #{{ purchase.id }} for {{ purchase.offering.title }}
                </div>
                <div class="card-body">
                    <p>Quantity: {{ purchase.quantity }}</p>
                    <p>Unit price: {{ purchase.unitPrice }}</p>
                    <p>Total: {{ purchase.total }}</p>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "OfferingsComponent",
        data () {
            return {
                purchases: []
            }
        },
        created () {
            axios.get('/purchases').then(res => {
                this.purchases = res.data;
            });
        }
    }
</script>

<style scoped>

</style>