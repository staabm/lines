<?php

namespace Lines202307;

use Lines202307\Symfony\Component\Console\Application;
use Lines202307\Symfony\Component\Console\Input\ArgvInput;
use Lines202307\Symfony\Component\Console\Output\ConsoleOutput;
use Lines202307\TomasVotruba\Lines\Console\Command\MeasureCommand;
if (\file_exists(__DIR__ . '/../vendor/scoper-autoload.php')) {
    // A. build downgraded package
    require_once __DIR__ . '/../vendor/scoper-autoload.php';
} else {
    // B. local repository
    require_once __DIR__ . '/../vendor/autoload.php';
}
$application = new Application();
$application->add(new MeasureCommand());
$input = new ArgvInput();
$output = new ConsoleOutput();
$exitCode = $application->run($input, $output);
exit($exitCode);
