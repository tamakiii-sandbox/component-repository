<?php

namespace Concretehouse\Component\Repository\Test\Pdo\Concretes\Pdo;

use Concretehouse\Component\Repository\Pdo\Concretes\Pdo\Factory;
use Phake;

/**
 * Test for pdo factory class.
 */
class FactoryTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Set up
     */
    public function setUp()
    {
        $this->functions = Phake::mock('Concretehouse\Dp\Factory\FunctionsInterface');
        $this->factory = new Factory($this->functions);
    }

    /**
     * @test
     */
    public function implementsFixedFactoryInterface()
    {
        $this->assertInstanceOf('Concretehouse\Dp\Factory\FixedFactoryInterface', $this->factory);
    }

    /**
     * @test
     * @dataProvider pdoCtorArgsDataProvider
     */
    public function createInstanceWithFactoryFunctions()
    {
        // Prepare params
        $args = func_get_args();
        $pdo = Phake::mock('Concretehouse\Component\Repository\Pdo\Concretes\Pdo');

        // functions->newInstanceArgs() returns $pdo
        Phake::when($this->functions)
            ->newInstanceArgs('Concretehouse\Component\Repository\Pdo\Concretes\Pdo', $args)
            ->thenReturn($pdo);

        // Call
        call_user_func_array(array($this->factory, 'make'), $args);

        // Verify
        Phake::verify($this->functions, Phake::times(1))
            ->newInstanceArgs('Concretehouse\Component\Repository\Pdo\Concretes\Pdo', $args);
    }

    /**
     * @test
     * @expectedException \InvalidArgumentException
     */
    public function throwsExceptionIfDsnNotSpecified()
    {
        $this->factory->make();
    }

    /**
     * @return array
     */
    public function pdoCtorArgsDataProvider()
    {
        $dsn = 'mysql:dbname=testdb;host=127.0.0.1';
        $username = 'db_user';
        $password = 'db_pass';
        $options = array('hoge' => 'fuga');

        return array(
            'dsn' => array($dsn),
            'dsn+username' => array($dsn, $username),
            'dsn+username+password' => array($dsn, $username, $password),
            'dsn+username+password+options' => array($dsn, $username, $password, $options),
        );
    }
}
