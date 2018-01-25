<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>VitoSlim - Order VitoSlim Online</title>
<link href="css/styles.css" rel="stylesheet" type="text/css" />
<link href="css/reset.css" rel="stylesheet" type="text/css" />
<script id="pap_x2s6df8d" src="js/track.php" type="text/javascript"></script>
</head>

<body>

<!-- MAIN WRAPPER START -->
<div id="main_wrapper">

<!-- WRAPPER INNER START -->
<div id="wrapper_inner">
 
<div class="wrapper_inner">

<div class="inner_wrapper"><script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript">
	function set_shipping(value) {
		$('#shipping_method').val(value);
	}

	$(document).ready(function(){


		$('.dollar-image').click(function(){

			$('#quantity').val($(this).val());
			$('#order_form').submit();
			return false;
		});

		var shipping_cost = {'dollar': ['$9.95', '$24.95'], 'euro': ['&euro;7.00', '&euro;17.50']};

		$('.dollar-price, .euro-price').click(function(){
			$(this).next('input[type="image"]').trigger('click');
		});

		$('input[name="curcurrency"]').click(function(){
			var val = $(this).val();
			if (val == 'dollar') {
				$('.dollar-image').show();
				$('.euro-image').hide();
				$('.dollar-price').show();
				$('.euro-price').hide();
			} else {
				$('.dollar-image').hide();
				$('.euro-image').show();
				$('.dollar-price').hide();
				$('.euro-price').show();
			}
			$('.shipping-price:first').html(shipping_cost[val][0]);
			$('.shipping-price:last').html(shipping_cost[val][1]);
		});
	});
</script>

<!-- inner left start -->
<div class="inner_left">
<div class="logo"><img src="images/logo.png" alt="Vito Slim" border="0" usemap="#Map" />
  <map name="Map" id="Map">
    <area shape="rect" coords="9,17,235,117" href="index.php" />
  </map>
</div>

<div class="drastic_results_box">

<div class="drastic_results_top"><img src="images/drastic_results_top.jpg" alt="Drastic Results" /></div>

<div class="drastic_results_mid">

<div class="drastic_results_indent">

<ul>
<li>You may loose up to 11lbs (5kg) in Just 4 weeks *</li>
<li>Boost Your Energy</li>
<li>Reduce Calorie Intake</li>
<li>Reduce Cholesterol Level</li>
<li style="border:none;">Normalize Appetite</li>
</ul>

<div class="clear"></div>
</div>

<div class="clear"></div>
</div>

<div class="clear"></div>
</div>



<div class="left_banner"><a href="guarantees.php"><img src="images/money_bck.png" alt="Money Back" /></a></div>

<div class="left_banner"><a href="reviews.php"><img src="images/quality_banner.png" alt="Quality" /></a></div>

<div class="testimonials">
<h1><img src="images/test_head.jpg"  alt="Testimonials" /></h1>

<div class="test_box">

<div class="test_left">
  <p><img src="images/test_img.jpg" alt="test" /></p>
  <p>Mariah, 28</p>
</div>

<div class="test_right">VitoSlim&trade; made me look great again and everyone has noticed the change because it took just a few weeks for the first results to appear! My belly is flat now!</div>

<div class="clear"></div>
</div>

<div class="test_box" style="border:none; padding-bottom:0px;">

<div class="test_left">
  <p><img src="images/test_img1.jpg" alt="test" /></p>
  <p>Michael, 41</p>
</div>

<div class="test_right">I feel I'm getting more energy and eat less junk food since I started taking VitoSlim&trade;.
It helps you lose weight in a truly natural way without any bad consequences...</div>

<div class="clear"></div>
</div>

<h2><a href="reviews.php"><img src="images/read_more_test_bt.jpg" alt="Read more" /></a></h2>

<div class="clear"></div>
</div>

<div class="left_banner"><a href="reviews.php"><img src="images/more_before_woman.jpg" alt="Quality" /></a></div>





<div class="clear"></div>
</div>
<!-- inner left end --> 

<!-- inner right start -->
 <div class="inner_right">
