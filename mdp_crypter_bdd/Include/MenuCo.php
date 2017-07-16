<?php
if(isset($_SESSION['eml']) || isset($_SESSION['mp']))
{
  
    include_once('MVC/Vue/VueMenu_co.php');

}
else
{
    include_once('Default.php'); 
}
?>