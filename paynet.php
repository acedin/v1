<?PHP
use PaynetEasy\PaynetEasyApi\Exception\ValidationException;
use PaynetEasy\PaynetEasyApi\PaymentData\BillingAddress;
use PaynetEasy\PaynetEasyApi\PaymentData\CreditCard;
use PaynetEasy\PaynetEasyApi\PaymentData\Customer;
use PaynetEasy\PaynetEasyApi\PaymentData\Payment;
use PaynetEasy\PaynetEasyApi\PaymentData\PaymentTransaction;
use PaynetEasy\PaynetEasyApi\PaymentData\QueryConfig;
use PaynetEasy\PaynetEasyApi\PaymentProcessor;
use PaynetEasy\PaynetEasyApi\Transport\CallbackResponse;
use PaynetEasy\PaynetEasyApi\Transport\Response;
use PaynetEasy\PaynetEasyApi\Util\RegionFinder;
use PaynetEasy\PaynetEasyApi\Util\Validator;

/**
 * Paynet class
 */
class Paynet
{
    const COUNTRIES = 'a:250:{s:0:"";s:16:"Select please...";s:2:"AX";s:14:"Aaland Islands";s:2:"AF";s:11:"Afghanistan";s:2:"AL";s:7:"Albania";s:2:"DZ";s:7:"Algeria";s:2:"AS";s:14:"American Samoa";s:2:"AD";s:7:"Andorra";s:2:"AO";s:6:"Angola";s:2:"AI";s:8:"Anguilla";s:2:"AQ";s:10:"Antarctica";s:2:"AG";s:19:"Antigua And Barbuda";s:2:"AR";s:9:"Argentina";s:2:"AM";s:7:"Armenia";s:2:"AW";s:5:"Aruba";s:2:"AP";s:19:"Asia/pacific Region";s:2:"AU";s:9:"Australia";s:2:"AT";s:7:"Austria";s:2:"AZ";s:10:"Azerbaijan";s:2:"BS";s:7:"Bahamas";s:2:"BH";s:7:"Bahrain";s:2:"BD";s:10:"Bangladesh";s:2:"BB";s:8:"Barbados";s:2:"BY";s:7:"Belarus";s:2:"BE";s:7:"Belgium";s:2:"BZ";s:6:"Belize";s:2:"BJ";s:5:"Benin";s:2:"BM";s:7:"Bermuda";s:2:"BT";s:6:"Bhutan";s:2:"BO";s:31:"Bolivia, Plurinational State Of";s:2:"BA";s:22:"Bosnia And Herzegovina";s:2:"BW";s:8:"Botswana";s:2:"BV";s:13:"Bouvet Island";s:2:"BR";s:6:"Brazil";s:2:"IO";s:30:"British Indian Ocean Territory";s:2:"BN";s:17:"Brunei Darussalam";s:2:"BG";s:8:"Bulgaria";s:2:"BF";s:12:"Burkina Faso";s:2:"BI";s:7:"Burundi";s:2:"KH";s:8:"Cambodia";s:2:"CM";s:8:"Cameroon";s:2:"CA";s:6:"Canada";s:2:"CV";s:10:"Cape Verde";s:2:"KY";s:14:"Cayman Islands";s:2:"CF";s:24:"Central African Republic";s:2:"TD";s:4:"Chad";s:2:"CL";s:5:"Chile";s:2:"CN";s:5:"China";s:2:"CX";s:16:"Christmas Island";s:2:"CC";s:23:"Cocos (keeling) Islands";s:2:"CO";s:8:"Colombia";s:2:"KM";s:7:"Comoros";s:2:"CG";s:5:"Congo";s:2:"CD";s:37:"Congo, The Democratic Republic Of The";s:2:"CK";s:12:"Cook Islands";s:2:"CR";s:10:"Costa Rica";s:2:"CI";s:13:"Cote D\'ivoire";s:2:"HR";s:7:"Croatia";s:2:"CU";s:4:"Cuba";s:2:"CY";s:6:"Cyprus";s:2:"CZ";s:14:"Czech Republic";s:2:"DK";s:7:"Denmark";s:2:"DJ";s:8:"Djibouti";s:2:"DM";s:8:"Dominica";s:2:"DO";s:18:"Dominican Republic";s:2:"EC";s:7:"Ecuador";s:2:"EG";s:5:"Egypt";s:2:"SV";s:11:"El Salvador";s:2:"GQ";s:17:"Equatorial Guinea";s:2:"ER";s:7:"Eritrea";s:2:"EE";s:7:"Estonia";s:2:"ET";s:8:"Ethiopia";s:2:"EU";s:6:"Europe";s:2:"FK";s:27:"Falkland Islands (malvinas)";s:2:"FO";s:13:"Faroe Islands";s:2:"FJ";s:4:"Fiji";s:2:"FI";s:7:"Finland";s:2:"FR";s:6:"France";s:2:"GF";s:13:"French Guiana";s:2:"PF";s:16:"French Polynesia";s:2:"TF";s:27:"French Southern Territories";s:2:"GA";s:5:"Gabon";s:2:"GM";s:6:"Gambia";s:2:"GE";s:7:"Georgia";s:2:"DE";s:7:"Germany";s:2:"GH";s:5:"Ghana";s:2:"GI";s:9:"Gibraltar";s:2:"GR";s:6:"Greece";s:2:"GL";s:9:"Greenland";s:2:"GD";s:7:"Grenada";s:2:"GP";s:10:"Guadeloupe";s:2:"GU";s:4:"Guam";s:2:"GT";s:9:"Guatemala";s:2:"GG";s:8:"Guernsey";s:2:"GN";s:6:"Guinea";s:2:"GW";s:13:"Guinea-bissau";s:2:"GY";s:6:"Guyana";s:2:"HT";s:5:"Haiti";s:2:"HM";s:33:"Heard Island And Mcdonald Islands";s:2:"VA";s:29:"Holy See (vatican City State)";s:2:"HN";s:8:"Honduras";s:2:"HK";s:9:"Hong Kong";s:2:"HU";s:7:"Hungary";s:2:"IS";s:7:"Iceland";s:2:"IN";s:5:"India";s:2:"ID";s:9:"Indonesia";s:2:"IR";s:25:"Iran, Islamic Republic Of";s:2:"IQ";s:4:"Iraq";s:2:"IE";s:7:"Ireland";s:2:"IM";s:11:"Isle Of Man";s:2:"IL";s:6:"Israel";s:2:"IT";s:5:"Italy";s:2:"JM";s:7:"Jamaica";s:2:"JP";s:5:"Japan";s:2:"JE";s:6:"Jersey";s:2:"JO";s:6:"Jordan";s:2:"KZ";s:10:"Kazakhstan";s:2:"KE";s:5:"Kenya";s:2:"KI";s:8:"Kiribati";s:2:"KP";s:38:"Korea, Democratic People\'s Republic Of";s:2:"KR";s:18:"Korea, Republic Of";s:2:"XK";s:6:"Kosovo";s:2:"KW";s:6:"Kuwait";s:2:"KG";s:10:"Kyrgyzstan";s:2:"LA";s:32:"Lao People\'s Democratic Republic";s:2:"LV";s:6:"Latvia";s:2:"LB";s:7:"Lebanon";s:2:"LS";s:7:"Lesotho";s:2:"LR";s:7:"Liberia";s:2:"LY";s:22:"Libyan Arab Jamahiriya";s:2:"LI";s:13:"Liechtenstein";s:2:"LT";s:9:"Lithuania";s:2:"LU";s:10:"Luxembourg";s:2:"MO";s:5:"Macao";s:2:"MK";s:42:"Macedonia, The Former Yugoslav Republic Of";s:2:"MG";s:10:"Madagascar";s:2:"MW";s:6:"Malawi";s:2:"MY";s:8:"Malaysia";s:2:"MV";s:8:"Maldives";s:2:"ML";s:4:"Mali";s:2:"MT";s:5:"Malta";s:2:"MH";s:16:"Marshall Islands";s:2:"MQ";s:10:"Martinique";s:2:"MR";s:10:"Mauritania";s:2:"MU";s:9:"Mauritius";s:2:"YT";s:7:"Mayotte";s:2:"MX";s:6:"Mexico";s:2:"FM";s:31:"Micronesia, Federated States Of";s:2:"MD";s:20:"Moldova, Republic Of";s:2:"MC";s:6:"Monaco";s:2:"MN";s:8:"Mongolia";s:2:"ME";s:10:"Montenegro";s:2:"MS";s:10:"Montserrat";s:2:"MA";s:7:"Morocco";s:2:"MZ";s:10:"Mozambique";s:2:"MM";s:7:"Myanmar";s:2:"NA";s:7:"Namibia";s:2:"NR";s:5:"Nauru";s:2:"NP";s:5:"Nepal";s:2:"NL";s:11:"Netherlands";s:2:"AN";s:20:"Netherlands Antilles";s:2:"NC";s:13:"New Caledonia";s:2:"NZ";s:11:"New Zealand";s:2:"NI";s:9:"Nicaragua";s:2:"NE";s:5:"Niger";s:2:"NG";s:7:"Nigeria";s:2:"NU";s:4:"Niue";s:2:"NF";s:14:"Norfolk Island";s:2:"MP";s:24:"Northern Mariana Islands";s:2:"NO";s:6:"Norway";s:2:"OM";s:4:"Oman";s:2:"PK";s:8:"Pakistan";s:2:"PW";s:5:"Palau";s:2:"PS";s:31:"Palestinian Territory, Occupied";s:2:"PA";s:6:"Panama";s:2:"PG";s:16:"Papua New Guinea";s:2:"PY";s:8:"Paraguay";s:2:"PE";s:4:"Peru";s:2:"PH";s:11:"Philippines";s:2:"PN";s:8:"Pitcairn";s:2:"PL";s:6:"Poland";s:2:"PT";s:8:"Portugal";s:2:"PR";s:11:"Puerto Rico";s:2:"QA";s:5:"Qatar";s:2:"RE";s:7:"Reunion";s:2:"RO";s:7:"Romania";s:2:"RU";s:18:"Russian Federation";s:2:"RW";s:6:"Rwanda";s:2:"BL";s:16:"Saint Barthelemy";s:2:"SH";s:12:"Saint Helena";s:2:"KN";s:21:"Saint Kitts And Nevis";s:2:"LC";s:11:"Saint Lucia";s:2:"MF";s:26:"Saint Martin (french Part)";s:2:"PM";s:25:"Saint Pierre And Miquelon";s:2:"VC";s:32:"Saint Vincent And The Grenadines";s:2:"WS";s:5:"Samoa";s:2:"SM";s:10:"San Marino";s:2:"ST";s:21:"Sao Tome And Principe";s:2:"SA";s:12:"Saudi Arabia";s:2:"SN";s:7:"Senegal";s:2:"RS";s:6:"Serbia";s:2:"SC";s:10:"Seychelles";s:2:"SL";s:12:"Sierra Leone";s:2:"SG";s:9:"Singapore";s:2:"SK";s:8:"Slovakia";s:2:"SI";s:8:"Slovenia";s:2:"SB";s:15:"Solomon Islands";s:2:"SO";s:7:"Somalia";s:2:"ZA";s:12:"South Africa";s:2:"GS";s:44:"South Georgia And The South Sandwich Islands";s:2:"ES";s:5:"Spain";s:2:"LK";s:9:"Sri Lanka";s:2:"SD";s:5:"Sudan";s:2:"SR";s:8:"Suriname";s:2:"SJ";s:22:"Svalbard And Jan Mayen";s:2:"SZ";s:9:"Swaziland";s:2:"SE";s:6:"Sweden";s:2:"CH";s:11:"Switzerland";s:2:"SY";s:20:"Syrian Arab Republic";s:2:"TW";s:25:"Taiwan, Province Of China";s:2:"TJ";s:10:"Tajikistan";s:2:"TZ";s:28:"Tanzania, United Republic Of";s:2:"TH";s:8:"Thailand";s:2:"TL";s:11:"Timor-leste";s:2:"TG";s:4:"Togo";s:2:"TK";s:7:"Tokelau";s:2:"TO";s:5:"Tonga";s:2:"TT";s:19:"Trinidad And Tobago";s:2:"TN";s:7:"Tunisia";s:2:"TR";s:6:"Turkey";s:2:"TM";s:12:"Turkmenistan";s:2:"TC";s:24:"Turks And Caicos Islands";s:2:"TV";s:6:"Tuvalu";s:2:"UG";s:6:"Uganda";s:2:"UA";s:7:"Ukraine";s:2:"AE";s:20:"United Arab Emirates";s:2:"GB";s:14:"United Kingdom";s:2:"US";s:13:"United States";s:2:"UM";s:36:"United States Minor Outlying Islands";s:2:"UY";s:7:"Uruguay";s:2:"UZ";s:10:"Uzbekistan";s:2:"VU";s:7:"Vanuatu";s:2:"VE";s:33:"Venezuela, Bolivarian Republic Of";s:2:"VN";s:8:"Viet Nam";s:2:"VG";s:23:"Virgin Islands, British";s:2:"VI";s:20:"Virgin Islands, U.s.";s:2:"WF";s:17:"Wallis And Futuna";s:2:"EH";s:14:"Western Sahara";s:2:"YE";s:5:"Yemen";s:2:"ZM";s:6:"Zambia";s:2:"ZW";s:8:"Zimbabwe";}s:17:"expire_month_list";a:13:{i:0;s:16:"Select please...";i:1;s:7:"January";i:2;s:8:"February";i:3;s:5:"March";i:4;s:5:"April";i:5;s:3:"May";i:6;s:4:"June";i:7;s:4:"July";i:8;s:6:"August";i:9;s:9:"September";i:10;s:7:"October";i:11;s:8:"November";i:12;s:8:"December";}s:16:"expire_year_list";a:17:{i:0;s:16:"Select please...";i:16;i:2016;i:17;i:2017;i:18;i:2018;i:19;i:2019;i:20;i:2020;i:21;i:2021;i:22;i:2022;i:23;i:2023;i:24;i:2024;i:25;i:2025;i:26;i:2026;i:27;i:2027;i:28;i:2028;i:29;i:2029;i:30;i:2030;i:31;i:2031;}s:16:"delivery_systems";a:2:{i:6;a:4:{s:18:"delivery_system_id";s:1:"6";s:4:"name";s:4:"USPS";s:5:"price";s:4:"9.99";s:7:"checked";s:1:"1";}i:1;a:4:{s:18:"delivery_system_id";s:1:"1";s:4:"name";s:5:"Fedex";s:5:"price";s:5:"19.99";s:7:"checked";s:1:"0";}}s:4:"mode";s:8:"delivery";}';

