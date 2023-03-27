<?php

namespace PhpRepos\Cli\IO\Write;

use function PhpRepos\TestRunner\Assertions\Boolean\assert_true;

function output(string $message): void
{
    echo $message;
}

function assert_output(string $expected, string $actual): bool
{
    return assert_true($actual === $expected, "Can not see '$expected' in '$actual'.");
}

function line(string $string): void
{
    output("\e[39m$string" . PHP_EOL);
}

function assert_line(string $expected, string $actual): bool
{
    $expected = "\e[39m$expected" . PHP_EOL;

    return assert_output($expected, $actual);
}

function success(string $string): void
{
    output("\e[92mSuccess: $string\e[39m" . PHP_EOL);
}

function assert_success(string $expected, string $actual): bool
{
    $expected = "\e[92mSuccess: $expected\e[39m" . PHP_EOL;

    return assert_output($expected, $actual);
}

function error(string $string): void
{
    output("\e[91mError: $string\e[39m" . PHP_EOL);
}

function assert_error(string $expected, string $actual): bool
{
    $expected = "\e[91mError: $expected\e[39m" . PHP_EOL;

    return assert_output($expected, $actual);
}
