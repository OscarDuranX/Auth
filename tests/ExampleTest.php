<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ExampleTest extends TestCase
{
    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testBasicExample()
    {
        $this->visit('/')
             ->see('Laravel 5');
    }

    /**
     * Check login page
     *
     * @return void
     */
    public function testLoginPage()
    {
        $this->visit(route('auth.login'))
            ->see('Login');
    }
    /**
     * Check that a user with access go to resource
     *
     * @return void
     */

    public function testUserWithoutAccessToResource()
    {
        $this->unlogged();
        $this->visit('/resource')
            ->seePageIs(route('auth.login'))
            ->see('Login')
            ->dontSee('Logout');
    }

    public function testUserWithAccessToResource()
    {
        $this->logged();
        $this->visit('/resource')
             ->seePageIs('/resource');
    }

    public function unlogged()
    {
        Session::set('authenticated',false);
    }

    public function logged()
    {
        Session::set('authenticated',true);
    }

    public function testLoginPageHaveRegisterLinkAndWorkOk()
    {
        $this->visit('/login')
            ->click('Register')
            ->seePageIs('/register');
    }

    public function testPostLogin(){
        $this->visit('/login')
            ->type('soulgame@gmail.com', 'email')
            ->type('prova', 'password')
            ->check('remember')
            ->press('login')
            ->seePageIs('/home');
    }

    public function testnoPostLogin(){
        $this->visit('/login')
            ->type('soulgame@gmail.com', 'email')
            ->type('noanira', 'password')
            ->check('remember')
            ->press('login')
            ->seePageIs('/home');
    }

/*
    public function NoExisteig()
    {
        $this->visit('/')
            ->see('Laravel 5');
    }
   */
}
