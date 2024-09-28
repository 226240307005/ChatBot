<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Update Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> <!-- SweetAlert library -->
  </head>
  <body>
    <?php
    include "db_conn_chatbot.php";

    $sql="SELECT * FROM commands";
    $query=mysqli_query($conn, $sql);

    if(mysqli_num_rows($query) > 0)
    {
      echo "<center>";
      echo "<div class='table-responsive-md container'>";
      echo "<table class='table table-hover table-responsive-xl table-bordered border-dark table-striped'>";
      echo "<tr class='table-dark'><th>User</th><th>Bot</th></tr>";
      echo "<form action='' method='POST'>";

      while ($row = mysqli_fetch_assoc($query)) {
          echo "<tr>";
          echo "<td>" . htmlspecialchars($row['user']) . "</td>";
          echo "<td>";
          echo "<div class='d-flex'>";
          echo "<input type='text' class='form-control me-2' name='bot_chat' placeholder='Enter Bot Response' value='" . htmlspecialchars($row['bot']) . "'>";
          echo "<button class='btn btn-primary' type='submit' name='update' value='" . $row['id'] . "'>Submit</button>";
          echo "</div>";
          echo "</td>";
          echo "</tr>";
      }

      echo "</table>"; 
      echo "</form>";
      echo "</div>";
      echo "</center>";
    }
    ?>

    <?php
    if(isset($_POST['update']))
    {
      $bot = $_POST['bot_chat'];
      $response = $_POST['update'];
     
      $sql_update = "UPDATE commands SET bot='$bot' WHERE id='$response'";
      $query_update = mysqli_query($conn, $sql_update);

      if($query_update)
      {
        echo "<script>
          Swal.fire({
            icon: 'success',
            title: 'Success!',
            text: 'Bot response updated successfully!',
            confirmButtonText: 'OK'
          });
        </script>";
      }
    }
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
