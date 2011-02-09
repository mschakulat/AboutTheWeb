<?php

class Application_Model_Facebook extends Facebook
{

  /**
   * Facebook application ID.
   */
  const APP_ID      = '152782611441849';

  /**
   * Facebook application secret.
   */
  const APP_SECRET  = '7a5aeb8b1a014eb8b2f39720432b5cf5';

  /**
   * Facebook cookie support.
   */
  const COOKIE      = true;

  /**
   * Base URL of the OAuth dialog.
   */
  const OAUTH_URL   = 'https://www.facebook.com/dialog/oauth';

  /**
   * Initialize a Facebook Application.
   *
   * The configuration:
   * - appId: the application ID
   * - secret: the application secret
   * - cookie: (optional) boolean true to enable cookie support
   * - domain: (optional) domain for the cookie
   * - fileUpload: (optional) boolean indicating if file uploads are enabled
   *
   * @param Array $config the application configuration
   */
  public function  __construct($config) {
    // If no appId is specified in the $config array, use self::APP_ID
    if (!isset($config['appId'])) {
      $config['appId'] = self::APP_ID;
    }
    // If no secret is specified in the $config array, use self::APP_SECRET
    if (!isset($config['secret'])) {
      $config['secret'] = self::APP_SECRET;
    }
    // If the cookie parameter is not set, use self::COOKIE
    if (!isset($config['cookie'])) {
      $config['cookie'] = self::COOKIE;
    }
    parent::__construct($config);
  }

  public function getUserInfo() {
    return $this->api('/me');
  }
}

