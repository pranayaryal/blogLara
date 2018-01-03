<style scoped>

</style>

<template>
  <div>
    <h3>subscriberForm()</h3>

    <p>Habitasse venenatis viverra rutrum odio leo varius lacinia turpis, pretium ut maecenas.</p>

    <transition name="fade" mode="out-in">
      <div v-if="notification.isSuccess === false" class="form" role="form" key="form">
        <div class="field">
          <label class="sr-only">Email address</label>
          <div class="control">
            <input type="email" class="input is-medium" v-model="subscriberForm.email" v-bind:class="{ 'is-danger' : notification.isError }" @keyup.enter="store" placeholder="Email address">
            <p v-if="notification.isError" class="help is-danger">{{ notification.message }}</p>
          </div>
        </div>
        <div class="field">
          <div class="control">
            <button type="submit" class="button is-primary is-medium is-expanded" @click="store">Subscribe</button>
          </div>
        </div>
      </div>

      <div v-else class="notification is-primary" key="notification">
        <h4>{{ notification.message }}</h4>
      </div>
    </transition>
  </div>
</template>

<script>
  function subscriberFormInitialState() {
    return {
      email: ''
    }
  }

  function notificationInitialState() {
    return {
      isError: false,
      isSuccess: false,
      message: ''
    }
  }

  export default {
    data() {
      return {
        subscriberForm: subscriberFormInitialState(),
        notification: notificationInitialState(),
        inputError: false
      }
    },
    methods: {
      store() {
        this.validateEmail(this.subscriberForm);
      },
      persistPost(uri, form) {
        axios.post(uri, form)
            .then(response => {
              this.notification.isError = response.data.error;
              this.notification.message = response.data.message;

              if (this.notification.isError == false) {
                this.notification.isSuccess = true;
              }
            })
            .catch(response => {
              if (typeof response.data === 'object') {
                form.errors = _.flatten(_.toArray(response.data));
              } else {
                form.errors = ['Something went wrong. Please try again.'];
              }
            });
      },
      clearForm() {
        this.subscriberForm.email = '';
      },
      validateEmail(form) {
        if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(form.email)) {
          this.persistPost('/api/subscriber', form);
        } else {
          this.notification.message = 'Please enter a valid email.';
          this.notification.isError = true;
        }
      }
    }
  }
</script>
