<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class LoginTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->browse(function ($browser){
            $browser->visit('/login')
                    ->type('email', 'admin@admin.com')
                    ->type('password', 'password')
                    ->press('Login')
                    ->waitForText('Companies')
                    ->assertPathIs('/');
        });
    }
}
