<?php

namespace Braunstetter\AssetsPushBundle\Twig\Nodes;

use Braunstetter\AssetsPushBundle\Names;
use Twig\Node\Node;
use Twig\Compiler;

class CssNode extends Node
{

    const BASE_ARRAY_PATH = '$context["' . Names::ARRAY_BASE . '"]';
    const FULL_ARRAY_PATH = '$context["' . Names::ARRAY_BASE . '"]["' . Names::CSS . '"]';

    public function __construct(string $data, int $lineno = 0, string $tag = null)
    {
        parent::__construct([], ['data' => $data], $lineno, $tag);
    }

    public function compile(Compiler $compiler)
    {

        $compiler
            ->write(sprintf('$extension = $this->extensions["%s"];', 'Braunstetter\\AssetsPushBundle\\Twig\\Extension'))
            ->write('$extension->registerCss("' . $this->getAttribute('data') . '");');

//        $compiler
//            ->write('if (!isset(' . static::BASE_ARRAY_PATH . ')) { ' . static::BASE_ARRAY_PATH . ' = []; }')
//            ->raw(";\n");
//
//        $compiler
//            ->write('if (!isset(' . static::FULL_ARRAY_PATH . ')) { ' . static::FULL_ARRAY_PATH . ' = []; }')
//            ->raw(";\n");
//
//        // merge the data provided in this template with the existing data
//        $compiler
//            ->write(static::FULL_ARRAY_PATH . '= array_merge(' . static::FULL_ARRAY_PATH . ', ')
//            ->repr([$this->getAttribute('data')])
//            ->raw(");\n");

    }


}