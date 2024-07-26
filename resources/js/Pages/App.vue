<template>
  <div id="app">
    <div class="nav">
      <img alt="mmsu" src="/resources/pic/1Seal.png">
      <h1 class="gltext">M<small>ARIANO</small> M<small>ARCOS</small> S<small>TATE</small> U<small>NIVERSITY</small></h1>
    </div>

    <!-- <div class="space"></div> -->

    <!-- Conditionally render the .pindot div based on the current route -->
    <div v-if="!isLoginRoute" class="pindot">
      <router-link to="/basic">Basic</router-link> &nbsp;
      <router-link to="/address">Address</router-link> &nbsp;
      <router-link to="/family">Family</router-link> &nbsp;
      <router-link to="/education">Education</router-link> &nbsp;
      <router-link to="/work">Work</router-link> &nbsp;
      <router-link to="/achievement">Achievement</router-link>
    </div>
    
    <router-view/>
  </div>
</template>

<script>
export default {
  name: 'app',
  computed: {
    isLoginRoute() {
      return this.$route.path === '/login'; // Adjust the path if your login route is different
    }
  }
};
</script>

<style scoped>
body {
  margin: 0;
  padding: 0;
  font-family: Arial, sans-serif;
}

.nav {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  background-color: #0c4b05;
  border: 5px solid #feda3b;
  border-left: #0c4b05;
  border-right: #0c4b05;
  padding: 10px;
  box-sizing: border-box;
  z-index: 1000;
  display: flex;
  align-items: center;
}
.nav img {
  margin-right: 10px;
  height: 70px; 
  width: auto;
}

.nav h1 {
  color: white;
  margin: 0; 
  font-size: 2.5em; 
}

/* .space {
  margin-top: 110px; 
  padding: 20px;
} */

.pindot {
  position: fixed;
  top: 60px; 
  left: 0;
  bottom: 0; 
  width: 200px;
  padding: 10px;
  background-color: #0c4b05;
  box-shadow: 50px rgba(2, 2, 2, 0.1);
  display: flex;
  flex-direction: column; 
  justify-content: center; 
  font-family: Arial, sans-serif;
  font-size: 1.5em;
  overflow-y: auto;
}

.pindot a {
  font-size: 15px;
  text-decoration: none; 
  color: white; 
  text-align: left;
  width: 100%; 
  padding: 8px 0; 
  margin-left: 50px;
  font-size: 20px;
}

.pindot a:hover {
  color: #feda3b;
}

.router-link-exact-active {
  font-weight: bold;
  color: #187b0d; 
}

.footer {
  background-color: #4a4444; 
  color: #fff;
  padding: 10px; 
  position: fixed;
  bottom: 0; 
  left: 0; 
  width: 100%;
  text-align: center;
}
</style>
