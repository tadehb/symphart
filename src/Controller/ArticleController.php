<?php
/**
 * Created by PhpStorm.
 * User: Tadeh
 * Date: 10/22/18
 * Time: 11:40 AM
 */


namespace App\Controller;

use function Sodium\add;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\type\TextareaType;
use Symfony\Component\Form\Extension\Core\type\SubmitType;
use App\Entity\Article;


class ArticleController extends Controller {

    /**
     * @Route("/",name="article_list")
     * @Method("{GET}")
     * @return Response
     */
    public function index(){

        $articles= $this->getDoctrine()->getRepository(Article::class)->findAll();

        return $this->render("articles/index.html.twig",array('articles'=>$articles));
    }


    /**
     * @Route("/article/save")
     * @Method("{GET}")
     */
    public function save(){

        $entityManager = $this->getDoctrine()->getManager();

        $article = new Article();
        $article->setBody('This is the body of article one');
        $article->setTitle('Article One');

        $entityManager->persist($article);
        $entityManager->flush();


        return $this->render("articles/index.html.twig",array('articles'=>$articles));

    }


    /**
     * @Route("/article/{id}",name="article_show")
     */
    public function show($id){

        $article = $this->getDoctrine()->getRepository(Article::class)->find($id);

        return $this->render('article/show.html.twig',array('article'=>$article));

    }

    /**
     * @Route("/article/new",name="new_article")
     * @Method({"GET",""POST})
     */

    public function new(Request $request){

        $article = new Article();
        $form = $this->createFormBuilder($article)->add('title',TextType::class,array('attr'=>
        array('class'=>'form-control')))->add('body',TextareaType::class,array('required'=>false,
        'attr'=>array('class'=>'form-control')))->add('save',Submittype::class,array('label'=>'Create',
            'attr'=>array('class'=>'btn btn-primary mt-3')))->getForm();


    }

}

