# face

face 是基于微软小冰接口的颜值检测工具

## Install

```
composer require hanson/face
```

## Usage

```php

$face = new \Hanson\Face\Foundation\Face();

$result = $face->score->get('https://ws2.sinaimg.cn/large/685b97a1gy1fehkmbi6hvj20u00u07ab.jpg');

/**

$result = [
    'score' => 6.8,
    'text' => '哥们颜值才6.8分，一下让整体颜值从7.3跌到7.1ORZ',
    'url' => 'http://mediaplatform.trafficmanager.cn/image/fetchimage?key='
];

**/
```

## Document

```php

$face = new \Hanson\Face\Foundation\Face();

// 获取颜值实例
$score = $face->score;

// 获取受欢迎实例
$popular = $face->popular;

// 获取关系实例
$relation = $face->relation;

// 获取请客实例
$bill = $face->bill;

// 获取时尚穿衣实例
$clothing = $face->clothing;

// 所有实例均有一个方法 get
$result = $bill->get($url);

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
