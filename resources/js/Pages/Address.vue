<template>
  <div class="main-container">
    <div class="basic-form">
      <h2>Address Information</h2>
      <form @submit.prevent="submitForm">
        <div class="form-row">
          <div class="form-group">
            <label>Type:</label>
            <div class="radio-group">
              <label>
                <input type="radio" v-model="formData.addressType" value="Permanent" required> Permanent
              </label>
              <label>
                <input type="radio" v-model="formData.addressType" value="Temporary" required> Temporary
              </label>
            </div>
          </div>

          <div class="form-group">
            <label for="country">Country:</label>
            <input type="text" id="country" v-model="formData.country" required>
          </div>
        </div>

        <div class="form-row">
          <div class="form-group">
            <label for="province">Province:</label>
            <input type="text" id="province" v-model="formData.province" required>
          </div>

          <div class="form-group">
            <label for="city">City/Town:</label>
            <input type="text" id="city" v-model="formData.city" required>
          </div>
        </div>

        <div class="form-row">
          <div class="form-group">
            <label for="barangay">Barangay:</label>
            <input type="text" id="barangay" v-model="formData.barangay" required>
          </div>

          <div class="form-group">
            <label for="houseNumber">House Number/Street/Subdivision:</label>
            <input type="text" id="houseNumber" v-model="formData.houseNumber" required>
          </div>
        </div>

        <div v-if="warningMessage" class="warning-message">
          {{ warningMessage }}
        </div>

        <div class="form-buttons">
          <button type="button" class="prev-button" @click="goTo('/basic')">Previous</button>
          <button type="button" class="next-button" @click="goTo('/family')">Next</button>
        </div>
      </form>
    </div>

    <div v-if="formSubmitted" class="form-submission-overlay">
      <div class="submitted-message">
        <p>Form submitted successfully!</p>
        <p>Type: {{ formData.addressType }}</p>
        <p>Country: {{ formData.country }}</p>
        <p>Province: {{ formData.province }}</p>
        <p>City/Town: {{ formData.city }}</p>
        <p>Barangay: {{ formData.barangay }}</p>
        <p>House Number/Street/Subdivision: {{ formData.houseNumber }}</p>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      formData: {
        addressType: '',
        country: '',
        province: '',
        city: '',
        barangay: '',
        houseNumber: ''
      },
      formSubmitted: false,
      warningMessage: ''
    };
  },
  methods: {
    submitForm() {
      console.log('Form submitted:', this.formData);
      this.formSubmitted = true;
    },
    isFormValid() {
      return Object.values(this.formData).every(field => field.trim() !== '') && this.formData.addressType;
    },
    goTo(route) {
      if (this.isFormValid() || route === '/basic') {
        this.warningMessage = '';
        this.$router.push(route);
      } else {
        this.warningMessage = 'Please complete the form before proceeding.';
      }
    }
  }
};
</script>

<style scoped>
.main-container {
  display: flex;
  justify-content: center;
  align-items: flex-start;
  gap: 30px;
  padding: 50px;
  padding-top: 1%;
}

.basic-form {
  margin-left: 100px;
  width: 100%;
  max-width: 70%;
  padding: 20px;
  background-color: rgba(240, 240, 240, 0.8); /* Semi-transparent background */
  border: 1px solid #ccc;
  border-radius: 8px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  font-family: Arial, sans-serif;
  text-align: left;
}

.form-row {
  display: flex;
  justify-content: space-between;
  margin-bottom: 15px;
}

.form-group {
  flex: 1;
  margin-right: 15px;
}

label {
  display: block;
  margin-bottom: 5px;
  font-weight: bold;
}

input[type="text"],
select {
  width: 90%;
  padding: 10px;
  font-size: 1em;
  border: 1px solid #ccc;
  border-radius: 4px;
  margin-top: 5px;
  margin-bottom: 10px;
}

.radio-group {
  margin-top: 20px;
  margin-left: 12px;
  display: flex;
  gap: 15px;
}

.warning-message {
  color: red;
  margin-top: 10px;
}

.form-buttons {
  display: flex;
  justify-content: space-between;
  margin-top: 20px;
  margin-right: 40px;
}

.prev-button, .next-button {
  background-color: #187b0d;
  color: white;
  border: none;
  cursor: pointer;
  padding: 12px;
  font-size: 1em;
  box-sizing: border-box;
  width: 100px; /* Adjust width as needed */
  text-align: center;
}

.prev-button:hover, .next-button:hover {
  background-color: #145a09;
}

.prev-button {
  background-color: #187b0d; /* Optional: different color for "Previous" */
}

.prev-button:hover {
  background-color: #145a09; /* Optional: different hover color for "Previous" */
}

.form-submission-overlay {
  position: fixed;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  background-color: rgba(255, 255, 255, 0.9);
  border: 1px solid #ccc;
  border-radius: 8px;
  padding: 20px;
  box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
  z-index: 1000;
}

.submitted-message {
  text-align: center;
}

@media (max-width: 600px) {
  .main-container {
    flex-direction: column;
    align-items: center;
  }

  .basic-form {
    max-width: 100%;
    margin-bottom: 20px;
  }
}
</style>
