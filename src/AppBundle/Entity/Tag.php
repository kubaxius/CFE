<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tag
 *
 * @ORM\Table(name="tag", indexes={@ORM\Index(name="source", columns={"source_id"}), @ORM\Index(name="thumb_id", columns={"thumb_id"}), @ORM\Index(name="type", columns={"type"})})
 * @ORM\Entity
 */
class Tag
{
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime", nullable=false)
     */
    private $date;

    /**
     * @var integer
     *
     * @ORM\Column(name="number", type="integer", nullable=false)
     */
    private $number;

    /**
     * @var float
     *
     * @ORM\Column(name="rating", type="float", precision=10, scale=0, nullable=false)
     */
    private $rating;

    /**
     * @var boolean
     *
     * @ORM\Column(name="favourite", type="boolean", nullable=false)
     */
    private $favourite;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \AppBundle\Entity\TagType
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\TagType")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="type", referencedColumnName="id")
     * })
     */
    private $type;

    /**
     * @var \AppBundle\Entity\File
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\File")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="thumb_id", referencedColumnName="id")
     * })
     */
    private $thumb;

    /**
     * @var \AppBundle\Entity\Source
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Source")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="source_id", referencedColumnName="id")
     * })
     */
    private $source;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\File", mappedBy="tag")
     */
    private $file;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->file = new \Doctrine\Common\Collections\ArrayCollection();
    }

}

