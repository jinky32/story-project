<?php

namespace AppBundle\Controller;

//use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Bundle\FrameworkBundle\Templating\EngineInterface;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

//class HelloController extends Controller
/**
 * @Route(service="app.hello_controller")
 */
class DefaultController
{

    private $templating;

    public function __construct(EngineInterface $templating)
    {
        $this->templating = $templating;
    }

    /**
     * @Route("/hello/{name}", name="hello")
     *
     */
    public function indexAction($name, Request $request)
    {
        $locale = $request->getLocale();
        return $this->templating->renderResponse(
            'AppBundle::index.html.twig',
            array('name' => $name,
                'locale' => $locale)
        );
    }

    /**
     * @Route("/stuart", name="stuart")
     *
     */
    public function stuartAction(Request $request){



//            $locale = $request->getLocale();
//            return print_r($locale);

    }
}
