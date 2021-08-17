<?php

namespace Braunstetter\AssetsPushBundle\Twig;

use Twig\Node\Node;

class Util
{
    public static function isRootNode(Node $node): bool
    {
        if (!$node->hasNode('parent') && $node->hasNode('blocks')) {

            $blocks = $node->getNode('blocks');

            if ($blocks->hasNode('title') && $blocks->hasNode('stylesheets') && $blocks->hasNode('javascripts')) {
                return true;
            }
        }

        return false;
    }
}