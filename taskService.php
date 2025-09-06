<?php

require_once 'taskRepository.php';

/**
 * Add a new task
 */
function addTask(string $description): void {
    $tasks = loadTasks();

    $lastId = !empty($tasks) ? max(array_column($tasks, 'id')) : 0;

    $newTask = [
        'id' => $lastId + 1,
        'description' => $description,
        'status' => 'todo',
        'createdAt' => date('Y-m-d H:i:s'),
        'updatedAt' => date('Y-m-d H:i:s')
    ];

    $tasks[] = $newTask;
    saveTasks($tasks);

    echo "✅ Task added successfully: {$description}\n";
}