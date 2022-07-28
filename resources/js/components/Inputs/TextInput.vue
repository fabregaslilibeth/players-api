<template>
  <div class="" :class="containerClass">
    <label :for="name">{{ label }}
      <sup class="text-error text-xs" v-if="required">*</sup>
    </label>

    <div class="relative p-3 border rounded-md border-primary bg-white shadow-input">
      <input :id="name"
             :type="dataType"
             :name="name"
             :value="value"
             :readonly="readonly"
             class="w-full appearance-none focus:outline-none text-black"
             :placeholder="placeholder"
             @input="$emit('update:value', $event.target.value)"
      >

      <div class="absolute right-2 bottom-3 cursor-pointer" v-if="type === 'password'" @click="toggleType">
        <i class="fad fa-eye fa-lg text-primary duration-300" v-if="dataType === 'password'"></i>
        <i class="fad fa-eye-slash fa-lg text-gray duration-300" v-if="dataType === 'text'"></i>
      </div>

    </div>
    <p class="text-error text-xs m-2" v-if="error">{{ error }}</p>
    <p class="text-gray-darkest italic text-xs m-2" v-if="helperText">{{ helperText }}</p>
  </div>
</template>

<script>
export default {
  name: 'TextInput',

  props: {
    name: {
      type: String,
      default: ''
    },

    value: {
      type: String,
      default: ''
    },

    placeholder: {
      type: String,
      default: ' ',
    },

    type: {
      type: String,
      default: 'text',
    },

    label: {
      type: String,
      default: '',
    },

    containerClass: {
      type: String,
      default: 'w-full',
    },

    error: {
      type: String,
      default: '',
    },

    helperText: {
      type: String,
      default: 'Press "Enter" to save',
    },

    required: {
      type: Boolean,
      default: true,
    },

    readonly: {
      type: Boolean,
      default: false,
    }
  },

  data () {
    return {
      dataType: this.type
    }
  },

  methods: {
    toggleType () {
      this.dataType === 'password' ? this.dataType = 'text' : this.dataType = 'password'
    }
  }
}
</script>
