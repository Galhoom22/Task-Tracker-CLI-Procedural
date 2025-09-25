<?php

// 1. Check if the task ID argument is provided.
if (!isset($argv[2])) {
    echo "Error: Missing task ID for 'progress' command.\n";
    echo "Usage: php task-cli.php progress <task_id>\n";
    exit(1);
}

// 2. Get the task ID from the arguments and make sure it's an integer.
$taskId = (int)$argv[2];

// 3. Load all tasks.
$tasks = getTasks();

// 4. Find the task with the given ID.
$taskFound = false;
foreach ($tasks as $index => $task) {
    if ($task['id'] === $taskId) {
        // 5. If found, update its status and updatedAt timestamp.
        $tasks[$index]['status'] = 'in-progress';
        $tasks[$index]['updatedAt'] = date('c');
        $taskFound = true;
        break; // Exit the loop once the task is found and updated.
    }
}

// 6. If the task ID was not found after the loop, show an error.
if (!$taskFound) {
    echo "Error: Task with ID '$taskId' not found.\n";
    exit(1);
}

// 7. Save the modified tasks array back to the file.
saveTasks($tasks);

echo "🏃 Task $taskId is now in progress.\n";