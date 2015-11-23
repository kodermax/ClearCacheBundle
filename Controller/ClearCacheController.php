<?php
/**
 * Created by PhpStorm.
 * User: kodermax
 * Date: 23.11.2015
 * Time: 13:14
 */

namespace Elcodi\Plugin\ClearCacheBundle\Controller;
use Mmoreram\ControllerExtraBundle\Annotation\Entity as EntityAnnotation;
use Mmoreram\ControllerExtraBundle\Annotation\Form as FormAnnotation;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use Elcodi\Admin\CoreBundle\Controller\Abstracts\AbstractAdminController;

/**
 * Class ClearCacheComponentController
 *
 * @Route(
 *      path = "clearcache"
 * )
 */
class ClearCacheController extends AbstractAdminController
{
    /**
     * View Page Clear Cache
     *
     * @Route(
     *      path = "/index",
     *      name = "admin_clear_cache_index"
     * )
     * @Template
     * @Method({"GET"})
     */
    public function indexAction()
    {
        return ['cache' => 'yes'];
    }
}