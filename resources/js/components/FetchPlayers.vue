<template>
  <div class="">
    <label
      class="flex flex-col items-center border border-primary outline-none px-8 py-2 font-bold rounded duration-300 shadow-lg hover:shadow-xl cursor-pointer">
            <span class="text-base leading-normal text-primary" v-if="isLoading">
              <i class="fas fa-spinner fa-pulse animate-spin mr-2"></i> Fetching
            </span>

            <span class="text-primary" v-else @click="fetch">
              Fetch Players
            </span>
    </label>
    <p class="text-error italic text-xxs m-2" v-if="error">{{ error }}</p>
  </div>
</template>

<script>
export default {
  name: '',

  data() {
    return {
      error: '',
      isLoading: false,
    }
  },

  computed: {},

  methods: {
    fetch() {
      this.isLoading = true;

      axios.get('/api/players')
        .then(({data}) => {
          this.isLoading = false

          if (data.players_count > 0) {
            window.location.reload()
            this.$toasted.success(`${data.players_count} new player/s added.`);
          } else {
            this.$toasted.success('No new player is added.');
          }

        }).catch(() => {
        this.isLoading = false
      })
    },
  }
}
</script>
