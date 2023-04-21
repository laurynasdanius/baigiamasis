<script setup>
    import AppLayout from "@/Layouts/AppLayout.vue";
    import {
        Head
    } from "@inertiajs/vue3";
    import PrimaryButton from "@/Components/PrimaryButton.vue";
    import {
        useForm
    } from "@inertiajs/vue3";

    const props = defineProps({
        room: {
            type: Object,
            default: () => ({}),
        },
    });

    const form = useForm({
        name: props.room.name,
        description: props.room.description,
        capacity: props.room.capacity,
    });

    const submit = () => {
        form.put(route("rooms.update", {
            room: props.room.id
        }), {
            preserveScroll: true
        });
    };
</script>

<template>

    <Head title="Room Edit" />

    <AppLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Room Edit
            </h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <form @submit.prevent="submit">
                            <div class="mb-6">
                                <label for="Name"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Name</label>
                                <input type="text" v-model="form.name" name="name"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    placeholder="" />
                                <div v-if="form.errors.name" class="text-sm text-red-600">
                                    {{ form.errors.name }}
                                </div>
                            </div>
                            <div class="mb-6">
                                <label for="description"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Description</label>
                                <textarea type="text" v-model="form.description" name="description" id=""
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"></textarea>

                                <div v-if="form.errors.description" class="text-sm text-red-600">
                                    {{ form.errors.description }}
                                </div>
                            </div>
                            <div class="mb-6">
                                <label for="capacity"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Capacity</label>
                                <input type="number" v-model="form.capacity" name="capacity"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    placeholder="" />
                                <div v-if="form.errors.capacity" class="text-sm text-red-600">
                                    {{ form.errors.capacity }}
                                </div>
                            </div>
                            <PrimaryButton type="submit"
                                class="text-white bg-blue-700  focus:outline-none  font-medium rounded-lg text-sm px-5 py-2.5 "
                                :disabled="form.processing" :class="{ 'opacity-25': form.processing }">
                                Submit
                            </PrimaryButton>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>