<?php
namespace App\Entity;
// documentation url: https://symfony.com/doc/current/doctrine.html
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Customers
 * @package App\Entity
 * @ORM\Entity()
 * @todo wy multiple
 */
class Customers
{
    const GENDER_MAN = 'man';
    const GENDER_WOMEN = 'women';

    public static function getGenderChoices()
    {
        return [
            'man' => self::GENDER_MAN,
            'vrouw' => self::GENDER_WOMEN,
        ];
    }

    /**
     * @var integer
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(name="Id", type="integer")
     * @ORM\Id()
     *
     */
    protected $id;

    /**
     * @var string
     * @ORM\Column(name="firstname", type="string")
     */
    protected $firstName;

    /**
     * @var string
     * @ORM\Column(name="lastname", type="string")
     *
     */
    protected $lastName;

    /**
     * @var string
     * @ORM\Column(name="geslacht" , type="string")
     */
    protected $gender;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    /**
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    /**
     * @return string
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * @param string $gender
     */
    public function setGender($gender)
    {
        $this->gender = $gender;
    }
}