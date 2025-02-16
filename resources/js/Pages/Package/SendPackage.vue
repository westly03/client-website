<script setup>
import { useForm } from "@inertiajs/vue3";
import { defineProps } from "vue";

defineProps({
    errors: Object,
    auth: Object
});

const form = useForm({
    sender: {
        first_name: "",
        last_name: "",
        mobile_number: "", 
        drop_location: "",
    },
    receiver: {
        first_name: "",
        last_name: "",
        mobile_number: "",
        pick_up_branch: "",
    },
    package: {
        name: "",
        height: "",
        width: "",
        weight: "",
    }
});

const submit = () => {
    form.post(route("sendpackage.store")); 
};
</script>

<template>
    <Head title="| send-package"/>
    <h1 class="font-semibold">Send a Package</h1>
    <div class="w-2/4 mx-auto">
        <form @submit.prevent="submit">
        
            <h2 class="font-semibold">Sender Details</h2>
            <div class="mb-3">
                <label>First Name</label>
                <input v-model="form.sender.first_name" type="text">
            </div>
            <div class="mb-3">
                <label>Last Name</label>
                <input v-model="form.sender.last_name" type="text">
            </div>
            <div class="mb-3">
                <label>Mobile Number</label>
                <input v-model="form.sender.mobile_number" type="tel">
            </div>
            <div class="mb-3">
                <label for="drop-location">Drop off Area:</label>
                <select v-model="form.sender.drop_location">
                    <option value="Naga">Naga</option>
                    <option value="Malabon">Malabon</option>
                    <option value="Legazpi">Legazpi</option>
                </select>
            </div>

       
            <h2 class="font-semibold">Receiver Details</h2>
            <div class="mb-3">
                <label>First Name</label>
                <input v-model="form.receiver.first_name" type="text">
            </div>
            <div class="mb-3">
                <label>Last Name</label>
                <input v-model="form.receiver.last_name" type="text">
            </div>
            <div class="mb-3">
                <label>Mobile Number</label>
                <input v-model="form.receiver.mobile_number" type="tel">
            </div>
            <div class="mb-3">
                <label for="pickup-branch">Pick Up Branch:</label>
                <select v-model="form.receiver.pick_up_branch">
                    <option value="Naga">Naga</option>
                    <option value="Malabon">Malabon</option>
                    <option value="Legazpi">Legazpi</option>
                </select>
            </div>

            <h2 class="font-semibold">Package</h2>
            <div class="mb-3">
                <label>Item Name</label>
                <input v-model="form.package.name" type="text">
            </div>
            <div class="mb-3">
                <label>Height</label>
                <input v-model="form.package.height" type="number" min="1" max="100">
            </div>
            <div class="mb-3">
                <label>Width</label>
                <input v-model="form.package.width" type="number" min="1" max="100">
            </div>
            <div class="mb-3">
                <label>Weight</label>
                <input v-model="form.package.weight" type="number" min="1" max="100">
            </div>

            <div>
                <button type="submit" class="primary-btn">Submit</button>
            </div>
        </form>
    </div>
</template>
