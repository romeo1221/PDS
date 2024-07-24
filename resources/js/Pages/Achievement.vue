<template>
    <div class="container">
      <form @submit.prevent="submitForm" class="form-container">
        <div v-for="(award, index) in awards" :key="index" class="award-item">
          <label>
            <span class="label-text">Name of award:</span>
            <input type="text" v-model="award.name" required />
          </label>
          <label>
            <span class="label-text">Description:</span>
            <textarea 
              v-model="award.description" 
              @input="autoResize($event)" 
              required
            ></textarea>
          </label>
        </div>
        <div class="button-container">
          <button type="button" @click="addAward">Add Award</button>
          <button type="submit">Submit</button>
        </div>
      </form>
    </div>
  </template>
  
  <script>
  export default {
    data() {
      return {
        awards: [
          { name: "", description: "" },
        ]
      };
    },
    methods: {
      addAward() {
        this.awards.push({ name: "", description: "" });
      },
      submitForm() {
        // Handle form submission
        console.log("Form submitted:", this.awards);
        // You can also send the data to a server here
      },
      autoResize(event) {
        const textarea = event.target;
        textarea.style.height = 'auto';
        textarea.style.height = `${textarea.scrollHeight}px`;
      }
    }
  };
  </script>
  
  <style scoped>
  .container {
    margin-left: 100px;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    background-color: #f7f7f7;
  }
  
  .form-container {
    background: rgb(223, 220, 220);
    padding: 39px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    display: flex;
    flex-direction: column;
    align-items: center;
    width: 50%; /* Adjust the width as needed */
    margin-left: 100px;
  }
  
  .award-item {
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    margin-bottom: 20px;
    margin-left: 100px;
    width: 100%;
  }
  
  label {
    display: flex;
    flex-direction: column;
    flex: 1;
    margin-right: 20px;
  }
  
  .label-text {
    margin-bottom: 5px;
  }
  
  input, textarea {
    width: 70%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box; /* Ensure padding and border are included in width */
  }
  
  textarea {
    overflow: hidden;
    resize: none; /* Disable the manual resize handle */
    height: auto; /* Start with auto height */
    min-height: 30px; /* Set a minimum height */
  }
  
  .button-container {
    display: flex;
    justify-content: space-between;
    width: 50%;
    margin-top: 20px;
  }
  
  button {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    padding: 10px;
    background-color: #f0f0f0;
    border: 1px solid #ccc;
    border-radius: 5px;
    cursor: pointer;
    width: 48%;
  }
  
  button:hover {
    background-color: #e0e0e0;
  }
  </style>
  