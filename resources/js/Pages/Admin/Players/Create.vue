<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

    const props =  defineProps({
        user: Object,
        player: Object
    })

    const form = useForm({
        first_name: this.player.first_name,
        last_name: this.player.first_name,
    });

    const submit = () => {
        form.post(route('admin.players.create'), {
            onFinish: () => form.reset('first_name', 'last_name'),
        });
    };

</script>


<template>
    <Head title="vytvoriť hráča" />
    <AdminLayout>
        <h1>Vytvoriť hráča: {{ $user->username }}</h1>
        <form @submit.prevent="submit">
            <div>
                <InputLabel for="first_name" value="Meno: " />
                <TextInput
                    id="first_name"
                    type="first_name"
                    class="mt-1 block w-full"
                    v-model="form.first_name"
                    required
                    autofocus
                    autocomplete="Meno"
                />
                <InputError class="mt-2" :message="form.errors.first_name" />
            </div>
            <div>
                <InputLabel for="last_name" value="Priezvisko: " />
                <TextInput
                    id="last_name"
                    type="last_name"
                    class="mt-1 block w-full"
                    v-model="form.last_name"
                    required
                    autofocus
                    autocomplete="Priezvisko"
                />
                <InputError class="mt-2" :message="form.errors.last_name" />
            </div>
            <PrimaryButton class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                Vytvoriť hráča
            </PrimaryButton>
        </form>
    </AdminLayout>
</template>
