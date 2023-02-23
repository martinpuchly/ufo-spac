<script setup>
import { Head } from '@inertiajs/vue3'

    defineProps({
        permissions: Array
    })



</script>


<template>

<Head title="Prihlásiť" />
    <div>
        <div v-for="permission in permissions">
            {{ permission }}
        </div>
    </div>

</template>