<template>
  <Head title="Properties" />

  <BreezeAuthenticatedLayout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Properties Show
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
              <div class="overflow-hidden bg-white shadow sm:rounded-lg">
                <div class="px-4 py-5 sm:px-6">
                  <h3 class="text-lg font-medium leading-6 text-gray-900">
                    {{ props.property.name }}
                  </h3>
                  <p class="mt-1 max-w-2xl text-sm text-gray-500">
                    Property details.
                  </p>
                </div>
                <div class="border-t border-gray-200">
                  <dl>
                    <div
                      class="
                        bg-gray-50
                        px-4
                        py-5
                        sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6
                      "
                    >
                      <dt class="text-sm font-medium text-gray-500">
                        Landlord
                      </dt>
                      <dd
                        class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0"
                      >
                        {{ landlord.name }}
                      </dd>
                    </div>
                    <div
                      class="
                        bg-white
                        px-4
                        py-5
                        sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6
                      "
                    >
                      <dt class="text-sm font-medium text-gray-500">
                        Property Manager
                      </dt>
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
                      <dt class="text-sm font-medium text-gray-500">Located</dt>
                      <dd
                        class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0"
                      >
                        {{ location.name }}
                      </dd>
                    </div>

                    <div
                      class="
                        bg-white
                        px-4
                        py-5
                        sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6
                      "
                    >
                      <dt class="text-sm font-medium text-gray-500">
                        House Units
                      </dt>
                      <dd
                        class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0"
                      >
                        <ul
                          role="list"
                          class="
                            divide-y divide-gray-200
                            rounded-md
                            border border-gray-200
                          "
                        >
                          <li
                            v-for="unit in units"
                            :key="unit.id"
                            class="
                              flex
                              items-center
                              justify-between
                              py-3
                              pl-3
                              pr-4
                              text-sm
                            "
                          >
                            <div class="flex w-0 flex-1 items-center">
                              <HomeIcon
                                class="h-5 w-5 flex-shrink-0 text-gray-400"
                                aria-hidden="true"
                              />
                              <span class="ml-2 w-0 flex-1 truncate">{{
                                unit.unit_no
                              }}</span>
                            </div>
                            <div class="ml-4 flex-shrink-0">
                              <Link
                                :href="`/units/${unit.id}`"
                                type="button"
                                class="text-red-600 hover:text-red-900"
                                ><svg
                                  xmlns="http://www.w3.org/2000/svg"
                                  fill="none"
                                  viewBox="0 0 24 24"
                                  stroke-width="1.5"
                                  stroke="currentColor"
                                  class="w-6 h-6"
                                >
                                  <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"
                                  /></svg
                              ></Link>
                            </div>
                          </li>
                        </ul>
                      </dd>
                    </div>
                  </dl>
                </div>
              </div>
              <div class="overflow-hidden bg-white shadow sm:rounded-lg mt-5">
                <div
                  class="
                    relative
                    items-center
                    w-full
                    px-5
                    py-12
                    mx-auto
                    md:px-12
                    lg:px-24
                    max-w-7xl
                  "
                >

                  <div
                    class="
                      grid
                      w-full
                      grid-cols-1
                      gap-12
                      mx-auto
                      lg:grid-cols-3
                    "
                    @drop="onDrop($event,2)"
                    @dragenter.prevent
                    @dragover.prevent
                  >
                    <div
                      class="p-6 border-t border-gray-200 hover:bg-gray-100 rounded"
                      @dragstart="startDrag($event, unit)"
                      v-for="unit in units"
                      :key="unit.id"
                    >
                      <h1
                        class="
                          mx-auto
                          mb-8
                          text-2xl
                          font-semibold
                          leading-none
                          tracking-tighter
                          text-neutral-600
                          lg:text-3xl
                        "
                      >
                        Unit-: {{ unit.unit_no }}
                      </h1>
                      <p
                        class="
                          mx-auto
                          mb-8
                          font-semibold
                          leading-none
                          tracking-tighter
                          text-neutral-600
                        "
                      >
                        Block-: {{ unit.block }}
                      </p>
                      <p
                        class="
                          mx-auto
                          mb-8
                          font-semibold
                          leading-none
                          tracking-tighter
                          text-neutral-600
                        "
                      >
                        Type-{{ unit.type }}
                      </p>
                      
                      <div class="ml-4 flex-shrink-0">
                        <Link
                          :href="`/units/${unit.id}`"
                          type="button"
                          class="text-red-600 hover:text-red-900"
                          >
                        > More Details</Link>
                      </div>
                    </div>
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
import { onMounted } from "@vue/runtime-core";

const props = defineProps({
  property: Object,
  units: Object,
  location: Object,
  manager: Object,
  landlord: Object,
});

const getUnits = (list) =>{
  return props.units.filter((unit)=> unit.list == list)
}
const startDrag = (event, unit)=>{
  event.dataTransfer.dropEffect = 'move'
  event.dataTransfer.effectAllowed = 'move'
  event.dataTransfer.setData('unitID', unit.id)
}

const onDrop = (event,list) =>{
  
  const unitID = event.dataTransfer.getData('unitID')
  const item = items.value.find((item) => item.id == unitID)
}
onMounted(() => {
  console.log(props.units);
});
</script>