<div class="top_right">
  <div class="top_link">
	<ul>
					<li class="" style=""><a href="index.php">Home</a></li>
					<li class="" style=""><a href="ingredients.php">Ingredients</a></li>
					<li class="" style=""><a href="reviews.php">Reviews</a></li>
					<li class="" style=""><a href="guarantees.php">Our Guarantees</a></li>
					<li class="" style=""><a href="faq.php">FAQ</a></li>
					<li class="" style="padding-right:0px;"><a href="contacts.php">Contacts Us</a></li>
			</ul>
<div class="clear"></div>
</div>
  <div class="clear"></div>
</div>
<div class="swoosh_box">
<img src="images/swoosh_img.png" alt="order" width="660" height="153" /></div>

 <div class="inner_connent">

 <h1>Order VitoSlim<sup>TM</sup></h1>
 <h2>Order VitoSlim&trade; Online and Save Big - Take Advantage of Our Special Web Pricing only at VitoSlim&trade; Official Site VitoSlim.com!</h2>
 <p>
<b>Each Bottle contains 60 Capsules - 1 Month Supply of VitoSlim&trade;.</b><br>
The more months' supply that you order, the greater the results and the money that you save!<br>
Please select the quantity of your Order and Shipping Method


   </p>

	<form id="order_form" action="/seccheckout.php" method="post">
		<input type="hidden" name="product_code" value="vitoslim">
		<input type="hidden" name="pagestyle" value="vitoslim.new">
		<input type="hidden" name="urlsig" value="www.vitoslim.com">
		<input type="hidden" name="referer" value="http://google.com/">
		<input type="hidden" name="ref" value="">
		<input type="hidden" value="1" name="single">
		<input type="hidden" value="1" name="quantity" id="quantity">
		<input type="hidden" value="vitoslim" name="ptype">
		<input type="hidden" value="1" name="shipping_method" id="shipping_method">
		<input type="hidden" name="coupon" id="coupon" value="1">
		<input type="hidden" name="coupon_code" id="coupon_code_hidden" value="">
		<p class="currency-selector">
			<input type="hidden" id="currency_dollar" name="curcurrency" value="dollar" checked="checked" />
		</p>
		<p style="position: relative;">
			<span class="dollar-price">$261.00</span>
			<input type="image" class="dollar-image" name="xxx" value="9" src="images/order_bottel.jpg" />
			<span class="euro-price" style="display:none;">&euro;232.50</span>
			<input type="image" class="euro-image" value="9" src="images/order_bottel_eur.jpg" style="display:none;" />
		</p>
		<p style="position: relative;">
			<span class="dollar-price">$189.00</span>
			<input type="image" class="dollar-image" value="6" src="images/order_bottel1.jpg" width="608" height="221" />
			<span class="euro-price" style="display:none;">&euro;168.00</span>
			<input type="image" class="euro-image" value="6" src="images/order_bottel1_eur.jpg" width="608" height="221" style="display:none;" />
		</p>
		<p style="position: relative;">
			<span class="dollar-price">$107.00</span>
			<input type="image" class="dollar-image" value="3" src="images/order_bottel2.jpg" width="608" height="221" />
			<span class="euro-price" style="display:none;">&euro;95.00</span>
			<input type="image" class="euro-image" value="3" src="images/order_bottel2_eur.jpg" width="608" height="221" style="display:none;" />
		</p>
		<p style="position: relative;">
			<span class="dollar-price">$73.00</span>
			<input type="image" class="dollar-image" value="2" src="images/order_bottel3.jpg" width="608" height="221" />
			<span class="euro-price" style="display:none;">&euro;65.00</span>
			<input type="image" class="euro-image" value="2" src="images/order_bottel3_eur.jpg" width="608" height="221" style="display:none;" />
		</p>
		<p style="position: relative;">
			<span class="dollar-price">$39.00</span>
			<input type="image" class="dollar-image" value="1" src="images/order_bottel4.jpg" width="608" height="221" />
			<span class="euro-price" style="display:none;">&euro;34.50</span>
			<input type="image" class="euro-image" value="1" src="images/order_bottel4_eur.jpg" width="608" height="221" style="display:none;" />
		</p>
	</form>
 </div>

 <div class="review_wrapper">

  <div class="order_wrapper">

   <div class="order_top"><img src="images/order_top.jpg" alt="Order" /></div>

	<div class="order_mid">

 <div class="order_indent">

 <table width="480" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td align="left" valign="middle" style="padding:0 0 10px 0;">

	</td>
  </tr>
  <tr>
    <td align="left" valign="middle"><table width="480" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="28" height="30" align="left" valign="middle"><input type="radio" name="shipping_select" id="radio" value="1" checked="checked" onclick="set_shipping(this.value);" /></td>
        <td width="452" class="order_text">Registered Mail - <span class="shipping-price">$9.95</span> - (up to 15 days)</td>
      </tr>
      <tr>
        <td height="30" align="left" valign="middle"><input type="radio" name="shipping_select" id="radio2" value="2" onclick="set_shipping(this.value);"  /></td>
        <td class="order_text">Express mail - <span class="shipping-price">$24.95</span> - (5 to 7 days)</td>
      </tr>
    </table></td>
  </tr>
