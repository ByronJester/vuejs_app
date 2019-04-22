var hidden_input =  {
  inheritAttrs: false,
  props: ['label', 'value'],
  computed: {  
    inputListeners: function (){
      var vm = this
      return Object.assign({}, this.$listeners, {
        input: function (event) {
          vm.$emit('input', event.target.value)
        }
      })
    }
  },

  template:  `<div class="form-group">
              <input type="hidden" class="form-control reg" v-bind="$attrs" v-bind:value="value" v-on="inputListeners">
              </div>
              `
}
  
var text_input =  {
  inheritAttrs: false,
  props: ['label', 'value'],
  computed: {  
    inputListeners: function (){
      var vm = this
      return Object.assign({}, this.$listeners, {
        input: function (event) {
          vm.$emit('input', event.target.value)
        }
      })
    }
  },

  template: `<div class="form-group">
            <input type="text" class="form-control reg" v-bind="$attrs" v-bind:value="value" v-on="inputListeners">
            </div>
            `
}

var password_input = {
  inheritAttrs: false,
  props: ['label', 'value'],
  computed: {  
    inputListeners: function (){
      var vm = this
      return Object.assign({}, this.$listeners, {
        input: function (event) {
          vm.$emit('input', event.target.value)
        }
      })
    }
  },

  template: `<div class="form-group">
            <input type="password" class="form-control reg" v-bind="$attrs" v-bind:value="value" v-on="inputListeners">
            </div>
            `
}


var list_input = {
  inheritAttrs: false,
  props: ['label', 'value'],
  computed: {  
    inputListeners: function (){
      var vm = this
      return Object.assign({}, this.$listeners, {
        input: function (event) {
          vm.$emit('input', event.target.value)
        }
      })
    }
  },

  template: `<div class="form-group">
            <input list="browsers" class ="form-control reg"  v-bind="$attrs" v-bind:value="value" v-on="inputListeners">
              <datalist id="browsers">
                <option value="Clothes">
                <option value="Gadgets">
                <option value="Furniture">
                <option value="School Supplies">
                <option value="Food">
              </datalist>
            </div>`
}



var date_input = {
  inheritAttrs: false,
  props: ['label', 'value'],
  computed: {  
    inputListeners: function (){
      var vm = this
      return Object.assign({}, this.$listeners, {
        input: function (event) {
          vm.$emit('input', event.target.value)
        }
      })
    }
  },

    template: `<div class="form-group">
              <input type="date" id = "date" class ="form-control reg" v-bind="$attrs" v-bind:value="value" v-on="inputListeners">
              </div>`
}

var number_input = {
  inheritAttrs: false,
  props: ['label', 'value'],
  computed: {  
    inputListeners: function (){
      var vm = this
      return Object.assign({}, this.$listeners, {
        input: function (event) {
          vm.$emit('input', event.target.value)
        }
      })
    }
  },

    template: `<div class="form-group">
              <input type="number" class ="form-control reg" v-bind="$attrs" v-bind:value="value" v-on="inputListeners">
              </div>`
}

var file_input = {
  inheritAttrs: false,
  props: ['label', 'value'],
  computed: {  
    inputListeners: function (){
      var vm = this
      return Object.assign({}, this.$listeners, {
        input: function (event) {
          vm.$emit('input', event.target.value)
        }
      })
    }
  },

    template: `<div class="form-group">
              <input type="file" accept="image/*" id ="file" v-bind="$attrs" v-bind:value="value" v-on="inputListeners">
              </div>`
}


var submit_btn = { 
  inheritAttrs: false,
  props: ['label', 'value'],
  computed: {  
    inputListeners: function (){
      var vm = this
      return Object.assign({}, this.$listeners, {
        input: function (event) {
          vm.$emit('input', event.target.value)
        }
      })
    }
  },

  template: ` <div class="form-group">
              <input type="submit" class="btn btn-primary reg" v-bind="$attrs" v-bind:value="value" v-on="inputListeners">
              </div>`
}

var bodyFormData = new FormData()

