<?php include('core/init.php');?>

<!-- Blogs -->

<?php 
	function getIp() {
		//Get IP Address
	    $ip = $_SERVER['REMOTE_ADDR'];	 
	    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
	        $ip = $_SERVER['HTTP_CLIENT_IP'];
	    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
	        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
	    }	 
	    return $ip;
	}

	function getBlog(){
		global $db;
		$get_blog = "SELECT * FROM blog WHERE deleted = 0";
		$run_blog = mysqli_query($db, $get_blog);
		while ($row_blog = mysqli_fetch_array($run_blog)) {
			$blog_id = $row_blog['id'];
			$blog_title = $row_blog['title'];
			echo "<li style='padding: 0.5em;'><a href='posts.php?blog_id=$blog_id' style='color: #555;'>$blog_title</a></li>";
			
		}
	}
?>

<?php 
	//Category filter
	function getCategoryFilter(){
		global $db;
		$get_cat = "SELECT * FROM categories WHERE parent = 0";
		$run_cat = mysqli_query($db, $get_cat);

		while ($row_cat = mysqli_fetch_array($run_cat)) {
			$category_id = $row_cat['id'];
			$filter_category = $row_cat['category'];
			echo "<tr><td class='px-2 py-1'><a href='products.php?filter=$filter_category'>$filter_category</a></td></tr>";		
		}
	}

	function getFilteredCategories(){
		if(isset($_GET['filter'])){
			$filter = $_GET['filter'];
			global $db;
			$get_category = "SELECT * FROM products WHERE cat_name = '$filter' AND deleted = 0 and featured = 0";
			$run_category = mysqli_query($db, $get_category);
			while ($row_category = mysqli_fetch_array($run_category)) {
				$product_id = $row_category['id'];
				$product_image = $row_category['image'];
				$product_title = $row_category['title'];
				$product_weight = $row_category['weight'];
				$product_price = $row_category['price'];
				$product_short_desc = $row_category['short_desc'];
				$photos = explode(',',$product_image);

				echo 
					"
						<div class='col-lg-3 col-md-3 col-sm-6 col-xs-12 mb-lg-0 mb-4'>
							<div class='card card-cascade wider card-ecommerce'>
					            <div class='view zoom view-cascade overlay'>
					            	<img src='$photos[0]' class='card-img-top img-fluid' alt='$product_title'>
					              	<button onclick='detailsmodal($product_id)' style='background: none;border: none;cursor: pointer'>
					              		<div class='mask rgba-white-slight'></div>
					              	</button>
					            </div>
            					<div class='card-body card-body-cascade text-center'>
                  					<h5>
					                    <strong>
					                        <button onclick='detailsmodal($product_id)' style='background: none;border: none;cursor: pointer'><b>$product_title</b></button>
					                        <br>
					                            <span class='badge badge-pill my-2 z-depth-0' style='background-color: #6b5523'>&#8377; $product_price</span>
						                			&nbsp;&nbsp;&nbsp;
						                		<span class='badge badge-pill my-2 z-depth-0' style='background-color: #6b5523'>$product_weight</span>
					                        
					                    </strong>
					                </h5>
                  					<h6 class=''>$product_short_desc</h6>
              					</div>
              					<div class='card-footer px-1 px-3 py-3' style='background: #f1e1b3'>
				                    <span class='float-left'>
							    		<button onclick='detailsmodal($product_id)' style='margin: 0;cursor: pointer;border:none;background: #6b5523;border-radius: 10em;' class='btn btn-md white-text' title='Quick View'>Quick View</button>
							    	</span>
						            <span class='float-right'>
						            	<a href='description.php?pro_id=$product_id' style='margin: 0;cursor: pointer;border:none;background: #6b5523;border-radius: 10em;' class='btn btn-md white-text' title='Add to Cart'>Add to Cart &nbsp;<i class='fa fa-cart-plus'></i></a>
						            </span>
                				</div>
          					</div>  
         					<br>        
						</div>			
					";
			}
		}
	}

	function getProducts(){
		if(!isset($_GET['filter'])){
			global $db;
			$sql = "SELECT * FROM products WHERE deleted=0 AND beauty_regime = 0 AND featured = 0";
  			$products = $db->query($sql);
  			while ($product = mysqli_fetch_array($products)) {
				$id = $product['id'];
				$image = $product['image'];
				$title = $product['title'];
				$weight = $product['weight'];
				$price = $product['price'];
				$short_desc = $product['short_desc'];
				$photos = explode(',',$image);

				echo 
					"
						<div class='col-lg-3 col-md-3 col-sm-6 col-xs-12 mb-lg-0 mb-4'>
							<div class='card card-cascade wider card-ecommerce'>
					            <div class='view zoom view-cascade overlay'>
					            	<img src='$photos[0]' class='card-img-top img-fluid' alt='$title'>
					              	<button onclick='detailsmodal($id)' style='background: none;border: none;cursor: pointer'>
					              		<div class='mask rgba-white-slight'></div>
					              	</button>
					            </div>
            					<div class='card-body card-body-cascade text-center'>
                  					<h5>
					                    <strong>
					                        <button onclick='detailsmodal($id)' style='background: none;border: none;cursor: pointer'><b>$title</b></button>
					                        <br>
					                            <span class='badge badge-pill my-2 z-depth-0' style='background-color: #6b5523'>&#8377; $price</span>
						                			&nbsp;&nbsp;&nbsp;
						                		<span class='badge badge-pill my-2 z-depth-0' style='background-color: #6b5523'>$weight</span>
					                        
					                    </strong>
					                </h5>
                  					<h6 class=''>$short_desc</h6>
              					</div>
              					<div class='card-footer px-1 px-3 py-3' style='background: #f1e1b3'>
				                    <span class='float-left'>
							    		<button onclick='detailsmodal($id)' style='margin: 0;cursor: pointer;border:none;background: #6b5523;border-radius: 10em;' class='btn btn-md white-text' title='Quick View'>Quick View</button>
							    	</span>
						            <span class='float-right'>
						            	<a href='description.php?pro_id=$id' style='margin: 0;cursor: pointer;border:none;background: #6b5523;border-radius: 10em;' class='btn btn-md white-text' title='Add to Cart'>Add to Cart &nbsp;<i class='fa fa-cart-plus'></i></a>
						            </span>
                				</div>
          					</div>  
         					<br>        
						</div>			
					";
			}
		}
	}
