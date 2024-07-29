<template>
  <div class="container">
    <form v-if="!locked || editMode" @submit.prevent="submitForm" class="form-container">
      <div v-for="(award, index) in awards" :key="index" class="award-item">
        <label>
          <h1>Achievements</h1>
          <span class="label-text">Name of award:</span>
          <input 
            type="text" 
            v-model="award.name" 
            required 
            :disabled="locked && !editMode"
          />
        </label>
        <label>
          <span class="label-text">Description:</span>
          <textarea 
            v-model="award.description" 
            @input="autoResize($event)" 
            required
            :disabled="locked && !editMode"
          ></textarea>
        </label>
      </div>
      <!-- Warning Message -->
      <p v-if="warningMessage" class="warning-message">{{ warningMessage }}</p>
      <div class="button-container">
        <router-link to="/work">
          <button type="button" class="prev-button">Previous</button>
        </router-link>
        <button type="button" @click="addAward" :disabled="locked && !editMode" class="add-button">Add Another Award</button>
        <button type="submit" class="submit-button">{{ locked ? (editMode ? 'Update' : 'Submit') : 'Submit' }}</button>
      </div>
    </form>
    
    <div v-if="locked && !editMode" class="submitted-form">
      <p><strong>Form Submitted:</strong></p>
      <ul>
        <li v-for="(award, index) in awards" :key="index">
          <strong>Award {{ index + 1 }}:</strong>
          <div>Name: {{ award.name }}</div>
          <div>Description: {{ award.description }}</div>
          <button class="remove-button" @click="removeAward(index)">Remove</button>
        </li>
      </ul>
      <div class="button-container">
        <!-- <router-link to="/education">
          <button>Previous</button>
        </router-link> -->
        <button v-if="awards.length > 0" @click="editForm" class="edit-button">Edit</button>
        <router-link to="/prent">
          <button class="ok-button">OK na po</button>
        </router-link>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      awards: [{ name: "", description: "" }],
      locked: false,
      editMode: false,
      warningMessage: '' // Added warning message property
    };
  },
  methods: {
    addAward() {
      if (!this.locked || this.editMode) {
        // Check if all existing awards are filled
        const allAwardsComplete = this.awards.every(award => award.name && award.description);
        if (allAwardsComplete) {
          this.awards.push({ name: "", description: "" });
          this.warningMessage = ''; // Clear warning message
        } else {
          this.warningMessage = "Please fill out all existing awards before adding another one.";
        }
      }
    },
    submitForm() {
      if (this.awards.length && this.awards.every(award => award.name && award.description)) {
        this.locked = true;
        this.editMode = false;
        this.warningMessage = ''; // Clear warning message
        console.log("Form submitted:", this.awards);
        // You can also send the data to a server here
      } else {
        this.warningMessage = "Please fill out all fields before submitting.";
      }
    },
    autoResize(event) {
      const textarea = event.target;
      textarea.style.height = 'auto';
      textarea.style.height = `${textarea.scrollHeight}px`;
    },
    editForm() {
      this.editMode = true;
      this.locked = false;
    },
    removeAward(index) {
      this.awards.splice(index, 1);
    }
  }
};
</script>

<style scoped>
.container {
  display: flex;
  justify-content: left;
  align-items: center;
  margin-top: 9%; 
  margin-left: 145px;
}

.form-container {
  width: 100%;
  max-width: 87%;
  padding: 20px;
  background-color: rgba(240, 240, 240, 0.8);
  border: 1px solid #ccc;
  border-radius: 8px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  font-family: Arial, sans-serif;
  text-align: left;
  position: relative;
  margin-left: 90px;
}

.award-item {
  display: flex;
  flex-direction: column;
  margin-bottom: 20px;
  margin-right: 20px;
}

label {
  display: block;
  margin-bottom: 5px;
  font-weight: bold;
}

input[type="text"],
textarea {
  width: 100%;
  padding: 10px;
  font-size: 1em;
  border: 1px solid #ccc;
  border-radius: 4px;
  margin-top: 5px;
  margin-bottom: 10px;  
}

textarea {
  overflow: hidden;
  resize: none;
  height: auto;
  min-height: 30px;
}

.button-container {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-top: 20px;
}

.prev-button,
.submit-button,
.add-button,
.ok-button {
  padding: 12px;
  font-size: 1em;
  width: 150px;
  box-sizing: border-box;
  margin-top: 10px;
}

.prev-button {
  background-color: #187b0d;
  color: white;
  border: none;
}

.prev-button:hover {
  background-color: #145a09;
}

.add-button {
  background-color: #187b0d;
  color: white;
  border: none;
}

.add-button:hover {
  background-color: #145a09;
}

.submit-button {
  background-color: #187b0d;
  color: white;
  border: none;
}

.submit-button:hover {
  background-color: #145a09;
}

.ok-button {
  background-color: #187b0d;
  color: white;
  border: none;
}

.ok-button:hover {
  background-color: #145a09;
}

.edit-button {
  background-color: #187b0d;
  color: white;
  border: none;
  cursor: pointer;
  padding: 12px;
  font-size: 1em;
  width: 150px;
  box-sizing: border-box;
  margin-top: 10px;
}

.edit-button:hover {
  background-color: #145a09;
}

.submitted-form {
  padding: 20px;
  background-color: rgba(240, 240, 240, 0.8);
  border: 1px solid #ccc;
  border-radius: 8px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  font-family: Arial, sans-serif;
  margin-left: 90px;
  width: 80%;   
}

.submitted-form  li{
  margin-top: 20px;
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

.warning-message {
  color: #d9534f;
  padding: 10px;
  margin-top: 10px;
  border: none;
  border-radius: 0;
  background-color: transparent;
}

@media (max-width: 600px) {
  .form-container {
    max-width: 100%;
    margin-bottom: 20px;
  }

  .button-container {
    flex-direction: column;
    gap: 10px;
  }

  button {
    width: 100%;
  }
}
</style>
