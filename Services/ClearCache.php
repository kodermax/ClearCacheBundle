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
        $iterator = new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator($dir), \RecursiveIteratorIterator::SELF_FIRST);
        $size = 0;
        foreach ($iterator as $path) {
            if (!$path->isDir()) {
                $size += $path->getSize();

            }
        }
        return $size;
    }

    public function getSizes()
    {

        $arResult['cache_annotations'] = $this->getDirSize($this->cachePath . '/annotations');
        $arResult['cache_doctrine'] = $this->getDirSize($this->cachePath . '/doctrine');
        $arResult['cache_translations'] = $this->getDirSize($this->cachePath . '/translations');
        $arResult['cache_profiler'] = $this->getDirSize($this->cachePath . '/profiler');
        $arResult['cache_twig'] = $this->getDirSize($this->cachePath . '/twig');
        return $arResult;

    }
    private function deleteDir($path){
        $files = glob($path . '/*');

        foreach ($files as $file) {

            is_dir($file)
                ? $this->deleteDir($file)
                : unlink($file);
        }
        rmdir($path);
    }
    public function deleteCache()
    {
        $this->deleteDir($this->cachePath . '/annotations');
        $this->deleteDir($this->cachePath . '/doctrine');
        $this->deleteDir($this->cachePath . '/translations');
        $this->deleteDir($this->cachePath . '/profiler');
        $this->deleteDir($this->cachePath . '/twig');

    }
}