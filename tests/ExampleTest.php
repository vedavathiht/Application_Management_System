<?php
//use Tests\Testcase;
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
        //$this->visit('/')->see('Laravel 5');
    }

    //to test 
    public function testBasicTest()
    {
      
        $this->get('/')->assertSee('Manufacturer Name');
        //$this->assertTrue(true);
    }


}
