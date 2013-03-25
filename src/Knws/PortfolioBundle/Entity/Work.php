<?php

namespace Knws\PortfolioBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Product
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Knws\PortfolioBundle\Entity\WorkRepository")
 */

class Work
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="class", type="string", length=255)
     */
    private $class;

    /**
     * @var string
     *
     * @ORM\Column(name="slug", type="string", length=255)
     */
    private $slug;


    /**
     * @var string
     *
     * @ORM\Column(name="prev", type="string", length=255)
     */
    private $prev;

    /**
     * @var string
     *
     * @ORM\Column(name="next", type="string", length=255)
     */
    private $next;

    /**
     * @var string
     *
     * @ORM\Column(name="asset_title", type="string", length=255)
     */
    private $assetTitle;

    /**
     * @var date
     *
     * @ORM\Column(name="date", type="date")
     */
    private $date;

    /**
     * @ORM\ManyToOne(targetEntity="Tag", inversedBy="works")
     * @ORM\JoinColumn(name="tag_id", referencedColumnName="id")
     */
    private $tags;

    /**
     * @var string
     *
     * @ORM\Column(name="url", type="string", length=255)
     */
    private $url;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var text
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;


    /**
     * @var integer
     *
     * @ORM\Column(name="carousel", type="integer")
     */
    private $carousel;

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
     * Set class
     *
     * @param string $class
     * @return Work
     */
    public function setClass($class)
    {
        $this->class = $class;

        return $this;
    }

    /**
     * Get class
     *
     * @return string
     */
    public function getClass()
    {
        return $this->class;
    }

    /**
     * Set slug
     *
     * @param string $slug
     * @return Work
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * Get slug
     *
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Set assetTitle
     *
     * @param string $assetTitle
     * @return Work
     */
    public function setAssetTitle($assetTitle)
    {
        $this->assetTitle = $assetTitle;

        return $this;
    }

    /**
     * Get assetTitle
     *
     * @return string
     */
    public function getAssetTitle()
    {
        return $this->assetTitle;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     * @return Work
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set url
     *
     * @param string $url
     * @return Work
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get url
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return Work
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
     * Set description
     *
     * @param string $description
     * @return Work
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set tags
     *
     * @param \Knws\PortfolioBundle\Entity\Tag $tags
     * @return Work
     */
    public function setTags(\Knws\PortfolioBundle\Entity\Tag $tags = null)
    {
        $this->tags = $tags;

        return $this;
    }

    /**
     * Get tags
     *
     * @return \Knws\PortfolioBundle\Entity\Tag
     */
    public function getTags()
    {
        return $this->tags;
    }

    /**
     * Set carousel
     *
     * @param integer $carousel
     * @return Work
     */
    public function setCarousel($carousel)
    {
        $this->carousel = $carousel;

        return $this;
    }

    /**
     * Get carousel
     *
     * @return integer
     */
    public function getCarousel()
    {
        return $this->carousel;
    }
}