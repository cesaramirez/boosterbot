<template>
  <div
    class="navbar-burger burger"
    @click="showMenu"
    :class="{ 'is-active': burger }"
    data-target="navMenu">
    <span></span>
    <span></span>
    <span></span>
  </div>
</template>

<script>
import bus from "./bus";
export default {
  name: "NavbarBurger",
  data() {
    return {
      burger: false
    };
  },
  methods: {
    showMenu() {
      this.burger = !this.burger;
      bus.$emit("active-burger", this.burger);
    }
  }
};
</script>
<style scoped>
div {
  border: 0px solid red;
}
</style>
