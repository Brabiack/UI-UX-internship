<style>
/*#myImg {
    border-radius: 5px;
    cursor: pointer;
    transition: 0.3s;
}*/
#myImg:hover {opacity: 0.8;}
/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 990; /* Sit on top */
    padding-top: 30px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(5, 56, 68, 0.68);/*rgba(5, 56, 68, 0.9);*/ /* Black w/ opacity */ /*rgba(0,0,0,0.9); original*/
}
/* Modal Content (image) */
.modal-content {
	position: relative;
    background-color: #fefefe;
    padding: 0;
    margin: 0 auto;
    width: 80%;
    max-width: 700px;
	box-shadow: 0 2px 5px 0 rgba(0,0,0,0.16),0 2px 10px 0 rgba(0,0,0,0.12);
}
.modal-content img {
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
.modal-content, #caption {    
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
.close {
	float: right;
    color: #333; /*#f1f1f1;*/
	margin-right:10px;
    font-size: 24px;
    font-weight: bold;
    transition: 0.3s;
}
.close:hover, .close:focus {
    color: red; /*#bbb*/
    text-decoration: none;
    cursor: pointer;
}
/* 100% Image Width on Smaller Screens */
@media only screen and (max-width: 700px){
    .modal-content  {
        width: 100%;
    }
}
.modal header,footer{background:#fff;padding:3px 6px;}

.my::-moz-selection { /*Firefox */
    background: none;
}
.my::selection {
    background: none;
}
.cart header, .cart footer, .cart .modal-content{ border-radius:15px; }
.recheck-trans{ margin:10px auto;}
</style>
<!--<img id="myImg" src="08_002.jpg" alt="Trolltunga, Norway" width="300" height="200" onclick="onClick(this)">
<img id="myImg" src="gtr.jpg" alt="Nissan Gtr" width="300" height="200" onclick="onClick(this)">-->

<!-- The Modal -->
<div id="myModal" class="modal cart">
  <div class="modal-content">
  
        <header class="" style=""><meta http-equiv="Content-Type" content="text/html; charset=utf-8"> 
		<span class="close" id="close" title="close">&#x2715;</span><!-- &#x2715; b- &#x2716;-->
        <div class="h2" style="font-size:25px;margin-left:10px;"><?php echo 'cart';?><!--Modal Header--></div>
		</header>
		
		<!--<div class="container"><img class="" id="img01"></div>-->
		<div id="shopping-cart">
		<!--<div class="txt-heading">Shopping Cart--> <!--<a id="btnEmpty" href="?action=empty&display=cart">Empty Cart</a>-->
		<?php //echo "<a id='btnEmpty' href=\"?action=empty&display=cart\" title='empty your cart' onClick=\"return confirm
				//('Are you sure you want to empty all your cart items?')\">Empty Cart</a>"; ?><!--</div>-->
		<?php
		//if(isset($_SESSION["cart_item"])){
		//$item_total = 0;
		?>	
		<!--<table cellpadding="10" cellspacing="1">
		<tbody>
			<tr>
			<th style="text-align:left;"><strong>Name</strong></th>
			<th style="text-align:left;"><strong>Code</strong></th>
			<th style="text-align:right;"><strong>Quantity</strong></th>
			<th style="text-align:right;"><strong>Price</strong></th>
			<th style="text-align:center;"><strong>Action</strong></th>
			</tr>-->
		<?php //foreach ($_SESSION["cart_item"] as $item){ ?>
			<!--<tr>
			<td style="text-align:left;border-bottom:#F0F0F0 1px solid;"><strong><?php //echo $item["name"]; ?></strong></td>
			<td style="text-align:left;border-bottom:#F0F0F0 1px solid;"><?php //echo $item["code"]; ?></td>
			<td style="text-align:right;border-bottom:#F0F0F0 1px solid;"><?php //echo $item["quantity"]; ?></td>
			<td style="text-align:right;border-bottom:#F0F0F0 1px solid;"><?php //echo "$".$item["price"]; ?></td>
			<td style="text-align:center;border-bottom:#F0F0F0 1px solid;">-->
			
			<!--<a href="?action=remove&code=<?php //echo $item["code"]; ?>&display=cart"
			class="btnRemoveAction" data-original-title="<?php //echo $item["code"]; ?>">Remove Item</a>-->
			
			<!--<a href="JavaScript:Void(0);" class="btnRemoveAction" data="<?php //echo $item["code"]; ?>">Remove Item</a>
			
			</td>			
			</tr>-->
		<?php //$item_total += ($item["price"]*$item["quantity"]); } ?>
		<!--<tr>
		<td colspan="5" align=right><strong>Total:</strong> <?php //echo "$".$item_total; ?></td>
		</tr>
	</tbody>
	</table>-->		
	<?php //} ?>
	</div>
	<!--<center><img id="loader" src='include/__/_loader64.gif' style="display:none;height:40px;width:40px;"></center>-->
		
		<footer class="">
		<div id="caption">cart</div>
		</footer>
		
		<!--
		<div id="myModal" class="modal">
		<div class="modal-content">
		<span class="close" id="close">&times;</span>
		<img class="" id="img01">
		<div id="caption"></div>
		</div></div>
		-->
  <div id="alreadycheckedout" style="margin-left:2%;text-align:center;"></div>
  </div>
</div>
		<!--view my checkout form-->
		<?php //include("include/checkout.php");?>
		<div id="mycheckout"></div>

<script type="text/javascript" src="include/jquery.min.js"></script>
<script>
// Get the modal
function cart() {
  //document.getElementById("img01").src = element.src;
  //var captionText = document.getElementById("caption");
  //captionText.innerHTML = "caption"; //captionText.innerHTML = element.alt;
  document.getElementById("myModal").style.display = "block";
  
// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];
var modal = document.getElementById('myModal');
// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
	//this.style.display='none';
}
//var other = document.getElementsByTagName("div"); //document.getElementsByClassName("modal-content")[0];
//other.onclick = function() {
//    modal.style.display = "none";
//}
//var modal = document.getElementById('myModal');
window.onclick = function(event) {
    if (event.target == modal) {
        //modal.style.display = "none";
		}}
	
	/*load cart*/
	loadcart();
	
	/*load cart with loader*/
	//$('#loader').show();
    //var mytimeout = setTimeout(function(){ loadcart(); $('#loader').hide(); }, 1000);
}
//load cart helper
function loadcart() { //alert('hey');
		$.ajax({
			url:"include/carthelper.php",
			method:"POST",
			data:{},
			success:function(data){ //alert(data);
				 $('#shopping-cart').html(data);
			}
	    });
		//$('.modal-content').hide();
		$("#alreadycheckedout").empty(); //empty youve already checkedout
}
//remove from cart helper
function clicked(elem){ //alert('hi');
	//remove from cart helper
	//$(".btnRemoveAction").on("click",function(e){ alert('hi');  //var code = $(this).attr('data');
        //e.preventDefault();
        //var varFromPhp = $(this).attr("data");
		//var varFromPhp = $(this).data().id;
		var action = 'remove';
		var code = $(elem).attr('data');
        //alert(code);
        //ajax request....
		cartfunct(action, code)
    //});
}
function cartfunct(action, code){ //alert('hi');
		//var action = 'fetch_data';
		$.ajax({
			url:"include/actionshelper.php",
			method:"POST",
			data:{quantity:'noquantityhere', code:code, action:action},
			success:function(data){
				loadcart()
				//$('#shopping-cart').html(data);
			}
	    });
   }
   
function emptycart(){
	//alert('saveAndSubmit called !');
	var action = 'empty';
	$.ajax({
			url:"include/actionshelper.php",
			method:"POST",
			data:{code:'nocodehere', quantity:'noquantityhere', action:action},
			success:function(data){
				//alert(data);
				loadcart()
				//$('#shopping-cart').html(data);
			}
	    });
}

/*checkout helper*/
	var checkedout = false;
function checkout(){ //alert('hi');
	if(checkedout) { $('#alreadycheckedout').html("You've already checked out").css({"color": "#f50202"}); return; } //alreadycheckedout
    //checkedout = true; //.css("color", "red");

		$.ajax({
			url:"include/checkout.php",
			method:"POST",
			data:{},
			success:function(data){
				//alert(data);
				 $('#mycheckout').html(data);
				  
				  document.getElementById("editprof").style.display = "block";
				  var x = document.getElementsByClassName("cls")[0];
				  var m = document.getElementById('editprof');
				  //x.onclick = function() { document.querySelector(".modaledit").classList.toggle('hide'); }
				  x.onclick = function() { m.style.display = "none"; }
				  window.onclick = function(event) { if (event.target == m) { /*m.style.display = "none";*/ }}
				 //$('#this').hide(); //document.getElementById("this").style.display = "none";
			}
	    });
		//$('.modal-content').hide();
}

/*submit checkout*/
//mpesa vars
var _m_id = '';
var the_url = 'products.php';
function submitcheckout(checkoutform){ //alert('hi');
		//alert(submit_btn.value); return;
		submit_btn.value = 'Please wait...';
		//event.preventDefault();
		var err = false;
		var mydata = $(checkoutform).serialize(); //alert(mydata);
		
		//validate phone
		var phone = checkoutform.phone; //alert(phone.value);
        //var _search = /\w/g.test(phone.value); //regex test any word and return bool
        var _has_nondigit = /[^+\d]+/g.test(phone.value); //regex test any word and return bool //match any non digit and dont match +
		if(_has_nondigit) {
		    $('#checkedout').html('Invalid phone number!').css({"color": "#ff2626"});
		    submit_btn.value = 'try again';
		    return false;
		} //return false;
		
		//alert(theamount);
		pay_form = checkoutform.parentNode.parentNode;

		 //return false;
		//my ajax.
	   		$.ajax({
			//url: $('#form1').attr('action'),
			url:"include/checkouthelper.php",
			method:"POST",
			data:{serialize:mydata},
			success:function(data){
				//alert(data);	//loadcart()
				if(data != 'Checked out successfull') err = true;
				if(err){
					$('#checkedout').html(data).css({"color": "#ff2626"});
				} else {
				    $('#checkedout').html('Payment stage..');
					//mpesa pay
                    $.ajax({
                        url:the_url,
                        method: "POST",
                        data: {thephone:phone.value, theamount:theamount, init_mpesa_pay:true, merchant_id:_m_id},
                        success: function (data2) {
                            handle_response(data2);
                        }
                    });
                    //$('#checkedout').html(data).css({"color": "#168d0a"});
				}
                
			}
	    });
	//var code = $(myelem).find('#code').val(); alert(code);
	//var quantity = $(myelem).find('#quantity').val(); 
	//var mydata = 'code1='+ code + '&quantity1='+ quantity; //access in php $name2=$_POST['code1'];
}

//finalize checkout
function finalize_checkout(){ alert('finalize'); return false;
    submit_btn.value = err ? 'Error.. Submit' : 'Done ✔';
	if(err) return false;
	//finalize
	var mytimeout = setTimeout(function(){ $("#editprof").fadeOut(1000); }, 1000);
	emptycart();
	var mytimeout1 = setTimeout(function(){ $("#myModal").fadeOut(1000); }, 500);
		//checkedout = true;
	if(c_a_bool){ //if account create is true
		var mytimeout2 = setTimeout(function(){ 
		document.location.reload(true); //reload page if new account was created
		}, 4000);
			
	}
}

</script>

<script>
	//handle_response
	var recheck_btn_inserted = false;
	function handle_response(data){
		//var response = this.responseText; //or
		//var response = evt.target.responseText;
		//var response_obj = isJSON_x(response);
		var response_obj = isJSON_x(data);
		//intervalManager(true, 6000);
		//check for key in json object
		if(typeof response_obj.m_id != "undefined"){ //if exists
			//set time out to check payment status
			_m_id = response_obj.m_id; //other responses returned will not include m_id, only(init trans req) -- reserve this - to be used to recheck payment
			var t = setTimeout(function(){ check_status(); }, 15000); //15 secs
		}
		//if no payment details received, show button to recheck payment
		if(response_obj.res_code == '9999'){
			if(!recheck_btn_inserted){
			pay_form.insertAdjacentHTML( 'beforeend', '<input type="submit" class="recheck-trans" value="re-check payment">' );
			pay_form.querySelector('.recheck-trans').addEventListener("click", check_status, false);
			}
			recheck_btn_inserted = true;
			//pay_form.querySelector('.recheck-trans').addEventListener("click", function(e, _m_id){check_status(_m_id);}, false);
			//pay_form.querySelector('.recheck-trans').addEventListener("click", check_status, false);
			if(recheck_btn_inserted){ pay_form.querySelector('.recheck-trans').style.display = 'block'; }
		}
		if(response_obj.res_code == '01'){ //success
			var book_finalize = '';
			//window.location = url+"//";
			window.open(book_finalize, "_self", "", true); 
			pay_form.querySelector('#checkedout').innerHTML = ''+response_obj.res_msg;
			pay_form.querySelector('#checkedout').classList.add('success'); return;
			finalize_checkout();
		}
		//alert(response_obj.res_msg);
		pay_form.querySelector('#checkedout').innerHTML = ''+response_obj.res_msg;
		//pay_form.querySelector('.res').classList.remove('success');
		//setup err msg class
		if(response_obj.res_code == '0'){
			pay_form.querySelector('#checkedout').classList.remove('success');
			pay_form.querySelector('#checkedout').classList.remove('red');
			if(recheck_btn_inserted){ pay_form.querySelector('.recheck-trans').style.display = 'none'; }
		} else {
			pay_form.querySelector('#checkedout').classList.add('red');
		}
	}
	function handle_response_1(evt){
	    handle_response(evt.target.responseText);
	}
	
	//check transaction status
	function check_status(){
		//var formdata = new FormData();
		//formdata.append("upload_img", file); //to use as isset(upload_img) in php
		var ajax = new XMLHttpRequest();
		//ajax.upload.addEventListener("progress", progressHandler, false);
		ajax.addEventListener("load", handle_response_1, false); //success upload; //true(capturing) false(bubbling)
		ajax.addEventListener("error", function (evt){ alert('error, try again') }, false);
		ajax.addEventListener("abort", function (evt){ alert('error, try again') }, false);
		ajax.open("POST", the_url); //url
		//ajax.send(formdata);
		ajax.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
		ajax.send("the_m_id="+_m_id+"&trans_status_db=true"); //post data access $_POST['thephone'], $_POST['theamount']
	}
	
	//helpers
	//interval manager
	function intervalManager(flag, time) {
		if(flag)
			intervalID = setInterval(function(){ check_status() }, time) //interval to recheck msgs
		else
			clearInterval(intervalID);
	}
	
	//check if data is json - helper
	function isJSON_x(str) {
		try {//return (JSON.parse(str) && !!str);
			return JSON.parse(str);
		} catch (e) {
			return false;
		}
	}
</script>
