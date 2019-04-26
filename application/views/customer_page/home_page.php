<style type="text/css">
	body {
	 background-image: url("http://localhost/vue_app/uploads/bg.jpg");
	 opacity: 0.9;
	}

#mySidenav a {
  position: absolute;
  left: -140px;
  transition: 0.3s;
  padding-top: 15px;
  padding-bottom: 15px;
  padding-left: 5px;
  width: 170px;
  text-decoration: none; 
  font-size: 20px;
  color: white;
  border-radius: 0 5px 5px 0;
}

#mySidenav a:hover { 
  left: 0;
}

#my_shop {
  top: 20px;
  background-color: #4CAF50;
}

#my_cart {
  top: 80px;
  background-color: #2196F3;
}

#my_account {
  top: 140px;
  background-color: #f44336;
}

#contact {
  top: 200px;
  background-color: #555
}

.tab-pane{
	margin-left: 10px;
}

b {
	color: black;
}

span{
	color: black;
}

.glyphicon-shopping-cart{
	width: 49%;
	font-size: 15px;
	background-color: #ee5253;
}

.glyphicon-eye-open{
	width: 49%;
	font-size: 15px;
	background-color: #0abde3;
}

.prod{
	width: 100%;
	text-align: center;
	margin-top: 0px !important;
	margin-bottom: 5px !important;
}

.view_prod{
	background-color: #c8d6e5;
	text-align: center;
	width: 100%;
}
.modal-title{
	color: white
}

.test{
	width: 250px;
}


</style>
<body>

<nav class="navbar navbar-default" style=" background-color: #01a3a4">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" data-toggle="tab" id ="name" href="#"> <span class="glyphicon glyphicon-user"></span>
      	<b v-html = "fullname"></b>
      </a>
    </div>
    <ul class="nav navbar-nav navbar-right">
      <li><a href= "<?php echo base_url()?>AccountManagement/CustomerAccount/logout"><span class="glyphicon glyphicon-log-out"></span>
      	<b>Logout</b></a>
      </li>
    </ul>
  </div>
</nav>

<div class ="container-fluid"> 
	<div class = "row">
		<div class = "col-sm-2">
			<div id="mySidenav" class="sidenav">
				<a data-toggle="tab" href="#shop_page" id="my_shop">SHOP NOW</a>
			  <a data-toggle="tab" href="#cart_page" id="my_cart">MY CART</a>
			  <a data-toggle="tab" href="#account_page" id="my_account">MY ACCOUNT</a>
			  <!-- <a data-toggle="tab"href="#" id="contact">Contact</a> -->
			</div>
		</div>

		<div class = "col-sm-10">
			<div class="tab-content">

				<div id="shop_page" class="tab-pane fade in active"> 
					<div class = "row">
						<div class="col-sm-12">
							<div class="col-sm-8">
								<ul class="pagination" v-for = "page in page">
							    <li><a href="#" v-on:click.prevent.stop = "setPage(page - 1)">{{page}}</a></li>
							  </ul>
							</div>

							<div class="col-sm-4">
							  <categ name = "categ" v-model = "categ" placeholder = "Select Category" v-on:keyup.prevent = "selectCategory"></categ>
							</div>
								
							<div class="col-sm-4" v-for = "item in product">
								<div class="well well-sm" style="background-color: #576574">
									<div class="row">
										<div class="col-sm-12">
											<img :src=`<?php echo base_url()?>/uploads/${item.product_img}` style = "height: 90px; margin-bottom: 5px" >
											<div class = "well well-sm prod">{{item.item_name}}</div>
											<div class = "well well-sm prod">₱ {{item.product_prc}} </div>
										</div>
									</div>
									
									<div class="row">
										<div class="col-sm-12">
											<span class = "btn btn-primary glyphicon glyphicon-shopping-cart" v-on:click.prevent = "addCart(item.product_id)" data-toggle="modal" data-target="#cart">
												
											</span>
											<span class = "btn btn-primary glyphicon glyphicon-eye-open" data-toggle="modal" data-target="#view" v-on:click.prevent = "viewProduct(item.product_id)" ></span>

										</div>
									</div>

									<div class="modal fade" id="view" role="dialog">
								    <div class="modal-dialog">
								      <div class="modal-content">

								      	<div class="row">
									      	<div class="col-sm-12">
									      		<div class="modal-header" style="background-color: #0abde3">
										          <button type="button" class="close" data-dismiss="modal">&times;</button>
										          <h4 class="modal-title">{{name}}</h4>
										        </div>
									      	</div>
									      </div>
								        
							        	<div class="modal-body" style="background-color: #f1f2f6">
							        		<div class="row">
							        			<div class="col-sm-6">
							        				<img :src="image" style="height: 160px">
								        		</div>

								        		<div class="col-sm-6">
								        			<div class = "well well-sm view_prod"> {{category}}</div>
								        			<div class = "well well-sm view_prod">₱ {{price}}</div>
								        			<div class = "well well-sm view_prod">{{qty}} pcs.</div>
								        		</div>
							        		</div>
							        	</div>

								        <div class="row">
								        	<div class="col-sm-12">
									        	<div class="modal-footer" style="background-color: #c8d6e5">
										          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
										        </div>
									        </div>
								        </div>
								      </div>
								    </div>
								  </div>

								  <div class="modal fade" id="cart" role="dialog">
								    <div class="modal-dialog test" >
								      <div class="modal-content">

								      	<div class="row">
									      	<div class="col-sm-12">
									      		<div class="modal-header" style="background-color: #ee5253">
										          <button type="button" class="close" data-dismiss="modal">&times;</button>
										          <h4 class="modal-title">Add to Cart</h4>
										        </div>
									      	</div>
									      </div>
								        
							        	<div class="modal-body" style="background-color: #f1f2f6">
							        		<div class="row">
							        			<div class="col-sm-12">
							        				<input type="number" name = "quantity" v-model ="quantity" class="form-control" placeholder="Quantity" style="text-align: center;">
								        		</div>
							        		</div>
							        	</div>

								        <div class="row">
								        	<div class="col-sm-12">
									        	<div class="modal-footer" style="background-color: #c8d6e5">
										          <span class = "btn btn-primary glyphicon glyphicon-ok" v-on:click.prevent = "confirmCart"></span>
										        </div>
									        </div>
								        </div>
								      </div>
								    </div>
								  </div>
									
								</div>
							</div>
						</div>
					</div>
      	</div>

      	<div id="cart_page" class="tab-pane fade">
					<div class = "row">
						<div class="col-sm-12">
							<h1>HEHEHEHE</h1>
						</div>
					</div>
      	</div> 

      	<div id="account_page" class="tab-pane fade">
					<div class = "row">
						<div class="col-sm-12">
							<h1>HUHUHUHU</h1>
						</div>
					</div>
      	</div> 

      </div>
    </div>
	</div>
</div>


<script type="text/javascript" src="<?php echo base_url('assets/js/client_js/customer_page.js');  ?>"></script>