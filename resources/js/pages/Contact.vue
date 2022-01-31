<template>
 
    

    <div class="container pb-5">
      <form @submit.prevent="onSubmit" v-if="!formSubmitted">
        <div class="form-group mb-3">
          <label class="form-label">Nome</label>
          <input type="text" class="form-control" v-model="form.name" />
        </div>

        <div class="form-group mb-3">
          <label class="form-label">Email</label>
          <input type="text" class="form-control" v-model="form.email" />
        </div>

        <div class="form-group mb-3">
          <label class="form-label">Messaggio</label>
          <textarea
            type="text"
            class="form-control"
            v-model="form.message"
          ></textarea>
        </div>

        <button class="btn btn-success">Invia</button>
      </form>

      <div class="alert alert-success" v-else>
        Grazie per averci contattato, le risponderemo il prima possibile.
      </div>
    </div>

  
</template>

<script>
export default {
  data() {
    return {
      formSubmitted: false,
      form: {
        name: "",
        email: "",
        message: "",
      },
    };
  },
  methods: {
    onSubmit() {
      window.axios.post("/api/contacts", this.form).then((resp) => {
        this.formSubmitted = true;
      });
    },
  },
};
</script>

<style></style>