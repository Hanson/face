<?php


namespace Hanson\Face\Tests;


use Hanson\Face\Foundation\Face;
use PHPUnit\Framework\TestCase;

class BasicTest extends TestCase
{

    /**
     * @var Face
     */
    public $face;

    public function __construct()
    {
        parent::__construct();

        $this->face = new Face();
    }

    public function testScore()
    {
        $result = $this->face->score->get('https://i.loli.net/2017/09/09/59b3d7bcedaa5.jpg');

        $this->assertContains('http://', $result['url']);
    }

    public function testBill()
    {
        $result = $this->face->bill->get('https://ws1.sinaimg.cn/large/685b97a1gy1fehhwzsk08j20yf0yiabd.jpg');

        $this->assertContains('http://', $result['url']);
    }

    public function testPopular()
    {
        $result = $this->face->popular->get('https://ooo.0o0.ooo/2017/04/10/58eb93efa1aae.jpg');

        $this->assertContains('http://', $result['url']);
    }

    public function testRelation()
    {
        $result = $this->face->relation->get('https://ooo.0o0.ooo/2017/04/10/58eb978fdaad7.jpg');

        $this->assertContains('http://', $result['url']);
    }

    public function testClothing()
    {
        $result = $this->face->clothing->get('https://i.loli.net/2017/09/09/59b3e36a718bb.jpg');

        $this->assertContains('http://', $result['url']);
    }

    public function testPoem()
    {
        $result = $this->face->poem->get('https://i.loli.net/2017/09/09/59b3e36a718bb.jpg');

        $this->assertContains('http://', $result['url']);
    }
}