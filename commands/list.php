<?php

// 1. Check for an optional filter status from the arguments.
$filterStatus = null;
if (isset($argv[2])) {
    $allowedFilters = ['todo', 'in-progress', 'done'];
    if (in_array($argv[2], $allowedFilters)) {
        $filterStatus = $argv[2];
    } else {
        echo "Error: Invalid status filter '{$argv[2]}'. Allowed filters are: todo, in-progress, done.\n";
        exit(1);
    }
}

// 2. Load all tasks from the JSON file.
$tasks = getTasks();

// 3. If a filter is set, filter the tasks array.
if ($filterStatus) {
    $tasks = array_filter($tasks, function ($task) use ($filterStatus) {
        return $task['status'] === $filterStatus;
    });
}

// 4. Check if there are any tasks to display (after filtering).
if (empty($tasks)) {
    $message = $filterStatus 
        ? "No tasks found with status '$filterStatus'.\n" 
        : "Looks like you're all caught up! No tasks found. 🎉\n";
    echo $message;
    exit(0);
}

// 5. If there are tasks, display them in a formatted table.
echo "======================================================================\n";
// Adjust padding to accommodate 'in-progress' status
printf("%-4s | %-15s | %s\n", "ID", "Status", "Description");
echo "======================================================================\n";

foreach ($tasks as $task) {
    printf("%-4d | %-15s | %s\n", $task['id'], $task['status'], $task['description']);
}

echo "======================================================================\n";