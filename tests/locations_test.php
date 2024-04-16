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
        $locationResult = array(
            array("id" => 1, "name" => "Rennes")
        );
        // Check the result
        $locations = $this->locations->getLocations("Re");
        $this->assertEquals($locationResult, $locations);
    }

    public function testGetLocationsWithoutResults()
    {
        // Check that location not found
        $locations = $this->locations->getLocations("NonExistentLocation");
        $this->assertEmpty($locations);
    }

    public function testSQLQuery()
    {
        // Check that location found
        $query = "Rennes";
        $statement = $this->locations->getLocations($query);
        $this->assertStringContainsString($query, $statement->queryString);
    }
}
