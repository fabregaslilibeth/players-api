<template>
  <div ref="sideModal">
    <div @click="isShown = true">
      <slot name="modal-trigger"></slot>
    </div>

    <div class="fixed z-40 overflow-y-auto top-0 w-full left-0" id="modal" v-if="isShown">
      <div class="flex items-center justify-center pt-4 px-4 pb-20 sm:block sm:p-0">
        <div class="fixed inset-0 transition-opacity">
          <div class="absolute inset-0 bg-gray-900 opacity-50" @click="cancel"/>
        </div>

        <!--To vertically center the modal content -->
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" @click="cancel">&#8203;</span>

        <transition :name="transition" mode="out-in">
          <div v-if="contentIsVisible"
               class="inline-block align-center bg-white transform transition-all delay-200 duration-300
                      lg:absolute min-h-screen"
               :class="`${width} ${position}`"
               role="dialog"
               aria-modal="true"
               aria-labelledby="modal-headline">

            <!--generic content starts here-->
            <div>
              <div class="bg-gold">
                <div class="flex justify-between px-4 pt-5 pb-4 sm:p-6 sm:pb-4 bg-primary text-white">
                  <h5 slot="header">
                    <slot name="header-text">
                    </slot>
                  </h5>
                  <div class="cursor-pointer"
                       @click="cancel">
                    <i class="fal fa-times"></i>
                  </div>
                </div>
              </div>

              <slot name="body-wrapper">
                <div class="px-4 pt-5 pb-4 sm:p-6 sm:pb-4 font-light">
                </div>
              </slot>

              <slot name="footer-wrapper">
                <div class="px-4 pt-5 pb-4 sm:p-6 sm:pb-4 font-light">
                  <div class="my-4 flex justify-center space-x-12">
                    <button @click="saveContinue"
                            class="text-primary underline font-extrabold">
                      Save & Continue
                    </button>

                    <button @click="save"
                            class="border border-white outline-none px-6 py-2 bg-primary text-white duration-300 shadow-xl hover:shadow-3xl cursor-pointer rounded-lg font-extrabold">
                      Save & Close
                    </button>
                  </div>
                </div>
              </slot>
            </div>
            <!--generic content ends here-->
          </div>
        </transition>
      </div>
    </div>
  </div>
</template>

<script>
import {mapState} from "vuex";

export default {
  name: 'SideModal',

  props: {
    shouldShow: {
      type: Boolean,
      default: false,
    },

    addClass: String,

    //see here to view choices https://tailwindcss.com/docs/max-width
    //be mindful of the breakpoints
    width: {
      type: String,
      default: 'w-full lg:w-1/3'
    },

    position: {
      type: String,
      default: 'top-0 right-0'
    },

    //see here to view choices https://tailwindcss.com/docs/vertical-align
    verticalAlign: {
      type: String,
      default: 'sm:align-middle'
    },

    transition: {
      type: String,
      default: 'slide-fade',
      validator: function (value) {
        let acceptedTransitions = [
          'fade',
          'slide-fade',
          'bounce',
        ]
        return acceptedTransitions.includes(value)
      }
    },
  },

  data() {
    return {
      // This would allow us to show the modal just
      // by changing the value via Vue Dev Tools.
      // This is private. Do not modify this value
      // externally.
      isShown: this.shouldShow,

      contentIsVisible: false
    }
  },

  computed: {
    ...mapState(['isDisabled']),

    timeout() {
      switch (this.transition) {
        case 'fade':
          return 300;
        case 'bounce':
          return 600;
        default:
          return 800;
      }
    }
  },

  watch: {
    isShown(isShown) {
      if (isShown) {
        this.showContent()
      } else {
        this.hideContent()
      }
    },
  },

  methods: {
    showContent() {
      setTimeout(() => {
        this.contentIsVisible = true
      }, 200)
    },

    hideContent() {
      this.contentIsVisible = false
    },

    close() {
      this.hideContent()

      setTimeout(() => {
        this.isShown = false
      }, this.timeout)
    },

    cancel() {
      this.close()
      this.$emit('closed')
    },

    saveContinue() {
      this.$emit('confirmed')
    },

    save() {
      this.close()
      this.$emit('confirmed')
    },
  }
}
</script>


<style scoped>
.fade-enter-active, .fade-leave-active {
  transition: opacity .5s;
}

.fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */
{
  opacity: 0;
}

.slide-fade-enter-active {
  transition: all .3s ease;
}

.slide-fade-leave-active {
  transition: all .8s cubic-bezier(1.0, 0.5, 0.8, 1.0);
}

.slide-fade-enter, .slide-fade-leave-to
  /* .slide-fade-leave-active below version 2.1.8 */
{
  transform: translateX(10px);
  opacity: 0;
}

.bounce-enter-active {
  animation: bounce-in .5s;
}

.bounce-leave-active {
  animation: bounce-in .5s reverse;
}

@keyframes bounce-in {
  0% {
    transform: scale(0);
  }
  50% {
    transform: scale(1.2);
  }
  100% {
    transform: scale(1);
  }
}
</style>
