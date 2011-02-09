<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{

  protected function _initFacebook()
  {
    require_once 'Abouttheweb/facebook.php';
  }

}
