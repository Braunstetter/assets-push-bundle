<?php

namespace Braunstetter\AssetsPushBundle\Twig {


    use Braunstetter\AssetsPushBundle\Twig\NodeVisitors\AssetsNodeVisitor;
    use Braunstetter\AssetsPushBundle\Twig\NodeVisitors\AssetsSetNodeVisitor;
    use Braunstetter\AssetsPushBundle\Twig\TokenParser\CssTokenParser;
    use Twig\Extension\AbstractExtension;
    use Twig\TwigFunction;

    class Extension extends AbstractExtension
    {
        /**
         * @var int
         */
        private $stackLevel = 0;

        public function enter(): void
        {
            ++$this->stackLevel;
            dump($this->stackLevel);
        }

        public function getTokenParsers(): array
        {
            return [
                new CssTokenParser(),
            ];
        }

        public function getNodeVisitors(): array
        {
            return [
                new AssetsNodeVisitor()
            ];
        }

        public function getFunctions(): array
        {
            return [
              new TwigFunction('assets', [$this, 'getAssets'])
            ];
        }

        public function getAssets(): int
        {
            return $this->stackLevel;
        }


    }
}

namespace {

    use Twig\Environment;

    function push_asset($env) {
         var_dump($env);
     }

}