<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title> Forms </title>

</head>
<?php
$background = "";
if (empty($_POST['theme']) == false) {
    $background = $_POST['theme'];
}
?>
<?php 
echo "<h1>Preview</h1>";
?>

<body style=" background-color:<?php echo $background; ?>;">
    <p>
        <?php
        if (empty($_POST['name']) == false) {
            echo $_POST['name'];
        } else {
            echo "Name: Not provided";
        }
        ?>
    </p>
    <p>
        <?php
        if (empty($_POST['uname']) == false) {
            echo $_POST['uname'];
        } else {
            echo "Username: Not provided";
        }
        ?>
    </p>
    <p>
        <?php
            if (empty($_POST['pass']) == false) {
                $pass = $_POST['pass']; 
                if (strlen($pass) >= 6) {
                    echo $pass;
                } else {
                    echo "Your password must be longer than 6 characters.";
                }
            } else {
                echo "Not provided!";
            }
        ?>
    </p>

    <p>
        <?php
        if (empty($_POST['address']) == false) {
            echo $_POST['address'];
        } else {
            echo "Address: Not provided";
        }
        ?>
    </p>
    <p>

        <?php

        if (empty($_POST['country']) == false) {
            $dashPosition = strpos($_POST['country'], "-") + 1;
            $countryName = substr($_POST['country'], $dashPosition);
            echo $countryName;
        }
        ?>
    </p>

    <p>
        <?php
        if (empty($_POST['zip_code']) == false) {
            echo $_POST['zip_code'];
        } else {
            echo "Zip: Not provided";
        }
        ?>
    </p>

    <p>

        <?php
        if (empty($_POST['email']) == false) {
            if (strpos($_POST['email'], "@") === false) {
                echo "Your email must contain the '@' character";
            } else {
                $afterA = substr($_POST['email'], strpos($_POST['email'], "@"));
                if (str_contains($afterA, ".")) {
                    echo $_POST['email'];
                } else {
                    echo "Your email must contain '.' after the '@' sign";
                }
            }
        } else {
            echo "Email: Not provided.";
        }
        ?>
    </p>
    <p>

    </p>
    <p>
        <?php
        if (empty($_POST['sex']) == false) {
            switch ($_POST["sex"]) {
                case "male":
                    echo "Male";
                    break;
                case "female":
                    echo "Female";
                    break;
                default:
                    echo "There must be an error";
            }
        } else {
            echo "Sex must be declared!";
        }
        ?>
    </p>

    <p>
        <?php
        echo "My Languages ";
        if (empty($_POST['Languages']) == false) {
            for ($i = 0; $i < sizeof($_POST['Languages']); $i++) {
                echo $_POST['Languages'][$i] . ", ";
            }
            echo "<br>";
        } else {
            echo "Your languages cannot be empty";
        }
        ?>
    </p>

    <?php
    if (empty($_POST['comment']) == false) {
        echo "Thanks for your comment <br/>";
        echo $_POST['comment'];
    }
    ?>
    <p>

    </p>


</body>

</html>