<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="PhoneDirectory")
 */
class PhoneDirectory
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    /**
     * @ORM\Column(type="string", length=60)
     */
    private $surname;
    /**
     * @ORM\Column(type="string", length=60)
     */
    private $forname;
    /**
     * @ORM\Column(type="string", length=20)
     */
    private $homephone;
    /**
     * @ORM\Column(type="string", length=20)
     */
    private $cellphone;
    /**
     * @ORM\Column(type="integer")
     */
    private $department;


    /**
     * Set id
     *
     * @param integer $id
     *
     * @return PhoneDirectory
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
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
     * Set surname
     *
     * @param string $surname
     *
     * @return PhoneDirectory
     */
    public function setSurname($surname)
    {
        $this->surname = $surname;

        return $this;
    }

    /**
     * Get surname
     *
     * @return string
     */
    public function getSurname()
    {
        return $this->surname;
    }

    /**
     * Set forname
     *
     * @param string $forname
     *
     * @return PhoneDirectory
     */
    public function setForname($forname)
    {
        $this->forname = $forname;

        return $this;
    }

    /**
     * Get forname
     *
     * @return string
     */
    public function getForname()
    {
        return $this->forname;
    }

    /**
     * Set homephone
     *
     * @param string $homephone
     *
     * @return PhoneDirectory
     */
    public function setHomephone($homephone)
    {
        $this->homephone = $homephone;

        return $this;
    }

    /**
     * Get homephone
     *
     * @return string
     */
    public function getHomephone()
    {
        return $this->homephone;
    }

    /**
     * Set cellphone
     *
     * @param string $cellphone
     *
     * @return PhoneDirectory
     */
    public function setCellphone($cellphone)
    {
        $this->cellphone = $cellphone;

        return $this;
    }

    /**
     * Get cellphone
     *
     * @return string
     */
    public function getCellphone()
    {
        return $this->cellphone;
    }

    /**
     * Set department
     *
     * @param integer $department
     *
     * @return PhoneDirectory
     */
    public function setDepartment($department)
    {
        $this->department = $department;

        return $this;
    }

    /**
     * Get department
     *
     * @return integer
     */
    public function getDepartment()
    {
        return $this->department;
    }
}
