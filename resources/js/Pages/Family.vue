<template>
  <div class="main-container">
    <!-- Basic Form -->
    <div class="basic-form">
      <h2>Family Information</h2>
      <div class="form-row">
        <div class="form-group">
          <label for="selectRelation">Select Relationship:</label>
          <select id="selectRelation" v-model="selectedRelation" @change="updateRelation" required>
            <option value="">--Select Relationship--</option>
            <option value="Parent">Parent</option>
            <option value="Sibling">Sibling</option>
            <option value="Spouse">Spouse</option>
            <option value="Child">Child</option>
          </select>
        </div>
      </div>

      <!-- Buttons inside basic-form -->
      <div class="button-row">
        <router-link to="/address">
          <button>Previous</button>
        </router-link>
        <router-link to="/education">
          <button>Next</button>
        </router-link>
      </div>
    </div>

    <!-- Form Overlay -->
    <div v-if="showForm" class="form-overlay">
      <div class="form-popup">
        <h2>Family Information</h2>
        <form @submit.prevent="submitForm">
          <div class="form-row">
            <div class="form-group">
              <label for="relation">Relation:</label>
              <select v-if="isAddingAnother" id="relation" v-model="formData.relation" required>
                <option value="">--Select Relationship--</option>
                <option value="Parent">Parent</option>
                <option value="Sibling">Sibling</option>
                <option value="Spouse">Spouse</option>
                <option value="Child">Child</option>
              </select>
              <input v-else type="text" id="relation" v-model="formData.relation" disabled>
            </div>

            <div class="form-group">
              <label for="name">Name:</label>
              <input type="text" id="name" v-model="formData.name" required>
            </div>
          </div>

          <div class="form-row">
            <div class="form-group">
              <label for="age">Age:</label>
              <input type="number" id="age" v-model="formData.age" required>
            </div>

            <div class="form-group">
              <label for="occupation">Occupation:</label>
              <input type="text" id="occupation" v-model="formData.occupation" required>
            </div>
          </div>

          <div class="form-row">
            <div class="form-group">
              <label for="contactNumber">Contact Number:</label>
              <input type="tel" id="contactNumber" v-model="formData.contactNumber" required>
            </div>
          </div>

          <button type="submit">Submit</button>
          <button type="button" @click="closeForm">Close</button>
        </form>
      </div>
    </div>

    <!-- Results Display -->
    <div v-if="familyMembers.length > 0" class="results-section">
      <div class="submitted-message">
        <p>Form submitted successfully!</p>
        <div class="family-members">
          <div v-for="(member, index) in familyMembers" :key="index" class="family-member">
            <p>Relation: {{ member.relation }}</p>
            <p>Name: {{ member.name }}</p>
            <p>Age: {{ member.age }}</p>
            <p>Occupation: {{ member.occupation }}</p>
            <p>Contact Number: {{ member.contactNumber }}</p>
            <button class="remove-button" @click="removeMember(index)">Remove</button>
          </div>
        </div>
        <!-- "Add Another Member" button -->
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      selectedRelation: '',
      formData: {
        relation: '',
        name: '',
        age: '',
        occupation: '',
        contactNumber: ''
      },
      showForm: false,
      isAddingAnother: false,
      familyMembers: []
    };
  },
  methods: {
    updateRelation() {
      this.formData.relation = this.selectedRelation;
      this.showForm = !!this.selectedRelation;  // Show the form if a relationship is selected
    },
    submitForm() {
      // Ensure the formData.relation is set correctly
      if (this.isAddingAnother && !this.formData.relation) {
        alert('Please select a relation.');
        return;
      }
      
      this.familyMembers.push({ ...this.formData });
      console.log('Form submitted:', this.formData);
      this.showForm = false;  // Hide the form overlay
      if (!this.isAddingAnother) {
        this.resetForm();
      }
    },
    closeForm() {
      this.showForm = false;
      this.resetForm();
    },
    resetForm() {
      this.formData = {
        relation: '',
        name: '',
        age: '',
        occupation: '',
        contactNumber: ''
      };
      this.selectedRelation = '';
      this.isAddingAnother = false;
    },
    addAnotherMember() {
      this.isAddingAnother = true;
      this.resetForm();
      this.showForm = true;  // Show the form overlay
    },
    removeMember(index) {
      this.familyMembers.splice(index, 1);
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
  position: relative;
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
input[type="tel"],
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
  margin-left: 45px;
}

.submitted-message {
  text-align: left;
}

.family-members {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  font-family: Arial, Helvetica, sans-serif;

}

.family-member {
  margin: 10px;
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 8px;
  width: 90%;
  background-color: rgba(240, 240, 240, 0.8);
}

.button-row {
  display: flex;
  justify-content: space-between;
  gap: 10px;
  margin-top: 20px;
}

.add-another-button {
  background-color: #187b0d;
  color: white;
  border: none;
  cursor: pointer;
  padding: 12px;
  font-size: 1em;
  width: 200px; /* Adjust width as needed */
  box-sizing: border-box;
  margin-top: 10px;
}

.add-another-button:hover {
  background-color: #145a09;
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
  .basic-form {
    max-width: 100%;
    margin-bottom: 20px;
  }

  .form-popup {
    width: 90%;
  }

  .family-members {
    flex-direction: column;
  }

  .family-member {
    width: 90%;
  }

  .button-row {
    flex-direction: column;
    gap: 10px;
  }

  .add-another-button {
    width: 100%;
  }
}
</style>
