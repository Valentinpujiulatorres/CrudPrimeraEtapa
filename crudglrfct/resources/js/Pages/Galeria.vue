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
                <div class="mb-4 max-w-xs">
                    Puedes buscar aquí, por título de la imagen.
                    <input type="search" aria-label="Buscar" placeholder="Buscar..." v-model="params.search" class="block w-full rounded-md border-gray-300 shadow-sm sm:rounded-lg">
                </div>
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div class="mb-4">
                            <Link class="px-6 py-2 mb-2 btn btn-success"
                                :href="route('imgs.create')" as="button">
                                Nueva imagen
                            </Link>
                        </div>
                        <div>Puedes ordenar por ID y por título haciendo click encima de las columnas.</div>
                        <table id="galeriaimg" class="table table-striped table-hover table-bordered my-3 align-middle">
                            <thead class="font-bold">

                                <th class="py-2 col-1">
                                    <span class="inline-flex w-full justify-between sortable" @click="sort('id')">ID
                                        <span v-if="params.field === 'id' && params.direction === 'asc'">&#8593;</span>
                                        <span v-if="params.field === 'id' && params.direction === 'desc'">&#8595;</span>
                                    </span>
                                </th>

                                <th class="py-2 col-3">
                                    <span class="inline-flex w-full justify-between sortable" @click="sort('titulo')">Título
                                        <span v-if="params.field === 'titulo' && params.direction === 'asc'">&#8593;</span>
                                        <span v-if="params.field === 'titulo' && params.direction === 'desc'">&#8595;</span>
                                    </span>
                                </th>

                                <th class="py-2 col-5"><span class="inline-flex w-full justify-between">Imagen</span></th>
                                <th class="py-2 col-3"><span class="inline-flex w-full justify-between">Acciones</span></th>
                            </thead>
                            <tbody>
                                <!-- Recupero las imágenes de la BBDD y recorro con v-for, mostrando columna por columna -->
                                <tr v-for="imagen in imgs.data" :key="imagen.id">

                                    <td class="py-2">{{ imagen.id }}</td>
                                    <td class="py-2">{{ imagen.titulo }}</td>
                                    <td class="py-2">
                                        <!-- Así puedo recoger la ruta donde tengo todas mis imágenes almacenadas -->
                                        <img :src="'/storage/images/'+imagen.imagen" alt="image" />
                                    </td>

                                    <td class="py-2 font-extrabold">
                                        <Link class="btn btn-info" :href="route('imgs.show', imagen.id)" as="button">
                                            Ver
                                        </Link>
                                        <Link class="btn btn-warning" :href="route('imgs.edit', imagen.id)" as="button">
                                            Editar
                                        </Link>
                                        <!-- Asocia el botón de eliminar a su imagen correspondiente -->
                                        <Link @click="destroy(imagen.id)" class="btn btn-danger" as="button">
                                            Eliminar
                                        </Link>
                                    </td>

                                </tr>
                            </tbody>
                        </table>
                        <pagination class="mt-6" :links="imgs.links" />
                    </div>
                </div>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>
<style scoped>
    th > span {
        border: none;
    }
    span.sortable:hover {
        cursor: pointer;
        color: green;
    }
</style>
<script>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated.vue";
import BreezeNavLink from "@/Components/NavLink.vue";
import { Head } from "@inertiajs/inertia-vue3";
import { Link } from "@inertiajs/inertia-vue3";
import Pagination from '@/Components/Pagination';
import { pickBy } from 'lodash';
import { throttle } from 'lodash';
export default {
    components: {
        BreezeAuthenticatedLayout,
        Head,
        BreezeNavLink,
        Link,
        Pagination,
    },
    // Las propiedades se recogen desde GaleriaController.php que está del lado del servidor
    props: {
        imgs: Object,
        filters: Object,
    },
    methods: {
        destroy(id) {
            this.$inertia.delete(route("imgs.destroy", id));
        },
        sort(field) {
            this.params.field = field;
            this.params.direction = this.params.direction === 'asc' ? 'desc' : 'asc';
        }
    },
    data () {
        return {
            params: {
                search: this.filters.search,
                field: this.filters.field,
                direction: this.filters.direction
            }
        }
    },
    // Watch se encarga de actualizar la url a tiempo real para hacer las queries con nuestra datatable.
    // Limitamos a una petición cada 150 ms con throttle para no cargar en exceso al servidor
    watch: {
        params: {
            handler: throttle(function() {  
                let params = pickBy(this.params); // Si el campo de búsqueda está vacío, se limpia de la url

                this.$inertia.get(this.route("imgs.index"), params, {replace: true, preserveState: true});
            }, 150),
           
            deep: true,
        }
    }
};
</script>
