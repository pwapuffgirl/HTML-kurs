<?php

class PersonDatabase
{
    private $hostName = "localhost";
    private $userName = "root";
    private $passWord = "root";
    private $database = "person_database";

    public function __construct()
    {
        $queryString = "CREATE TABLE IF NOT EXISTS swim_tabell
    (
      id INT AUTO_INCREMENT,
      firstname VARCHAR(255),
      lastname VARCHAR(255),
      age INT,
      swimming_cap VARCHAR(255),
      swinning_knowledge BOOLEAN,
      distance VARCHAR(255),
      info TEXT,
      paid BOOLEAN,
      PRIMARY KEY(id)
  );";

        if (!$this->performQuery($queryString)) {
            echo "Failed to create new table";
        }
    }
    //-------------ADD PERSON-------------
    function addPerson(
        string $firstname,
        string $lastname,
        int $age,
        string $swimming_cap,
        int $swimming_knowledge,
        string $distance,
        string $info,
        int $paid
    ) {
        $queryString = "INSERT INTO swim_tabell
    (firstname, lastname, age, swimming_cap, swinning_knowledge, distance, info, paid) VALUES ('$firstname', '$lastname', '$age', '$swimming_cap', '$swimming_knowledge', '$distance', '$info', '$paid')";

        if (!$this->performQuery($queryString)) {
            echo "Failed to add new user!";
            return;
        }
    }
    //-------------DELETE/REMOVE PERSON-------------
    function removePerson($id)
    {
        $queryString = "DELETE FROM swim_tabell WHERE id = '$id'";

        if (!$this->performQuery($queryString)) {
            echo "Failed to add new user!";
        }
    }
    //-------------SELECT/GET PERSON-------------
    function getAllPersons()
    {
        $queryString = "SELECT * FROM swim_tabell;";

        $persons = $this->performQueryResult($queryString);
        return $persons;
    }
    //-------------FIND/SEARCH PERSON-------------
    function findLastPerson()
    {
        $queryString = "SELECT * FROM `swim_tabell` ORDER BY Id DESC LIMIT 1";
        $persons = $this->performQueryResult($queryString);
        return $persons[0];
    }

    private function performQuery($query)
    {
        $result = false;

        $mysqli = new mysqli($this->hostName, $this->userName, $this->passWord, $this->database);

        // Check connection
        if ($mysqli->connect_errno) {
            echo "Failed to connect to MySQL: " . $mysqli->connect_error;
            exit();
        }

        $result = $mysqli->query($query);

        if (!$result) {
            echo ("Error description: " . $mysqli->error);
        }

        $mysqli->close();

        return $result;
    }

    private function performQueryResult($query)
    {
        $mysqli = new mysqli($this->hostName, $this->userName, $this->passWord, $this->database);

        // Check connection
        if ($mysqli->connect_errno) {
            echo "Failed to connect to MySQL: " . $mysqli->connect_error;
            exit();
        }

        $result = $mysqli->query($query);
        $rows = $result->fetch_all(MYSQLI_ASSOC);

        $mysqli->close();
        return $rows;
    }
}
