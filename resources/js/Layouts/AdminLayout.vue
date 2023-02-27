<template>
<div class="main-container container mx-auto">
    <header>
      <div class="flex flex-wrap items-center p-3">
        <div class="aspect-w-4 aspect-h-4">
          <img src="http://www.ufospacince.sk/sites/default/files/novelogo_2.png" class="ml-5 w-32" alt="" />
        </div>
        <div class="header-titile">U.F.O. Špačince</div>
      </div>
    </header>
    <div class="flex flex-col-reverse md:flex-row">
      <div class="mr-5 basis-1/6 border-r-2">
        <div v-if="$page.props.auth.user">
          ID: {{  $page.props.auth.user.id }}
        </div>
        
      </div>
      <div class="mt-3 basis-5/6">
        <div v-if="$page.props.flash.notice" class="bg-blue-100 rounded-lg py-5 px-6 mb-3 text-base text-blue-700 inline-flex items-center w-full" role="alert">
            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="info-circle" class="w-4 h-4 mr-2 fill-current" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                <path fill="currentColor" d="M256 8C119.043 8 8 119.083 8 256c0 136.997 111.043 248 248 248s248-111.003 248-248C504 119.083 392.957 8 256 8zm0 110c23.196 0 42 18.804 42 42s-18.804 42-42 42-42-18.804-42-42 18.804-42 42-42zm56 254c0 6.627-5.373 12-12 12h-88c-6.627 0-12-5.373-12-12v-24c0-6.627 5.373-12 12-12h12v-64h-12c-6.627 0-12-5.373-12-12v-24c0-6.627 5.373-12 12-12h64c6.627 0 12 5.373 12 12v100h12c6.627 0 12 5.373 12 12v24z"></path>
            </svg>
            {{ $page.props.flash.notice }}
        </div>           
        <div v-if="$page.props.flash.error" class="bg-purple-100 rounded-lg py-5 px-6 mb-3 text-base text-purple-700 inline-flex items-center w-full" role="alert">
            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="circle" class="w-4 h-4 mr-2 fill-current" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                <path fill="currentColor" d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8z"></path>
            </svg>
            {{ $page.props.flash.error }}
        </div>
        <div v-if="$page.props.flash.succeed" class="bg-green-100 rounded-lg py-5 px-6 mb-3 text-base text-green-700 inline-flex items-center w-full" role="alert">
            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="check-circle" class="w-4 h-4 mr-2 fill-current" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                <path fill="currentColor" d="M504 256c0 136.967-111.033 248-248 248S8 392.967 8 256 119.033 8 256 8s248 111.033 248 248zM227.314 387.314l184-184c6.248-6.248 6.248-16.379 0-22.627l-22.627-22.627c-6.248-6.249-16.379-6.249-22.628 0L216 308.118l-70.059-70.059c-6.248-6.248-16.379-6.248-22.628 0l-22.627 22.627c-6.248 6.248-6.248 16.379 0 22.627l104 104c6.249 6.249 16.379 6.249 22.628.001z"></path>
            </svg>
            {{ $page.props.flash.succeed }}
        </div>
        <slot />
      </div>
    </div>
  </div>
  <footer class="container mx-auto text-center">asdad</footer>

</template>



<script>
import { Link } from '@inertiajs/vue3'
import Menu from './Shared/Menu.vue'

export default {
    components: {
    Link,
    Menu
    }
}



</script>