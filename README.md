# face

face 是基于微软小冰接口的颜值检测工具

## Install

```
composer require hanson/face
```

## Usage

```php

$face = new \Hanson\Face\Foundation\Face();

$face = $face->score->get('https://ws2.sinaimg.cn/large/685b97a1gy1fehkmbi6hvj20u00u07ab.jpg');

/**

$result = [
    'score' => 6.8,
    'text' => '哥们颜值才6.8分，一下让整体颜值从7.3跌到7.1ORZ',
    'url' => 'http://mediaplatform.trafficmanager.cn/image/fetchimage?key='
];

**/
```

## Achievement

### Score 颜值分数

![](https://ooo.0o0.ooo/2017/04/10/58eb894b8c36e.jpg)

### Bill 请吃饭

![](https://ooo.0o0.ooo/2017/04/10/58eb8d2e2f1db.jpg)

### Popular 最受欢迎

![](https://ooo.0o0.ooo/2017/04/10/58eb950a6bda9.jpg)

### Relation 关系

![](https://ooo.0o0.ooo/2017/04/10/58eb97d932144.jpg)

### Clothing 穿衣风格

![](https://ooo.0o0.ooo/2017/04/10/58eb99f234213.jpg)
