<script setup>
defineProps({
    value: String,
});
</script>

<template>
    <label data-tw-merge=""
           class="inline-block mb-2 group-[.form-inline]:mb-2 group-[.form-inline]:sm:mb-0 group-[.form-inline]:sm:mr-5 group-[.form-inline]:sm:text-right">
        <span v-if="value">{{ value }}</span>
        <span v-else><slot /></span>
    </label>
</template>
