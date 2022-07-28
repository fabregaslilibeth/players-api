<template>
  <div class="flex flex-col w-11/12">
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
      <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">

        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-sm">
          <div class="bg-white px-6 py-3">
            <slot name="table-title">TABLE TITLE</slot>
          </div>
          <table class="min-w-full divide-y divide-gray-200 border-t">

            <thead class="bg-gray-50">
            <slot name="table-header-wrapper">
              <tr class="hidden md:table-row">
                <th scope="col" class="px-6 py-3 border-r hidden md:table-cell"></th>
                <th scope="col"
                    class="px-6 py-3 text-left text-xs font-medium text-gray-darkest border-r uppercase tracking-wider">
                  Name
                </th>
                <th scope="col"
                    class="px-6 py-3 text-left text-xs font-medium text-gray-darkest border-r uppercase tracking-wider hidden md:table-cell">
                  Title
                </th>
                <th scope="col" class="relative px-6 py-3 hidden md:table-cell">
                  <span class="sr-only">Edit</span>
                </th>
              </tr>
            </slot>
            </thead>


            <tbody class="bg-white divide-y divide-gray-200">
              <slot name="table-rows-wrapper">
                <tr>
                  <td class="border-r px-6 py-4 whitespace-nowrap hidden md:table-cell">
                    <div class="flex-shrink-0">
                      <i class="fad fa-circle text-green-500"></i>
                    </div>
                  </td>
                  <td class="border-r px-6 py-4 whitespace-nowrap">
                    <div class="text-sm font-medium text-gray-900">
                      Jane Cooper <span class="inline-block md:hidden"><i class="fad fa-circle text-green-500"></i></span>
                    </div>
                    <div class="text-xs text-gray-500">
                      jane.cooper@example.com
                    </div>
                    <!--show on mobile only starts here-->
                    <div class="text-xs text-gray-500 table-cell md:hidden pt-2">
                      <div class="">Regional Paradigm Technician</div>
                      <div class="">Optimization</div>
                    </div>
                    <!--show on mobile only ends here-->
                  </td>
                  <td class="border-r px-6 py-4 whitespace-nowrap hidden md:table-cell border-t pt-2">
                    <div class="text-sm text-gray-900">Regional Paradigm Technician</div>
                    <div class="text-sm text-gray-500">Optimization</div>
                  </td>
                  <td
                    class="border-r px-6 py-4 whitespace-nowrap text-right text-sm font-medium hidden md:table-cell border-t pt-2">
                    <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                  </td>
                </tr>
              </slot>
            <!-- More people... -->
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

</template>

<script>
export default {
  name: 'Table',

  props: {
    addClass: String,

    //see here to view choices https://tailwindcss.com/docs/max-width
    //be mindful of the breakpoints
    width: {
      type: String,
      default: 'sm:max-w-xl md:max-w-2xl sm:w-full'
    },
  },

  data() {
    return {}
  },

  computed: {},

  methods: {}
}
</script>
