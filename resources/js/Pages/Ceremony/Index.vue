<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import { ref, onMounted } from "vue";

// const props = defineProps({
//     ceremonies: { type: Object, default: {} },
// });

const ceremonies = ref({});

function getCeremonies() {
    axios
        .get(route("api.ceremony.index"))
        .then((resp) => {
            console.log("ceremonies", resp);
            ceremonies.value = resp.data;
        })
        .catch((err) => {
            console.log("err", err);
        })
        .finally(() => {
            console.log("end");
        });
}

function changePage(url) {
    axios
        .get(url)
        .then((resp) => {
            console.log("ceremonies", resp);
            ceremonies.value = resp.data;
        })
        .catch((err) => {
            console.log("err", err);
        })
        .finally(() => {
            console.log("end");
        });
}

function remove(ceremony) {
    axios
        .delete(route("api.ceremonies.destroy", ceremony))
        .then((resp) => {
            console.log("dasda", resp);
        })
        .catch((err) => {
            console.log("err", err);
        })
        .finally(() => {
            // console.log("end");
            getCeremonies();
        });
}

onMounted(() => {
    getCeremonies();
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
                    <Button
                        v-if="ceremonies.prev_page_url"
                        label="Sebelumnya"
                        size="small"
                        icon="pi pi-check"
                        @click.prevent="changePage(ceremonies.prev_page_url)"
                    />
                    <Button
                        v-if="ceremonies.next_page_url"
                        label="Seterusnya"
                        size="small"
                        icon="pi pi-check"
                        @click.prevent="changePage(ceremonies.next_page_url)"
                    />
                    <!-- <a
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
                    </a> -->
                </span>
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="p-6 lg:p-8 bg-white border-b border-gray-200">
                        <table>
                            <thead>
                                <tr>
                                    <th class="p-5">#</th>
                                    <th class="p-5">Nama</th>
                                    <th class="p-5">Desc</th>
                                    <th class="p-5">Pic</th>
                                    <th class="p-5">Tarikh mula</th>
                                    <th class="p-5">Tarikh tamat</th>
                                    <th class="p-5">Tindakan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr
                                    v-for="(ceremony, index) in ceremonies.data"
                                    :key="index"
                                >
                                    <td class="p-2">
                                        {{ index + 1 }}
                                    </td>
                                    <td class="p-2">{{ ceremony.name }}</td>
                                    <td class="p-2">
                                        {{ ceremony.description }}
                                    </td>
                                    <td class="p-2">
                                        {{ ceremony.image_name }}
                                    </td>
                                    <td class="p-2">
                                        {{ ceremony.start_date }}
                                    </td>
                                    <td class="p-2">{{ ceremony.end_date }}</td>
                                    <td>
                                        <Button
                                            label="Delete"
                                            severity="danger"
                                            @click.prevent="remove(ceremony)"
                                        />
                                    </td>
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
                    <Button
                        v-if="ceremonies.prev_page_url"
                        label="Sebelumnya"
                        size="small"
                        icon="pi pi-check"
                        @click.prevent="changePage(ceremonies.prev_page_url)"
                    />
                    <Button
                        v-if="ceremonies.next_page_url"
                        label="Seterusnya"
                        size="small"
                        icon="pi pi-check"
                        @click.prevent="changePage(ceremonies.next_page_url)"
                    />
                </span>
            </div>
        </div>
    </AppLayout>
</template>
