<style>
#cssmenu, #cssmenu ul, #cssmenu li, #cssmenu a {
  margin: 0;
  padding: 0;
  border: 0;
  list-style: none;
  font-weight: normal;
  text-decoration: none;
  line-height: 1;
  font-family: 'Lato', sans-serif;
  font-size: 14px;
  position: relative;
}
#cssmenu a {
  line-height: 1.3;
  padding: 6px 15px;
}
#cssmenu {
	width: 100%;
	text-transform: capitalize;
}
#cssmenu > ul > li {
  cursor: pointer;
  background: #000;
  border-bottom: 1px solid #4c4e53;
}
#cssmenu > ul > li:last-child {
  border-bottom: 1px solid #3e3d3c;
}
#cssmenu > ul > li > a {
  font-size: 13px;
  display: block;
  color: #fff;
  text-shadow: 0 1px 1px #000;
  background: #64676e;
  background: -moz-linear-gradient(#64676e 0%, #4c4e53 100%);
  background: -webkit-gradient(linear, left top, left bottom, color-stop(0%, #64676e), color-stop(100%, #4c4e53));
  background: -webkit-linear-gradient(#64676e 0%, #4c4e53 100%);
  background: linear-gradient(#64676e 0%, #4c4e53 100%);
}
#cssmenu > ul > li > a:hover {
  text-decoration: none;
}
#cssmenu li a:hover {
	background: #1f9eb3;
	color: #fff;
}
#cssmenu > ul > li.active {
  border-bottom: none;
}
#cssmenu > ul > li.active > a {
  background: #6aadf1; /*#97c700*/
  /*background: -moz-linear-gradient(#97c700 0%, #709400 100%);
  background: -webkit-gradient(linear, left top, left bottom, color-stop(0%, #97c700), color-stop(100%, #709400));
  background: -webkit-linear-gradient(#97c700 0%, #709400 100%);
  background: linear-gradient(#97c700 0%, #709400 100%);*/
  color: #4e5800;
  text-shadow: 0 1px 1px #709400;
}
#cssmenu > ul > li.has-sub > a:after {
  content: "";
  position: absolute;
  top: 10px;
  right: 10px;
  border: 5px solid transparent;
  border-left: 5px solid #fff;
}
#cssmenu > ul > li.has-sub.active > a:after {
  right: 14px;
  top: 12px;
  border: 5px solid transparent;
  border-top: 5px solid #4e5800;
}
/* Sub menu */
#cssmenu ul ul {
  padding: 0;
  display: none;
}
#cssmenu ul ul a {
  background: #efefef;
  display: block;
  color: #333;
  font-size: 13px;
  padding-left: 10%;
}
#cssmenu ul ul li {
  border-bottom: 1px solid #c9c9c9;
}
#cssmenu ul ul li.odd a {
  background: #e5e5e5;
}
#cssmenu ul ul li:last-child {
  border: none;
}
#cssmenu > ul > li.has-sub > a::after {
	content: "";
	position: absolute;
	top: 10px;
	right: 10px;
	border: 5px solid transparent;
	border-left: 5px solid #fff;
}
</style>

<?php
function loop_array($array = array(), $myconn, $parent_id = 0){
	if(!empty($array[$parent_id])){ echo '<ul id="cssmenu" class="/*mbmcpebul_menulist*/ css_menu">';
	foreach($array[$parent_id] as $items){ 
	//dropdown icon helper
	echo "<li class='".dropdownhelper($myconn, $items['id'])."'>";
	//echo $items['name'];
	
	echo '<a href="JavaScript:Void();" class="category" data-original-title="'.$items['name'].'">'.$items['name'].'</a>';
	//echo '<a href="JavaScript:Void();" class="category" data-original-title="category1 1">'.$items['name'].'</a>';
	//echo '<a href=?view='.$items['name'].' data='.$items['name'].'>'.$items['name'].'</a>'; 
	//echo '<a href="'.$items['link'].'">'.$items['name'].'</a>';
	
	//echo "<a href=\"?index=$viewall[myotherid]\">View</a>";
	loop_array($array, $myconn, $items['id']);
	echo '</li>'; 
	}
	echo '</ul>'; }
}
function displaymenu($myconn) {
		   $array = array();
           $query = "SELECT * FROM menu"; //ORDER BY menu_order ASC
           $result = mysqli_query($myconn, $query);
           while($row = mysqli_fetch_assoc($result)) {
			   //$array[] = $row;
			   $array[$row['parent_id']][] = $row;
			   }
		   loop_array($array, $myconn);
		   //return $array;
}
//dropdown icon helper
function dropdownhelper($myconn, $items) {
	$sql   = "SELECT * FROM menu WHERE parent_id='".$items."'"; $result=mysqli_query($myconn,$sql);
	$count = mysqli_num_rows($result);
	if($count=="0"){ return false; }
	return 'has-sub';
}
?>

<div id="cssmenu">
  <!--<a class="active" href="http://#">Home</a>-->
  <?php displaymenu($db_handle->conn); ?>
</div><br><br>

	<!--<div id="cssmenu">
	<ul id="cssmenu">
	<li class="active"><a href="">Home</a></li>
	<li class="has-sub"><a href="">Menus</a>
		<ul>
		<li class=""><a href="#">Menu 1</a></li>--><!--odd-->
		<!--<li class=""><a href="#">Menu 2</a></li>--><!--odd-->
		<!--</ul>
	</li>
	<li><a href="#">Settings</a></li>
	<li class="has-sub"><a href="#">Contact</a>--><!--even-->
		<!--<ul>
		<li class=""><a href="#">Menu 1</a></li>
		<li class=""><a href="#">Menu 1</a></li>
		<li class=""><a href="index.php">Menu 1</a></li>
		</ul>
	</li>
	<li><a href="#">Settings2</a></li>
	</ul>
	</div>-->
<script type="text/javascript" src="include/jquery.min.js"></script>
<script>
$(document).ready(function(){

//$('#cssmenu ul ul li:odd').addClass('odd');
//$('#cssmenu ul ul li:even').addClass('even');
$('#cssmenu > ul > li > a').click(function() { //$('#cssmenu > ul > li > a').click(function() {
  $('#cssmenu li').removeClass('active');
  $(this).closest('li').addClass('active');	
  var checkElement = $(this).next();
  if((checkElement.is('ul')) && (checkElement.is(':visible'))) {
    $(this).closest('li').removeClass('active');
    checkElement.slideUp('normal');
  }
  if((checkElement.is('ul')) && (!checkElement.is(':visible'))) {
    //$('#cssmenu ul ul:visible').slideUp('fast'); //on open another, close the previous open menu
    checkElement.slideDown('normal');
  }
  if($(this).closest('li').find('ul').children().length == 0) {
    return true;
  } else {
    return false;	
  }		
});
	//alert('varFromPhp')
});
</script>