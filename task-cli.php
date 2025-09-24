<?php

// Define a constant for the tasks file path. This is better than using a string everywhere.
define('TASKS_FILE', 'tasks.json');

/**
 * Reads all tasks from the JSON file.
 *
 * @return array An array of tasks. Returns an empty array if the file doesn't exist.
 */
function getTasks(): array
{
    // If the file doesn't exist, there are no tasks yet.
    if (!file_exists(TASKS_FILE)) {
        return [];
    }

    // Read the file content.
    $json = file_get_contents(TASKS_FILE);

    // Decode the JSON string into a PHP associative array.
    return json_decode($json, true);
}

/**
 * Saves all tasks to the JSON file.
 *
 * @param array $tasks The array of tasks to save.
 * @return void
 */
function saveTasks(array $tasks): void
{
    // Encode the PHP array into a pretty-printed JSON string.
    $json = json_encode($tasks, JSON_PRETTY_PRINT);

    // Write the JSON string to the file.
    file_put_contents(TASKS_FILE, $json);
}


// --- Main Application Logic ---

// We need at least one argument (the command) to proceed.
// $argc is a special variable that holds the count of arguments.
if ($argc < 2) {
    echo "Usage: php task-cli.php [command] [options]\n";
    exit(1); // Exit with a non-zero status code to indicate an error
}

// The command is the second element in the $argv array.
$command = $argv[1];

// Use a switch statement to route to the correct logic based on the command.
switch ($command) {
    case 'add':
        require 'commands/add.php';
        break;

    case 'list':
        require 'commands/list.php';
        break;

    // We can add cases for other commands later.
    // e.g., update, delete, mark-done

    default:
        echo "Error: Unknown command '$command'.\n";
        exit(1);
}

// Exit with a zero status code to indicate success.
exit(0);