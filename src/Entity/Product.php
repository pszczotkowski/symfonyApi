<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource(
 *     normalizationContext={"groups"={"list", "item"}},
 *     itemOperations={
 *          "get"={
 *              "normalization_context"={"groups"={"item"}}
 *              }
 *      },
 *     collectionOperations={
 *     "post",
 *          "get"={
 *              "normalization_context"={"groups"={"list"}},
 *
 *      }
 *     }
 * )
 * @ORM\Entity(repositoryClass="App\Repository\ProductRepository")
 *
 */
class Product {

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     * @Groups({"list", "item"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"list", "item"})
     */
    private $name;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2)
     * @Groups("item")
     */
    private $price;

    public function getId(): ?int {
        return $this->id;
    }

    public function getName(): ?string {
        return $this->name;
    }

    public function setName(string $name): self {
        $this->name = $name;

        return $this;
    }

    public function getPrice() {
        return $this->price;
    }

    public function setPrice($price): self {
        $this->price = $price;

        return $this;
    }
}
