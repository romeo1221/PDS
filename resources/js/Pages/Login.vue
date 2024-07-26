<template>
  <div class="main-container">
    <div class="login-form">
      <h2>Login</h2>
      <form @submit.prevent="login">
        <div class="form-row">
          <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" id="username" v-model="loginData.username" required>
          </div>
        </div>

        <div class="form-row">
          <div class="form-group password-group">
            <label for="password">Password:</label>
            <input
              :type="passwordFieldType"
              id="password"
              v-model="loginData.password"
              required
            />
            <span
              class="eye-icon"
              @click="togglePasswordVisibility"
              :title="passwordFieldType === 'password' ? 'Show Password' : 'Hide Password'"
            >
              <i :class="passwordFieldType === 'password' ? 'fa fa-eye' : 'fa fa-eye-slash'"></i>
            </span>
          </div>
        </div>

        <div v-if="warningMessage" class="warning-message">
          {{ warningMessage }}
        </div>

        <div class="form-buttons">
          <button type="submit" class="login-button">Login</button>
        </div>
      </form>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      loginData: {
        username: '',
        password: ''
      },
      warningMessage: '',
      passwordFieldType: 'password' // Initial type for the password field
    };
  },
  methods: {
    login() {
      if (this.isLoginValid()) {
        console.log('Login data:', this.loginData);
        this.$router.push('/basic'); // Redirect to /basic upon successful login
      } else {
        this.warningMessage = 'Please enter both username and password.';
      }
    },
    isLoginValid() {
      return this.loginData.username.trim() !== '' && this.loginData.password.trim() !== '';
    },
    togglePasswordVisibility() {
      this.passwordFieldType = this.passwordFieldType === 'password' ? 'text' : 'password';
    }
  }
};
</script>

<style scoped>
.main-container {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
  padding: 20px;
  background-color: #f4f4f4;
}

.login-form {
  width: 100%;
  max-width: 400px;
  padding: 50px;
  background-color: rgba(240, 240, 240, 0.8);
  border: 1px solid #ccc;
  border-radius: 8px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  font-family: Arial, sans-serif;
  text-align: left;
}

.form-row {
  display: flex;
  flex-direction: column;
  margin-bottom: 15px;
}

.form-group {
  margin-bottom: 15px;
}

label {
  display: block;
  margin-bottom: 5px;
  font-weight: bold;
}

input[type="text"],
input[type="password"] {
  width: 100%;
  padding: 10px;
  font-size: 1em;
  border: 1px solid #ccc;
  border-radius: 4px;
  margin-top: 5px;
  box-sizing: border-box;
}

.password-group {
  position: relative;
}

.eye-icon {
  position: absolute;
  right: 10px;
  top: 50%;
  transform: translateY(-50%);
  cursor: pointer;
  font-size: 1.2em;
  color: #aaa;
}

.eye-icon:hover {
  color: #555;
}

.warning-message {
  color: red;
  margin-top: 10px;
}

.form-buttons {
  display: flex;
  justify-content: center;
  margin-top: 20px;
}

.login-button {
  background-color: #187b0d;
  color: white;
  border: none;
  cursor: pointer;
  padding: 12px 20px;
  font-size: 1em;
  border-radius: 4px;
  box-sizing: border-box;
}

.login-button:hover {
  background-color: #145a09;
}

/* Font Awesome icons (make sure you include Font Awesome CSS in your project) */
.fa-eye, .fa-eye-slash {
  font-size: 1.2em;
}
</style>
