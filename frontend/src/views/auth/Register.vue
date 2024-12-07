
<template>
    
        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
            <form @submit.prevent="authenticate('register',formData)" class="space-y-6" >
                <div>
                    <label
                        for="name"
                        class="block text-sm font-medium leading-6 text-gray-900"
                        >Name</label
                    >
                    <div class="mt-2">
                        <input
                            v-model="formData.name"
                            id="name"
                            name="name"
                            type="text"
                            required=""
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                        />
                    </div>
                    <p v-if="errors.name" >{{ errors.name[0] }}</p>
                </div>
                <div>
                    <label
                        for="email"
                        class="block text-sm font-medium leading-6 text-gray-900"
                        >Email address</label
                    >
                    <div class="mt-2">
                        <input
                            v-model="formData.email"
                            id="email"
                            name="email"
                            type="email"
                            autocomplete="email"
                            required=""
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                        />
                    </div>
                    <p v-if="errors.email" >{{ errors.email[0] }}</p>

                </div>

                <div>
                    <div class="flex items-center justify-between">
                        <label
                            for="password"
                            class="block text-sm font-medium leading-6 text-gray-900"
                            >Password</label
                        >
                       
                    </div>
                    <div class="mt-2">
                        <input
                        v-model="formData.password"

                            id="password"
                            name="password"
                            type="password"
                            autocomplete="current-password"
                            required=""
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                        />
                    </div>
                    <p v-if="errors.password" >{{ errors.password[0] }}</p>

                </div>
                <div>
                    <div class="flex items-center justify-between">
                        <label
                            for="passwordc"
                            class="block text-sm font-medium leading-6 text-gray-900"
                            >Confirm Password</label
                        >
                        
                    </div>
                    <div class="mt-2">
                        <input
                        v-model="formData.password_confirmation"

                            id="passwordc"
                            name="password"
                            type="password"
                            autocomplete="current-password"
                            required=""
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                        />
                    </div>
                    <p v-if="errors.password_confirmation" >{{ errors.password_confirmation[0] }}</p>

                </div>

                <div>
                    <button
                        type="submit"
                        class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
                    >
                        Submit
                    </button>
                </div>
            </form>

            <p class="mt-10 text-center text-sm text-gray-500">
                Not a member?
                {{ " " }}
                <a
                    href="#"
                    class="font-semibold leading-6 text-indigo-600 hover:text-indigo-500"
                    >Start a 14 day free trial</a
                >
            </p>
        </div>

</template>

<script setup>
import { reactive } from 'vue';
import { useAuthStore } from '../../stores/auth';
import { storeToRefs } from 'pinia';

const {errors} = storeToRefs( useAuthStore());
const {authenticate} = useAuthStore();
const formData = reactive({
    name:'',
    email:'',
    password:'',
    password_confirmation:'',
});


</script>


<style scoped>
</style>
