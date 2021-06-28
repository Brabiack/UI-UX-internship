<?php
	if(!isset($_SESSION)){session_start();}
	function user_details($key){
		return isset($_SESSION['proj4'][$key]) ? $_SESSION['proj4'][$key] : '';
	}
?>
<style>
/*#myImg {
    border-radius: 5px;
    cursor: pointer;
    transition: 0.3s;
}*/
#myImg:hover {opacity: 0.8;}
/* The Modal (background) */
.modaledit {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 999; /* Sit on top */
    padding-top: 40px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(5, 56, 68, 0.9); /* Black w/ opacity */ /*rgba(0,0,0,0.9); original*/
	transition: visibility 1s, opacity 0.5s linear !important;/*on close*/
}
/* Modal Content (image) */
.modal-contentedit {
	position: relative;
    background-color: #fefefe;
    padding: 0;
    margin: 0 auto;
    width: 40%;
    max-width: 700px;
	padding-bottom: 1px;
}
.modal-contentedit img {
    margin: auto;
    display: block;
    width: 100%;
    max-width: 700px;
	max-height: 550px;
	
	user-drag: none; /*img not selectable*/
	user-select: none;
	-moz-user-select: none;
	-webkit-user-drag: none;
	-webkit-user-select: none;
	-ms-user-select: none;
}

/* Add Animation *//* animation
.modal-contentedit, #caption {    
    -webkit-animation-name: zoom;
    -webkit-animation-duration: 0.6s;
    animation-name: zoom;
    animation-duration: 0.6s;
}
@-webkit-keyframes zoom {
    from {-webkit-transform:scale(0)} 
    to {-webkit-transform:scale(1)}
}
@keyframes zoom {
    from {transform:scale(0)} 
    to {transform:scale(1)}
}*/

/* Caption of Modal Image */
#caption {
    margin: auto;
    display: block;
    width: 80%;
    max-width: 700px;
    text-align: center;
    color: #ccc;
    padding: 5px 0;
    /*height: 150px;*/
}
/* The Close Button */
.cls {
	float: right;
    color: #333; /*#f1f1f1;*/
	margin-right:13px;
    font-size: 24px;
    font-weight: bold;
    transition: 0.3s;
}
.cls:hover, .cls:focus {
    color: red; /*#bbb*/
    text-decoration: none;
    cursor: pointer;
}
/* 100% Image Width on Smaller Screens */
@media only screen and (max-width: 700px){
    .modal-contentedit  {
        width: 100%;
    }
}
#editprof header, #editprof footer{background:#b7b7b7 !important;padding:3px; 10px}

.my::-moz-selection { /*Firefox */
    background: none;
}
.my::selection {
    background: none;
}
.hide {visibility:hidden;opacity:0;}
.checkoutdiv header, .checkoutdiv footer, .checkoutdiv .modal-contentedit{ border-radius:15px; }
.checkoutdiv header{
    border-bottom-left-radius: 1px !important;
    border-bottom-right-radius: 1px !important;
}
/***************************************************** edit prof ********************************************/
#editprof .form {
	color:#333; font-size: 23px;
	/*font-family: 'Lato', Arial, sans-serif;*/
	
	background-color: #359673;/*#4dAF50*/
	margin: 3px auto;
	width: 56%; 
	padding-left: 15px;
	overflow:hidden;
}
#editprof .form input[type="text"],.form input[type="password"]{
	width: 90%; height: 27px;
	font-size: 17px;
	border: none;
	margin-bottom: 5px;
	border-radius: 4px;
	background-color: #fff; color:#333;
	padding-left: 10px;
}
#editprof .form .pic {
	width: 92%; height: 30px;
	font-size: 18px;
	border: none;
	margin-bottom: 5px;
	border-radius: 4px;
	background-color: #fff;
	padding-left: 5px;
}
#editprof .form .pic:active, .form .pic:focus{
	border: none; background:#fff;
}
#editprof .form input[type="submit"] {
	float:right;
	color: white;
	background-color: darkgreen;
	border: none;
	padding: 5px 10px;
	font-size: 18px;
	border-radius: 4px;
	border: 1px solid lightgreen;
	margin: 7px 28px 7px 0%;
	cursor: pointer;
}
.checkoutdiv label, .checkoutdiv .inform{
	font-size: 16px;
	color: #eee;
}
.checkoutdiv label a {
	color: #00f6ff;
}
#checkedout {
	padding: 6px;
}
</style>
<!--<img id="myImg" src="08_002.jpg" alt="Trolltunga, Norway" width="300" height="200" onclick="onClick(this)">
<img id="myImg" src="gtr.jpg" alt="Nissan Gtr" width="300" height="200" onclick="onClick(this)">-->

<!-- The Modal -->
<div id="editprof" class="modaledit checkoutdiv">
  <div class="modal-contentedit">
		
		<header class="" style=""><meta http-equiv="Content-Type" content="text/html; charset=utf-8"> 
		<span class="cls" title="close" id="close">&#x2715;</span>
        <div class="h2" style="font-size:25px;margin-left:10px;"> Your items will be delivered </div>
		</header>
		<div class="form">
		<form  method="post" action="JavaScript:Void();" name="addroom" onsubmit="submitcheckout(this)">
		<div id="this">Name:<br>
		<input type="text" name="name" value="<?=user_details('name');?>" placeholder="Your name" required>
		<br>
		email:<br>
		<input type="text" name="email" value="<?=user_details('email');?>" placeholder="Your email" required>
		<br>
		phone:<br>
		<input type="text" name="phone" value="<?=user_details('phone');?>" placeholder="phone number" required>
		<br>
		Location:<br>
		<input type="text" name="location" value="" placeholder="Your location" required>
		<br>
		
		<?php if(!isset($_SESSION['proj4'])){ ?>
		<label><input type="checkbox" name="create-acc" value="1" onclick="show_create_acc(this);"> Create an account</br>(you will be able to view your orders).</label>
		<div class="inform"></br>Has account? <a href="accounts.php">first login here</a></div>
		<?php } ?>
		<div class="create-acc"></div>
		
		</div>
		<input type="submit" name="edit" value="Place Order">
		</form>
		</div> 
		<div id="checkedout" style="margin-left:2%;text-align:center;"></div>
		<!--<footer class="">
		<div id="caption">caption</div>
		</footer>-->
		
		<!--
		<div id="myModal" class="modal">
		<div class="modal-content">
		<span class="close" id="close">&times;</span>
		<img class="" id="img01">
		<div id="caption"></div>
		</div></div>
		-->
  
  </div>
</div>

<script>
	//new in multivendor
	var c_a = document.querySelector('.checkoutdiv .create-acc');
	var c_a_bool = false; //create account bool
	function show_create_acc(el){
		if(submit_btn.value != 'Place Order') return false; //check if submit btn is clicked
		var html = '<input type="text" name="username" value="" placeholder="Username" required>'+
				'<input type="password" name="password" value="" placeholder="Password" required>';
		if(el.checked){
			c_a.innerHTML = html;
			c_a_bool = true;
		} else {
			c_a.innerHTML = '';
			c_a_bool = false;
		}
	}
	//submit button
	var submit_btn = document.querySelector('.checkoutdiv input[type="submit"]');
</script> 