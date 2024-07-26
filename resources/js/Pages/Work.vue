<template>
  <div class="main-container">
    <!-- Basic Form -->
    <div class="basic-form">
      <h2>Work Background</h2>
      <button @click="showForm = !showForm">Add Work Experience</button>

      <!-- Form Popup (inside the basic-form) -->
      <div v-if="showForm" class="form-popup">
        <h2>Work Information</h2>
        <form @submit.prevent="submitForm">
          <div class="form-row">
            <div class="form-group">
              <label for="employer">Employer:</label>
              <input type="text" id="employer" v-model="formData.employer" required>
            </div>
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
            <div class="form-group">
              <label for="inclusive-dates">Inclusive Dates (from - to):</label>
              <input type="text" id="inclusive-dates" v-model="formData.inclusiveDates" required>
            </div>
          </div>

          <div class="form-row">
            <div class="form-group">
              <label for="position-title">Position Title:</label>
              <input type="text" id="position-title" v-model="formData.positionTitle" required>
            </div>
            <div class="form-group">
              <label for="department">Department/Agency:</label>
              <input type="text" id="department" v-model="formData.department" required>
            </div>
          </div>

          <div class="form-row">
            <div class="form-group">
              <label for="monthly-salary">Monthly Salary:</label>
              <input type="number" id="monthly-salary" v-model="formData.monthlySalary" required>
            </div>
            <div class="form-group">
              <label for="salary-grade">Salary/Job/Pay Grade:</label>
              <input type="text" id="salary-grade" v-model="formData.salaryGrade" required>
            </div>
          </div>

          <div class="form-row">
            <div class="form-group">
              <label for="appointment-status">Status of Appointment:</label>
              <input type="text" id="appointment-status" v-model="formData.appointmentStatus" required>
            </div>
            <div class="form-group">
              <label for="govt-service">Gov't Service (Y/N):</label>
              <select id="govt-service" v-model="formData.govtService" required>
                <option value="Y">Yes</option>
                <option value="N">No</option>
              </select>
            </div>
          </div>

          <div class="form-row button-row">
            <button type="submit">Submit</button>
            <button type="button" @click="closeForm">Close</button>
          </div>
        </form>
      </div>

      <!-- Buttons inside basic-form -->
      <div class="button-row">
        <router-link to="/education">
          <button>Previous</button>
        </router-link>
        <router-link to="/achievement">
          <button>Next</button>
        </router-link>
      </div>
    </div>

    <!-- Submission Details -->
    <div v-if="formSubmitted" class="results-section">
      <div class="submitted-message">
        <div class="work-background">
          <div v-for="(work, index) in workBackground" :key="index" class="work-entry">
            <p>Employer: {{ work.employer }}</p>
            <p>Address: {{ work.address }}</p>
            <p>Tel./CP no.: {{ work.contact }}</p>
            <p>Inclusive Dates: {{ work.inclusiveDates }}</p>
            <p>Position Title: {{ work.positionTitle }}</p>
            <p>Department/Agency: {{ work.department }}</p>
            <p>Monthly Salary: {{ work.monthlySalary }}</p>
            <p>Salary/Job/Pay Grade: {{ work.salaryGrade }}</p>
            <p>Status of Appointment: {{ work.appointmentStatus }}</p>
            <p>Gov't Service: {{ work.govtService }}</p>
            <button class="remove-button" @click="removeWork(index)">Remove</button>
          </div>
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
        contact: '',
        inclusiveDates: '',
        positionTitle: '',
        department: '',
        monthlySalary: '',
        salaryGrade: '',
        appointmentStatus: '',
        govtService: ''
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
        contact: '',
        inclusiveDates: '',
        positionTitle: '',
        department: '',
        monthlySalary: '',
        salaryGrade: '',
        appointmentStatus: '',
        govtService: ''
      };
    },
    removeWork(index) {
      this.workBackground.splice(index, 1);
    }
  }
};
</script>

<style scoped>
/* General Styles */
.main-container {
  margin-top: 3%;
  margin-left: 190px;
  display: flex;  
  flex-direction: column;
  align-items: flex-start;
  padding: 50px;
}

.basic-form {
  width: 100%;
  max-width: 99%;
  padding: 20px;
  background-color: rgba(240, 240, 240, 0.8); 
  border: 1px solid #ccc;
  border-radius: 8px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  font-family: Arial, sans-serif;
  text-align: left;
  margin-top: 40px;
  position: relative;
}

/* Form Popup Styles */
.form-popup {
  background: #fff;
  padding: 20px;
  border-radius: 8px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  width: 100%;
  max-width: 96%;
  margin-top: 20px; /* Space between the button and the form */
}

.form-popup h2 {
  margin-top: 0;
}

/* Form Row Styles */
.form-row {
  display: flex;
  flex-wrap: wrap;
  gap: 10px; /* Adjust gap between form groups */
  margin-bottom: 15px;
}

.form-group {
  flex: 1;
  min-width: 200px; /* Ensures a minimum width for better alignment */
}

label {
  display: block;
  margin-bottom: 5px;
  font-weight: bold;
}

input[type="text"],
input[type="number"],
select {
  width: 75%;
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

/* Button Row Styles */
.button-row {
  display: flex;
  justify-content: space-between;
  gap: 10px;
  margin-top: 20px;
}

.button-row button {
  width: 100px;
}

.button-row .add-button {
  width: 100%;
  max-width: 200px;
}

/* Results Section */
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
  max-width: 600px;
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

@media (max-width: 600px) {
  .button-row {
    flex-direction: column;
    gap: 10px;
  }
}
</style>
