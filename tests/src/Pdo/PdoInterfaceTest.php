<?php

namespace Concretehouse\Component\Repository\Test\Unit\Pdo;

use Concretehouse\Component\Repository\Pdo\PdoInterface;
use Phake;

/**
 * Test for pdo interface.
 */
class PdoInterfaceTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function canImplement()
    {
        Phake::mock('Concretehouse\Dp\Repository\Concretes\Pdo\PdoInterface');
    }
}
