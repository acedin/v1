<?PHP
include('config.php');
session_start();

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

if(!empty($_REQUEST['product_code']))
{
    $amount                         = $qntArr[$_REQUEST['quantity']];

    $_SESSION['cart']               = [$_REQUEST['product_code'] => $amount];
    $_SESSION['amount']             = $amount;
    $_SESSION['shipping_method']    = $_REQUEST['shipping_method'];
    $_SESSION['total']              = $shippingArr[$_REQUEST['shipping_method']] + $amount;
    $_SESSION['shipping']           = $shippingArr[$_REQUEST['shipping_method']];
    $_SESSION['quantity']           = $_REQUEST['quantity'];

    header("Location: /shopping_cart.php");
}
else
{
    header("Location: /shopping_cart.php");
}