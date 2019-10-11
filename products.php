<?php 

	include('includes/header.php');
	include('core/init.php');

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
		<div class="filters">
				<!--Navbar-->
				<nav class="navbar navbar-light light-blue lighten-4 my-3">
				  <!-- Navbar brand -->
				  <a class="navbar-brand" href="#">Categories</a>

				  <!-- Collapse button -->
				  <button class="navbar-toggler toggler-example" type="button" data-toggle="collapse" data-target="#navbarSupportedContent1"
				    aria-controls="navbarSupportedContent1" aria-expanded="false" aria-label="Toggle navigation"><span class="dark-blue-text"><i
				        class="fas fa-bars fa-1x"></i></span></button>

				  <!-- Collapsible content -->
				  <div class="collapse navbar-collapse" id="navbarSupportedContent1">

				    <!-- Links -->
				    <ul class='navbar-nav mr-auto'>
				    	<?php getCategoryFilter(); ?>
				    </ul>
				    <!-- Links -->

				  </div>
				  <!-- Collapsible content -->

				</nav>
				<!--/.Navbar-->
		</div>
		<div class="row">	
			<?php getProducts(); ?>
	      	<?php getFilteredCategories(); ?>
		</div>
	</div>

<?php include('includes/footer.php');?>