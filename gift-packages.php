<?php 

	include('includes/header.php');
	include('core/init.php');

?>
	
   <div id="about" class="view" style="height: 50%;background: url('img/ban.webp')no-repeat center center fixed;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
    padding: 20em 2em">
      <div class="mask rgba-black-strong">
        <div class="container-fluid d-flex align-items-center justify-content-center h-100">
          <div class="row d-flex justify-content-center text-center">
            <div class="col-md-10">
              <h2 class="text-center text-white h2-responsive px-2 py-3" style="font-family: 'Righteous';line-height: 1.4em"><b>Gift Packages by Khadi Premium Cosmetics</b></h2>
              <hr class="hr-light" style="width: 150px;border:1px solid #fff;">
            </div>
          </div>
        </div>
      </div>
    </div>
	<!--Products Display-->
	<div class="container-fluid">
    <div class="py-4">
  		<div class="row">	
  			<?php getGiftPackages(); ?>
  		</div>
  	</div>
  </div>

<?php include('includes/footer.php');?>