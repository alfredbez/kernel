<?php

namespace SprykerEngine\Zed\Kernel\Business;

use SprykerEngine\Zed\Kernel\Locator;
use SprykerEngine\Zed\Kernel\Business\DependencyContainer\DependencyContainerInterface;
use SprykerEngine\Shared\Kernel\Factory\FactoryInterface;
use SprykerEngine\Zed\Kernel\Container;
use SprykerEngine\Zed\Kernel\Persistence\AbstractQueryContainer;

abstract class AbstractFacade
{

    /**
     * @var DependencyContainerInterface
     */
    private $dependencyContainer;

    /**
     * @param FactoryInterface $factory
     * @param Locator $locator
     */
    public function __construct(FactoryInterface $factory, Locator $locator)
    {
        if ($factory->exists('DependencyContainer')) {
            $this->dependencyContainer = $factory->create('DependencyContainer', $factory, $locator);
        }
    }

    /**
     * @return DependencyContainerInterface
     */
    protected function getDependencyContainer()
    {
        return $this->dependencyContainer;
    }

    /**
     * TODO move to constructor
     * @param AbstractQueryContainer $queryContainer
     */
    public function setOwnQueryContainer(AbstractQueryContainer $queryContainer)
    {
        $dependencyContainer = $this->getDependencyContainer();
        if (isset($dependencyContainer)) {
            $this->getDependencyContainer()->setQueryContainer($queryContainer);
        }
    }
}