?>

<!-- Skin Care -->

<?php 		
		
	function getSkinCare(){
		global $db;

		$get_cats = "SELECT * FROM categories WHERE parent = 1";
		$run_cats = mysqli_query($db, $get_cats);

		while ($row_cats = mysqli_fetch_array($run_cats)) {
			$cat_id = $row_cats['id'];
			$cat_title = $row_cats['category'];

			echo "<li><a href='skin-care.php?cat=$cat_id' style='padding: 7.5px;' class='text-white'>$cat_title</a></li>";
			
		}
	}

	function getSkinPro(){
		if (!isset($_GET['cat'])) {

			global $db;

			$get_pro = "SELECT * FROM products WHERE featured = 0 AND deleted = 0 AND cat_name = 'Skin Care' AND beauty_regime = 0";
			$run_pro = mysqli_query($db, $get_pro);

			while ($row_pro = mysqli_fetch_array($run_pro)) {
					$pro_id = $row_pro['id'];
					$pro_cat = $row_pro['categories'];
					$pro_image = $row_pro['image'];
					$pro_title = $row_pro['title'];
					$pro_weight = $row_pro['weight'];
					$pro_price = $row_pro['price'];
					$pro_short_desc = $row_pro['short_desc'];
					$photos = explode(',',$pro_image);

					echo 
					"
						<div class='col-lg-4 col-md-4 col-sm-6 col-xs-12 mb-lg-0 mb-4'>
							<div class='card card-cascade wider card-ecommerce'>
					            <div class='view zoom view-cascade overlay'>
					            	<img src='$photos[0]' class='card-img-top img-fluid' alt='$pro_title'>
					              	<button onclick='detailsmodal($pro_id)' style='background: none;border: none;cursor: pointer'>
					              		<div class='mask rgba-white-slight'></div>
					              	</button>
					            </div>
            					<div class='card-body card-body-cascade text-center'>
                  					<h5>
					                    <strong>
					                        <button onclick='detailsmodal($pro_id)' style='background: none;border: none;cursor: pointer'><b>$pro_title</b></button>
					                        <br>
					                            <span class='badge badge-pill my-2 z-depth-0' style='background-color: #6b5523'>&#8377; $pro_price</span>
						                			&nbsp;&nbsp;&nbsp;
						                		<span class='badge badge-pill my-2 z-depth-0' style='background-color: #6b5523'>$pro_weight</span>
					                        
					                    </strong>
					                </h5>
                  					<h6 class=''>$pro_short_desc</h6>
              					</div>
              					<div class='card-footer px-1 px-3 py-3' style='background: #f1e1b3'>
				                    <span class='float-left'>
							    		<button onclick='detailsmodal($pro_id)' style='margin: 0;cursor: pointer;border:none;background: #6b5523;border-radius: 10em;' class='btn btn-md white-text' title='Quick View'>Quick View</button>
							    	</span>
						            <span class='float-right'>
						            	<a href='description.php?pro_id=$pro_id' style='margin: 0;cursor: pointer;border:none;background: #6b5523;border-radius: 10em;' class='btn btn-md white-text' title='Add to Cart'>Add to Cart &nbsp;<i class='fa fa-cart-plus'></i></a>
						            </span>
                				</div>
          					</div>  
         					<br>        
						</div>			
					";
			}
		}
	}

	function getCatSkinPro(){
		if (isset($_GET['cat'])) {

			$cat_id = $_GET['cat'];

			global $db;

			$get_cat_pro = "SELECT * FROM products WHERE categories = '$cat_id' AND featured = 0 AND deleted = 0 AND cat_name = 'Skin Care'";
			$run_cat_pro = mysqli_query($db, $get_cat_pro);

			while ($row_cat_pro = mysqli_fetch_array($run_cat_pro)) {
					$pro_id = $row_cat_pro['id'];
					$pro_cat = $row_cat_pro['categories'];
					$pro_image = $row_cat_pro['image'];
					$pro_title = $row_cat_pro['title'];
					$pro_weight = $row_cat_pro['weight'];
					$pro_price = $row_cat_pro['price'];
					$pro_short_desc = $row_cat_pro['short_desc'];
					$photos = explode(',',$pro_image);

					echo 
					"
						<div class='col-lg-4 col-md-4 col-sm-6 col-xs-12 mb-lg-0 mb-4'>
							<div class='card card-cascade wider card-ecommerce'>
					            <div class='view zoom view-cascade overlay'>
					            	<img src='$photos[0]' class='card-img-top img-fluid' alt='$pro_title'>
					              	<button onclick='detailsmodal($pro_id)' style='background: none;border: none;cursor: pointer'>
					              		<div class='mask rgba-white-slight'></div>
					              	</button>
					            </div>
            					<div class='card-body card-body-cascade text-center'>
                  					<h5>
					                    <strong>
					                        <button onclick='detailsmodal($pro_id)' style='background: none;border: none;cursor: pointer'><b>$pro_title</b></button>
					                        <br>
					                            <span class='badge badge-pill my-2 z-depth-0' style='background-color: #6b5523'>&#8377; $pro_price</span>
						                			&nbsp;&nbsp;&nbsp;
						                		<span class='badge badge-pill my-2 z-depth-0' style='background-color: #6b5523'>$pro_weight</span>
					                        
					                    </strong>
					                </h5>
                  					<h6 class=''>$pro_short_desc</h6>
              					</div>
              					<div class='card-footer px-1 px-3 py-3' style='background: #f1e1b3'>
				                    <span class='float-left'>
							    		<button onclick='detailsmodal($pro_id)' style='margin: 0;cursor: pointer;border:none;background: #6b5523;border-radius: 10em;' class='btn btn-md white-text' title='Quick View'>Quick View</button>
							    	</span>
						            <span class='float-right'>
						            	<a href='description.php?pro_id=$pro_id' style='margin: 0;cursor: pointer;border:none;background: #6b5523;border-radius: 10em;' class='btn btn-md white-text' title='Add to Cart'>Add to Cart &nbsp;<i class='fa fa-cart-plus'></i></a>
						            </span>
                				</div>
          					</div>  
         					<br>        
						</div>
					";
			}
		}
	}
