<script>
import AdminLayout from "@/Layouts/AdminLayout.vue";
import {Link} from "@inertiajs/vue3";

export default {
    name: "Index",
    layout:AdminLayout,
    components:{
        Link
    },
    methods: {
        storeCategory(){
            axios.post(route('admin.categories.store'),this.category)
                .then(res =>{
                    console.log(res);
                    this.category = {}
                })
        }
    },
    data() {
        return {
            category :{}
        }

    }

}
</script>

<template>
    <div>
        <div class="mb-4">
         <Link :href="route('admin.categories.index')" class="inline-block py-2 px-3 bg-sky-600 border border-sky-700 text-white">Back</Link>
        </div>

        <div class="mb-4">
            <input type="text" v-model="category.title" class="border border-grat-200 p-2" placeholder="title">
        </div>

        <div class="mb-4">
            <select v-model="category.parent_id">
                <option value="1">Category 1</option>
            </select>
        </div>
        <div>
            <a href="#"@click.prevent="storeCategory" class="inline-block py-2 px-3 bg-indigo-600 border border-indigo-700 text-white">Create</a>
        </div>

    </div>

</template>

<style scoped>

</style>
