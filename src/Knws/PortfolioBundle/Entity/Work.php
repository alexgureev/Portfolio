<?php
namespace Knws\PortfolioBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

class Work
{
    protected $name;

    protected $price;

    protected $description;
}