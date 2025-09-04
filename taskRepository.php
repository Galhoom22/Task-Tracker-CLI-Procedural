<?php

// Load tasks from tasks.json
function loadTasks(): array {
    if (!file_exists('tasks.json')) {
        return [];
    }

    $jsonData = file_get_contents('tasks.json');
    $tasks = json_decode($jsonData, true);

    return $tasks ?? [];
}

// Save tasks into tasks.json
function saveTasks(array $tasks): void {
    $jsonData = json_encode($tasks, JSON_PRETTY_PRINT);
    file_put_contents('tasks.json', $jsonData);
}
