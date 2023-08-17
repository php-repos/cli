<?php

namespace PhpRepos\Cli\IO\Read;

/**
 * Get a specific command-line argument by its position.
 *
 * This function retrieves a command-line argument based on its position, allowing you
 * to access arguments passed to the script. You can specify a default value that will
 * be returned if the argument is not provided.
 *
 * @param int $number The position of the argument (0-based).
 * @param string|null $default The default value if the argument is not provided.
 * @return string|null The value of the specified argument or the default value if not provided.
 */
function argument(int $number, ?string $default = null): ?string
{
    global $argv;

    $inputs = [];

    foreach ($argv as $userInput) {
        if (! str_starts_with($userInput, '-')) {
            $inputs[] = $userInput;
        }
    }

    unset($inputs[0]); // Remove script name

    return $inputs[$number] ?? $default;
}

/**
 * Get the main command from the command-line arguments.
 *
 * This function helps you retrieve the main command passed to the script, excluding
 * any options or other arguments. It is useful when you want to determine the primary
 * action that the script should take.
 *
 * @return string|null The main command or null if not provided.
 */
function command(): ?string
{
    global $argv;

    // Skip the script name (index 0) and return the first non-option argument
    foreach ($argv as $index => $argument) {
        if ($index === 0) {
            continue;
        }

        if (!str_starts_with($argument, '-')) {
            return $argument;
        }
    }

    return null;
}

/**
 * Get a specific named parameter from the command-line arguments.
 *
 * This function allows you to retrieve a named parameter from the command-line
 * arguments using the double-dash format, e.g., "--param=value". You can specify
 * a default value that will be returned if the parameter is not provided.
 *
 * @param string $name The name of the parameter (without leading dashes).
 * @param string|null $default The default value if the parameter is not provided.
 * @return string|null The value of the specified parameter or the default value if not provided.
 */
function parameter(string $name, ?string $default = null): ?string
{
    $input = getopt('', [$name . '::']);

    if (count($input) === 0) {
        global $argv;

        // Search for the named parameter and extract its value
        $input = array_reduce($argv, function ($carry, $argument) use ($name) {
            return str_starts_with($argument, "--$name=")
                ? [$name => str_replace("--$name=", '', $argument)]
                : $carry;
        }, []);
    }

    return $input[$name] ?? $default;
}

/**
 * Check if a specific named option is present in the command-line arguments.
 *
 * This function allows you to check whether a named option (flag) is present
 * in the command-line arguments. The option can be specified using single or
 * double dashes (e.g., "--flag" or "-f").
 *
 * @param string $name The name of the option (without leading dashes).
 * @return bool Whether the specified option is present.
 */
function option(string $name): bool
{
    global $argv;

    // Check if the option is present in any of the arguments
    foreach ($argv as $input) {
        if (
            $input === '--' . $name
            || str_starts_with($input, '--' . $name . '=')
            || $input === '-' . $name
        ) {
            return true;
        }
    }

    return false;
}
