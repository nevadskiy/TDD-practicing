<?php

use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{

    protected $user;

    public function setUp()
    {
        $this->user = new \App\Models\User;
    }

    public function test_we_can_get_the_first_name()
    {

        $this->user->setFirstName('Vitalii');

        $this->assertSame($this->user->getFirstName(), 'Vitalii');
    }

    public function test_we_can_get_the_last_name()
    {

        $this->user->setLastName('Nevadskiy');

        $this->assertSame($this->user->getLastName(), 'Nevadskiy');
    }

    public function test_full_name_is_returned()
    {

        $this->user->setFirstName('Vitalii');
        $this->user->setLastName('Nevadskiy');

        $this->assertSame($this->user->getFullName(), 'Vitalii Nevadskiy');
    }

    public function test_first_and_last_name_are_trimmed()
    {
        $this->user->setFirstName(' Vtalii      ');
        $this->user->setLastName('  Nevadskiy ');

        $this->assertSame($this->user->getFirstName(), 'Vtalii');
        $this->assertSame($this->user->getLastName(), 'Nevadskiy');
    }

    public function test_email_address_can_be_set()
    {
        $email = 'nevadskiy@gmail.com';

        $this->user->setEmail($email);

        $this->assertSame($this->user->getEmail(), $email);
    }

    public function test_email_variables_contains_correct_values()
    {
        $this->user->setFirstName('Vitalii');
        $this->user->setLastName('Nevadskiy');
        $this->user->setEmail('nevadskiy@gmail.com');

        $emailVariables = $this->user->getEmailVariables();

        $this->assertArrayHasKey('full_name', $emailVariables);
        $this->assertArrayHasKey('email', $emailVariables);

        $this->assertSame($emailVariables['full_name'], 'Vitalii Nevadskiy');
        $this->assertSame($emailVariables['email'], 'nevadskiy@gmail.com');
    }
}
