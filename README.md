# face

face 是基于微软小冰接口的颜值检测工具

PS:其中某些接口还有一些参数，能够定位某些tag的位置，但因过于复杂这里没有实现

## Install

```
composer require hanson/face
```

## Usage

```php
<?php
$face = new \Hanson\Face\Foundation\Face();

$result = $face->score->get('https://ws2.sinaimg.cn/large/685b97a1gy1fehkmbi6hvj20u00u07ab.jpg');

/**

[
    'score' => 6.8,
    'text' => '哥们颜值才6.8分，一下让整体颜值从7.3跌到7.1ORZ',
    'url' => 'http://mediaplatform.trafficmanager.cn/image/fetchimage?key='
];

**/
```

## Document

```php
<?php
$face = new \Hanson\Face\Foundation\Face();

// 获取颜值实例
$instance = $face->score;

// 获取受欢迎实例
$instance = $face->popular;

// 获取关系实例
$instance = $face->relation;

// 获取请客实例
$instance = $face->bill;

// 获取时尚穿衣实例
$instance = $face->clothing;

// 获取赋诗实例
$instance = $face->poem;

// 所有实例均有一个方法 get
$result = $instance->get($url);

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
