<template>
  <button :class="background+ ` flex gap-2 text-xs text-white justify-center items-center rounded-md w-48rem p-2`">
    {{ text }}
    <component :is="iconComponent" class="icon w-4 h-4" />
  </button>
</template>

<script>
export default {
  name: "Button",
  props: {
    text: String,
    background: String,
    iconComponent: Object, // Define the prop type as Object for a component
  },
};
</script>
