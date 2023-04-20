<!-- src/Pages/Events/Index.vue -->
<script setup>
import CrudIndex from "@/Components/CrudIndex.vue";
import { defineProps, ref } from "vue";
import { useForm } from "@inertiajs/vue3";
const props = defineProps({
  title: String,
  events: Object,
  // events: Array,
});

const shownEventId = ref(null);

const fields = [
  { key: "id", label: "#", show: true },
  { key: "title", label: "Title", show: true },
  { key: "location", label: "Location", show: true },
  { key: "start_time", label: "Start time", show: true, type: "date-time" },
  { key: "end_time", label: "End time", show: true, type: "date-time" },
  { key: "actions", label: "Actions", show: true },
];

const crudActions = (event) => [
  //edit
  {
    icon: "fas fa-edit",
    class: "bg-orange-600 hover:bg-orange-700 text-white",
    onClick: (event) => edit(event.id),
  },
  //show
  {
    icon: "fas fa-eye",
    class: "bg-green-600 hover:bg-green-700 text-white",
    onClick: (event) => show(event.id),
  },
  //delete
  {
    icon: "fas fa-trash",
    class: "bg-red-600 hover:bg-red-700 text-white",
    onClick: (event) => del(event.id),
  },
];

function edit(id) {
  if (!id) {
    return;
  }
  window.location.href = route("events.edit", id);
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
    const form = useForm({});
    form.delete(route("events.destroy", id));
  }
}
</script>

<template>
    <CrudIndex :title="title" :data="props.events.data" :links="props.events.links" :fields="fields"
        :actions="crudActions" createRoute="events.create" :shown-id="shownEventId">
        <template #expanded="{ record }">
            <div class="px-6 py-4">
                <h3 class="text-lg font-semibold">Description:</h3>
                <p>{{ record.description }}</p>
            </div>
        </template>
    </CrudIndex>
</template>