    protected $order_id;

    protected $order_desc;

    protected $total;

    protected $transaction;

    static public function is_form()
    {
        return true;
        //return false;
    }

    static public function home_url($add)
    {
        return 'http://'.$_SERVER['HTTP_HOST'].$add;
    }

    static public function parse_request()
    {
        $response                   = null;

        $response                   = empty($_SESSION['payneteasy_response']) ? null : $_SESSION['payneteasy_response'];

        if(!empty($response))
        {
            $_SESSION['payneteasy_response'] = null;

            if($response instanceof Response)
            {
                if($response->getNeededAction() === Response::NEEDED_SHOW_HTML)
                {
                    echo $response->getHtml();
                    exit;
                }
                elseif($response->getNeededAction() === Response::NEEDED_REDIRECT)
                {
                    header("Location: {$response->getRedirectUrl()}");
                    exit;
                }
            }
        }

        if(isset($_GET['checkout_process']))
        {
            $class                      = new self();

            $class->checkout_process();
        }
        elseif(isset($_GET['checkout_return']))
        {
            $class                      = new self();

            $class->customer_return();
        }
        elseif(isset($_GET['checkout_callback']))
        {
            $class                      = new self();

            $class->payment_callback();
        }
        elseif(isset($_POST['shipEmail']))
        {
            $class                      = new self();

            $class->process_payment_start();
        }
    }

