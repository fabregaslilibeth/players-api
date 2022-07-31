<template>
  <div class="">
    <label
      class="flex flex-col items-center border border-primary outline-none px-8 py-2 font-bold rounded duration-300 shadow-lg hover:shadow-xl cursor-pointer">
            <span class="text-base leading-normal text-primary" v-if="isLoading">
              <i class="fas fa-spinner fa-pulse animate-spin mr-2"></i> Importing File
            </span>

            <span class="text-primary" v-else>
              Import File
            </span>

        <input
          type="file"
          class="hidden"
          ref="file"
          v-on:change="processFile($event)"
        />
    </label>
    <p class="text-error italic text-xxs m-2" v-if="error">{{ error }}</p>
    <p class="text-gray-darkest italic text-xs m-2" v-else>{{ helperText }}</p>
  </div>
</template>

<script>
export default {
  name: '',

  data() {
    return {
      file: '',
      searchKey: '',
      category: '',
      helperText: 'Accepted: csv, json',
      error: '',
      isLoading: false,
      isFiltering: false,
    }
  },

  computed: {},

  methods: {
    processFile(e) {
      this.isLoading = true;

      e.preventDefault();
      this.file = e.target.files[0];

      const config = {
        headers: {'content-type': 'multipart/form-data'}
      }

      let formData = new FormData();

      formData.append('file', this.file);

      axios.post('/api/imports', formData, config)
        .then(({data}) => {
          this.isLoading = false
        }).catch(() => {
        this.$toasted.error('Whoops! Please make sure file type is correct.');
        this.isLoading = false
      })
    },
  }
}
</script>
