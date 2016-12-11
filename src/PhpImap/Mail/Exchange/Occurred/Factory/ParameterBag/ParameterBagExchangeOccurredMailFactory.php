<?php

namespace PhpImap\Mail\Exchange\Occurred\Factory\ParameterBag;

use PhpImap\Connection\Stream\ConnectionStreamInterface;
use PhpImap\Mail\Exchange\Occurred\Builder\Director\ExchangeOccurredMailBuilderDirectorInterface;
use PhpImap\Mail\Exchange\Occurred\Builder\ExchangeOccurredMailBuilderInterface;
use PhpImap\Mail\Exchange\Occurred\Factory\ExchangeOccurredMailFactoryInterface;

/**
 * @author    drakonli - Arthur Vinogradov - <artur.drakonli@gmail.com>
 * @link      www.linkedin.com/in/drakonli
 */
class ParameterBagExchangeOccurredMailFactory implements ExchangeOccurredMailFactoryInterface
{
    /**
     * @var ExchangeOccurredMailBuilderInterface
     */
    private $builder;

    /**
     * @var ExchangeOccurredMailBuilderDirectorInterface
     */
    private $builderDirector;

    /**
     * ParameterBagExchangeOccurredMailFactory constructor.
     *
     * @param ExchangeOccurredMailBuilderInterface         $builder
     * @param ExchangeOccurredMailBuilderDirectorInterface $builderDirector
     */
    public function __construct(
        ExchangeOccurredMailBuilderInterface $builder,
        ExchangeOccurredMailBuilderDirectorInterface $builderDirector
    ) {
        $this->builder = $builder;
        $this->builderDirector = $builderDirector;
    }

    /**
     * @inheritDoc
     */
    public function createMail(ConnectionStreamInterface $stream, \SplInt $mailId)
    {
        return $this->builderDirector->buildMail($this->builder, $mailId, $stream);
    }
}