?>

<!-- Hair Care -->

<?php 		
		
	function getHairCare(){
		global $db;

		$get_cats = "SELECT * FROM categories WHERE parent = 2";
		$run_cats = mysqli_query($db, $get_cats);

		while ($row_cats = mysqli_fetch_array($run_cats)) {
			$cat_id = $row_cats['id'];
			$cat_title = $row_cats['category'];

			echo "<li style='padding: 0.5em;'><a href='hair-care.php?cat=$cat_id' class='text-white'>$cat_title</a></li>";
			
		}
	}

	function getHairPro(){
		if (!isset($_GET['cat'])) {

			global $db;

			$get_pro = "SELECT * FROM products WHERE featured = 0 AND deleted = 0 AND cat_name = 'Hair Care' AND beauty_regime = 0";
			$run_pro = mysqli_query($db, $get_pro);

			while ($row_pro = mysqli_fetch_array($run_pro)) {
					$pro_id = $row_pro['id'];
					$pro_cat = $row_pro['categories'];
					$pro_image = $row_pro['image'];
					$pro_title = $row_pro['title'];
					$pro_weight = $row_pro['weight'];
					$pro_price = $row_pro['price'];
					$pro_short_desc = $row_pro['short_desc'];
					$photos = explode(',',$pro_image);

					echo 
					"
						<div class='col-lg-4 col-md-4 col-sm-6 col-xs-12 mb-lg-0 mb-4'>
							<div class='card card-cascade wider card-ecommerce'>
					            <div class='view zoom view-cascade overlay'>
					            	<img src='$photos[0]' class='card-img-top img-fluid' alt='$pro_title'>
					              	<button onclick='detailsmodal($pro_id)' style='background: none;border: none;cursor: pointer'>
					              		<div class='mask rgba-white-slight'></div>
					              	</button>
					            </div>
            					<div class='card-body card-body-cascade text-center'>
                  					<h5>
					                    <strong>
					                        <button onclick='detailsmodal($pro_id)' style='background: none;border: none;cursor: pointer'><b>$pro_title</b></button>
					                        <br>
					                            <span class='badge badge-pill my-2 z-depth-0' style='background-color: #6b5523'>&#8377; $pro_price</span>
						                			&nbsp;&nbsp;&nbsp;
						                		<span class='badge badge-pill my-2 z-depth-0' style='background-color: #6b5523'>$pro_weight</span>
					                        
					                    </strong>
					                </h5>
                  					<h6 class=''>$pro_short_desc</h6>
              					</div>
              					<div class='card-footer px-1 px-3 py-3' style='background: #f1e1b3'>
				                    <span class='float-left'>
							    		<button onclick='detailsmodal($pro_id)' style='margin: 0;cursor: pointer;border:none;background: #6b5523;border-radius: 10em;' class='btn btn-md white-text' title='Quick View'>Quick View</button>
							    	</span>
						            <span class='float-right'>
						            	<a href='description.php?pro_id=$pro_id' style='margin: 0;cursor: pointer;border:none;background: #6b5523;border-radius: 10em;' class='btn btn-md white-text' title='Add to Cart'>Add to Cart &nbsp;<i class='fa fa-cart-plus'></i></a>
						            </span>
                				</div>
          					</div>  
         					<br>        
						</div>
					";
			}
		}
	}

	function getCatHairPro(){
		if (isset($_GET['cat'])) {

			$cat_id = $_GET['cat'];

			global $db;

			$get_cat_pro = "SELECT * FROM products WHERE categories = '$cat_id' AND featured = 0 AND deleted = 0 AND cat_name = 'Hair Care'";
			$run_cat_pro = mysqli_query($db, $get_cat_pro);

			while ($row_cat_pro = mysqli_fetch_array($run_cat_pro)) {
					$pro_id = $row_cat_pro['id'];
					$pro_cat = $row_cat_pro['categories'];
					$pro_image = $row_cat_pro['image'];
					$pro_title = $row_cat_pro['title'];
					$pro_weight = $row_cat_pro['weight'];
					$pro_price = $row_cat_pro['price'];
					$pro_short_desc = $row_cat_pro['short_desc'];
					$photos = explode(',',$pro_image);

					echo 
					"
						<div class='col-lg-4 col-md-4 col-sm-6 col-xs-12 mb-lg-0 mb-4'>
							<div class='card card-cascade wider card-ecommerce'>
					            <div class='view zoom view-cascade overlay'>
					            	<img src='$photos[0]' class='card-img-top img-fluid' alt='$pro_title'>
					              	<button onclick='detailsmodal($pro_id)' style='background: none;border: none;cursor: pointer'>
					              		<div class='mask rgba-white-slight'></div>
					              	</button>
					            </div>
            					<div class='card-body card-body-cascade text-center'>
                  					<h5>
					                    <strong>
					                        <button onclick='detailsmodal($pro_id)' style='background: none;border: none;cursor: pointer'><b>$pro_title</b></button>
					                        <br>
					                            <span class='badge badge-pill my-2 z-depth-0' style='background-color: #6b5523'>&#8377; $pro_price</span>
						                			&nbsp;&nbsp;&nbsp;
						                		<span class='badge badge-pill my-2 z-depth-0' style='background-color: #6b5523'>$pro_weight</span>
					                        
					                    </strong>
					                </h5>
                  					<h6 class=''>$pro_short_desc</h6>
              					</div>
              					<div class='card-footer px-1 px-3 py-3' style='background: #f1e1b3'>
				                    <span class='float-left'>
							    		<button onclick='detailsmodal($pro_id)' style='margin: 0;cursor: pointer;border:none;background: #6b5523;border-radius: 10em;' class='btn btn-md white-text' title='Quick View'>Quick View</button>
							    	</span>
						            <span class='float-right'>
						            	<a href='description.php?pro_id=$pro_id' style='margin: 0;cursor: pointer;border:none;background: #6b5523;border-radius: 10em;' class='btn btn-md white-text' title='Add to Cart'>Add to Cart &nbsp;<i class='fa fa-cart-plus'></i></a>
						            </span>
                				</div>
          					</div>  
         					<br>        
						</div>
					";
			}
		}
	}
