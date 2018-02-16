<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Meal
 *
 * @ORM\Table(name="meal")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\MealRepository")
 */
class Meal
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="finalmeal", type="string", length=255)
     */
    private $finalmeal;

    /**
     * @var string
     *
     * @ORM\Column(name="comment", type="string", length=255)
     */
    private $comment;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="create_date", type="date")
     */
    private $createDate;

    /**
     * @var string
     *
     * @ORM\Column(name="extra_order", type="string", length=255)
     */
    private $extraOrder;


    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name.
     *
     * @param string $name
     *
     * @return Meal
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set finalmeal.
     *
     * @param string $finalmeal
     *
     * @return Meal
     */
    public function setFinalmeal($finalmeal)
    {
        $this->finalmeal = $finalmeal;

        return $this;
    }

    /**
     * Get finalmeal.
     *
     * @return string
     */
    public function getFinalmeal()
    {
        return $this->finalmeal;
    }

    /**
     * Set comment.
     *
     * @param string $comment
     *
     * @return Meal
     */
    public function setComment($comment)
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * Get comment.
     *
     * @return string
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * Set createDate.
     *
     * @param \DateTime $createDate
     *
     * @return Meal
     */
    public function setCreateDate($createDate)
    {
        $this->createDate = $createDate;

        return $this;
    }

    /**
     * Get createDate.
     *
     * @return \DateTime
     */
    public function getCreateDate()
    {
        return $this->createDate;
    }

    /**
     * Set extraOrder.
     *
     * @param string $extraOrder
     *
     * @return Meal
     */
    public function setExtraOrder($extraOrder)
    {
        $this->extraOrder = $extraOrder;

        return $this;
    }

    /**
     * Get extraOrder.
     *
     * @return string
     */
    public function getExtraOrder()
    {
        return $this->extraOrder;
    }
}
