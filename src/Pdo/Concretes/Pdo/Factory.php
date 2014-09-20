<?php

namespace Concretehouse\Component\Repository\Pdo\Concretes\Pdo;

use Concretehouse\Dp\Factory\FixedFactoryInterface;
use Concretehouse\Dp\Factory\FunctionsInterface;

/**
 * Pdo factory class.
 */
class Factory implements FixedFactoryInterface
{
    /**
     * @var FunctionsInterface
     */
    private $functions;


    /**
     * @param FunctionsInterface $functions
     */
    public function __construct(FunctionsInterface $functions)
    {
        $this->functions = $functions;
    }

    /**
     * @param string $dsn
     * @param string $username
     * @param string $password
     * @param array $options
     * @return PdoInterface
     */
    public function make()
    {
        $args = func_get_args();

        if (empty($args[0])) {
            throw new \InvalidArgumentException('DSN must be specified');
        }

        return $this->functions->newInstanceArgs(
            'Concretehouse\Component\Repository\Pdo\Concretes\Pdo', $args
        );
    }
}
