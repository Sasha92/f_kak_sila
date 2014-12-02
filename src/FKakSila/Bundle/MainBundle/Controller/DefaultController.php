<?php

namespace FKakSila\Bundle\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FKakSila\Bundle\MainBundle\Form\PhraseType;
use FKakSila\Bundle\MainBundle\Entity\Phrase;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    public function translateAction(Request $request)
    {
        $phrase = new Phrase();
        $action = array('action' => $this->generateUrl('translate', array('text' => 10)));
        $form = $this->createForm(new PhraseType(), $phrase, $action);

        $form->handleRequest($request);

        if ($form->isValid()) {

            $text = $form['text']->getData();
            return $this->redirect($this->generateUrl('translate', array('text' => $text)));

        }

        $text = $request->query->get('text');
        if (!empty($text)) {

            $length = strlen($text);
            $letters = str_split($text);

            $phrase = new Phrase();
            $phrase->setText($text);
            $em = $this->get('doctrine.orm.entity_manager');
            $repo = $em->getRepository('FKakSilaMainBundle:Letter');
            $result = [];
            for ($i = 0; $i < $length; $i++) {
                $letter = $repo->findOneBy(['name' => $phrase->getText()[$i]]);
                if ($i != $length - 1) {
                    if (empty($letter->getTranscription())) {
                        $data = sprintf('%s', $letter->getdescription() . ',');
                    } else {
                        $data = sprintf('[%s] %s %s', $letter->getTranscription(), ' - как', $letter->getdescription() . ',');
                    }
                } else {
                    if (empty($letter->getTranscription())) {
                        $data = sprintf('%s', $letter->getdescription());
                    } else {
                        $data = sprintf('[%s] %s %s', $letter->getTranscription(), ' - как', $letter->getdescription());
                    }
                }

                array_push($result, $data);
            }

            return $this->render('FKakSilaMainBundle:Default:index.html.twig', array('form' => $form->createView(), 'letters' => $letters, 'result' => $result));
        } else {
            return $this->render('FKakSilaMainBundle:Default:index.html.twig', array('form' => $form->createView()));

        }
    }
}