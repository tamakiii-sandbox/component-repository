<?php

namespace Concretehouse\Component\Repository\Test\Providers;

use Concretehouse\Component\Repository\Pdo\Providers\ServiceProvider;
use Phake;

/**
 * Test for pdo-repository service provider.
 */
class ServiceProviderTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Set up
     */
    public function setUp()
    {
        $this->functions = Phake::mock('Concretehouse\Dp\Factory\FunctionsInterface');
        $this->container = new \Pimple\Container;
        $this->provider = new ServiceProvider;

        $this->container['concretehouse.dp.factory.functions'] = $this->functions;
    }

    /**
     * @test
     */
    public function registersPdoFactory()
    {
        $domain = ServiceProvider::DOMAIN;

        $this->provider->register($this->container);

        $this->assertInstanceOf('Concretehouse\Dp\Factory\FixedFactoryInterface', $this->container["$domain.pdo_factory"]);
        $this->assertInstanceOf('Concretehouse\Component\Repository\Pdo\Concretes\Pdo\Factory', $this->container["$domain.pdo_factory"]);
    }
}
