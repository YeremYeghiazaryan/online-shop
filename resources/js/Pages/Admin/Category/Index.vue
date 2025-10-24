<script>
import AdminLayout from "@/Layouts/AdminLayout.vue";
import {Link} from "@inertiajs/vue3";

export default {
    name: "Index",
    layout:AdminLayout,
    components:{
        Link
    }

}
</script>

<template>
    <div>
        <div class="mb-4">
         <Link :href="route('admin.categories.create')" class="inline-block py-2 px-3 bg-sky-600 border border-sky-700 text-white"> Add</Link>
        </div>

    </div>

</template>

<style scoped>

</style>
