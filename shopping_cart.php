<?php
include('config.php');
session_start();

if ($discs[$_SESSION['advert_id']]['dis'] > 0) {
	$discount = $discs[$_SESSION['advert_id']]['dis'];
} else {
	$discount = 0;
}

$_SESSION['discount'] = $discount;

$cart = $_SESSION['cart'];

$subtotal = $_SESSION['amount'];
$quantity = $_SESSION['quantity'];
$price    = $_SESSION['amount'];
$total    = $_SESSION['total'];

if (isset($_REQUEST['id'])) {
    if (array_key_exists($_REQUEST['id'], $cart)) {
        $cart[$_REQUEST['id']]++;
    } else {
        $cart[$_REQUEST['id']] = 1;
    }
}

if (isset($_REQUEST['delete_item'])) {
    if (array_key_exists($_REQUEST['delete_item'], $cart)) {
        unset($cart[$_REQUEST['delete_item']]);
    }
}

$_SESSION['cart'] = $cart;

if ($_REQUEST['ajaxAction'] == 'updateStates') {
	if ($_REQUEST['fieldname'] == 'state' or $_REQUEST['fieldname'] == 'shipState') {
		// good fieldname
	} else {
		exit;
	}
	if ($_REQUEST['country'] == 'United States' ) {
?>
<!--<label><b>State/Province</b>: </label>--> <select name='<?= $_REQUEST['fieldname'] ?>' id='<?= $_REQUEST['fieldname'] ?>' class='field'><option value='-1'>Select One</option><option value='AL'>Alabama</option><option value='AK'>Alaska</option><option value='AS'>American Samoa</option><option value='AZ'>Arizona</option><option value='AR'>Arkansas</option><option value='AF'>Armed Forces Africa</option><option value='AA'>Armed Forces Americas</option><option value='AC'>Armed Forces Canada</option><option value='AE'>Armed Forces Europe</option><option value='AM'>Armed Forces Middle East</option><option value='AP'>Armed Forces Pacific</option><option value='CA'>California</option><option value='CO'>Colorado</option><option value='CT'>Connecticut</option><option value='DE'>Delaware</option><option value='DC'>District of Columbia</option><option value='FM'>Federated States Of Micronesia</option><option value='FL'>Florida</option><option value='GA'>Georgia</option><option value='GU'>Guam</option><option value='HI'>Hawaii</option><option value='ID'>Idaho</option><option value='IL'>Illinois</option><option value='IN'>Indiana</option><option value='IA'>Iowa</option><option value='KS'>Kansas</option><option value='KY'>Kentucky</option><option value='LA'>Louisiana</option><option value='ME'>Maine</option><option value='MH'>Marshall Islands</option><option value='MD'>Maryland</option><option value='MA'>Massachusetts</option><option value='MI'>Michigan</option><option value='MN'>Minnesota</option><option value='MS'>Mississippi</option><option value='MO'>Missouri</option><option value='MT'>Montana</option><option value='NE'>Nebraska</option><option value='NV'>Nevada</option><option value='NH'>New Hampshire</option><option value='NJ'>New Jersey</option><option value='NM'>New Mexico</option><option value='NY'>New York</option><option value='NC'>North Carolina</option><option value='ND'>North Dakota</option><option value='MP'>Northern Mariana Islands</option><option value='OH'>Ohio</option><option value='OK'>Oklahoma</option><option value='OR'>Oregon</option><option value='PW'>Palau</option><option value='PA'>Pennsylvania</option><option value='PR'>Puerto Rico</option><option value='RI'>Rhode Island</option><option value='SC'>South Carolina</option><option value='SD'>South Dakota</option><option value='TN'>Tennessee</option><option value='TX'>Texas</option><option value='UT'>Utah</option><option value='VT'>Vermont</option><option value='VI'>Virgin Islands</option><option value='VA'>Virginia</option><option value='WA'>Washington</option><option value='WV'>West Virginia</option><option value='WI'>Wisconsin</option><option value='WY'>Wyoming</option></select>
<?
	} elseif ($_REQUEST['country'] == 'Canada' ) {
?>
<!--<label><b>State/Province</b>: </label>--> <select name='<?= $_REQUEST['fieldname'] ?>' id='<?= $_REQUEST['fieldname'] ?>' class='field'><option value='-1'>Select One</option><option value='AB'>Alberta</option><option value='BC'>British Columbia</option><option value='MB'>Manitoba</option><option value='NF'>Newfoundland</option><option value='NB'>New Brunswick</option><option value='NS'>Nova Scotia</option><option value='NT'>Northwest Territories</option><option value='NU'>Nunavut</option><option value='ON'>Ontario</option><option value='PE'>Prince Edward Island</option><option value='QC'>Quebec</option><option value='SK'>Saskatchewan</option><option value='YT'>Yukon Territory</option></select>
<?
	} elseif ($_REQUEST['country'] == 'Australia' ) {
?>
<!--<label><b>State/Province</b>: </label>--> <select name='<?= $_REQUEST['fieldname'] ?>' id='<?= $_REQUEST['fieldname'] ?>' class='field'><option value='-1'>Select One</option><option value='ACT'>Australian Capital Territory</option><option value='NSW'>New South Wales</option><option value='NT'>Northern Territory</option><option value='QLD'>Queensland</option><option value='SA'>South Australia</option><option value='TAS'>Tasmania</option><option value='VIC'>Victoria</option><option value='WA'>Western Australia</option></select><?
	} else {
	?>
<!--<label><b>State/Province</b>: </label>--> <input type='text' class='field' name='<?= $_REQUEST['fieldname'] ?>' id='<?= $_REQUEST['fieldname'] ?>' value='' />
	<?
	}
	exit;
} // end of if _REQUEST['ajaxAction'] == 'updateStates'

