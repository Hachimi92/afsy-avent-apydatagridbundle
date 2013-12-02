<?php

namespace ACSEO\Bundle\CalendrierBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Comment
 */
class Comment
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $authorNickName;

    /**
     * @var string
     */
    private $content;

    /**
     * @var \DateTime
     */
    private $createdAt;

    /**
     * @var \ACSEO\Bundle\CalendrierBundle\Article
     */
    private $article;

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
     * Set authorNickName
     *
     * @param string $authorNickName
     * @return Comment
     */
    public function setAuthorNickName($authorNickName)
    {
        $this->authorNickName = $authorNickName;
    
        return $this;
    }

    /**
     * Get authorNickName
     *
     * @return string 
     */
    public function getAuthorNickName()
    {
        return $this->authorNickName;
    }

    /**
     * Set content
     *
     * @param string $content
     * @return Comment
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
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return Comment
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    
        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime 
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set article
     *
     * @param \ACSEO\Bundle\CalendrierBundle\Entity\Article $article
     * @return Comment
     */
    public function setArticle(\ACSEO\Bundle\CalendrierBundle\Entity\Article $article = null)
    {
        $this->article = $article;
    
        return $this;
    }

    /**
     * Get article
     *
     * @return \ACSEO\Bundle\CalendrierBundle\Entity\Article 
     */
    public function getArticle()
    {
        return $this->article;
    }
}