    public function log_error($error)
    {
        if($error instanceof \Exception)
        {
            $error                      = $error->getMessage(). "\n\n";
            file_put_contents('./errors.log', $error, FILE_APPEND);
        }
    }

    public function process_payment_start()
    {
        try
        {
            $response               = $this->start_transaction();
        }
        catch(\Exception $e)
        {
            // ошибка
            $this->log_error($e);
            $this->display_error();
            return;
        }

        if($response->isError())
        {
            $this->log_error($response);
            $this->display_error();
            return;
        }

        $_SESSION['payneteasy_response'] = $response;

        switch($response->getNeededAction())
        {
            case Response::NEEDED_REDIRECT:
            {
                header('Location: '.$response->getRedirectUrl());
                exit;
            }
            case Response::NEEDED_STATUS_UPDATE:
            case Response::NEEDED_SHOW_HTML:
            {
                header('Location: '.self::home_url('/paynet.php?checkout_process=true'));
                exit;
            }
        }

        // OK
        $this->display_approve();
    }

    public function checkout_process()
    {
        $transaction            = $this->load_payment_transaction();

        $this->transaction      = $transaction;

        if($transaction instanceof PaymentTransaction === false)
        {
            header('Location: /');
            exit;
        }

        try
        {
            $this->get_payment_processor()->executeQuery('status', $transaction);

            if($transaction->isDeclined() || $transaction->isError())
            {
                unset($_SESSION['payneteasy_transaction']);
                unset($_SESSION['payneteasy_response']);
                $this->log_error($transaction->getLastError());
                $this->display_error();
                exit;
            }
            elseif($transaction->isApproved())
            {
                unset($_SESSION['payneteasy_response']);
                unset($_SESSION['payneteasy_transaction']);
                $this->display_approve();

                exit;
            }
            elseif($transaction->isProcessing())
            {
                $this->display_process();

                return;
            }
        }
        catch(\Exception $e)
        {
            $this->log_error($e);
            $this->display_error();

            exit;
        }

        $this->display_process();
    }

