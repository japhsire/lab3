<?php require_once("Entities/product.class.php"); ?>
<?php 
	include_once("header.php");
	$prods=Product::list_product();

	foreach ($prods as $item) {
			echo("<p>ten san pham ".$item["ProductName"]."</p>");
		}	
		include_once("footer.php");
?>