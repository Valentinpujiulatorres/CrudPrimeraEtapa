<template>
    <Head title="Dashboard" />

    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Galería de imágenes
            </h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div class="mb-4">
                            <Link class="px-6 py-2 mb-2 text-green-100 bg-green-500 rounded"
                                :href="route('imgs.create')">
                                Nueva imagen
                            </Link>
                        </div>
                        <table>
                            <thead class="font-bold bg-gray-300 border-b-2">
                                <td class="px-4 py-2">ID</td>
                                <td class="px-4 py-2">Título</td>
                                <td class="px-4 py-2">Imagen</td>
                                <td class="px-4 py-2">Acción</td>
                            </thead>
                            <tbody>
                                <tr v-for="imagen in imgs.data" :key="imagen.id">
                                    <td class="px-4 py-2">{{ imagen.id }}</td>
                                    <td class="px-4 py-2">{{ imagen.titulo }}</td>
                                    <td class="px-4 py-2">
                                        <img :src="'/storage/images/'+imagen.imagen" alt="image" />
                                    </td>
                                    <td class="px-4 py-2 font-extrabold">
                                        <Link class="text-green-700" :href="route('imgs.edit', imagen.id)">
                                            Edit
                                        </Link>
                                        <Link @click="destroy(imagen.id)" class="text-red-700">
                                            Delete
                                        </Link>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <!-- <pagination :links="imagens.links" /> -->
                    </div>
                </div>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>

<script>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated.vue";
import BreezeNavLink from "@/Components/NavLink.vue";
import { Head } from "@inertiajs/inertia-vue3";
import { Link } from "@inertiajs/inertia-vue3";
export default {
    components: {
        BreezeAuthenticatedLayout,
        Head,
        BreezeNavLink,
        Link,
    },
    props: {
        imgs: Object,
    },
    methods: {
        destroy(id) {
            this.$inertia.delete(route("imgs.destroy", id));
        },
    },
};
</script>
