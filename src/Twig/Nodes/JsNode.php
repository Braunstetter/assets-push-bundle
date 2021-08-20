<?php

namespace Braunstetter\AssetsPushBundle\Twig\Nodes;

use Braunstetter\AssetsPushBundle\Names;
use Twig\Node\Node;
use Twig\Compiler;

class JsNode extends Node
{

    public function __construct(string $data, int $lineno = 0, string $tag = null)
    {
        parent::__construct([], ['data' => $data], $lineno, $tag);
    }

    public function compile(Compiler $compiler)
    {

        $compiler
            ->write(sprintf('$extension = $this->extensions["%s"];', 'Braunstetter\\AssetsPushBundle\\Twig\\Extension'))
            ->write('$extension->registerJs("' . $this->getAttribute('data') . '");');

    }


}