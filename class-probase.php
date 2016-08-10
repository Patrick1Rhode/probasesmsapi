<?php
if ( !class_exists('ProbaseException') ) {
  require_once('class-probaseException.php');
}

/**
* Main Probase API Class
*/
class Probase {

  /*
  * Version of this class
  */
  const VERSION           = '1.3.2';

  /**
  * All Clockwork API calls start with BASE_URL
  * @author  Patrick Sikalinda
  */
  private $base_url = "http://smsapi.probasesms.com/apis/text/index.php";

  /**
  * string to append to API_BASE_URL to check authentication
  * @author  Patrick Sikalinda
  */
  const API_AUTH_METHOD   = 'authenticate';

  /**
  * string to append to API_BASE_URL for sending SMS
  * @author  Patrick Sikalinda
  */
  const API_SMS_METHOD    = 'sms';

  /**
  * string to append to API_BASE_URL for checking message credit
  * @author  Patrick Sikalinda
  */
  const API_CREDIT_METHOD = 'credit';

  /**
  * string to append to API_BASE_URL for checking account balance
  * @author  Patrick Sikalinda
  */
  const API_BALANCE_METHOD = 'balance';

  /** 
  * Clockwork API Key
  * 
  * @var string
  * @author  Patrick Sikalinda
  */
  public $key;

  /**
  * Use SSL when making HTTP requests
  *
  * If this is not set, SSL will be used where PHP supports it
  *
  * @var bool
  * @author  Patrick Sikalinda
  */
  public $ssl;

  /**
  * Proxy server hostname (Optional)
  *
  * @var string
  * @author  Patrick Sikalinda
  */
  public $proxy_host;

  /**
  * Proxy server port (Optional)
  *
  * @var integer
  * @author  Patrick Sikalinda
  */
  public $proxy_port;

  /**
  * From address used on text messages
  *
  * @var string (11 characters or 12 numbers)
  * @author  Patrick Sikalinda
  */
  public $from;

  /**
  * Allow long SMS messages (Cost up to 3 credits)
  *
  * @var bool
  * @author  Patrick Sikalinda
  */
  public $long;

  /**
  * Truncate message text if it is too long
  *
  * @var bool
  * @author  Patrick Sikalinda
  */
  public $truncate;

  /**
  * Enables various logging of messages when true.
  *
  * @var bool
  * @author  Patrick Sikalinda
  */
  public $log;

  /**
  * What Clockwork should do if you send an invalid character
  *
  * Possible values:
  *      'error'     - Return an error (Messasge is not sent)
  *      'remove'    - Remove the invalid character(s)
  *      'replace'   - Replace invalid characters where possible, remove others 
  * @author  Patrick Sikalinda
  */
  public $invalid_char_action;

  /**
  * Create a new instance of the Clockwork wrapper
  *
  * @param   string  key         Your Clockwork API Key
  * @param   array   options     Optional parameters for sending SMS
  * @author  Patrick Sikalinda
  */
  public function __construct($key, array $options = array()) {
    if (empty($key)) {
      throw new ProbaseException("Key can't be blank");
    } else {
      $this->key = $key;
    }
        
    $this->ssl                  = (array_key_exists('ssl', $options)) ? $options['ssl'] : null;
    $this->proxy_host           = (array_key_exists('proxy_host', $options)) ? $options['proxy_host'] : null;
    $this->proxy_port           = (array_key_exists('proxy_port', $options)) ? $options['proxy_port'] : null;
    $this->from                 = (array_key_exists('from', $options)) ? $options['from'] : null;
    $this->long                 = (array_key_exists('long', $options)) ? $options['long'] : null;
    $this->truncate             = (array_key_exists('truncate', $options)) ? $options['truncate'] : null;
    $this->invalid_char_action  = (array_key_exists('invalid_char_action', $options)) ? $options['invalid_char_action'] : null;
    $this->log                  = (array_key_exists('log', $options)) ? $options['log'] : false;
  }

  /**
  * Send some text messages
  * 
  *
  * @author  Patrick Sikalinda
  */
  public function send(array $sms) {
    if (!is_array($sms)) {
      throw new ProbaseException("sms parameter must be an array");
    }
	//
	else{
		if(extension_loaded('curl')) {
			//adding sms parameters to the url
			
	$qs	= http_build_query(array(
		'username'=>'demo',
		'password'=>$this->key,
		'mobiles'=>$sms['to'],
		'message'=>$sms['message'],
		'sender'=>$sms['from'],
		'type'=>'TEXT',
	));
	$url	= $this->base_url.'?'.$qs;
			//end
      $ch = curl_init($url);
	  curl_setopt( $ch, CURLOPT_URL, $url );
     

      $response = curl_exec($ch);
      $info = curl_getinfo($ch);

      curl_close($ch);

      return $response;
    }
		
	}
	  
	//
	}
	
	}
	?>