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
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Azino 777</title>

    <!-- Bootstrap -->
    <link href="css/normalize.css?time=<?=time();?>" rel="stylesheet">
    <link href="css/main.css?time=<?=time();?>" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
<div class="page_wrapper">
  <div class="header_wrapper">
    <div class="header_content">
      <div class="content_container">
        <div class="header_title">Azino 777 - best choice for best people!</div>
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
      <div class="copyright">Azino 777 - all rights reserved.</div>
    </div>
  </div>
  </body>
</html>