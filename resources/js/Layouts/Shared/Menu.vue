<template>
 <nav class="bg-sky-900 py-1 text-white">
        <ul class="flex flex-col justify-evenly md:flex-row md:gap-8">
          <li class="px-4"><Link :href="route('/')">Home</Link></li>
          <li class="px-4"><a href="">Články</a></li>
          <li class="px-4"><a href="">Kalendár</a></li>
          <li class="px-4"><a href="">Galéria</a></li>
          <li class="px-4"><a href="">O nás</a></li>
          <li class="px-4"><a href="">Kontakt</a></li>
        </ul>
      </nav>
</template>



<script setup>
  import { Link } from '@inertiajs/vue3'

</script>