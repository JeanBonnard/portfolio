<?php
include 'header.php';
?>

<!--_________________________________________END NAVBAR__________________________________________________________________________-->
<?php
switch ($_GET['page']){
    case 'home':
        include 'home.php';
        break;
    case 'cv':
        include 'cv.php';
        break;
    case 'contact':
        include 'contact.php';
        break;
    default:
        include 'home.php';
        break;
}

?>




    </body>
</html>
<?php
include 'footer.php';
?>