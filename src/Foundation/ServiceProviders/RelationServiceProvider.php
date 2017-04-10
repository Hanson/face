<?php


namespace Hanson\Face\Foundation\ServiceProviders;


use Hanson\Face\Bill;
use Hanson\Face\Relation;
use Pimple\Container;
use Pimple\ServiceProviderInterface;

class RelationServiceProvider implements ServiceProviderInterface
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
        $pimple['relation'] = function ($pimple) {
            return new Relation();
        };
    }
}