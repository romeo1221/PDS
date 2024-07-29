  <template>
    <div id="app">
      <div class="nav">
        <img alt="mmsu" src="/resources/pic/1Seal.png">
        <h1 class="gltext">M<small>ARIANO</small> M<small>ARCOS</small> S<small>TATE</small> U<small>NIVERSITY</small></h1>
        <!-- Log Out Button -->
        <button class="logout-btn" @click="logout">Log Out</button>
      </div>

      <!-- Conditionally render the .pindot div based on the current route -->
      <div v-if="!isLoginRoute" class="pindot">
        <router-link to="/basic" exact-active-class="active-link">
    <img alt="Basic" src="/home/romeo/PDS/public/images/basic.png" class="nav-icon"> Basic
  </router-link> &nbsp;

  <router-link to="/address" exact-active-class="active-link">
    <img alt="Address" src="/home/romeo/PDS/public/images/gps.png" class="nav-icon"> Address
  </router-link> &nbsp;

  <router-link to="/family" exact-active-class="active-link">
    <img alt="Family" src="/home/romeo/PDS/public/images/parental-control.png" class="nav-icon"> Family
  </router-link> &nbsp;

  <router-link to="/education" exact-active-class="active-link">
    <img alt="Education" src="/home/romeo/PDS/public/images/mortarboard.png" class="nav-icon"> Education
  </router-link> &nbsp;

  <router-link to="/work" exact-active-class="active-link">
    <img alt="Work" src="/home/romeo/PDS/public/images/suitcase.png" class="nav-icon"> Work
  </router-link> &nbsp;

  <router-link to="/achievement" exact-active-class="active-link">
    <img alt="Achievement" src="/home/romeo/PDS/public/images/medal-.png" class="nav-icon"> Achievement
  </router-link> &nbsp;

  <router-link to="/prent" exact-active-class="active-link">
    <img alt="Overall" src="/home/romeo/PDS/public/images/file.png" class="nav-icon"> Overall
  </router-link>
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
    },
    methods: {
      logout() {
        // Navigate to /prent when logging out
        this.$router.push('/login');
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

  /* Navigation Styles */
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
    justify-content: first baseline; /* Align items with space between */
    transition: all 0.3s ease; /* Smooth transition for responsiveness */
  }

  .nav img {
    height: 70px; 
    width: auto;
  }

  .nav h1 {
    color: white;
    margin: 0; 
    font-size: 2.5em;
    display: block; /* Ensures the h1 is visible on larger screens */
  }

  .logout-btn {
    background-color: #0c4b05; /* Button background color */
    color: #fff; /* Button text color */
    border: none; 
    border-radius: 5px; 
    padding: 8px 16px; 
    font-size: 1em; 
    cursor: pointer; 
    transition: background-color 0.3s ease; /* Smooth transition for hover effect */
    margin-left: 580px;
  }

  .logout-btn:hover {
    background-color: #093a04; /* Darker shade on hover */
  }

  /* Responsive Styles for Navigation */
  @media (max-width: 768px) {
    .nav h1 {
      display: none; /* Hide the h1 on smaller screens */
    }
  }

  @media (max-width: 480px) {
    .nav {
      padding: 5px;
    }

    .nav img {
      height: 50px; /* Adjust the height for smaller screens */
    }
  }

  /* Pindot Styles */
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
    font-size: 20px;
    overflow-y: auto;
    transition: all 0.3s ease; /* Smooth transition for responsiveness */
  }

  .pindot a {
  display: flex;
  align-items: center; /* Align items vertically in the center */
  text-decoration: none; 
  color: white; 
  padding: 5px 0;
  margin-left: 10px; /* Space between the left edge and the content */
}

.pindot .nav-icon {
  width: 24px; /* Set a uniform width for the icons */
  height: auto; /* Maintain aspect ratio */
  margin-right: 10px; /* Space between the icon and the text */
}
  .pindot a:hover {
    color: white;
  }

  /* Highlight Active Links */
  .pindot .router-link-active {
    /* border: 2px solid #feda3b; Border color for the active link */
    border-radius: 5px; /* Optional: Rounded corners for the border */
    background-color: rgba(0, 53, 2, 0.461); /* Background color with transparency */
    padding: 8px; /* Adjust padding to make sure the background color covers the border */
    margin-left: 30px; /* Ensure alignment matches other links */
    box-sizing: border-box; /* Ensure padding and border are included in width */
    font-weight: bold;
  }

  /* Responsive Styles for Pindot */
  @media (max-width: 768px) {
    .pindot {
      width: 150px; /* Reduce width for medium screens */
      font-size: 1.2em;
      padding: 8px;
    }

    .pindot a {
      font-size: 18px;
      margin-left: 0; /* Remove margin for better alignment */
    }
  }

  @media (max-width: 480px) {
    .pindot {
      width: 100px; /* Reduce width for smaller screens */
      font-size: 1em;
      padding: 5px;
      bottom: 0; /* Ensure it remains at the bottom */
    }

    .pindot a {
      font-size: 14px;
    }
  }

  /* Footer Styles */
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
