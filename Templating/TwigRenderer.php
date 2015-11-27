<?php
/**
 * Created by PhpStorm.
 * User: kodermax
 * Date: 24.11.2015
 * Time: 10:25
 */
namespace Elcodi\Plugin\ClearCacheBundle\Templating;

use Elcodi\Component\Plugin\Entity\Plugin;
use Elcodi\Component\Plugin\EventDispatcher\Interfaces\EventInterface;
use Elcodi\Component\Plugin\Templating\Traits\TemplatingTrait;

class TwigRenderer
{
    use TemplatingTrait;
    /**
     * @var Plugin
     *
     * Plugin
     */
    protected $plugin;

    /**
     * Set plugin
     *
     * @param Plugin $plugin Plugin
     *
     * @return $this Self object
     */
    public function setPlugin(Plugin $plugin)
    {
        $this->plugin = $plugin;

        return $this;
    }

    /**
     * Renders disqus JS element
     *
     * @param EventInterface $event Event
     */
    public function renderJavascript(EventInterface $event)
    {
        $this->appendTemplate(
                '@ElcodiClearCache/js.html.twig',
                $event,
                $this->plugin
            );
    }
}
