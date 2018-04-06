<?php

use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{

    public function test_we_can_get_the_first_name()
    {
        $user = new \App\Models\User;

        $user->setFirstName('Vitalii');

        $this->assertSame($user->getFirstName(), 'Vitalii');
    }

    public function test_we_can_get_the_last_name()
    {
        $user = new \App\Models\User;

        $user->setLastName('Nevadskiy');

        $this->assertSame($user->getLastName(), 'Nevadskiy');
    }

    public function test_full_name_is_returned()
    {
        $user = new \App\Models\User;

        $user->setFirstName('Vitalii');
        $user->setLastName('Nevadskiy');

        $this->assertSame($user->getFullName(), 'Vitalii Nevadskiy');
    }

    public function test_first_and_last_name_are_trimmed()
    {
        $user = new \App\Models\User;
        $user->setFirstName(' Vtalii      ');
        $user->setLastName('  Nevadskiy ');

        $this->assertSame($user->getFirstName(), 'Vtalii');
        $this->assertSame($user->getLastName(), 'Nevadskiy');
    }

    public function test_email_address_can_be_set()
    {
        $email = 'nevadskiy@gmail.com';

        $user = new \App\Models\User;
        $user->setEmail($email);

        $this->assertSame($user->getEmail(), $email);
    }

    public function test_email_variables_contains_correct_values()
    {
        $user = new \App\Models\User;
        $user->setFirstName('Vitalii');
        $user->setLastName('Nevadskiy');
        $user->setEmail('nevadskiy@gmail.com');

        $emailVariables = $user->getEmailVariables();

        $this->assertArrayHasKey('full_name', $emailVariables);
        $this->assertArrayHasKey('email', $emailVariables);

        $this->assertSame($emailVariables['full_name'], 'Vitalii Nevadskiy');
        $this->assertSame($emailVariables['email'], 'nevadskiy@gmail.com');
    }
}
