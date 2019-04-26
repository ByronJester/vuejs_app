<!DOCTYPE html>
<html>
<head>
  <title>Vue App</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.0/sweetalert2.min.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/vue-good-table@2.12.2/dist/vue-good-table.min.css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
  <input type="hidden" id="base_url" value="<?= base_url() ?>">
  <script type="text/javascript"> var base_url = $("#base_url").val();</script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.0/sweetalert2.all.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/vue"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.18.0/axios.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/vue-good-table@2.12.2/dist/vue-good-table.min.js"></script>
</head>

<style>
.reg {
    width: 100%;
    height: 44px; 
    display: block;
    font-size: 16px;
    text-align: center;
}


#file{
  /*display: none;*/
}

img {
  width: 100%;
  height: 260px;
  border: 5px solid;
}

b {
  font-family: Palatino ;
  font-size: 20px;
}

#login_module{
  margin-top: 60%;
  margin-bottom: 60%;
  margin-left: 5px;
  margin-right: 5px;
  background-color: #34495e;
  padding-top: 15px;
  padding-bottom: 10px;
}

#product_page{
  background-color: #34495e;
  padding-top: 20px;
  margin-top: 5%;
}


body{
  background-color: #b2bec3
}

.well-sm{
  width: 100%;
}

#date{
  display: none
}

table {
  width: 100%;
}
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
th, td {
  padding-top: 5px;
  padding-bottom: 5px;
  text-align: center;
}
th {
  background-color: #60a3bc;
}
td {
  background-color: #f1f2f6;
}

.tbl-img{
  width: 200px;
  height: 73px;
}

.pagination {
  margin-top: 0px !important;
  margin-bottom: 0px !important;
  padding-top: 0px !important;
  padding-bottom: 0px !important;
}

#customer_account{
  margin-top: 15%;
}

.modal-title{
  text-align: center;
}

</style>

<script type="text/javascript" src="<?php echo base_url('assets/js/client_js/input_component.js');?>"></script>