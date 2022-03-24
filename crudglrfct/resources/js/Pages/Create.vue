<template>
    <Head title="Dashboard" />

    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Subir una imagen
            </h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <!-- Submit del formulario de la forma que recomienda Inertia. Cito la documentación:
                        While it's possible to make classic form submissions with Inertia, it's not recommended, as they cause 
                        full page reloads. Instead, it's better to intercept form submissions and then make the request using Inertia. -->
                        <form @submit.prevent="submit">
                            <div>
                                <label for="titulo">Título</label>
                                <input
                                    type="text"
                                    v-model="form.titulo"
                                    class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600"
                                />
                                <div v-if="errors.titulo" class="text-danger">{{ errors.titulo }}</div>
                            </div>
                            <div class="mt-4">
                                <label for="descripcion">Descripción</label>
                                <textarea
                                    name="descripcion"
                                    type="text"
                                    v-model="form.descripcion"
                                    class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600"
                                >
                                </textarea>
                                <div v-if="errors.descripcion" class="text-danger">{{ errors.descripcion }}</div>
                            </div>
                            <div class="mt-4">
                                <label for="imagen">Imagen</label>
                            </div>
                            <input class="mt-2" type="file" @input="form.imagen = $event.target.files[0]" />
                            <!-- Como se suben las imágenes de una en una, basta con ese $event.target.files[0] -->
                            <div v-if="errors.imagen" class="text-danger">{{ errors.imagen }}</div>

                            <!-- submit -->
                            <div class="flex items-center mt-4">
                                <button class="px-6 py-2 text-white bg-gray-900 rounded">
                                    Crear
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>

<script>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated.vue";
import BreezeLabel from "@/Components/Label";
import { Head } from "@inertiajs/inertia-vue3";
import { useForm } from "@inertiajs/inertia-vue3";
import { Inertia } from '@inertiajs/inertia'
export default {
    props: {
        errors: Object,
    },
    components: {
        BreezeAuthenticatedLayout,
        Head,
    },
    setup() {
        const form = useForm({
            titulo: null,
            descripcion: null,
        });

        function submit() {
            Inertia.post('/imgs', form)
        }

        return { form, submit };
    },
};
</script>