<?php 
	require_once("Entities/product.class.php");
	require_once("Entities/category.class.php");
	
	if (isset($_POST['btnsubmit'])) {
		$producName=$_POST['txtName'];
		$cateID=$_POST['txtCateID'];
		$price=$_POST['txtprice'];
		$quantity=$_POST['txtquantity'];
		$description=$_POST['txtdesc'];
		
			$picture=$_FILES['txtpic'];
			echo $picture['name'];
		
		
		
		# code...
		//echo "<p>$producName $cateID $price $quantity $description $picture<p>";
		$newProduct= new Product($producName,$cateID,$price,$quantity,$description,$picture);

		$result= $newProduct->save();
		

		
	}
?>

<?php 
	include_once("header.php");
?>

<?php 
	if (isset($_GET["inserted"])) {
		echo "<h2>them san pham thanh cong </h2>";
		# code...
	}
?>

<form method="post" enctype ="multipart/form-data">
	<div class="row">
		<div class="lbltitle">
			<label>ten san pham</label>
		</div>
		<div class="lblinput">
			<input type="text" name="txtName" value="<?php echo isset($_POST["txtName"]) ? $_POST['txtName']:""; ?>"/>
		</div>
	</div>
	<div class="row">
		<div class="lbltitle">
			<label>mo ta san pham</label>
		</div>
		<div class="lblinput">
			<textarea name="txtdesc" cols="21" rows="10" value="<?php echo isset($_POST['txtdesc']) ? $_POST['txtdesc']:""; ?>"></textarea>
		</div>
	</div>
	<div class="row">
		<div class="lbltitle">
			<label>so luong san pham</label>
		</div>
		<div class="lblinput">
			<input type="text" name="txtquantity" value="<?php echo isset($_POST["txtquantity"]) ? $_POST['txtquantity']:""; ?>"/>
		</div>
	</div>
	<div class="row">
		<div class="lbltitle">
			<label>gia san pham</label>
		</div>
		<div class="lblinput">
			<input type="text" name="txtprice" value="<?php echo isset($_POST["txtprice"]) ? $_POST['txtprice']:""; ?>"/>
		</div>
	</div>
	<div class="row">
		<div class="lbltitle">
			<label>loai san pham</label>
		</div>
		<div class="lblinput">
			<select name="txtCateID"
			<option value=""selected>--chon loai--</option>
			
			<?php
				$cates=Category::list_category();
				foreach ($cates as $item){
					echo"<option value=".$item["CateID"].">".$item["CategoryName"]."</option>";
				}
				?>
				</select>
		</div>
	</div>
	<div class="row">
		<div class="lbltitle">
			<label>duong dan hinh</label>
		</div>
		<div class="lblinput">
			<input type="file" id="txtpic" name="txtpic" accept=".PNG,.GIF,.jpg">
		</div>
	</div>
	<div class="row">
		<dir class="submit">
			<input type="submit" name="btnsubmit" value="them san pham">
		</dir>
	</div>

</form>