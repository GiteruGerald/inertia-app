<template>
  <Head title="Properties" />

  <BreezeAuthenticatedLayout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Unit Show
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
              <div class="overflow-hidden bg-white shadow sm:rounded-lg">
                <!-- Unit Details -->
                <div>
                  <div class="px-4 py-5 sm:px-6">
                    <h3 class="text-lg font-medium leading-6 text-gray-900">
                      Unit {{ unit.unit_no }} | Property: {{ property.name }}
                    </h3>
                    <p class="mt-1 max-w-2xl text-sm text-gray-500">
                      Unit details.
                    </p>
                  </div>
                  <div
                    class="
                      bg-gray-50
                      px-4
                      py-5
                      sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6
                    "
                  >
                    <dt class="text-sm font-medium text-gray-500">Property Manager</dt>
                    <dd
                      class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0"
                    >
                      {{ manager.name }}
                    </dd>
                  </div>
                  <div
                    class="
                      bg-gray-50
                      px-4
                      py-5
                      sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6
                    "
                  >
                    <dt class="text-sm font-medium text-gray-500">Block</dt>
                    <dd
                      class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0"
                    >
                      {{ unit.block }}
                    </dd>
                  </div>
                  <div
                    class="
                      bg-gray-50
                      px-4
                      py-5
                      sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6
                    "
                  >
                    <dt class="text-sm font-medium text-gray-500">Type</dt>
                    <dd
                      class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0"
                    >
                      {{ unit.type }}
                    </dd>
                  </div>
                </div>
                <hr />

                <!-- Tenant Details -->
                <div>
                  <div class="px-4 py-5 sm:px-6">
                    <p
                      class="mt-1 max-w-2xl text-sm text-gray-500"
                      v-if="tenant"
                    >
                      Tenant details.
                    </p>
                  </div>
                  <div class="border-t border-gray-200" v-if="!tenant">
                    <dl>
                      <div
                        class="
                          bg-white
                          px-4
                          py-5
                          sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6
                        "
                      >
                        <dt class="text-sm font-medium text-gray-500">
                          Tenant details not found
                        </dt>
                      </div>
                    </dl>
                  </div>

                  <div class="border-t border-gray-200" v-else>
                    <dl>
                      <div
                        class="
                          bg-white
                          px-4
                          py-5
                          sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6
                        "
                      >
                        <dt class="text-sm font-medium text-gray-500">Name</dt>
                        <dd
                          class="
                            mt-1
                            text-sm text-gray-900
                            sm:col-span-2 sm:mt-0
                          "
                        >
                          {{ tenant.name }}
                        </dd>
                        <dt class="text-sm font-medium text-gray-500">
                          Email Address
                        </dt>
                        <dd
                          class="
                            mt-1
                            text-sm text-gray-900
                            sm:col-span-2 sm:mt-0
                          "
                        >
                          {{ tenant.email }}
                        </dd>
                        <dt class="text-sm font-medium text-gray-500">
                          Contact Phone
                        </dt>
                        <dd
                          class="
                            mt-1
                            text-sm text-gray-900
                            sm:col-span-2 sm:mt-0
                          "
                        >
                          {{ tenant.phone }}
                        </dd>
                      </div>
                    </dl>
                  </div>
                </div>

                <!-- Agreement Details -->
                <div v-if="tenant">
                  <div class="px-4 py-5 sm:px-6">
                    <p
                      class="mt-1 max-w-2xl text-sm text-gray-500"
                      v-if="agreement"
                    >
                      Agreement details.
                    </p>
                  </div>
                  <div class="border-t border-gray-200" v-if="!agreement">
                    <dl>
                      <div
                        class="
                          bg-white
                          px-4
                          py-5
                          sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6
                        "
                      >
                        <dt class="text-sm font-medium text-gray-500">
                          Agreement details not found
                        </dt>

                        <!-- <button
                          class="
                            btn
                            btb-sm
                            text-white
                            bg-yellow-300
                            hover:bg-yellow-900
                            rounded
                            px-4
                            py-2
                          "
                          @click="newModal"
                        >
                          Add Rental Agreement
                        </button> -->
                        <Link
                          :href="`/agreements/${tenant.id}/create`"
                          type="button"
                          class="
                            text-white
                            bg-yellow-300
                            hover:bg-yellow-900
                            rounded
                            px-4
                            py-2
                          "
                        >
                          Add Rental Agreement</Link
                        >
                        <!-- <Link
                          href="`/agreements/${tenant.id}/create`"
                          as="button"
                          class="text-white bg-yellow-300 hover:bg-yellow-900 rounded px-4 py-2"
                          >Add Rental Agreement</Link
                        > -->
                      </div>
                    </dl>
                  </div>

                  <div class="border-t border-gray-200" v-else>
                    <dl>
                      <div
                        class="
                          bg-white
                          px-4
                          py-5
                          sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6
                        "
                      >
                        <dt class="text-sm font-medium text-gray-500">Rent</dt>
                        <dd
                          class="
                            mt-1
                            text-sm text-gray-900
                            sm:col-span-2 sm:mt-0
                          "
                        >
                          {{ agreement.rent }}
                        </dd>
                        <dt class="text-sm font-medium text-gray-500">
                          Service Charge
                        </dt>
                        <dd
                          class="
                            mt-1
                            text-sm text-gray-900
                            sm:col-span-2 sm:mt-0
                          "
                        >
                          {{ agreement.service_charge }}
                        </dd>
                        <dt class="text-sm font-medium text-gray-500">
                          Repairs & Maintenance Charge
                        </dt>
                        
                        <dd
                          class="
                            mt-1
                            text- text-gray-900
                            sm:col-span-2 sm:mt-0
                          "
                        >
                          {{ agreement.repair_charge }}
                        </dd>
                        <dt class="text-md font-medium text-black-500">
                          Total Billings
                        </dt>
                        <dd
                          class="
                            mt-1
                            text-md text-black-900
                            sm:col-span-2 sm:mt-0
                          "
                        >
                          {{ agreement.rent + agreement.service_charge + agreement.repair_charge }}
                        </dd>
                      </div>
                    </dl>
                  </div>
                </div>
              </div>
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
import { HomeIcon } from "@heroicons/vue/20/solid";
import { ref } from "vue";

const props = defineProps({
  unit: Object,
  property: Object,
  tenant: Object,
  agreement: Object,
  manager: Object,
  errors: Object,
});

const newModal = () => {
  open.value = true;
};

const storeAgreement = () => {
  processing.value = true;
  form.post("/agreements");
};
</script>
