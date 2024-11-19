<?php
require 'db.php';


$stmt = $pdo->query("SELECT * FROM tasks ORDER BY id DESC");
$tasks = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-Do List</title>
    
      <style> 
  * {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
    font-family: 'Verdana', sans-serif;
}


body {
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    background-color: #e3f2fd; 
    padding: 20px;
    color: #333;
}


.container {
    background: linear-gradient(145deg, #cfe9fc, #f0f9ff);
    border-radius: 25px;
    box-shadow: 15px 15px 30px rgba(0, 0, 255, 0.2), -15px -15px 30px rgba(255, 255, 255, 0.7); 
    padding: 50px 40px;
    width: 90%;
    max-width: 700px; 
    text-align: center;
}


h1 {
    font-size: 30px;
    font-weight: bold;
    color: #1565c0;
    text-transform: uppercase;
    margin-bottom: 25px;
    position: relative;
}

h1::after {
    content: '';
    display: block;
    width: 100px;
    height: 4px;
    background-color: #42a5f5; 
    margin: 12px auto 0;
    border-radius: 2px;
}


form {
    display: grid;
    grid-template-columns: 1fr auto;
    gap: 15px;
    align-items: center;
    margin-bottom: 40px;
}

input[type="text"] {
    width: 100%;
    padding: 16px;
    border: none;
    border-radius: 10px;
    background: linear-gradient(145deg, #e3f4fe, #cde8f9); 
    box-shadow: inset 5px 5px 10px rgba(0, 0, 0, 0.1), inset -5px -5px 10px rgba(255, 255, 255, 0.7);
    font-size: 18px;
    color: #1565c0;
    transition: all 0.3s ease;
}

input[type="text"]:focus {
    outline: none;
    background: linear-gradient(145deg, #d8effb, #bbdef9); 
    box-shadow: inset 2px 2px 5px rgba(0, 0, 0, 0.1), inset -2px -2px 5px rgba(255, 255, 255, 0.7);
}


button {
    padding: 16px 24px;
    border: none;
    border-radius: 12px;
    background: linear-gradient(145deg, #42a5f5, #64b5f6); 
    color: #ffffff;
    font-size: 16px;
    font-weight: bold;
    text-transform: uppercase;
    box-shadow: 5px 5px 15px rgba(0, 0, 255, 0.3), -5px -5px 15px rgba(255, 255, 255, 0.7);
    cursor: pointer;
    transition: all 0.3s ease;
}

button:hover {
    background: linear-gradient(145deg, #1565c0, #1e88e5); 
    transform: translateY(-3px);
    box-shadow: 3px 3px 10px rgba(0, 0, 255, 0.3), -3px -3px 10px rgba(255, 255, 255, 0.7);
}


.task-list {
    list-style: none;
    padding: 0;
    margin: 25px 0;
}

.task {
    background: linear-gradient(145deg, #e3f4fe, #cde8f9); 
    border-radius: 12px;
    box-shadow: 10px 10px 20px rgba(0, 0, 255, 0.2), -10px -10px 20px rgba(255, 255, 255, 0.7); 
    padding: 20px;
    margin-bottom: 20px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.task:hover {
    transform: translateY(-3px);
    box-shadow: 5px 5px 15px rgba(0, 0, 255, 0.3), -5px -5px 15px rgba(255, 255, 255, 0.7);
}


.task span {
    font-size: 16px;
    color: #1976d2; 
    text-align: left;
    flex: 1;
    margin-right: 15px;
}


.buttons {
    display: flex;
    gap: 10px;
}

.edit-btn,
.delete-btn {
    padding: 10px 14px;
    font-size: 14px;
    border: none;
    border-radius: 10px;
    font-weight: bold;
    text-transform: uppercase;
    color: #ffffff;
    cursor: pointer;
    transition: all 0.3s ease;
    box-shadow: 5px 5px 10px rgba(0, 0, 255, 0.3), -5px -5px 10px rgba(255, 255, 255, 0.7);
}

.delete-btn {
    background: linear-gradient(145deg, #1976d2, #2196f3);
}

.delete-btn:hover {
    background: linear-gradient(145deg, #1565c0, #1e88e5);
    transform: translateY(-3px);
}
  </style>
  
</head>
<body>
    <div class="container">
        <h1>To-Do List</h1>
        <form action="add_task.php" method="post">
            <input type="text" name="task" placeholder="Add a new task..." required>
            <button type="submit">Add Task</button>
        </form>
           <ul class="task-list">
            <?php foreach ($tasks as $task): ?>
                <li class="task">
                    <span><?php echo htmlspecialchars($task['task']); ?></span>
                    <div class="buttons">
                      <a href="edit_task.php?id=<?php echo $task['id']; ?>" class="edit-btn">Edit</a>
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</body>
</html>