?>

<!-- Body Care -->

<?php 		
		
	function getBodyCare(){
		global $db;

		$get_cats = "SELECT * FROM categories WHERE parent = 3";
		$run_cats = mysqli_query($db, $get_cats);

		while ($row_cats = mysqli_fetch_array($run_cats)) {
			$cat_id = $row_cats['id'];
			$cat_title = $row_cats['category'];

			echo "<li style='padding: 0.5em;'><a href='body-care.php?cat=$cat_id' class='text-white'>$cat_title</a></li>";
			
		}
	}

	function getBodyPro(){
		if (!isset($_GET['cat'])) {

			global $db;

			$get_pro = "SELECT * FROM products WHERE featured = 0 AND deleted = 0 AND cat_name = 'Body Care' AND beauty_regime = 0";
			$run_pro = mysqli_query($db, $get_pro);

			while ($row_pro = mysqli_fetch_array($run_pro)) {
					$pro_id = $row_pro['id'];
					$pro_cat = $row_pro['categories'];
					$pro_image = $row_pro['image'];
					$pro_title = $row_pro['title'];
					$pro_weight = $row_pro['weight'];
					$pro_price = $row_pro['price'];
					$pro_short_desc = $row_pro['short_desc'];
					$photos = explode(',',$pro_image);

					echo 
					"
						<div class='col-lg-4 col-md-4 col-sm-6 col-xs-12 mb-lg-0 mb-4'>
							<div class='card card-cascade wider card-ecommerce'>
					            <div class='view zoom view-cascade overlay'>
					            	<img src='$photos[0]' class='card-img-top img-fluid' alt='$pro_title'>
					              	<button onclick='detailsmodal($pro_id)' style='background: none;border: none;cursor: pointer'>
					              		<div class='mask rgba-white-slight'></div>
					              	</button>
					            </div>
            					<div class='card-body card-body-cascade text-center'>
                  					<h5>
					                    <strong>
					                        <button onclick='detailsmodal($pro_id)' style='background: none;border: none;cursor: pointer'><b>$pro_title</b></button>
					                        <br>
					                            <span class='badge badge-pill my-2 z-depth-0' style='background-color: #6b5523'>&#8377; $pro_price</span>
						                			&nbsp;&nbsp;&nbsp;
						                		<span class='badge badge-pill my-2 z-depth-0' style='background-color: #6b5523'>$pro_weight</span>
					                        
					                    </strong>
					                </h5>
                  					<h6 class=''>$pro_short_desc</h6>
              					</div>
              					<div class='card-footer px-1 px-3 py-3' style='background: #f1e1b3'>
				                    <span class='float-left'>
							    		<button onclick='detailsmodal($pro_id)' style='margin: 0;cursor: pointer;border:none;background: #6b5523;border-radius: 10em;' class='btn btn-md white-text' title='Quick View'>Quick View</button>
							    	</span>
						            <span class='float-right'>
						            	<a href='description.php?pro_id=$pro_id' style='margin: 0;cursor: pointer;border:none;background: #6b5523;border-radius: 10em;' class='btn btn-md white-text' title='Add to Cart'>Add to Cart &nbsp;<i class='fa fa-cart-plus'></i></a>
						            </span>
                				</div>
          					</div>  
         					<br>        
						</div>
					";
			}
		}
	}

	function getCatBodyPro(){
		if (isset($_GET['cat'])) {

			$cat_id = $_GET['cat'];

			global $db;

			$get_cat_pro = "SELECT * FROM products WHERE categories = '$cat_id' AND featured = 0 AND deleted = 0 AND cat_name = 'Body Care'";
			$run_cat_pro = mysqli_query($db, $get_cat_pro);

			while ($row_cat_pro = mysqli_fetch_array($run_cat_pro)) {
					$pro_id = $row_cat_pro['id'];
					$pro_cat = $row_cat_pro['categories'];
					$pro_image = $row_cat_pro['image'];
					$pro_title = $row_cat_pro['title'];
					$pro_weight = $row_cat_pro['weight'];
					$pro_price = $row_cat_pro['price'];
					$pro_short_desc = $row_cat_pro['short_desc'];
					$photos = explode(',',$pro_image);

					echo 
					"
						<div class='col-lg-4 col-md-4 col-sm-6 col-xs-12 mb-lg-0 mb-4'>
							<div class='card card-cascade wider card-ecommerce'>
					            <div class='view zoom view-cascade overlay'>
					            	<img src='$photos[0]' class='card-img-top img-fluid' alt='$pro_title'>
					              	<button onclick='detailsmodal($pro_id)' style='background: none;border: none;cursor: pointer'>
					              		<div class='mask rgba-white-slight'></div>
					              	</button>
					            </div>
            					<div class='card-body card-body-cascade text-center'>
                  					<h5>
					                    <strong>
					                        <button onclick='detailsmodal($pro_id)' style='background: none;border: none;cursor: pointer'><b>$pro_title</b></button>
					                        <br>
					                            <span class='badge badge-pill my-2 z-depth-0' style='background-color: #6b5523'>&#8377; $pro_price</span>
						                			&nbsp;&nbsp;&nbsp;
						                		<span class='badge badge-pill my-2 z-depth-0' style='background-color: #6b5523'>$pro_weight</span>
					                        
					                    </strong>
					                </h5>
                  					<h6 class=''>$pro_short_desc</h6>
              					</div>
              					<div class='card-footer px-1 px-3 py-3' style='background: #f1e1b3'>
				                    <span class='float-left'>
							    		<button onclick='detailsmodal($pro_id)' style='margin: 0;cursor: pointer;border:none;background: #6b5523;border-radius: 10em;' class='btn btn-md white-text' title='Quick View'>Quick View</button>
							    	</span>
						            <span class='float-right'>
						            	<a href='description.php?pro_id=$pro_id' style='margin: 0;cursor: pointer;border:none;background: #6b5523;border-radius: 10em;' class='btn btn-md white-text' title='Add to Cart'>Add to Cart &nbsp;<i class='fa fa-cart-plus'></i></a>
						            </span>
                				</div>
          					</div>  
         					<br>        
						</div>
					";
			}
		}
	}
