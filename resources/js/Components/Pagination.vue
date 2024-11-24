<script setup>
    import { Link } from '@inertiajs/vue3';
    const props = defineProps({
        links : Array
    })
</script>
<template>
    <div  class="flex flex-wrap -mb-1">
        <template v-for="(link, key) in props.links" :key="key">
            <div
                v-if="link.url === null"
                class="mr-1 mb-1 px-2 py-3 text-sm leading-4 text-gray-500 border-2 border-white rounded"
                
            >{{ link.label.replaceAll('&amp;laquo; Previous', '<< Previous').replaceAll('Next &amp;raquo;', 'Next >>') }}</div>
            <Link
                v-else
                class="mr-1 mb-1 px-4 py-3 text-sm leading-4 border-2 border-white rounded focus:border-accent focus:text-accent"
                :class="{ 'bg-blue text-white': link.active, 'bg-orange text-white' : !link.active }"
                :href="link.url"
                >{{ link.label.replaceAll('&amp;laquo; Previous', '<< Previous').replaceAll('Next &amp;raquo;', 'Next >>') }}</Link
            >
        </template>
    </div>
</template>
