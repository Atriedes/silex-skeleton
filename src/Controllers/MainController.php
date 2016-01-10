<?php

namespace Jowy\SilexSkeleton\Controllers;

use Silex\Application;
use Silex\ControllerCollection;
use Silex\ControllerProviderInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class MainController
 * @package Jowy\SilexSkeleton\Controllers
 */
class MainController implements ControllerProviderInterface
{
    /**
     * @var Application
     */
    private $app;

    /**
     * @param Application $app
     * @return ControllerCollection
     */
    public function connect(Application $app)
    {
        $this->app = $app;
        $controllers = $app['controllers_factory'];
        $controllers->get('/', [$this, 'indexAction'])->bind('homepage');
        return $controllers;
    }

    /**
     * @param Request $request
     * @return Response
     */
    public function indexAction(Request $request)
    {
        return $this->app['twig']->render('index.twig');
    }
}