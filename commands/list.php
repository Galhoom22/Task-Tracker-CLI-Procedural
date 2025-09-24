<?php

// 1. Load all tasks from the JSON file.
$tasks = getTasks();

// 2. Check if there are any tasks to display.
if (empty($tasks)) {
    echo "Looks like you're all caught up! No tasks found. 🎉\n";
    exit(0);
}

// 3. If there are tasks, display them in a formatted table.
echo "==================================================\n";
echo "ID   | Status          | Description\n";
echo "==================================================\n";

foreach ($tasks as $task) {
    // printf is used for formatted output to align columns nicely.
    // %-4d: An integer, left-aligned, with a padding of 4 characters.
    // %-15s: A string, left-aligned, with a padding of 15 characters.
    // %s: A regular string.
    printf("%-4d | %-15s | %s\n", $task['id'], $task['status'], $task['description']);
}

echo "==================================================\n";