<?php

    $qntArr = array(
        1 => '39.00',
        2 => '73.00',
        3 => '107.00',
        6 => '189.00',
        9 => '261.00',
    );
    $shippingArr = array(
        1 => '9.95',
        2 => '24.95',
    );

    $mustArr = array(
        'fname',
        'billing_cust_address',
        'billing_cust_city',
        'billing_cust_state',
        'billing_cust_zip',
        'billing_cust_country',
        'billing_cust_email',
        'billing_cust_tel',
        'delivery_cust_name',
        'delivery_cust_address',
        'delivery_cust_city',
        'delivery_cust_state',
        'delivery_cust_zip',
        'delivery_cust_country',
        'delivery_cust_tel',
        'agree',
        'card_name',
        'cc_number',
        'cc_type',
        'cc_exp_month',
        'cc_exp_year',
        'cc_cvv2',
        //'issuing_bank',
    );
    $error = false;
    if ( !empty($_POST['submit']) ) {
        foreach ( $mustArr as $k => $v ) {
#            if ( empty(trim($_POST[$v])) ) {
            if ( empty($_POST[$v]) ) {

                $error = true;
            }
        }
        //var_dump($error);
        if ( !$error ) {
            header('Location: ok.php');
            die;
        }
    }



    function emptyTest($a) {
        if ( !empty($_POST['submit']) ) {
#            if (empty(trim($_POST[$a]))) {
            if (empty($_POST[$a])) {

                echo '<div class="error">Error! Empty Field.</div>';
            }
        }

    }


//    p($_POST);

    function p($a) {
        echo '<pre>';
        print_r($a);
        echo '</pre>';
    }
    #p($qntArr[$_POST['quantity']]);
    #p($_POST);
    #die;

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

?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Secured Order Page : 256-bit Encryption</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link href="/checkout/themes/vitoslim_new/vito_sinfo.css" type="text/css" rel="stylesheet">
    <link href="/checkout/themes/vitoslim_new/style.css" type="text/css" rel="stylesheet">
    <script type="text/javascript" src="/checkout/js/order.js"></script>
    <script type="text/javascript" src="/checkout/js/secvalidate_wb.js"></script>
    <script type="text/javascript" src="/checkout/js/jquery.min.js"></script>
    <style type="text/css">
        .error {
            color:  red;;
            font-size: 10px;
            font-weight: bold;
        }
    </style>

    <script type="text/javascript">
        function popjack() {
            window.open('http://www.vitopharma.com/termsandcondition.html', 'popjack', 'toolbar=no,location=no,directories=no,status=no,menubar=no,resizable=no,copyhistory=no,scrollbars=yes,width=640,height=480');
        }

        function popjack2() {
            window.open('CC.html', 'popjack2', 'toolbar=no,location=no,directories=no,status=no,menubar=no,resizable=no,copyhistory=no,scrollbars=yes,width=350,height=405');
        }
    </script>
