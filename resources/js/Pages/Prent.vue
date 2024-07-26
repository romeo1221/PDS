<template>
  <div class="pds-container">
    <h1>Personal Data Sheet</h1>

    <!-- Personal Information Section -->
    <section class="pds-section">
      <h2>Personal Information</h2>
      <table class="pds-table">
        <tbody>
          <tr>
            <td class="pds-label">Surname:</td>
            <td class="pds-data">{{ formData.surname || 'N/A' }}</td>
          </tr>
          <tr>
            <td class="pds-label">First Name:</td>
            <td class="pds-data">{{ formData.firstname || 'N/A' }}</td>
          </tr>
          <tr>
            <td class="pds-label">Middle Name:</td>
            <td class="pds-data">{{ formData.middlename || 'N/A' }}</td>
          </tr>
          <tr>
            <td class="pds-label">Extension Name:</td>
            <td class="pds-data">{{ formData.extname || 'N/A' }}</td>
          </tr>
          <tr>
            <td class="pds-label">Date of Birth:</td>
            <td class="pds-data">{{ formData.dob || 'N/A' }}</td>
          </tr>
          <tr>
            <td class="pds-label">Place of Birth:</td>
            <td class="pds-data">{{ formData.placeOfBirth || 'N/A' }}</td>
          </tr>
          <tr>
            <td class="pds-label">Sex:</td>
            <td class="pds-data">{{ formData.sex || 'N/A' }}</td>
          </tr>
          <tr>
            <td class="pds-label">Citizenship:</td>
            <td class="pds-data">{{ formData.citizenship || 'N/A' }}</td>
          </tr>
          <tr v-if="formData.citizenship === 'Dual Citizenship'">
            <td class="pds-label">Dual Citizenship Type:</td>
            <td class="pds-data">{{ formData.dualType || 'N/A' }}</td>
          </tr>
          <tr v-if="formData.citizenship === 'Dual Citizenship'">
            <td class="pds-label">Country:</td>
            <td class="pds-data">{{ formData.dualCountry || 'N/A' }}</td>
          </tr>
          <tr>
            <td class="pds-label">Height:</td>
            <td class="pds-data">{{ formData.height || 'N/A' }}</td>
          </tr>
          <tr>
            <td class="pds-label">Weight:</td>
            <td class="pds-data">{{ formData.weight || 'N/A' }}</td>
          </tr>
          <tr>
            <td class="pds-label">Blood Type:</td>
            <td class="pds-data">{{ formData.bloodType || 'N/A' }}</td>
          </tr>
          <tr>
            <td class="pds-label">Civil Status:</td>
            <td class="pds-data">{{ formData.civilStatus || 'N/A' }}</td>
          </tr>
          <tr>
            <td class="pds-label">Email:</td>
            <td class="pds-data">{{ formData.email || 'N/A' }}</td>
          </tr>
        </tbody>
      </table>
    </section>

    <!-- Contact Information Section -->
    <section class="pds-section">
      <h2>Contact Information</h2>
      <table class="pds-table">
        <tbody>
          <tr>
            <td class="pds-label">Address:</td>
            <td class="pds-data">{{ formData.address || 'N/A' }}</td>
          </tr>
          <tr>
            <td class="pds-label">Contact Number:</td>
            <td class="pds-data">{{ formData.contactNumber || 'N/A' }}</td>
          </tr>
        </tbody>
      </table>
    </section>

    <!-- Education Background Section -->
    <section class="pds-section">
      <h2>Education Background</h2>
      <table class="pds-table">
        <thead>
          <tr>
            <th class="pds-header">School</th>
            <th class="pds-header">Degree</th>
          </tr>
        </thead>
        <tbody>
          <tr v-if="formData.education.length === 0">
            <td colspan="2">No education background provided.</td>
          </tr>
          <tr v-for="(education, index) in formData.education" :key="index">
            <td>{{ education.school || 'N/A' }}</td>
            <td>{{ education.degree || 'N/A' }}</td>
          </tr>
        </tbody>
      </table>
    </section>

    <!-- Work Experience Section -->
    <section class="pds-section">
      <h2>Work Experience</h2>
      <table class="pds-table">
        <thead>
          <tr>
            <th class="pds-header">Company</th>
            <th class="pds-header">Position</th>
          </tr>
        </thead>
        <tbody>
          <tr v-if="formData.workExperience.length === 0">
            <td colspan="2">No work experience provided.</td>
          </tr>
          <tr v-for="(experience, index) in formData.workExperience" :key="index">
            <td>{{ experience.company || 'N/A' }}</td>
            <td>{{ experience.position || 'N/A' }}</td>
          </tr>
        </tbody>
      </table>
    </section>

    <!-- Action Buttons -->
    <div class="pds-submit">
      <router-link to="/work">
        <button>Back to Work Section</button>
      </router-link>
      <router-link to="/education">
        <button>Back to Education Section</button>
      </router-link>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      formData: {
        surname: '',
        firstname: '',
        middlename: '',
        extname: '',
        dob: '',
        placeOfBirth: '',
        sex: '',
        citizenship: '',
        dualType: '',
        dualCountry: '',
        height: '',
        weight: '',
        bloodType: '',
        civilStatus: '',
        email: '',
        address: '',
        contactNumber: '',
        education: [],
        workExperience: []
      }
    };
  },
  mounted() {
    // Simulating data fetch; replace with actual data fetch logic
    this.fetchFormData();
  },
  methods: {
    fetchFormData() {
      // Replace with actual data fetching logic
      this.formData = {
        surname: 'Doe',
        firstname: 'John',
        middlename: 'Middle',
        extname: 'Jr.',
        dob: '1990-01-01',
        placeOfBirth: 'City, Country',
        sex: 'Male',
        citizenship: 'Filipino',
        dualType: '',
        dualCountry: '',
        height: '175 cm',
        weight: '70 kg',
        bloodType: 'O+',
        civilStatus: 'Single',
        email: 'john.doe@example.com',
        address: '123 Main St, City, Country',
        contactNumber: '123-456-7890',
        education: [
          { school: 'University A', degree: 'Bachelor\'s Degree' },
          { school: 'University B', degree: 'Master\'s Degree' }
        ],
        workExperience: [
          { company: 'Company X', position: 'Software Engineer' },
          { company: 'Company Y', position: 'Senior Developer' }
        ]
      };
    }
  }
};
</script>

