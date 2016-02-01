<?php

namespace AppBundle\Controller;

//use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Bundle\FrameworkBundle\Templating\EngineInterface;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;


//class HelloController extends Controller

class DefaultController extends Controller
{


    /**
     * @Route("/")
     * @Template("@App/index.html.twig")
     */
    public function indexAction()
    {
//        $userName = $this->getUser()->getUsername();
        return array('greeting' => "hello"
        );
    }


}
