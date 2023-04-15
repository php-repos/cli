#!/usr/bin/env php
<?php

namespace Tests\IO\WriteHelper;

use function PhpRepos\Cli\IO\Read\parameter;
use function PhpRepos\Cli\IO\Write\error;
use function PhpRepos\Cli\IO\Write\line;
use function PhpRepos\Cli\IO\Write\output;
use function PhpRepos\Cli\IO\Write\success;

$function = parameter('function');
$message = parameter('message');

switch ($function) {
    case 'output':
        output($message);
        break;
    case 'line':
        line($message);
        break;
    case 'success':
        success($message);
        break;
    case 'error':
        error($message);
        break;
    default:
        echo 'function does not exist!';
        break;
}

