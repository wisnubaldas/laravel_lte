<?php
namespace App\Traits;
/**
 * kostum routing trait
 */
trait RouteTrait
{
    public static function getRouteFile(string $path)
    {
        try {
            $rdi = new \RecursiveDirectoryIterator($path);
            $it = new \RecursiveIteratorIterator($rdi);
            while ($it->valid()) {
                if (! $it->isDot() && $it->isFile() && $it->isReadable() && $it->current()->getExtension() == 'php') {
                    require $it->key();
                }
                $it->next();
            }
        } catch (Exception $e) {
             return $e->getMessage();
        }
    }
}
