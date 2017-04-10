<?php


namespace Hanson\Face\Foundation\ServiceProviders;


use Hanson\Face\Score;
use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ScoreServiceProvider implements ServiceProviderInterface
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
        $pimple['score'] = function ($pimple) {
            return new Score();
        };
    }
}