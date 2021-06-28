<?php
	//mpesa
	if(isset($_POST['init_mpesa_pay'])){ //init
        session_start();
        require_once("include/dbcontroller.php");
        require_once("include/_mpesa_helper.php");
        exit;
    }
	if(isset($_GET['callback_data']) && $_GET['callback_data']=='true'){ //mpesa feedback
	    //session_start();
        require_once("include/dbcontroller.php");
        require_once("include/_mpesa_helper.php");
	    exit;
	}
    if(isset($_POST['trans_status_db']) && $_POST['trans_status_db']=='true'){ //check status
	    session_start();
        require_once("include/dbcontroller.php");
        require_once("include/_mpesa_helper.php");
	    exit;
	}
?>

<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>eMaasai</title>
	<link rel="stylesheet" type="text/css" href="css/style.css" />
	<link href="css/style1.css" type="text/css" rel="stylesheet" />
</head>
<style></style>
<?php ob_start();
	session_start(); 
	require_once("include/dbcontroller.php");
?>
<?php
	include("./include/header.php");
	//dev
	//_arr($_SESSION["cart_item"]);
	//$vendor = array_keys(array_flip(array_column($_SESSION["cart_item"], 'vendor'))); _arr($vendor);
	//$vendors = "'".implode("','",$vendor)."'"; echo $vendors;
	//echo $vendors = "'".implode("','",array_keys(array_flip(array_column($_SESSION["cart_item"], 'vendor'))))."'";
?>
<body>
<div class="section group">
    <div class="col span_1_of_3 a">
	<div class="txt-heading">Categories <span><a class="active" href="products.php">all products</a></span></div>
	<?php include("./include/categories.php"); ?>
	
	</div>
    <div class="col span_1_of_3 b">
	<?php //include("layout.php"); ?>

<!--products-->
<?php include("./include/cart.php"); ?>
<div id="product-grid">
	<div class="txt-heading">Products<span id="addedtocart"></span></div>
	<div id="products">
	<?php
	$product_array = $db_handle->runQuery("SELECT * FROM tblproduct ORDER BY id DESC"); //SELECT * FROM tblproduct ORDER BY id ASC
	if (!empty($product_array)) {
		foreach($product_array as $key=>$value){
	?>
		<div class="product-item"><!--"JavaScript:Void(0);" onclick='xeditP()'-->
			<!--<form method="post" action="?action=add&code=<?php //echo $product_array[$key]["code"]; ?>" id="form1">-->
			<form method="post" action="JavaScript:Void(0);" id="form1" onsubmit="addtocart(this)">
			<div id="sidebarhelper" style="margin:0;" onclick="sidebar(this)">
			<div class="product-image"><img src="<?php echo $product_array[$key]["image"]; ?>"></div>
			<div class="product-title"><strong><?php echo $product_array[$key]["name"]; ?></strong></div>
			<div class="product-price"><?php echo curr($product_array[$key]["price"]).'.00'; ?></div>
			
			<div id="mydata" 
			myimage="<?php echo $product_array[$key]["image"]; ?>" 
			myname="<?php echo $product_array[$key]["name"]; ?>" 
			myprice="<?php echo curr($product_array[$key]["price"]).'.00'; ?>" 
			mydescr="<?php echo $product_array[$key]["description"]; ?>" 
			mydcode="<?php echo $product_array[$key]["code"]; ?>" 
			style="display:none;">
			</div>
			
			</div>
			<div>
			<input type="hidden" id="code" name="code" value="<?php echo $product_array[$key]["code"]; ?>"/>
			<input type="text" id="quantity" name="quantity" value="1" size="2" />
			<input type="submit" value="Add to cart" class="btnAddAction" />
			</div>
			</form>
		</div>
	<?php }} ?>
	</div>
</div>
	
	<div id="mycontx"></div>
	</div>
    <div class="col span_1_of_3 c">
	<div class="txt-heading">single product info</div>
	
	<div id="sidebar"></div>
	
	</div>
