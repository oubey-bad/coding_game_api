<template>
<div class="container flex flex-col gap-4">
      
        <router-link :to="{name: 'ProductColorCreate'}"
            class="text-white  inline-flex md:w-[30%] justify-center items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm pr-4 py-2 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">إضافة لون<svg
                class="w-6 h-4 text-white dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                height="24" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M5 12h14m-7 7V5" />
            </svg></router-link>






        


        <div  class=" sm:rounded-lg">
            <table class=" text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs  text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="text-center px-6 py-3">
                            اسم اللون
                        </th>
                        <th scope="col" class="text-center px-6 py-3">
                            اللون
                        </th>

                        <th scope="col" class="text-center px-6 py-3">
                            إجراء
                        </th>
                    </tr>
                </thead>
                <tbody v-if="colors.length > 0">
                        <tr
                            v-for="color in colors"
                            :key="color.id"
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ color.name }}
                            </th>
                            <th >
                                <div
                                 v-if="!color.isEditing"
                                 scope="row"
                                 class=" px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white border"
                                :style="{ backgroundColor: color.hex_code }">
                                </div>
                                <div v-else>
                                    <input type="color" class="px-6 py-4">
                                </div>
                        </th>
                            


                            <td class="flex gap-4 px-6 py-4 text-right">
                                <a 
                                    class="font-medium  hover:underline"><svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z"/>
                                        </svg>
                                </a>

                                


                               
                                <form >
                                   
                                    <button type="submit"
                                        class="font-medium text-red-500 dark:text-blue-500 hover:underline"><svg class="w-5 h-5 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z"/>
</svg>
</button>
                                </form>
                            </td>
                        </tr>




                </tbody>
            </table>
        </div>

    </div>  </template>
  <script setup>
import { onMounted, ref } from 'vue';
import { useAdminPrductColorStore } from '../../stores/admin/AdminProductColorService';


  const colors = ref([]);
  colors.isEditing = false;
  console.log(colors.value.id);
  const {getColors} = useAdminPrductColorStore();
  onMounted(async() => (colors.value =await getColors()))
  </script>
  <style scoped>
  
  </style>
  