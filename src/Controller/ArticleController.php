<?php
/**
 * Created by PhpStorm.
 * User: Tadeh
 * Date: 10/22/18
 * Time: 11:40 AM
 */


namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ArticleController extends Controller {

    /**
     * @Route("/")
     * @Method("{GET}")
     * @return Response
     */
    public function index(){

        $articles=['article1','article2'];

        return $this->render("articles/index.html.twig",array('articles'=>$articles));
    }
}

