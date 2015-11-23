<?php
/**
 * Created by PhpStorm.
 * User: kodermax
 * Date: 20.11.2015
 * Time: 17:26
 */

namespace Elcodi\Plugin\ClearCacheBundle;
use Symfony\Component\Console\Application;
use Symfony\Component\DependencyInjection\Extension\ExtensionInterface;
use Symfony\Component\HttpKernel\Bundle\Bundle;

use Elcodi\Component\Plugin\Interfaces\PluginInterface;
use Elcodi\Plugin\ClearCacheBundle\DependencyInjection\ElcodiClearCacheExtension;


class ElcodiClearCacheBundle extends Bundle implements PluginInterface
{
    /**
     * Returns the bundle's container extension.
     *
     * @return ExtensionInterface The container extension
     */
    public function getContainerExtension()
    {
        return new ElcodiClearCacheExtension();
    }

    /**
     * Register Commands.
     *
     * Disabled as commands are registered as services.
     *
     * @param Application $application An Application instance
     *
     * @return null
     */
    public function registerCommands(Application $application)
    {
        return null;
    }
}