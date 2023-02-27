<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import InputError from '@/Components/InputError.vue'
import TextArea from '@/Components/TextArea.vue'

    const props =  defineProps({
        user: Object,
        player: Object
    })

    const form = useForm({
        first_name: props.player.first_name,
        last_name: props.player.first_name,
    });

    const submit = () => {
        form.patch(route(route().current()), {
            onFinish: () => form.reset('first_name', 'last_name'),
        });
    };

    console.log(route(route().current()))

</script>


<template>
    <Head title="upraviť porfil hráča" />
    <AdminLayout>
        <h1>Upraviť hráčsky profil: {{ `${player.first_name} ${player.last_name}` }}</h1>
        <form @submit.prevent="submit">
            <div class="flex flex-col md:flex-row gap-x-8">
                <div class="w-2/6">
                    <InputLabel for="first_name" value="Meno: " />
                    <TextInput
                        id="first_name"
                        type="text"
                        class="mt-1 block w-full"
                        v-model="form.first_name"
                        required
                        autofocus
                        autocomplete="Meno"
                    />
                    <InputError class="mt-2" :message="form.errors.first_name" />
                    <InputLabel for="last_name" value="Priezvisko: "  class="mt-4"/>
                    <TextInput
                        id="last_name"
                        type="text"
                        class="mt-1 block w-full"
                        v-model="form.last_name"
                        required
                        autocomplete="Priezvisko"
                    />
                    <InputError class="mt-2" :message="form.errors.last_name" />
                    <InputLabel for="nickname" value="Prezývka: "  class="mt-4"/>
                    <TextInput
                        id="nickname"
                        type="text"
                        class="mt-1 block w-full"
                        v-model="form.nickname"
                        autocomplete="Prezývka"
                    />
                    <InputError class="mt-2" :message="form.errors.nickname" />
                </div>
                <div class="w-2/6 mx-auto">
                    <InputLabel for="photo" value="Fotka: " />
                    <img src="https://img.freepik.com/free-icon/male-user-close-up-shape-facebook_318-37635.jpg" alt="" class="w-1/2">
                    <TextInput
                        id="photo"
                        type="file"
                        class="mt-1 block w-full"
                        v-model="form.photo"
                        autocomplete="Priezvisko"
                    />
                    <InputError class="mt-2" :message="form.errors.photo" />
                </div>
            </div>
            <div class="flex flex-col md:flex-row gap-x-8 mt-4">
                <div class="w-2/6">
                    <InputLabel for="shirt_number" value="Číslo dresu: " />
                    <TextInput
                        id="shirt_number"
                        type="number"
                        step="1"
                        class="mt-1 block w-full"
                        v-model="form.shirt_number"
                        autocomplete="Dátum narodenia"
                    />
                    <InputError class="mt-2" :message="form.errors.shirt_number" />
                </div>
                <div class="w-2/6">
                    <InputLabel for="birth_date" value="Dátum narodenia: " />
                    <TextInput
                        id="birth_date"
                        type="datetime-local"
                        class="mt-1 block w-full"
                        v-model="form.birth_date"
                        autocomplete="Dátum narodenia"
                    />
                    <InputError class="mt-2" :message="form.errors.birth_date" />
                </div>
            </div>
            <div class="flex flex-col md:flex-row gap-x-8 mt-4">
                <div class="w-4/6">
                    <InputLabel for="about" value="O mne: " />
                    <TextArea
                        id="about"
                        type="textarea"
                        class="mt-1 block w-full"
                        v-model="form.about"
                        autocomplete="O mne"
                    />
                    <InputError class="mt-2" :message="form.errors.birth_date" />
                </div>
            </div>

            <PrimaryButton class="ml-4 mt-3" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                Uložiť profil hráča
            </PrimaryButton>
        </form>
    </AdminLayout>
</template>
