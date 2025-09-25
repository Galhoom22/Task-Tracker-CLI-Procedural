<?php

// 1. Check if the task ID is provided.
if (!isset($argv[2])) {
    echo "Error: Missing task ID for 'delete' command.\n";
    echo "Usage: php task-cli.php delete <task_id>\n";
    exit(1);
}

// 2. Get the task ID and cast it to an integer.
$taskId = (int)$argv[2];

// 3. Load all tasks.
$tasks = getTasks();

// 4. Find the task and its index.
$taskIndex = -1;
foreach ($tasks as $index => $task) {
    if ($task['id'] === $taskId) {
        $taskIndex = $index;
        break; // Found it, no need to continue looping.
    }
}

// 5. If task was not found, show an error.
if ($taskIndex === -1) {
    echo "Error: Task with ID '$taskId' not found.\n";
    exit(1);
}

// 6. Remove the task from the array using its index.
unset($tasks[$taskIndex]);

// IMPORTANT: Re-index the array to prevent issues with future additions.
$tasks = array_values($tasks);

// 7. Save the smaller array back to the file.
saveTasks($tasks);

echo "🗑️  Task $taskId has been deleted successfully.\n";