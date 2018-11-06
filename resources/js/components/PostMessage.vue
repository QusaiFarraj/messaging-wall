<template>
  <div class="section">
    <div class="alert alert-danger" v-if="errors.length > 0">                         
      <ul>
        <li v-for="error in errors">{{ error }}</li>                         
      </ul>                  
    </div>
    <div class="add-a-message">
      <div class="single-media-title"><h2>Post a message</h2></div>
      <div class="message-form">
        <form method="post">
          <div class="form-group">
            <input type="text" class="form-control" v-model="formData.userName" id="name" name="name" placeholder="Name" required>
          </div>
          <div class="form-group">
            <input type="text" class="form-control" v-model="formData.userEmail" id="email" name="email" placeholder="Email" required>
          </div>
          <div class="form-group comment">
            <textarea class="form-control" v-model="formData.userMessage" id="message" name="message" placeholder="Message" required></textarea>
          </div>
          <button type="submit" class="btn btn-submit red" v-on:click="saveMessage()">Post</button>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
  export default {
    data() {
      return {
        formData: {
          userName: '',
          userEmail: '',
          userMessage: '',
          csrf: window.document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        errors: []
      };
    },
    mounted() {
      console.log('Component mounted.')
    },
    methods: {
      saveMessage() {
        postData = {
          name: this.formData.userName,
          email: this.formData.userEmail,
          message: this.formData.userMessage,
          csrf: this.formData.csrf
        };
        axios.post('http://localhost:8088/messaging-wall/public/post', postData)
          .then(response => {
            console.log(encode(response.data));
          }).catch(error => {

          this.errors = [];



          if (error.response.data.errors && error.response.data.errors.name) {

            this.errors.push(error.response.data.errors.name[0]);

          }

          if (error.response.data.errors && error.response.data.errors.description)

          {

            this.errors.push(error.response.data.errors.description[0]);

          }

        });
      }
    }
  }
</script>
