<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AuthTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */

    public function testRegister()
    {
        $this->visit('/register')
             ->type('Test User', 'name')
             ->type('081233548738', 'phone')
             ->type('Tester', 'occupation')
             ->type('test@test.com', 'email')
             ->type(bcrypt('testing123'), 'password')
             ->press('Register')
             ->seeInDatabase('users', ['email' => 'bps.phi@gmail.com']);
    }

    public function testFormValidationRegister()
    {
        $this->visit('/register')
             ->press('Register')
             ->see('The name field is required.')
             ->see('The phone field is required.')
             ->see('The occupation field is required.')
             ->see('The email field is required.')
             ->see('The password field is required.')
             ->see('The password confirmation field is required.');
    }

    public function testLogin()
    {
        $this->visit('/login')
             ->type('bps.phi@gmail.com', 'email')
             ->type('miku39!', 'password')
             ->press('Login')
             ->visit('/home')
             ->see('Dashboard');
    }

    public function testFormValidationLogin()
    {
        $this->visit('/login')
             ->press('Login')
             ->see('The email field is required.')
             ->see('The password field is required.');
    }
}
