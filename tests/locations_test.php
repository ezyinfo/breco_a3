<?php

require "inc/locations.php";

use PHPUnit\Framework\TestCase;

class locations_test extends TestCase
{
    private $locations;

    protected function setUp(): void
    {
        $mysql_host = "localhost";
        $mysql_user = "dest";
        $mysql_pwd = "gyD7k4qsa4)kuwTj";
        $mysql_dbname = "dest";

        $this->locations = new Locations($mysql_host, $mysql_user, $mysql_pwd, $mysql_dbname);
    }

    public function testDatabaseConnectionSuccess()
    {
        $this->assertTrue($this->locations->connect());
    }

    public function testGetLocationsWithResults()
    {
        $locationResult = '[{"id":1,"location":"Rennes"}]';
        // Check the result
        $this->locations->connect();
        $locations = $this->locations->getLocations("Re");
        $jsonResponse = json_encode($locations);
        $this->assertEquals($locationResult, $jsonResponse);
    }

    public function testGetLocationsWithoutResults()
    {
        // Check that location not found
        $this->locations->connect();
        $locations = $this->locations->getLocations("NonExistentLocation");
        $this->assertEmpty($locations);
    }

}
