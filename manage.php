<?php include ('./conn/conn.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Menu and Pricing Portal | Ardhi</title>

    <!-- Style CSS -->
    <link rel="stylesheet" href="./assets/style.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <style>
    body{
      background-image: url('images/background.jpg');
    }
  </style>
</head>
<body>
    
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand ml-5" href="gallery.html">Food Menu and Pricing Portal</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarScroll">
            <ul class="navbar-nav mr-auto my-2 my-lg-0 navbar-nav-scroll" style="max-height: 100px; margin-left: 80%;">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                My Account
                </a>
                <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="logout.php">Log Out</a></li>
                </ul>
            </li>

            </ul>

        </div>
    </nav>

    <!-- Update Modal -->
    <div class="modal fade mt-5" id="updateUserModal" tabindex="-1" aria-labelledby="updateUser" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateUserModal">Update User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="./endpoint/update-user.php" method="POST">
                        
                        <div class="form-group row">
                            
                            <div class="col-7">
                                <label for="updateEmail">Email:</label>
                                <input type="text" class="form-control" id="updateEmail" name="email">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="updateUsername">Username:</label>
                            <input type="text" class="form-control" id="updateUsername" name="username">
                        </div>
                        <div class="form-group">
                            <label for="updatePassword">Password:</label>
                            <input type="text" class="form-control" id="updatePassword" name="password">
                        </div>
                        <button type="submit" class="btn btn-dark login-register form-control">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <div class="main">
        <div class="content">
            <h4>List of users</h4>
            <hr>
            <table class="table table-hover table-collapse">
                <thead>
                    <tr>
                    <th scope="col">User ID</th>
                    <th scope="col">Username</th>
                    <th scope="col">Email</th>
                    <th scope="col">Password</th>
                    <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>

                    <?php 
                    
                        $stmt = $conn->prepare("SELECT * FROM `tbl_users`");
                        $stmt->execute();

                        $result = $stmt->fetchAll();

                        foreach ($result as $row) {
                            $userID = $row['id'];
                            $username = $row['username'];
                            $email = $row['email'];
                            $password = $row['password'];

                        ?>

                        <tr>
                            <td id="userID-<?= $userID ?>"><?php echo $userID ?></td>
                            <td id="username-<?= $userID ?>"><?php echo $username ?></td>
                            <td id="email-<?= $userID ?>"><?php echo $email ?></td>
                            <td id="password-<?= $userID ?>"><?php echo $password ?></td>
                            <td>
                                <button id="editBtn" onclick="update_user(<?php echo $userID ?>)" title="Edit">&#9998;</button>
                                <button id="deleteBtn" onclick="delete_user(<?php echo $userID ?>)">&#128465;</button>
                            </td>
                        </tr>    

                        <?php
                        }

                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <script>
        // Update user
        function update_user(id) {
            $("#updateUserModal").modal("show");

            let updateUserID = $("#userID-" + id).text();
            let updateFirstName = $("#firstName-" + id).text();
            let updateLastName = $("#lastName-" + id).text();
            let updateContactNumber = $("#contactNumber-" + id).text();
            let updateEmail = $("#email-" + id).text();
            let updateUsername = $("#username-" + id).text();
            let updatePassword = $("#password-" + id).text();

            console.log(updateFirstName);
            console.log(updateLastName);

            $("#updateUserID").val(updateUserID);
            $("#updateFirstName").val(updateFirstName);
            $("#updateLastName").val(updateLastName);
            $("#updateContactNumber").val(updateContactNumber);
            $("#updateEmail").val(updateEmail);
            $("#updateUsername").val(updateUsername);
            $("#updatePassword").val(updatePassword);

        }

        // Delete user
        function delete_user(id) {
            if (confirm("Do you want to delete this user?")) {
                window.location = "./endpoint/delete-user.php?user=" + id;
            }
        }


    </script>
    
    <!-- Bootstrap Js -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"></script>
</body>
</html>