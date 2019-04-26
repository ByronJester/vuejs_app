var customer_login = new Vue({
	el: '#customer_account',
	data:{
		login 			: 'LOGIN',
		modal 			: 'SIGN UP',
		p_img 			: base_url + "uploads/profile1.png",
		username 		: '',
		password 		: '',
		c_password	: '',
		email  			: '',
		phone  			: '',
		firstname 	: '',
		middlename  : '',
		lastname   	: '',
		un    			: '',
		pw 					: '',
		fullname 		: ''
	},
	created: function(){

	},
	methods:{
		login_acc: function(){
			bodyFormData.set('un', this.un)
			bodyFormData.set('pw', this.pw)

			if(this.un == "" && this.pw == ""){
				swal({
	        title: 'Warning',
	        type: 'warning', 
	        html: `<b>All Field is Required</b>`,
	        showCloseButton: true,
	        showCancelButton: false,
	        focusConfirm: false,
	        confirmButtonText:'OKAY',
	        cancelButtonText:'Cancel',
	      })
			}else{
				axios({
					method: 'POST',
					url: base_url + "AccountManagement/CustomerAccount/loginAccount",
					data: bodyFormData
				}).then(response => {
					if(response.data.code > 0){
						swal({
			        title: 'Good Job!',
			        type: 'success', 
			        html: `<b>${response.data.msg}</b>`,
			        showCloseButton: true,
			        showCancelButton: false,
			        focusConfirm: false,
			        confirmButtonText:'OKAY',
			        cancelButtonText:'Cancel',
			      }).then(confirm => {
			      	window.location = base_url + "CustomerPage/CustomerHomePage/index"
			      }, dismiss => {

			      })
					}else{
						swal({
			        title: 'Login Failed',
			        type: 'error', 
			        html: `<b>${response.data.msg}</b>`,
			        showCloseButton: true,
			        showCancelButton: false,
			        focusConfirm: false,
			        confirmButtonText:'OKAY',
			        cancelButtonText:'Cancel',
			      })
					}
				}).catch(error => {

				})
			}
		},

		change_image: function(e){
			var files = e.target.files || e.dataTransfer.files
      if (!files.length)
        return;

      this.p_img = files[0]

      var reader = new FileReader()

      reader.onload = (e) => {
        this.p_img = e.target.result
      };
      reader.readAsDataURL(files[0])

      bodyFormData.set('p_image', files[0])
		},

		signup_acc: function(){
			bodyFormData.set('username', this.username)
			bodyFormData.set('password', this.password)
			bodyFormData.set('c_password', this.c_password)
			bodyFormData.set('email', this.email)
			bodyFormData.set('phone', this.phone)
			bodyFormData.set('firstname', this.firstname)
			bodyFormData.set('middlename', this.middlename)
			bodyFormData.set('lastname', this.lastname)


			if(this.username == "" && this.password == "" && this.c_password == "" && this.email == "" && this.phone == "" && this.firstname == "" && this.middlename == "" && this.lastname == ""){
				swal({
	        title: 'Warning',
	        type: 'warning', 
	        html: `<b>All Field is Required</b>`,
	        showCloseButton: true,
	        showCancelButton: false,
	        focusConfirm: false,
	        confirmButtonText:'OKAY',
	        cancelButtonText:'Cancel',
	      })
			}else{
				axios({
					method: 'POST',
					url: base_url + "AccountManagement/CustomerAccount/createAccount",
					data: bodyFormData
				}).then(response => {
					if(response.data.code > 0){
						swal({
			        title: 'Good Job!',
			        type: 'success', 
			        html: `<b>${response.data.msg}</b>`,
			        showCloseButton: true,
			        showCancelButton: false,
			        focusConfirm: false,
			        confirmButtonText:'OKAY',
			        cancelButtonText:'Cancel',
			      }).then(confirm => {
			      	location.reload()
			      }, dismiss => {

			      })
					}else{
						swal({
			        title: 'Warning',
			        type: 'warning', 
			        html: `<b>${response.data.msg}</b>`,
			        showCloseButton: true,
			        showCancelButton: false,
			        focusConfirm: false,
			        confirmButtonText:'OKAY',
			        cancelButtonText:'Cancel',
			      })
					}
				}).catch(error => {

				})
			}
		}
	},
	components:{
		'user-username'	: text_input,
		'user-password'	: password_input,
		'login-button'	: submit_btn,
		'modal-button'	: submit_btn,
		'username'     	: text_input,
		'password'			: password_input,
		'confirm-pass'	: password_input,
		'email'					: text_input,
		'phone' 				: number_input,
		'firstname'			: text_input,
		'middlename' 		: text_input,
		'lastname'			: text_input,
		'profile_img'		: file_input
	}
})


