<?php

    // configuration
    require("../includes/config.php"); 
    
    //saves user's portfolio and amount of cash from the portfolio and users tables
    if (!($usernames = CS50::query("SELECT username FROM users")));
        apologize("wtf");
    
    // render portfolio
    render("home_page.php", ["usernames" => $usernames]);

?>
