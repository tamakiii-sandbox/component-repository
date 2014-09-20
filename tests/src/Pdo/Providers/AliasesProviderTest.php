<?php

namespace Concretehouse\Component\Repository\Test\Providers;

use Concretehouse\Component\Repository\Pdo\Providers\AliasesProvider;
use Concretehouse\Component\Repository\Pdo\Providers\ServiceProvider;
use Phake;

/**
 * Test for pdo aliases provider.
 */
class AliasesProviderTest extends \PHPUnit_Framework_TestCase
{
    const PDO_INTERFACE = 'Concretehouse\Component\Repository\Pdo\PdoInterface';

    /**
     * Set up
     */
    public function setUp()
    {
        $this->container = new \Pimple\Container;
        $this->provider = new AliasesProvider;

        $domain = ServiceProvider::DOMAIN;
        $this->container["$domain.pdo_factory"] = Phake::mock(self::PDO_INTERFACE);
    }

    /**
     * @test
     */
    public function registerPdoFactory()
    {
        $this->provider->register($this->container);
        $this->assertInstanceOf(self::PDO_INTERFACE, $this->container['pdo_factory']);
    }
}
