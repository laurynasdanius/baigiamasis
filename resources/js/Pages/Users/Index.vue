<!-- src/Pages/Users/Index.vue -->
<script setup>
import CrudIndex from "@/Components/CrudIndex.vue";
import { defineProps, ref } from "vue";
import { useForm } from "@inertiajs/vue3";
const props = defineProps({
  title: String,
  users: Object,
});

const fields = [
  { key: "id", label: "#", show: true },
  { key: "name", label: "Name", show: true },
  { key: "email", label: "Email", show: true },
  { key: "teams", label: "Teams", show: true },
  { key: "actions", label: "Actions", show: true },
];

const crudActions = (user) => [
  //edit
  {
    icon: "fas fa-edit",
    class: "bg-orange-600 hover:bg-orange-700 text-white",
    onClick: (user) => edit(user.id),
  },
  //delete
  {
    icon: "fas fa-trash",
    class: "bg-red-600 hover:bg-red-700 text-white",
    onClick: (user) => del(user.id),
  },
];

function edit(id) {
  if (!id) {
    return;
  }
  window.location.href = route("users.edit", id);
}

function del(id) {
  if (!id) {
    return;
  }
  if (confirm("Are you sure you want to Delete")) {
    const form = useForm({});
    form.delete(route("users.destroy", id));
  }
}
console.log(props.users.data);
</script>

<template>
  <CrudIndex :title="title" :data="props.users.data || []" :links="props.users.links || []" :fields="fields" :actions="crudActions" createRoute="users.create">
  </CrudIndex>
</template>
