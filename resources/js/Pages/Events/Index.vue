<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import CrudButtons from '@/Components/CrudButtons.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import { Link } from '@inertiajs/vue3';
import { useForm } from '@inertiajs/vue3';
import { ref } from 'vue';
import moment from 'moment';

const props = defineProps({
    title: String,
    events: {
        type: Object,
        default: () => ({}),
    },
});

const shownEventId = ref(null);
const form = useForm({});
const formatDate = (date, format) => moment(date).format(format);
const fields = [
    { key: 'id', label: '#', show: true },
    { key: 'title', label: 'Title', show: true },
    { key: 'location', label: 'Location', show: true },
    { key: 'start_time', label: 'Start time', show: true },
    { key: 'end_time', label: 'End time', show: true },
    { key: 'actions', label: 'Actions', show: true },
];

const crudActions = (event) => [
    //edit
    {
        icon: 'fas fa-edit',
        class: 'bg-cyan-500 hover:bg-blue-600',
        onClick: () => edit(event.id),
    },
    //show
    {
        icon: 'fas fa-eye',
        class: 'bg-green-500 hover:bg-yellow-600',
        onClick: () => show(event.id),
    },
    //delete
    {
        icon: 'fas fa-trash',
        class: 'bg-red-500 hover:bg-red-600',
        onClick: () => del(event.id),
    },
];

function create() {
    // handle create logic
}

function edit(id) {
    if (!id) {
        return;
    }
    window.location.href = route('events.edit', id);
}

function show(id) {
    if (!id) {
        return;
    }
    shownEventId.value = shownEventId.value === id ? null : id;
}

function del(id) {
    if (!id) {
        return;
    }
    if (confirm("Are you sure you want to Delete")) {
        form.delete(route('events.destroy', id));
    }
}
</script>

<template>
<AppLayout title="Events">
    <template #header>
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            Events Index
        </h2>
    </template>

    <div class="py-12">
        <div class="">
            <div v-if="$page.props.flash.message"
                class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800"
                role="alert">
                <span class="font-medium">
                    {{ $page.props.flash.message }}
                </span>
            </div>
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="mb-2">
                        <Link :href="route('events.create')">
                        <PrimaryButton>Add Event</PrimaryButton>
                        </Link>
                    </div>
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <template v-for="field in fields" :key="field.key">
                                        <th
                                            v-if="field.show"
                                            scope="col"
                                            class="px-6 py-3"
                                        >
                                            {{ field.label }}
                                        </th>
                                    </template>
                                </tr>
                            </thead>
                            <tbody>
                                <template v-for="event in events" :key="event.id">
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                        <template v-for="field in fields" :key="field.key">
                                            <td v-if="field.show && field.key !== 'actions'" :class="{'whitespace-nowrap': field.key === 'id' || field.key === 'title' || field.key === 'location'}">
                                                <div v-if="field.key === 'start_time' || field.key === 'end_time'" class="whitespace-pre-wrap px-5 py-4 font-medium text-gray-800 dark:text-white">
                                                    <span>{{ formatDate(event[field.key], 'YYYY-MM-DD') }}</span><br />
                                                    <span>{{ formatDate(event[field.key], 'HH:mm') }}</span>
                                                </div>
                                                <template v-else>{{ event[field.key] }}</template>
                                            </td>
                                            <td v-if="field.key === 'actions'">
                                                <CrudButtons :actions="crudActions(event)" />
                                            </td>
                                        </template>
                                    </tr>
                                    <tr v-if="shownEventId === event.id"
                                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                        <td colspan="6" class="px-6 py-4">
                                            <div class="grid grid-cols-2 gap-4">
                                                <div>
                                                    <h3 class="font-bold">Description</h3>
                                                    <p>{{ event.description }}</p>
                                                </div>
                                                <!-- Add more columns with additional information here -->
                                            </div>
                                        </td>
                                    </tr>
                                </template>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </AppLayout>
</template>