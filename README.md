# face-score

face-score 是基于微软小冰接口的颜值检测工具

## Install

```
composer require hanson/face-score
```

## Usage

```php

$score = new \Hanson\FaceScore\FaceScore();

$result = $score->getScore('https://ws2.sinaimg.cn/large/685b97a1gy1fehkmbi6hvj20u00u07ab.jpg');

/**

$result = [
    'score' => 6.8,
    'text' => '哥们颜值才6.8分，一下让整体颜值从7.3跌到7.1ORZ',
    'url' => 'http://mediaplatform.trafficmanager.cn/image/fetchimage?key='
];

**/
```

## Relative

项目参考自 https://github.com/FaithPatrick/FaceScore 