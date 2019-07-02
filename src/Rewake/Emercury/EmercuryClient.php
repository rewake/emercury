<?php

namespace Rewake\Emercury;


/**
 * Class EmercuryClient
 * @package Rewake\Emercury
 */
class EmercuryClient
{
    /**
     * @var array
     */
    private $credentials;

    /**
     * @var RequiredProperties
     */
    private $required_properties;

    /**
     * EmercuryClient constructor.
     * @param null $email
     * @param null $key
     */
    public function __construct($email = null, $key = null)
    {
        // Load required properties
        $this->required_properties = new RequiredProperties();

        // See if config values were pass during construction
        if (!empty(array_filter(get_defined_vars()))) {

            // Configure class
            $this->configure($email, $key);
        }
    }

    /**
     * @param $email
     * @param $key
     * @return $this
     */
    public function configure($email, $key)
    {
        // Set credentials
        $this->credentials = [
            'email' => $email,
            'key' => $key
        ];

        // Make sure config values are valid/not empty
        $this->validate_required_fields('credentials', $this->credentials);

        // Return self for method chaining
        return $this;
    }

    public function getAudiences($data)
    {
        // Execute API call and return results
        return $this->call('getAudiences', $data);
    }

    public function getSubscribers($data)
    {
        // Execute API call and return results
        return $this->call('getSubscribers', $data);
    }

    public function updateSubscribers($data)
    {
        // Execute API call and return results
        return $this->call('updateSubscribers', $data);
    }

    public function addSuppression($data)
    {
        // Execute API call and return results
        return $this->call('addSuppression', $data);
    }

    public function addSuppressionContacts($data)
    {
        // Execute API call and return results
        return $this->call('addSuppressionContacts', $data);
    }

    public function addAudiences($data)
    {
        // Execute API call and return results
        return $this->call('addAudiences', $data);
    }

    public function deleteAudiences($data)
    {
        // Execute API call and return results
        return $this->call('deleteAudiences', $data);
    }

    public function deleteSubscribers($data)
    {
        // Execute API call and return results
        return $this->call('deleteSubscribers', $data);
    }

    public function getReportsID($data)
    {
        // Execute API call and return results
        return $this->call('getReportsID', $data);
    }

    public function getReportsStats($data)
    {
        // Execute API call and return results
        return $this->call('getReportsStats', $data);
    }

    public function createFilter($data)
    {
        // Execute API call and return results
        return $this->call('createFilter', $data);
    }

    public function getCustomFields($data)
    {
        // Execute API call and return results
        return $this->call('getCustomFields', $data);
    }

    public function getCategories($data)
    {
        // Execute API call and return results
        return $this->call('getCategories', $data);
    }

    public function getSuppresions($data)
    {
        // Execute API call and return results
        return $this->call('getSuppresions', $data);
    }

    public function getPreview($data)
    {
        // Execute API call and return results
        return $this->call('getPreview', $data);
    }

    public function campaignSendTest($data)
    {
        // Execute API call and return results
        return $this->call('campaignSendTest', $data);
    }

    public function getTestSubscribers($data)
    {
        // Execute API call and return results
        return $this->call('getTestSubscribers', $data);
    }

    public function getCampaignsInformation($data)
    {
        // Execute API call and return results
        return $this->call('getCampaignsInformation', $data);
    }

    public function getCampaignStats($data)
    {
        // Execute API call and return results
        return $this->call('getCampaignStats', $data);
    }

    public function getUnsubscribed($data)
    {
        // Execute API call and return results
        return $this->call('getUnsubscribed', $data);
    }

    public function getComplaints($data)
    {
        // Execute API call and return results
        return $this->call('getComplaints', $data);
    }

    public function getSoft($data)
    {
        // Execute API call and return results
        return $this->call('getSoft', $data);
    }

    public function getHard($data)
    {
        // Execute API call and return results
        return $this->call('getHard', $data);
    }

    public function getOpens($data)
    {
        // Execute API call and return results
        return $this->call('getOpens', $data);
    }

    public function getConfirmed($data)
    {
        // Execute API call and return results
        return $this->call('getConfirmed', $data);
    }

    public function getDisabled($data)
    {
        // Execute API call and return results
        return $this->call('getDisabled', $data);
    }

