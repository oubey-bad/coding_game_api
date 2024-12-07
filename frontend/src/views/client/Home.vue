<template>
    <!-- <p v-if="authStore.user">{{ authStore.user.name }}</p> -->
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Submit Your Code</h1>

        <form @submit.prevent="submitCode(formData)">
            <!-- Problem Selection -->
            <div class="mb-6">
                <label for="problem" class="block text-lg font-medium"
                    >Select Problem</label
                >
                <select
                    id="problem"
                    class="w-full p-2 border rounded"
                    v-model="formData.problem_id"
                >
                    <!-- <option value="" disabled>Select a problem</option> -->

                    <option
                        v-for="problem in problems"
                        :key="problem.id"
                        :value="problem.id"
                    >
                        {{ problem.title }}
                    </option>
                </select>
            </div>

            <!-- Language Selection -->
            <div class="mb-6">
                <label for="language" class="block text-lg font-medium"
                    >Programming Language</label
                >
                <select
                    id="language"
                    class="w-full p-2 border rounded"
                    v-model="formData.language"
                >
                    <option value="python3">Python 3</option>
                    <option value="javascript">JavaScript</option>
                    <option value="java">Java</option>
                    <option value="c">C</option>
                </select>
            </div>

            <!-- Code Input -->
            <div class="mb-6">
                <label for="code" class="block text-lg font-medium"
                    >Your Code</label
                >
                <textarea
                    id="code"
                    rows="10"
                    class="w-full p-2 border rounded font-mono"
                    placeholder="Write your code here..."
                    v-model="formData.code"
                ></textarea>
            </div>

            <!-- Submit Button -->
            <button
                type="button"
                class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 disabled:opacity-50"
            >
               Submit code
            </button>
        </form>

        <!-- Result Section(optional or not ?) -->
        <!-- <div v-if="result" class="mt-6 p-4 border rounded bg-gray-50">
            <h2 class="text-xl font-semibold mb-2">Result:</h2>
            <p class="mb-2"><strong>Status:</strong> {{ result.message }}</p>
            <p v-if="result.output"><strong>Output:</strong></p>
            <pre v-if="result.output" class="bg-gray-200 p-2 rounded">{{
                result.output
            }}</pre>
        </div> -->
    </div>
</template>
<script setup>
import { onMounted, ref } from "vue";
import { reactive } from 'vue';

import { useAuthStore } from "../../stores/auth";
import { useSubmission } from "../../stores/client/ClientSubmissionService";
// onMounted

const formData = reactive({
    problem_id: '',
    user_id: '',
    language: '',
    code: '',
});
console.log(formData);  

const authStore = useAuthStore();
const { submitCode } = useSubmission();
const { getProblems } = useSubmission();
const problems = ref([]);
onMounted(async () => (problems.value = await getProblems()));
</script>
<style scoped></style>
