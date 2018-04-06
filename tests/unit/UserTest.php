<?php

use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    public function testThatWeCanGetTheFirstName()
    {
        $user = new \App\Models\User;

        $user->setFirstName('Vitalii');

        $this->assertEquals($user->getFirstName(), 'Vitalii');
    }

    public function testThatWeCanGetTheLastName()
    {
        $user = new \App\Models\User;

        $user->setLastName('Nevadskiy');

        $this->assertEquals($user->getLastName(), 'Nevadskiy');
    }

    public function testFullNameIsReturned()
    {
        $user = new \App\Models\User;

        $user->setFirstName('Vitalii');
        $user->setLastName('Nevadskiy');

        $this->assertEquals($user->getFullName(), 'Vitalii Nevadskiy');
    }

    public function testFirstAndLastNameAreTrimmed()
    {
        $user = new \App\Models\User;
        $user->setFirstName(' Vtalii      ');
        $user->setLastName('  Nevadskiy ');

        $this->assertEquals($user->getFirstName(), 'Vtalii');
        $this->assertEquals($user->getLastName(), 'Nevadskiy');
    }

    public function testEmailAddressCanBeSet()
    {
        $email = 'nevadskiy@gmail.com';

        $user = new \App\Models\User;
        $user->setEmail($email);

        $this->assertEquals($user->getEmail(), $email);
    }

    public function testEmailVariablesContainsCorrectValues()
    {
        $user = new \App\Models\User;
        $user->setFirstName('Vitalii');
        $user->setLastName('Nevadskiy');
        $user->setEmail('nevadskiy@gmail.com');

        $emailVariables = $user->getEmailVariables();

        $this->assertArrayHasKey('full_name', $emailVariables);
        $this->assertArrayHasKey('email', $emailVariables);

        $this->assertEquals($emailVariables['full_name'], 'Vitalii Nevadskiy');
        $this->assertEquals($emailVariables['email'], 'nevadskiy@gmail.com');
    }
}
