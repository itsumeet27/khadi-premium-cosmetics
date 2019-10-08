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
		<div class="filters row p-3">
			<div class="col-md-3">
				<h4 class="h4-responsive text-justify p-2">Categories </h4>
				<table>
					<?php getCategoryFilter(); ?>
				</table>
			</div>
		</div>
		<div class="row">	
			<?php getProducts(); ?>
	      	<?php getFilteredCategories(); ?>
		</div>
	</div>

<?php include('includes/footer.php');?>