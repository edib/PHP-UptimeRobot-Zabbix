<?php
//Requires composer install to work
require_once(__DIR__.'/vendor/autoload.php');

use UptimeRobot\API;

//Set configuration settings
$config = [
    'apiKey' => '',
    'url' => 'https://api.uptimerobot.com'
];

try {

    //Initalizes API with config options
    $api = new API($config);

    //Define parameters for our getMethod request
    $args = [
        'showTimezone' => 3
    ];

    //Makes request to the getMonitor Method
    $results = $api->request('/getMonitors', $args);
    
    // Make sure there is a parameter to check the single monitor.	
    if ($argc > 1):
      foreach ($results['monitors']['monitor'] as $monitor) {
        if ($monitor['friendlyname'] === $argv[1]) echo $monitor['status'];
      }
    // List all monitors 
    else:
      $data = "";
      foreach ($results['monitors']['monitor'] as $monitor) {
        $data .= "{\"{#MONITOR}\":\"".$monitor['friendlyname']."\"},";
      }
      echo "{\"data\":[".rtrim($data,',')."]}";
    endif;

} catch (Exception $e) {
    echo $e->getMessage();
    //Output various debug information
    var_dump($api->debug);
}