    public function customer_return()
    {
        $transaction            = $this->load_payment_transaction();

        $this->transaction      = $transaction;

        if($transaction instanceof PaymentTransaction === false)
        {
            header('Location: /');
            exit;
        }

        try
        {
            /**
             * Обработаем данные, полученные от PaynetEasy
             */
            $this->get_payment_processor()->processCustomerReturn
            (
                new CallbackResponse($_POST),
                $transaction
            );

            if($transaction->isDeclined() || $transaction->isError())
            {
                $this->log_error($transaction->getLastError());
                $this->display_error();
                unset($_SESSION['payneteasy_response']);
                unset($_SESSION['payneteasy_transaction']);
                exit;
            }
            elseif($transaction->isApproved())
            {
                $this->display_approve();
                unset($_SESSION['payneteasy_response']);
                unset($_SESSION['payneteasy_transaction']);
                exit;
            }
            elseif($transaction->isProcessing())
            {
                return;
            }
        }
        catch(\Exception $e)
        {
            $this->log_error($e);
            $this->display_error();

            exit;
        }
    }

    public function payment_callback()
    {
        $transaction            = $this->load_payment_transaction();

        if($transaction instanceof PaymentTransaction === false)
        {
            exit;
        }

        /**
         * Обработаем данные, полученные от PaynetEasy
         */
        $this->get_payment_processor()->processPaynetEasyCallback
        (
            new CallbackResponse($_GET),
            $transaction
        );

        if($transaction->isDeclined() || $transaction->isError())
        {
        }
        elseif($transaction->isApproved())
        {
        }

        exit;
    }

