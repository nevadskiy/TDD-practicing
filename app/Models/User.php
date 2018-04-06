<?php

namespace App\Models;

class User
{
    /**
     * User first name
     *
     * @var string
     */
    public $firstName;

    /**
     * Setting first name
     *
     * @param string $firstName
     * @return void
     */
    public function setFirstName(string $firstName)
    {
        $this->firstName = $firstName;
    }

    /**
     * Getting first name
     *
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }
}
