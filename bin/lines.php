<?php

namespace Lines202307;

use Lines202307\Symfony\Component\Console\Application;
use Lines202307\Symfony\Component\Console\Input\ArgvInput;
use Lines202307\Symfony\Component\Console\Output\ConsoleOutput;
use Lines202307\TomasVotruba\Lines\Console\Command\MeasureCommand;
$loaded = \false;
foreach (array(__DIR__ . '/../../../autoload.php', __DIR__ . '/../vendor/autoload.php') as $filePath) {
    if (\file_exists($filePath)) {
        require $filePath;
        $loaded = \true;
        break;
    }
}
if (!$loaded) {
    die('You need to set up the project dependencies using the following commands:' . \PHP_EOL . 'wget http://getcomposer.org/composer.phar' . \PHP_EOL . 'php composer.phar install' . \PHP_EOL);
}
$application = new Application();
$application->add(new MeasureCommand());
$input = new ArgvInput();
$output = new ConsoleOutput();
$exitCode = $application->run($input, $output);
exit($exitCode);
