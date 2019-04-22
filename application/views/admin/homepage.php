<body>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" data-toggle="tab" id ="admin_name" href="#edit_user"> <span class="glyphicon glyphicon-user"></span>
      	<b v-html = "fullname"></b>
      </a>
    </div>
    <ul class="nav navbar-nav navbar-right">
      <li><a href= "<?php echo base_url()?>AccountManagement/UserProfile/logout"><span class="glyphicon glyphicon-log-out"></span>
      	<b>Logout </b></a>
      </li>
    </ul>
  </div>
</nav>

<div class ="container-fluid"> 
	<div class = "row">
		<div class = "col-xs-2">
			<div id="mySidenav" class="sidenav">
				<a data-toggle="tab" href="#add_prod_tab" id="shop">Add</a>
			  <a data-toggle="tab" href="#mng_prod_tab" id="blog">Manange</a>
			  <a data-toggle="tab" href="#" id="projects">Projects</a>
			  <a data-toggle="tab"href="#" id="contact">Contact</a>
			</div>
		</div>

		<div class = "col-xs-10" style="margin-left: 10%;">
			<div class = "col-sm-12" >
				<div class="tab-content">
					<div id="add_prod_tab" class="tab-pane fade in active"> 
						<div class="container">
							<form>
		            <div class="row" id = "product_page">
		              <div class = "col-sm-6">
			              <div class="well well-sm">
				           		<item-name placeholder="Item Name" v-model = "item_name" name = "item_name"></item-name >
											<list-product placeholder="Select Category" v-model = "category" name = "category"></list-product>
											<product-date v-model = "date_posted" name = "date_posted"></product-date>
											<product-qty v-model = "product_qty" placeholder="Item Quantity" name = "product_qty"></product-qty>
											<product-prc v-model = "product_prc" placeholder="Item Price" name = "product_prc"></product-prc>
											<add-product v-on:click.native.prevent = "product_add" v-model = "add_product"></add-product>
	               		</div>
		              </div>

		              <div class="col-sm-6">
		              	<div class="well well-sm">
			              	<img :src="product_img"/>
		                 	<product-img name = "img_id" v-on:change.native.prevent = "img_btn"></product-img>
		                </div>
		              </div>
		            </div>
		          </form>
		        </div>

	      	</div>


					<div id="mng_prod_tab" class="tab-pane fade">
						<div class="container">
							<div class = "col-sm-12" >
								<div class = "row" id = "prod_tbl"> 
									<div class="well well-sm">
										<input type = "text" v-model= "find_item" name ='find_item' v-on:keyup = "input_search" class ="form-control" style="width: 20%; margin-bottom: 10px" placeholder="Search Item"  v-on:keyup.delete = "delete_search">
										<table>
											<tr v-for = "head in product_head">
												<th>{{head.name}}</th>
									      <th>{{head.categ}}</th>
									      <th>{{head.date}}</th>
									      <th>{{head.qnty}}</th>
									      <th>{{head.prc}}</th>
									      <th>{{head.img}}</th>
									      <th>{{head.act}}</th>
											</tr>
											<tr v-for="row in product_body">
									      <td>{{row.item_name}}</td>
									      <td>{{row.item_category}}</td>
									      <td>{{row.date_posted}}</td>
									      <td>{{row.product_qty}}</td>
									      <td>{{row.product_prc}}</td>
									      <td>
									      	<img :src= `<?php echo base_url()?>uploads/${row.product_img}` class = "tbl-img">
									      </td>
									      <td>
									      	<input type="submit" class="btn btn-primary" v-on:click = "edit_product(row.product_id)" name = "btn_edit" value="Update" data-toggle="modal" data-target="#myModal">
									      	<input type="submit" class="btn btn-danger" v-on:click = "delete_product(row.product_id)" name = "btn_del" value="Delete">
									      </td>
								    	</tr>
										</table>
									</div>

									<ul class="pagination" v-for = "item in page_number">
								    <li><a href="#" v-on:click.prevent.stop = "set_page((item - 1 ))">{{item}}</a></li>
								  </ul>

								  <div class="modal fade" id="myModal" role="dialog">
								    <div class="modal-dialog">
								      <div class="modal-content">
								        <div class="modal-header">
								          <button type="button" class="close" data-dismiss="modal">&times;</button>
								          <h4 class="modal-title">Edit Item</h4>
								        </div>
								        <div class="col-sm-12">
									        <div class="modal-body">
									        	<div class = "col-sm-6">
									        		<item-name name = "upd_name" 		v-model = "item_name" placeholder = "Item Name"></item-name>
										          <list-product name = "upd_list" v-model = "category" placeholder = "Item Category"></list-product>
										          <product-date name = "upd_date" v-model = "date_posted"></product-date>
										          <product-qty name = "upd_qty" 	v-model = "product_qty" placeholder = "Item Quantity"></product-qty>
										          <product-prc name = "upd_prc" 	v-model = "product_prc" placeholder = "Item Price"></product-prc>
									        	</div>
									          <div class = "col-sm-6">
									          	<img :src="product_img" style="height: 200px">
									          	<product-img v-on:change.native.prevent = "upd_img" name = "upd_img"></product-img>
									          </div>
									        </div>
								        </div>
								        <div class="modal-footer">
								        	<input type="submit" class="btn btn-success" name = "edit_submit" v-on:click = "up_btn" value="Update">
								          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
								        </div>
								      </div>
								    </div>
								  </div>             
								</div>

							</div>
						</div>
	      	</div>

	      	<div id="edit_user" class="tab-pane fade">
						<div class="container">
							<form>
								<div class = "row" id = "chng_pwd">
									<div class = "col-xs-4">
									</div>

									<div class = "col-sm-4">
										<b style=""><center style = "margin-top: 40%; margin-bottom: 20%; font-size: 40px">Welcome {{username}}</center></b>
										<hidden-id v-model = "user_id" name ="user_id"></hidden-id>
										<change-password v-model = "change_password" name = "change_password" placeholder = "Password"></change-password>
										<change-btn v-on:click.native.prevent = "changePassword" v-bind:disabled = "btn_dsbld" v-model = "change_btn"></change-btn>
									</div>

									<div class = "col-xs-4">
									</div>
								</div>
							</form>
						</div>
	      	</div> 

	      </div>
	    </div>
		</div>
	</div>
</div>

<script type="text/javascript" src="<?php echo base_url('assets/js/client_js/admin_homepage.js');  ?>"></script>