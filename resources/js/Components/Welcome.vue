<script setup>
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import Endpoint from '@/Components/Endpoint.vue';

</script>

<template>
    <div>
        <div class="p-6 lg:p-8 bg-white border-b border-gray-200">

            <Endpoint metodo="post" ruta='https://api.dipledev.net/api/test' descripcion="test endpoint"/>
         
        </div>

        
    </div>
</template>
