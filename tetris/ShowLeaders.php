<?php

    session_start();
    $con = mysqli_connect('localhost', "root", "root") or die('not connecting');
    mysqli_select_db($con, 'tetris');

    $name = $_SESSION['user'];

    $sql = "SELECT a.Username, a.Score FROM Scores a JOIN Users b ON a.Username = b.Username WHERE b.Display = 1;";

    // if ($result = $mysqli -> query($sql)) {
    //     while ($row = $result -> fetch_row()) {
    //         // Username $row[0]
    //         // Score $row[1]
    //         printf ("%s (%s)\n", $row[0], $row[1]);
    //     }
    //     $result -> free_result();
    // } else {

    // }
      
    // $mysqli -> close();

    $result = mysqli_query($con, $sql);
    $num = mysqli_num_rows($result);

    if($num >= 1) {
        echo "<h2 style = \"color: green; text-align: center;\">Leader Board</h2>";
        echo '<table>';
        echo '<tr><th>Username</th><th>Score</th></tr>';

        while ($row = $result -> fetch_row()) {
            // Username $row[0]
            // Score $row[1]
            echo '<tr>';

            echo '<td>';
            echo $row[0];
            echo '</td>';

            echo '<td>';
            echo $row[1];
            echo '</td>';

            echo '</tr>';
            
            //printf ("%s (%s)\n", $row[0], $row[1]);
        }

        echo '</table>';

        $result -> free_result();
    }
    else {
        // no leader board
        echo "<h1> No leader board info </h1>";
    }
    $mysqli -> close();
?>
