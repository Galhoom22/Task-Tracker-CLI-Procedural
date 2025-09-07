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

/**
 * Update a task description
 */
function updateTask(int $id, string $newDescription): void {
    $tasks = loadTasks();
    foreach ($tasks as &$task) {
        if ($task['id'] === $id) {
            $task['description'] = $newDescription;
            $task['updatedAt'] = date('Y-m-d H:i:s');
            saveTasks($tasks);
            echo "✏️ Task [{$id}] updated successfully\n";
            return;
        }
    }
    echo "⚠️ Task with ID {$id} not found\n";
}