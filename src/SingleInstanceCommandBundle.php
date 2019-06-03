<?php
/**
 * sic-bundle.
 * Author: Andrii Yakovlev <yawa20@gmail.com>
 * Date: 03.06.19
 */
declare(strict_types=1);

namespace GepurIt\SingleInstanceCommandBundle;

use GepurIt\SingleInstanceCommandBundle\DependencyInjection\SingleInstanceCommandExtension;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Extension\ExtensionInterface;

/**
 * Class SingleInstanceCommandBundle
 */
class SingleInstanceCommandBundle
{

    /**
     * @var ContainerInterface
     */
    protected $container;

    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    /**
     * Boots the Bundle.
     */
    public function boot()
    {
    }

    /**
     * Shutdowns the Bundle.
     */
    public function shutdown()
    {
    }

    /**
     * Builds the bundle.
     *
     * It is only ever called once when the cache is empty.
     * @param ContainerBuilder $container
     */
    public function build(ContainerBuilder $container)
    {
    }

    /**
     * Returns the container extension that should be implicitly loaded.
     *
     * @return ExtensionInterface|null The default extension or null if there is none
     */
    public function getContainerExtension()
    {
        return new SingleInstanceCommandExtension();
    }

    /**
     * Returns the bundle name (the class short name).
     *
     * @return string The Bundle name
     */
    public function getName()
    {
        return 'SingleInstanceCommandBundle';
    }

    /**
     * Gets the Bundle namespace.
     *
     * @return string The Bundle namespace
     */
    public function getNamespace()
    {
        return 'GepurIt\SingleInstanceCommandBundle';
    }

    /**
     * Gets the Bundle directory path.
     *
     * The path should always be returned as a Unix path (with /).
     *
     * @return string The Bundle absolute path
     */
    public function getPath()
    {
        return __DIR__;
    }
}
