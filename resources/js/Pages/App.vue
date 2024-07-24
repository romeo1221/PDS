<template>
  <div id="app">
    

    <div class="nav">
      <img alt="mmsu" src="/resources/pic/1Seal.png">
      <h1 class="gltext">M<small>ARIANO</small> M<small>ARCOS</small> S<small>TATE</small> U<small>NIVERSITY</small></h1>
    </div>

    <div class="space"></div>

    <div class="pindot">
      <router-link to="/basic">Basic</router-link> &nbsp; 
      <router-link to="/address">Address</router-link> &nbsp;
      <router-link to="/family">Family</router-link> &nbsp;
      <router-link to="/education">Education</router-link> &nbsp;
      <router-link to="/work">Work</router-link> &nbsp;
      <router-link to="/achievement">Achievement</router-link>
    </div>
    <router-view/>

    <!-- <div class="background-image">
      <img src="/resources/pic/mamasu.png" alt="Background">
    </div> -->

    <!-- <div class="footer">
      <h2> SAKA </h2>
    </div> -->
  </div>
</template>

<script>
export default {
  name: 'app'
};
</script>

<style scoped>
body {
  margin: 0;
  padding: 0;
  font-family: Arial, sans-serif;
}

/* .background-image {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  overflow: hidden;
  z-index: -1; /* Ensure the background image is behind other content 
}

.background-image img {
  width: 100%;
  height: 100%;
  object-fit: cover; /* Ensure the image covers the entire background 
} */

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
  align-items: center; /* Center align items vertically */
}

.nav img {
  margin-right: 10px; /* Space between the logo and text */
  height: 70px; /* Adjust the height as needed */
  width: auto; /* Keep the aspect ratio */
}

.nav h1 {
  color: white; /* Text color */
  margin: 0; /* Remove default margin */
  font-size: 2.5em; /* Adjust font size as needed */
}

.space {
  margin-top: 110px; /* Adjust this margin to accommodate the fixed nav height */
  padding: 20px;
}

.pindot {
  position: fixed;
  top: 60px; /* Adjust top margin to align below the nav */
  left: 0;
  bottom: 0; /* Stick to the bottom of the viewport */
  width: 200px; /* Adjust width as needed */
  padding: 10px;
  background-color: rgba(128, 131, 128, 0.8); /* Semi-transparent background */
  box-shadow: 0 0 10px rgba(31, 21, 21, 0.1);
  display: flex;
  flex-direction: column; /* Stack links vertically */
  justify-content: center; /* Center items horizontally */
  
  font-family: Arial, sans-serif;
  font-size: 1.5em;
  overflow-y: auto; /* Enable scrolling if content exceeds container height */
}

.pindot a {
  font-size: 15px;
  text-decoration: none; /* Remove underline */
  color: white; /* Link color */
  text-align: center; /* Center text */
  width: 100%; /* Full width for links */
  padding: 8px 0; /* Padding for links */
}

.pindot a:hover {
  color: #feda3b; /* Hover color */
}

.router-link-exact-active {
  font-weight: bold;
  color: #187b0d; /* Active link color */
}

.footer {
  background-color: #4a4444; /* Light gray background */
  color: #fff; /* White text */
  padding: 10px; /* Padding for content spacing */
  position: fixed; /* Stick to the bottom */
  bottom: 0; /* Position at the bottom */
  left: 0; /* Start from the left edge */
  width: 100%; /* Full width */
  text-align: center; /* Center the content */
}
</style>
