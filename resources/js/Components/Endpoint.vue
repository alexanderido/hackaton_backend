<script setup>
import ApplicationLogo from "@/Components/ApplicationLogo.vue";
import Endpoint from "@/Components/Endpoint.vue";
import { arrendpoint } from "../../data/apiEndpoint";

const copyToClipboard = (element) => {
    const el = document.createElement("textarea");
    el.value = element;
    document.body.appendChild(el);
    el.select();
    document.execCommand("copy");
    document.body.removeChild(el);
};

const trimText = (text) => {
    return text.replace(/(\r\n|\n|\r)/gm, "ww");
};
</script>

<template>
    <div>
        <div class="p-6 lg:p-8 bg-white border-b border-gray-200">
            <div class="flex flex-col gap-2">
               <div
               class="p-4 bg-gray-100 rounded-l"
               v-for="item in arrendpoint"
                    :key="item"
                    :element="item"
               >
                <h2 class="text-2xl mb-4">Endpoint - {{ item.name }}</h2>
                <div class="flex flex-col gap-2 g">
                    <div 
                    v-for="endpoint in item.endpoints"
                    :key="endpoint"
                    :element="endpoint"
                    class="grid grid-cols-12 gap-2 py-4  bg-gray-100 rounded-lg"
                    >
                      
                        <div v-if="endpoint.method == 'GET'" class="text-sm col-span-2 inline-flex text-left items-center space-x-4 bg-green-600 text-white rounded-lg p-4 pl-6">
                            {{ endpoint.method }}
                            <span class="bg-white ml-4 text-gray-900 rounded-full px-2 py-1">{{ endpoint.scope }}</span>
                        </div>
                        <div v-if="endpoint.method == 'PUT'" class="text-sm col-span-2 inline-flex text-left items-center space-x-4 bg-yellow-600 text-white rounded-lg p-4 pl-6">
                            {{ endpoint.method }}
                            <span class="bg-white ml-4 text-gray-900 rounded-full px-2 py-1">{{ endpoint.scope }}</span>
                        </div>
                        <div v-if="endpoint.method == 'POST'" class="text-sm col-span-2 inline-flex text-left items-center space-x-4 bg-blue-600 text-white rounded-lg p-4 pl-6">
                            {{ endpoint.method }}
                            <span class="bg-white ml-4 text-gray-900 rounded-full px-2 py-1">{{ endpoint.scope }}</span>
                        </div>
                        <div v-if="endpoint.method == 'DELETE'" class="text-sm col-span-2 inline-flex text-left items-center space-x-4 bg-red-600 text-white rounded-lg p-4 pl-6">
                            {{ endpoint.method }}
                            <span class="bg-white ml-4 text-gray-900 rounded-full px-2 py-1">{{ endpoint.scope }}</span>
                        </div>
                        <code
                    class="text-sm col-span-10 sm:text-base inline-flex text-left items-center space-x-4 bg-gray-800 text-white rounded-lg p-4 pl-6"
                >
                    <span class="flex gap-4">
                     
    
                        <span class="flex-1">
                            <span class="text-yellow-500">
                                https://api.dipledev.net/api/v1/
                            </span>
                            <span>
                                {{ endpoint.endpoint }}
                            </span>
                        </span>
                    </span>
    
                    <svg
                        @click="copyToClipboard(`https://api.dipledev.net/api/v1/${endpoint.endpoint}`)"
                        class="shrink-0 h-5 w-5 transition text-gray-500 group-hover:text-white cursor-pointer"
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 20 20"
                        fill="currentColor"
                        aria-hidden="true"
                    >
                        <path d="M8 2a1 1 0 000 2h2a1 1 0 100-2H8z"></path>
                        <path
                            d="M3 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v6h-4.586l1.293-1.293a1 1 0 00-1.414-1.414l-3 3a1 1 0 000 1.414l3 3a1 1 0 001.414-1.414L10.414 13H15v3a2 2 0 01-2 2H5a2 2 0 01-2-2V5zM15 11h2a1 1 0 110 2h-2v-2z"
                        ></path>
                    </svg>
                        </code>
                     <details v-if="endpoint.interface" class="col-span-12">
                        <summary >Interfaces</summary>
                    <div >
                        <pre class=" bg-black flex flex-col">
                            <span v-for="data in endpoint.interface" class="text-left text-white inline" :key="data.name">{{`${data.name}: ${data.type} ${data.required==true ? 'required' : 'optional'}` }}</span>
                           </pre>
                    </div>

                     </details>
                     
                    </div>
                </div>
               </div>

            </div>
        </div>
    </div>
</template>
