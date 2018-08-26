<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>Publish from GitHub</title>
</head>
<body>
<pre>

<?php

// Check whether client is allowed to trigger an update
$allowed_ips = array(
	'207.97.227.', '50.57.128.', '108.171.174.', '50.57.231.', '204.232.175.', '192.30.252.' // GitHub
);
$allowed = false;

$ip = $_SERVER['REMOTE_ADDR'];
foreach ($allowed_ips as $allow) {
    if (stripos($ip, $allow) !== false) {
        $allowed = true;
        break;
    }
}

if (!$allowed) {
?>
    You are not allowed to do this :P 
<?php
} else {

    $commands = array(
        'cd '.realpath(__DIR__.'/..').' && git pull',
        'cd '.realpath(__DIR__.'/..').' && git status',
        'cd '.realpath(__DIR__.'/..').' && git submodule sync',
        'cd '.realpath(__DIR__.'/..').' && git submodule update',
        'cd '.realpath(__DIR__.'/..').' && git submodule status',
    );

    $log = "####### ".date('Y-m-d H:i:s'). " #######\n";

    foreach($commands AS $command){
        // Run it
        exec($command,$out);
        $tmp = implode("\n",$out);
        // Output
        echo "<span>$</span> <span>{$command}\n</span>";
        echo htmlentities(trim($tmp)) . "\n";

        $log  .= "$ $command\n".trim($tmp)."\n";
    }

    $log .= "\n";

    file_put_contents ('git.log',$log,FILE_APPEND);

    // Set environment
    require_once(__DIR__ . '/../MVCFrame/App.php');
    MVCFrame\Environment::Load( __DIR__ . '/.environment' );
    if ( !MVCFrame\Environment::isProduction() )
        file_put_contents( __DIR__ . '/../.environment', 'production' );

}

?>

</pre>
</body>
</html>