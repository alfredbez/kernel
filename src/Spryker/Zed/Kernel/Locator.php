<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\Kernel;

use Spryker\Client\Kernel\ClientLocator;
use Spryker\Service\Kernel\ServiceLocator;
use Spryker\Shared\Kernel\AbstractLocatorLocator;
use Spryker\Shared\Kernel\BundleProxy;
use Spryker\Zed\Kernel\Business\FacadeLocator;
use Spryker\Zed\Kernel\Persistence\QueryContainerLocator;
use Spryker\Zed\Kernel\Persistence\RepositoryLocator;

class Locator extends AbstractLocatorLocator
{
    /**
     * @return \Spryker\Shared\Kernel\BundleProxy
     */
    protected function getBundleProxy()
    {
        $bundleProxy = new BundleProxy();
        if ($this->locator === null) {
            $this->locator = [
                new FacadeLocator(),
                new QueryContainerLocator(),
                new ClientLocator(),
                new ServiceLocator(),
                new RepositoryLocator()
            ];
        }
        $bundleProxy->setLocator($this->locator);

        return $bundleProxy;
    }
}
