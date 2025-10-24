<script>
import {Link}  from "@inertiajs/vue3";
import Dashboard from "@/Pages/Dashboard.vue";

export default {
    name: "AdminLayout",
    components:{
        Dashboard,
        Link
    }
}
</script>

<template>
    <div>
        <section class="w-full p-4 border-b border-gray-100">
            <header>
            Market Admin
            </header>
        </section>

        <section class="flex">
            <aside class="w-1/4 bg-gray-500 min-h-screen">
                <nav>
                    <Link :href="route('dashboard')" class="block p-4 text-white border-b ">Dashboard</Link>
                    <Link :href="route('admin.product-parents.index')" class="block p-4 text-white border-b">Product groups</Link>
                    <Link :href="route('admin.products.index')" class="block p-4 text-white border-b">Products</Link>
                    <Link :href="route('admin.categories.index')" class="block p-4 text-white border-b">Category</Link>
                    <Link :href="route('admin.params.index')" class="block p-4 text-white border-b">Params</Link>
                </nav>
            </aside>
            <article class="w-3/4 bg-gray-50 p-4">
                <slot/>
            </article>
        </section>

        <section>
            <footer>

            </footer>
        </section>

    </div>

</template>

<style scoped>

</style>
