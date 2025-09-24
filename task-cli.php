<?php

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
        echo "Executing the 'add' command...\n";
        // Logic for adding a task will go here.
        break;

    case 'list':
        echo "Executing the 'list' command...\n";
        // Logic for listing tasks will go here.
        break;
    
    // We can add cases for other commands later.

    default:
        echo "Error: Unknown command '$command'.\n";
        exit(1);
}

// Exit with a zero status code to indicate success.
exit(0);