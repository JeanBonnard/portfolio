<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="icon" type="img/png" href="img/jb.png" />
    <title>CV</title>

    <link rel="stylesheet" href="Semantic-UI-CSS/semantic.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/master.css">

<!--    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>
-->
    <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" integrity="sha512-uto9mlQzrs59VwILcLiRYeLKPPbS/bT71da/OEBYEwcdNUk8jYIy+D176RYoop1Da+f9mvkYrmj5MCLZWEtQuA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>



    <script src="js/tagcanvas.min.js"></script>

    <script type="text/javascript">
        window.onload = function() {
            try {
                TagCanvas.Start('myCanvas','tags',{
                    textColour: '#99cc33',
                    outlineColour: 'transparent',
                    reverse: true,
                    depth: 0.9,
                    maxSpeed: 0.1
                });
            } catch(e) {
                // something went wrong, hide the canvas container
                document.getElementById('myCanvasContainer').style.display = 'none';
            }
        };
    </script>





</head>
<body>
<!--_________________________________________START NAVBAR__________________________________________________________________________-->
<div class="following bar">
    <div class=" ui large secondary network menu  inverted">
        <div class="item">
            <img src="img/jb.png" class="logo">
        </div>
        <div class="menu grp-tabs">
            <a class="tabs item <?= $_GET['page']=='home' ? 'active':''?>" href="index.php?page=home">Accueil</a>
            <a class="tabs item <?= $_GET['page']=='cv' ? 'active':''?>" href="index.php?page=cv">CV</a>
            <a class="tabs item <?= $_GET['page']=='contact' ? 'active':''?>" href="index.php?page=contact">Contact</a>
        </div>
        <div class="btn-soc">
            <a href="https://github.com/JeanBonnard" target="_blank" class="gh-btn"><i class="github icon" style="font-size: 3em;margin-top: 1rem;"></i></a>
            <a href="" class="link-btn"><i class="linkedin icon" style="font-size: 3em;margin-top: 1rem;" ></i></a>
        </div>
    </div>
</div>