</div>
<script type="text/javascript" src="include/jquery.min.js"></script>
<script>
$(document).ready(function(){
 //view product categories helper
    $(".category").on("click",function(e){
        //e.preventDefault();
        //var varFromPhp = $(this).attr("data");
		//var varFromPhp = $(this).data().id;
		var varFromPhp = $(this).data('original-title');
        //alert(varFromPhp);
        //ajax request....
		$('#products').html('loading...');
		view(varFromPhp)
    });
	function view(varFromPhp){ //alert('hi');
		//var action = 'fetch_data';
		$.ajax({
			url:"include/view.php",
			method:"POST",
			data:{thedata:varFromPhp},
			success:function(data)
			{
				//alert(data);
				 $('#products').html(data);
				 $("#addedtocart").text(" > " + varFromPhp); //html() allows adding div
			}
	    });
		//alert(varFromPhp);
   }
   
   //add to cart helper
	//$(".bbbbtnAddActionnnn").on("click",function(e){ //alert('hi');  //var code = $(this).attr('data');
        //e.preventDefault(); //var varFromPhp = $(this).attr("data");
		//var action = 'add'; var code = $(elem).attr('data');
        //ajax request....
			//var code = $("#code").val(); //var quantity = $("#quantity").val();
			//var dataString = 'code1='+ code + '&quantity1='+ quantity; //php $name2=$_POST['name1'];
		//var mydata = $("#form1").serialize(); //alert(mydata);
		//$.ajax({
			//url:"include/actionshelper.php",
			//url: $('#form1').attr('action'),
			//method:"POST",
			//data:{serialize:mydata},
			//success:function(data)
			//{
				//alert(data);
				//loadcart()
				//$('#products').append(data);
			//}
	    //}); 	//ajax close
    //}); 		//close onclick

});

function addtocart(myelem) { //alert('heeeeeey');
		//event.preventDefault();
			//var code = $("#code").val(); var quantity = $("#quantity").val(); //alert(quantity);			
			//var mydata = 'code1='+ code + '&quantity1='+ quantity; //access in php $name2=$_POST['code1'];
	   var mydata = $(myelem).serialize(); //alert(mydata);
	   //my ajax.
	   		$.ajax({
			//url: $('#form1').attr('action'),
			url:"include/actionshelper.php",
			method:"POST",
			data:{serialize:mydata},
			success:function(data)
			{
				//alert(data);
				//loadcart()
				$('#addedtocart').html(data);
			}
	    });
	//var code = $(myelem).find('#code').val(); alert(code);
	//var quantity = $(myelem).find('#quantity').val(); 
}

/*sidebar helper*/
function sidebar(param) {
	//alert('sidebar'); //$(param).find('#bar').hide();	
    //alert($(param).find('#mydata').attr("myname"));
	
	var myimage = $(param).find('#mydata').attr("myimage");
	var myname = $(param).find('#mydata').attr("myname");
	var myprice = $(param).find('#mydata').attr("myprice");
	var mydescr = $(param).find('#mydata').attr("mydescr");
	var mydcode = $(param).find('#mydata').attr("mydcode");
	
	//$('#addedtocart').html(data);
	
	$('#sidebar').html("<img class='sideimage' src = " +myimage+ ">"+
	//"<div class='sidename'>" +myname+ "</div>"+
	//"<div class='sideprice'>" +myprice+ "</div>"+
	//"<div class='sidedescr'>" +mydescr+ "</div>"+
	"<table width='100%' border='0' cellspacing='1' cellpadding='2' style='clear:both;float:left;text-align:left;margin-bottom:10px;'>"+
	"<tr><td id='h' width='50'>Name: </td><td>" +myname+ "</td></tr>"+
	"<tr><td id='h' width='50'>Price: </td><td>" +myprice+ "</td></tr>"+
	"<tr><td id='h' width='50'>Description: </td><td>" +mydescr+ "</td></tr></table>"+
	//myform
	"<form method='post' action='JavaScript:Void(0);' id='form1' onsubmit='addtocart(this)'>"+
	"<div><input type='hidden' id='code' name='code' value=" +mydcode+ ">"+
	"<input type='text' id='quantity' name='quantity' value='1' size='11'>"+
	"<input type='submit' value='Add to cart' class='btnAddAction' /></div>"+
	"</form>");
	//var mythis = param.attr("data");  //jquery
	//var mythis = param.getAttribute("data"); alert(mythis); //js
    //param.innerHTML = param.attr("data"); //param.innerHTML = mythis;  
    //$(param).$('#bar').hide();
    //var myserialize= param.serialize()
    //alert(myserialize);
}
</script>
</body>
</html>