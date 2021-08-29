<?php

namespace Braunstetter\AssetsPushBundle\Test\Twig;

use Braunstetter\AssetsPushBundle\Twig\Extension;
use JetBrains\PhpStorm\Pure;
use Twig\DeferredExtension\DeferredExtension;
use Twig\Test\IntegrationTestCase;

class IntegrationTest extends IntegrationTestCase
{

    #[Pure] public function getExtensions() : array
    {
        return [
            new DeferredExtension(),
            new Extension()
        ];
    }

    protected function getFixturesDir(): string
    {
        return __DIR__ . '/Fixtures';
    }

}
