<template>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">Prepare Order</div>

                    <div class="card-body">
                        <form :action="route" method="post" id="order-form">
                            <div hidden>
                                <input type="text" name="productid" value="" v-model="data.product.id">
                                <input type="text" name="total" value="" v-model="fields.total">
                                <input type="hidden" name="_token" :value="csrf">
                            </div>
                            <form-wizard @on-complete="sendOrder" title="Order Preparation" subtitle="" color="#1d2124" finish-button-text="Send">
                                <tab-content title="Quantity" :before-change="validateQuantityTab">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="row mb-5">
                                                <label class="col-2"><strong>Product: </strong></label>
                                                <div class="col-10">{{this.data.product.name}}</div>
                                            </div>
                                            <div class="row mb-5">
                                                <label class="col-2"><strong>Price: </strong></label>
                                                <div class="col-10">{{this.data.product.price}} {{this.data.product.currency}}</div>
                                            </div>
                                            <div class="row mb-5">
                                                <label class="col-2"><strong>Vendor: </strong></label>
                                                <div class="col-10">{{this.data.vendor.name}}</div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="row mb-5">
                                                <label><strong>Description: </strong></label>
                                                <div class="col-12">{{this.data.product.description}}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row justify-content-end">
                                        <label class="col-2 text-right"><strong>Quantity: </strong></label>
                                        <div class="col-2">
                                            <input type="number" class="form-control" name="quantity" v-model="fields.quantity" value="" min="1" required>
                                        </div>
                                    </div>
                                </tab-content>
                                <tab-content title="Shipping Address" :before-change="validateShippingTab">
                                    <div class="form-group row justify-content-center">
                                        <label class="col-2 text-right"><strong>Shipping Address: </strong></label>
                                        <div class="col-8">
                                            <input type="text" class="form-control" name="shipping" v-model="fields.shipping" value="" required>
                                        </div>
                                    </div>
                                </tab-content>
                                <tab-content title="Billing Address" :before-change="validateBillingTab">
                                    <div class="form-group row justify-content-center">
                                        <label class="col-2 text-right"><strong>Billing Address: </strong></label>
                                        <div class="col-8">
                                            <input type="text" class="form-control" name="billing" v-model="fields.billing" value="" required>
                                        </div>
                                        <div class="col-2">
                                            <button class="btn btn-default" v-on:click="copyAddres" data-toggle="tooltip" data-placement="top" title="Copy Shipping Address"> <i class="far fa-copy"></i></button>
                                        </div>
                                    </div>
                                </tab-content>
                                <tab-content title="Confirmation">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="row mb-5">
                                                <label class="col-2"><strong>Product: </strong></label>
                                                <div class="col-10">{{this.data.product.name}}</div>
                                            </div>
                                            <div class="row mb-5">
                                                <label class="col-2"><strong>Price: </strong></label>
                                                <div class="col-10">{{this.data.product.price}} {{this.data.product.currency}}</div>
                                            </div>
                                            <div class="row mb-5">
                                                <label class="col-2"><strong>Vendor: </strong></label>
                                                <div class="col-10">{{this.data.vendor.name}}</div>
                                            </div>
                                            <div class="row justify-content-left">
                                                <label class="col-3"><strong>Quantity: </strong></label>
                                                <div class="col-9">{{this.fields.quantity}}</div>
                                            </div>
                                            <div class="row mb-5 justify-content-left">
                                                <label class="col-3"><strong>Total: </strong></label>
                                                <div class="col-9 text-left">{{this.fields.total}} {{this.data.product.currency}}</div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="row mb-5">
                                                <label class="col-md-4"><strong>Shipping Address: </strong></label>
                                                <div class="col-8">{{this.fields.shipping}}</div>
                                            </div>
                                            <div class="row mb-5">
                                                <label class="col-md-4"><strong>Billing Address: </strong></label>
                                                <div class="col-8">{{this.fields.billing}}</div>
                                            </div>
                                        </div>
                                    </div>
                                </tab-content>
                            </form-wizard>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</template>

<script>

    import 'vue-form-wizard/dist/vue-form-wizard.min.css';

    export default {
        props: ['data','route'],
        mounted () {
            console.log(this.data);
        },
        data () {
            return {
                csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                fields: {
                    quantity: 1,
                    total: this.data.product.price,
                    shipping: '',
                    billing: ''
                },
                errors: {}
            }
        },
        methods: {
            sendOrder() {
                document.getElementById("order-form").submit();
            },
            validateQuantityTab() {
                if (this.fields.quantity < 1) {
                    alert('Need to add at least one product');
                    return false;
                } else {
                    this.fields.total = this.fields.quantity*this.data.product.price;
                    console.log(this.fields.total);
                    return true;
                }
            },
            validateShippingTab() {
                if (this.fields.shipping == '') {
                    alert('Need to add a shipping address');
                    return false;
                } else {
                    return true;
                }
            },
            validateBillingTab() {
                if (this.fields.billing == '') {
                    alert('Need to add a shipping address');
                    return false;
                } else {
                    return true;
                }
            },
            copyAddres() {
                this.fields.billing = this.fields.shipping;
            }
        }
    }

</script>
