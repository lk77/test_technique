<?php

namespace AppBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition;
use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface {

    public function getConfigTreeBuilder() {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('app');

        $this->addMenuOptionsSection($rootNode);

        return $treeBuilder;
    }

    private function addMenuOptionsSection(ArrayNodeDefinition $rootNode) {
        $rootNode
                ->children()
                    ->arrayNode('menu')
                        ->prototype('array')
                            ->children()
                                ->scalarNode('name')->end()
                                ->scalarNode('route')->end()
                                ->scalarNode('is_granted')->end()
                            ->end()
                        ->end()
                    ->end()
                ->end()
            ;
    }
}
