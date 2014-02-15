<?php

$host = "localhost"; 
$user = "root"; 
$pass = "admin"; 
$dbname = "blazedb";

/*** TOP STORY VARIABLE ***/
$topstory_headline = "";
$topstory_image = "";
$topstory_text = "";

/*** AROUND THE NATION VARIABLES ***/
$nation_headline = array("","","","","");
$nation_image[0]=array("","","","","");
$nation_category[0]=array("","","","","");
$nation_text[0]=array("","","","","");
$nation_article_url[0]=array("","","","","");




$link = mysql_connect($host, $user, $pass);

if (!$link) {
    echo "Could not connect to server\n";
    trigger_error(mysql_error(), E_USER_ERROR);
} 

if(is_resource($link))
    {
    /*** select the database we wish to use ***/
    if(mysql_select_db($dbname, $link) === TRUE)
        {
        /*** sql to SELECT MOST RECENT TOP STORY information***/
        $sql = "SELECT headline, description, category, photo_url, article_url
				FROM article 
				where type='topstory' and priority=1;";
				/*order by article.creation_date desc LIMIT 1;";*/

        /*** run the query ***/
        $result = mysql_query($sql);

        /*** check if the result is a valid resource ***/
        if(is_resource($result))
            {
            /*** check if we have more than zero rows ***/
            if(mysql_num_rows($result) !== 0)
                {
                while($row=mysql_fetch_array($result))
                    {
					$topstory_headline = $row['headline'];
					$topstory_image = $row['photo_url'];
					$topstory_text = $row['description'];
                    }
                }
          
            }
       
		}
		
		
		/*** sql to SELECT MOST RECENT AROUND THE NATION information***/
        $sql = "SELECT headline, category, description, photo_url, article_url
				FROM article 
				where type='national' and priority in (1,2,3,4,5)
				order by creation_date desc
				LIMIT 5;";

        /*** run the query ***/
        $result = mysql_query($sql);

        /*** check if the result is a valid resource ***/
        if(is_resource($result))
            {
            /*** check if we have more than zero rows ***/
            if(mysql_num_rows($result) !== 0)
                {
				$index=0;
                while($row=mysql_fetch_array($result))
                    {
					$nation_headline[$index] = $row['headline'];
					$nation_category[$index] = $row['category'];
					$nation_image[$index] = $row['photo_url'];
					$nation_text[$index] = $row['description'];
					$nation_article_url[$index] = $row['article_url'];
					$index++;
                    }
                }
          
            }
		
		/*** sql to SELECT MOST RECENT WORTH NOTING information***/
        $sql = "SELECT headline, category, description, photo_url, article_url
				FROM article 
				where type='national' 
				order by creation_date desc
				LIMIT 38;";

        /*** run the query ***/
        $result = mysql_query($sql);

        /*** check if the result is a valid resource ***/
        if(is_resource($result))
            {
            /*** check if we have more than zero rows ***/
            if(mysql_num_rows($result) !== 0)
                {
				$index=5;
                while($row=mysql_fetch_array($result))
                    {
					$nation_headline[$index] = $row['headline'];
					$nation_category[$index] = $row['category'];
					$nation_image[$index] = $row['photo_url'];
					$nation_text[$index] = $row['description'];
					$nation_article_url[$index] = $row['article_url'];
					$index++;
                    }
                }
          
            }
       
		
		
    /*** close the connection ***/
    mysql_close($link);
    }
else
    {
    /*** if we fail to connect ***/
    echo 'Unable to connect';
    }
?>