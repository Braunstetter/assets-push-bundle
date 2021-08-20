<?php

namespace Braunstetter\AssetsPushBundle\Twig;


use Braunstetter\AssetsPushBundle\Twig\TokenParser\CssTokenParser;
use Braunstetter\AssetsPushBundle\Twig\TokenParser\JsTokenParser;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class Extension extends AbstractExtension
{

    private array $registeredFiles = ['css' => [], 'js' => []];

    public function registerCss(string $fileUrl): void
    {
        if (!in_array($fileUrl, $this->registeredFiles['css'])) {
            $this->registeredFiles['css'][] = $fileUrl;
        }
    }

    public function registerJs(string $fileUrl): void
    {
        if (!in_array($fileUrl, $this->registeredFiles['js'])) {
            $this->registeredFiles['js'][] = $fileUrl;
        }
    }

    public function getTokenParsers(): array
    {
        return [
            new CssTokenParser(),
            new JsTokenParser(),
        ];
    }

    public function getFunctions(): array
    {
        return [
            new TwigFunction('assets', [$this, 'getAssets'])
        ];
    }

    public function getAssets(): array
    {
        return $this->registeredFiles;
    }

}

