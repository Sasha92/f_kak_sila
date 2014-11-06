<?php

namespace FKakSila\Bundle\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FKakSila\Bundle\MainBundle\Form\PhraseType;
use FKakSila\Bundle\MainBundle\Entity\Phrase;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    public function indexAction(Request $request)
    {
        $phrase = new Phrase();
        $form = $this->createForm(new PhraseType(), $phrase);

        $form->handleRequest($request);
        if ($form->isValid()){
            return new Response('Valid');
        }
        return $this->render('FKakSilaMainBundle:Default:index.html.twig', array ('form' => $form-> createView()));
    }
}
