<style type="text/css">
	span{
		font-size: 20px;
		margin-top: 5px;
		/*margin-bottom: 5px;*/
	}

	body {
	 background-image: url("http://localhost/vue_app/uploads/bg.jpg");
	}

.log_sign{
	width: 49%;
}

</style>
<body>
	<div class="container-fluid">
  	<div class="row" id = "customer_account">
  		<div class="col-sm-12">

  			<div class = "col-sm-4">
  				
  			</div>

  			<div class = "col-sm-4">
  				<div class="well well-sm" style="background-color: #bdc3c7; padding-bottom: 0px !important;">
						<user-username v-model = "un" name = "un" placeholder = "Username"></user-username>
						<user-password v-model = "pw" name = "pw" placeholder = "Password"></user-password>
						<login-button v-model = "login" v-on:click.native.prevent = "login_acc"></login-button>
	  				<modal-button v-model = "modal" data-toggle="modal" data-target="#signup"></modal-button>
  				</div>

  				<div class="modal fade" id="signup" role="dialog">
				    <div class="modal-dialog">
				      <div class="modal-content">

				      	<div class="row">
					      	<div class="col-sm-12">
					      		<div class="modal-header" style="background-color: #ee5253">
						          <button type="button" class="close" data-dismiss="modal">&times;</button>
						          <h4 class="modal-title">Sign Up Account</h4>
						        </div>
					      	</div>
					      </div>
				        
			        	<div class="modal-body" style="background-color: #f1f2f6">
			        		<div class="row">
			        			<div class="col-sm-6">
				        			<img :src="p_img" style="height: 200px">
				        			<profile_img v-on:change.native.prevent = "change_image" name = "p_image"></profile_img>
						          <username v-model = "username" name = "username" placeholder = " Username"></username>
						          <email v-model = "email"  name = "email" placeholder = " Email"></email>
				        		</div>

				        		<div class="col-sm-6">
				        			<password v-model = "password" name = "password" placeholder = " Password"></password>
						          <confirm-pass v-model = "c_password" name = "c_password" placeholder = " Confirm Password"></confirm-pass>
				        			<firstname v-model = "firstname" name = "firstname" placeholder = " Firstname"></firstname>
						          <middlename v-model = "middlename" name = "middlename" placeholder = " Middlename"></middlename>
						          <lastname  v-model = "lastname" name = "lastname" placeholder = " Lastname"></lastname>
						          <phone v-model = "phone"  name = "phone" placeholder = " Phone"></phone>
				        		</div>
			        		</div>
			        	</div>

				        <div class="row">
				        	<div class="col-sm-12">
					        	<div class="modal-footer" style="background-color: #c8d6e5">
						        	<input type="submit" v-on:click.prevent = "signup_acc" class="btn btn-primary">
						          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						        </div>
					        </div>
				        </div>

				      </div>
				      
				    </div>
				  </div>
  			</div>

  			<div class = "col-sm-4">
  				
  			</div>

  		</div>
  	</div>
  </div>

<script type="text/javascript" src="<?php echo base_url('assets/js/client_js/customer_account.js');  ?>"></script>