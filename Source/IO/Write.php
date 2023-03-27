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
    $message = PHP_OS === 'WINNT' ? $string : "\e[39m$string";
    output($message . PHP_EOL);
}

function assert_line(string $expected, string $actual): bool
{
    $expected = PHP_OS === 'WINNT' ? $expected : "\e[39m$expected";

    return assert_output($expected . PHP_EOL, $actual);
}

function success(string $string): void
{
    $message = PHP_OS === 'WINNT' ? "Success: $string" : "\e[92mSuccess: $string\e[39m";
    output($message . PHP_EOL);
}

function assert_success(string $expected, string $actual): bool
{
    $expected = PHP_OS === 'WINNT' ? "Success: $expected" : "\e[92mSuccess: $expected\e[39m";

    return assert_output($expected . PHP_EOL, $actual);
}

function error(string $string): void
{
    $message = PHP_OS === 'WINNT' ? "Error: $string" : "\e[91mError: $string\e[39m";
    output($message . PHP_EOL);
}

function assert_error(string $expected, string $actual): bool
{
    $expected = PHP_OS === 'WINNT' ? "Error: $expected" : "\e[91mError: $expected\e[39m";

    return assert_output($expected  . PHP_EOL, $actual);
}
