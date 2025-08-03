<?php

//testing script .. remove this line lata 

$secret = 'lazy-dog-secret-key-123-*!*';
$headers = getallheaders();
$hubSignature = $headers['X-Hub-Signature'];
 
// Split signature into algorithm and hash
list($algo, $hash) = explode('=', $hubSignature, 2);
 
// Get payload
$payload = file_get_contents('php://input');
 
// Calculate hash based on payload and the secret
$payloadHash = hash_hmac($algo, $payload, $secret);
 
// Check if hashes are equivalent
if ($hash !== $payloadHash) {
    // Kill the script or do something else here.
    die('Bad secret');
}
 
 
// Your code here.
$data = json_decode($payload);

$commands = array(
    'php /var/www/html/artisan down',
    'git pull origin master',
    'php /var/www/html/artisan migrate --force',
    'php /var/www/html/artisan up'
);
// Run the commands for output
$output = '';
foreach($commands AS $command){
    // Run it
    $tmp = shell_exec($command);
    // Output
    $output .= "<span style=\"color: #6BE234;\">\$</span> <span style=\"color: #729FCF;\">{$command}\n</span>";
    $output .= htmlentities(getcwd()) . "\n";
    $output .= htmlentities(trim($tmp)) . "\n";
}
// Make it pretty for manual user access (and why not?)
?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
        <meta charset="UTF-8">
        <title>GIT DEPLOYMENT SCRIPT</title>
</head>
<body style="background-color: #000000; color: #FFFFFF; font-weight: bold; padding: 0 10px;">
<pre>
 <?php echo $output; ?>
</pre>
</body>
</html>