<?php
require 'config.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>TODO APP</title>
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
    <div class="container">
      <div class="header">
        <h1>track your tasks</h1>
        <form action="addTodo.php" method="post">
          <div class="todo-input-box">
            <input
              type="text"
              id="todo"
              name="todo"
              placeholder="Your todo...."
            />
            <button type="submit" name="add_todo" class="btn add-btn">
              ADD
            </button>
          </div>
        </form>
      </div>
      <div class="body">
        <ul class="todos">
          <?php
            $sql = "SELECT * FROM todos";
            $res = mysqli_query($conn, $sql);

            if(mysqli_num_rows($res) > 0){
              while($row = mysqli_fetch_assoc($res)){
                ?>
                  <div <?php if( $row['status'] == 1){ ?>class="todo-item"<?php }else{ ?>class="complete"<?php } ?>>
                   <li><?= $row['content']; ?></li>
                   <form action="completeTodo.php" method="post">
                    <input type="hidden" name="id" value="<?= $row['id']; ?>">
                   <button type="submit" class="btn done-btn" name="done">done</button>
                   </form>
                  
                   <form action="deleteTodo.php" method="post">
                    <input type="hidden" name="id" value="<?= $row['id']; ?>">
                   <button type="submit" class="btn delete-btn" name="delete">delete</button>
                   </form>
                  </div>
                <?php
              }
            }else{
              echo "No todos availlable";
            }
          ?>

      </div>
      <div class="footer">
        <button class="btn mark-all-btn">mark all done</button>
        <form action="clearAll.php" method="post">
        <button type="submit" class="btn clear-btn" name="clear">clear</button><br />
        </form>
        
      </div>
      <span>SAMUEL SIMIYU @COPYRIGHT 2025</span>
    </div>
  </body>
</html>
