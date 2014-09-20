<?php

namespace Concretehouse\Component\Repository\Pdo\Providers;

/**
 * Aliases provider.
 */
class AliasesProvider implements \Pimple\ServiceProviderInterface
{
    /**
     * @param \Pimple\Container $container
     */
    public function register(\Pimple\Container $container)
    {
        $domain = ServiceProvider::DOMAIN;
        $container['pdo_factory'] = $container["$domain.pdo_factory"];
    }
}
