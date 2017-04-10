<?php


namespace Hanson\Face\Foundation;


use Hanson\Face\Foundation\ServiceProviders\BillServiceProvider;
use Hanson\Face\Foundation\ServiceProviders\ClothingServiceProvider;
use Hanson\Face\Foundation\ServiceProviders\PopularServiceProvider;
use Hanson\Face\Foundation\ServiceProviders\RelationServiceProvider;
use Hanson\Face\Foundation\ServiceProviders\ScoreServiceProvider;
use Pimple\Container;

/**
 * Class Face
 * @package Hanson\Face\Foundation
 *
 * @property \Hanson\Face\Score $score
 * @property \Hanson\Face\Popular $popular
 * @property \Hanson\Face\Bill $bill
 * @property \Hanson\Face\Relation $relation
 * @property \Hanson\Face\Clothing $clothing
 */
class Face extends Container
{

    /**
     * service providers
     *
     * @var array
     */
    protected $providers = [
        ScoreServiceProvider::class,
        BillServiceProvider::class,
        PopularServiceProvider::class,
        RelationServiceProvider::class,
        ClothingServiceProvider::class,
    ];

    /**
     * Face constructor.
     */
    public function __construct()
    {
        parent::__construct();

        $this->registerProviders();
    }

    /**
     * register service providers
     */
    private function registerProviders()
    {
        foreach ($this->providers as $provider) {
            $this->register(new $provider());
        }
    }

    /**
     * Magic get access.
     *
     * @param string $id
     *
     * @return mixed
     */
    public function __get($id)
    {
        return $this->offsetGet($id);
    }

    /**
     * Magic set access.
     *
     * @param string $id
     * @param mixed $value
     */
    public function __set($id, $value)
    {
        $this->offsetSet($id, $value);
    }


}