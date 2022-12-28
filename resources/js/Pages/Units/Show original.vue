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
                    <p class="mt-1 max-w-2xl text-sm text-gray-500" v-if="tenant">
                      Tenant details.
                    </p>
                  </div>
                  <div class="border-t border-gray-200" v-if="!tenant">
                    <dl>
                      <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Tenant details not found</dt>
                        
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
                    <p class="mt-1 max-w-2xl text-sm text-gray-500" v-if="agreement">
                      Agreement details.
                    </p>
                  </div>
                  <div class="border-t border-gray-200" v-if="!agreement.id">
                    <dl>
                      <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Agreement details not found</dt>
                        
                        <button class="btn btb-sm text-white bg-yellow-300 hover:bg-yellow-900 rounded px-4 py-2" @click="newModal" >
                          Add Rental Agreement
                        </button>
                        <!-- <Link
                          @click="newModal"
                          as="button"
                          class="text-white bg-yellow-300 hover:bg-yellow-900 rounded px-4 py-2"
                          >Add Rental Agreement</Link
                        >-->
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
                          {{ agreement }}
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
                          <!-- {{ agreement.email }} -->
                        </dd>
                        <dt class="text-sm font-medium text-gray-500">
                          Repairs & Maintenance Charge
                        </dt>
                        <dd
                          class="
                            mt-1
                            text-sm text-gray-900
                            sm:col-span-2 sm:mt-0
                          "
                        >
                          <!-- {{ agreement.phone }} -->
                        </dd>
                        <dt class="text-sm font-medium text-gray-500">
                          Billings
                        </dt>
                        <dd
                          class="
                            mt-1
                            text-sm text-gray-900
                            sm:col-span-2 sm:mt-0
                          "
                        >
                          <!-- {{ agreement.phone }} -->
                        </dd>
                      </div>
                    </dl>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div>
          
          </div>
        </div>
      </div>
    </div>
  </BreezeAuthenticatedLayout>
    <!-- Add New Modal -->
    <div class="modal fade" id="addNewModal" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Apply Lease for {{ tenant.name }}</h5>

            <button
              type="button"
              class="close"
              data-dismiss="modal"
              aria-label="Close"
            >
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form @submit.prevent="storeAgreement">
            <div class="modal-body">
              <fieldset>
                <legend>Lessee Details</legend>
                <div class="form-group">
                  <div class="row">
                    <div class="col-6">
                      <label class="col-sm-8 col-form-label"
                        >Name of Lessee*</label
                      >

                      <input
                        v-model="form.rent"
                        required
                        type="text"
                        name="fname"
                        placeholder="First Name"
                        class="form-control"
                      />
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-6">
                      <label class="col-sm-8 col-form-label"
                        >Service Charge</label
                      >
                      <input
                        v-model="form.service_charge"
                        required
                        type="email"
                        name="email"
                        placeholder="someone@example.com"
                        class="form-control"
                      />
                    </div>
                    <div class="col-6">
                      <label class="col-sm-8 col-form-label"
                        >Repair Charge</label
                      >
                      <input
                        v-model="form.repair_charge"
                        required
                        type="text"
                        name="phone"
                        placeholder="+254 7..."
                        class="form-control"
                      />
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-6">
                      <label class="col-sm-8 col-form-label"
                        >Due Date</label
                      >
                      <input
                        v-model="form.due_date"
                        required
                        type="email"
                        name="email"
                        placeholder="someone@example.com"
                        class="form-control"
                      />
                    </div>

                  </div>
                </div>
              </fieldset>
              <hr />

            </div>
            <div class="modal-footer">
              <button
                type="button"
                class="btn btn-secondary"
                data-dismiss="modal"
              >
                Close
              </button>

              <button type="submit" class="btn btn-success">Submit</button>
            </div>
          </form>
        </div>
      </div>
    </div>
</template>

<script setup>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated.vue";
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";
import { HomeIcon } from "@heroicons/vue/20/solid";

const props = defineProps({
  unit: Object,
  property: Object,
  tenant: Object,
  agreement:Object,
});

const form =useForm({
  tenant_id:props.tenant.id,
  rent:null,
  due_date:null,
  service_charge:null,
  repair_charge:null,
})

const newModal = () => {
  $("#addNewModal").modal("show");
}; 

const storeAgreement = ()=>{
    processing.value = true
    form.post("/agreements");
  }
</script>