include('header.php');
?>
  <script>window.jQuery || document.write('<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js">\x3C/script>')</script><link rel='stylesheet' type='text/css' href="cart_new/css/payment_form.css" >

	<div id="content" class="right" style="background-color: #FFFFFF; padding: 10px"><h1>Shopping Cart</h1>
<div>
  <h2>Below is the description of your Order</h2>
  <h3 style="text-align: center"><?=$quantity?> Bottles of VitoSlim $<?=$price?></h3>
  <h3 style="text-align: center">TOTAL: $<?=$price?> + $<?=$_SESSION['shipping']?> = $<?=$_SESSION['total']?></h3>
</div>
              <div style='clear:both;height:15px;'>&nbsp;</div>
             <script type='text/javascript' src="cart_new/js/capture.js"></script>
             <input type='hidden' name='ajaxURL' id='ajaxURL' />
            <form name='frmOrder' id='frmOrder' method='post' action="paynet.php" onsubmit='return checkOrderForm();'  onkeypress='return event.keyCode != 13;'>
                        <input type='hidden' name='subTotal' id='subTotal' value='<?php echo $subtotal; ?>'>
                        <input type='hidden' name='totalTax' id='tax' value='0'>
                        <input type='hidden' name='totalShip' id='totalShip' value='14.97'>
                        <input type='hidden' name='totalSub' id='totalSub' value='<?php echo $subtotal; ?>'>
                        <input type='hidden' name='shipDesc' id='shipDesc' value='First Class Mail (3-5 Days)'>
                        <input type='hidden' name='cart_action' value='order'>
            <div id='payment_form'>
                <div class='divSpacer'></div><h2>Shipping Information</h2>
                        <div class='section2'>
                            <label><b>First Name</b>: </label>
                            <input type='text' class='field' id='shipFirstName' name='shipFirstName' value='' />
                            <div class='divSpacer'></div>

                            <label><b>Last Name</b>: </label>
                            <input type='text' class='field' id='shipLastName' name='shipLastName' value=''  />
                            <div class='divSpacer'></div>

                            <label><b>Address</b>: </label>
                            <input type='text' class='field' id='shipAddress' name='shipAddress' value=''  />
                            <div class='divSpacer'></div>

                            <label><b>City</b>: </label>
                            <input type='text' class='field' id='shipCity' name='shipCity' value=''  />
                            <div class='divSpacer'></div>

                            <label><b>Country</b>:</label><select name='shipCountry' id='shipCountry' class='field' onchange='useShip(this.value);updateStateCombo(this.value, "shipState", "shipStateBox");''><option value='-1'>Select One</option><option value='Afghanistan'>Afghanistan</option><option value='Albania'>Albania</option><option value='Algeria'>Algeria</option><option value='American Samoa'>American Samoa</option><option value='Andorra'>Andorra</option><option value='Angola'>Angola</option><option value='Anguilla'>Anguilla</option><option value='Antarctica'>Antarctica</option><option value='Antigua and Barbuda'>Antigua and Barbuda</option><option value='Argentina'>Argentina</option><option value='Armenia'>Armenia</option><option value='Aruba'>Aruba</option><option value='Australia'>Australia</option><option value='Austria'>Austria</option><option value='Azerbaijan'>Azerbaijan</option><option value='Bahamas'>Bahamas</option><option value='Bahrain'>Bahrain</option><option value='Bangladesh'>Bangladesh</option><option value='Barbados'>Barbados</option><option value='Belarus'>Belarus</option><option value='Belgium'>Belgium</option><option value='Belize'>Belize</option><option value='Benin'>Benin</option><option value='Bermuda'>Bermuda</option><option value='Bhutan'>Bhutan</option><option value='Bolivia'>Bolivia</option><option value='Bosnia and Herzegovina'>Bosnia and Herzegovina</option><option value='Botswana'>Botswana</option><option value='Bouvet Island'>Bouvet Island</option><option value='Brazil'>Brazil</option><option value='British Indian Ocean Territory'>British Indian Ocean Territory</option><option value='Brunei Darussalam'>Brunei Darussalam</option><option value='Bulgaria'>Bulgaria</option><option value='Burkina Faso'>Burkina Faso</option><option value='Burundi'>Burundi</option><option value='Cambodia'>Cambodia</option><option value='Cameroon'>Cameroon</option><option value='Canada'>Canada</option><option value='Cape Verde'>Cape Verde</option><option value='Cayman Islands'>Cayman Islands</option><option value='Central African Republic'>Central African Republic</option><option value='Chad'>Chad</option><option value='Chile'>Chile</option><option value='China'>China</option><option value='Christmas Island'>Christmas Island</option><option value='Cocos (Keeling) Islands'>Cocos (Keeling) Islands</option><option value='Colombia'>Colombia</option><option value='Comoros'>Comoros</option><option value='Congo'>Congo</option><option value='Congo, the Democratic Republic of the'>Congo, the Democratic Republic of the</option><option value='Cook Islands'>Cook Islands</option><option value='Costa Rica'>Costa Rica</option><option value='Croatia'>Croatia</option><option value='Cyprus'>Cyprus</option><option value='Czech Republic'>Czech Republic</option><option value='Denmark'>Denmark</option><option value='Djibouti'>Djibouti</option><option value='Dominica'>Dominica</option><option value='Dominican Republic'>Dominican Republic</option><option value='Ecuador'>Ecuador</option><option value='Egypt'>Egypt</option><option value='El Salvador'>El Salvador</option><option value='Equatorial Guinea'>Equatorial Guinea</option><option value='Eritrea'>Eritrea</option><option value='Estonia'>Estonia</option><option value='Ethiopia'>Ethiopia</option><option value='Falkland Islands (Malvinas)'>Falkland Islands (Malvinas)</option><option value='Faroe Islands'>Faroe Islands</option><option value='Fiji'>Fiji</option><option value='Finland'>Finland</option><option value='France'>France</option><option value='French Guiana'>French Guiana</option><option value='French Polynesia'>French Polynesia</option><option value='French Southern Territories'>French Southern Territories</option><option value='Gabon'>Gabon</option><option value='Gambia'>Gambia</option><option value='Georgia'>Georgia</option><option value='Germany'>Germany</option><option value='Gibraltar'>Gibraltar</option><option value='Greece'>Greece</option><option value='Greenland'>Greenland</option><option value='Grenada'>Grenada</option><option value='Guadeloupe'>Guadeloupe</option><option value='Guam'>Guam</option><option value='Guatemala'>Guatemala</option><option value='Guinea'>Guinea</option><option value='Guinea-Bissau'>Guinea-Bissau</option><option value='Guyana'>Guyana</option><option value='Haiti'>Haiti</option><option value='Heard Island and Mcdonald Islands'>Heard Island and Mcdonald Islands</option><option value='Holy See (Vatican City State)'>Holy See (Vatican City State)</option><option value='Honduras'>Honduras</option><option value='Hong Kong'>Hong Kong</option><option value='Hungary'>Hungary</option><option value='Iceland'>Iceland</option><option value='India'>India</option><option value='Indonesia'>Indonesia</option><option value='Iraq'>Iraq</option><option value='Ireland'>Ireland</option><option value='Israel'>Israel</option><option value='Italy'>Italy</option><option value='Jamaica'>Jamaica</option><option value='Japan'>Japan</option><option value='Jordan'>Jordan</option><option value='Kazakhstan'>Kazakhstan</option><option value='Kenya'>Kenya</option><option value='Kiribati'>Kiribati</option><option value='Korea, Republic of'>Korea, Republic of</option><option value='Kuwait'>Kuwait</option><option value='Kyrgyzstan'>Kyrgyzstan</option><option value='Latvia'>Latvia</option><option value='Lebanon'>Lebanon</option><option value='Lesotho'>Lesotho</option><option value='Liberia'>Liberia</option><option value='Libyan Arab Jamahiriya'>Libyan Arab Jamahiriya</option><option value='Liechtenstein'>Liechtenstein</option><option value='Lithuania'>Lithuania</option><option value='Luxembourg'>Luxembourg</option><option value='Macao'>Macao</option><option value='Macedonia, the Former Yugoslav Republic of'>Macedonia, the Former Yugoslav Republic of</option><option value='Madagascar'>Madagascar</option><option value='Malawi'>Malawi</option><option value='Malaysia'>Malaysia</option><option value='Maldives'>Maldives</option><option value='Mali'>Mali</option><option value='Malta'>Malta</option><option value='Marshall Islands'>Marshall Islands</option><option value='Martinique'>Martinique</option><option value='Mauritania'>Mauritania</option><option value='Mauritius'>Mauritius</option><option value='Mayotte'>Mayotte</option><option value='Mexico'>Mexico</option><option value='Micronesia, Federated States of'>Micronesia, Federated States of</option><option value='Moldova, Republic of'>Moldova, Republic of</option><option value='Monaco'>Monaco</option><option value='Mongolia'>Mongolia</option><option value='Montserrat'>Montserrat</option><option value='Morocco'>Morocco</option><option value='Mozambique'>Mozambique</option><option value='Myanmar'>Myanmar</option><option value='Namibia'>Namibia</option><option value='Nauru'>Nauru</option><option value='Nepal'>Nepal</option><option value='Netherlands'>Netherlands</option><option value='Netherlands Antilles'>Netherlands Antilles</option><option value='New Caledonia'>New Caledonia</option><option value='New Zealand'>New Zealand</option><option value='Nicaragua'>Nicaragua</option><option value='Niue'>Niue</option><option value='Norfolk Island'>Norfolk Island</option><option value='Northern Mariana Islands'>Northern Mariana Islands</option><option value='Norway'>Norway</option><option value='Oman'>Oman</option><option value='Pakistan'>Pakistan</option><option value='Palau'>Palau</option><option value='Palestinian Territory, Occupied'>Palestinian Territory, Occupied</option><option value='Panama'>Panama</option><option value='Papua New Guinea'>Papua New Guinea</option><option value='Paraguay'>Paraguay</option><option value='Peru'>Peru</option><option value='Philippines'>Philippines</option><option value='Pitcairn'>Pitcairn</option><option value='Poland'>Poland</option><option value='Portugal'>Portugal</option><option value='Puerto Rico'>Puerto Rico</option><option value='Qatar'>Qatar</option><option value='Reunion'>Reunion</option><option value='Romania'>Romania</option><option value='Russian Federation'>Russian Federation</option><option value='Rwanda'>Rwanda</option><option value='Saint Helena'>Saint Helena</option><option value='Saint Kitts and Nevis'>Saint Kitts and Nevis</option><option value='Saint Lucia'>Saint Lucia</option><option value='Saint Pierre and Miquelon'>Saint Pierre and Miquelon</option><option value='Saint Vincent and the Grenadines'>Saint Vincent and the Grenadines</option><option value='Samoa'>Samoa</option><option value='San Marino'>San Marino</option><option value='Sao Tome and Principe'>Sao Tome and Principe</option><option value='Saudi Arabia'>Saudi Arabia</option><option value='Senegal'>Senegal</option><option value='Serbia and Montenegro'>Serbia and Montenegro</option><option value='Seychelles'>Seychelles</option><option value='Sierra Leone'>Sierra Leone</option><option value='Singapore'>Singapore</option><option value='Slovakia'>Slovakia</option><option value='Slovenia'>Slovenia</option><option value='Solomon Islands'>Solomon Islands</option><option value='Somalia'>Somalia</option><option value='South Africa'>South Africa</option><option value='South Georgia and the South Sandwich Islands'>South Georgia and the South Sandwich Islands</option><option value='Spain'>Spain</option><option value='Sri Lanka'>Sri Lanka</option><option value='Suriname'>Suriname</option><option value='Svalbard and Jan Mayen'>Svalbard and Jan Mayen</option><option value='Swaziland'>Swaziland</option><option value='Sweden'>Sweden</option><option value='Switzerland'>Switzerland</option><option value='Taiwan'>Taiwan</option><option value='Tajikistan'>Tajikistan</option><option value='Tanzania, United Republic of'>Tanzania, United Republic of</option><option value='Thailand'>Thailand</option><option value='Timor-Leste'>Timor-Leste</option><option value='Togo'>Togo</option><option value='Tokelau'>Tokelau</option><option value='Tonga'>Tonga</option><option value='Trinidad and Tobago'>Trinidad and Tobago</option><option value='Tunisia'>Tunisia</option><option value='Turkey'>Turkey</option><option value='Turkmenistan'>Turkmenistan</option><option value='Turks and Caicos Islands'>Turks and Caicos Islands</option><option value='Tuvalu'>Tuvalu</option><option value='Uganda'>Uganda</option><option value='Ukraine'>Ukraine</option><option value='United Arab Emirates'>United Arab Emirates</option><option value='United Kingdom'>United Kingdom</option><option value='United States' selected='selected' >United States</option><option value='United States Minor Outlying Islands'>United States Minor Outlying Islands</option><option value='Uruguay'>Uruguay</option><option value='Uzbekistan'>Uzbekistan</option><option value='Vanuatu'>Vanuatu</option><option value='Venezuela'>Venezuela</option><option value='Viet Nam'>Viet Nam</option><option value='Virgin Islands, British'>Virgin Islands, British</option><option value='Virgin Islands, U.s.'>Virgin Islands, U.s.</option><option value='Wallis and Futuna'>Wallis and Futuna</option><option value='Western Sahara'>Western Sahara</option><option value='Yemen'>Yemen</option><option value='Zambia'>Zambia</option><option value='Zimbabwe'>Zimbabwe</option><option value='Isle of Man'>Isle of Man</option><option value='Jersey'>Jersey</option><option value='Guernsey'>Guernsey</option><option value='Lao People&#039;s Democratic Republic'>Lao People&#039;s Democratic Republic</option></select><div class='divSpacer'></div>


                            <div class="shipfields"><label><b>State/Province</b>:</label><div id='shipStateBox'><select name='shipState' id='shipState' class='field'><option value='-1'>Select One</option><option value='AL'>Alabama</option><option value='AK'>Alaska</option><option value='AS'>American Samoa</option><option value='AZ'>Arizona</option><option value='AR'>Arkansas</option><option value='AF'>Armed Forces Africa</option><option value='AA'>Armed Forces Americas</option><option value='AC'>Armed Forces Canada</option><option value='AE'>Armed Forces Europe</option><option value='AM'>Armed Forces Middle East</option><option value='AP'>Armed Forces Pacific</option><option value='CA'>California</option><option value='CO'>Colorado</option><option value='CT'>Connecticut</option><option value='DE'>Delaware</option><option value='DC'>District of Columbia</option><option value='FM'>Federated States Of Micronesia</option><option value='FL'>Florida</option><option value='GA'>Georgia</option><option value='GU'>Guam</option><option value='HI'>Hawaii</option><option value='ID'>Idaho</option><option value='IL'>Illinois</option><option value='IN'>Indiana</option><option value='IA'>Iowa</option><option value='KS'>Kansas</option><option value='KY'>Kentucky</option><option value='LA'>Louisiana</option><option value='ME'>Maine</option><option value='MH'>Marshall Islands</option><option value='MD'>Maryland</option><option value='MA'>Massachusetts</option><option value='MI'>Michigan</option><option value='MN'>Minnesota</option><option value='MS'>Mississippi</option><option value='MO'>Missouri</option><option value='MT'>Montana</option><option value='NE'>Nebraska</option><option value='NV'>Nevada</option><option value='NH'>New Hampshire</option><option value='NJ'>New Jersey</option><option value='NM'>New Mexico</option><option value='NY'>New York</option><option value='NC'>North Carolina</option><option value='ND'>North Dakota</option><option value='MP'>Northern Mariana Islands</option><option value='OH'>Ohio</option><option value='OK'>Oklahoma</option><option value='OR'>Oregon</option><option value='PW'>Palau</option><option value='PA'>Pennsylvania</option><option value='PR'>Puerto Rico</option><option value='RI'>Rhode Island</option><option value='SC'>South Carolina</option><option value='SD'>South Dakota</option><option value='TN'>Tennessee</option><option value='TX'>Texas</option><option value='UT'>Utah</option><option value='VT'>Vermont</option><option value='VI'>Virgin Islands</option><option value='VA'>Virginia</option><option value='WA'>Washington</option><option value='WV'>West Virginia</option><option value='WI'>Wisconsin</option><option value='WY'>Wyoming</option></select></div>
						</div>
                        <div class='divSpacer'></div>

                            <div style='clear: both;'>
							<label><b>Postal Code</b>: </label>
                            <input type='text' class='field' id='shipZip' name='shipZip' value=''  />
                            <div class='divSpacer'></div>
							</div>

                        <label><b>Phone:</b> </label>
                        <input type='text' class='field' id='phone' name='shipPhone' value=''  />
                        <div class='divSpacer'></div>

                        <label><b>Email</b>: </label>
                        <input type='text' class='field' id='shipEmail' name='shipEmail' value=''  />
                        <div class='divSpacer'></div>

                        <label> </label>
                        <input type='checkbox' name='useShipping' id='useShipping' checked='checked' style='margin:0 15px 0 150px;' value='true' onchange='$("#billingSec").toggleClass("hiddenBox");' > Billing Is Same As Shipping Information
                        <div class='divSpacer'></div>
                        </div>
                        <div>
                 </div>
                 <div id='billingSec' class='hiddenBox'>
                  <h2>Billing Information</h2>
                    <div class='section2'>
                        <label><b>First Name</b>: </label>
                        <input type='text' class='field' id='firstName' name='firstName' value=''  />
                        <div class='divSpacer'></div>

                        <label><b>Last Name</b>: </label>
                        <input type='text' class='field' id='lastName' name='lastName' value=''  />
                        <div class='divSpacer'></div>

                        <label><b>Address</b>: </label>
                        <input type='text' class='field' id='address' name='address' value=''  />
                        <div class='divSpacer'></div>

                        <label><b>City</b>: </label>
                        <input type='text' class='field' id='city' name='city' value=''  />
                        <div class='divSpacer'></div>

                        <label><b>Country</b>: </label><select name='country' id='country' class='field' onchange='useShip(this.value);updateStateCombo(this.value, "state", "stateBox");''><option value='-1'>Select One</option><option value='Afghanistan'>Afghanistan</option><option value='Albania'>Albania</option><option value='Algeria'>Algeria</option><option value='American Samoa'>American Samoa</option><option value='Andorra'>Andorra</option><option value='Angola'>Angola</option><option value='Anguilla'>Anguilla</option><option value='Antarctica'>Antarctica</option><option value='Antigua and Barbuda'>Antigua and Barbuda</option><option value='Argentina'>Argentina</option><option value='Armenia'>Armenia</option><option value='Aruba'>Aruba</option><option value='Australia'>Australia</option><option value='Austria'>Austria</option><option value='Azerbaijan'>Azerbaijan</option><option value='Bahamas'>Bahamas</option><option value='Bahrain'>Bahrain</option><option value='Bangladesh'>Bangladesh</option><option value='Barbados'>Barbados</option><option value='Belarus'>Belarus</option><option value='Belgium'>Belgium</option><option value='Belize'>Belize</option><option value='Benin'>Benin</option><option value='Bermuda'>Bermuda</option><option value='Bhutan'>Bhutan</option><option value='Bolivia'>Bolivia</option><option value='Bosnia and Herzegovina'>Bosnia and Herzegovina</option><option value='Botswana'>Botswana</option><option value='Bouvet Island'>Bouvet Island</option><option value='Brazil'>Brazil</option><option value='British Indian Ocean Territory'>British Indian Ocean Territory</option><option value='Brunei Darussalam'>Brunei Darussalam</option><option value='Bulgaria'>Bulgaria</option><option value='Burkina Faso'>Burkina Faso</option><option value='Burundi'>Burundi</option><option value='Cambodia'>Cambodia</option><option value='Cameroon'>Cameroon</option><option value='Canada'>Canada</option><option value='Cape Verde'>Cape Verde</option><option value='Cayman Islands'>Cayman Islands</option><option value='Central African Republic'>Central African Republic</option><option value='Chad'>Chad</option><option value='Chile'>Chile</option><option value='China'>China</option><option value='Christmas Island'>Christmas Island</option><option value='Cocos (Keeling) Islands'>Cocos (Keeling) Islands</option><option value='Colombia'>Colombia</option><option value='Comoros'>Comoros</option><option value='Congo'>Congo</option><option value='Congo, the Democratic Republic of the'>Congo, the Democratic Republic of the</option><option value='Cook Islands'>Cook Islands</option><option value='Costa Rica'>Costa Rica</option><option value='Croatia'>Croatia</option><option value='Cyprus'>Cyprus</option><option value='Czech Republic'>Czech Republic</option><option value='Denmark'>Denmark</option><option value='Djibouti'>Djibouti</option><option value='Dominica'>Dominica</option><option value='Dominican Republic'>Dominican Republic</option><option value='Ecuador'>Ecuador</option><option value='Egypt'>Egypt</option><option value='El Salvador'>El Salvador</option><option value='Equatorial Guinea'>Equatorial Guinea</option><option value='Eritrea'>Eritrea</option><option value='Estonia'>Estonia</option><option value='Ethiopia'>Ethiopia</option><option value='Falkland Islands (Malvinas)'>Falkland Islands (Malvinas)</option><option value='Faroe Islands'>Faroe Islands</option><option value='Fiji'>Fiji</option><option value='Finland'>Finland</option><option value='France'>France</option><option value='French Guiana'>French Guiana</option><option value='French Polynesia'>French Polynesia</option><option value='French Southern Territories'>French Southern Territories</option><option value='Gabon'>Gabon</option><option value='Gambia'>Gambia</option><option value='Georgia'>Georgia</option><option value='Germany'>Germany</option><option value='Gibraltar'>Gibraltar</option><option value='Greece'>Greece</option><option value='Greenland'>Greenland</option><option value='Grenada'>Grenada</option><option value='Guadeloupe'>Guadeloupe</option><option value='Guam'>Guam</option><option value='Guatemala'>Guatemala</option><option value='Guinea'>Guinea</option><option value='Guinea-Bissau'>Guinea-Bissau</option><option value='Guyana'>Guyana</option><option value='Haiti'>Haiti</option><option value='Heard Island and Mcdonald Islands'>Heard Island and Mcdonald Islands</option><option value='Holy See (Vatican City State)'>Holy See (Vatican City State)</option><option value='Honduras'>Honduras</option><option value='Hong Kong'>Hong Kong</option><option value='Hungary'>Hungary</option><option value='Iceland'>Iceland</option><option value='India'>India</option><option value='Indonesia'>Indonesia</option><option value='Iraq'>Iraq</option><option value='Ireland'>Ireland</option><option value='Israel'>Israel</option><option value='Italy'>Italy</option><option value='Jamaica'>Jamaica</option><option value='Japan'>Japan</option><option value='Jordan'>Jordan</option><option value='Kazakhstan'>Kazakhstan</option><option value='Kenya'>Kenya</option><option value='Kiribati'>Kiribati</option><option value='Korea, Republic of'>Korea, Republic of</option><option value='Kuwait'>Kuwait</option><option value='Kyrgyzstan'>Kyrgyzstan</option><option value='Latvia'>Latvia</option><option value='Lebanon'>Lebanon</option><option value='Lesotho'>Lesotho</option><option value='Liberia'>Liberia</option><option value='Libyan Arab Jamahiriya'>Libyan Arab Jamahiriya</option><option value='Liechtenstein'>Liechtenstein</option><option value='Lithuania'>Lithuania</option><option value='Luxembourg'>Luxembourg</option><option value='Macao'>Macao</option><option value='Macedonia, the Former Yugoslav Republic of'>Macedonia, the Former Yugoslav Republic of</option><option value='Madagascar'>Madagascar</option><option value='Malawi'>Malawi</option><option value='Malaysia'>Malaysia</option><option value='Maldives'>Maldives</option><option value='Mali'>Mali</option><option value='Malta'>Malta</option><option value='Marshall Islands'>Marshall Islands</option><option value='Martinique'>Martinique</option><option value='Mauritania'>Mauritania</option><option value='Mauritius'>Mauritius</option><option value='Mayotte'>Mayotte</option><option value='Mexico'>Mexico</option><option value='Micronesia, Federated States of'>Micronesia, Federated States of</option><option value='Moldova, Republic of'>Moldova, Republic of</option><option value='Monaco'>Monaco</option><option value='Mongolia'>Mongolia</option><option value='Montserrat'>Montserrat</option><option value='Morocco'>Morocco</option><option value='Mozambique'>Mozambique</option><option value='Myanmar'>Myanmar</option><option value='Namibia'>Namibia</option><option value='Nauru'>Nauru</option><option value='Nepal'>Nepal</option><option value='Netherlands'>Netherlands</option><option value='Netherlands Antilles'>Netherlands Antilles</option><option value='New Caledonia'>New Caledonia</option><option value='New Zealand'>New Zealand</option><option value='Nicaragua'>Nicaragua</option><option value='Niue'>Niue</option><option value='Norfolk Island'>Norfolk Island</option><option value='Northern Mariana Islands'>Northern Mariana Islands</option><option value='Norway'>Norway</option><option value='Oman'>Oman</option><option value='Pakistan'>Pakistan</option><option value='Palau'>Palau</option><option value='Palestinian Territory, Occupied'>Palestinian Territory, Occupied</option><option value='Panama'>Panama</option><option value='Papua New Guinea'>Papua New Guinea</option><option value='Paraguay'>Paraguay</option><option value='Peru'>Peru</option><option value='Philippines'>Philippines</option><option value='Pitcairn'>Pitcairn</option><option value='Poland'>Poland</option><option value='Portugal'>Portugal</option><option value='Puerto Rico'>Puerto Rico</option><option value='Qatar'>Qatar</option><option value='Reunion'>Reunion</option><option value='Romania'>Romania</option><option value='Russian Federation'>Russian Federation</option><option value='Rwanda'>Rwanda</option><option value='Saint Helena'>Saint Helena</option><option value='Saint Kitts and Nevis'>Saint Kitts and Nevis</option><option value='Saint Lucia'>Saint Lucia</option><option value='Saint Pierre and Miquelon'>Saint Pierre and Miquelon</option><option value='Saint Vincent and the Grenadines'>Saint Vincent and the Grenadines</option><option value='Samoa'>Samoa</option><option value='San Marino'>San Marino</option><option value='Sao Tome and Principe'>Sao Tome and Principe</option><option value='Saudi Arabia'>Saudi Arabia</option><option value='Senegal'>Senegal</option><option value='Serbia and Montenegro'>Serbia and Montenegro</option><option value='Seychelles'>Seychelles</option><option value='Sierra Leone'>Sierra Leone</option><option value='Singapore'>Singapore</option><option value='Slovakia'>Slovakia</option><option value='Slovenia'>Slovenia</option><option value='Solomon Islands'>Solomon Islands</option><option value='Somalia'>Somalia</option><option value='South Africa'>South Africa</option><option value='South Georgia and the South Sandwich Islands'>South Georgia and the South Sandwich Islands</option><option value='Spain'>Spain</option><option value='Sri Lanka'>Sri Lanka</option><option value='Suriname'>Suriname</option><option value='Svalbard and Jan Mayen'>Svalbard and Jan Mayen</option><option value='Swaziland'>Swaziland</option><option value='Sweden'>Sweden</option><option value='Switzerland'>Switzerland</option><option value='Taiwan'>Taiwan</option><option value='Tajikistan'>Tajikistan</option><option value='Tanzania, United Republic of'>Tanzania, United Republic of</option><option value='Thailand'>Thailand</option><option value='Timor-Leste'>Timor-Leste</option><option value='Togo'>Togo</option><option value='Tokelau'>Tokelau</option><option value='Tonga'>Tonga</option><option value='Trinidad and Tobago'>Trinidad and Tobago</option><option value='Tunisia'>Tunisia</option><option value='Turkey'>Turkey</option><option value='Turkmenistan'>Turkmenistan</option><option value='Turks and Caicos Islands'>Turks and Caicos Islands</option><option value='Tuvalu'>Tuvalu</option><option value='Uganda'>Uganda</option><option value='Ukraine'>Ukraine</option><option value='United Arab Emirates'>United Arab Emirates</option><option value='United Kingdom'>United Kingdom</option><option value='United States' selected='selected' >United States</option><option value='United States Minor Outlying Islands'>United States Minor Outlying Islands</option><option value='Uruguay'>Uruguay</option><option value='Uzbekistan'>Uzbekistan</option><option value='Vanuatu'>Vanuatu</option><option value='Venezuela'>Venezuela</option><option value='Viet Nam'>Viet Nam</option><option value='Virgin Islands, British'>Virgin Islands, British</option><option value='Virgin Islands, U.s.'>Virgin Islands, U.s.</option><option value='Wallis and Futuna'>Wallis and Futuna</option><option value='Western Sahara'>Western Sahara</option><option value='Yemen'>Yemen</option><option value='Zambia'>Zambia</option><option value='Zimbabwe'>Zimbabwe</option><option value='Isle of Man'>Isle of Man</option><option value='Jersey'>Jersey</option><option value='Guernsey'>Guernsey</option><option value='Lao People&#039;s Democratic Republic'>Lao People&#039;s Democratic Republic</option></select><div class='divSpacer'></div>

                        <label><b>State/Province</b>: </label><div id='stateBox'><select name='state' id='state' class='field'><option value='-1'>Select One</option><option value='AL'>Alabama</option><option value='AK'>Alaska</option><option value='AS'>American Samoa</option><option value='AZ'>Arizona</option><option value='AR'>Arkansas</option><option value='AF'>Armed Forces Africa</option><option value='AA'>Armed Forces Americas</option><option value='AC'>Armed Forces Canada</option><option value='AE'>Armed Forces Europe</option><option value='AM'>Armed Forces Middle East</option><option value='AP'>Armed Forces Pacific</option><option value='CA'>California</option><option value='CO'>Colorado</option><option value='CT'>Connecticut</option><option value='DE'>Delaware</option><option value='DC'>District of Columbia</option><option value='FM'>Federated States Of Micronesia</option><option value='FL'>Florida</option><option value='GA'>Georgia</option><option value='GU'>Guam</option><option value='HI'>Hawaii</option><option value='ID'>Idaho</option><option value='IL'>Illinois</option><option value='IN'>Indiana</option><option value='IA'>Iowa</option><option value='KS'>Kansas</option><option value='KY'>Kentucky</option><option value='LA'>Louisiana</option><option value='ME'>Maine</option><option value='MH'>Marshall Islands</option><option value='MD'>Maryland</option><option value='MA'>Massachusetts</option><option value='MI'>Michigan</option><option value='MN'>Minnesota</option><option value='MS'>Mississippi</option><option value='MO'>Missouri</option><option value='MT'>Montana</option><option value='NE'>Nebraska</option><option value='NV'>Nevada</option><option value='NH'>New Hampshire</option><option value='NJ'>New Jersey</option><option value='NM'>New Mexico</option><option value='NY'>New York</option><option value='NC'>North Carolina</option><option value='ND'>North Dakota</option><option value='MP'>Northern Mariana Islands</option><option value='OH'>Ohio</option><option value='OK'>Oklahoma</option><option value='OR'>Oregon</option><option value='PW'>Palau</option><option value='PA'>Pennsylvania</option><option value='PR'>Puerto Rico</option><option value='RI'>Rhode Island</option><option value='SC'>South Carolina</option><option value='SD'>South Dakota</option><option value='TN'>Tennessee</option><option value='TX'>Texas</option><option value='UT'>Utah</option><option value='VT'>Vermont</option><option value='VI'>Virgin Islands</option><option value='VA'>Virginia</option><option value='WA'>Washington</option><option value='WV'>West Virginia</option><option value='WI'>Wisconsin</option><option value='WY'>Wyoming</option></select></div><div class='divSpacer'></div>
                          <div style='clear: both;'>
                            <label><b>Postal Code</b>: </label>
                            <input type='text' class='field' id='zip' name='zip' value=''  />
                            <div class='divSpacer'></div>
              						</div>
                        </div>
                      </div>
                      <div id='creditcardBox' class='CC '>
