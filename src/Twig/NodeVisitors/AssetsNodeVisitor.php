<?php

namespace Braunstetter\AssetsPushBundle\Twig\NodeVisitors;

use Braunstetter\AssetsPushBundle\Names;
use Braunstetter\AssetsPushBundle\Twig\Extension;
use Braunstetter\AssetsPushBundle\Twig\Mediator;
use Braunstetter\AssetsPushBundle\Twig\Nodes\CssNode;
use Braunstetter\AssetsPushBundle\Twig\Util;
use Twig\Environment;
use Twig\Node\ModuleNode;
use Twig\Node\Node;
use Twig\NodeVisitor\NodeVisitorInterface;

class AssetsNodeVisitor implements NodeVisitorInterface
{

    private array $data = [
        Names::CSS => []
    ];

    public function enterNode(Node $node, Environment $env): Node
    {
        $this->collectAssets($node, $env);

        return $node;
    }

    public function leaveNode(Node $node, Environment $env): ?Node
    {
        return $node;
    }

    private function collectAssets(Node $node, Environment $env): void
    {
        if ($node instanceof CssNode) {

            /** @var Extension $extension */
            $extension = $env->getExtension('Braunstetter\AssetsPushBundle\Twig\Extension');
            $extension->enter();

        }
    }

    /**
     * @inheritDoc
     */
    public function getPriority(): int
    {
        return 0;
    }
}