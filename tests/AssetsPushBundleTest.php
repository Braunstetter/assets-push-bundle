<?php

namespace Braunstetter\AssetsPushBundle\Test;

use Braunstetter\AssetsPushBundle\AssetsPushBundle;
use Braunstetter\AssetsPushBundle\DependencyInjection\AssetsPushBundleExtension;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Nyholm\BundleTest\AppKernel;
use Symfony\Component\HttpKernel\KernelInterface;

class AssetsPushBundleTest extends KernelTestCase
{
    protected static function getKernelClass(): string
    {
        return AppKernel::class;
    }

    protected static function createKernel(array $options = []): KernelInterface
    {
        /**
         * @var AppKernel $kernel
         */
        $kernel = parent::createKernel($options);
        $kernel->addBundle(AssetsPushBundle::class);

        return $kernel;
    }

    public function testInitBundle(): void
    {
        self::bootKernel();
        $bundle = self::$kernel->getBundle('AssetsPushBundle');
        $this->assertInstanceOf(AssetsPushBundle::class, $bundle);
        $this->assertInstanceOf(AssetsPushBundleExtension::class, $bundle->getContainerExtension());
    }

}
