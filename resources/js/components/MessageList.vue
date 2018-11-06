<template>
  <div class="section">
    <div class="single-media-title"><h2>All Messages</h2></div>
    <div class="readers-comment" v-if="messageList">
      <div class="media" v-for="msg in messageList">

        <div class="media-left">
          <a href="#">
            <img alt="64x64" class="media-object" data-src="assets/img/img-author1.jpg"
                 src="assets/img/img-author1.jpg" data-holder-rendered="true">
          </a>
        </div>
        <div class="media-body">
          <h2 class="media-heading">by {{msg.name}}</h2><h6>qusia</h6>
          {{ msg.message}}

          <div class="comment-article-social">
            <a :href="'/'"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i></a>
            <a :href="'/'"><i class="fa fa-thumbs-o-down" aria-hidden="true"></i></a>
            <!--<a v-on:click="deleteMessage(msg.id)"><span class="reply-ic"> Delete </span></a>-->
          </div>
        </div>
      </div>
    </div>
    <div v-else> No Messages found!</div>
  </div>
</template>

<script>
  import axios from 'axios';

  export default {
    data() {
      return {
        message: {
          name: '',
          email: '',
          msgBody: ''
        },
        errors: [],
        messageList: []
      }
    },
    mounted() {
      this.loadMessages();
      console.log('hoho');
    },

    methods: {
      loadMessages() {
        axios.get('http://localhost:8088/messaging-wall/public/')
          .then(response => {
            this.messageList = response.data.msgs;
          });
      },
      // deleteMessage: {}
    }
  }
</script>
