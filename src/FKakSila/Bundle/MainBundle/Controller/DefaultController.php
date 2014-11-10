<?php

namespace FKakSila\Bundle\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FKakSila\Bundle\MainBundle\Form\PhraseType;
use FKakSila\Bundle\MainBundle\Entity\Phrase;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Translation\Translator;

class DefaultController extends Controller
{
    public function indexAction(Request $request)
    {
        $phrase = new Phrase();
        $action = array('action' => $this->generateUrl('f_kak_sila_main_homepage', array('text' => 10)));
        $form = $this->createForm(new PhraseType(), $phrase, $action);

        $form->handleRequest($request);

        if ($form->isValid()) {

            $text = $form['text']->getData();
            $language = $form['language']->getData();
            /*$length = strlen($text);
            $letters = str_split($text);

            $em = $this->get('doctrine.orm.entity_manager');
            $repo = $em->getRepository('FKakSilaMainBundle:Letter');
            $result = [];
            for ($i = 0; $i < $length; $i++) {
                $letter = $repo->findOneBy(['name' => $phrase->getText()[$i]]);
                if (empty($letter->getTranscription()) and  $i!= $length - 1) {
                    $data = sprintf('%s', $letter->getdescription() . ',');
                } else {
                    $data = sprintf('%s %s %s', $letter->getTranscription(), 'как', $letter->getdescription() . ',');
                }
                if ($i == $length - 1) {
                    $data = sprintf('%s %s %s', $letter->getTranscription(), 'как', $letter->getdescription());
                }
                array_push($result, $data);
            }*/
            //return new Response(var_dump($phrase));
            //return $this->render('FKakSilaMainBundle:Default:index.html.twig', array('form' => $form->createView(), 'letters' => $letters, 'result' => $result));
            return $this->redirect($this->generateUrl('f_kak_sila_main_homepage', array('text' => $text, 'language'=>$language)));

        }

        $text = $request->query->get('text');
        if (!empty($text)) {

            $length = strlen($text);
            $letters = str_split($text);

            $language = $request->query->get('language');
            $translator = new Translator($language);

            $phrase = new Phrase();
            $phrase->setText($text);
            $em = $this->get('doctrine.orm.entity_manager');
            $repo = $em->getRepository('FKakSilaMainBundle:Letter');
            $result = [];
            for ($i = 0; $i < $length; $i++) {
                $letter = $repo->findOneBy(['name' => $phrase->getText()[$i]]);
                if (empty($letter->getTranscription()) and $i != $length - 1) {
                    $data = sprintf('%s', $letter->getdescription() . ',');
                } else {
                    $data = sprintf('%s %s %s', $letter->getTranscription(), 'как', $letter->getdescription() . ',');
                }
                if ($i == $length - 1) {
                    $data = sprintf('%s %s %s', $letter->getTranscription(), 'как', $letter->getdescription());
                }
                array_push($result, $translator->trans($data));
            }

            return $this->render('FKakSilaMainBundle:Default:index.html.twig', array('form' => $form->createView(), 'letters' => $letters, 'result' => $result));
        } else {
            return $this->render('FKakSilaMainBundle:Default:index.html.twig', array('form' => $form->createView()));

        }
    }
}