<!--hide PAN data
                        <h2 style='color:#a10332'>Credit Card Information</h2>
                          <div class='section2'>
                            <label><b>Card Number</b>: </label>
                            <input type='text' class='field' id='cardNumber' name='cardNumber' size='25' style='width:164px;'  />
                            <div class='divSpacer'></div>
                            <div class='divSpacer'></div>

                              <label><b>Card Printed Name</b>: </label>
                              <input type='text' class='field' id='cardPrintedName' name='cardPrintedName' size='255' style='width:164px;'  />
                              <div class='divSpacer'></div>
                              <div class='divSpacer'></div>


                            <label><b>Expiration Date</b>: </label>
                            <select name='expMo' id='expMo' class='fields'>
                                <option value='01'>01 - Jan</option>
                                <option value='02'>02 - Feb</option>
                                <option value='03'>03 - Mar</option>
                                <option value='04'>04 - Apr</option>
                                <option value='05'>05 - May</option>
                                <option value='06'>06 - Jun</option>
                                <option value='07'>07 - Jul</option>
                                <option value='08'>08 - Aug</option>
                                <option value='09'>09 - Sep</option>
                                <option value='10'>10 - Oct</option>
                                <option value='11'>11 - Nov</option>
                                <option value='12'>12 - Dec</option>
                            </select>
                            <select name='expYr' id='expYr' class='fields'><option value='2017'>2017</option><option value='2018'>2018</option><option value='2019'>2019</option><option value='2020'>2020</option><option value='2021'>2021</option><option value='2022'>2022</option><option value='2023'>2023</option><option value='2024'>2024</option><option value='2025'>2025</option></select>
                            <div class='divSpacer'></div><label><b>CVV</b>: </label>
                                <input type='text' class='fields' id='cvv' name='cvv' style='width:50px;'> <a onclick="$('#cvvBox').toggleClass('hiddenBox');" style='border-bottom:none;'><img src="cart_new/images/ico_question.jpg" title='CVV Information' class='click' style='margin-top:1px;'/></a>
                                <div class='cvvBox hiddenBox' id='cvvBox'><div class='BoxClose' onclick="$('#cvvBox').toggleClass('hiddenBox');" style='background: url("/cart_new/images/controls.png") no-repeat scroll 0 0 transparent;background-position: -50px 0;'>&nbsp;</div>
                                <p>For Visa, MasterCard, and Discover cards, the card code is the last 3 digit number located on the BACK of your card on or above your signature line.</p>
                                <p>For American Express card, it is the 4 digits on the FRONT above the end of your card number<br><br></p>
                                <img src="cart_new/images/cvv_info-amex.jpg" title='CVV Credit Card Information Display' style='margin-left:55px' />
                          </div>