    public function start_transaction()
    {
        $transaction                = new PaymentTransaction
        ([
             'payment'              => new Payment($this->define_payment_data()),
             'query_config'         =>  $this->get_payneteasy_config()
        ]);

        $method                     = self::is_form() ? 'sale-form' : 'sale';

        return $this->get_payment_processor()->executeQuery($method, $transaction);
    }

    public function get_payneteasy_config()
    {
        return new QueryConfig
        ([
            /**
             * Точка входа для аккаунта мерчанта, выдается при подключении
             */
            'end_point'                 => $this->get_end_point(),
            /**
             * Логин мерчанта, выдается при подключении
             */
            'login'                     => PAYNET_LOGIN,
            /**
             * Ключ мерчанта для подписывания запросов, выдается при подключении
             */
            'signing_key'               => PAYNET_SIGNING_KEY,
            /**
             * URL на который пользователь будет перенаправлен после окончания запроса
             */
            'redirect_url'              => self::home_url('/paynet.php?checkout_process=true'),
            /**
             * URL на который пользователь будет перенаправлен после окончания запроса
             */
            'callback_url'              => self::home_url('/paynet.php?checkout_callback=true'),
            /**
             * Режим работы библиотеки: sandbox, production
             */
            'gateway_mode'              => GATEWAY_MODE_SANDBOX
                                           ? QueryConfig::GATEWAY_MODE_SANDBOX
                                           : QueryConfig::GATEWAY_MODE_PRODUCTION,
            /**
             * Ссылка на шлюз PaynetEasy для режима работы sandbox
             */
            'gateway_url_sandbox'       => GATEWAY_URL_SANDBOX,
            /**
             * Ссылка на шлюз PaynetEasy для режима работы production
             */
            'gateway_url_production'    => GATEWAY_URL_PRODUCTION
        ]);
    }

