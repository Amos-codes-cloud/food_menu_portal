<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List of Messages</title>
    <link rel="stylesheet" href="./assets/style.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
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





<div class="main">
    <div class="content">
        <h4>List of Messages</h4>
        <hr>
        <table class="table table-hover table-collapse">
            <thead>
                <tr>
                    <th scope="col">Message ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Subject</th>
                    <th scope="col">Message</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Database credentials
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "food_menu_db";

                // Create connection
                $conn = new mysqli($servername, $username, $password, $dbname);

                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                // Prepare and execute the query
                $stmt = $conn->prepare("SELECT * FROM `tbl_contact`");
                $stmt->execute();
                $result = $stmt->get_result();

                // Fetch the results and display in the table
                while ($row = $result->fetch_assoc()) {
                    $messageID = $row['id'];
                    $name = $row['name'];
                    $email = $row['email'];
                    $subject = $row['subject'];
                    $message = $row['message'];
                ?>
                    <tr>
                        <td><?php echo htmlspecialchars($messageID); ?></td>
                        <td><?php echo htmlspecialchars($name); ?></td>
                        <td><?php echo htmlspecialchars($email); ?></td>
                        <td><?php echo htmlspecialchars($subject); ?></td>
                        <td><?php echo htmlspecialchars($message); ?></td>
                    </tr>
                <?php
                }

                // Close the statement and connection
                $stmt->close();
                $conn->close();
                ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Include Bootstrap JS and jQuery -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
