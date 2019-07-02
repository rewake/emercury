<?php

namespace unit;

use PHPUnit\Framework\TestCase;
use Rewake\Emercury\EmercuryClient;

class EmercuryTest extends TestCase
{
    /**
     * @test
     * @testdox Can load config json file
     */
    public function can_instantiate_class()
    {
        // Instantiate Emercury class
        $client = new EmercuryClient();

        // Assert that we have a EmercuryClient instance
        $this->assertInstanceOf(EmercuryClient::class, $client);

        $client->configure("mktapps@envisiagroup.com", "c7e2138167e442a47e7de03b4d5a9181");

        $client->updateSubscribers([
            "audience_id" => "48598",
			"subscriber" => [
			    [
                    "email" => "rkomatz@envisiagroup.com",
                    "first_name" => "John",
                    "last_name" => "Doe",
                    "optin_date" => '2019-06-21'
                ]
			]
        ]);

        // Pass class on the next test
        return $client;
    }

    /**
     * @test
     * @depends can_instantiate_class
     * @doesNotPerformAssertions
     * @testdox Can configure class using configure() method
     */
    public function can_configure_class($client)
    {
        $client->configure('test', 'test', 'test');

        // TODO: make sure config was stores as expected
    }

    /**
     * @test
     * @testdox Can instantiate and configure class
     */
    public function can_instantiate_class_with_config_vals()
    {
        // Instantiate EmercuryClient class
        $client = new EmercuryClient('test', 'test', 'test');

        // Assert that we have a EmercuryClient instance
        $this->assertInstanceOf(EmercuryClient::class, $client);

        // TODO: make sure config was stores as expected
    }
}