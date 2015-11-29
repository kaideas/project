<?php

    // configuration
    require("../includes/config.php");

    // if user reached page via GET (as by clicking a link or via redirect)
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        // else render form
        render("password_form.php", ["title" => "New Password"]);
    }

    // else if user reached page via POST (as by submitting a form via POST)
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        if (empty($_POST["password"]))
        {
            apologize("Please enter a password");
        }
        else if (empty($_POST["confirmation"]))
        {
            apologize("Please confirm your password");   
        }
        else if ($_POST["password"] != $_POST["confirmation"])
        {
            apologize("The password's you entered do not match");
        }
        else
        {
            $result = CS50::query("UPDATE users SET hash = ?", password_hash($_POST["password"], PASSWORD_DEFAULT));
            
            //checks if query worked
            if(empty($result))
            {
                apologize("Couldn't update your password");
            }
            
            redirect("/");
        }
    }

?>