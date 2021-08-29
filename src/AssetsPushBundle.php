<?php

namespace Braunstetter\AssetsPushBundle;

use Braunstetter\AssetsPushBundle\DependencyInjection\AssetsPushBundleExtension;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class AssetsPushBundle extends Bundle
{
    public function getContainerExtension(): AssetsPushBundleExtension
    {
        if (null === $this->extension) {
            $this->extension = new AssetsPushBundleExtension();
        }

        return $this->extension;
    }
}