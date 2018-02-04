<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * An offer from my shop - this description will be automatically extracted form the PHPDoc to document the API.
 *
 * @ApiResource(attributes={"filters"={"offer.search_filter","offer.order_filter"}})
 * @ORM\Entity
 */
class Offer
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @Groups({"product"})
     */
    public $id;

    /**
     * @ORM\Column(type="text")
     * @Groups({"product"})
     */
    public $description;

    /**
     * @ORM\Column(type="float")
     * @Assert\NotBlank
     * @Assert\Range(min=0, minMessage="The price must be superior to 0.")
     * @Assert\Type(type="float")
     * @Groups({"product"})
     */
    public $price;

    /**
     * @ORM\ManyToOne(targetEntity="Product", inversedBy="offers")
     */
    public $product;
}