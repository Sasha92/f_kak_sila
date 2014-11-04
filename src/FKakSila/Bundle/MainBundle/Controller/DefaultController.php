<?php

namespace FKakSila\Bundle\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FKakSila\Bundle\MainBundle\Form\TranslateLetters;
use FKakSila\Bundle\MainBundle\Entity\Letter;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $name = new Letter();
        $form = $this->createForm(new TranslateLetters(), $name);
        return $this->render('FKakSilaMainBundle:Default:index.html.twig', array ('form' => $form-> createView()));

    }
}