    public function save_payment_transaction(PaymentTransaction $payment_transaction)
    {
        $_SESSION['payneteasy_transaction'] = $payment_transaction;
    }

    /**
     * @return PaymentTransaction
     */
    public function load_payment_transaction()
    {
        return $_SESSION['payneteasy_transaction'];
    }

    protected function get_payment_processor()
    {
        return new PaymentProcessor
        ([
            PaymentProcessor::HANDLER_SAVE_CHANGES          => [$this, 'save_payment_transaction'],
            //PaymentProcessor::HANDLER_CATCH_EXCEPTION     => [$this, 'handle_payment_exception'],
            //PaymentProcessor::HANDLER_STATUS_UPDATE       => [$this, 'display_wait_page'],
            //PaymentProcessor::HANDLER_REDIRECT            => [$this, 'redirect_to_response_url'],
            //PaymentProcessor::HANDLER_SHOW_HTML           => [$this, 'display_response_html'],
            //PaymentProcessor::HANDLER_FINISH_PROCESSING   => [$this, 'end_payment']
        ]);
    }

    protected function define_payment_data()
    {
        $this->generate_order();

        $birthday                   = $this->gen_rand_birthday();

        $country                    = $this->detect_country();
        $state                      = empty($_REQUEST['firstName']) ? $_REQUEST['shipState'] : $_REQUEST['state'];

        $data                       =
        [
            'client_id'             => $this->order_id,
            'description'           => $this->generate_order_desc(),
            'merchant_data'         => $this->generate_merchant_data(),
            'amount'                => $this->total,
            'currency'              => 'USD',
            'customer'              =>  new Customer
            ([
               'first_name'         => empty($_REQUEST['firstName']) ? $_REQUEST['shipFirstName'] : $_REQUEST['firstName'],
               'last_name'          => empty($_REQUEST['lastName']) ? $_REQUEST['shipLastName'] : $_REQUEST['lastName'],
               'email'              => $_REQUEST['shipEmail'],
               'ip_address'         => $_SERVER['REMOTE_ADDR'],
               'birthday'           => $birthday,

               'customer_accept_language' => isset($_REQUEST['customer_accept_language']) ? $_REQUEST['customer_accept_language'] : '',
               'customer_user_agent'      => isset($_REQUEST['customer_user_agent']) ? $_REQUEST['customer_user_agent'] : '',
               'customer_localtime'       => isset($_REQUEST['customer_localtime']) ? $_REQUEST['customer_localtime'] : '',
               'customer_screen_size'     => isset($_REQUEST['customer_screen_size']) ? $_REQUEST['customer_screen_size'] : ''
            ]),
            'billing_address'       =>  new BillingAddress
            ([
               'country'            => $country,
               'city'               => empty($_REQUEST['firstName']) ? $_REQUEST['shipCity'] : $_REQUEST['city'],
               'state'              => RegionFinder::hasStates($country) ? $state : '',
               'first_line'         => empty($_REQUEST['firstName']) ? $_REQUEST['shipAddress'] : $_REQUEST['address'],
               'zip_code'           => empty($_REQUEST['firstName']) ? $_REQUEST['shipZip'] : $_REQUEST['zip'],
               'phone'              => $_REQUEST['shipPhone']
            ])
        ];

        if(self::is_form() === false)
        {
            $data['credit_card']        = new CreditCard
            ([
                'card_printed_name'     => trim($_REQUEST['cardPrintedName']),
                'credit_card_number'    => trim($_REQUEST['cardNumber']),
                'expire_month'          => trim($_REQUEST['expMo']),
                'expire_year'           => trim(substr($_REQUEST['expYr'], 2, 2)),
                'cvv2'                  => trim($_REQUEST['cvv'])
            ]);
        }

        return $data;
    }

