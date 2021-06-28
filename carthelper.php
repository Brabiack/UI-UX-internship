<!--<div class="container"><img class="" id="img01"></div>-->
		<?php session_start(); ?>
		<div class="txt-heading">Shopping Cart <!--<a id="btnEmpty" href="?action=empty&display=cart">Empty Cart</a>-->
		<?php echo "<a id='btnEmpty' href='JavaScript:Void(0);' title='empty your cart' onClick=\"return confirm
				('Are you sure you want to empty all your cart items?') && emptycart()\">Empty Cart</a>"; ?>
		<!--<button onclick="confirm('Are you sure ?') && saveAndSubmit(event)">Button</button>-->		
		</div>
		<?php
		if(isset($_SESSION["cart_item"])){
		$item_total = 0;
		?>	
		<table cellpadding="10" cellspacing="1">
		<tbody>
			<tr>
			<th style="text-align:left;"><strong>Name</strong></th>
			<th style="text-align:left;"><strong>Code</strong></th>
			<th style="text-align:right;"><strong>Quantity</strong></th>
			<th style="text-align:right;"><strong>Price</strong></th>
			<th style="text-align:center;"><strong>Action</strong></th>
			</tr>	
		<?php foreach ($_SESSION["cart_item"] as $item){ ?>
			<tr>
			<td style="text-align:left;border-bottom:#F0F0F0 1px solid;"><strong><?php echo $item["name"]; ?></strong></td>
			<td style="text-align:left;border-bottom:#F0F0F0 1px solid;"><?php echo $item["code"]; ?></td>
			<td style="text-align:right;border-bottom:#F0F0F0 1px solid;"><?php echo $item["quantity"]; ?></td>
			<td style="text-align:right;border-bottom:#F0F0F0 1px solid;"><?php echo curr($item["price"]); ?></td>
			<td style="text-align:center;border-bottom:#F0F0F0 1px solid;">
			
			<!--<a href="?action=remove&code=<?php //echo $item["code"]; ?>&display=cart"
			class="btnRemoveAction" data-original-title="<?php //echo $item["code"]; ?>">Remove Item</a>-->
			
			<a href="JavaScript:Void(0);" onclick='clicked(this)' class="btnRemoveAction" data="<?php echo $item["code"]; ?>">Remove Item</a>
			
			</td>			
			</tr>
		<?php $item_total += ($item["price"]*$item["quantity"]); } ?>
		<tr>
		<td colspan="5" id="total" align=right><strong>Total:</strong> <?php echo curr($item_total).'.00'; ?></td>
		</tr>
		<script>var theamount = '<?=$item_total;?>'; </script>
			
	</tbody>
	</table>
	<button class="checkout" onclick='checkout()'>Checkout</button> 
	<?php } else { echo '<div style="margin-left:2%;">cart empty</div>';} ?>
	<?php
		//currency
		function curr($amount=''){
			return "KSh ".number_format($amount);
		}
	?>