</head>
<body bgcolor="#FFFFFF">
<div id="main_bg">
    <div id="main_wrapper">
        <div id="wrapper_inner">
            <div class="inner_wrapper">
                <div class="inner_left">
                    <div class="logo"><img border="0" alt="Vito Slim" src="/checkout/themes/vitoslim_new/images/logo.png">
                    </div>
                </div>
                <div class="inner_right">
                    <div class="swoosh_box"><img width="660" height="153" src="/checkout/themes/vitoslim_new/images/order-arrow.png" alt="order"></div>
                </div>
    <form name="frmcart" id="frmcart" action="" method="post" onsubmit="return formCheck()">
        <input type="hidden" name="orderlogo" value="">
        <input type="hidden" name="total" value="<?php echo $qntArr[$_POST['quantity']]; ?>">
        <input type="hidden" name="crttotal" value="<?php echo $qntArr[$_POST['quantity']]; ?>">
        <input type="hidden" name="quantity" value="<?php echo $_POST['quantity']; ?>">
        <input type="hidden" name="shipping_method" value="<?php echo $_POST['shipping_method']; ?>">
        <input type="hidden" name="shipping_cost" value="">
        <input type="hidden" name="stype" value="">
        <input type="hidden" name="productship" value="">
        <input type="hidden" name="order" value="1">
        <input type="hidden" name="Amount" value="">
        <input type="hidden" name="inr" value="">
        <input type="hidden" name="ip" value="">
        <input type="hidden" name="ptype" value="hoodiagordonii">
        <input type="hidden" name="billing_cust_notes" value="">
        <input type="hidden" name="shipment_type" value="">
        <input type="hidden" name="payment_type" id="payment_type" value="">
        <input type="hidden" name="shipfree" id="shipfree" value="">
        <input type="hidden" name="wire_track_id" value="">
        <input type="hidden" name="userlang" id="userlang" value="english">
        <input type="hidden" name="thankyou_page" id="thankyou_page" value="">
        <input type="hidden" name="cms" id="thankyou_page" value="">
        <input type="hidden" name="urlsig" value="www.hoodia-absolute.com">
        <input type="hidden" name="referer" value="http://google.com/">
        <input type="hidden" name="pasteStatus_billing_cust_name" id="pasteStatus_billing_cust_name" value="0"/>
        <input type="hidden" name="pasteStatus_billing_cust_address" id="pasteStatus_billing_cust_address" value="0"/>
        <input type="hidden" name="pasteStatus_card_name" id="pasteStatus_card_name" value="0"/>
        <input type="hidden" name="pasteStatus_cc_number" id="pasteStatus_cc_number" value="0"/>
        <input type="hidden" name="pasteStatus_cc_cvv2" id="pasteStatus_cc_cvv2" value="0"/>
        <input type="hidden" name="pasteStatus_cc_MM" id="pasteStatus_cc_MM" value="0"/>
        <input type="hidden" name="pasteStatus_cc_YYYY" id="pasteStatus_cc_YYYY" value="0"/>
        <input type="hidden" name="pasteStatus_issuing_bank" id="pasteStatus_issuing_bank" value="0"/>
        <input type="hidden" name="pasteStatus_billing_cust_email" id="pasteStatus_billing_cust_email" value="0"/>
        <input type="hidden" id="deleteStatus" name="deleteStatus" value="0">
        <input type="hidden" id="deleteStatus_card_name" name="deleteStatus_card_name" value="0">
        <input type="hidden" id="deleteStatus_cc_number" name="deleteStatus_cc_number" value="0">
        <input type="hidden" id="deleteStatus_cc_cvv2" name="deleteStatus_cc_cvv2" value="0">
        <input type="hidden" id="deleteStatus_issuing_bank" name="deleteStatus_issuing_bank" value="0">
        <input type="hidden" id="backspaceStatus_card_name" name="backspaceStatus_card_name" value="0">
        <input type="hidden" id="backspaceStatus_cc_number" name="backspaceStatus_cc_number" value="0">
        <input type="hidden" id="backspaceStatus_cc_cvv2" name="backspaceStatus_cc_cvv2" value="0">
        <input type="hidden" id="backspaceStatus_issuing_bank" name="backspaceStatus_issuing_bank" value="0">
        <input type="hidden" id="focusStatus" name="focusStatus" value="0">

        <table width="752" align="center" border="0" cellpadding="0" cellspacing="0">
            <tbody>
            <tr>
                <td>
                    <div style="position:relative;">
                        <img alt="" src="/checkout/images/litessl_tl_trans.gif"
                             style="display:none;position:absolute;left:640px;top:-53px;"/>
                    </div>
                    <table width="720" border="0" align="center" cellpadding="0" cellspacing="0">
                        <tr>
                            <td bgcolor="#CCCCCC">
                                <table id="inner_table" width="720" align="center" border="0" cellpadding="0"
                                       cellspacing="1">
                                    <tbody>
                                    <tr>
                                        <td bgcolor="#FFFFFF" colspan="2"><br>
                                            <table width="700" align="center" bgcolor="#ffffff" border="0"
                                                   cellpadding="0" cellspacing="0">
                                                <tbody>
                                                <tr>
                                                    <td class="boxheader" width="100%">
                                                        &nbsp;
                                                        <img alt="" src="/checkout/images/g-hspcr.gif" width="9"
                                                             height="10">
                                                        Below is the description of your Order
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2" class="boxbody"><br>
                                                        <table width="98%" align="center" border="0" cellpadding="0"
                                                               cellspacing="0">
                                                            <tbody>
                                                            <tr>
                                                                <td width="50%" valign="bottom">
                                                                    <table width="310" align="center" border="0"
                                                                           cellpadding="0" cellspacing="0">
                                                                        <tbody>
                                                                        <tr>
                                                                            <td>
                                                                                <table width="310" align="center"
                                                                                       border="0" cellpadding="0"
                                                                                       cellspacing="0">
                                                                                    <tbody>
                                                                                    <tr>
                                                                                        <td>
                                                                                            <!-- cart -->
                                                                                            <table align="center"
                                                                                                   border="0"
                                                                                                   cellpadding="0"
                                                                                                   cellspacing="1"
                                                                                                   width="100%">
                                                                                                <tbody>
                                                                                                <tr>
                                                                                                    <td>
                                                                                                        <p>
                                                                                                            <?php echo $_POST['quantity']; ?> Bottles of VitoSlim
                                                                                                        </p>
                                                                                                    </td>
                                                                                                    <td>
                                                                                                        <span
                                                                                                            class="price"><div
                                                                                                                id="itemprice0">
                                                                                                                $<?php echo $qntArr[$_POST['quantity']]; ?>
                                                                                                            </div></span>
                                                                                                    </td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td>
                                                                                                        TOTAL
                                                                                                    </td>
                                                                                                    <td>
                                                                                                        $<?php echo $qntArr[$_POST['quantity']]; ?> + $<?php echo $shippingArr[$_POST['shipping_method']]; ?> = $<?php echo $shippingArr[$_POST['shipping_method']] + $qntArr[$_POST['quantity']]; ?>
                                                                                                    </td>
                                                                                                </tr>
                                                                                                </tbody>
                                                                                            </table>
                                                                                        </td>
                                                                                    </tr>
                                                                                    </tbody>
                                                                                </table>
                                                                                <!-- cart end -->
                                                                            </td>
                                                                        </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </td>
                                                            </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td bgcolor="#FFFFFF"><br>
                                                        <table width="700" align="center" bgcolor="#ffffff" border="0"
                                                               cellpadding="0" cellspacing="0">
                                                            <tbody>
                                                            <tr>
                                                                <td class="boxheader" width="50%">&nbsp;&nbsp;<img
                                                                        alt="" src="/checkout/images/g-hspcr.gif"
                                                                        width="9" height="10">Billing information
                                                                </td>
                                                                <td class="boxheader" width="50%">&nbsp;&nbsp;<img
                                                                        alt="" src="/checkout/images/g-hspcr.gif"
                                                                        width="9" height="10">Shipping Information
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="2" class="boxbody"><br>
                                                                    <table width="98%" align="center" border="0"
                                                                           cellpadding="0" cellspacing="0">
                                                                        <tbody>
                                                                        <tr>
                                                                            <td width="50%" valign="bottom">
                                                                                <table width="310" align="center"
                                                                                       border="0" cellpadding="0"
                                                                                       cellspacing="0">
                                                                                    <tbody>
                                                                                    <!-- full name -->
                                                                                    <tr>
                                                                                        <td>
                                                                                            <table width="310"
                                                                                                   align="center"
                                                                                                   border="0"
                                                                                                   cellpadding="0"
                                                                                                   cellspacing="0">
                                                                                                <tbody>
                                                                                                <tr>
                                                                                                    <td class="fieldheader"
                                                                                                        nowrap="nowrap">
                                                                                                        <img alt=""
                                                                                                             src="/checkout/images/bullet1.gif"
                                                                                                             width="10"
                                                                                                             height="9">

                                                                                                        Full Name:
                                                                                                    </td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td nowrap="nowrap">
                                                                                                        <input
                                                                                                            class="input"
                                                                                                            style="width: 310px;"
                                                                                                            type="text"
                                                                                                            name="fname"
                                                                                                            id="fname"
                                                                                                            value="<?php echo htmlspecialchars($_POST['fname']); ?>">
                                                                                                            <?php emptyTest('fname'); ?>
                                                                                                    </td>
                                                                                                </tr>
                                                                                                </tbody>
                                                                                            </table>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <!-- full name end -->
                                                                                    <tr>
                                                                                        <td><img alt=""
                                                                                                 src="/checkout/images/spacer.gif"
                                                                                                 width="1" height="3">
                                                                                        </td>
                                                                                    </tr>
                                                                                    <!-- billing address -->
                                                                                    <tr>
                                                                                        <td class="fieldheader"
                                                                                            nowrap="nowrap">
                                                                                            <img alt=""
                                                                                                 src="/checkout/images/bullet1.gif"
                                                                                                 width="10" height="9">

                                                                                            Address:
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td nowrap="nowrap">
                                                                                            <textarea
                                                                                                class="textarea marginb"
                                                                                                id="billing_cust_address"
                                                                                                name="billing_cust_address"
                                                                                                rows="3"
                                                                                                cols="20"><?php echo htmlspecialchars($_POST['billing_cust_address']); ?></textarea>
                                                                                            <?php emptyTest('fname'); ?>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <!-- billing address end -->
                                                                                    <tr>
                                                                                        <td><img alt=""
                                                                                                 src="/checkout/images/spacer.gif"
                                                                                                 width="1" height="3">
                                                                                        </td>
                                                                                    </tr>
                                                                                    <!-- billing city -->
                                                                                    <tr>
                                                                                        <td class="fieldheader"
                                                                                            nowrap="nowrap">
                                                                                            <img alt=""
                                                                                                 src="/checkout/images/bullet1.gif"
                                                                                                 width="10" height="9">

                                                                                            City:
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td nowrap="nowrap">
                                                                                            <input class="input"
                                                                                                   style="width: 310px;"
                                                                                                   type="text"
                                                                                                   name="billing_cust_city"
                                                                                                   id="billing_cust_city"
                                                                                                   value="<?php echo htmlspecialchars($_POST['billing_cust_city']); ?>"
                                                                                                   type="text">
                                                                                            <?php emptyTest('billing_cust_city'); ?>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <!-- billing city end -->
                                                                                    <!-- billing state and zip -->
                                                                                    <tr>
                                                                                        <td>
                                                                                            <table width="310"
                                                                                                   align="center"
                                                                                                   border="0"
                                                                                                   cellpadding="0"
                                                                                                   cellspacing="0">
                                                                                                <tbody>
                                                                                                <tr>
                                                                                                    <td class="fieldheader"
                                                                                                        nowrap="nowrap">
                                                                                                        &nbsp;

																																<span
                                                                                                                                    id="staterequired"
                                                                                                                                    style="display: none">
																																	<img
                                                                                                                                        alt=""
                                                                                                                                        src="/checkout/images/bullet1.gif"
                                                                                                                                        width="10"
                                                                                                                                        height="9">
																																	State/Province:

																																</span>
																																<span
                                                                                                                                    id="stateoptional"
                                                                                                                                    style="display: block">
																																	<img
                                                                                                                                        alt=""
                                                                                                                                        src="/checkout/images/bullet1.gif"
                                                                                                                                        width="10"
                                                                                                                                        height="9">
																																	State/Province:
																																</span>

                                                                                                    </td>
                                                                                                    <td class="fieldheader"
                                                                                                        nowrap="nowrap">
                                                                                                        <img alt=""
                                                                                                             src="/checkout/images/spacer.gif"
                                                                                                             width="10"
                                                                                                             height="1">
                                                                                                    </td>
                                                                                                    <td class="fieldheader"
                                                                                                        nowrap="nowrap">
                                                                                                        <img alt=""
                                                                                                             src="/checkout/images/bullet1.gif"
                                                                                                             width="10"
                                                                                                             height="9">
                                                                                                        Zip/Postal Code:
                                                                                                    </td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td nowrap="nowrap">
                                                                                                        <input
                                                                                                            class="input"
                                                                                                            style="width: 200px;"
                                                                                                            name="billing_cust_state"
                                                                                                            id="billing_cust_state"
                                                                                                            value="<?php echo htmlspecialchars($_POST['billing_cust_state']); ?>"
                                                                                                            type="text">
                                                                                                        <?php emptyTest('billing_cust_state'); ?>
                                                                                                    </td>
                                                                                                    <td class="fieldheader"
                                                                                                        nowrap="nowrap">
                                                                                                        <img alt=""
                                                                                                             src="/checkout/images/spacer.gif"
                                                                                                             width="10"
                                                                                                             height="1">
                                                                                                    </td>
                                                                                                    <td nowrap="nowrap">
                                                                                                        <input
                                                                                                            class="input"
                                                                                                            style="width: 100px;"
                                                                                                            name="billing_cust_zip"
                                                                                                            id="billing_cust_zip"
                                                                                                            value="<?php echo htmlspecialchars($_POST['billing_cust_zip']); ?>"
                                                                                                            type="text">
                                                                                                        <?php emptyTest('billing_cust_zip'); ?>
                                                                                                    </td>
                                                                                                </tr>
                                                                                                </tbody>
                                                                                            </table>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <!-- billing state and zip end -->
                                                                                    <tr>
                                                                                        <td><img alt=""
                                                                                                 src="/checkout/images/spacer.gif"
                                                                                                 width="1" height="3">
                                                                                        </td>
                                                                                    </tr>
                                                                                    <!-- billing country -->
                                                                                    <tr id="billing_cust_country_capture">
                                                                                        <td class="fieldheader"
                                                                                            height="20" nowrap="nowrap">
                                                                                            <img alt=""
                                                                                                 src="/checkout/images/bullet1.gif"
                                                                                                 width="10" height="9">

                                                                                            Country:
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr id="billing_cust_country_element">
                                                                                        <td nowrap="nowrap">
                                                                                            <select class="input"
                                                                                                    style="width: 200px;"
                                                                                                    name="billing_cust_country"
                                                                                                    id="billing_cust_country"
                                                                                                    onchange="copyFields()">
                                                                                                <option value=0>Select
                                                                                                    One
                                                                                                </option>



                                                                                                <option
                                                                                                    value="Aland Islands">
                                                                                                    Aland Islands
                                                                                                </option>
                                                                                                <option value="Albania">
                                                                                                    Albania
                                                                                                </option>
                                                                                                <option value="Algeria">
                                                                                                    Algeria
                                                                                                </option>
                                                                                                <option
                                                                                                    value="American Samoa">
                                                                                                    American Samoa
                                                                                                </option>
                                                                                                <option value="Andorra">
                                                                                                    Andorra
                                                                                                </option>
                                                                                                <option value="Angola">
                                                                                                    Angola
                                                                                                </option>
                                                                                                <option
                                                                                                    value="Anguilla">
                                                                                                    Anguilla
                                                                                                </option>
                                                                                                <option
                                                                                                    value="Antarctica">
                                                                                                    Antarctica
                                                                                                </option>
                                                                                                <option
                                                                                                    value="Antigua and Barbuda">
                                                                                                    Antigua and Barbuda
                                                                                                </option>
                                                                                                <option
                                                                                                    value="Argentina">
                                                                                                    Argentina
                                                                                                </option>
                                                                                                <option value="Armenia">
                                                                                                    Armenia
                                                                                                </option>
                                                                                                <option value="Aruba">
                                                                                                    Aruba
                                                                                                </option>
                                                                                                <option
                                                                                                    value="Australia">
                                                                                                    Australia
                                                                                                </option>
                                                                                                <option value="Austria">
                                                                                                    Austria
                                                                                                </option>
                                                                                                <option
                                                                                                    value="Azerbaijan">
                                                                                                    Azerbaijan
                                                                                                </option>
                                                                                                <option value="Bahamas">
                                                                                                    Bahamas
                                                                                                </option>
                                                                                                <option value="Bahrain">
                                                                                                    Bahrain
                                                                                                </option>
                                                                                                <option
                                                                                                    value="Bangladesh">
                                                                                                    Bangladesh
                                                                                                </option>
                                                                                                <option
                                                                                                    value="Barbados">
                                                                                                    Barbados
                                                                                                </option>
                                                                                                <option value="Belarus">
                                                                                                    Belarus
                                                                                                </option>
                                                                                                <option value="Belgium">
                                                                                                    Belgium
                                                                                                </option>
                                                                                                <option value="Belize">
                                                                                                    Belize
                                                                                                </option>
                                                                                                <option value="Benin">
                                                                                                    Benin
                                                                                                </option>
                                                                                                <option value="Bermuda">
                                                                                                    Bermuda
                                                                                                </option>
                                                                                                <option value="Bhutan">
                                                                                                    Bhutan
                                                                                                </option>
                                                                                                <option value="Bolivia">
                                                                                                    Bolivia
                                                                                                </option>
                                                                                                <option
                                                                                                    value="Bosnia and Herzegovina">
                                                                                                    Bosnia and
                                                                                                    Herzegovina
                                                                                                </option>
                                                                                                <option
                                                                                                    value="Botswana">
                                                                                                    Botswana
                                                                                                </option>
                                                                                                <option
                                                                                                    value="Bouvet Island">
                                                                                                    Bouvet Island
                                                                                                </option>
                                                                                                <option value="Brazil">
                                                                                                    Brazil
                                                                                                </option>
                                                                                                <option
                                                                                                    value="British Indian Ocean Territory">
                                                                                                    British Indian Ocean
                                                                                                    Territory
                                                                                                </option>
                                                                                                <option
                                                                                                    value="British Virgin Islands">
                                                                                                    British Virgin
                                                                                                    Islands
                                                                                                </option>
                                                                                                <option value="Brunei">
                                                                                                    Brunei
                                                                                                </option>
                                                                                                <option
                                                                                                    value="Bulgaria">
                                                                                                    Bulgaria
                                                                                                </option>
                                                                                                <option
                                                                                                    value="Burkina Faso">
                                                                                                    Burkina Faso
                                                                                                </option>
                                                                                                <option value="Burundi">
                                                                                                    Burundi
                                                                                                </option>
                                                                                                <option
                                                                                                    value="Cambodia">
                                                                                                    Cambodia
                                                                                                </option>
                                                                                                <option
                                                                                                    value="Cameroon">
                                                                                                    Cameroon
                                                                                                </option>
                                                                                                <option value="Canada">
                                                                                                    Canada
                                                                                                </option>
                                                                                                <option
                                                                                                    value="Cape Verde">
                                                                                                    Cape Verde
                                                                                                </option>
                                                                                                <option
                                                                                                    value="Cayman Islands">
                                                                                                    Cayman Islands
                                                                                                </option>
                                                                                                <option
                                                                                                    value="Central African Republic">
                                                                                                    Central African
                                                                                                    Republic
                                                                                                </option>
                                                                                                <option value="Chad">
                                                                                                    Chad
                                                                                                </option>
                                                                                                <option value="Chile">
                                                                                                    Chile
                                                                                                </option>
                                                                                                <option value="China">
                                                                                                    China
                                                                                                </option>
                                                                                                <option
                                                                                                    value="Christmas Island">
                                                                                                    Christmas Island
                                                                                                </option>
                                                                                                <option
                                                                                                    value="Cocos (Keeling) Islands">
                                                                                                    Cocos (Keeling)
                                                                                                    Islands
                                                                                                </option>
                                                                                                <option
                                                                                                    value="Colombia">
                                                                                                    Colombia
                                                                                                </option>
                                                                                                <option value="Comoros">
                                                                                                    Comoros
                                                                                                </option>
                                                                                                <option value="Congo">
                                                                                                    Congo
                                                                                                </option>
                                                                                                <option
                                                                                                    value="Cook Islands">
                                                                                                    Cook Islands
                                                                                                </option>
                                                                                                <option
                                                                                                    value="Costa Rica">
                                                                                                    Costa Rica
                                                                                                </option>
                                                                                                <option value="Croatia">
                                                                                                    Croatia
                                                                                                </option>
                                                                                                <option value="Cyprus">
                                                                                                    Cyprus
                                                                                                </option>
                                                                                                <option
                                                                                                    value="Czech Republic">
                                                                                                    Czech Republic
                                                                                                </option>
                                                                                                <option
                                                                                                    value="Democratic Republic of Congo">
                                                                                                    Democratic Republic
                                                                                                    of Congo
                                                                                                </option>
                                                                                                <option value="Denmark">
                                                                                                    Denmark
                                                                                                </option>
                                                                                                <option
                                                                                                    value="Disputed Territory">
                                                                                                    Disputed Territory
                                                                                                </option>
                                                                                                <option
                                                                                                    value="Djibouti">
                                                                                                    Djibouti
                                                                                                </option>
                                                                                                <option
                                                                                                    value="Dominica">
                                                                                                    Dominica
                                                                                                </option>
                                                                                                <option
                                                                                                    value="Dominican Republic">
                                                                                                    Dominican Republic
                                                                                                </option>
                                                                                                <option
                                                                                                    value="East Timor">
                                                                                                    East Timor
                                                                                                </option>
                                                                                                <option value="Ecuador">
                                                                                                    Ecuador
                                                                                                </option>
                                                                                                <option value="Egypt">
                                                                                                    Egypt
                                                                                                </option>
                                                                                                <option
                                                                                                    value="El Salvador">
                                                                                                    El Salvador
                                                                                                </option>
                                                                                                <option
                                                                                                    value="Equatorial Guinea">
                                                                                                    Equatorial Guinea
                                                                                                </option>
                                                                                                <option value="Eritrea">
                                                                                                    Eritrea
                                                                                                </option>
                                                                                                <option value="Estonia">
                                                                                                    Estonia
                                                                                                </option>
                                                                                                <option
                                                                                                    value="Ethiopia">
                                                                                                    Ethiopia
                                                                                                </option>
                                                                                                <option
                                                                                                    value="Falkland Islands">
                                                                                                    Falkland Islands
                                                                                                </option>
                                                                                                <option
                                                                                                    value="Faroe Islands">
                                                                                                    Faroe Islands
                                                                                                </option>
                                                                                                <option
                                                                                                    value="Federated States of Micronesia">
                                                                                                    Federated States of
                                                                                                    Micronesia
                                                                                                </option>
                                                                                                <option value="Fiji">
                                                                                                    Fiji
                                                                                                </option>
                                                                                                <option value="Finland">
                                                                                                    Finland
                                                                                                </option>
                                                                                                <option value="France">
                                                                                                    France
                                                                                                </option>
                                                                                                <option
                                                                                                    value="French Guyana">
                                                                                                    French Guyana
                                                                                                </option>
                                                                                                <option
                                                                                                    value="French Polynesia">
                                                                                                    French Polynesia
                                                                                                </option>
                                                                                                <option
                                                                                                    value="French Southern Territories">
                                                                                                    French Southern
                                                                                                    Territories
                                                                                                </option>
                                                                                                <option value="Gabon">
                                                                                                    Gabon
                                                                                                </option>
                                                                                                <option value="Gambia">
                                                                                                    Gambia
                                                                                                </option>
                                                                                                <option value="Georgia">
                                                                                                    Georgia
                                                                                                </option>
                                                                                                <option value="Germany">
                                                                                                    Germany
                                                                                                </option>
                                                                                                <option value="Ghana">
                                                                                                    Ghana
                                                                                                </option>
                                                                                                <option
                                                                                                    value="Gibraltar">
                                                                                                    Gibraltar
                                                                                                </option>
                                                                                                <option value="Greece">
                                                                                                    Greece
                                                                                                </option>
                                                                                                <option
                                                                                                    value="Greenland">
                                                                                                    Greenland
                                                                                                </option>
                                                                                                <option value="Grenada">
                                                                                                    Grenada
                                                                                                </option>
                                                                                                <option
                                                                                                    value="Guadeloupe">
                                                                                                    Guadeloupe
                                                                                                </option>
                                                                                                <option value="Guam">
                                                                                                    Guam
                                                                                                </option>
                                                                                                <option
                                                                                                    value="Guatemala">
                                                                                                    Guatemala
                                                                                                </option>
                                                                                                <option value="Guinea">
                                                                                                    Guinea
                                                                                                </option>
                                                                                                <option
                                                                                                    value="Guinea-Bissau">
                                                                                                    Guinea-Bissau
                                                                                                </option>
                                                                                                <option value="Guyana">
                                                                                                    Guyana
                                                                                                </option>
                                                                                                <option value="Haiti">
                                                                                                    Haiti
                                                                                                </option>
                                                                                                <option
                                                                                                    value="Heard Island and Mcdonald Islands">
                                                                                                    Heard Island and
                                                                                                    Mcdonald Islands
                                                                                                </option>
                                                                                                <option
                                                                                                    value="Honduras">
                                                                                                    Honduras
                                                                                                </option>
                                                                                                <option
                                                                                                    value="Hong Kong">
                                                                                                    Hong Kong
                                                                                                </option>
                                                                                                <option value="Hungary">
                                                                                                    Hungary
                                                                                                </option>
                                                                                                <option value="Iceland">
                                                                                                    Iceland
                                                                                                </option>
                                                                                                <option value="India">
                                                                                                    India
                                                                                                </option>
                                                                                                <option
                                                                                                    value="Indonesia">
                                                                                                    Indonesia
                                                                                                </option>
                                                                                                <option value="Ireland">
                                                                                                    Ireland
                                                                                                </option>
                                                                                                <option value="Israel">
                                                                                                    Israel
                                                                                                </option>
                                                                                                <option value="Italy">
                                                                                                    Italy
                                                                                                </option>
                                                                                                <option
                                                                                                    value="Ivory Coast">
                                                                                                    Ivory Coast
                                                                                                </option>
                                                                                                <option value="Jamaica">
                                                                                                    Jamaica
                                                                                                </option>
                                                                                                <option value="Japan">
                                                                                                    Japan
                                                                                                </option>
                                                                                                <option value="Jordan">
                                                                                                    Jordan
                                                                                                </option>
                                                                                                <option
                                                                                                    value="Kazakhstan">
                                                                                                    Kazakhstan
                                                                                                </option>
                                                                                                <option value="Kenya">
                                                                                                    Kenya
                                                                                                </option>
                                                                                                <option
                                                                                                    value="Kiribati">
                                                                                                    Kiribati
                                                                                                </option>
                                                                                                <option value="Kuwait">
                                                                                                    Kuwait
                                                                                                </option>
                                                                                                <option
                                                                                                    value="Kyrgyzstan">
                                                                                                    Kyrgyzstan
                                                                                                </option>
                                                                                                <option value="Laos">
                                                                                                    Laos
                                                                                                </option>
                                                                                                <option value="Latvia">
                                                                                                    Latvia
                                                                                                </option>
                                                                                                <option value="Lebanon">
                                                                                                    Lebanon
                                                                                                </option>
                                                                                                <option value="Lesotho">
                                                                                                    Lesotho
                                                                                                </option>
                                                                                                <option value="Liberia">
                                                                                                    Liberia
                                                                                                </option>
                                                                                                <option value="Libya">
                                                                                                    Libya
                                                                                                </option>
                                                                                                <option
                                                                                                    value="Liechtenstein">
                                                                                                    Liechtenstein
                                                                                                </option>
                                                                                                <option
                                                                                                    value="Lithuania">
                                                                                                    Lithuania
                                                                                                </option>
                                                                                                <option
                                                                                                    value="Luxembourg">
                                                                                                    Luxembourg
                                                                                                </option>
                                                                                                <option value="Macau">
                                                                                                    Macau
                                                                                                </option>
                                                                                                <option
                                                                                                    value="Macedonia">
                                                                                                    Macedonia
                                                                                                </option>
                                                                                                <option
                                                                                                    value="Madagascar">
                                                                                                    Madagascar
                                                                                                </option>
                                                                                                <option value="Malawi">
                                                                                                    Malawi
                                                                                                </option>
                                                                                                <option
                                                                                                    value="Malaysia">
                                                                                                    Malaysia
                                                                                                </option>
                                                                                                <option
                                                                                                    value="Maldives">
                                                                                                    Maldives
                                                                                                </option>
                                                                                                <option value="Mali">
                                                                                                    Mali
                                                                                                </option>
                                                                                                <option value="Malta">
                                                                                                    Malta
                                                                                                </option>
                                                                                                <option
                                                                                                    value="Marshall Islands">
                                                                                                    Marshall Islands
                                                                                                </option>
                                                                                                <option
                                                                                                    value="Martinique">
                                                                                                    Martinique
                                                                                                </option>
                                                                                                <option
                                                                                                    value="Mauritania">
                                                                                                    Mauritania
                                                                                                </option>
                                                                                                <option
                                                                                                    value="Mauritius">
                                                                                                    Mauritius
                                                                                                </option>
                                                                                                <option value="Mayotte">
                                                                                                    Mayotte
                                                                                                </option>
                                                                                                <option value="Mexico">
                                                                                                    Mexico
                                                                                                </option>
                                                                                                <option value="Moldova">
                                                                                                    Moldova
                                                                                                </option>
                                                                                                <option value="Monaco">
                                                                                                    Monaco
                                                                                                </option>
                                                                                                <option
                                                                                                    value="Mongolia">
                                                                                                    Mongolia
                                                                                                </option>
                                                                                                <option
                                                                                                    value="Montserrat">
                                                                                                    Montserrat
                                                                                                </option>
                                                                                                <option value="Morocco">
                                                                                                    Morocco
                                                                                                </option>
                                                                                                <option
                                                                                                    value="Mozambique">
                                                                                                    Mozambique
                                                                                                </option>
                                                                                                <option value="Myanmar">
                                                                                                    Myanmar
                                                                                                </option>
                                                                                                <option value="Namibia">
                                                                                                    Namibia
                                                                                                </option>
                                                                                                <option value="Nauru">
                                                                                                    Nauru
                                                                                                </option>
                                                                                                <option value="Nepal">
                                                                                                    Nepal
                                                                                                </option>
                                                                                                <option
                                                                                                    value="Netherlands">
                                                                                                    Netherlands
                                                                                                </option>
                                                                                                <option
                                                                                                    value="Netherlands Antilles">
                                                                                                    Netherlands Antilles
                                                                                                </option>
                                                                                                <option
                                                                                                    value="New Caledonia">
                                                                                                    New Caledonia
                                                                                                </option>
                                                                                                <option
                                                                                                    value="New Zealand">
                                                                                                    New Zealand
                                                                                                </option>
                                                                                                <option
                                                                                                    value="Nicaragua">
                                                                                                    Nicaragua
                                                                                                </option>
                                                                                                <option value="Niger">
                                                                                                    Niger
                                                                                                </option>
                                                                                                <option value="Nigeria">
                                                                                                    Nigeria
                                                                                                </option>
                                                                                                <option value="Niue">
                                                                                                    Niue
                                                                                                </option>
                                                                                                <option
                                                                                                    value="Norfolk Island">
                                                                                                    Norfolk Island
                                                                                                </option>
                                                                                                <option
                                                                                                    value="Northern Mariana Islands">
                                                                                                    Northern Mariana
                                                                                                    Islands
                                                                                                </option>
                                                                                                <option value="Norway">
                                                                                                    Norway
                                                                                                </option>
                                                                                                <option value="Oman">
                                                                                                    Oman
                                                                                                </option>
                                                                                                <option
                                                                                                    value="Pakistan">
                                                                                                    Pakistan
                                                                                                </option>
                                                                                                <option value="Palau">
                                                                                                    Palau
                                                                                                </option>
                                                                                                <option
                                                                                                    value="Palestinian Occupied Territories">
                                                                                                    Palestinian Occupied
                                                                                                    Territories
                                                                                                </option>
                                                                                                <option value="Panama">
                                                                                                    Panama
                                                                                                </option>
                                                                                                <option
                                                                                                    value="Papua New Guinea">
                                                                                                    Papua New Guinea
                                                                                                </option>
                                                                                                <option
                                                                                                    value="Paraguay">
                                                                                                    Paraguay
                                                                                                </option>
                                                                                                <option value="Peru">
                                                                                                    Peru
                                                                                                </option>
                                                                                                <option
                                                                                                    value="Philippines">
                                                                                                    Philippines
                                                                                                </option>
                                                                                                <option
                                                                                                    value="Pitcairn Islands">
                                                                                                    Pitcairn Islands
                                                                                                </option>
                                                                                                <option value="Poland">
                                                                                                    Poland
                                                                                                </option>
                                                                                                <option
                                                                                                    value="Portugal">
                                                                                                    Portugal
                                                                                                </option>
                                                                                                <option
                                                                                                    value="Puerto Rico">
                                                                                                    Puerto Rico
                                                                                                </option>
                                                                                                <option value="Qatar">
                                                                                                    Qatar
                                                                                                </option>
                                                                                                <option value="Reunion">
                                                                                                    Reunion
                                                                                                </option>
                                                                                                <option value="Romania">
                                                                                                    Romania
                                                                                                </option>
                                                                                                <option value="Russia">
                                                                                                    Russia
                                                                                                </option>
                                                                                                <option value="Rwanda">
                                                                                                    Rwanda
                                                                                                </option>
                                                                                                <option
                                                                                                    value="Saint Helena and Dependencies">
                                                                                                    Saint Helena and
                                                                                                    Dependencies
                                                                                                </option>
                                                                                                <option
                                                                                                    value="Saint Kitts and Nevis">
                                                                                                    Saint Kitts and
                                                                                                    Nevis
                                                                                                </option>
                                                                                                <option
                                                                                                    value="Saint Lucia">
                                                                                                    Saint Lucia
                                                                                                </option>
                                                                                                <option
                                                                                                    value="Saint Pierre and Miquelon">
                                                                                                    Saint Pierre and
                                                                                                    Miquelon
                                                                                                </option>
                                                                                                <option
                                                                                                    value="Saint Vincent and the Grenadines">
                                                                                                    Saint Vincent and
                                                                                                    the Grenadines
                                                                                                </option>
                                                                                                <option value="Samoa">
                                                                                                    Samoa
                                                                                                </option>
                                                                                                <option
                                                                                                    value="San Marino">
                                                                                                    San Marino
                                                                                                </option>
                                                                                                <option
                                                                                                    value="Sao Tome and Principe">
                                                                                                    Sao Tome and
                                                                                                    Principe
                                                                                                </option>
                                                                                                <option
                                                                                                    value="Saudi Arabia">
                                                                                                    Saudi Arabia
                                                                                                </option>
                                                                                                <option value="Senegal">
                                                                                                    Senegal
                                                                                                </option>
                                                                                                <option
                                                                                                    value="Serbia and Montenegro">
                                                                                                    Serbia and
                                                                                                    Montenegro
                                                                                                </option>
                                                                                                <option
                                                                                                    value="Seychelles">
                                                                                                    Seychelles
                                                                                                </option>
                                                                                                <option
                                                                                                    value="Sierra Leone">
                                                                                                    Sierra Leone
                                                                                                </option>
                                                                                                <option
                                                                                                    value="Singapore">
                                                                                                    Singapore
                                                                                                </option>
                                                                                                <option
                                                                                                    value="Slovakia">
                                                                                                    Slovakia
                                                                                                </option>
                                                                                                <option
                                                                                                    value="Slovenia">
                                                                                                    Slovenia
                                                                                                </option>
                                                                                                <option
                                                                                                    value="Solomon Islands">
                                                                                                    Solomon Islands
                                                                                                </option>
                                                                                                <option value="Somalia">
                                                                                                    Somalia
                                                                                                </option>
                                                                                                <option
                                                                                                    value="South Africa">
                                                                                                    South Africa
                                                                                                </option>
                                                                                                <option
                                                                                                    value="South Georgia and Sandwich Islands">
                                                                                                    South Georgia and
                                                                                                    Sandwich Islands
                                                                                                </option>
                                                                                                <option value="Spain">
                                                                                                    Spain
                                                                                                </option>
                                                                                                <option
                                                                                                    value="Spratly Islands">
                                                                                                    Spratly Islands
                                                                                                </option>
                                                                                                <option
                                                                                                    value="Sri Lanka">
                                                                                                    Sri Lanka
                                                                                                </option>
                                                                                                <option
                                                                                                    value="Suriname">
                                                                                                    Suriname
                                                                                                </option>
                                                                                                <option
                                                                                                    value="Svalbard and Jan Mayen">
                                                                                                    Svalbard and Jan
                                                                                                    Mayen
                                                                                                </option>
                                                                                                <option
                                                                                                    value="Swaziland">
                                                                                                    Swaziland
                                                                                                </option>
                                                                                                <option value="Sweden">
                                                                                                    Sweden
                                                                                                </option>
                                                                                                <option
                                                                                                    value="Switzerland">
                                                                                                    Switzerland
                                                                                                </option>
                                                                                                <option value="Taiwan">
                                                                                                    Taiwan
                                                                                                </option>
                                                                                                <option
                                                                                                    value="Tajikistan">
                                                                                                    Tajikistan
                                                                                                </option>
                                                                                                <option
                                                                                                    value="Tanzania">
                                                                                                    Tanzania
                                                                                                </option>
                                                                                                <option
                                                                                                    value="Thailand">
                                                                                                    Thailand
                                                                                                </option>
                                                                                                <option value="Togo">
                                                                                                    Togo
                                                                                                </option>
                                                                                                <option value="Tokelau">
                                                                                                    Tokelau
                                                                                                </option>
                                                                                                <option value="Tonga">
                                                                                                    Tonga
                                                                                                </option>
                                                                                                <option
                                                                                                    value="Trinidad and Tobago">
                                                                                                    Trinidad and Tobago
                                                                                                </option>
                                                                                                <option value="Tunisia">
                                                                                                    Tunisia
                                                                                                </option>
                                                                                                <option value="Turkey">
                                                                                                    Turkey
                                                                                                </option>
                                                                                                <option
                                                                                                    value="Turkmenistan">
                                                                                                    Turkmenistan
                                                                                                </option>
                                                                                                <option
                                                                                                    value="Turks And Caicos Islands">
                                                                                                    Turks And Caicos
                                                                                                    Islands
                                                                                                </option>
                                                                                                <option value="Tuvalu">
                                                                                                    Tuvalu
                                                                                                </option>
                                                                                                <option value="Uganda">
                                                                                                    Uganda
                                                                                                </option>
                                                                                                <option value="Ukraine">
                                                                                                    Ukraine
                                                                                                </option>
                                                                                                <option
                                                                                                    value="United Arab Emirates">
                                                                                                    United Arab Emirates
                                                                                                </option>
                                                                                                <option
                                                                                                    value="United Kingdom">
                                                                                                    United Kingdom
                                                                                                </option>
                                                                                                <option
                                                                                                    value="United Nations Neutral Zone">
                                                                                                    United Nations
                                                                                                    Neutral Zone
                                                                                                </option>
                                                                                                <option
                                                                                                    value="United States">
                                                                                                    United States
                                                                                                </option>
                                                                                                <option
                                                                                                    value="United States Minor Outlying Islands">
                                                                                                    United States Minor
                                                                                                    Outlying Islands
                                                                                                </option>
                                                                                                <option value="Uruguay">
                                                                                                    Uruguay
                                                                                                </option>
                                                                                                <option
                                                                                                    value="US Virgin Islands">
                                                                                                    US Virgin Islands
                                                                                                </option>
                                                                                                <option
                                                                                                    value="Uzbekistan">
                                                                                                    Uzbekistan
                                                                                                </option>
                                                                                                <option value="Vanuatu">
                                                                                                    Vanuatu
                                                                                                </option>
                                                                                                <option
                                                                                                    value="Vatican City">
                                                                                                    Vatican City
                                                                                                </option>
                                                                                                <option
                                                                                                    value="Venezuela">
                                                                                                    Venezuela
                                                                                                </option>
                                                                                                <option value="Vietnam">
                                                                                                    Vietnam
                                                                                                </option>
                                                                                                <option
                                                                                                    value="Wallis and Futuna">
                                                                                                    Wallis and Futuna
                                                                                                </option>
                                                                                                <option
                                                                                                    value="Western Sahara">
                                                                                                    Western Sahara
                                                                                                </option>
                                                                                                <option value="Yemen">
                                                                                                    Yemen
                                                                                                </option>
                                                                                                <option value="Zambia">
                                                                                                    Zambia
                                                                                                </option>
                                                                                                <option
                                                                                                    value="Zimbabwe">
                                                                                                    Zimbabwe
                                                                                                </option>
                                                                                            </select>
                                                                                            <?php emptyTest('billing_cust_country'); ?>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <!-- billing country end -->
                                                                                    <tr>
                                                                                        <td><img alt=""
                                                                                                 src="/checkout/images/spacer.gif"
                                                                                                 width="1" height="3">
                                                                                        </td>
                                                                                    </tr>
                                                                                    <!-- email and telephone -->
                                                                                    <tr>
                                                                                        <td>
                                                                                            <table width="310"
                                                                                                   align="center"
                                                                                                   border="0"
                                                                                                   cellpadding="0"
                                                                                                   cellspacing="0">
                                                                                                <tbody>
                                                                                                <tr>
                                                                                                    <td class="fieldheader"
                                                                                                        nowrap="nowrap">
                                                                                                        <img alt=""
                                                                                                             src="/checkout/images/bullet1.gif"
                                                                                                             width="10"
                                                                                                             height="9">

                                                                                                        Email:
                                                                                                    </td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td nowrap="nowrap">
                                                                                                        <input
                                                                                                            class="input"
                                                                                                            style="width: 310px;"
                                                                                                            name="billing_cust_email"
                                                                                                            onblur="checkEmail(this);"
                                                                                                            value="<?php echo htmlspecialchars($_POST['billing_cust_email']); ?>"
                                                                                                            type="text">
                                                                                                        <?php emptyTest('billing_cust_email'); ?>
                                                                                                    </td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td class="fieldheader"
                                                                                                        nowrap="nowrap">
                                                                                                        <img alt=""
                                                                                                             src="/checkout/images/bullet1.gif"
                                                                                                             width="10"
                                                                                                             height="9">

                                                                                                        Telephone:
                                                                                                    </td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td nowrap="nowrap">
                                                                                                        <input
                                                                                                            class="input"
                                                                                                            style="width: 310px;"
                                                                                                            name="billing_cust_tel"
                                                                                                            id="billing_cust_tel"
                                                                                                            value="<?php echo htmlspecialchars($_POST['billing_cust_tel']); ?>"
                                                                                                            type="text">
                                                                                                        <?php emptyTest('billing_cust_tel'); ?>
                                                                                                    </td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td class="fieldheader">
                                                                                                        <font
                                                                                                            class="red">Example:</font>:
                                                                                                        +31251234567
                                                                                                        (+countrycode
                                                                                                        followed by
                                                                                                        telephone
                                                                                                        number)
                                                                                                    </td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td>
                                                                                                        <img alt=""
                                                                                                             src="/checkout/images/spacer.gif"
                                                                                                             width="1"
                                                                                                             height="3">
                                                                                                    </td>
                                                                                                </tr>
                                                                                                </tbody>
                                                                                            </table>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <!-- email and telephone end -->
                                                                                    </tbody>
                                                                                </table>
                                                                            </td>
                                                                            <td width="1"
                                                                                background="/checkout/images/v-line.gif">
                                                                                <img alt=""
                                                                                     src="/checkout/images/spacer.gif"
                                                                                     width="1" border="0" height="1">
                                                                            </td>
                                                                            <!-- delivery information -->
                                                                            <td width="50%" valign="top">

                                                                                <table width="310" align="center"
                                                                                       border="0" cellpadding="0"
                                                                                       cellspacing="0">
                                                                                    <tbody>
                                                                                    <tr>
                                                                                        <td>
                                                                                            <table width="310"
                                                                                                   align="center"
                                                                                                   border="0"
                                                                                                   cellpadding="0"
                                                                                                   cellspacing="0">

                                                                                                <tbody>
                                                                                                <tr>
                                                                                                    <td class="fieldheader"
                                                                                                        nowrap="nowrap">
                                                                                                        <img alt=""
                                                                                                             src="/checkout/images/bullet1.gif"
                                                                                                             width="10"
                                                                                                             height="9">

                                                                                                        Full Name:
                                                                                                    </td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td nowrap="nowrap">
                                                                                                        <input
                                                                                                            class="input"
                                                                                                            style="width: 310px;"
                                                                                                            name="delivery_cust_name"
                                                                                                            id="delivery_cust_name"
                                                                                                            value="<?php echo htmlspecialchars($_POST['delivery_cust_name']); ?>">
                                                                                                        <?php emptyTest('delivery_cust_name'); ?>
                                                                                                    </td>
                                                                                                </tr>
                                                                                                </tbody>
                                                                                            </table>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td><img alt=""
                                                                                                 src="/checkout/images/spacer.gif"
                                                                                                 width="1" height="3">
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="fieldheader"
                                                                                            nowrap="nowrap">
                                                                                            <img alt=""
                                                                                                 src="/checkout/images/bullet1.gif"
                                                                                                 width="10" height="9">

                                                                                            Address:
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td nowrap="nowrap">
																												<textarea
                                                                                                                    class="textarea marginb"
                                                                                                                    id="delivery_cust_address"
                                                                                                                    name="delivery_cust_address"
                                                                                                                    rows="3"
                                                                                                                    cols="20"><?php echo htmlspecialchars($_POST['delivery_cust_address']); ?></textarea>
                                                                                            <?php emptyTest('delivery_cust_address'); ?>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td><img alt=""
                                                                                                 src="/checkout/images/spacer.gif"
                                                                                                 width="1" height="3">
                                                                                        </td>
                                                                                    </tr>
                                                                                    <!-- delivery city -->
                                                                                    <tr>
                                                                                        <td class="fieldheader"
                                                                                            nowrap="nowrap">
                                                                                            <img alt=""
                                                                                                 src="/checkout/images/bullet1.gif"
                                                                                                 width="10" height="9">

                                                                                            City:
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td nowrap="nowrap">
                                                                                            <input class="input"
                                                                                                   style="width: 310px;"
                                                                                                   type="text"
                                                                                                   name="delivery_cust_city"
                                                                                                   id="delivery_cust_city"
                                                                                                   value="<?php echo htmlspecialchars($_POST['delivery_cust_city']); ?>" type="text">
                                                                                            <?php emptyTest('delivery_cust_city'); ?>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <!-- delivery city end -->
                                                                                    <!-- delivery state and zip -->
                                                                                    <tr>
                                                                                        <td>
                                                                                            <table width="310"
                                                                                                   align="center"
                                                                                                   border="0"
                                                                                                   cellpadding="0"
                                                                                                   cellspacing="0">
                                                                                                <tbody>
                                                                                                <tr>
                                                                                                    <td class="fieldheader"
                                                                                                        nowrap="nowrap">
                                                                                                        &nbsp;

																																<span
                                                                                                                                    id="staterequired"
                                                                                                                                    style="display: none">
																																	<img
                                                                                                                                        alt=""
                                                                                                                                        src="/checkout/images/bullet1.gif"
                                                                                                                                        width="10"
                                                                                                                                        height="9">
																																	State/Province:
																																</span>
																																<span
                                                                                                                                    id="stateoptional"
                                                                                                                                    style="display: block">
																																	<img
                                                                                                                                        alt=""
                                                                                                                                        src="/checkout/images/bullet1.gif"
                                                                                                                                        width="10"
                                                                                                                                        height="9">
																																	State/Province:
																																</span>

                                                                                                    </td>
                                                                                                    <td class="fieldheader"
                                                                                                        nowrap="nowrap">
                                                                                                        <img alt=""
                                                                                                             src="/checkout/images/spacer.gif"
                                                                                                             width="10"
                                                                                                             height="1">
                                                                                                    </td>
                                                                                                    <td class="fieldheader"
                                                                                                        nowrap="nowrap">
                                                                                                        <img alt=""
                                                                                                             src="/checkout/images/bullet1.gif"
                                                                                                             width="10"
                                                                                                             height="9">
                                                                                                        Zip/Postal Code:
                                                                                                    </td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td nowrap="nowrap">
                                                                                                        <input
                                                                                                            class="input"
                                                                                                            style="width: 200px;"
                                                                                                            name="delivery_cust_state"
                                                                                                            id="delivery_cust_state"
                                                                                                            value="<?php echo htmlspecialchars($_POST['delivery_cust_state']); ?>"
                                                                                                            type="text">
                                                                                                        <?php emptyTest('delivery_cust_state'); ?>
                                                                                                    </td>
                                                                                                    <td class="fieldheader"
                                                                                                        nowrap="nowrap">
                                                                                                        <img alt=""
                                                                                                             src="/checkout/images/spacer.gif"
                                                                                                             width="10"
                                                                                                             height="1">
                                                                                                    </td>
                                                                                                    <td nowrap="nowrap">
                                                                                                        <input
                                                                                                            class="input"
                                                                                                            style="width: 100px;"
                                                                                                            name="delivery_cust_zip"
                                                                                                            id="delivery_cust_zip"
                                                                                                            value="<?php echo htmlspecialchars($_POST['delivery_cust_zip']); ?>"
                                                                                                            type="text">
                                                                                                        <?php emptyTest('delivery_cust_zip'); ?>
                                                                                                    </td>
                                                                                                </tr>
                                                                                                </tbody>
                                                                                            </table>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <!-- delivery state and zip end -->
                                                                                    <tr>
                                                                                        <td><img alt=""
                                                                                                 src="/checkout/images/spacer.gif"
                                                                                                 width="1" height="3">
                                                                                        </td>
                                                                                    </tr>
                                                                                    <!-- delivery country -->
                                                                                    <tr id="delivery_cust_country_capture">
                                                                                        <td class="fieldheader"
                                                                                            height="20" nowrap="nowrap">
                                                                                            <img alt=""
                                                                                                 src="/checkout/images/bullet1.gif"
                                                                                                 width="10" height="9">

                                                                                            Country:
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr id="delivery_cust_country_element">
                                                                                        <td nowrap="nowrap">
                                                                                            <select class="input"
                                                                                                    style="width: 200px;"
                                                                                                    name="delivery_cust_country"
                                                                                                    id="delivery_cust_country">
                                                                                                <option value=0>Select
                                                                                                    One
                                                                                                </option>
                                                                                                <option
                                                                                                    value="Aland Islands">
                                                                                                    Aland Islands
                                                                                                </option>
                                                                                                <option value="Albania">
                                                                                                    Albania
                                                                                                </option>
                                                                                                <option value="Algeria">
                                                                                                    Algeria
                                                                                                </option>
                                                                                                <option
                                                                                                    value="American Samoa">
                                                                                                    American Samoa
                                                                                                </option>
                                                                                                <option value="Andorra">
                                                                                                    Andorra
                                                                                                </option>
                                                                                                <option value="Angola">
                                                                                                    Angola
                                                                                                </option>
                                                                                                <option
                                                                                                    value="Anguilla">
                                                                                                    Anguilla
                                                                                                </option>
                                                                                                <option
                                                                                                    value="Antarctica">
                                                                                                    Antarctica
                                                                                                </option>
                                                                                                <option
                                                                                                    value="Antigua and Barbuda">
                                                                                                    Antigua and Barbuda
                                                                                                </option>
                                                                                                <option
                                                                                                    value="Argentina">
                                                                                                    Argentina
                                                                                                </option>
                                                                                                <option value="Armenia">
                                                                                                    Armenia
                                                                                                </option>
                                                                                                <option value="Aruba">
                                                                                                    Aruba
                                                                                                </option>
                                                                                                <option
                                                                                                    value="Australia">
                                                                                                    Australia
                                                                                                </option>
                                                                                                <option value="Austria">
                                                                                                    Austria
                                                                                                </option>
                                                                                                <option
                                                                                                    value="Azerbaijan">
                                                                                                    Azerbaijan
                                                                                                </option>
                                                                                                <option value="Bahamas">
                                                                                                    Bahamas
                                                                                                </option>
                                                                                                <option value="Bahrain">
                                                                                                    Bahrain
                                                                                                </option>
                                                                                                <option
                                                                                                    value="Bangladesh">
                                                                                                    Bangladesh
                                                                                                </option>
                                                                                                <option
                                                                                                    value="Barbados">
                                                                                                    Barbados
                                                                                                </option>
                                                                                                <option value="Belarus">
                                                                                                    Belarus
                                                                                                </option>
                                                                                                <option value="Belgium">
                                                                                                    Belgium
                                                                                                </option>
                                                                                                <option value="Belize">
                                                                                                    Belize
                                                                                                </option>
                                                                                                <option value="Benin">
                                                                                                    Benin
                                                                                                </option>
                                                                                                <option value="Bermuda">
                                                                                                    Bermuda
                                                                                                </option>
                                                                                                <option value="Bhutan">
                                                                                                    Bhutan
                                                                                                </option>
                                                                                                <option value="Bolivia">
                                                                                                    Bolivia
                                                                                                </option>
                                                                                                <option
                                                                                                    value="Bosnia and Herzegovina">
                                                                                                    Bosnia and
                                                                                                    Herzegovina
                                                                                                </option>
                                                                                                <option
                                                                                                    value="Botswana">
                                                                                                    Botswana
                                                                                                </option>
                                                                                                <option
                                                                                                    value="Bouvet Island">
                                                                                                    Bouvet Island
                                                                                                </option>
                                                                                                <option value="Brazil">
                                                                                                    Brazil
                                                                                                </option>
                                                                                                <option
                                                                                                    value="British Indian Ocean Territory">
                                                                                                    British Indian Ocean
                                                                                                    Territory
                                                                                                </option>
                                                                                                <option
                                                                                                    value="British Virgin Islands">
                                                                                                    British Virgin
                                                                                                    Islands
                                                                                                </option>
                                                                                                <option value="Brunei">
                                                                                                    Brunei
                                                                                                </option>
                                                                                                <option
                                                                                                    value="Bulgaria">
                                                                                                    Bulgaria
                                                                                                </option>
                                                                                                <option
                                                                                                    value="Burkina Faso">
                                                                                                    Burkina Faso
                                                                                                </option>
                                                                                                <option value="Burundi">
                                                                                                    Burundi
                                                                                                </option>
                                                                                                <option
                                                                                                    value="Cambodia">
                                                                                                    Cambodia
                                                                                                </option>
                                                                                                <option
                                                                                                    value="Cameroon">
                                                                                                    Cameroon
                                                                                                </option>
                                                                                                <option value="Canada">
                                                                                                    Canada
                                                                                                </option>
                                                                                                <option
                                                                                                    value="Cape Verde">
                                                                                                    Cape Verde
                                                                                                </option>
                                                                                                <option
                                                                                                    value="Cayman Islands">
                                                                                                    Cayman Islands
                                                                                                </option>
                                                                                                <option
                                                                                                    value="Central African Republic">
                                                                                                    Central African
                                                                                                    Republic
                                                                                                </option>
                                                                                                <option value="Chad">
                                                                                                    Chad
                                                                                                </option>
                                                                                                <option value="Chile">
                                                                                                    Chile
                                                                                                </option>
                                                                                                <option value="China">
                                                                                                    China
                                                                                                </option>
                                                                                                <option
                                                                                                    value="Christmas Island">
                                                                                                    Christmas Island
                                                                                                </option>
                                                                                                <option
                                                                                                    value="Cocos (Keeling) Islands">
                                                                                                    Cocos (Keeling)
                                                                                                    Islands
                                                                                                </option>
                                                                                                <option
                                                                                                    value="Colombia">
                                                                                                    Colombia
                                                                                                </option>
                                                                                                <option value="Comoros">
                                                                                                    Comoros
                                                                                                </option>
                                                                                                <option value="Congo">
                                                                                                    Congo
                                                                                                </option>
                                                                                                <option
                                                                                                    value="Cook Islands">
                                                                                                    Cook Islands
                                                                                                </option>
                                                                                                <option
                                                                                                    value="Costa Rica">
                                                                                                    Costa Rica
                                                                                                </option>
                                                                                                <option value="Croatia">
                                                                                                    Croatia
                                                                                                </option>
                                                                                                <option value="Cyprus">
                                                                                                    Cyprus
                                                                                                </option>
                                                                                                <option
                                                                                                    value="Czech Republic">
                                                                                                    Czech Republic
                                                                                                </option>
                                                                                                <option
                                                                                                    value="Democratic Republic of Congo">
                                                                                                    Democratic Republic
                                                                                                    of Congo
                                                                                                </option>
                                                                                                <option value="Denmark">
                                                                                                    Denmark
                                                                                                </option>
                                                                                                <option
                                                                                                    value="Disputed Territory">
                                                                                                    Disputed Territory
                                                                                                </option>
                                                                                                <option
                                                                                                    value="Djibouti">
                                                                                                    Djibouti
                                                                                                </option>
                                                                                                <option
                                                                                                    value="Dominica">
                                                                                                    Dominica
                                                                                                </option>
                                                                                                <option
                                                                                                    value="Dominican Republic">
                                                                                                    Dominican Republic
                                                                                                </option>
                                                                                                <option
                                                                                                    value="East Timor">
                                                                                                    East Timor
                                                                                                </option>
                                                                                                <option value="Ecuador">
                                                                                                    Ecuador
                                                                                                </option>
                                                                                                <option value="Egypt">
                                                                                                    Egypt
                                                                                                </option>
                                                                                                <option
                                                                                                    value="El Salvador">
                                                                                                    El Salvador
                                                                                                </option>
                                                                                                <option
                                                                                                    value="Equatorial Guinea">
                                                                                                    Equatorial Guinea
                                                                                                </option>
                                                                                                <option value="Eritrea">
                                                                                                    Eritrea
                                                                                                </option>
                                                                                                <option value="Estonia">
                                                                                                    Estonia
                                                                                                </option>
                                                                                                <option
                                                                                                    value="Ethiopia">
                                                                                                    Ethiopia
                                                                                                </option>
                                                                                                <option
                                                                                                    value="Falkland Islands">
                                                                                                    Falkland Islands
                                                                                                </option>
                                                                                                <option
                                                                                                    value="Faroe Islands">
                                                                                                    Faroe Islands
                                                                                                </option>
                                                                                                <option
                                                                                                    value="Federated States of Micronesia">
                                                                                                    Federated States of
                                                                                                    Micronesia
                                                                                                </option>
                                                                                                <option value="Fiji">
                                                                                                    Fiji
                                                                                                </option>
                                                                                                <option value="Finland">
                                                                                                    Finland
                                                                                                </option>
                                                                                                <option value="France">
                                                                                                    France
                                                                                                </option>
                                                                                                <option
                                                                                                    value="French Guyana">
                                                                                                    French Guyana
                                                                                                </option>
                                                                                                <option
                                                                                                    value="French Polynesia">
                                                                                                    French Polynesia
                                                                                                </option>
                                                                                                <option
                                                                                                    value="French Southern Territories">
                                                                                                    French Southern
                                                                                                    Territories
                                                                                                </option>
                                                                                                <option value="Gabon">
                                                                                                    Gabon
                                                                                                </option>
                                                                                                <option value="Gambia">
                                                                                                    Gambia
                                                                                                </option>
                                                                                                <option value="Georgia">
                                                                                                    Georgia
                                                                                                </option>
                                                                                                <option value="Germany">
                                                                                                    Germany
                                                                                                </option>
                                                                                                <option value="Ghana">
                                                                                                    Ghana
                                                                                                </option>
                                                                                                <option
                                                                                                    value="Gibraltar">
                                                                                                    Gibraltar
                                                                                                </option>
                                                                                                <option value="Greece">
                                                                                                    Greece
                                                                                                </option>
                                                                                                <option
                                                                                                    value="Greenland">
                                                                                                    Greenland
                                                                                                </option>
                                                                                                <option value="Grenada">
                                                                                                    Grenada
                                                                                                </option>
                                                                                                <option
                                                                                                    value="Guadeloupe">
                                                                                                    Guadeloupe
                                                                                                </option>
                                                                                                <option value="Guam">
                                                                                                    Guam
                                                                                                </option>
                                                                                                <option
                                                                                                    value="Guatemala">
                                                                                                    Guatemala
                                                                                                </option>
                                                                                                <option value="Guinea">
                                                                                                    Guinea
                                                                                                </option>
                                                                                                <option
                                                                                                    value="Guinea-Bissau">
                                                                                                    Guinea-Bissau
                                                                                                </option>
                                                                                                <option value="Guyana">
                                                                                                    Guyana
                                                                                                </option>
                                                                                                <option value="Haiti">
                                                                                                    Haiti
                                                                                                </option>
                                                                                                <option
                                                                                                    value="Heard Island and Mcdonald Islands">
                                                                                                    Heard Island and
                                                                                                    Mcdonald Islands
                                                                                                </option>
                                                                                                <option
                                                                                                    value="Honduras">
                                                                                                    Honduras
                                                                                                </option>
                                                                                                <option
                                                                                                    value="Hong Kong">
                                                                                                    Hong Kong
                                                                                                </option>
                                                                                                <option value="Hungary">
                                                                                                    Hungary
                                                                                                </option>
                                                                                                <option value="Iceland">
                                                                                                    Iceland
                                                                                                </option>
                                                                                                <option value="India">
                                                                                                    India
                                                                                                </option>
                                                                                                <option
                                                                                                    value="Indonesia">
                                                                                                    Indonesia
                                                                                                </option>
                                                                                                <option value="Ireland">
                                                                                                    Ireland
                                                                                                </option>
                                                                                                <option value="Israel">
                                                                                                    Israel
                                                                                                </option>
                                                                                                <option value="Italy">
                                                                                                    Italy
                                                                                                </option>
                                                                                                <option
                                                                                                    value="Ivory Coast">
                                                                                                    Ivory Coast
                                                                                                </option>
                                                                                                <option value="Jamaica">
                                                                                                    Jamaica
                                                                                                </option>
                                                                                                <option value="Japan">
                                                                                                    Japan
                                                                                                </option>
                                                                                                <option value="Jordan">
                                                                                                    Jordan
                                                                                                </option>
                                                                                                <option
                                                                                                    value="Kazakhstan">
                                                                                                    Kazakhstan
                                                                                                </option>
                                                                                                <option value="Kenya">
                                                                                                    Kenya
                                                                                                </option>
                                                                                                <option
                                                                                                    value="Kiribati">
                                                                                                    Kiribati
                                                                                                </option>
                                                                                                <option value="Kuwait">
                                                                                                    Kuwait
                                                                                                </option>
                                                                                                <option
                                                                                                    value="Kyrgyzstan">
                                                                                                    Kyrgyzstan
                                                                                                </option>
                                                                                                <option value="Laos">
                                                                                                    Laos
                                                                                                </option>
                                                                                                <option value="Latvia">
                                                                                                    Latvia
                                                                                                </option>
                                                                                                <option value="Lebanon">
                                                                                                    Lebanon
                                                                                                </option>
                                                                                                <option value="Lesotho">
                                                                                                    Lesotho
                                                                                                </option>
                                                                                                <option value="Liberia">
                                                                                                    Liberia
                                                                                                </option>
                                                                                                <option value="Libya">
                                                                                                    Libya
                                                                                                </option>
                                                                                                <option
                                                                                                    value="Liechtenstein">
                                                                                                    Liechtenstein
                                                                                                </option>
                                                                                                <option
                                                                                                    value="Lithuania">
                                                                                                    Lithuania
                                                                                                </option>
                                                                                                <option
                                                                                                    value="Luxembourg">
                                                                                                    Luxembourg
                                                                                                </option>
                                                                                                <option value="Macau">
                                                                                                    Macau
                                                                                                </option>
                                                                                                <option
                                                                                                    value="Macedonia">
                                                                                                    Macedonia
                                                                                                </option>
                                                                                                <option
                                                                                                    value="Madagascar">
                                                                                                    Madagascar
                                                                                                </option>
                                                                                                <option value="Malawi">
                                                                                                    Malawi
                                                                                                </option>
                                                                                                <option
                                                                                                    value="Malaysia">
                                                                                                    Malaysia
                                                                                                </option>
                                                                                                <option
                                                                                                    value="Maldives">
                                                                                                    Maldives
                                                                                                </option>
                                                                                                <option value="Mali">
                                                                                                    Mali
                                                                                                </option>
                                                                                                <option value="Malta">
                                                                                                    Malta
                                                                                                </option>
                                                                                                <option
                                                                                                    value="Marshall Islands">
                                                                                                    Marshall Islands
                                                                                                </option>
                                                                                                <option
                                                                                                    value="Martinique">
                                                                                                    Martinique
                                                                                                </option>
                                                                                                <option
                                                                                                    value="Mauritania">
                                                                                                    Mauritania
                                                                                                </option>
                                                                                                <option
                                                                                                    value="Mauritius">
                                                                                                    Mauritius
                                                                                                </option>
                                                                                                <option value="Mayotte">
                                                                                                    Mayotte
                                                                                                </option>
                                                                                                <option value="Mexico">
                                                                                                    Mexico
                                                                                                </option>
                                                                                                <option value="Moldova">
                                                                                                    Moldova
                                                                                                </option>
                                                                                                <option value="Monaco">
                                                                                                    Monaco
                                                                                                </option>
                                                                                                <option
                                                                                                    value="Mongolia">
                                                                                                    Mongolia
                                                                                                </option>
                                                                                                <option
                                                                                                    value="Montserrat">
                                                                                                    Montserrat
                                                                                                </option>
                                                                                                <option value="Morocco">
                                                                                                    Morocco
                                                                                                </option>
                                                                                                <option
                                                                                                    value="Mozambique">
                                                                                                    Mozambique
                                                                                                </option>
                                                                                                <option value="Myanmar">
                                                                                                    Myanmar
                                                                                                </option>
                                                                                                <option value="Namibia">
                                                                                                    Namibia
                                                                                                </option>
                                                                                                <option value="Nauru">
                                                                                                    Nauru
                                                                                                </option>
                                                                                                <option value="Nepal">
                                                                                                    Nepal
                                                                                                </option>
                                                                                                <option
                                                                                                    value="Netherlands">
                                                                                                    Netherlands
                                                                                                </option>
                                                                                                <option
                                                                                                    value="Netherlands Antilles">
                                                                                                    Netherlands Antilles
                                                                                                </option>
                                                                                                <option
                                                                                                    value="New Caledonia">
                                                                                                    New Caledonia
                                                                                                </option>
                                                                                                <option
                                                                                                    value="New Zealand">
                                                                                                    New Zealand
                                                                                                </option>
                                                                                                <option
                                                                                                    value="Nicaragua">
                                                                                                    Nicaragua
                                                                                                </option>
                                                                                                <option value="Niger">
                                                                                                    Niger
                                                                                                </option>
                                                                                                <option value="Nigeria">
                                                                                                    Nigeria
                                                                                                </option>
                                                                                                <option value="Niue">
                                                                                                    Niue
                                                                                                </option>
                                                                                                <option
                                                                                                    value="Norfolk Island">
                                                                                                    Norfolk Island
                                                                                                </option>
                                                                                                <option
                                                                                                    value="Northern Mariana Islands">
                                                                                                    Northern Mariana
                                                                                                    Islands
                                                                                                </option>
                                                                                                <option value="Norway">
                                                                                                    Norway
                                                                                                </option>
                                                                                                <option value="Oman">
                                                                                                    Oman
                                                                                                </option>
                                                                                                <option
                                                                                                    value="Pakistan">
                                                                                                    Pakistan
                                                                                                </option>
                                                                                                <option value="Palau">
                                                                                                    Palau
                                                                                                </option>
                                                                                                <option
                                                                                                    value="Palestinian Occupied Territories">
                                                                                                    Palestinian Occupied
                                                                                                    Territories
                                                                                                </option>
                                                                                                <option value="Panama">
                                                                                                    Panama
                                                                                                </option>
                                                                                                <option
                                                                                                    value="Papua New Guinea">
                                                                                                    Papua New Guinea
                                                                                                </option>
                                                                                                <option
                                                                                                    value="Paraguay">
                                                                                                    Paraguay
                                                                                                </option>
                                                                                                <option value="Peru">
                                                                                                    Peru
                                                                                                </option>
                                                                                                <option
                                                                                                    value="Philippines">
                                                                                                    Philippines
                                                                                                </option>
                                                                                                <option
                                                                                                    value="Pitcairn Islands">
                                                                                                    Pitcairn Islands
                                                                                                </option>
                                                                                                <option value="Poland">
                                                                                                    Poland
                                                                                                </option>
                                                                                                <option
                                                                                                    value="Portugal">
                                                                                                    Portugal
                                                                                                </option>
                                                                                                <option
                                                                                                    value="Puerto Rico">
                                                                                                    Puerto Rico
                                                                                                </option>
                                                                                                <option value="Qatar">
                                                                                                    Qatar
                                                                                                </option>
                                                                                                <option value="Reunion">
                                                                                                    Reunion
                                                                                                </option>
                                                                                                <option value="Romania">
                                                                                                    Romania
                                                                                                </option>
                                                                                                <option value="Russia">
                                                                                                    Russia
                                                                                                </option>
                                                                                                <option value="Rwanda">
                                                                                                    Rwanda
                                                                                                </option>
                                                                                                <option
                                                                                                    value="Saint Helena and Dependencies">
                                                                                                    Saint Helena and
                                                                                                    Dependencies
                                                                                                </option>
                                                                                                <option
                                                                                                    value="Saint Kitts and Nevis">
                                                                                                    Saint Kitts and
                                                                                                    Nevis
                                                                                                </option>
                                                                                                <option
                                                                                                    value="Saint Lucia">
                                                                                                    Saint Lucia
                                                                                                </option>
                                                                                                <option
                                                                                                    value="Saint Pierre and Miquelon">
                                                                                                    Saint Pierre and
                                                                                                    Miquelon
                                                                                                </option>
                                                                                                <option
                                                                                                    value="Saint Vincent and the Grenadines">
                                                                                                    Saint Vincent and
                                                                                                    the Grenadines
                                                                                                </option>
                                                                                                <option
                                                                                                    value="San Marino">
                                                                                                    San Marino
                                                                                                </option>
                                                                                                <option
                                                                                                    value="Sao Tome and Principe">
                                                                                                    Sao Tome and
                                                                                                    Principe
                                                                                                </option>
                                                                                                <option
                                                                                                    value="Saudi Arabia">
                                                                                                    Saudi Arabia
                                                                                                </option>
                                                                                                <option value="Senegal">
                                                                                                    Senegal
                                                                                                </option>
                                                                                                <option
                                                                                                    value="Serbia and Montenegro">
                                                                                                    Serbia and
                                                                                                    Montenegro
                                                                                                </option>
                                                                                                <option
                                                                                                    value="Seychelles">
                                                                                                    Seychelles
                                                                                                </option>
                                                                                                <option
                                                                                                    value="Sierra Leone">
                                                                                                    Sierra Leone
                                                                                                </option>
                                                                                                <option
                                                                                                    value="Singapore">
                                                                                                    Singapore
                                                                                                </option>
                                                                                                <option
                                                                                                    value="Slovakia">
                                                                                                    Slovakia
                                                                                                </option>
                                                                                                <option
                                                                                                    value="Slovenia">
                                                                                                    Slovenia
                                                                                                </option>
                                                                                                <option
                                                                                                    value="Solomon Islands">
                                                                                                    Solomon Islands
                                                                                                </option>
                                                                                                <option value="Somalia">
                                                                                                    Somalia
                                                                                                </option>
                                                                                                <option
                                                                                                    value="South Africa">
                                                                                                    South Africa
                                                                                                </option>
                                                                                                <option
                                                                                                    value="South Georgia and Sandwich Islands">
                                                                                                    South Georgia and
                                                                                                    Sandwich Islands
                                                                                                </option>
                                                                                                <option
                                                                                                    value="South Korea">
                                                                                                    South Korea
                                                                                                </option>
                                                                                                <option value="Spain">
                                                                                                    Spain
                                                                                                </option>
                                                                                                <option
                                                                                                    value="Spratly Islands">
                                                                                                    Spratly Islands
                                                                                                </option>
                                                                                                <option
                                                                                                    value="Sri Lanka">
                                                                                                    Sri Lanka
                                                                                                </option>
                                                                                                <option
                                                                                                    value="Suriname">
                                                                                                    Suriname
                                                                                                </option>
                                                                                                <option
                                                                                                    value="Svalbard and Jan Mayen">
                                                                                                    Svalbard and Jan
                                                                                                    Mayen
                                                                                                </option>
                                                                                                <option
                                                                                                    value="Swaziland">
                                                                                                    Swaziland
                                                                                                </option>
                                                                                                <option value="Sweden">
                                                                                                    Sweden
                                                                                                </option>
                                                                                                <option
                                                                                                    value="Switzerland">
                                                                                                    Switzerland
                                                                                                </option>
                                                                                                <option value="Taiwan">
                                                                                                    Taiwan
                                                                                                </option>
                                                                                                <option
                                                                                                    value="Tajikistan">
                                                                                                    Tajikistan
                                                                                                </option>
                                                                                                <option
                                                                                                    value="Tanzania">
                                                                                                    Tanzania
                                                                                                </option>
                                                                                                <option
                                                                                                    value="Thailand">
                                                                                                    Thailand
                                                                                                </option>
                                                                                                <option value="Togo">
                                                                                                    Togo
                                                                                                </option>
                                                                                                <option value="Tokelau">
                                                                                                    Tokelau
                                                                                                </option>
                                                                                                <option value="Tonga">
                                                                                                    Tonga
                                                                                                </option>
                                                                                                <option
                                                                                                    value="Trinidad and Tobago">
                                                                                                    Trinidad and Tobago
                                                                                                </option>
                                                                                                <option value="Tunisia">
                                                                                                    Tunisia
                                                                                                </option>
                                                                                                <option value="Turkey">
                                                                                                    Turkey
                                                                                                </option>
                                                                                                <option
                                                                                                    value="Turkmenistan">
                                                                                                    Turkmenistan
                                                                                                </option>
                                                                                                <option
                                                                                                    value="Turks And Caicos Islands">
                                                                                                    Turks And Caicos
                                                                                                    Islands
                                                                                                </option>
                                                                                                <option value="Tuvalu">
                                                                                                    Tuvalu
                                                                                                </option>
                                                                                                <option value="Uganda">
                                                                                                    Uganda
                                                                                                </option>
                                                                                                <option value="Ukraine">
                                                                                                    Ukraine
                                                                                                </option>
                                                                                                <option
                                                                                                    value="United Arab Emirates">
                                                                                                    United Arab Emirates
                                                                                                </option>
                                                                                                <option
                                                                                                    value="United Kingdom">
                                                                                                    United Kingdom
                                                                                                </option>
                                                                                                <option
                                                                                                    value="United Nations Neutral Zone">
                                                                                                    United Nations
                                                                                                    Neutral Zone
                                                                                                </option>
                                                                                                <option
                                                                                                    value="United States">
                                                                                                    United States
                                                                                                </option>
                                                                                                <option
                                                                                                    value="United States Minor Outlying Islands">
                                                                                                    United States Minor
                                                                                                    Outlying Islands
                                                                                                </option>
                                                                                                <option value="Uruguay">
                                                                                                    Uruguay
                                                                                                </option>
                                                                                                <option
                                                                                                    value="US Virgin Islands">
                                                                                                    US Virgin Islands
                                                                                                </option>
                                                                                                <option
                                                                                                    value="Uzbekistan">
                                                                                                    Uzbekistan
                                                                                                </option>
                                                                                                <option value="Vanuatu">
                                                                                                    Vanuatu
                                                                                                </option>
                                                                                                <option
                                                                                                    value="Vatican City">
                                                                                                    Vatican City
                                                                                                </option>
                                                                                                <option
                                                                                                    value="Venezuela">
                                                                                                    Venezuela
                                                                                                </option>
                                                                                                <option value="Vietnam">
                                                                                                    Vietnam
                                                                                                </option>
                                                                                                <option
                                                                                                    value="Wallis and Futuna">
                                                                                                    Wallis and Futuna
                                                                                                </option>
                                                                                                <option
                                                                                                    value="Western Sahara">
                                                                                                    Western Sahara
                                                                                                </option>
                                                                                                <option value="Yemen">
                                                                                                    Yemen
                                                                                                </option>
                                                                                                <option value="Zambia">
                                                                                                    Zambia
                                                                                                </option>
                                                                                                <option
                                                                                                    value="Zimbabwe">
                                                                                                    Zimbabwe
                                                                                                </option>
                                                                                            </select>
                                                                                            <?php emptyTest('delivery_cust_country'); ?>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <!-- delivery country end -->
                                                                                    <tr>
                                                                                        <td><img alt=""
                                                                                                 src="/checkout/images/spacer.gif"
                                                                                                 width="1" height="3">
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="fieldheader"
                                                                                            nowrap="nowrap">
                                                                                            <img alt=""
                                                                                                 src="/checkout/images/bullet1.gif"
                                                                                                 width="10" height="9">

                                                                                            Telephone:
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>


                                                                                        <td><img alt=""
                                                                                                 src="/checkout/images/spacer.gif"
                                                                                                 width="1" height="3">
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td nowrap="nowrap">
                                                                                            <input class="input"
                                                                                                   style="width: 310px;"
                                                                                                   id="delivery_cust_tel"
                                                                                                   name="delivery_cust_tel"
                                                                                                   value="<?php echo htmlspecialchars($_POST['delivery_cust_tel']); ?>" type="text">
                                                                                            <?php emptyTest('delivery_cust_tel'); ?>
                                                                                        </td>
                                                                                    </tr>
                                                                                    </tbody>
                                                                                </table>
                                                                            </td>
                                                                            <!-- delivery information end -->
                                                                        </tr>
                                                                        <tr>
                                                                            <td colspan="3"><img alt=""
                                                                                                 src="/checkout/images/spacer.gif"
                                                                                                 width="1" height="20">
                                                                            </td>
                                                                        </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </td>
                                                            </tr>
                                                            </tbody>
                                                        </table>
                                                        <table width="700" align="center" border="0" cellpadding="0"
                                                               cellspacing="0">
                                                            <tbody>
                                                            <tr>
                                                                <td class="requiredfield" align="right">
                                                                    <div align="left">
                                                                        <img alt="" src="/checkout/images/bullet1.gif"
                                                                             width="10" border="0" height="9">indicates
                                                                        a required field.
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            </tbody>
                                                        </table>
                                                        <br>
                                                        <table width="700" align="center" bgcolor="#ffffff" border="0"
                                                               cellpadding="0" cellspacing="0">
                                                            <tbody>
                                                            <!--tr>
                                                                <td class="boxheader" width="50%">
                                                                    &nbsp;
                                                                    <img alt="" src="/checkout/images/g-hspcr.gif"
                                                                         width="9" height="10">Shipping Options
                                                                </td>
                                                                <td class="boxheader" width="50%">&nbsp;
                                                                    <img alt="" src="/checkout/images/g-hspcr.gif"
                                                                         width="9" height="10">Payment Information
                                                                </td>
                                                            </tr-->
                                                            <tr>
                                                                <td colspan="2" class="boxbody"><br>
                                                                    <table width="98%" align="center" border="0"
                                                                           cellpadding="0" cellspacing="0">
                                                                        <tbody>
                                                                        <tr>
                                                                            <td width="50%" valign="top">
                                                                                <table width="310" align="center"
                                                                                       border="0" cellpadding="0"
                                                                                       cellspacing="0">
                                                                                    <tbody>
                                                                                    <tr>
                                                                                        <td class="fieldheader"
                                                                                            colspan="2">
                                                                                            <input type="checkbox" <?php  if ( !empty($_POST['agree']) ) { echo ' checked="checked"'; }  ?>  name="agree" id="agree">
                                                                                            I have Read and Agree with the <a target="_blank" href="termsandcondition.html">Terms and Conditions</a>
                                                                                            <br>
                                                                                            <input type="checkbox" <?php  if ( !empty($_POST['agree2']) ) { echo ' checked="checked"'; }  ?>  name="agree2" id="agree2">
                                                                                            I have Read and Agree with the <a target="_blank" href="termsandcondition.html">Privacy</a>
                                                                                            <br>
                                                                                            <input type="checkbox" <?php  if ( !empty($_POST['agree3']) ) { echo ' checked="checked"'; }  ?>  name="agree3" id="agree3">
                                                                                            I have Read and Agree with the <a target="_blank" href="shipping.html">Shipping</a>
                                                                                            <br>
                                                                                            <input type="checkbox" <?php  if ( !empty($_POST['agree4']) ) { echo ' checked="checked"'; }  ?>  name="agree4" id="agree4">
                                                                                            I have Read and Agree with the <a target="_blank" href="return.html">Return</a>
                                                                                            <br>
                                                                                            <input type="checkbox" <?php  if ( !empty($_POST['agree5']) ) { echo ' checked="checked"'; }  ?>  name="agree5" id="agree5">
                                                                                            I have Read and Agree with the <a target="_blank" href="refund.html">Refund</a>
                                                                                            <br>
                                                                                            <input type="checkbox" <?php  if ( !empty($_POST['agree6']) ) { echo ' checked="checked"'; }  ?>  name="agree6" id="agree6">
                                                                                            I have Read and Agree with the <a target="_blank" href="cancellation.html">Cancellation Policy</a>
                                                                                            <br>
                                                                                            <?php emptyTest('agree'); ?>
                                                                                        </td>
                                                                                    </tr>

                                                                                    </tbody>
                                                                                </table>
                                                                                <br>
                                                                                <br>
                                                                            </td>
                                                                            <td width="1">
                                                                            <td width="1"
                                                                                background="/checkout/images/v-line.gif">
                                                                                <img alt=""
                                                                                     src="/checkout/images/spacer.gif"
                                                                                     width="1" border="0" height="1">
                                                                            </td>
                                                                            </td>
                                                                            <td width="50%" valign="top">
                                                                                <!-- credit card -->
                                                                                <table width="310" align="center"
                                                                                       border="0" cellpadding="0"
                                                                                       cellspacing="0" id="card" style="display:none">
                                                                                    <tbody>
                                                                                    <tr>
                                                                                        <td class="fieldheader"
                                                                                            nowrap="nowrap">
                                                                                            <img alt=""
                                                                                                 src="/checkout/images/bullet1.gif"
                                                                                                 width="10" height="9">

                                                                                            Name on Card:
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td nowrap="nowrap">
                                                                                            <input class="input"
                                                                                                   style="width: 310px;"
                                                                                                   name="card_name"
                                                                                                   id="card_name"
                                                                                                   value="<?php echo htmlspecialchars($_POST['card_name']); ?>" type="text">
                                                                                            <?php emptyTest('card_name'); ?>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td><img alt=""
                                                                                                 src="/checkout/images/spacer.gif"
                                                                                                 width="1" height="3">
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="fieldheader"
                                                                                            nowrap="nowrap">
                                                                                            <img alt=""
                                                                                                 src="/checkout/images/bullet1.gif"
                                                                                                 width="10" height="9">

                                                                                            Card Number:
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td nowrap="nowrap">
                                                                                            <input class="input"
                                                                                                   style="width: 310px;"
                                                                                                   name="cc_number"
                                                                                                   id="cc_number"
                                                                                                   value="<?php echo htmlspecialchars($_POST['cc_number']); ?>"
                                                                                                   autocomplete="OFF"
                                                                                                   type="text">
                                                                                            <?php emptyTest('cc_number'); ?>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td><img alt=""
                                                                                                 src="/checkout/images/spacer.gif"
                                                                                                 width="1" height="3">
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>
                                                                                            <table width="310"
                                                                                                   align="center"
                                                                                                   border="0"
                                                                                                   cellpadding="0"
                                                                                                   cellspacing="0">
                                                                                                <tbody>
                                                                                                <tr>
                                                                                                    <td class="fieldheader"
                                                                                                        nowrap="nowrap">
                                                                                                        <img alt=""
                                                                                                             src="/checkout/images/bullet1.gif"
                                                                                                             width="10"
                                                                                                             height="9">

                                                                                                        Card Type:
                                                                                                    </td>
                                                                                                    <td class="fieldheader"
                                                                                                        nowrap="nowrap">
                                                                                                        <img alt=""
                                                                                                             src="/checkout/images/spacer.gif"
                                                                                                             width="10"
                                                                                                             height="1">
                                                                                                    </td>
                                                                                                    <td class="fieldheader"
                                                                                                        nowrap="nowrap">
                                                                                                        <img alt=""
                                                                                                             src="/checkout/images/bullet1.gif"
                                                                                                             width="10"
                                                                                                             height="9">

                                                                                                        Expiry date:
                                                                                                    </td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td nowrap="nowrap">
                                                                                                        <select
                                                                                                            class="input"
                                                                                                            style="width: 135px;"
                                                                                                            name="cc_type">
                                                                                                            <option
                                                                                                                value="visa">
                                                                                                                Visa
                                                                                                            </option>
                                                                                                            <option
                                                                                                                value="mastercard">
                                                                                                                MasterCard
                                                                                                            </option>
                                                                                                            <option
                                                                                                                value="amex">
                                                                                                                American
                                                                                                                Express
                                                                                                            </option>
                                                                                                            <option
                                                                                                                value="eurocard">
                                                                                                                EuroCard
                                                                                                            </option>
                                                                                                            <option
                                                                                                                value="cartebluevisa">
                                                                                                                Carte
                                                                                                                Bleue
                                                                                                                Visa
                                                                                                            </option>
                                                                                                            <option
                                                                                                                value="cartebluemaster">
                                                                                                                Carte
                                                                                                                Bleue
                                                                                                                MasterCard
                                                                                                            </option>
                                                                                                            <option
                                                                                                                value="maestro">
                                                                                                                Maestro
                                                                                                            </option>
                                                                                                            <option
                                                                                                                value="jcb">
                                                                                                                JCB
                                                                                                            </option>
                                                                                                            <option
                                                                                                                value="dinersclub">
                                                                                                                Diners
                                                                                                                Club
                                                                                                            </option>
                                                                                                        </select>
                                                                                                        <?php emptyTest('cc_type'); ?>
                                                                                                    </td>
                                                                                                    <td class="fieldheader"
                                                                                                        nowrap="nowrap">
                                                                                                        <img alt=""
                                                                                                             src="/checkout/images/spacer.gif"
                                                                                                             width="10"
                                                                                                             height="1">
                                                                                                    </td>
                                                                                                    <td width="100%"
                                                                                                        nowrap="nowrap">
                                                                                                        <table
                                                                                                            cellpadding="0"
                                                                                                            cellspacing="0"
                                                                                                            border="0">
                                                                                                            <tr valign="top">
                                                                                                                <td>
                                                                                                                    <input
                                                                                                                        style="width:30px;"
                                                                                                                        maxlength="2"
                                                                                                                        class="input"
                                                                                                                        type="text"
                                                                                                                        onclick="removeDefault(this,'mm');"
                                                                                                                        onblur="insertDefault(this,'mm');"
                                                                                                                        name="cc_exp_month"
                                                                                                                        id="cc_exp_month"
                                                                                                                        value="<?php if ( !empty($_POST['cc_exp_month']) ) { echo htmlspecialchars($_POST['cc_exp_month']); } else { echo  ''; } ?>"
                                                                                                                        placeholder="mm"
                                                                                                                    />

                                                                                                                    <?php emptyTest('cc_exp_month'); ?>
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    &nbsp;/&nbsp;</td>
                                                                                                                <td>
                                                                                                                    <input
                                                                                                                        style="width:40px;"
                                                                                                                        maxlength="4"
                                                                                                                        class="input"
                                                                                                                        type="text"
                                                                                                                        onclick="removeDefault(this,'yyyy');"
                                                                                                                        onblur="insertDefault(this,'yyyy');"
                                                                                                                        name="cc_exp_year"
                                                                                                                        id="cc_exp_year"
                                                                                                                        value="<?php if ( !empty($_POST['cc_exp_year']) ) { echo htmlspecialchars($_POST['cc_exp_year']); } else { echo  ''; } ?>"
                                                                                                                        placeholder="yyyy"
                                                                                                                        />
                                                                                                                    <?php emptyTest('cc_exp_year'); ?>
                                                                                                                </td>
                                                                                                            </tr>
                                                                                                        </table>
                                                                                                    </td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td colspan="2">
                                                                                                        &nbsp;</td>
                                                                                                    <td class="fieldheader"
                                                                                                        colspan="2">
                                                                                                        e.g. 10/2018 for
                                                                                                        expiration date
                                                                                                        of Oct 2018
                                                                                                    </td>
                                                                                                </tr>
                                                                                                </tbody>
                                                                                            </table>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td><img alt=""
                                                                                                 src="/checkout/images/spacer.gif"
                                                                                                 width="1" height="3">
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="fieldheader"
                                                                                            nowrap="nowrap">
                                                                                            <img alt=""
                                                                                                 src="/checkout/images/bullet1.gif"
                                                                                                 width="10" height="9">

                                                                                            CVV2:
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td nowrap="nowrap">
                                                                                            <input class="input"
                                                                                                   maxlength="4"
                                                                                                   style="width: 100px;"
                                                                                                   name="cc_cvv2"
                                                                                                   id="cc_cvv2" value="<?php echo htmlspecialchars($_POST['cc_cvv2']); ?>"
                                                                                                   type="text">
                                                                                            <?php emptyTest('cc_cvv2'); ?>

                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="fieldheader"
                                                                                            nowrap="nowrap">

                                                                                            Issuing Bank:
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td nowrap="nowrap">
                                                                                            <input class="input"
                                                                                                   style="width: 310px;"
                                                                                                   name="issuing_bank"
                                                                                                   id="issuing_bank"
                                                                                                   value="<?php echo htmlspecialchars($_POST['issuing_bank']); ?>" type="text">
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td><img alt=""
                                                                                                 src="/checkout/images/spacer.gif"
                                                                                                 width="1" height="3">
                                                                                        </td>
                                                                                    </tr>
                                                                                    </tbody>
                                                                                </table>
                                                                                <!-- credit card end -->
                                                                                <br>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td colspan="3"><img alt=""
                                                                                                 src="/checkout/images/spacer.gif"
                                                                                                 width="1" height="20">
                                                                            </td>
                                                                        </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </td>
                                                            </tr>
                                                            </tbody>
                                                        </table>

                                                        <table width="700" align="center" border="0" cellpadding="0"
                                                               cellspacing="0">
                                                            <tbody>
                                                            <tr>
                                                                <td class="requiredfield" align="right">
                                                                    <div align="left"><img alt=""
                                                                                           src="/checkout/images/bullet1.gif"
                                                                                           width="10" border="0"
                                                                                           height="9"> indicates a
                                                                        required field.
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            </tbody>
                                                        </table>
                                                        <table width="700" align="center" border="0" cellpadding="0"
                                                               cellspacing="0">
                                                            <tbody>
                                                            <tr>
                                                                <td class="requiredfield" align="right">
                                                                    <div align="left"></div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="requiredfield" align="right"><input
                                                                        class="submit_button" type="submit"
                                                                        value="SUBMIT ORDER" name="submit">
<div style="text-align:left;"><img src="qualitrade-black.png"></div>
                                                                    </td>
                                                            </tr>
                                                            </tbody>
                                                        </table>
                                                        <br>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            </tbody>
        </table>
    </form>
            </div>
        </div>
    </div>
<?
include('footer.php');
?>