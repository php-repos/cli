#!/usr/bin/env php
<?php

namespace Tests\IO\ReadHelper;

use function PhpRepos\Cli\IO\Read\parameter;

echo parameter('email', 'default-email@phpkg.com');
