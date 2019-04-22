var display_name = new Vue({
	el	: '#admin_name',
	data: {
		fullname: ''
	},
	created: function(){
		this.getName()
	},
	methods: {
		getName: function(){
			axios({
				method: 'POST',
				url: base_url + "AccountManagement/UserProfile/displayProfile"
			}).then(response =>{
				this.fullname = response.data.fullname
			}).catch(error =>{
				console.log("Error:" + error)
			})
		}
	}
})

var admin_profile = new Vue({
	el	: '#chng_pwd',
	data: {
		user_id: '',
		username: '',
		change_password: '',
		change_btn: 'Change Password',
		btn_dsbld: false
	},
	created: function(){
		this.getPassword()
	},
	methods:{
		getPassword: function(){
			axios({
				method: 'POST',
				url: base_url + "AccountManagement/UserProfile/displayProfile"
			}).then(response =>{
				admin_profile.username = response.data.username
				admin_profile.user_id  = response.data.id
			}).catch(error =>{
				console.log("Error:" + error)
			})
		},

		changePassword: function(){
			bodyFormData.set('user_id', this.user_id)
			bodyFormData.set('change_password', this.change_password)

			if(this.change_password == ""){
				swal({
	        title: 'Error!',
	        type: 'error', 
	        html: `<b>Password Field is Empty</b>`,
	        showCloseButton: true,
	        showCancelButton: false,
	        focusConfirm: false,
	        confirmButtonText:'OKAY',
	        cancelButtonText:'Cancel',
	      })
			}else{
				swal({
	        title: 'Warning!',
	        type: 'warning', 
	        html: `<b>Make sure your password is correct!</b>`,
	        showCloseButton: true,
	        showCancelButton: true,
	        focusConfirm: false,
	        confirmButtonText:'OKAY',
	        cancelButtonText:'Cancel',
	      }).then(result =>{        
	        axios({
						method: 'POST',
						url: base_url + "AccountManagement/UserProfile/editPassword",
						data: bodyFormData
					}).then(response =>{
						if(response.data.code > 0){
							admin_profile.change_password = ""
		          swal({
				        title: 'Great Job!',
				        type: 'success', 
				        html: `<b>${response.data.msg}</b>`,
				        showCloseButton: true,
				        showCancelButton: false,
				        focusConfirm: false,
				        confirmButtonText:'OKAY',
				        cancelButtonText:'Cancel',
				      }).then(success => {
				      	location.reload()
				      }, cancel => {

				      })
		        }else{
		        	admin_profile.change_password = ""
		        	swal({
				        title: 'Error!',
				        type: 'error', 
				        html: response.data.msg,
				        showCloseButton: true,
				        showCancelButton: false,
				        focusConfirm: false,
				        confirmButtonText:'OKAY',
				        cancelButtonText:'Cancel',
				      })
		        }
					}).catch(error =>{

					})
	      }, dismiss => {
	      })
			}
		}
	},
	components:{
		'hidden-id': hidden_input,
		'change-password': password_input,
		'change-btn' : submit_btn
	}
})


var product_management = new Vue({
	el: '#product_page',
	data:{
		item_name 	: '',
		category		: '',
		date_posted : '',
		product_qty : '',
		product_prc : '',
		product_img : base_url + "uploads/product.jpg",
		add_product : 'ADD PODUCT'
	},
	created: function(){

	},
	methods:{
		img_btn: function(e){
      var files = e.target.files || e.dataTransfer.files;
      if (!files.length)
        return;

      this.product_img = files[0]

      var reader = new FileReader()

      reader.onload = (e) => {
        this.product_img = e.target.result
      };
      reader.readAsDataURL(files[0])

      bodyFormData.set('img_id', files[0])
  
    },
    
    product_add: function(){
    	var today = new Date()
    	var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate()
			var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds()
			var dateTime = date+' '+time

			this.date_posted = dateTime

			bodyFormData.set('item_name', this.item_name)
			bodyFormData.set('category', this.category)
			bodyFormData.set('date_posted', this.date_posted)
			bodyFormData.set('product_qty', this.product_qty)
			bodyFormData.set('product_prc', this.product_prc)
			

			if(this.item_name != "" && this.category != "" && this.date_posted != "" && this.date_posted != "" && this.product_qty != "" && this.product_prc != "" && this.product_img != ""){
				axios({
					method: 'POST',
					url: base_url + "AdminManagement/HomePage/addProduct",
					data: bodyFormData
				}).then(response =>{
					this.item_name 		= ""
					this.category 		= ""
					this.product_qty 	= ""
					this.product_prc 	= ""
					this.product_img 	= base_url + "uploads/product.jpg"

					swal({
	        title: 'Good Job!',
		        type: 'success', 
		        html: `<b>${response.data.msg}</b>`,
		        showCloseButton: true,
		        showCancelButton: false,
		        focusConfirm: false,
		        confirmButtonText:'OKAY',
		        cancelButtonText:'Cancel',
		      }).then(q =>{
		      	location.reload()
		      }, w =>{

		      })
				}).catch(error => {

				})
			}else{
				swal({
	        title: 'Warning!',
	        type: 'warning', 
	        html: `<b> All Field is Required</b>`,
	        showCloseButton: true,
	        showCancelButton: false,
	        focusConfirm: false,
	        confirmButtonText:'OKAY',
	        cancelButtonText:'Cancel',
	      })
			}

    }
	},
	components :{
		'item-name'		: text_input,
		'list-product': list_input,
		'product-date': date_input,
		'product-qty'	: number_input,
		'product-prc'	: number_input,
		'product-img'	: file_input,
		'add-product' : submit_btn,
	}
})



