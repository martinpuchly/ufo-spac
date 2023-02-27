<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import InputError from '@/Components/InputError.vue'

    const props =  defineProps({
        user: Object,
        player: Object
    })

    const form = useForm({
        first_name: props.player.first_name,
        last_name: props.player.first_name,
    });

    const submit = () => {
        form.post(route('admin.players.create', props.user.id), {
            onFinish: () => form.reset('first_name', 'last_name'),
        });
    };

</script>


<template>
    <Head title="vytvoriť hráča" />
    <AdminLayout>
        <h1>Vytvoriť hráča: {{ user.username }}</h1>
        <form @submit.prevent="submit">
            <div class="flex flex-col md:flex-row gap-x-8">
                <div class="w-2/5">
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
                </div>
                <div class="w-2/5">
                    <InputLabel for="last_name" value="Priezvisko: " />
                    <TextInput
                        id="last_name"
                        type="text"
                        class="mt-1 block w-full"
                        v-model="form.last_name"
                        required
                        autocomplete="Priezvisko"
                    />
                    <InputError class="mt-2" :message="form.errors.last_name" />
                </div>
            </div>

            <PrimaryButton class="ml-4 mt-3" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                Vytvoriť hráča
            </PrimaryButton>
        </form>
    </AdminLayout>
</template>
