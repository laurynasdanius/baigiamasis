<script setup>
    import AppLayout from '@/Layouts/AppLayout.vue';
    import CrudButtons from '@/Components/CrudButtons.vue';
    import PrimaryButton from '@/Components/PrimaryButton.vue';
    import {
        Link,
        useForm
    } from '@inertiajs/vue3';
    import Pagination from "@/Components/Pagination.vue";

    import {
        ref,
        computed
    } from 'vue';
    import moment from 'moment';

    const props = defineProps({
        title: String,
        data: Array,
        links: Array,
        fields: {
            type: Array,
            default: () => [],
        },
        actions: {
            type: Function,
            default: () => [],
        },
        shownId: {
            type: [String, Number],
            default: null,
        },
        createRoute: String,
    });

    const form = useForm({});

    const formatDate = (date, format) => moment(date).format(format);
</script>

<template>
    <AppLayout :title="title">
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                {{ title }} Index
            </h2>
        </template>

        <div class="py-12">
            <div class="px-96">
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
                            <Link :href="route(createRoute)">
                            <PrimaryButton>Add {{ title }}</PrimaryButton>
                            </Link>
                        </div>
                        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                <thead
                                    class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                    <tr>
                                        <template v-for="field in fields" :key="field.key">
                                            <th v-if="field.show" scope="col" class="px-6 py-3">
                                                {{ field.label }}
                                            </th>
                                        </template>
                                    </tr>
                                </thead>
                                <tbody>
                                    <template v-for="record in data" :key="record.id">
                                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                            <template v-for="field in fields" :key="field.key">
                                                <td v-if="field.show && field.key !== 'actions'"
                                                    :class="{'whitespace-nowrap': field.key === 'id' || field.key === 'title' || field.key === 'location'}">
                                                    <div v-if="field.type === 'date-time'"
                                                        class="whitespace-pre-wrap px-5 py-4 font-medium text-gray-800 dark:text-white">
                                                        <span>{{ formatDate(record[field.key], 'YYYY-MM-DD') }}</span><br />
                                                        <span>{{ formatDate(record[field.key], 'HH:mm') }}</span>
                                                    </div>
                                                    <div v-else>{{ record[field.key] }}</div>
                                                </td>
                                                <td v-if="field.key === 'actions'">
                                                    <CrudButtons :actions="actions(record)" :item="record" />
                                                </td>
                                            </template>
                                        </tr>
                                        <tr v-if="shownId === record.id" class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                            <td :colspan="fields.filter(field => field.show).length" class="p-0">
                                                <slot name="expanded" :record="record"></slot>
                                            </td>
                                        </tr>
                                    </template>
                                </tbody>
                            </table>
                        </div>
                        <Pagination :links="links" />
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>