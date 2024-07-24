<template>
  <div class="main-container">
    <!-- Basic Form -->
    <div class="basic-form">
      <h2>Education Background</h2>
      <div class="form-row">
        <div class="form-group">
          <label for="selectDegree">Select Degree Level:</label>
          <select id="selectDegree" v-model="selectedDegree" @change="updateDegree" required>
            <option value="">--Select Level--</option>
            <option v-for="degree in availableDegrees" :key="degree" :value="degree">
              {{ degree }}
            </option>
          </select>
        </div>
      </div>

      <!-- Buttons inside basic-form -->
      <div class="button-row">
        <router-link to="/family">
          <button>Previous</button>
        </router-link>
        <router-link to="/work">
          <button>Next</button>
        </router-link>
      </div>
    </div>

    <!-- Form Overlay -->
    <div v-if="showForm" class="form-overlay">
      <div class="form-popup">
        <h2>Education Information</h2>
        <form @submit.prevent="submitForm">
          <div class="form-row">
            <div class="form-group">
              <label for="degree">Education Level:</label>
              <select id="degree" v-model="formData.degree" disabled required>
                <option value="">--Select Level--</option>
                <option v-for="degree in degreeOptions" :key="degree" :value="degree">
                  {{ degree }}
                </option>
              </select>
            </div>

            <div class="form-group">
              <label for="institution">Name of School:</label>
              <input type="text" id="institution" v-model="formData.institution" required>
            </div>
          </div>

          <div class="form-row">
            <div class="form-group">
              <label for="address">School Address:</label>
              <input type="text" id="address" v-model="formData.address" required>
            </div>
          </div>

          <div class="form-row">
            <div class="form-group">
              <label for="yearOfGraduation">Year Graduated/Last Attended:</label>
              <input type="number" id="yearOfGraduation" v-model="formData.yearOfGraduation" required>
            </div>
          </div>

          <button type="submit">Submit</button>
          <button type="button" @click="closeForm">Close</button>
        </form>
      </div>
    </div>

    <!-- Results Display -->
    <div v-if="formSubmitted" class="results-section">
      <div class="submitted-message">
        <p>Form submitted successfully!</p>
        <div class="education-background">
          <div v-for="(education, index) in educationBackground" :key="index" class="education-entry">
            <p>Education Level: {{ education.degree }}</p>
            <p>Name of School: {{ education.institution }}</p>
            <p>School Address: {{ education.address }}</p>
            <p>Year Graduated/Last Attended: {{ education.yearOfGraduation }}</p>
            <button class="remove-button" @click="removeEducation(index)">Remove</button>
          </div>
        </div>
        <!-- Removed "Add Another Education" button -->
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      selectedDegree: '',
      formData: {
        degree: '',
        institution: '',
        address: '',
        yearOfGraduation: ''
      },
      showForm: false,
      formSubmitted: false,
      educationBackground: [],
      degreeOptions: [
        'Primary Education',
        'Junior High',
        'Senior High',
        'Tertiary',
        'Vocational',
        'Post-Graduate'
      ]
    };
  },
  computed: {
    availableDegrees() {
      // Filter out the degrees that have already been selected
      return this.degreeOptions.filter(degree => 
        !this.educationBackground.some(education => education.degree === degree)
      );
    }
  },
  methods: {
    updateDegree() {
      this.formData.degree = this.selectedDegree;
      this.showForm = !!this.selectedDegree;  // Show the form if a degree level is selected
      if (this.showForm) {
        this.formData = {
          degree: this.selectedDegree,
          institution: '',
          address: '',
          yearOfGraduation: ''
        };
      }
    },
    submitForm() {
      console.log('Submitting form with data:', this.formData);
      this.educationBackground.push({ ...this.formData });
      console.log('Education Background:', this.educationBackground);
      this.formSubmitted = true;
      this.showForm = false;
      this.selectedDegree = ''; // Clear the selectedDegree after submission
    },
    closeForm() {
      this.showForm = false;
      this.selectedDegree = '';
    },
    resetForm() {
      this.formSubmitted = false;
      this.formData = {
        degree: this.selectedDegree || '', // Set degree to selectedDegree if available
        institution: '',
        address: '',
        yearOfGraduation: ''
      };
      this.showForm = true; // Ensure the form is shown for new entries
    },
    removeEducation(index) {
      this.educationBackground.splice(index, 1);
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
input[type="number"],
select {
  width: 90%;
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
  width: 100px;
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
  box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
  width: 100%;
  max-width: 600px;
  overflow: auto; /* Ensure content doesn't overflow */
}

.results-section {
  width: 100%;
  max-width: 1000px;
  background-color: rgba(255, 255, 255, 0.9);
  border: 1px solid #ccc;
  border-radius: 8px;
  padding: 20px;
  box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
  margin-top: 20px;
  box-sizing: border-box; /* Ensure padding and border are included in width */
  overflow: auto; /* Ensure content doesn't overflow */
}

.submitted-message {
  text-align: left;
}

.education-background {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  font-family: Arial, Helvetica, sans-serif;
  gap: 20px; /* Add space between entries */
}

.education-entry {
  margin: 10px;
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 8px;
  width: 90%;
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
  .basic-form {
    max-width: 100%;
    margin-bottom: 20px;
  }

  .form-popup {
    width: 90%;
  }

  .education-background {
    flex-direction: column;
  }

  .education-entry {
    width: 90%;
  }

  .button-row {
    flex-direction: column;
  }
}
</style>
