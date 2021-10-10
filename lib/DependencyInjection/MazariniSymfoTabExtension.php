<?php
// lib/MazariniSymfoTabBundle.php
namespace Mazarini\SymfoTabBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader as FileLoader;

class MazariniSymfoTabExtension extends Extension
{
    public function load(array $configs, ContainerBuilder $container)
    {
        $loader = new FileLoader(
            $container,
            new FileLocator(__DIR__.'/../Resources/config')
        );
        $loader->load('services.yaml');
    }
}
