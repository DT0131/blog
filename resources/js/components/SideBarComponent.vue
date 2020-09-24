<template>
  <Slide right noOverlay>
    <a class="side-bar-list" href="/top">
      <span style="font-size: 2em">Home</span>
    </a>
    <a class="side-bar-list" target="_blank" href="https://www.instagram.com/omomaru_no_iru_seikatsu/?hl=ja">
      <span style="font-size: 2em">Instagram</span>
    </a>
    <a class="side-bar-list" href="/contact">
      <span style="font-size: 2em">Contact</span>
    </a>
  </Slide>
</template>

<script>
  // import an animation
  import {Slide} from 'vue-burger-menu'
  // register the component
  export default {
    components: {
      Slide
    },
    mounted() {
      console.log('Component mounted.')
    },
  }
</script>

<style>
.side-bar-list {
  padding-left: 0;
}
</style>