<template>
    <div class="container">
        <form @submit.prevent="createColor(formData)">
            <!-- Color picker field -->
            <div class="my-5">
                <label
                    for="hex_code"
                    class="block text-sm font-medium text-gray-900 dark:text-gray-200"
                    >اختيار اللون</label
                >
                <input
                    required
                    type="color"
                    id="hex_code"
                    name="hex_code"
                    class="w-20 h-10 mt-2 p-1 border border-gray-300 rounded-lg dark:border-gray-600"
                    v-model="formData.hex_code"
                />
                <div
                    v-if="errors.hex_code"
                    class=" p-4 my-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                    role="alert"
                >
                    <span class="font-medium">
                        {{ errors.hex_code[0] }}
                    </span>
                </div>
            </div>

            <!-- Name input field -->
            <div class="my-5">
                <label
                    for="name"
                    class="block text-sm font-medium text-gray-900 dark:text-gray-200 mb-2"
                    >إسم اللون</label
                >
                <input
                    required
                    type="text"
                    id="name"
                    name="name"
                    placeholder="أدخل اسم اللون"
                    class="bg-gray-50 w-40 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    v-model="formData.name"
                />
                <div
                    v-if="errors.name"
                    class="p-4 my-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                    role="alert"
                >
                    <span class="font-medium">
                        {{ errors.name[0] }}
                    </span>
                </div>
            </div>

            <!-- Submit button -->
            <div class="mb-5">
                <button
                    type="submit"
                    class="text-white mt-4 w-[40%] flex justify-center items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm pr-4 py-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"
                >
                    إضافة
                    <svg
                        class="w-6 h-4 mr-2 text-white dark:text-white"
                        aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg"
                        width="24"
                        height="24"
                        fill="none"
                        viewBox="0 0 24 24"
                    >
                        <path
                            stroke="currentColor"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M5 12h14m-7 7V5"
                        />
                    </svg>
                </button>
            </div>
        </form>
    </div>
</template>
<script setup>
import { reactive } from "vue";
import { useAdminPrductColorStore } from "../../stores/admin/AdminProductColorService";
import { storeToRefs } from "pinia";

const { errors } = storeToRefs(useAdminPrductColorStore());
const { createColor } = useAdminPrductColorStore();
const formData = reactive({
    hex_code: "",
    name: "",
});
</script>
<style scoped></style>
