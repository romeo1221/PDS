<template>
  <div class="main-container">
    <!-- Basic Form -->
    <div class="basic-form">
      <h2>Work Background</h2>
      <button @click="showForm = true">Add Work Experience</button>

      <!-- Buttons inside basic-form -->
      <div class="button-row">
        <router-link to="/education">
          <button>Previous</button>
        </router-link>
        <router-link to="achievement">
          <button>Next</button>
        </router-link>
      </div>
    </div>

    <!-- Form Popup -->
    <div v-if="showForm" class="form-overlay">
      <div class="form-popup">
        <h2>Work Information</h2>
        <form @submit.prevent="submitForm">
          <div class="form-row">
            <div class="form-group">
              <label for="employer">Employer:</label>
              <input type="text" id="employer" v-model="formData.employer" required>
            </div>
          </div>

          <div class="form-row">
            <div class="form-group">
              <label for="address">Address:</label>
              <input type="text" id="address" v-model="formData.address" required>
            </div>
          </div>

          <div class="form-row">
            <div class="form-group">
              <label for="contact">Tel./CP no.:</label>
              <input type="text" id="contact" v-model="formData.contact" required>
            </div>
          </div>

          <button type="submit">Submit</button>
          <button type="button" @click="closeForm">Close</button>
        </form>
      </div>
    </div>

    <!-- Submission Details -->
    <div v-if="formSubmitted" class="results-section">
      <div class="submitted-message">
        <p>Form submitted successfully!</p>
        <div class="work-background">
          <div v-for="(work, index) in workBackground" :key="index" class="work-entry">
            <p>Employer: {{ work.employer }}</p>
            <p>Address: {{ work.address }}</p>
            <p>Tel./CP no.: {{ work.contact }}</p>
            <button class="remove-button" @click="removeWork(index)">Remove</button>
          </div>
        </div>
        <!-- Removed "Add Another Work" button -->
        <div class="button-row">
          <button @click="doneAdding">Done</button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      formData: {
        employer: '',
        address: '',
        contact: ''
      },
      showForm: false,
      formSubmitted: false,
      workBackground: []
    };
  },
  methods: {
    submitForm() {
      this.workBackground.push({ ...this.formData });
      console.log('Form submitted:', this.formData);
      this.formSubmitted = true;
      this.showForm = false;
      this.resetForm();
    },
    closeForm() {
      this.showForm = false;
      this.resetForm();
    },
    resetForm() {
      this.formData = {
        employer: '',
        address: '',
        contact: ''
      };
    },
    removeWork(index) {
      this.workBackground.splice(index, 1);
    },
    doneAdding() {
      this.formSubmitted = false;
      alert('Thank you for submitting your work background!');
    }
  }
};
</script>

<style scoped>
.main-container {
  display: flex;
  flex-direction: column;
  align-items: center;
  padding: 50px;
}

.basic-form {
  width: 100%;
  max-width: 600px;
  padding: 20px;
  background-color: rgba(240, 240, 240, 0.8); /* Semi-transparent background */
  border: 1px solid #ccc;
  border-radius: 8px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  font-family: Arial, sans-serif;
  text-align: left;
  margin-top: 130px;
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
input[type="number"] {
  width: 100%;
  padding: 10px;
  font-size: 1em;
  border: 1px solid #ccc;
  border-radius: 4px;
  margin-top: 5px;
  margin-bottom: 10px;
}

button {
  background-color: #187b0d;
  color: white;
  border: none;
  cursor: pointer;
  padding: 12px;
  font-size: 1em;
  width: 100%;
  box-sizing: border-box;
  margin-top: 10px;
}

button:hover {
  background-color: #145a09;
}

.form-overlay {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: rgba(0, 0, 0, 0.5);
  display: flex;
  justify-content: center;
  align-items: center;
  z-index: 1000;
}

.form-popup {
  background: #fff;
  padding: 20px;
  border-radius: 8px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  width: 100%;
  max-width: 600px;
}

.results-section {
  width: 100%;
  max-width: 600px;
  padding: 20px;
  background: #fff;
  border-radius: 8px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  margin-top: 20px;
}

.submitted-message {
  text-align: left;
}

.work-background {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
}

.work-entry {
  margin: 10px;
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 8px;
  width: 100%;
  max-width: 300px;
  background-color: rgba(240, 240, 240, 0.8);
}

.remove-button {
  background-color: #d9534f;
  color: white;
  border: none;
  cursor: pointer;
  padding: 8px;
  font-size: 0.9em;
  width: 100px;
  box-sizing: border-box;
  margin-top: 10px;
}

.remove-button:hover {
  background-color: #c9302c;
}

.button-row {
  display: flex;
  justify-content: space-between;
  gap: 10px;
  margin-top: 20px;
}

@media (max-width: 600px) {
  .button-row {
    flex-direction: column;
    gap: 10px;
  }
}
</style>