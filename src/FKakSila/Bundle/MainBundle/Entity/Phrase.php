<?php

namespace FKakSila\Bundle\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Phrase
 */
class Phrase
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $text;



    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set text
     *
     * @param string $text
     * @return Phrase
     */
    public function setText($text)
    {
        $this->text = $text;

        return $this;
    }

    /**
     * Get text
     *
     * @return string 
     */
    public function getText()
    {
        return $this->text;
    }
}
