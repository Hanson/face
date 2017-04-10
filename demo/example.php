<?php

require __DIR__.'./../vendor/autoload.php';

$score = new \Hanson\FaceScore\FaceScore();

$result = $score->getScore('https://ws1.sinaimg.cn/large/685b97a1gy1fehhwzsk08j20yf0yiabd.jpg');

print_r($result);

echo '<img style="width:500px" src="' . $result['url'] . '">';
