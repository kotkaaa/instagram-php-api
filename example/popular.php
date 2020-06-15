<?php

require '../src/Instagram.php';
require 'config.php';

use MetzWeb\Instagram\Instagram;

$instagram = new Instagram($config['apiKey']);

$result = $instagram->getMediaComments('CBV_B9kHhvX');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Instagram - popular photos</title>
    <link href="https://vjs.zencdn.net/4.2/video-js.css" rel="stylesheet">
    <link href="assets/style.css" rel="stylesheet">
    <script src="https://vjs.zencdn.net/4.2/video.js"></script>
</head>
<body>
<div class="container">
    <header class="clearfix">
        <img src="assets/instagram.png" alt="Instagram logo">
        <h1>Instagram <span>popular photos</span></h1>
    </header>
    <div class="main">
        <pre>
            <?php print_r($result) ?>
        </pre>
    </div>
</div>
</body>
</html>
