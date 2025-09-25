<?php

// 1. Check if both the task ID and the new description are provided.
if (!isset($argv[2]) || !isset($argv[3])) {
    echo "Error: Missing arguments for 'update' command.\n";
    echo "Usage: php task-cli.php update <task_id> \"New description\"\n";
    exit(1);
}

// 2. Get the arguments.
$taskId = (int)$argv[2];
$newDescription = $argv[3];

// 3. Load all tasks.
$tasks = getTasks();

// 4. Find the task with the given ID.
$taskFound = false;
foreach ($tasks as $index => $task) {
    if ($task['id'] === $taskId) {
        // 5. If found, update its description and updatedAt timestamp.
        $tasks[$index]['description'] = $newDescription;
        $tasks[$index]['updatedAt'] = date('c');
        $taskFound = true;
        break; // Exit the loop once the task is found and updated.
    }
}

// 6. If the task ID was not found, show an error.
if (!$taskFound) {
    echo "Error: Task with ID '$taskId' not found.\n";
    exit(1);
}

// 7. Save the modified tasks array back to the file.
saveTasks($tasks);

echo "🔄 Task $taskId has been updated successfully.\n";