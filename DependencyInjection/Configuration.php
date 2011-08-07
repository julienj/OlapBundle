<?php

/*
* This file is part of olapBundle.
*
* (c) Julien Jacottet <jjacottet@gmail.com>
*
* For the full copyright and license information, please view the LICENSE
* file that was distributed with this source code.
*/

namespace Julienj\olapBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritDoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('olap');

        $rootNode
            ->children()
                ->scalarNode('factory')->defaultValue('Julienj\olapBundle\Olap\OlapFactory')->end()
                ->scalarNode('connection')->defaultValue('phpOlap\Xmla\Connection\Connection')->end()
                ->scalarNode('adaptator')->defaultValue('phpOlap\Xmla\Connection\Adaptator\SoapAdaptator')->end()
            ->end()
        ;        
        return $treeBuilder;
    }
}