?>

<!-- Beaty Regime -->

<?php 		
		
	function getBeautyCare(){
		global $db;

		$get_cats = "SELECT * FROM categories WHERE parent = 20";
		$run_cats = mysqli_query($db, $get_cats);

		while ($row_cats = mysqli_fetch_array($run_cats)) {
			$cat_id = $row_cats['id'];
			$cat_title = $row_cats['category'];

			echo "<li style='padding: 0.5em;'><a href='beauty-regime.php?cat=$cat_id' class='text-white'>$cat_title</a></li>";
			
		}
	}

	function getBeautyPro(){
		if (!isset($_GET['cat'])) {

			global $db;

			$get_pro = "SELECT * FROM products WHERE featured = 0 AND deleted = 0 AND beauty_regime = 1";
			$run_pro = mysqli_query($db, $get_pro);

			while ($row_pro = mysqli_fetch_array($run_pro)) {
					$pro_id = $row_pro['id'];
					$pro_cat = $row_pro['categories'];
					$pro_image = $row_pro['image'];
					$pro_title = $row_pro['title'];
					$pro_weight = $row_pro['weight'];
					$pro_price = $row_pro['price'];
					$pro_short_desc = $row_pro['short_desc'];
					$photos = explode(',',$pro_image);

					echo 
					"	
						<div class='col-lg-4 col-md-4 col-sm-6 col-xs-12 mb-lg-0 mb-4'>
							<div class='card card-cascade wider card-ecommerce'>
					            <div class='view zoom view-cascade overlay'>
					            	<img src='$photos[0]' class='card-img-top img-fluid' alt='$pro_title'>
					              	<button onclick='detailsmodal($pro_id)' style='background: none;border: none;cursor: pointer'>
					              		<div class='mask rgba-white-slight'></div>
					              	</button>
					            </div>
            					<div class='card-body card-body-cascade text-center'>
                  					<h5>
					                    <strong>
					                        <button onclick='detailsmodal($pro_id)' style='background: none;border: none;cursor: pointer'><b>$pro_title</b></button>
					                        <br>
					                            <span class='badge badge-pill my-2 z-depth-0' style='background-color: #6b5523'>&#8377; $pro_price</span>
						                			&nbsp;&nbsp;&nbsp;
						                		<span class='badge badge-pill my-2 z-depth-0' style='background-color: #6b5523'>$pro_weight</span>
					                        
					                    </strong>
					                </h5>
                  					<h6 class=''>$pro_short_desc</h6>
              					</div>
              					<div class='card-footer px-1 px-3 py-3' style='background: #f1e1b3'>
				                    <span class='float-left'>
							    		<button onclick='detailsmodal($pro_id)' style='margin: 0;cursor: pointer;border:none;background: #6b5523;border-radius: 10em;' class='btn btn-md white-text' title='Quick View'>Quick View</button>
							    	</span>
						            <span class='float-right'>
						            	<a href='description.php?pro_id=$pro_id' style='margin: 0;cursor: pointer;border:none;background: #6b5523;border-radius: 10em;' class='btn btn-md white-text' title='Add to Cart'>Add to Cart &nbsp;<i class='fa fa-cart-plus'></i></a>
						            </span>
                				</div>
          					</div>  
         					<br>        
						</div>
					";
			}
		}
	}

	function getCatBeautyPro(){
		if (isset($_GET['cat'])) {

			$cat_id = $_GET['cat'];

			global $db;

			$get_cat_pro = "SELECT * FROM products WHERE categories = '$cat_id' AND featured = 0 AND deleted = 0 AND beauty_regime = 1";
			$run_cat_pro = mysqli_query($db, $get_cat_pro);

			while ($row_cat_pro = mysqli_fetch_array($run_cat_pro)) {
					$pro_id = $row_cat_pro['id'];
					$pro_cat = $row_cat_pro['categories'];
					$pro_image = $row_cat_pro['image'];
					$pro_title = $row_cat_pro['title'];
					$pro_weight = $row_cat_pro['weight'];
					$pro_price = $row_cat_pro['price'];
					$pro_short_desc	= $row_cat_pro['short_desc'];
					$photos = explode(',',$pro_image);

					echo 
					"
						<div class='col-lg-4 col-md-4 col-sm-6 col-xs-12 mb-lg-0 mb-4'>
							<div class='card card-cascade wider card-ecommerce'>
					            <div class='view zoom view-cascade overlay'>
					            	<img src='$photos[0]' class='card-img-top img-fluid' alt='$pro_title'>
					              	<button onclick='detailsmodal($pro_id)' style='background: none;border: none;cursor: pointer'>
					              		<div class='mask rgba-white-slight'></div>
					              	</button>
					            </div>
            					<div class='card-body card-body-cascade text-center'>
                  					<h5>
					                    <strong>
					                        <button onclick='detailsmodal($pro_id)' style='background: none;border: none;cursor: pointer'><b>$pro_title</b></button>
					                        <br>
					                            <span class='badge badge-pill my-2 z-depth-0' style='background-color: #6b5523'>&#8377; $pro_price</span>
						                			&nbsp;&nbsp;&nbsp;
						                		<span class='badge badge-pill my-2 z-depth-0' style='background-color: #6b5523'>$pro_weight</span>
					                        
					                    </strong>
					                </h5>
                  					<h6 class=''>$pro_short_desc</h6>
              					</div>
              					<div class='card-footer px-1 px-3 py-3' style='background: #f1e1b3'>
				                    <span class='float-left'>
							    		<button onclick='detailsmodal($pro_id)' style='margin: 0;cursor: pointer;border:none;background: #6b5523;border-radius: 10em;' class='btn btn-md white-text' title='Quick View'>Quick View</button>
							    	</span>
						            <span class='float-right'>
						            	<a href='description.php?pro_id=$pro_id' style='margin: 0;cursor: pointer;border:none;background: #6b5523;border-radius: 10em;' class='btn btn-md white-text' title='Add to Cart'>Add to Cart &nbsp;<i class='fa fa-cart-plus'></i></a>
						            </span>
                				</div>
          					</div>  
         					<br>        
						</div>
					";
			}
		}
	}
