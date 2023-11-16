<script>
import Button from './Button.vue';
// import { ArrowLongRightIcon } from '@heroicons/vue/20/solid';

export default {
  name: "Promotion",
  props: {
    name: String,
    bgButton: String,
    imageUrl: String,
    buttonText: String,
    icon: Object, 
  },
  components: { Button },
}
</script>

<template>
  <div class="flex justify-center h-[220px] items-center w-[320px] rounded-md shadow-md overflow-hidden">
    <div class="flex flex-col m-auto flex-1 px-4 gap-4">
      <div class="flex items-center">
        <h3>{{ name }}</h3>
      </div>
      <Button :background="bgButton" :text="buttonText" :iconComponent="icon" />
    </div>

    <div class="relative h-full w-1/2 overflow-visible">
      <img class="h-full absolute w-full object-cover top-5 bottom-5" :src="imageUrl" :alt="name" />
    </div>
  </div>
</template>
