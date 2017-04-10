<?php


namespace Hanson\Face\Foundation\ServiceProviders;


use Hanson\Face\Clothing;
use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ClothingServiceProvider implements ServiceProviderInterface
{

    /**
     * Registers services on the given container.
     *
     * This method should only be used to configure services and parameters.
     * It should not get services.
     *
     * @param Container $pimple A container instance
     */
    public function register(Container $pimple)
    {
        $pimple['clothing'] = function ($pimple) {
            return new Clothing();
        };
    }
}