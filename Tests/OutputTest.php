<?php

namespace Tests\OutputTest;

use function PhpRepos\Cli\Output\capture;
use function PhpRepos\TestRunner\Assertions\assert_true;
use function PhpRepos\TestRunner\Runner\test;

test(
    title: 'it should capture the output',
    case: function () {
        $output = capture(function () {
            echo 'Hello ';
            echo PHP_EOL;
            printf(" %s", 'World');
        });

        assert_true("Hello \n World" === $output);
    }
);
