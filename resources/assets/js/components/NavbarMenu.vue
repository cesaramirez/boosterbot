<template>
        <div class="navbar-menu" :class="{'is-active': navbarBurger }">
            <div class="navbar-end">
                <div class="navbar-item has-dropdown is-hoverable" :class="{ 'is-active': navbar }">
                    <a class="navbar-link" @click.prevent="navbar = !navbar" v-text="user.name" />
                    <div class="navbar-dropdown is-boxed">
                        <a class="navbar-item">
                            Dashboard
                        </a>
                        <a class="navbar-item">
                            Profile
                        </a>
                        <a class="navbar-item">
                            Settings
                        </a>
                        <hr class="navbar-divider">
                        <a class="navbar-item" href="/logout" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            Logout
                            <form id="logout-form" action="/logout" method="POST" class="id-hidden">
                                <input type="hidden" name="_token" :value="csrf">
                            </form>
                        </a>
                    </div>
                </div>
            </div>
        </div>
</template>

<script>
import bus from "./bus";
export default {
  name: "NavbarMenu",
  props: {
    user: {
      type: Object,
      required: true
    }
  },
  data() {
    return {
      navbar: false,
      navbarBurger: false,
      csrf: document
        .querySelector('meta[name="csrf-token"]')
        .getAttribute("content"),
      windowWidth: window.innerWidth
    };
  },
  created() {
    bus.$on("active-burger", response => {
      this.navbarBurger = response;
    });
  }
};
</script>
