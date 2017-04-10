<?php


namespace Hanson\Face\Foundation\ServiceProviders;


use Hanson\Face\Popular;
use Pimple\Container;
use Pimple\ServiceProviderInterface;

class PopularServiceProvider implements ServiceProviderInterface
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
        $pimple['popular'] = function ($pimple) {
            return new Popular();
        };
    }
}