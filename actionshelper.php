<?php
//echo $params['code'];
/*$data=$_POST['serialize']; echo unserializeForm($data);
function unserializeForm($data) {
    $returndata = array();
    $strArray = explode("&", $data);
    $i = 0;
    foreach ($strArray as $item) {
        $array = explode("=", $item);
        $returndata[$array[0]] = $array[1];
    }
    return $returndata['quantity'];
}*/
if(isset($_POST["action"], $_POST["code"], $_POST["quantity"])||(isset($_POST['serialize']))){
	
	session_start();
	require_once("dbcontroller.php");
	
	if(isset($_POST['serialize'])&&(!isset($_POST["action"], $_POST["code"], $_POST["quantity"]))){
	$params = array();
	parse_str($_POST['serialize'], $params);
	//echo $params['code'];
	$_POST["action"]='add';
	$_POST["code"] = $params['code'];
	$_POST["quantity"] = $params['quantity']; //echo $_POST["quantity"];
	}
	
	if(!empty($_POST["action"])) {
	switch($_POST["action"]) {
		case "add":
		if(!empty($_POST["quantity"])) {
			$productByCode = $db_handle->runQuery("SELECT * FROM tblproduct WHERE code='" . $_POST["code"] . "'");
			$itemArray = array($productByCode[0]["code"]=>array('name'=>$productByCode[0]["name"], 'code'=>$productByCode[0]["code"], 'quantity'=>$_POST["quantity"], 'price'=>$productByCode[0]["price"], 'vendor'=>$productByCode[0]["user"]));
			
			if(!empty($_SESSION["cart_item"])) {
				if(in_array($productByCode[0]["code"],array_keys($_SESSION["cart_item"]))) {
					foreach($_SESSION["cart_item"] as $k => $v) {
							if($productByCode[0]["code"] == $k) {
								if(empty($_SESSION["cart_item"][$k]["quantity"])) {
									$_SESSION["cart_item"][$k]["quantity"] = 0;
								}
								$_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];
							}
					}
				} else {
					$_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
				}
			} else {
				$_SESSION["cart_item"] = $itemArray;
			}
		echo "<div id='msg' class='red'>".$_POST["quantity"]." ".$productByCode[0]['name']." item added to cart &#x2714;</div>";
		} 
	break;
	case "remove":
		if(!empty($_SESSION["cart_item"])) {
			foreach($_SESSION["cart_item"] as $k => $v) {
					if($_POST["code"] == $k)
						unset($_SESSION["cart_item"][$k]);				
					if(empty($_SESSION["cart_item"]))
						unset($_SESSION["cart_item"]);
			}
		}
	break;
	case "empty":
		unset($_SESSION["cart_item"]);
	break;	
	}
 } //echo 'hey-'.' '.$_POST["action"].' '.$_POST["code"].' '.$_POST["quantity"];
}
?>