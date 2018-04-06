<?php

namespace App\Models;

class User
{
    /**
     * User first name
     *
     * @var string
     */
    protected $firstName;

    /**
     * User last name
     *
     * @var string
     */
    protected $lastName;

    /**
     * User email
     *
     * @var string
     */
    protected $email;

    /**
     * Setting first name
     *
     * @param string $firstName
     * @return void
     */
    public function setFirstName(string $firstName)
    {
        $this->firstName = trim($firstName);
    }

    /**
     * Getting first name
     *
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * Setting last name
     *
     * @param string $lastName
     * @return void
     */
    public function setLastName(string $lastName)
    {
        $this->lastName = trim($lastName);
    }

    /**
     * Getting last name
     *
     * @return string
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }

    /**
     * Getting full name
     *
     * @return string
     */
    public function getFullName(): string
    {
        return $this->getFirstName() . ' ' . $this->getLastName();
    }

    /**
     * Setting user email
     *
     * @param string $email
     * @return void
     */
    public function setEmail(string $email)
    {
        $this->email = $email;
    }

    /**
     * Getting user email
     *
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    public function getEmailVariables()
    {
        return [
            'full_name' => $this->getFullName(),
            'email' => $this->getEmail()
        ];
    }
}
