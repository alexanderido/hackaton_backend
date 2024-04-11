import Endpoint from '@/Components/Endpoint.vue';
<template>
    <div>
        <div class="p-6 lg:p-8 bg-white border-b border-gray-200">
           {{descripcion}} - {{ metodo }}
        
        </div>
        <div>
            {{ ruta }}
        </div>
    </div>
</template>

<script>

import { defineProps } from 'vue';
const props = defineProps(['ruta', 'metodo', 'descripcion']);
</script>

<style>

</style>