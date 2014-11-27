<?php

namespace Objects\Cbc\SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping\UniqueConstraint;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * Advertisement
 *
 * @ORM\Table()
 * @UniqueEntity(fields={"name","channel"},errorPath="zedoCode",message="This advertisement already created.")
 * @ORM\Table(uniqueConstraints={@UniqueConstraint(name="name_channel_idx", columns={"name", "channel_id"})})
 * @ORM\Entity(repositoryClass="Objects\Cbc\SiteBundle\Entity\AdvertisementRepository")
 */
class Advertisement {

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
     * @Assert\NotBlank()
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     * @Assert\NotBlank()
     * @ORM\Column(name="zedoCode", type="text")
     */
    private $zedoCode;

    /**
     * @var integer
     * @ORM\ManyToOne(targetEntity="\Objects\Cbc\SofraBundle\Entity\Channel", inversedBy="advertisements")
     * @ORM\JoinColumn(name="channel_id", referencedColumnName="id", nullable=false, onDelete="CASCADE")
     */
    private $channel;

    public function getPositions() {
        return array('160x600 left' => '160x600 left', '160x600 right' => '160x600 right', '300x250' => '300x250', '728x90' => '728x90');
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Advertisement
     */
    public function setName($name) {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName() {
        return $this->name;
    }

    /**
     * Set zedoCode
     *
     * @param string $zedoCode
     * @return Advertisement
     */
    public function setZedoCode($zedoCode) {
        $this->zedoCode = $zedoCode;

        return $this;
    }

    /**
     * Get zedoCode
     *
     * @return string 
     */
    public function getZedoCode() {
        return $this->zedoCode;
    }

    /**
     * Set channel
     *
     * @param \Objects\Cbc\SofraBundle\Entity\Channel $channel
     * @return Advertisement
     */
    public function setChannel(\Objects\Cbc\SofraBundle\Entity\Channel $channel) {
        $this->channel = $channel;

        return $this;
    }

    /**
     * Get channel
     *
     * @return \Objects\Cbc\SofraBundle\Entity\Channel 
     */
    public function getChannel() {
        return $this->channel;
    }

}
