var login_app = new Vue({
  el: '#login_module',
  data: {
    username: '',
    password: '',
    login_btn: 'Login'
  },
  methods: {
    acc_login: function () {
      bodyFormData.set('username', this.username)
      bodyFormData.set('password', this.password)

      axios({
        method: 'POST',
        url: base_url + "AccountManagement/UserProfile/loginAccount",
        data: bodyFormData
      }).then(response =>{
        if(response.data.code > 0){
          swal({
            title: 'Good Job!',
            type: 'success', 
            html: `<b> Succesfully Login</b>`,
            showCloseButton: true,
            showCancelButton: false,
            focusConfirm: false,
            confirmButtonText:'OKAY',
            cancelButtonText:'Cancel',
          }).then(result =>{        
            if(result){ 
              window.location = base_url + "AdminManagement/HomePage/index"
            } 
          }, dismiss => {
            if(dismiss){
            }
          })
        }else{
          login_app.username = ""
          login_app.password = ""

          swal({
            title: 'Oops..',
            type: 'error',
            html: `<b>Incorrect Username or Password</b>`,
            showCloseButton: true,
            showCancelButton: false,
            focusConfirm: false,
            confirmButtonText:'OKAY',
            cancelButtonText:'Cancel',
          })
        }

      }).catch(error =>{
        console.log("Error:" + error)
      })

    }
  },
  components: {
    'text-input'    : text_input,
    'password-input': password_input,
    'login-btn'     : submit_btn
  }

})