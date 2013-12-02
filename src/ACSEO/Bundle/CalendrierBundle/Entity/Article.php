<?php

namespace ACSEO\Bundle\CalendrierBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Article
 */
class Article
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $content;

    /**
     * @var \DateTime
     */
    private $publishedDate;


    /**
     * @var \ACSEO\Bundle\CalendrierBundle\Writer
     */
    private $writer;

    /**
     * @var \Doctrine\Common\Collections\Collection 
     */
    private $comments;

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
     * Set title
     *
     * @param string $title
     * @return Article
     */
    public function setTitle($title)
    {
        $this->title = $title;
    
        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set content
     *
     * @param string $content
     * @return Article
     */
    public function setContent($content)
    {
        $this->content = $content;
    
        return $this;
    }

    /**
     * Get content
     *
     * @return string 
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set publishedDate
     *
     * @param \DateTime $publishedDate
     * @return Article
     */
    public function setPublishedDate($publishedDate)
    {
        $this->publishedDate = $publishedDate;
    
        return $this;
    }

    /**
     * Get publishedDate
     *
     * @return \DateTime 
     */
    public function getPublishedDate()
    {
        return $this->publishedDate;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->comments = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Add comments
     *
     * @param \ACSEO\Bundle\CalendrierBundle\Entity\Comment $comments
     * @return Article
     */
    public function addComment(\ACSEO\Bundle\CalendrierBundle\Entity\Comment $comments)
    {
        $this->comments[] = $comments;
    
        return $this;
    }

    /**
     * Remove comments
     *
     * @param \ACSEO\Bundle\CalendrierBundle\Entity\Comment $comments
     */
    public function removeComment(\ACSEO\Bundle\CalendrierBundle\Entity\Comment $comments)
    {
        $this->comments->removeElement($comments);
    }

    /**
     * Get comments
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getComments()
    {
        return $this->comments;
    }

    /**
     * Set writer
     *
     * @param \ACSEO\Bundle\CalendrierBundle\Entity\Writer $writer
     * @return Article
     */
    public function setWriter(\ACSEO\Bundle\CalendrierBundle\Entity\Writer $writer = null)
    {
        $this->writer = $writer;
    
        return $this;
    }

    /**
     * Get writer
     *
     * @return \ACSEO\Bundle\CalendrierBundle\Entity\Writer 
     */
    public function getWriter()
    {
        return $this->writer;
    }
}