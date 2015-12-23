<?php

namespace AppBundle\Controller;

//use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Bundle\FrameworkBundle\Templating\EngineInterface;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

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
    public function indexAction($name)
    {
        return $this->templating->renderResponse(
            'AppBundle::index.html.twig',
            array('name' => $name)
        );
    }

    public function stuartAction(){
        print 'hello';
    }
}
