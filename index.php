<?php 

require 'route.php';
require 'application/helpers/common_helper.php';
require 'application/core/My_Controller.php';
require 'application/core/My_Model.php';
require 'application/library/recaptchalib.php'; // recaptcha
require "application/library/class.smtp.php";  // send mail
require 'application/library/class.phpmailer.php'; // send mail
require 'application/library/PHPMailerAutoload.php'; // send mail



    $route = new Route();
    $route->init();

?>