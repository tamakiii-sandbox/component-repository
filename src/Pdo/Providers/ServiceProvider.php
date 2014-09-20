<?php

namespace Concretehouse\Component\Repository\Pdo\Providers;

use Concretehouse\Dp\Factory\Providers\ServiceProvider as FactoryServiceProvider;
use Concretehouse\Component\Repository\Pdo\Concretes\Pdo;

/**
 * Provides pdo service.
 */
class ServiceProvider implements \Pimple\ServiceProviderInterface
{
    const DOMAIN = 'concretehouse.component.repository';

    /**
     * @param \Pimple\Container $container
     */
    public function register(\Pimple\Container $container)
    {
        $domain = self::DOMAIN;

        $container["$domain.pdo_factory"] = function($c) {
            return new Pdo\Factory($c['concretehouse.dp.factory.functions']);
        };
    }
}
