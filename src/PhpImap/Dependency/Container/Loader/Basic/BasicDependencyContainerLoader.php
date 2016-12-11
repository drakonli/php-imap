<?php

namespace PhpImap\Dependency\Container\Loader\Basic;

use SplFileInfo;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

/**
 * @author    drakonli - Arthur Vinogradov - <artur.drakonli@gmail.com>
 * @link      www.linkedin.com/in/drakonli
 */
class BasicDependencyContainerLoader
{
    /**
     * @param array|SplFileInfo[] $additionalConfigsToLoad
     *
     * @return ContainerBuilder
     */
    public function loadContainer(array $additionalConfigsToLoad)
    {
        $configsDir = sprintf('%1$s/..%2$s..%2$s..%2$sResources%2$sconfigs', __DIR__, DIRECTORY_SEPARATOR);
        $container = new ContainerBuilder();

        $loader = new YamlFileLoader($container, new FileLocator($configsDir));
        $loader->load('services.yml');
        $loader->load('parameters.yml');

        foreach ($additionalConfigsToLoad as $config) {
            $additionalLoader = new YamlFileLoader($container, new FileLocator($config->getPath()));
            $additionalLoader->load($config->getPathname());
        }

        $container->compile();

        return $container;
    }
}
