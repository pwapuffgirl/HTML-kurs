<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

?>

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
            <h2>Deltagare</h2>

            <div>
                <?php

                include('include/database.php');
                $db = new PersonDatabase();

                if (isset($_POST["userid"])) {
                    if (empty($_POST["userid"]) || !is_numeric($_POST["userid"])) {
                        echo '<p>Fel input, för att ta bort en användare skriver du in deras id.<p>';
                    } else {
                        $db->removePerson($_POST["userid"]);
                    }
                }



                $table = "";
                $table .= "<br>";
                $table .= "<table class='tablestyle'>";
                $table .= "<tr>";
                //$table .= "<th>Id</th>";
                $table .= "<th>Förnamn</th>";
                $table .= "<th>Efternamn</th>";
                $table .= "<th>Ålder</th>";
                //$table .= "<th>Badmössa</th>";
                //$table .= "<th>Simkunskap</th>";
                //$table .= "<th>Simsträcka</th>";
                //$table .= "<th>Info</th>";
                //$table .= "<th>Betalt</th>";
                //$table .= "<th>Avboka</th>";
                $table .= "</tr>";
                $table .= "<br>";
                global $antal_pers;
                $antal_pers = 0;
                $rows = $db->getAllPersons();
                foreach ($rows as $row) {
                    $table .= "<tr>";
                    //$table .= "<td>{$row['id']}</td>";
                    $table .= "<td>{$row['firstname']}</td>";
                    $table .= "<td>{$row['lastname']}</td>";
                    $table .= "<td>{$row['age']}</td>";
                    //$table .= "<td>{$row['swimming_cap']}</td>";
                    //$table .= "<td>{$row['swinning_knowledge']}</td>";
                    //$table .= "<td>{$row['distance']}</td>";
                    //$table .= "<td>{$row['info']}</td>";
                    //$table .= "<td>{$row['paid']}</td>";
                    //$table .= "<td><button>Avboka</button></td>";
                    $table .= "</tr>";
                    $antal_pers += 1;
                }
                $table .= "</table>";

                if ($antal_pers >= 10) {
                    echo "Eventet blir av!";
                } else {
                    echo "Eventet blir ej av";
                }

                echo $table;
                ?>
            </div>
            <div>
                <form method="POST">
                    <label> Ta bort användare </label><br>
                    <input type="text" name="userid" size="15" placeholder="id" /> <br>

                    <input type="submit" value="Bekräfta">
                </form>
            </div>
        </div>

    </div>
    <!----------------------------------------------- /Article ------------------------------------------>
    <?php
    include('include/footer.php');
    ?>
</body>

</html>