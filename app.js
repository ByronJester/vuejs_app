var app 						= require('express')()
var server					= require('http').createServer(app)
var io 							= require('socket.io').listen(server)
var mysql 					= require('mysql')