hide PAN data -->

                          <div class='divSpacer'></div>
			<div style="text-align: center"><img src="/img/mc.gif"><img src="/img/visa.gif"></div>
                      </div>
                    </div><div id='paymentButtonCC' class='CC' style='text-align:center;'>
<script>
function iagreecheck(v) {
	if (v) {
	}
}
</script>
<br><div><input type=checkbox checked onchange="iagreecheck(this.value);">&nbsp;I agree to <a target="_blank" href="termsandcondition.html">Terms and Conditions</a></div><br>
                  <input type='image' src="images/checkout/place-order-button.png" alt='Submit Order' name='Submit' onclick='$("#PaymentTypeCC").attr("checked",true);' />
    <br><div>Sold and fulfilled by<br>
                  <div style="text-align:left;"><img src="qualitrade-black.png"></div>
                  </div>
                  </div>
               </form>
               <script type='text/javascript'>if ( $('#shipType_US').is(':hidden') ) { $('#shipType_US').show();$('#shipType_International').hide();$('#shipType_Canada').hide();}</script>
  <!-- end of alternateOrder -->
  <div class="clear"></div>





<div class="clear"></div>
<div class="hr"><hr /></div>

    <!-- InstanceEndEditable -->
    </div>
<div class="clear"></div>
	</div>
<div class="clear"></div>
<?php include('footer.php'); ?>