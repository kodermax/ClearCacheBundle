<?php
/**
 * Created by PhpStorm.
 * User: MKarpychev
 * Date: 26.11.2015
 * Time: 9:34
 */

namespace Elcodi\Plugin\ClearCacheBundle\Services;


class ClearCache
{
    /**
     * @var string
     *
     * Cache path
     */
    protected $cachePath;

    public function __construct($cachePath)
    {
        $this->cachePath = $cachePath;
    }

    private function getDirSize($dir)
    {

        if (!file_exists($dir)) {
            return 0;
        }
        $iterator = new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator($dir), \RecursiveIteratorIterator::SELF_FIRST );
        $size = 0;
        foreach ($iterator as $path) {
            if (!$path->isDir()) {
                $size += $path->getSize();

            }
        }
        return $size;
    }
    public function getSizes(){

        $arResult['cache_annotations'] = $this->getDirSize($this->cachePath.'/annotations');
        $arResult['cache_doctrine'] = $this->getDirSize($this->cachePath.'/doctrine');
        $arResult['cache_translations'] = $this->getDirSize($this->cachePath.'/translations');
        $arResult['cache_profiler'] = $this->getDirSize($this->cachePath.'/profiler');
        $arResult['cache_twig'] = $this->getDirSize($this->cachePath.'/twig');
        return $arResult;

    }
    private function formatSize($size) {
        $mod = 1024;
        $units = explode(' ','B KB MB GB TB PB');
        for ($i = 0; $size > $mod; $i++) {
            $size /= $mod;
        }
        return round($size, 2) . ' ' . $units[$i];
    }
}