?>

<!-- Gift Packages -->
<?php
	function getGiftPackages(){

			global $db;

			$get_pro = "SELECT * FROM products WHERE featured = 0 AND deleted = 0 AND beauty_regime = 0 AND cat_name = 'Gift Packages'";
			$run_pro = mysqli_query($db, $get_pro);

			while ($row_pro = mysqli_fetch_array($run_pro)) {
					$pro_id = $row_pro['id'];
					$pro_cat = $row_pro['categories'];
					$pro_image = $row_pro['image'];
					$pro_title = $row_pro['title'];
					$pro_weight = $row_pro['weight'];
					$pro_price = $row_pro['price'];
					$pro_short_desc = $row_pro['short_desc'];
					$photos = explode(',',$pro_image);

					echo 
					"	
						<div class='col-lg-3 col-md-3 col-sm-6 col-xs-12 mb-lg-0 mb-4'>
							<div class='card card-cascade wider card-ecommerce'>
					            <div class='view zoom view-cascade overlay'>
					            	<img src='$photos[0]' class='card-img-top img-fluid' alt='$pro_title'>
					              	<button onclick='detailsmodal($pro_id)' style='background: none;border: none;cursor: pointer'>
					              		<div class='mask rgba-white-slight'></div>
					              	</button>
					            </div>
            					<div class='card-body card-body-cascade text-center'>
                  					<h5>
					                    <strong>
					                        <button onclick='detailsmodal($pro_id)' style='background: none;border: none;cursor: pointer'><b>$pro_title</b></button>
					                        <br>
					                            <span class='badge badge-pill my-2 z-depth-0' style='background-color: #6b5523'>&#8377; $pro_price</span>
						                			&nbsp;&nbsp;&nbsp;
						                		<span class='badge badge-pill my-2 z-depth-0' style='background-color: #6b5523'>$pro_weight</span>
					                        
					                    </strong>
					                </h5>
                  					<h6 class=''>$pro_short_desc</h6>
              					</div>
              					<div class='card-footer px-1 px-3 py-3' style='background: #f1e1b3'>
				                    <span class='float-left'>
							    		<button onclick='detailsmodal($pro_id)' style='margin: 0;cursor: pointer;border:none;background: #6b5523;border-radius: 10em;' class='btn btn-md white-text' title='Quick View'>Quick View</button>
							    	</span>
						            <span class='float-right'>
						            	<a href='description.php?pro_id=$pro_id' style='margin: 0;cursor: pointer;border:none;background: #6b5523;border-radius: 10em;' class='btn btn-md white-text' title='Add to Cart'>Add to Cart &nbsp;<i class='fa fa-cart-plus'></i></a>
						            </span>
                				</div>
          					</div>  
         					<br>        
						</div>
					";
			}
		}
	
?>