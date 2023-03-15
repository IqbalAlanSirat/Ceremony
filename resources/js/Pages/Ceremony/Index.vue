<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";

const props = defineProps({
    ceremonies: Object,
});
</script>

<template>
    <AppLayout title="Dashboard">
        <template #header>
            <h2
                class="font-semibold text-xl text-gray-800 leading-tight mt-8 text-2xl font-medium text-gray-900"
            >
                Senarai Ceremony
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <span class="p-buttonset">
                    <a
                        class="rounded"
                        v-if="ceremonies.prev_page_url"
                        :href="ceremonies.prev_page_url"
                        ><Button
                            label="Sebelumnya"
                            size="small"
                            icon="pi pi-check"
                        />
                    </a>
                    <a
                        class="rounded"
                        v-if="ceremonies.next_page_url"
                        :href="ceremonies.next_page_url"
                        ><Button
                            label="Seterusnya"
                            size="small"
                            icon="pi pi-check"
                        />
                    </a>
                </span>
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="p-6 lg:p-8 bg-white border-b border-gray-200">
                        <table>
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama</th>
                                    <th>Desc</th>
                                    <th>Pic</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr
                                    v-for="(ceremony, index) in ceremonies.data"
                                    :key="index"
                                >
                                    <td>
                                        {{ index + 1 }}
                                    </td>
                                    <td>{{ ceremony.name }}</td>
                                    <td>{{ ceremony.description }}</td>
                                    <td>{{ ceremony.image_name }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- <ul>
                        <li
                            v-for="(ceremony, index) in ceremonies.data"
                            key="index"
                        >
                            {{ ceremony.name }}
                        </li>
                    </ul> -->
                    <!-- <a
                        v-if="ceremonies.prev_page_url"
                        :href="ceremonies.prev_page_url"
                        ><Button label="Submit"
                    /></a>
                    <a
                        v-if="ceremonies.next_page_url"
                        :href="ceremonies.next_page_url"
                        ><Button label="sdfs"
                    /></a> -->
                </div>

                <span class="p-buttonset">
                    <a
                        v-if="ceremonies.prev_page_url"
                        :href="ceremonies.prev_page_url"
                        ><Button
                            label="Sebelumnya"
                            size="small"
                            icon="pi pi-check"
                        />
                    </a>
                    <a
                        v-if="ceremonies.next_page_url"
                        :href="ceremonies.next_page_url"
                        ><Button
                            label="Seterusnya"
                            size="small"
                            icon="pi pi-check"
                        />
                    </a>
                </span>
            </div>
        </div>
    </AppLayout>
</template>
