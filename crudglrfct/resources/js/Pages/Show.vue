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
                            <Link class="px-6 py-2 mb-2 btn btn-success"
                                :href="route('imgs.index')" as="button">
                                Volver a la galería
                            </Link>
                        </div>
                        <div v-if="img" class="card col-12 col-sm-9 col-md-6 col-lg-4">
                            <img :src="'/storage/images/'+img.imagen" class="card-img-top" alt="image" />
                            <div class="card-body">
                                <h5 class="card-title">
                                    <span class="rounded-3 bg-custom p-1"># {{ img.id }}</span> {{ img.titulo }}
                                </h5>
                                <p class="card-text">Descripción: {{ img.descripcion }}</p>
                                <Link class="btn btn-warning" :href="route('imgs.edit', img.id)" as="button">
                                    Editar
                                </Link>
                                <!-- Asocia el botón de eliminar a su img correspondiente -->
                                <Link @click="destroy(img.id)" class="btn btn-danger" as="button">
                                    Eliminar
                                </Link>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>
<style scoped>
    .bg-custom {
        background-color: darkgray;
    }
</style>
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
        img: Object,
    },
    methods: {
        destroy(id) {
            this.$inertia.delete(route("imgs.destroy", id));
        },
    },
};
</script>
