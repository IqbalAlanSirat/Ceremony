<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import { ref, reactive } from "vue";
import InputText from "primevue/inputtext";
import { useVuelidate } from "@vuelidate/core";
import { required } from "@vuelidate/validators";
import ConfirmPopup from "primevue/confirmpopup";

const props = defineProps({
    ceremony: {
        type: Object,
        default: null,
    },
});

const form = reactive({
    name: props.ceremony ? props.ceremony.name : null,
    description: props.ceremony ? props.ceremony.description : null,
    image_name: props.ceremony ? props.ceremony.image_name : null,
    start_date: props.ceremony ? props.ceremony.start_date : null,
    end_date: props.ceremony ? props.ceremony.end_date : null,
});

const rules = {
    name: { required },
    description: { required },
    image_name: { required },
    start_date: { required },
    end_date: { required },
};

const v$ = useVuelidate(rules, form, { $autoDirty: true });
const errors = ref({});

function submit() {
    props.ceremony ? update() : store();
}

function store() {
    console.log("store", form);
    axios
        .post(route("api.ceremonies.store", form))
        .then((resp) => {
            console.log("data dihantar", resp);
        })
        .catch((err) => {
            if (err.response.status == 422) {
                errors.value = err.response.data.errors;
            }
            console.log("Err", err);
        })
        .finally(() => {
            console.log("done function submit");
        });
}

function update() {
    console.log("update", form);
    axios
        .patch(route("api.ceremonies.update", props.ceremony), form)
        .then((resp) => {
            console.log("data dihantar", resp);
        })
        .catch((err) => {
            if (err.response.status == 422) {
                errors.value = err.response.data.errors;
            }
            console.log("Err", err);
        })
        .finally(() => {
            console.log("done function submit");
        });
}
</script>

<template>
    <AppLayout title="Dashboard">
        <template #header>
            <h2
                class="font-semibold text-xl text-gray-800 leading-tight mt-8 text-2xl font-medium text-gray-900"
            >
                Tambah Ceremony
            </h2>
        </template>

        <div v-for="(error, index) in errors" :key="index" class="my-3">
            <div v-for="(message, index) in error" :key="index">
                <p>{{ message }}</p>
            </div>
        </div>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="p-6 lg:p-8 bg-white border-b border-gray-200">
                        <!-- <ConfirmPopup></ConfirmPopup>
                        <div
                            class="card flex flex-wrap gap-2 justify-content-center"
                        >
                            <Button
                                @click="confirm1($event)"
                                icon="pi pi-check"
                                label="Confirm"
                            ></Button>
                            <Button
                                @click="confirm2($event)"
                                icon="pi pi-times"
                                label="Delete"
                                outlined
                                severity="danger"
                            ></Button>
                        </div> -->
                        <div class="m-30">
                            <label for="">Nama :</label>
                            <InputText type="text" v-model="form.name" />
                            <div v-if="v$.name.$invalid">
                                <p
                                    v-for="(error, index) in v$.name.$errors"
                                    :key="index"
                                >
                                    {{ error.$message }}
                                </p>
                            </div>
                        </div>
                        <div class="m-30">
                            <label for="">Description :</label>
                            <InputText type="text" v-model="form.description" />
                        </div>
                        <div class="m-30">
                            <label for="">Pic :</label>
                            <InputText type="text" v-model="form.image_name" />
                        </div>
                        <div class="m-30">
                            <label for="">Start Date :</label>
                            <InputText
                                type="datetime-local"
                                v-model="form.start_date"
                            />
                        </div>
                        <div class="m-30">
                            <label for="">End Date :</label>
                            <InputText
                                type="datetime-local"
                                v-model="form.end_date"
                            />
                        </div>
                        <br />
                        <Button label="Submit" @click="submit" />
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
