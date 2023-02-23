<template>
    <AppLayout>
        <Head :title="'povolenia ' + group.name" ></Head>
        <h1>Povolenia skupiny: {{ group.name }}</h1>
            <form @submit.prevent="form.patch(route('admin.permissions.group', group.id))" >
                <div class="flex flex-wrap">
                    <div v-for="(permission_group, name) in permissions" class="w-1/4 ml-10 mb-20">
                        <h2>{{ name }}</h2>
                        <div v-for="permission in permission_group">
                            <input type="checkbox"  :value="permission.id" :id="'permission_'+permission.id" v-model="form.group_permissions">
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
        group: Object,
        permissions: Object,
        group_permissions: Array
    },
    setup (props) {
        const form = useForm({
            group_id: props.group.id,
            group_permissions: props.group_permissions,
        })
        return { form }
    }
}
</script>
