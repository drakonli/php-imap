<?php

namespace PhpImap\Dependency\Container\Loader\Cached;

use PhpImap\Dependency\Container\Loader\Basic\BasicDependencyContainerLoader;
use ProjectServiceContainer;
use Symfony\Component\Config\ConfigCache;
use Symfony\Component\DependencyInjection\Dumper\PhpDumper;

/**
 * @author    drakonli - Arthur Vinogradov - <artur.drakonli@gmail.com>
 * @link      www.linkedin.com/in/drakonli
 */
class CachedDependencyContainerLoader
{
    /**
     * @var BasicDependencyContainerLoader
     */
    private $loader;

    /**
     * @var \SplFileInfo
     */
    private $cacheFile;

    /**
     * @var \SplBool
     */
    private $isDebugMode;

    /**
     * CachedDependencyContainerLoader constructor.
     *
     * @param BasicDependencyContainerLoader $loader
     * @param \SplFileInfo                   $cacheFile
     * @param \SplBool                       $isDebugMode
     */
    public function __construct(BasicDependencyContainerLoader $loader, \SplFileInfo $cacheFile, \SplBool $isDebugMode)
    {
        $this->loader = $loader;
        $this->cacheFile = $cacheFile;
        $this->isDebugMode = $isDebugMode;
    }

    /**
     * @param array $additionalConfigsToLoad
     *
     * @return ProjectServiceContainer
     */
    public function loadContainer(array $additionalConfigsToLoad)
    {
        $containerConfigCache = new ConfigCache($this->cacheFile->getPathname(), (bool)($this->isDebugMode));

        if (!$containerConfigCache->isFresh()) {
            $containerBuilder = $this->loader->loadContainer($additionalConfigsToLoad);

            $dumper = new PhpDumper($containerBuilder);
            $containerConfigCache->write(
                $dumper->dump(),
                $containerBuilder->getResources()
            );
        }

        require_once $this->cacheFile->getPathname();

        return new ProjectServiceContainer();
    }
}
