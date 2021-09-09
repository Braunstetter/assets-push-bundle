<?php

namespace Braunstetter\AssetsPushBundle\Test;

use Braunstetter\AssetsPushBundle\DependencyInjection\AssetsPushBundleExtension;
use Matthias\SymfonyDependencyInjectionTest\PhpUnit\AbstractExtensionTestCase;

class BundleExtensionTest extends AbstractExtensionTestCase
{

    protected function getContainerExtensions(): array
    {
        return [new AssetsPushBundleExtension()];
    }

    /**
     * @test
     */
    public function all_extensions_gets_loaded()
    {
        $this->load();

        $this->assertContainerBuilderHasService('Braunstetter\AssetsPushBundle\Twig\Extension');
        $this->assertContainerBuilderHasService('Twig\DeferredExtension\DeferredExtension');
    }
}