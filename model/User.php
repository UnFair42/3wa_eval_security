<?php
/*
 * Description de Medecin.php
 *
 * @author rémy
 * Creation 02/2022
 * Derniere MAJ 27/02/2022
 *
 * Definition de la classe Medecin
 */

class User
{

    private $firstname;
    private $lastname;
    private $email;
    private $password;
    private $status;
    private $picture;

    function __construct($firstname, $lastname, $email, $password, $status, $picture = "")
    {
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->email = $email;
        $this->password = $password;
        $this->status = $status;
        $this->picture = $picture;
    }

    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * @param $firstname
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;
    }

    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * @param $lastname
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;
    }

    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return "Firstname: {$this->firstname}, Lastname: {$this->lastname}, Email: {$this->email}, Password: {$this->password}, Status: {$this->status}";
    }

    /**
     * Get the value of picture
     */
    public function getPicture()
    {
        return $this->picture;
    }

    /**
     * Set the value of picture
     *
     * @return  self
     */
    public function setPicture($picture)
    {
        $this->picture = $picture;

        return $this;
    }
}
