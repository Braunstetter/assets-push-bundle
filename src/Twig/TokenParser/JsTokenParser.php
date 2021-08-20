<?php

namespace Braunstetter\AssetsPushBundle\Twig\TokenParser;

use Braunstetter\AssetsPushBundle\Twig\Nodes\CssNode;
use Braunstetter\AssetsPushBundle\Twig\Nodes\JsNode;
use Twig\Node\Node;
use Twig\Token;
use Twig\TokenParser\AbstractTokenParser;

class JsTokenParser extends AbstractTokenParser
{

    /**
     * @inheritDoc
     */
    public function parse(Token $token): Node|JsNode
    {
        $parser = $this->parser;
        $stream = $parser->getStream();

        $data = null;

        // keep collecting strings until the block ends
        while (!$stream->test(Token::BLOCK_END_TYPE)) {
            $data = $stream->expect(Token::STRING_TYPE)->getValue();
        }

        $stream->expect(Token::BLOCK_END_TYPE);

        return new JsNode($data, $token->getLine(), $this->getTag());
    }

    /**
     * @inheritDoc
     */
    public function getTag(): string
    {
        return 'js';
    }
}