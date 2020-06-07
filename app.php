<?php

require __DIR__ . '/vendor/autoload.php';

use Symfony\Component\Console\Application;
use App\Command\{InstallFakeAppCommand, PrintRandomDataCommand};

$application = new Application();
$application->addCommands([new InstallFakeAppCommand(), new PrintRandomDataCommand()]);
$application->run();
