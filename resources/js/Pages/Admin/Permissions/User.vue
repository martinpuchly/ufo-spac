<template>
    <AppLayout>
        <Head :title="'povolenia ' + user.name" ></Head>
        <h1>Povolenia: {{ user.name }}</h1>
            <form @submit.prevent="form.patch(route('admin.permissions.user', user.id))" >
                <div class="flex flex-wrap">
                    <div v-for="(permission_group, name) in permissions" class="w-1/4 ml-10 mb-20">
                        <h2>{{ name }}</h2>
                        <div v-for="permission in permission_group">
                            <input type="checkbox"  :value="permission.id" :id="'permission_'+permission.id" v-model="form.user_permissions">
                            <label :for="'permission_'+permission.id" class="ml-2">{{ permission.name }}</label>
                        </div>
                    </div>
                </div>
                <PrimaryButton class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Uložiť
                </PrimaryButton>
        </form>
    </AppLayout>
</template>



<script>
import AppLayout from '@/Layouts/AppLayout.vue'
import { Head, useForm } from '@inertiajs/vue3'
import PrimaryButton from '@/Components/PrimaryButton.vue'

export default {
    components: {
        AppLayout,
        Head,
        PrimaryButton
    },
    props:{
        user: Object,
        permissions: Object,
        user_permissions: Array
    },
    setup (props) {
        const form = useForm({
            user_id: props.user.id,
            user_permissions: props.user_permissions,
        })
        return { form }
    },
    methods: {

    },
    mounted(props) {
        console.log(props);
    },
}
</script>
