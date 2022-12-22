<template>
  <Head title="Properties" />

  <BreezeAuthenticatedLayout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Properties Edit
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
            <h2 class="text-gray-900 text-lg mb-1 font-medium title-font">
                  Edit Property
                </h2>
                <p class="leading-relaxed mb-5 text-gray-600">
                  Post-ironic portland shabby chic echo park, banjo fashion axe
                </p>
              <form @submit.prevent="updateProperty">
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
                      </div>
                    </div>

                    <div>
                      <label
                        for="location"
                        class="block text-sm font-medium text-gray-700"
                        >Location</label
                      >
                      <div class="mt-1 flex rounded-md shadow-sm">
                        <input
                          v-model="form.location"
                          type="text"
                          name="location"
                          id="location"
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
                      </div>
                    </div>

                    <div>
              <label class="block text-sm font-medium text-gray-700">Photo</label>
              <div class="mt-1 flex items-center">
                <img src="image" class="w-32 h-32" alt="">
              </div>
            </div>


                    <div>
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
                                @input="form.image = $event.target.files[0]"
                              />
                            </label>
                            <p class="pl-1">or drag and drop</p>
                          </div>
                          <p class="text-xs text-gray-500">
                            PNG, JPG, GIF up to 10MB
                          </p>
                        </div>
                      </div>
                    </div>
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
                    >
                      Update
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
import { Inertia} from "@inertiajs/inertia";

const props =  defineProps({
    property: Object,
    image: String
})

const form = useForm({
  name: props.property.name,
  location: props.property.location,
  image: null,
});

const updateProperty = () => {
    Inertia.post(`/properties/${props.property.id}`, {
  _method: 'put',
  name: form.name,
  location: form.location,
  image: form.image,
})
};
</script>
  