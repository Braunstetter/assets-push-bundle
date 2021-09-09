<?php

namespace Braunstetter\AssetsPushBundle\Test\Twig;

use Braunstetter\AssetsPushBundle\Twig\Extension;
use Twig\DeferredExtension\DeferredExtension;
use Twig\Test\IntegrationTestCase;

class IntegrationTest extends IntegrationTestCase
{

    public function getExtensions() : array
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
