<?php
/**
 * sic-bundle.
 * Author: Andrii Yakovlev <yawa20@gmail.com>
 * Date: 03.06.19
 */
declare(strict_types=1);

namespace GepurIt\SingleInstanceCommandBundle\DependencyInjection;

use Exception;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

/**
 * Class SingleInstanceCommandExtension
 * @package GepurIt\SingleInstanceCommandBundle\DependencyInjection
 */
class SingleInstanceCommandExtension extends Extension
{
    /**
     * Loads a specific configuration.
     *
     * @param array            $configs
     * @param ContainerBuilder $container
     *
     * @throws Exception
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $loader = new YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.yaml');
    }
}
