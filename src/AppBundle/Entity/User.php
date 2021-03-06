<?php
// src/AppBundle/Entity/User.php

namespace AppBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="UserRepository")
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
{

    public function __construct()
    {
        parent::__construct();
        // your own logic
    }

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Child", mappedBy="parent")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;







}

