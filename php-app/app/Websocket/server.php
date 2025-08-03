<?php
/*Create a server variable with the link to the tcp IP and custom port you need to
specify the Homestead IP if you are using homestead or, for local environment using
WAMP, MAMP, ... use 127.0.0..1*/

date_default_timezone_set('America/Phoenix');
require_once __DIR__  .  '/../../vendor/autoload.php';

$server = new Hoa\Websocket\Server(
    new Hoa\Socket\Server('tcp://0.0.0.0:8889')
);

//Manages the message event to get send data for each client using the broadcast method
$server->on('message', function ( Hoa\Event\Bucket $bucket ) {
    $data = $bucket->getData();
    $bucket->getSource()->broadcast($data['message']);
    return;
});
//Execute the server
$server->run();
