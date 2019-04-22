<body>

<div class="container-fluid">
  <div class="row">
    <div class="col-md-3">
      <div class="row">
        <div class = "col-sm-12" id = "login_module">
          <div class="well well-sm">
            <form>
  	          <text-input v-model="username" placeholder="Username"  name="username"></text-input>
  	          <password-input v-model="password" placeholder="Password" name="password"></password-input>
  	          <login-btn v-on:click.native.prevent="acc_login" v-model = "login_btn"> </login-btn>
            </form>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-9">
    </div>
  </div>
</div>

<script type="text/javascript" src="<?php echo base_url('assets/js/client_js/user_profile.js');  ?>"></script>