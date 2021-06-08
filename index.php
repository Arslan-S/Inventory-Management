<html>
	<head>
		<link rel="stylesheet" href="styles.css">
	</head>

	<body>
		<h1 class="white-text center"> Inventory Management </h1>

		<a href="stores.php" class="white-text"> Stores to be managed </a> <br>

		<?php
			include "db_connect.php";
		?>
		<div class="leftbox">
			<h2 class="center">Simple Searches</h2>
			<form action="search_item_num.php">
				Please enter an item number to search for:<br>
				<input type="text" name="item_num" placeholder="Ex: 1089">

				<input type="submit" value="Submit">
			</form><hr>

			<form action="search_item_name.php">
				Please enter an item name to search for:<br>
				<input type="text" name="item_name" placeholder="Ex: Canned Tuna">

				<input type="submit" value="Submit">
			</form><hr>

			<form action="search_quantity.php" method="post">
				Please enter a specific quantity to search for:<br>

				<label for="qty">Choose % of quantity:</label>

				<select name="qty">
				<option value="nothing"></option>
				<option value="100">100%</option>
				<option value="75">75%</option>
				<option value="50">50%</option>
				<option value="25">25%</option>
				</select>

				<label for="compare">Choose:</label>
				<select name="compare">
				<option value="nothing"></option>
				<option value="equal">equal</option>
				<option value="less">less than</option>
				<option value="more">greater than</option>
				</select>
				<input type="submit" value="Submit">
			</form><hr>

			<form action="search_item_price.php" method="post">
				Please enter a specific price to search for:
				<input type="text" name="price_input" placeholder="Ex: 2.99"><br>
				
				<label for="compare">Choose a comparison:</label>

				<select name="compare">
				<option value="nothing"></option>
				<option value="less">Less than</option>
				<option value="more">Greater than</option>
				</select>
				<input type="submit" value="Submit">
			</form><hr>

			<form action="search_delivery.php">
				Please enter (Y,N) to search for if an item needs delivery or not:<br>
				<input type="text" name="delivery" placeholder="Ex: Y">

				<input type="submit" value="Submit">
			</form><hr>

			<form action="search_demand.php">
				Please enter (Y,N) to search for if an item has good or bad demand:<br>
				<input type="text" name="demand" placeholder="Ex: N">

				<input type="submit" value="Submit">
			</form><hr>

			<form action="search_rating.php" method="post">
				Please enter a specific rating to search for:
				<input type="text" name="rating_input" placeholder="Ex: 3.3"><br>
				
				<label for="compare">Choose a comparison:</label>

				<select name="compare">
				<option value="nothing"></option>
				<option value="equal">Equal to</option>
				<option value="less">Less than</option>
				<option value="more">Greater than</option>
				</select>

				<input type="submit" value="Submit">
			</form><hr>

			<form action="search_item_type.php">
				Please enter an item type to search for:<br>
				<input type="text" name="item_type" placeholder="Ex: Dairy">

				<input type="submit" value="Submit">
			</form><hr>

			<form action="search_store_num.php">
				Please enter a store number to search for:<br>
				<input type="text" name="store_num" placeholder="Ex: 2">

				<input type="submit" value="Submit">
			</form><hr>

			<form action="search_order_num.php">
				Please enter an order number to search for:<br>
				<input type="text" name="order_num" placeholder="Ex: 1102">

				<input type="submit" value="Submit">
			</form>
		</div>
		<div class="rightbox">
			<h2 class="center"> Special Searches </h2>

			<form action="ss_inventory.php">                <!-- NEED TO GET DONE -->
				Inventory in store:<br>
				<input type="text" name="store_num" placeholder="Ex: 1">

				<input type="submit" value="Submit">
			</form><hr>

			<form action="ss_order_num_items.php">                <!-- NEED TO GET DONE -->
				Items ordered for order num:<br>
				<input type="text" name="order_num" placeholder="Ex: 2101">

				<input type="submit" value="Submit">
			</form><hr>

			<form action="ss_ratings.php" method="post">
				Please enter a store number:
				<input type="text" name="store" placeholder="Ex: 3"><br>
				
				<label for="compare">Choose (Y,N) to search for good or bad ratings:</label>

				<select name="compare">
				<option value="nothing"></option>
				<option value="Y">Y</option>
				<option value="N">N</option>
				</select>

				<input type="submit" value="Submit">
			</form><hr>

			<form action="ss_delivery.php" method="post">
				Please enter a store number:
				<input type="text" name="store" placeholder="Ex: 1"><br>
				
				<label for="compare">Choose (Y,N) to search for items that need delivery or don't:</label>

				<select name="compare">
				<option value="nothing"></option>
				<option value="Y">Y</option>
				<option value="N">N</option>
				</select>

				<input type="submit" value="Submit">
			</form><hr>

			<form action="ss_item_type_str.php" method="post">
				Please enter a store number:
				<input type="text" name="store" placeholder="Ex: 2"><br>
				
				<label for="type">Choose an item type to search for:</label>

				<select name="type">
				<option value="nothing"></option>
				<option value="Packaged Goods">Packaged Goods</option>
				<option value="Frozen Goods">Frozen Goods</option>
				<option value="Dairy">Dairy</option>
				<option value="Produce">Produce</option>
				<option value="Meat">Meat</option>
				<option value="Cleaning Supplies">Cleaning Supplies</option>
				<option value="Canned Goods">Canned Goods</option>
				<option value="Alcohol">Alcohol</option>
				</select>

				<input type="submit" value="Submit">
			</form><hr>

			<form action="insert.php" method="post">
				Insert new item<br>
				<input type="text" name="num" placeholder="Ex: 1500"> Item Num<br>
				<input type="text" name="name" placeholder="Ex: Vodka"> Item Name<br>
				<input type="text" name="max" placeholder="Ex: 50"> Max Quantity<br>
				<input type="text" name="price" placeholder="Ex: 6.49"> Price<br>
				<input type="text" name="type" placeholder="Ex: Meat"> Item Type<br>
				
				<label for="store"></label>
				<select name="store">
				<option value="nothing"></option>
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
				<option value="all">All</option>
				</select>
				Store Selection<br>
				
				<input type="submit" value="Submit">
			</form><hr>
		</div>
		
		<?php
			$mysqli->close();
		?>

	</body>
</html>