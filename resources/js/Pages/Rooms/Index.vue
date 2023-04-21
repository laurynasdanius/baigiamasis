<!-- src/Pages/Rooms/Index.vue -->
<script setup>
import CrudIndex from "@/Components/CrudIndex.vue";
import { defineProps, ref } from "vue";
import { useForm } from "@inertiajs/vue3";
const props = defineProps({
  title: String,
  rooms: Object,
});

const shownRoomId = ref(null);

const fields = [
  { key: "id", label: "#", show: true },
  { key: "name", label: "Name", show: true },
  { key: "description", label: "Description", show: true },
  { key: "capacity", label: "Capacity", show: true },
  { key: "actions", label: "Actions", show: true },
];

const crudActions = (room) => [
  //edit
  {
    icon: "fas fa-edit",
    class: "bg-orange-600 hover:bg-orange-700 text-white",
    onClick: (room) => edit(room.id),
  },
  //show
//   {
//     icon: "fas fa-eye",
//     class: "bg-green-600 hover:bg-green-700 text-white",
//     onClick: (room) => show(room.id),
//   },
  //delete
  {
    icon: "fas fa-trash",
    class: "bg-red-600 hover:bg-red-700 text-white",
    onClick: (room) => del(room.id),
  },
];

function edit(id) {
  if (!id) {
    return;
  }
  window.location.href = route("rooms.edit", id);
}

// function show(id) {
//   if (!id) {
//     return;
//   }
//   shownRoomId.value = shownRoomId.value === id ? null : id;
// }

function del(id) {
  if (!id) {
    return;
  }
  if (confirm("Are you sure you want to Delete")) {
    const form = useForm({});
    form.delete(route("rooms.destroy", id));
  }
}
</script>

<template>
    <CrudIndex :title="title" :data="props.rooms.data || []" :links="props.rooms.links || []" :fields="fields" :actions="crudActions" createRoute="rooms.create">
        <template #expanded="{ record }">
            <div class="px-6 py-4">
                <h3 class="text-lg font-semibold">Description:</h3>
                <p>{{ record.description }}</p>
            </div>
        </template>
    </CrudIndex>
</template>
