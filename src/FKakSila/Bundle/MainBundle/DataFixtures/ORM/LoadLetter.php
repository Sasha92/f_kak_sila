<?php

namespace FKakSila\Bundle\MainBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use FKakSila\Bundle\MainBundle\Entity\Letter;


class LoadLetter implements FixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $openFile = fopen(__DIR__ . "/f_kak_sila.csv", "r");
        while (($data = fgetcsv($openFile, 1000, ",")) !== FALSE) {
            $letter = new Letter();
            $letter->setName(trim($data[0]));
            $letter->setTranscription(trim($data[1]));
            $letter->setDescription(trim($data[2]));

            $manager->persist($letter);
            $manager->flush();
        }
        fclose($openFile);
    }
} 