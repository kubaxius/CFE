<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * File
 *
 * @ORM\Table(name="file", indexes={@ORM\Index(name="source", columns={"source_id"}), @ORM\Index(name="type", columns={"type_id"}), @ORM\Index(name="extension", columns={"extension"})})
 * @ORM\Entity
 */
class File
{
    /**
     * @var boolean
     *
     * @ORM\Column(name="favourite", type="boolean", nullable=false)
     */
    private $favourite;

    /**
     * @var integer
     *
     * @ORM\Column(name="rating", type="integer", nullable=false)
     */
    private $rating;

    /**
     * @var integer
     *
     * @ORM\Column(name="source_id", type="integer", nullable=false)
     */
    private $sourceId;

    /**
     * @var string
     *
     * @ORM\Column(name="source_url", type="string", length=255, nullable=true)
     */
    private $sourceUrl;

    /**
     * @var string
     *
     * @ORM\Column(name="real_source", type="string", length=255, nullable=false)
     */
    private $realSource;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime", nullable=false)
     */
    private $date;

    /**
     * @var string
     *
     * @ORM\Column(name="extension", type="string", length=10, nullable=false)
     */
    private $extension;

    /**
     * @var integer
     *
     * @ORM\Column(name="size", type="integer", nullable=false)
     */
    private $size;

    /**
     * @var integer
     *
     * @ORM\Column(name="times_seen", type="integer", nullable=false)
     */
    private $timesSeen;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \AppBundle\Entity\FileType
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\FileType")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="type_id", referencedColumnName="id")
     * })
     */
    private $type;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Tag", inversedBy="file")
     * @ORM\JoinTable(name="mtm_file_tag",
     *   joinColumns={
     *     @ORM\JoinColumn(name="file_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="tag_id", referencedColumnName="id")
     *   }
     * )
     */
    private $tag;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->tag = new \Doctrine\Common\Collections\ArrayCollection();
    }

}

