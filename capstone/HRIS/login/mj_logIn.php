<?php

include('connection.php'); // to connect to database

session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="shortcut icon" href="RGEM.png" type="image/x-icon">
    <link rel="stylesheet" href="../login/css/logIn.css">
</head>

<body>
    <div class="container">
        <div class="logInContainer">
            <div class="logoContainer">
                <img src="RGEM.png" alt="" class="logo">
                <h3>Login</h3>
            </div>
            <di class="login">
                <div class="inputform">

                    <?php

                    $idNumber = "";
                    $password = "";
                    if (isset($_POST['login'])) {

                        $userName = $_POST['userName'];
                        $password = $_POST['password'];

                        $sql = "SELECT * FROM hr_employeeinfo WHERE userName = '" . $userName . "'  AND password = '" . $password . "' ";
                        $query = $connectionString->query($sql);

                        $_SESSION['idNumber'] = $idNumber;



                        if ($query->num_rows > 0) {
                            $row = $query->fetch_assoc();
                            $idNumber = $row['idNumber'];
                            $_SESSION['idNumber'] = $idNumber;
                            echo '<div id="myModal" class="modal">
                            <div class="modal-content">
                                <p class="text" style = "font-size: 1.5rem;">Successfully Log In</p>
                                <div class="linkContainer">
                                    <a href = "mj_mainPage.php" id = "go">Okay</a>
                                </div>
                            </div>
                        </div>';
                        } else {
                            echo '<div id="myModal" class="modal">
                            <div class="modal-content">
                                <p class="text" style = "font-size: 1rem;">Incorrect Username or Password. </p>
                                <p style="text-align: center;">Please try again.</p>
                                <div class="buttonContainer">
                                    <button id="close">Okay</button>
                                </div>
                            </div>
                        </div>';
                        }
                    }
                    ?>
                    <form action="" method="post" id="form"></form>
                    <input type="text" name="userName" class="input" form="form" placeholder="ID Number" required><br>
                    <input type="password" name="password" class="input" form="form" placeholder="Password" required>
                </div>
                <input type="submit" value="Login" form="form" name="login" class="btn">


        </div>
    </div>

    </div>


    <script>
        // Get the modal
        var modal = document.getElementById("myModal");

        // modal variable
        let okay = document.getElementById("close");

        // display modal when there is incorrect input
        modal.style.display = "block";


        okay.onclick = function() {
            modal.style.display = "none";
        }
    </script>
</body>

</html>