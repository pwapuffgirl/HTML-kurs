<!DOCTYPE html>
<html lang="zxx">

<head>
    <?php
    include('include/head.php');
    ?>
    <style>

    </style>
</head>

<body>
    <header>
        <?php
        include('include/navbar.php');
        ?>

        <?php
        include('include/slideshow.php');
        ?>

    </header>
    <!----------------------------------------------- Article ------------------------------------------->
    <div class="article">
        <div class="rubric">
            <h2>Registrering</h2>
            <br>
        </div>
        <div>
            <?php
            ini_set('display_errors', 1);
            ini_set('display_startup_errors', 1);
            error_reporting(E_ALL);

            include('include/database.php');
            $db = new PersonDatabase();

            if (isset($_POST["firstname"])) {
                $db->addPerson(
                    $_POST["firstname"],
                    $_POST["lastname"],
                    $_POST["age"],
                    $_POST["swimming_cap"],
                    $_POST["swimming_knowledge"] == "true",
                    $_POST["distance"],
                    $_POST["info"],
                    $_POST["paid"] == "true"
                );


                $person = $db->findLastPerson();
                echo "<p style='text-align: center;'>Registrering lyckades!</p>";
                echo "<p style='text-align: center;'>Ditt id är " . $person['id'] . ". Spara det för avregistrering.</p>";
                // Redirect till startsidan
                //header("Location: http://localhost/HTML%20kurs/");
                //die();
            } else {
                // Ingen post request

                echo "Fail";
            }
            ?>
        </div>
    </div>
    <!----------------------------------------------- /Article ------------------------------------------>
    <?php
    include('include/footer.php');
    ?>
</body>

</html>