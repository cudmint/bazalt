<?php

namespace Components\Gallery;

use \Framework\CMS as CMS,
    \Framework\System\Routing\Route;

class Component extends CMS\Component
{
    const ACL_HAS_ACCESS = 1;

    public function getRoles()
    {
        return array(
            self::ACL_HAS_ACCESS => __('User can access to gallery', self::getName())
        );
    }

    public static function getName()
    {
        return 'Gallery';
    }

    public function initComponent(CMS\Application $application)
    {
        $controller = 'Components\Gallery\Controller\Index';
        
        Route::root()->connect('Gallery.List', '/gallery',                 ['component' => self::getName(), 'controller' => $controller, 'action' => 'default'])
                     ->connect('Gallery.Album',        '/{album}',         ['component' => self::getName(), 'controller' => $controller, 'action' => 'album'])
                     ->connect('Gallery.Photo',                '/{photo}', ['component' => self::getName(), 'controller' => $controller, 'action' => 'photo']);
    }
}