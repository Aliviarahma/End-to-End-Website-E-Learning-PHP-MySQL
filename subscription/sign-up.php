<?php
include("config.php");
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Pricing Plans and Subscription Payment | by PHPJabbers.com</title>
		<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link href="https://fonts.googleapis.com/css?family=Monda" rel="stylesheet">

		<script src="js/jquery-1.11.0.min.js"></script>
		<script src="js/jquery.magnific-popup.js" type="text/javascript"></script>
		<script src="js/jquery.validate.min.js" type="text/javascript"></script>
		<script>
			$(document).ready(function() {
				$('.popup-with-zoom-anim').magnificPopup({
					type: 'inline',
					fixedContentPos: false,
					fixedBgPos: true,
					overflowY: 'auto',
					closeBtnInside: true,
					preloader: false,
					midClick: true,
					removalDelay: 300,
					mainClass: 'my-mfp-zoom-in'
				});
				$('.popup-with-zoom-anim').on('click', function(e) {
					$('#signUpForm').find('input[name="Plan"]').val($(this).data("plan"));
					$('#signUpForm').find('input[name="Price"]').val($(this).data("price"));
				});
				$('#signUpForm').validate({
					errorPlacement: function(error, element) {
						if (element.attr('name') == 'Terms') {
							error.insertAfter(element.parent());
						} else {
							error.insertAfter(element);
						}
					}
				});
				if ($('#paypalForm').length > 0) {
					$('#paypalForm').trigger('submit');
				}
			});
		</script>
	</head>
	<body>
		<!--header start here-->
		<div class="priceing-table w3l">
			<div class="wrap">
				<h1>Subscription Sign up Form</h1>
				<div class="priceing-table-main">
					<?php
					if(isset($_POST['Subscribe']) && !empty($_POST['Name']) && !empty($_POST['Email']) && !empty($_POST['Password']) && !empty($_POST['Price']) && in_array($_POST['Plan'], array('basic', 'standart', 'premium'))) {
						// Connect to database
						$connection = new mysqli($SETTINGS["hostname"], $SETTINGS["mysql_user"], $SETTINGS["mysql_pass"], $SETTINGS["mysql_database"]);
						if ($connection->connect_error) {
							die('Unable to connect to MySQL server.<br ><br >Please make sure your MySQL login details are correct.');
						}

						$data = array(
							'name' => "'".$connection->real_escape_string($_POST['Name'])."'",
							'email' => "'".$connection->real_escape_string($_POST['Email'])."'",
							'password' => "'".$connection->real_escape_string($_POST['Password'])."'",
							'phone' => "'".$connection->real_escape_string($_POST['Phone'])."'",
							'plan' => "'".$connection->real_escape_string($_POST['Plan'])."'",
							'date_created' => 'NOW()',
							'ip' => "'".$_SERVER['REMOTE_ADDR']."'",
						);
						$sql = "REPLACE INTO `".$SETTINGS["data_table"]."` (`".implode("`, `", array_keys($data))."`)VALUES(".implode(", ", array_values($data)).")";
						if ($connection->query($sql) === TRUE) {
							$last_id = $connection->insert_id;
							?>
							<div class="paypal-form">
								<h3>Redirecting to PayPal.com ...</h3>
								<img src="images/ajax-loader.gif" alt="Ajax Loader">
								<form id="paypalForm" action="https://www.paypal.com/cgi-bin/webscr" method="post"
									  style="display: inline">
									<input type="hidden" name="cmd" value="_xclick-subscriptions" />
									<input type="hidden" name="business" value="<?php echo $SETTINGS["paypal_address"]; ?>" />
									<input type="hidden" name="item_name" value="<?php echo $_POST['Plan']; ?>" />
									<input type="hidden" name="custom" value="<?php echo $connection->insert_id; ?>" />
									<input type="hidden" name="currency_code" value="USD" />
									<input type="hidden" name="lc" value="US" />
									<input type="hidden" name="no_note" value="1" />
									<input type="hidden" name="no_shipping" value="1" />
									<input type="hidden" name="a3" value="<?php echo number_format($_POST['Price'], 2, '.', ''); ?>" />
									<input type="hidden" name="p3" value="1" />
									<input type="hidden" name="t3" value="M" />
								</form>
							</div>
							<?php
						} else {
							?>
							<div class="paypal-form">
								<h3>Something went wrong</h3>
							</div>
							<?php
						}
						$connection->close();
					} else {
						?>
						<div class="price-grid">
							<div class="price-block agile">
								<div class="price-gd-top pric-clr1">
									<h4>Basic</h4>
									<h3>$5</h3>
									<h5>per month</h5>
								</div>
								<div class="price-gd-bottom">
									<div class="price-list">
										<ul>
											<li>Full access</li>
											<li>Documentation</li>
											<li>Customers Support</li>
											<li>Free Updates</li>
											<li>Unlimited Domains</li>
										</ul>
									</div>
								</div>
								<div class="price-selet pric-sclr1">
									<a class="popup-with-zoom-anim" data-plan="basic" data-price="5.00" href="#small-dialog">Sign Up</a>
								</div>
							</div>
						</div>
						<div class="price-grid">
							<div class="price-block agile">
								<div class="price-gd-top pric-clr2">
									<h4>Standard</h4>
									<h3>$10</h3>
									<h5>per month</h5>
								</div>
								<div class="price-gd-bottom">
									<div class="price-list">
										<ul>
											<li>Full access</li>
											<li>Documentation</li>
											<li>Customers Support</li>
											<li>Free Updates</li>
											<li>Unlimited Domains</li>
										</ul>
									</div>
								</div>
								<div class="price-selet pric-sclr2">
									<a class="popup-with-zoom-anim" data-plan="standart" data-price="10.00" href="#small-dialog">Sign Up</a>
								</div>
							</div>
						</div>
						<div class="price-grid wthree">
							<div class="price-block agile">
								<div class="price-gd-top pric-clr3">
									<h4>Premium</h4>
									<h3>$20</h3>
									<h5>per month</h5>
								</div>
								<div class="price-gd-bottom">
									<div class="price-list">
										<ul>
											<li>Full access</li>
											<li>Documentation</li>
											<li>Customers Support</li>
											<li>Free Updates</li>
											<li>Unlimited Domains</li>
										</ul>
									</div>
								</div>
								<div class="price-selet pric-sclr3">
									<a class="popup-with-zoom-anim" data-plan="premium" data-price="20.00" href="#small-dialog">Sign Up</a>
								</div>
							</div>
						</div>
						<div class="clear"> </div>
						<?php
					}
					?>
				</div>
			</div>
		</div>
		<!--header end here-->
		<!--pop-up-grid-->
		<div id="popup">
			<div id="small-dialog" class="mfp-hide">
				<div class="pop_up">
					<div class="payment-online-form-left">
						<form id="signUpForm" action="#" method="post">
							<input type="hidden" name="Subscribe" value="1">
							<input type="hidden" name="Plan" value="">
							<input type="hidden" name="Price" value="">
							<h4>Sign Up</h4>
							<ul>
								<li><input class="text-box-dark" type="text" placeholder="Name" name="Name" required></li>
								<li><input class="text-box-dark email" type="text" placeholder="Email" name="Email" required></li>
								<li><input class="text-box-dark" type="password" placeholder="Password" name="Password" required></li>
								<li><input class="text-box-dark" type="text" placeholder="Phone" name="Phone"></li>
							</ul>
													<span class="checkbox1">
														   <label class="checkbox"><input type="checkbox" name="Terms" checked="" required><i> </i>I Accept Terms.</label>
													 </span>
							<ul class="payment-sendbtns">
								<li><input type="submit" value="Submit"></li>
							</ul>
						</form>
					</div>
				</div>
			</div>
		</div>

		<!--pop-up-grid-->
		<br /><br /><br /><br />
		<div class="copy-rights">
		</div>
	</body>
</html>