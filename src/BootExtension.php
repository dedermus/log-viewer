<?php

namespace OpenAdminCore\Admin\LogViewer;

use OpenAdminCore\Admin\Admin;

trait BootExtension
{
    /**
     * {@inheritdoc}
     */
    public static function boot()
    {
        static::registerRoutes();

        Admin::extend('log-viewer', __CLASS__);
    }

    /**
     * Register routes for open-admin.
     *
     * @return void
     */
    protected static function registerRoutes()
    {
        parent::routes(function ($router) {
            /* @var \Illuminate\Routing\Router $router */
            $router->get('logs', 'OpenAdminCore\Admin\LogViewer\LogController@index')->name('log-viewer-index');
            $router->get('logs/{file}', 'OpenAdminCore\Admin\LogViewer\LogController@index')->name('log-viewer-file');
            $router->get('logs/{file}/tail', 'OpenAdminCore\Admin\LogViewer\LogController@tail')->name('log-viewer-tail');
        });
    }

    /**
     * {@inheritdoc}
     */
    public static function import()
    {
        parent::createMenu('Log viewer', 'logs', 'icon-exclamation-triangle');

        parent::createPermission('Logs', 'ext.log-viewer', 'logs*');
    }
}
