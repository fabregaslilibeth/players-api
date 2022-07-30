<template>
  <div class="">
    <side-modal transition="fade" @confirmed="submit">
      <template slot="modal-trigger">
        <button
          class="bg-primary px-4 py-2 mx-3 rounded-md cursor-pointer text-md shadow-lg hover:shadow-xl text-white">
          Add Player
        </button>
      </template>

      <template slot="header-text">
        Add player
      </template>

      <template slot="body-wrapper">
        <div class="px-4 pt-5 pb-4 sm:p-6 sm:pb-4 text-left text-agent-primary">

          <text-input
            containerClass="w-full my-5"
            name="first_name"
            :value="first_name"
            placeholder="First name"
            label="First name"
            :required="true"
            helperText=""
            @update:value="first_name = $event"
            :error="errors.has('first_name') ? errors.get('first_name') : ''"
          />

          <text-input
            containerClass="w-full my-5"
            name="second_name"
            :value="second_name"
            placeholder="Second name"
            label="Second name"
            :required="true"
            helperText=""
            @update:value="second_name = $event"
            :error="errors.has('second_name') ? errors.get('second_name') : ''"
          />

          <hr>

          <text-input
            containerClass="w-full my-5"
            name="form"
            :value="form"
            placeholder="Form"
            label="Form"
            :required="false"
            helperText=""
            @update:value="form = $event"
          />

          <text-input
            containerClass="w-full my-5"
            name="total_points"
            :value="total_points"
            placeholder="Total Points"
            label="Total Points"
            :required="false"
            helperText=""
            @update:value="total_points = $event"
          />

          <text-input
            containerClass="w-full my-5"
            name="influence"
            :value="influence"
            placeholder="Influence"
            label="Influence"
            :required="false"
            helperText=""
            @update:value="influence = $event"
          />

          <text-input
            containerClass="w-full my-5"
            name="creativity"
            :value="creativity"
            placeholder="Creativity"
            label="Creativity"
            :required="false"
            helperText=""
            @update:value="creativity = $event"
          />

          <text-input
            containerClass="w-full my-5"
            name="threat"
            :value="threat"
            placeholder="Threat"
            label="Threat"
            :required="false"
            helperText=""
            @update:value="threat = $event"
          />

          <text-input
            containerClass="w-full my-5"
            name="ict_index"
            :value="ict_index"
            placeholder="ICT Index"
            label="ICT Index"
            :required="false"
            helperText=""
            @update:value="ict_index = $event"
          />
        </div>

      </template>

    </side-modal>
  </div>
</template>

<script>
import {mapMutations } from "vuex";
import Errors from "../helpers/Errors";

export default {
  name: 'AddPlayer',

  data() {
    return {
      first_name: '',
      second_name: '',
      form: '',
      total_points: '',
      influence: '',
      creativity: '',
      threat: '',
      ict_index: '',

      errors: new Errors(),
    }
  },

  watch: {
    first_name: function (newValue, oldValue) {
      let disable = newValue === '' || this.second_name === ''

      this.setIsDisabled(disable)
    },

    second_name: function (newValue, oldValue) {
      let disable = newValue === '' || this.first_name === ''

      this.setIsDisabled(disable)
    },
  },

  methods: {
    ...mapMutations(['setIsDisabled', 'setIsLoading']),

    submit() {
      // this.setIsLoading(true)
      this.errors.clear()

      axios.post('/api/players', {
        first_name: this.first_name,
        second_name: this.second_name,
        form: this.form,
        total_points: this.total_points,
        influence: this.influence,
        creativity: this.creativity,
        threat: this.threat,
        ict_index: this.ict_index,
      })
        .then(({data}) => {
          this.$toasted.success('Player added.');
          this.setIsLoading(false)
          this.first_name = ''
          this.second_name = ''
          this.form = ''
          this.total_points = ''
          this.influence = ''
          this.creativity = ''
          this.threat = ''
          this.ict_index = ''
        })
        .catch((error) => {
          if (error.response.status === 422) {
            this.errors.record(error.response.data.errors)
            this.$toasted.error('Whoops! Check field errors.');

          } else {
            this.$toasted.error('Whoops! Something went wrong...');
          }
          this.setIsLoading(false)
        })
    },
  }
}
</script>
