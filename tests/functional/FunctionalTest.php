<?php

namespace Braunstetter\AssetsPushBundle\Test\functional;

use Braunstetter\AssetsPushBundle\Test\app\src\TestKernel;
use PHPUnit\Framework\TestCase;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;

class FunctionalTest extends TestCase
{
    protected $kernel;

    protected function setUp() : void
    {
        parent::setUp();

        $kernel = new TestKernel('dev', true);
        $kernel->boot();

        $this->kernel = $kernel;
    }


    public function testServiceWiring()
    {
        $container = $this->kernel->getContainer();
        $extension = $container->get('Braunstetter\AssetsPushBundle\Twig\Extension');
        $deferredExtension = $container->get('Twig\DeferredExtension\DeferredExtension');

        $this->assertInstanceOf('Braunstetter\AssetsPushBundle\Twig\Extension', $extension);
        $this->assertInstanceOf('Twig\DeferredExtension\DeferredExtension', $deferredExtension);

        $this->assertTrue(true, 'is not true');
    }

    public function testControllerOutput()
    {
        $client = new KernelBrowser($this->kernel);
        $client->request('GET','/test');

        $this->assertSame(200, $client->getResponse()->getStatusCode());

        $this->assertGreaterThan(
            0,
            $client->getCrawler()->filter('html:contains("/breadcrumbs.css")')->count()
        );

        $this->assertGreaterThan(
            0,
            $client->getCrawler()->filter('html:contains("/custom.css")')->count()
        );
    }
}
