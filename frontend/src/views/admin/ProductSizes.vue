<template>
 <div class="container flex flex-col gap-4">
     

        <router-link
            :to="{name:'ProductSizeCreate'}"
            class="text-white  inline-flex md:w-[30%] justify-center items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm pr-4 py-2 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">إضافة
            حجم<svg class="w-6 h-4 text-white dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                width="24" height="24" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M5 12h14m-7 7V5" />
            </svg></router-link>




        <div class=" sm:rounded-lg">
            <table class=" text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs  text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="text-center px-6 py-3">
                            إسم الحجم
                        </th>


                        <th scope="col" class="text-center px-6 py-3">
                            إجراء
                        </th>
                    </tr>
                </thead>
                <tbody>
                        <tr
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            </th>


                            <td class="flex gap-4 px-6 py-4 text-right">
                                <a href="{{ route('admin.products.sizes.edit', $size->id) }}"
                                    class="font-medium text-blue-600 dark:text-blue-500 hover:underline">تعديل</a>

                                <form action="{{ route('admin.products.sizes.destroy', $size->id) }}" method="post">
                                    <button type="submit"
                                        class="font-medium text-red-500 dark:text-blue-500 hover:underline">حذف</button>
                                </form>
                            </td>
                        </tr>




                </tbody>
            </table>
        </div>

    </div>  </template>
  <script setup>
  
  </script>
  <style scoped>
  
  </style>
  