<style scoped>
.pds-container {
  margin: 0 auto;
  padding: 20px;
  max-width: 900px;
  background: #ffffff; /* Clean white background for a formal look */
  border: 1px solid #aaa; /* Light gray border for a formal paper look */
  border-radius: 8px; /* Slightly rounded corners */
  box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1); /* Subtle shadow for depth */
}

h1 {
  text-align: center;
  margin-bottom: 20px;
  font-family: 'Times New Roman', serif; /* Classic, formal font */
  font-size: 28px;
  font-weight: bold;
}

.pds-section {
  margin-bottom: 20px;
  padding: 15px;
}

.pds-table {
  width: 100%;
  border-collapse: collapse;
}

.pds-table, .pds-table th, .pds-table td {
  border: 1px solid #ccc; /* Lighter gray border for formal look */
}

.pds-table th, .pds-table td {
  padding: 8px;
  text-align: left;
  font-size: 14px;
}

.pds-table th {
  background-color: #f0f0f0; /* Light gray background for headers */
  font-weight: bold;
}

.pds-table td {
  background-color: #ffffff; /* White background for data cells */
}

.pds-label {
  font-weight: bold;
  padding-right: 10px;
}

.pds-data {
  padding-left: 10px;
}

.pds-submit {
  text-align: center;
  margin-top: 20px;
}

button {
  background-color: #0044cc; /* Formal blue color */
  color: white;
  border: none;
  cursor: pointer;
  padding: 12px 24px;
  font-size: 16px;
  border-radius: 4px;
  margin: 5px;
}

button:hover {
  background-color: #0033a0; /* Darker blue for hover */
}
</style>
