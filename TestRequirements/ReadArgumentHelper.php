#!/usr/bin/env php
<?php

namespace Tests\IO\ReadHelper;

use function PhpRepos\Cli\IO\Read\parameter;
use function PhpRepos\Cli\IO\Read\argument;

$number = parameter('number');

echo argument($number, 'default-value');
