<template>
  <Head title="Properties" />

  <BreezeAuthenticatedLayout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Properties Create
      </h2>
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="flex m-2 p-2">
          <Link
            href="/properties"
            class="
              px-4
              py-2
              bg-indigo-500
              hover:bg-indigo-600
              text-white
              rounded
            "
            >Back</Link
          >
        </div>
        <div class="flex">
          <div class="container px-5 mx-auto flex">
            <div
              class="
                bg-white
                rounded-lg
                p-8
                flex flex-col
                md:ml-auto
                w-full
                mt-10
                md:mt-0
                relative
                z-10
                shadow-md
              "
            >
              <form @submit.prevent="storeProperty">
                <div class="shadow sm:overflow-hidden sm:rounded-md">
                  <div class="space-y-6 bg-white px-4 py-5 sm:p-6">
                    <div>
                      <label
                        for="name"
                        class="block text-sm font-medium text-gray-700"
                        >Name</label
                      >
                      <div class="mt-1 flex rounded-md shadow-sm">
                        <input
                          v-model="form.name"
                          type="text"
                          name="name"
                          id="name"
                          class="
                            block
                            w-full
                            flex-1
                            rounded-none rounded-r-md
                            border-gray-300
                            focus:border-indigo-500 focus:ring-indigo-500
                            sm:text-sm
                          "
                          placeholder="Name of Property"
                        />
                        <!-- Display error msg -->
                        <div
                          v-if="errors.name"
                          v-text="errors.name"
                          class="text-red-800 text-sm mt-2"
                        ></div>
                      </div>
                    </div>
                    <!-- Location  -->
                    <div>
                      <label
                        for="location"
                        class="block text-sm font-medium text-gray-700"
                        >Location</label
                      >
                      <div class="mt-1 flex rounded-md shadow-sm">
                        <select
                          class="
                            block
                            w-full
                            flex-1
                            rounded-none rounded-r-md
                            border-gray-300
                            focus:border-indigo-500 focus:ring-indigo-500
                            sm:text-sm
                          "
                          v-model="form.location_id"
                        >
                          <option
                            v-for="location in locations"
                            :value="location.id"
                            :key="location.id"
                          >
                            {{ location.name }}
                          </option>
                        </select>
                        <!-- Display error msg -->
                        <div
                          v-if="errors.location_id"
                          v-text="errors.location_id"
                          class="text-red-800 text-sm mt-2"
                        ></div>
                      </div>
                    </div>
                    <!-- Landlord -->
                    <div>
                      <label
                        for="landlord"
                        class="block text-sm font-medium text-gray-700"
                        >Landlord</label
                      >
                      <div class="mt-1 flex rounded-md shadow-sm">
                        <select
                          class="
                            block
                            w-full
                            flex-1
                            rounded-none rounded-r-md
                            border-gray-300
                            focus:border-indigo-500 focus:ring-indigo-500
                            sm:text-sm
                          "
                          v-model="form.landlord_id"
                        >
                          <option
                            v-for="landlord in landlords"
                            :value="landlord.id"
                            :key="landlord.id"
                          >
                            {{ landlord.name }}
                          </option>
                        </select>
                        <div
                          v-if="errors.landlord_id"
                          v-text="errors.landlord_id"
                          class="text-red-800 text-sm mt-2"
                        ></div>
                      </div>
                    </div>

                    <!-- Manager -->
                    <div>
                      <label
                        for="manager"
                        class="block text-sm font-medium text-gray-700"
                        >Manager</label
                      >
                      <div class="mt-1 flex rounded-md shadow-sm">
                        <select
                          class="
                            block
                            w-full
                            flex-1
                            rounded-none rounded-r-md
                            border-gray-300
                            focus:border-indigo-500 focus:ring-indigo-500
                            sm:text-sm
                          "
                          v-model="form.manager_id"
                        >
                          <option
                            v-for="manager in managers"
                            :value="manager.id"
                            :key="manager.id"
                          >
                            {{ manager.name }}
                          </option>
                        </select>
                        <div
                          v-if="errors.manager_id"
                          v-text="errors.manager_id"
                          class="text-red-800 text-sm mt-2"
                        ></div>
                      </div>
                    </div>
                    <!-- 
                    <div>
                      <label
                        for="image"
                        class="block text-sm font-medium text-gray-700"
                        >Image</label
                      >
                      <div class="mt-1 flex rounded-md shadow-sm">
                        <input
                        @input="form.image = $event.target.files[0]"
                          type="file"
                          name="image"
                          id="image"
                          class="
                            block
                            w-full
                            flex-1
                            rounded-none rounded-r-md
                            border-gray-300
                            focus:border-indigo-500 focus:ring-indigo-500
                            sm:text-sm
                          "
                          placeholder="Name of Image"
                        />
                      </div>
                    </div> -->

                    <!-- <div>
                      <label class="block text-sm font-medium text-gray-700"
                        >Cover photo</label
                      >
                      <div
                        class="
                          mt-1
                          flex
                          justify-center
                          rounded-md
                          border-2 border-dashed border-gray-300
                          px-6
                          pt-5
                          pb-6
                        "
                      >
                        <div class="space-y-1 text-center">
                          <svg
                            class="mx-auto h-12 w-12 text-gray-400"
                            stroke="currentColor"
                            fill="none"
                            viewBox="0 0 48 48"
                            aria-hidden="true"
                          >
                            <path
                              d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
                              stroke-width="2"
                              stroke-linecap="round"
                              stroke-linejoin="round"
                            />
                          </svg>
                          <div class="flex text-sm text-gray-600">
                            <label
                              for="image"
                              class="
                                relative
                                cursor-pointer
                                rounded-md
                                bg-white
                                font-medium
                                text-indigo-600
                                focus-within:outline-none
                                focus-within:ring-2
                                focus-within:ring-indigo-500
                                focus-within:ring-offset-2
                                hover:text-indigo-500
                              "
                            >
                              <span>Upload a file</span>
                              <input
                                id="image"
                                name="image"
                                type="file"
                                class="sr-only"
                                @change="onImageChoose"
                              />
                            </label>
                            <p class="pl-1">or drag and drop</p>
                          </div>
                          <p class="text-xs text-gray-500">
                            PNG, JPG, GIF up to 10MB
                          </p>
                        </div>
                      </div>
                    </div> -->
                  </div>
                  <div class="bg-gray-50 px-4 py-3 text-right sm:px-6">
                    <button
                      type="submit"
                      class="
                        inline-flex
                        justify-center
                        rounded-md
                        border border-transparent
                        bg-indigo-600
                        py-2
                        px-4
                        text-sm
                        font-medium
                        text-white
                        shadow-sm
                        hover:bg-indigo-700
                        focus:outline-none
                        focus:ring-2
                        focus:ring-indigo-500
                        focus:ring-offset-2
                      "
                      :disabled="processing"
                    >
                      Save
                    </button>
                  </div>
                </div>
              </form>
            </div>
          </div>

          <div></div>
        </div>
      </div>
    </div>
  </BreezeAuthenticatedLayout>
</template>
<script setup>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated.vue";
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";
import { ref } from "@vue/reactivity";


let processing = ref(false)
const props = defineProps({
  locations: Array,
  managers: Array,
  landlords: Array,
  errors: Object,
});

const form = useForm({
  name: null,
  location_id: null,
  manager_id: null,
  landlord_id: null,
  image:null,
});

// const onImageChoose = (ev) => {
//   const file = ev.target.files[0];

//   const reader = new FileReader();
//   reader.onload = () => {
//     // The field to send on backend and apply validations
//     form.image = reader.result;

//     ev.target.value = "";
//   };
//   reader.readAsDataURL(file);
// }

const storeProperty = () => {
  // processing.value = true;

  form.post("/properties");
};
</script>
