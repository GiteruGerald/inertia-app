<template>
    <Head title="Agreement|Create" />
  
    <BreezeAuthenticatedLayout>
      <template #header>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          Agreement Create
        </h2>
      </template>
  
      <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="flex m-2 p-2">
            <Link
              href="/units"
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
                <h2 class="text-gray-900 text-lg mb-1 font-medium title-font">
                  Sign New Agreement for {{ tenant.name }}
                </h2>
                <form
                  @submit.prevent="storeAgreement"
                  class="bg-white shadow-md m-2 p-2 rounded"
                >
                  <div class="relative mb-4">
                    <label for="unit_no" class="leading-7 text-sm text-gray-600"
                      >Rent</label
                    >
                    <input
                      v-model="form.rent"
                      type="number"
                      id="rent"
                      name="rent"
                      class="
                        w-full
                        bg-white
                        rounded
                        border border-gray-300
                        focus:border-pink-500 focus:ring-2 focus:ring-pink-200
                        text-base
                        outline-none
                        text-gray-700
                        py-1
                        px-3
                        leading-8
                        transition-colors
                        duration-200
                        ease-in-out
                      "
                    />
                     <!-- Display error msg -->
                     <div
                      v-if="errors.rent"
                      v-text="errors.rent"
                      class="text-red-800 text-sm mt-2"
                    ></div>
                  </div>
                  <div class="relative mb-4">
                    <label for="unit_no" class="leading-7 text-sm text-gray-600"
                      >Due Date</label
                    >
                    <input
                      v-model="form.due_date"
                      type="date"
                      id="due_date"
                      name="due_date"
                      class="
                        w-full
                        bg-white
                        rounded
                        border border-gray-300
                        focus:border-pink-500 focus:ring-2 focus:ring-pink-200
                        text-base
                        outline-none
                        text-gray-700
                        py-1
                        px-3
                        leading-8
                        transition-colors
                        duration-200
                        ease-in-out
                      "
                    />
                     <!-- Display error msg -->
                     <div
                      v-if="errors.due_date"
                      v-text="errors.due_date"
                      class="text-red-800 text-sm mt-2"
                    ></div>
                  </div>
                  
                  <div class="relative mb-4">
                    <label for="unit_no" class="leading-7 text-sm text-gray-600"
                      >Service Charge</label
                    >
                    <input
                      v-model="form.service_charge"
                      type="number"
                      id="service_charge"
                      name="service_charge"
                      class="
                        w-full
                        bg-white
                        rounded
                        border border-gray-300
                        focus:border-pink-500 focus:ring-2 focus:ring-pink-200
                        text-base
                        outline-none
                        text-gray-700
                        py-1
                        px-3
                        leading-8
                        transition-colors
                        duration-200
                        ease-in-out
                      "
                    />
                     <!-- Display error msg -->
                     <div
                      v-if="errors.service_charge"
                      v-text="errors.service_charge"
                      class="text-red-800 text-sm mt-2"
                    ></div>
                  </div>
                  <div class="relative mb-4">
                    <label for="unit_no" class="leading-7 text-sm text-gray-600"
                      >Repair Charges</label
                    >
                    <input
                      v-model="form.repair_charge"
                      type="number"
                      id="repair_charge"
                      name="repair_charge"
                      class="
                        w-full
                        bg-white
                        rounded
                        border border-gray-300
                        focus:border-pink-500 focus:ring-2 focus:ring-pink-200
                        text-base
                        outline-none
                        text-gray-700
                        py-1
                        px-3
                        leading-8
                        transition-colors
                        duration-200
                        ease-in-out
                      "
                    />
                     <!-- Display error msg -->
                     <div
                      v-if="errors.repair_charge"
                      v-text="errors.repair_charge"
                      class="text-red-800 text-sm mt-2"
                    ></div>
                  </div>
                  <button
                    class="
                      text-white
                      bg-indigo-500
                      border-0
                      py-2
                      px-6
                      focus:outline-none
                      hover:bg-pink-600
                      rounded
                      text-lg
                    "
                    :disabled="processing"
                  >
                    Submit
                  </button>
                </form>
              </div>
            </div>
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
    tenant: Array,
    errors:Object,
  });
  
  const form = useForm({
    tenant_id: props.tenant.id,
    rent: null,
    service_charge:null,
    repair_charge:null,
    due_date:null
  });
  
  const storeAgreement =  async()=> 
  {
    // processing.value = true
    await form.post("/agreements")
    .then(()=>{
          processing.value = false
        })
    .catch(()=>{
          processing.value = false
        })
  }
  </script>