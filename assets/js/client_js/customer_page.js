var customer_page = new Vue({
	el: '#name',
	data: {
		fullname : ''
	},
	created: function(){
		this.getName()
	},
	methods:{
		getName: function(){
			axios({
				method: 'POST',
				url: base_url + "CustomerPage/CustomerHomePage/getName",
			}).then(response => {
				this.fullname = response.data.fullname
			}).catch(error => {

			})
		}
	}
})


var shop_page = new Vue({
	el: '#shop_page',
	data: {
		product 			: [],
		page 					: 0,
		item_per_page : 6,
		index 				: 0,
		name 					: '',
		category 			: '',
		image					: '',
		price 				: '',
		qty						: '',
		id 						: '',
		quantity			: '',
		categ 				: ''
	},
	created: function(){
		this.getProducts()
	},
	methods:{
		getProducts: function(){
			axios({
				method: 'POST',
				url: base_url + "CustomerPage/CustomerHomePage/getProducts"
			}).then(response => {
				var num = response.data.length / this.item_per_page

				if((num - Math.floor(num)) != 0){
					this.page = Math.trunc(num) + 1

				}else{
					this.page = num
				}

				this.product = response.data.slice(this.index, this.index + this.item_per_page)
			}).catch(error => {

			})
		},

		selectCategory: function(){
			bodyFormData.set('categ', this.categ)

			axios({
				method: 'POST',
				url: base_url + "CustomerPage/CustomerHomePage/selectCategory",
				data: bodyFormData
			}).then(response => {
				if(this.categ != ''){
					var page = response.data.length / this.item_per_page

					if((page - Math.floor(page)) != 0 ){
	 					this.page = Math.trunc(page) + 1
					}else{
						this.page = page
					}

					this.product_body = response.data.slice(this.index, this.index + this.item_per_page)
				}else{
					this.getProducts()
				}

				this.product = response.data.slice(this.index, this.index + this.item_per_page)
			}).catch(error => {

			})
		},

		setPage: function(item){
			if(this.categ == ''){
				this.getProducts()
			}else{
				this.selectCategory()
			}
			
			this.index = item * this.item_per_page
			this.product = this.product.slice(this.index, this.index + this.item_per_page)
		},

		addCart: function(item){
			this.id = item
		},

		confirmCart: function(){
			bodyFormData.set('id', this.id)
			bodyFormData.set('quantity', this.quantity)

			if(this.quantity == '' || this.quantity == 0){
				swal({
	        title: 'Warning',
	        type: 'warning', 
	        html: `<b>You can't add to cart without quantity!</b>`,
	        showCloseButton: true,
	        showCancelButton: false,
	        focusConfirm: false,
	        confirmButtonText:'OKAY',
	        cancelButtonText:'Cancel',
	      })
			}else{
				axios({
					method: 'POST',
					url: base_url + "CustomerPage/CustomerHomePage/addCart",
					data: bodyFormData
				}).then(response =>{
					if(response.data.code > 0){
						this.getProducts()
						this.quantity = ""
						swal({
			        title: 'Good Job!',
			        type: 'success', 
			        html: `<b>${response.data.msg}</b>`,
			        showCloseButton: true,
			        showCancelButton: false,
			        focusConfirm: false,
			        confirmButtonText:'OKAY',
			        cancelButtonText:'Cancel',
			      })
					}else{
						swal({
			        title: 'Error!',
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
		},

		viewProduct: function(item){
			this.product.filter(x => x.product_id == item).map(x => {
				this.name 			= x.item_name
				this.category 	= x.item_category
				this.image 			= base_url + `uploads/${x.product_img}`
				this.price 			= x.product_prc
				this.qty 				= x.product_qty
			})
		}
	},
	filters:{
		numberWithCommas: function(price){
			return '₱ ' + price.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")
		}
	},
	components: {
		'categ' : list_input
	}
})




var cart_notification = new Vue({
	el: '#cart_notif',
	data:{
		notif 	: '',
		seen 		: true
	},
	created: function(){
		this.getCompletedCart() 
	},
	methods:{
		getCompletedCart: function(){

			axios({
				method: 'POST',
				url: base_url + "CustomerPage/CustomerHomePage/getCompletedCart"
			}).then(response => {
				this.notif = response.data.length
				if(this.notif === 0){
					this.seen = false
				}
			}).catch(error =>{

			})
		},

		viewNotif: function(){
			this.notif = 0
			this.seen  = false
		}
	},

	filters:{

	}
})