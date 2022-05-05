<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Adare Restaurant</title>

    <link rel="stylesheet" href="adare_menu.css" type="text/css">

</head>

<body>

    <div class="container">

        

      
        <nav>

                <a href="index.html">HOME</a>

                <a href="menu.php">MENU</a>

                <a href="#">ORDER ONLINE</a>

                <a href="#">GIFT VOUCHER</a>

                <a href="#">CATERING</a>

                <a href="#">CONTACT</a>

        </nav>

    

        <main>

            <h2>Menu</h2>

<?php

    define ( 'DB_HOST', 'localhost' );

    define ( 'DB_USER', 'adare' );  // Replace my_username with the username of your choice.

    define ( 'DB_PASSWORD', 'password' ); // Replace my_password with the actual password associate with the user.

    define ( 'DB_NAME', 'adare' ); // Replace my_database with the actual database name

    $conn = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD) ;

    

    if (!$conn) {

        echo mysqli_connect_errno().": ".mysqli_connect_error() ;

        die("<p>The database server is not available.</p>") ;

    }

    //echo "<p>Database connection is open</p>" ;

    // Select database

    $DBSelect = @mysqli_select_db($conn, DB_NAME) ;

    if (!$DBSelect) {

        die("<p>The database is not available.</p>") ;

    }

    //echo "<p>Successfully opened the database.</p>" ;

    // Quary database table -- selecting employees table for any employee hired after Januray 1, 2000

    $SQL = "SELECT * FROM menu WHERE item_type = 'tapas'" ;

    $ResultSet = @mysqli_query($conn, $SQL) ;

    $NumFields = @mysqli_num_fields($ResultSet) ;

?>

        <!--<p>This is the menu</p>-->

            <div>

                <div>

                    <h3>Tapas</h3>

<?php

    $Row = @mysqli_fetch_row($ResultSet) ;

    do {

        echo "<p>{$Row[1]}</p>" ;

        echo "<p>{$Row[2]}</p>" ;

        echo "<p>{$Row[4]}</p>" ;

        echo "<br/>" ;

        $Row = @mysqli_fetch_row($ResultSet) ;

    } while ($Row) ;

    

    // Release the query result set

    mysqli_free_result($ResultSet) ;

?>

                </div>

                <div>

                    <h3>Entries</h3>

<?php

    

    $SQL = "SELECT * FROM menu WHERE item_type = 'entries'" ;

    $ResultSet = @mysqli_query($conn, $SQL) ;

    $NumFields = @mysqli_num_fields($ResultSet) ;

    $Row = @mysqli_fetch_row($ResultSet) ;

    do {

        echo "<p>{$Row[1]}</p>" ;

        echo "<p>{$Row[2]}</p>" ;

        echo "<p>{$Row[4]}</p>" ;

        echo "<br/>" ;

        $Row = @mysqli_fetch_row($ResultSet) ;

    } while ($Row) ;

    

    // Release the query result set

    mysqli_free_result($ResultSet) ;

?>

                </div>

            </div>  

        </main>

<?php

    // Close the database connection

    mysqli_close($conn) ;
?>

        <footer>

            <p>Main St, Blackabbey, Adare, Co. Limerick - Copyright 2017©</p>

        </footer>

    </div>

</body>

</html>
