<?php

/**
 * Instagram PHP API
 *
 * @link https://github.com/cosenary/Instagram-PHP-API
 * @author Christian Metz
 * @since 01.10.2013
 */
require '../src/Instagram.php';
require 'config.php';

use MetzWeb\Instagram\Instagram;

// initialize class
$instagram = new Instagram($config);

// receive OAuth code parameter
$code = $_GET['access_token'];

// check whether the user has granted access
if (isset($code)) {
    // store user access token
    $instagram->setAccessToken($code);
    // now you have access to all authenticated user methods
    try {
        $result = $instagram->getMediaComments('CBV_B9kHhvX');
    } catch (\Exception $exception) {
        exit($exception->getMessage());
    }

} elseif (isset($_GET['error'])) {
    // check whether an error occurred
    throw new  \Exception('An error occurred: ' . $_GET['error_description']);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Instagram - photo stream</title>
    <link href="https://vjs.zencdn.net/4.2/video-js.css" rel="stylesheet">
    <link href="assets/style.css" rel="stylesheet">
    <script src="https://vjs.zencdn.net/4.2/video.js"></script>
</head>
<body>
<div class="container">
    <header class="clearfix">
        <img src="assets/instagram.png" alt="Instagram logo">
    </header>
    <div class="main">
        <pre>
            <?php print_r($result) ?>
        </pre>
    </div>
</div>
</body>
</html>
