<?php
/*
 * A PHP file for being our standard web page
 */
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="Stylesheet"
          type="text/css"
          href="/conway/css/layout.css?ver=<?= md5_file(__DIR__ . '/../css/layout.css')?>"/>
          
  </head>

  <body>
    <?= $body ?>
  </body>
</html>
