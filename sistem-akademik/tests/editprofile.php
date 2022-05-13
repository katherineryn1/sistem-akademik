<?php
<template>
  <form>
    <md-card>

      <md-card-header class="md-card-header-icon">
        <div class="card-icon">
          <md-icon>perm_identity</md-icon>
        </div>
        <h4 class="title">
          Edit Profile
        </h4>
      </md-card-header>

      <md-card-content>
        <div class="md-layout">
          <label class="md-layout-item md-size-15 md-form-label">
            Profile Photo
          </label>
          <div class="md-layout-item">
            <div class="file-input">
              <div v-if="avatar_img">
                <div class="image-container">
                  <img :src="avatar_img"/>
                </div>
              </div>
              <div class="image-container" v-else>
                <img :src="default_img"/>
              </div>
              <div class="button-container">
                <md-button class="md-danger md-round" @click="removeImage" v-if="avatar_img">
                  <i class="fa fa-times"/>
                  Remove
                </md-button>
                <md-button class="md-success md-fileinput">
                  <template v-if="!avatar_img">Select image</template>
                  <template v-else>Change</template>
                  <input type="file" @change="onFileChange"/>
                </md-button>
              </div>
            </div>
          </div>
        </div>

        <div class="md-layout">
          <label class="md-layout-item md-size-15 md-form-label">
            Name
          </label>
          <div class="md-layout-item">
            <md-field class="md-invalid">
              <md-input v-model="user.name"/>
              <validation-error :errors="apiValidationErrors.name"/>
            </md-field>
          </div>
        </div>

        <div class="md-layout">
          <label class="md-layout-item md-size-15 md-form-label">
            Email
          </label>
          <div class="md-layout-item">
            <md-field class="md-invalid">
              <md-input v-model="user.email"/>
              <validation-error :errors="apiValidationErrors.email"/>
            </md-field>
          </div>
        </div>

      </md-card-content>

      <md-card-actions>
        <md-button @click="updateProfile()">
          Update Profile
        </md-button>
      </md-card-actions>

    </md-card>
  </form>
</template>
<script>
  import {ValidationError} from "@/components";
  import formMixin from "@/mixins/form-mixin";

  export default {
    name: "edit-profile-card",

    props: {
      user: Object
    },

    components: {ValidationError},

    mixins: [formMixin],

    data() {
      return {
        avatar_img: null,
        default_img: process.env.VUE_APP_BASE_URL + "/img/placeholder.jpg",
        file: null
      }
    },

    methods: {

      onFileChange(e) {
        let files = e.target.files || e.dataTransfer.files;
        if (!files.length) return;
        this.createImage(files[0]);
      },

      createImage(file) {
        let reader = new FileReader();
        reader.onload = e => {
          this.avatar_img = e.target.result;
          this.file = file;
        }
        reader.readAsDataURL(file);
      },

      removeImage() {
        this.avatar_img = null;
      },

      async updateProfile() {
        try {
          if (!this.user.profile_image) {
            await this.$store.dispatch("users/upload", {user: this.user, image: this.file})
            this.user.profile_image = await this.$store.getters["profile/url"]
          }
          await this.$store.dispatch("profile/update", this.user)
          await this.$store.dispatch("alerts/success", "Profile updated successfully.")
          this.user = await this.$store.getters["profile/me"]
        } catch (e) {
          await this.$store.dispatch("alerts/error", "Oops, something went wrong!")
          this.setApiValidation(e.response.data.errors)
        }

      }

    }
  };
</script>
?>