    public function updateCustomFields($data)
    {
        // Execute API call and return results
        return $this->call('updateCustomFields', $data);
    }

    public function addCampaign($data)
    {
        // Execute API call and return results
        return $this->call('addCampaign', $data);
    }

    public function sendCampaign($data)
    {
        // Execute API call and return results
        return $this->call('sendCampaign', $data);
    }

    public function addSchedule($data)
    {
        // Execute API call and return results
        return $this->call('addSchedule', $data);
    }

    public function addAutoresponder($data)
    {
        // Execute API call and return results
        return $this->call('addAutoresponder', $data);
    }

    public function importSubscribers($data)
    {
        // Execute API call and return results
        return $this->call('importSubscribers', $data);
    }

    public function getDateFormats($data)
    {
        // Execute API call and return results
        return $this->call('getDateFormats', $data);
    }

    public function importSuppressionContacts($data)
    {
        // Execute API call and return results
        return $this->call('importSuppressionContacts', $data);
    }

    public function emailsUnsubscribe($data)
    {
        // Execute API call and return results
        return $this->call('emailsUnsubscribe', $data);
    }

    public function getUnsubscribesList($data)
    {
        // Execute API call and return results
        return $this->call('getUnsubscribesList', $data);
    }

    public function updateCampaign($data)
    {
        // Execute API call and return results
        return $this->call('updateCampaign', $data);
    }

    public function getCampaignSchedules($data)
    {
        // Execute API call and return results
        return $this->call('getCampaignSchedules', $data);
    }

    /**
     * @param $action
     * @param $data
     * @return mixed
     * @throws \Exception
     */
    private function call($action, $data)
    {
        // Make sure minimum required properties are present
        //$this->validate_required_fields($action, $data);

        // Set API call URL
        $url = "https://panel.emercury.net/api-json.php";

        // Setup request data packet
        $request = [
            'request' => [
                "method" => $action,
                "mail" => $this->credentials['email'],
                "API_key" => $this->credentials['key'],
                "parameters" => $data
            ]
        ];

        // Build POST data
        $content = http_build_query(['request' => json_encode($request)]);

        // Set call context
        $context  = stream_context_create([
            'http' => [
                'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                'method'  => 'POST',
                'content' => $content
            ]
        ]);

        // Do POST and get results
        $result = json_decode(file_get_contents($url, false, $context));

        // TODO: emercury supports pushing multiple subscribers at once, which is nice, but it doesn't send back a code
        // TODO: for each one, so we have to do a text comparison on "Subscriber added successfully.", etc


        // Make sure he have a result
        if (empty($result)) {

            // Throw bad call exception
            throw new \Exception("API call failure. Please double check configuration values.");
        }

        // See if there was an error
        if (!empty($result->error)) {

            // Loop error
            foreach ($result->error as $code => $msg) {

                // Format and store current error for exception throw
                $error_msgs[] = "[{$code}]: $msg";
            }

            // Throw error exception
            throw new \Exception(implode(', ', $error_msgs));
        }

        // See if call was successful
        if (!empty($result->success)) {

            // Return success message
            return $result->success;
        }
    }

    /**
     * @param $subdomain
     * @param $action
     * @param $data
     * @return mixed
     */
    public static function api($subdomain, $action, $data)
    {
        // Instantiate EmercuryClient class
        $client = new self();

        // Set config values
        $client->subdomain = $subdomain;
        $client->credentials = [
            'api' => $data['key'],
            'hash' => $data['hash']
        ];

        // Execute API call and return results
        return $client->call($action, $data);
    }

    /**
     * @param $action
     * @param $data
     * @throws \Exception
     */
    private function validate_required_fields($action, $data)
    {
        // Make sure the action is valid
        if (!isset($this->required_properties->data[$action])) {

            // Throw invalid action exception
            throw new \Exception("'{$action}' is not a valid API action/call");
        }

        // Loop properties to validate required fields
        foreach ($this->required_properties->data[$action] as $prop) {

            // See if property is empty
            if (empty($data[$prop])) {

                // Throw required property exception
                throw new \Exception("'{$prop}' is a required property for '{$action}' call");
            }
        }

        // See if config data has been set
        if (empty($this->credentials)) {

            // Throw configuration exception
            throw new \Exception("API credentials or subdomain are not set. Please set during class instantiation or by using the configure() method.");
        }
    }
}