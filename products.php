<?php 

	include('includes/header.php');
	include('core/init.php');

?>

<?php 
	$sql = "SELECT * FROM products WHERE featured = 0 AND deleted = 0 AND beauty_regime = 0";
	$products = $db->query($sql);
?>
	
   <div id="about" class="view" style="height: 50%;background: url('img/ban.JPG')no-repeat center center fixed;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
    padding: 20em 2em">
      <div class="mask rgba-black-strong">
        <div class="container-fluid d-flex align-items-center justify-content-center h-100">
          <div class="row d-flex justify-content-center text-center">
            <div class="col-md-10">
              <a href=""><img src="img/Logo.png" class="img-fluid" style="width: 400px;"></a>
              <hr class="hr-light">
              <h4 class="white-text my-4 h1-responsive" style="font-family: 'Cookie', cursive;">All Products</h4>
            </div>
          </div>
        </div>
      </div>
    </div>
	<!--Products Display-->
	<div class="container-fluid">
		<h2 class="text-center h2-responsive px-2 py-3" style="font-family: 'Righteous';color: #6b5523;"><b>Products by Khadi Premium Cosmetics</b></h2>
		<div class="filters row">
			<h4 class="h4-responsive text-justify col-md-3">Categories </h4>
			<table>
				<?php getCategoryFilter(); ?>
			</table>
		</div>
		<section class="text-center my-5">
			<form action="" method="post">
				<input type="radio" name="priceorder" value="lowToHigh">Low to High
				<input type="radio" name="priceorder" value="highToLow">High to Low
				
				<button type="submit" name="search" class="btn btn-default">Search</button>
				
			</form>

			<?php 
				if(isset($_POST['priceorder']) && !empty($_POST['priceorder'])){
					if ($_POST['priceorder'] == 'lowToHigh'){
						$sql .= " ORDER BY price ASC";
						$products = $db->query($sql);
					} 

					if ($_POST['priceorder'] == 'highToLow'){
						$sql .= " ORDER BY price DESC";
						$products = $db->query($sql);
					} 
				}
			?>
			<div class="row">	
				<?php getProducts(); ?>
		      	<?php getFilteredCategories(); ?>
			</div>
		</section>
	</div>

<?php include('includes/footer.php');?>