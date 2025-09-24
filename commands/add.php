<?php

// 1. Check if the task description argument is provided.
if (!isset($argv[2])) {
    echo "Error: Missing task description for 'add' command.\n";
    echo "Usage: php task-cli.php add \"Your task description\"\n";
    exit(1);
}

// 2. Get the task description from the command line arguments.
$description = $argv[2];

// 3. Load the existing tasks from the JSON file.
$tasks = getTasks();

// 4. Determine the ID for the new task.
$lastTask = end($tasks); 
$newId = $lastTask ? $lastTask['id'] + 1 : 1;

// 5. Create the new task array with all its properties.
$newTask = [
    'id' => $newId,
    'description' => $description,
    'status' => 'todo', 
    'createdAt' => date('c'), // 'c' format is ISO 8601 date format.
    'updatedAt' => date('c'),
];

// 6. Add the new task to the end of the tasks array.
$tasks[] = $newTask;

// 7. Save the entire (now modified) array back to the JSON file.
saveTasks($tasks);

echo "✅ Task added successfully with ID: $newId\n";