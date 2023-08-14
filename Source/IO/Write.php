<?php

namespace PhpRepos\Cli\IO\Write;

use function PhpRepos\TestRunner\Assertions\Boolean\assert_true;

/**
 * Output a message to the console.
 *
 * This function prints the provided message to the console without any additional formatting.
 *
 * @param string $message The message to be displayed.
 * @return void
 */
function output(string $message): void
{
    echo $message;
}

/**
 * Assert that the output matches the expected value.
 *
 * This function performs an assertion to check if the actual output matches the expected value.
 * If the assertion fails, an error message is provided as the second argument of assert_true().
 *
 * @param string $expected The expected output value.
 * @param string $actual The actual output value.
 * @return bool Whether the assertion passed (true) or failed (false).
 */
function assert_output(string $expected, string $actual): bool
{
    return assert_true($actual === $expected, "Can not see '$expected' in '$actual'.");
}

/**
 * Output a line of text to the console with default text color.
 *
 * This function prints a line of text to the console, with default text color (reset to normal).
 *
 * @param string $string The text to be displayed.
 * @return void
 */
function line(string $string): void
{
    output("\e[39m$string" . PHP_EOL);
}

/**
 * Assert that the output line matches the expected value with default text color.
 *
 * This function performs an assertion to check if the actual output line (with default text color)
 * matches the expected value. If the assertion fails, an error message is provided as the second
 * argument of assert_true().
 *
 * @param string $expected The expected output line.
 * @param string $actual The actual output value.
 * @return bool Whether the assertion passed (true) or failed (false).
 */
function assert_line(string $expected, string $actual): bool
{
    return assert_output("\e[39m$expected" . PHP_EOL, $actual);
}

/**
 * Output a success message to the console with green text color.
 *
 * This function prints a success message to the console with green text color, indicating a successful operation.
 *
 * @param string $string The success message to be displayed.
 * @return void
 */
function success(string $string): void
{
    output("\e[92m$string\e[39m" . PHP_EOL);
}

/**
 * Assert that the success message matches the expected value with green text color.
 *
 * This function performs an assertion to check if the actual success message (with green text color)
 * matches the expected value. If the assertion fails, an error message is provided as the second
 * argument of assert_true().
 *
 * @param string $expected The expected success message.
 * @param string $actual The actual output value.
 * @return bool Whether the assertion passed (true) or failed (false).
 */
function assert_success(string $expected, string $actual): bool
{
    return assert_output("\e[92m$expected\e[39m" . PHP_EOL, $actual);
}

/**
 * Output an error message to the console with red text color.
 *
 * This function prints an error message to the console with red text color, indicating an error condition.
 *
 * @param string $string The error message to be displayed.
 * @return void
 */
function error(string $string): void
{
    output("\e[91m$string\e[39m" . PHP_EOL);
}

/**
 * Assert that the error message matches the expected value with red text color.
 *
 * This function performs an assertion to check if the actual error message (with red text color)
 * matches the expected value. If the assertion fails, an error message is provided as the second
 * argument of assert_true().
 *
 * @param string $expected The expected error message.
 * @param string $actual The actual output value.
 * @return bool Whether the assertion passed (true) or failed (false).
 */
function assert_error(string $expected, string $actual): bool
{
    return assert_output("\e[91m$expected\e[39m"  . PHP_EOL, $actual);
}