</table>

  <div class="clear"></div>
  </div>

  <div class="clear"></div>
  </div>

  <div class="order_bot"><img src="images/order_bot.jpg" alt="Order" /></div>

  <div class="clear"></div>
 </div>

 <div class="clear"></div>
 </div>

 <div class="inner_connent">

 <h2>Our customers shop with us because it is so convenient and risk-free :</h2>

 <div class="clear"></div>
 </div>

 <div class="order_box">

 <ul>
 <li>All packages are shipped worldwide with delivery guranteed</li>
 <li>All orders are packed in plain boxes with no indication of its contents for maximum privacy</li>
 <li>The results are effective and permanent (the recommended dosage needs to be followed)</li>
 <li>The product is branded, safe and recommended by Doctors worldwide</li>
 <li>A 3-Months Money Back Guarantee is offered with the product</li>
 <li>A friendly customer support available 24/7</li>
 </ul>

 <div class="clear"></div>
 </div>

 <div class="clear"></div>
 </div>

 <div class="clear"></div>
 </div>
<!-- inner right end --> 


  <div class="clear"></div>
</div>

 <div class="inner_wrapper">
   <img src="images/order_your_vitoslim_now.jpg" alt="Order your VitoSlim now!" border="0" usemap="#Map3" style="padding-left:10px;"/>
<map name="Map3" id="Map3">
  <area shape="rect" coords="318,20,867,114" href="order.php" />
</map></div>

 <div class="clear"></div>
</div>

<div class="clear"></div>
</div>
 <!-- WRAPPER INNER end -->

<!-- FOOTER START -->
<div id="footer">
<script type="text/javascript">
	function popjack(url) {
		window.open(url,'popjack','toolbar=no,location=no,directories=no,status=no,menubar=no,resizable=no,copyhistory=no,scrollbars=yes,width=640,height=265');
	}
</script>
<div class="footer">
<div class="footer_link"> <div class="f_left" style="padding-right:40px;"><p>Copyright &copy; 2016. VitoSlim	</p></div><div class="f_left"><p><a href="termsandcondition.html" onclick="window.open(this.href, '' , 'width=600,height=500,scrollbars=yes'); return false;">Terms and Conditions</a> | <a href="privacypolicy.html" onclick="window.open(this.href, '' , 'width=600,height=500,scrollbars=yes'); return false;">Privacy Policy</a> | <a href="shipping.html" onclick="window.open(this.href, '' , 'width=600,height=500,scrollbars=yes'); return false;">Shipping Policy</a> | <a href="return.html" onclick="window.open(this.href, '' , 'width=600,height=500,scrollbars=yes'); return false;">Return Policy</a> | <a href="refund.html" onclick="window.open(this.href, '' , 'width=600,height=500,scrollbars=yes'); return false;">Refund Policy</a> | <a href="cancellation.html" onclick="window.open(this.href, '' , 'width=600,height=500,scrollbars=yes'); return false;">Cancellation Policy</a></p><div style="font-size: 12px; color: #fff"><br>* - Results may vary depending on dietary conditions and individual health state. Please contact your dietary consultant.</div>
</div> 
<div class="clear"></div>
</div>
<div><p></p></div>

</div>

<div class="clear"></div>
</div>
<!-- FOOTER START -->

<div class="clear"></div>
</div>

<div class="clear"></div>
</div>
<!-- MAIN WRAPPER END -->
<script type="text/javascript">
	papTrack();
</script>
<div style="text-align:center;"><img src="/visa.gif" style="margin-right: 5px;"><img src="/mc.gif"></div></body>
</html>
