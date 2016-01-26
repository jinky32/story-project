<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use AppBundle\Entity\User;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * Child
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="AppBundle\Entity\ChildRepository")
 * @UniqueEntity("name")
 */
class Child
{

    /**
     * @var integer
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, unique=true)
     */
    private $name;

/*
 * Todo - figure out how to use a date type for dateofbirth below and as well in users.yml fixtures file
 */

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_of_birth", type="datetime")
     */
    private $dateOfBirth;

    //todo find ot why the parent variable here and Id variable in AppBundle:User are not mapped correctly
    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User", inversedBy="id")
     * @ORM\JoinColumn(onDelete="CASCADE")
     */

    private $parent;

    /**
     * @return User
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * @param User $parent
     */
    public function setParent(User $parent)
    {
        $this->parent = $parent;
    }


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
     * Set name
     *
     * @param string $name
     *
     * @return Child
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }


    /**
     * Set dateOfBirth
     *
     * @param \DateTime $dateOfBirth
     *
     * @return Child
     */
    public function setDateOfBirth($dateOfBirth)
    {
        $this->dateOfBirth = $dateOfBirth;

        return $this;
    }

    /**
     * Get dateOfBirth
     *
     * @return \DateTime
     */
    public function getDateOfBirth()
    {
        return $this->dateOfBirth;
    }
}

