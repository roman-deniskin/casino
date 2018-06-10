<?
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s")." GMT");
header("Cache-Control: no-cache, must-revalidate");
header("Cache-Control: post-check=0,pre-check=0", false);
header("Cache-Control: max-age=0", false);
header("Pragma: no-cache");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="Cache-Control" content="no-cache" />
  <link rel="shortcut icon" href="img/favicon.png" type="image/x-icon">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>Azino 777</title>

  <!-- Bootstrap -->
  <link href="css/normalize.css" rel="stylesheet">
  <link href="css/main.css" rel="stylesheet">

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body>
<div class="page_wrapper index_page">
  <div class="header_wrapper">
    <div class="header_content">
      <div class="content_container clearfix">
        <div class="header_logo_wr">
          <img class="header_logo" src="img/logo.png" alt="Azino 777 - best choice for best people!" title="Azino 777 - best choice for best people!">
        </div>
        <div class="header_menu_wr">
          <ul class="header_menu_ul clearfix">
            <li class="header_menu_li"><a class="header_menu_a" href="/logout">Log out</a></li>
            <li class="header_menu_li"><a class="header_menu_a" href="/profile">Profile</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="content_container">
<?php
$content .= \Route_resolver\Route_resolver::getPageContent();
?>
  </div>
</div><!-- page wrapper -->

<div class="footer_wrapper">
  <div class="content_container">
    <div class="social_networks">
      <a class="social_networks_a" href="#"><i class="social_networks_i icon-facebook"></i></a>
      <a class="social_networks_a" href="#"><i class="social_networks_i icon-instagram"></i></a>
      <a class="social_networks_a" href="#"><i class="social_networks_i icon-internet"></i></a>
      <a class="social_networks_a" href="#"><i class="social_networks_i icon-linkedin"></i></a>
      <a class="social_networks_a" href="#"><i class="social_networks_i icon-whatsapp-logo"></i></a>
    </div>
    <div class="copyright">Azino 777 - all rights reserved.</div>
  </div>
</div>
<script src="js/jquery-3.1.1.min.js"></script>
<script src="js/main.js"></script>
</body>
</html>