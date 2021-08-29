<?php

namespace Braunstetter\AssetsPushBundle;

use Braunstetter\AssetsPushBundle\DependencyInjection\AssetsPushBundleExtension;
use Symfony\Component\DependencyInjection\Extension\ExtensionInterface;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class AssetsPushBundle extends Bundle
{
    public function getContainerExtension(): AssetsPushBundleExtension|bool|ExtensionInterface|null
    {
        if (null === $this->extension) {
            $this->extension = new AssetsPushBundleExtension();
        }

        return $this->extension;
    }
}