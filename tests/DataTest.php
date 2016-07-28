<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class DataTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */

    public function testChangeRole()
    {
        $user = App\User::create([
            'name' => 'Testing User',
            'email' => 'test@test.com',
            'is_admin' => true,
        ]);
        $this->be($user);
        $this->visit('/data/2/edit')
             ->select('1', 'is_admin')
             ->press('Change')
             ->see('Update data success');
        $userDelete = App\User::where('email', 'test@test.com')->delete();
    }

    public function testFormValidationChangeRole()
    {
        $user = App\User::create([
            'name' => 'Testing User',
            'email' => 'test@test.com',
            'is_admin' => true,
        ]);
        $this->be($user);
        $this->visit('/data/2/edit')
             ->select('', 'is_admin')
             ->press('Change')
             ->see('The is admin field is required.');
        $userDelete = App\User::where('email', 'test@test.com')->delete();
    }
}
