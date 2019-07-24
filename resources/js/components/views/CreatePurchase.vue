<template>
    <div>
        <h1 class="mb-4">New purchase</h1>

        <form @submit.prevent="createPurchase">
            <div class="form-group">
                <label for="offering">Offering</label>
                <select id="offering" class="form-control" v-model="purchase.offering_id">
                    <option v-for="offering in offerings" :value="offering.id">{{ offering.title }}</option>
                </select>
            </div>
            <div class="form-group">
                <label for="customer">Customer name</label>
                <input type="text" class="form-control" v-model="purchase.customer_name" id="customer">
            </div>
            <div class="form-group">
                <label for="quantity">Quantity</label>
                <input type="number" min="0" class="form-control" v-model.number="purchase.quantity" id="quantity">
            </div>
            <div class="form-group">
                <label for="total">Total</label>
                <input class="form-control" type="text" :placeholder="total" readonly id="total">
            </div>
            <button type="submit" class="btn btn-success">Create</button>
        </form>

        <div v-if="errors.length">
            <div class="card my-2 bg-warning" v-for="error in errors">
                <div class="card-header">
                    {{ error }}
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "CreatePurchase",
        data () {
            return {
                purchase: {
                    customer_name: '',
                    quantity: 1,
                    offering_id: null
                },
                offerings: [],
                errors: []
            }
        },
        computed: {
            total () {
                if (this.purchase.offering_id === null)
                    return 0;
                if (!this.offerings.some(o => o.id === this.purchase.offering_id))
                    return 0;
                return this.offerings.find(o => o.id === this.purchase.offering_id).price * Number(this.purchase.quantity);
            }
        },
        created () {
            axios.get('/offerings').then(res => {
                this.offerings = res.data;
            });
        },
        methods: {
            createPurchase () {
                this.errors = [];
                axios.post('/purchases', {
                    customer_name: this.purchase.customer_name,
                    quantity: this.purchase.quantity,
                    offering_id: this.purchase.offering_id
                }).then(res => {
                    window.location.href = '/view-purchases';
                }).catch(e => {
                    for (let err in e.response.data.errors) {
                        this.errors.push(e.response.data.errors[err][0])
                    }
                });
            }
        }
    }
</script>

<style scoped>

</style>