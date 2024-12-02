<!--
  This example requires some changes to your config:
  
  ```
  // tailwind.config.js
  module.exports = {
    // ...
    plugins: [
      // ...
      require('@tailwindcss/forms'),
    ],
  }
  ```
-->
<template>
    <form action="">
      <div class="md:w-[60%] p-8 m-auto" dir="rtl">
        <div class="mb-5">
            <label
                for="base-input"
                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                >إسم المنتج</label
            >
            <input
                type="text"
                id="base-input"
                name="name"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            />
        </div>
        <hr class="mb-16" />
        <div class="mb-5">
            <label
                for="countries"
                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                >الفئة</label
            >
            <select
                id="countries"
                name="category_id"
                required
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            >
                <option value=""></option>
                @foreach ($categories as $category)
                <option value="{{ $category->id }}"></option>
                @endforeach
            </select>

            <div class="mt-2">
                <a
                    href="{{ route('admin.categories.create') }}"
                    class="text-black inline-flex border-2 border-gray-200 hover:bg-gray-100 justify-center items-center focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm pr-4 py-2 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:text-white dark:focus:ring-blue-800"
                    >إضافة فئة<svg
                        class="w-6 h-4 text-black dark:text-white"
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
                </a>
            </div>
            <hr class="mb-16" />
        </div>

        <div class="mb-5">
            <label
                for="message"
                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                >وصف المنتج</label
            >
            <textarea
                id="message"
                name="description"
                rows="4"
                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="الوصف..."
            ></textarea>
        </div>
        <hr class="mb-16" />
        <div class="mb-5">
            <label
                for="number-input"
                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                >السعر</label
            >
            <input
                type="number"
                name="price"
                id="number-input"
                aria-describedby="helper-text-explanation"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="2000 da"
                required
            />
        </div>
        <hr class="mb-16" />
        <div class="mb-2">
            <label
                for="countries"
                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                >الحجم</label
            >
            <div class="mb-2 flex flex-wrap gap-3">
                <div class="flex items-center">
                    <input
                        type="checkbox"
                        name="sizes[]"
                        value="{{ $size->id }}"
                        class="w-8 h-8 text-gray-700 bg-gray-200 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                    />&#160;&#160;
                </div>
            </div>
        </div>
        <div class="mb-5">
            <a
                href="{{ route('admin.products.sizes.create') }}"
                class="text-black inline-flex border-2 border-gray-200 hover:bg-gray-100 justify-center items-center focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm pr-4 py-2 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:text-white dark:focus:ring-blue-800"
                >إضافة حجم<svg
                    class="w-6 h-4 text-black dark:text-white"
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
            </a>
        </div>

        <hr class="mb-16" />
        <div class="mb-2 flex flex-col gap-2">
            <label for="" class="font-medium">اللون</label>
            <table
                class="text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400"
            >
                <thead
                    class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400"
                >
                    <tr>
                        <th scope="col" class="text-center px-6 py-3">
                            إسم اللون
                        </th>
                        <th scope="col" class="text-center px-6 py-3">اللون</th>

                        <th scope="col" class="text-center px-6 py-3">
                            إختيار
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600"
                    >
                        <th
                            scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white"
                        ></th>
                        <th
                            scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white border"
                        ></th>

                        <td class="flex gap-4 px-6 py-4 text-right">
                            <div class="flex items-center">
                                <input
                                    type="checkbox"
                                    name="colors[]"
                                    value="{{ $color->id }}"
                                    class="w-8 h-8 text-blue-700 bg-gray-200 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                                />
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="mb-5">
            <a
                href="{{ route('admin.products.colors.create') }}"
                class="text-black inline-flex border-2 border-gray-200 hover:bg-gray-100 justify-center items-center focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm pr-4 py-2 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:text-white dark:focus:ring-blue-800"
                >إضافة لون<svg
                    class="w-6 h-4 text-black dark:text-white"
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
            </a>
        </div>
        <hr class="mb-16" />

        <div class="mb-5">
            <label for="file_input1" class="font-medium">الصورة الرئيسية</label>

            <input
                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                aria-describedby="file_input_help"
                id="file_input1"
                type="file"
                name="main_image"
                accept="image/*"
                required
            />
            <p
                class="mt-1 text-sm text-gray-500 dark:text-gray-300 flex"
                id="file_input_help"
            >
                الأبعاد المثالية ( 80x60).
                <svg
                    class="w-6 h-6 text-gray-400 dark:text-white"
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
                        d="M11 18h2M5.875 3h12.25c.483 0 .875.448.875 1v16c0 .552-.392 1-.875 1H5.875C5.392 21 5 20.552 5 20V4c0-.552.392-1 .875-1Z"
                    />
                </svg>
            </p>
        </div>

        <div class="mb-5">
            <label for="file_input2" class="font-medium">
                صور إضافية (إختياري)
            </label>

            <input
                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                aria-describedby="file_input_help"
                id="file_input2"
                type="file"
                name="images[]"
                accept="image/*"
                multiple
            />
        </div>

        <!-- Message to show after image selection -->
    </div>

    <button
        type="submit"
        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
    >
        حفظ
    </button>
    </form>
</template>

<script setup>
</script>
