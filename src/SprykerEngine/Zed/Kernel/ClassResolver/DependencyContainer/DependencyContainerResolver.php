<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace SprykerEngine\Zed\Kernel\ClassResolver\DependencyContainer;

use SprykerEngine\Zed\Kernel\ClassResolver\ClassResolver;

class DependencyContainerResolver extends ClassResolver
{

    const CLASS_NAME_PATTERN = '\\%1$s\\%2$s\\%3$s%5$s\\%4$s\\%3$sDependencyContainer';

    /**
     * @param object $callerClass
     *
     * @throws \Exception
     *
     * @return object
     */
    public function resolve($callerClass)
    {
        $this->setCallerClass($callerClass);
        if ($this->canResolve()) {
            return $this->getResolvedClassInstance();
        }

        throw new DependencyContainerNotFoundException($this->getClassInfo());
    }

    /**
     * @return string
     */
    public function getClassPattern()
    {
        return sprintf(
            self::CLASS_NAME_PATTERN,
            self::KEY_NAMESPACE,
            self::KEY_APPLICATION,
            self::KEY_BUNDLE,
            self::KEY_LAYER,
            self::KEY_STORE
        );
    }

}
