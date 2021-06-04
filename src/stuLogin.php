<?php
session_start();
require_once('dbConfig.php');

    if (isset($_POST['ID']) && isset($_POST['name'])) {
        function validate($data)
        {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        $ID = validate($_POST['ID']);
        $name = validate($_POST['name']);

        if (empty($ID)) {
            header("Location: index.php?error=id is required");
            exit();
        } else if (empty($name)) {
            header("Location: index.php?error=name is required");
            exit();
        } else {
            $sql = "SELECT * FROM student WHERE ID='$ID' AND name='$name'";
            $query = $conn->prepare($sql);
            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_OBJ);
            if ($query->rowCount() === 1) {
                if ($result[0]->ID === $ID && $result[0]->name === $name) {
                    $_SESSION['ID'] = htmlentities($result[0]->ID);
                    $_SESSION['name'] = htmlentities($result[0]->name);
                    $_SESSION['dept_name'] = htmlentities($result[0]->dept_name);
                    $_SESSION['tot_cred'] = htmlentities($result[0]->tot_cred);
                    header("Location: student/studentPage.php");
                    exit();
                } else {
                    header("Location: index.php?error=Incorrect ID or name");
                    exit();
                }
            } else {
                header("Location: index.php?error=Incorrect ID or name");
                exit();
            }
        }

    } else {
        header("Location: index.php");
        exit();
    }


