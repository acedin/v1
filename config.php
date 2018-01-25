<?PHP
error_reporting(0);
ini_set('display_errors', 0);
session_save_path(__DIR__.'/sess');

date_default_timezone_set('UTC');

$advert_id = '';
$outlink = '/order.php?advert_id='.$advert_id;

define('EMAIL_ADDRESS', 'orders@'.$_SERVER['HTTP_HOST']);

/**
 * Prod
 */
const PAYNET_END_POINT              = 654;
const PAYNET_LOGIN                  = 'ketone5';
const PAYNET_SIGNING_KEY            = '4E81BEB6-104B-4F96-A151-B75F7F37ED64';
const GATEWAY_MODE_SANDBOX          = false;
const GATEWAY_URL_SANDBOX           = 'https://sandbox.libill.com/paynet/api/v2/';
const GATEWAY_URL_PRODUCTION        = 'https://gate.libill.com/paynet/api/v2/';

/**
 * Paynet easy config for test
 */
/*
const PAYNET_END_POINT              = 123;
const PAYNET_LOGIN                  = 'mercury';
const PAYNET_SIGNING_KEY            = '108CD566-D070-4DE0-8DEC-201742171695';
const GATEWAY_MODE_SANDBOX          = true;
const GATEWAY_URL_SANDBOX           = 'https://sandbox.libill.com/paynet/api/v2/';
const GATEWAY_URL_PRODUCTION        = 'https://sandbox.libill.com/paynet/api/v2/';
*/

spl_autoload_register(function($class)
{
    if(strpos($class, 'PaynetEasy') !== 0)
    {
        return;
    }

    $class = str_replace('\\', '/', $class).'.php';

    include_once __DIR__.'/'.$class;
});