var product = new Vue({
	el: '#prod_tbl',
	data:{
		product_head : [
			{name: 'Name', categ: 'Category', date: 'Date Added', qnty: 'Quantity', prc: 'Price', img: 'Item Image', act: 'Action'}
		],
		product_body 	: [],
		item_name 	 	: '',
		category		 	: '',
		date_posted  	: '',
		product_qty  	: '',
		product_prc  	: '',
		product_img  	: base_url + "uploads/product.jpg",
		update_id    	: '',
		page_number  	: 0,
		find_item 	 	: '',
		item_per_page	: 5,
		index 				: 0
	},
	created: function(){
		this.get_product()
	},
	methods:{

		get_product: function(){
			axios({
				method: 'POST',
				url: base_url + "AdminManagement/Homepage/getProduct"
			}).then(response =>{ 
				this.product_body = response.data

				var page = this.product_body.length / this.item_per_page

				if((page - Math.floor(page)) != 0 ){
 					this.page_number = Math.trunc(page) + 1
				}else{
					this.page_number = page
				}

				this.product_body = this.product_body.slice(this.index, this.index + this.item_per_page)

			}).catch(error =>{

			})
		},

		input_search: function(){
			bodyFormData.set('find_item', this.find_item)

			axios({
				method: 'POST',
				url: base_url + "AdminManagement/Homepage/searchItem",
				data: bodyFormData
			}).then(response => {
				this.product_body = response.data.slice(this.index, this.index + this.item_per_page)
			}).catch(error => {

			})
		},

		set_page: function(item){
			this.get_product()
			this.index = item * this.item_per_page
			this.product_body = this.product_body.slice(this.index, this.index + this.item_per_page)
		},

		delete_product: function(id){
			bodyFormData.set('btn_del', id)
			swal({
        title: 'Warning!',
        type: 'warning', 
        html: `<b>Are you sure you want to delete this item ?</b>`,
        showCloseButton: true,
        showCancelButton: true,
        focusConfirm: false,
        confirmButtonText:'OKAY',
        cancelButtonText:'Cancel',
      }).then(result => {
      	axios({
					method: 'POST',
					url: base_url + "AdminManagement/Homepage/deleteProduct",
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
			      }).then(r =>{
			      	location.reload()
			      },x =>{

			      })
					}else{
						swal({
			        title: 'Error!',
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
					console.log("Error:" + error)
				})
      }, cancel => {

      })
		},

		upd_img: function(e){
			var files = e.target.files || e.dataTransfer.files;
      if (!files.length)
        return;

      this.product_img = files[0]

      var reader = new FileReader()

      reader.onload = (e) => {
        this.product_img = e.target.result
      };
      reader.readAsDataURL(files[0])

      bodyFormData.set('upd_img', files[0])
  
		},

		edit_product: function(id){
			this.product_body.filter(x => x.product_id === id)
			.map(x => {
				this.item_name 		= x.item_name
				this.category  		= x.item_category
				this.product_qty	= x.product_qty
				this.product_prc  = x.product_prc
				this.product_img  = base_url + `uploads/${x.product_img}`
			})

			this.update_id = id
		},

		up_btn: function(){
			var today = new Date()
    	var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate()
			var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds()
			var dateTime = date+' '+time
			this.date_posted = dateTime

			bodyFormData.set('upd_date', this.date_posted)
			bodyFormData.set('upd_name', this.item_name)
			bodyFormData.set('upd_list', this.category)
			bodyFormData.set('upd_qty', this.product_qty)
			bodyFormData.set('upd_prc', this.product_prc)
			bodyFormData.set('btn_edit', this.update_id)

			axios({
				method: 'POST',
				url: base_url + "AdminManagement/Homepage/updateProduct",
				data: bodyFormData
			}).then(result => {
				if(result.data.code > 0){
					swal({
		        title: 'Good Job!',
		        type: 'success', 
		        html: `<b>${result.data.msg}</b>`,
		        showCloseButton: true,
		        showCancelButton: false,
		        focusConfirm: false,
		        confirmButtonText:'OKAY',
		        cancelButtonText:'Cancel',
		      }).then(response =>{
		      	location.reload()
		      }, dismiss =>{

		      })
				}else{
					swal({
		        title: 'Error!',
		        type: 'error', 
		        html: `<b>${result.data.msg}</b>`,
		        showCloseButton: true,
		        showCancelButton: false,
		        focusConfirm: false,
		        confirmButtonText:'OKAY',
		        cancelButtonText:'Cancel',
		      })
				}
			}).catch(error =>{

			})
		}
	},
	components :{
		'item-name'		: text_input,
		'list-product': list_input,
		'product-date': date_input,
		'product-qty'	: number_input,
		'product-prc'	: number_input,
		'product-img'	: file_input,
		'search-btn'  : submit_btn
	}
})