    protected function get_end_point()
    {
        return PAYNET_END_POINT;
    }

    protected function gen_rand_birthday()
    {
        $min_date                   = new \DateTime();
        $min_date->add(DateInterval::createFromDateString('-21 years'));
        $max_date                   = new \DateTime();
        $max_date->add(DateInterval::createFromDateString('-60 years'));

        $rand_time                  = rand($min_date->getTimestamp(), $max_date->getTimestamp());

        return date('Ymd', $rand_time);
    }

    protected function detect_country()
    {
        if(empty($_REQUEST['firstName']))
        {
            $country                = trim($_REQUEST['shipCountry']);
        }
        else
        {
            $country                = trim($_REQUEST['country']);
        }

        $countries                  = unserialize(self::COUNTRIES);

        $result                     = array_search($country, $countries);

        return $result;
    }

    protected function generate_order()
    {
        $body                       = '';
        $total                      = 0;

        $this->order_id             = uniqid();

        if(empty($_SESSION['cart']))
        {
            session_destroy();
            header('Location: /');
            exit();
        }

        $discount       = $_SESSION['discount'];

        $str            = 'Bottles of VitoSlim';

        $quantity       = $_SESSION['quantity'];
        $total          = $_SESSION['amount'];

        $str            .= " quantity: $quantity";

        $disc_usd       = round($total*$discount/100,2);
        $total_w_disc   = round($total*(100-$discount)/100,2);

        $str            = sprintf("Subtotal amount: $%.2f\n",$total);
        $body           = $body . $str;
        //$str            = sprintf("Your personal discount: $%.2f\n",$disc_usd);
        //$body           = $body . $str;
        $str            = sprintf("Delivery: $%.2f\n", $_SESSION['shipping']);
        $body           = $body . $str;
        $str            = sprintf("Total due: $%.2f\n", $_SESSION['total']);

        $body           = $body . $str;

        $this->order_desc           = $body;
        $this->total                = $_SESSION['total'];
        $this->total                = number_format($this->total, 2, '.', '');
    }

    protected function generate_order_desc()
    {
        return substr($this->order_desc, 0, 120);
    }

    protected function generate_merchant_data()
    {
        return $this->order_desc;
    }

    protected function display_approve()
    {
        include('header.php');
?>
        </head>
        <body id="home">
        <?php include('topmenu.php'); ?>
        <div>
            <h1>Thank you! Your order has been received</h1>
            <h1>Our support team will revise it and will provide with delivery tracking number within 24 hours. In case of any questions feel free to contact us at <?=EMAIL_ADDRESS?></h1>
        </div>
<?PHP
        include('footer.php');
    }

    protected function display_error()
    {
    include('header.php');
?>
    </head>
    <body id="home">
    <?php include('topmenu.php'); ?>
    <div>
        <h1>Thank you! Your order has not been received. Error!</h1>
        <h1>Our support team will revise it and will provide with delivery tracking number within 24 hours. In case of any questions feel free to contact us at <?=EMAIL_ADDRESS?></h1>
    </div>
<?PHP
    include('footer.php');
    }

    protected function display_process()
    {
        include('header.php');
?>
        </head>
        <body id="home">
        <?php include('topmenu.php'); ?>
        <div style="margin: auto; width: 400px;">
            <h2>Please wait, your payment is being processed...</h2>

            <p>This page refreshes automatically each 30 sec...</p>
            <p>Next time it will refresh in <span id="seconds-remaining">30</span> sec.</p>

            <form action="<?php self::home_url('/paynet.php?checkout_process=true') ?>" name="update_status" method="post">
                <input type="submit" value="Check result" />
            </form>
        </div>
        <script type="text/javascript">
            function countdown()
            {
                if (document.getElementById("seconds-remaining").innerHTML > 0)
                {
                    --document.getElementById("seconds-remaining").innerHTML;
                    setTimeout(countdown, 1000);
                }
                else
                {
                    document.update_status.submit();
                }
            }

        	setTimeout(countdown, 2000);
        </script>
<?PHP
        include('footer.php');
    }
}

include_once 'config.php';
session_start();
Paynet::parse_request();