# 📝 PHP Task Tracker CLI

CLI app to manage tasks using **procedural PHP** + `tasks.json` (no frameworks, no dependencies).

---

## ✨ Features
- ➕ Add, ✏️ Update, ❌ Delete tasks  
- 📋 List all / filter by `todo` | `in-progress` | `done`  
- 🔄 Mark tasks as in-progress or done  
- 💾 Data stored in `tasks.json`  

---

## 🔧 Prerequisites
- PHP **7.4+**  
- No external dependencies  

---

## 🚀 Usage
All commands run via:

```bash
php task-cli.php <command> [options]

```

## Examples:

# Add task
php task-cli.php add "My new task"

# List tasks
php task-cli.php list
php task-cli.php list todo

# Update task
php task-cli.php update <TASK_ID> "Updated description"

# Change status
php task-cli.php progress <TASK_ID>
php task-cli.php done <TASK_ID>

# Delete task
php task-cli.php delete <TASK_ID>

## ⚙️ Technical

Paradigm: Procedural PHP

Storage: File-based (tasks.json)

## 🔗 Project URL
[Task Tracker CLI Procedural](https://roadmap.sh/projects/task-tracker)
