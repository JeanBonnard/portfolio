
<script src="js/hilight.min.js"></script>
<script src="js/easing.min.js"></script>

<script type="text/javascript" src="Semantic-UI-CSS/semantic.min.js"></script>
<script type="text/javascript" src="js/modal-content.js"></script>
<script type="text/javascript" src="js/main.min.js"></script>
<script type="text/javascript" src="js/script.min.js"></script>
<script type="text/javascript" src="js/less.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/parallax/3.1.0/parallax.min.js"></script>
<script>
    // Pretty simple huh?
    let scene = document.getElementById('scene');
    let parallax = new Parallax(scene);
</script>


<script>
    $('.ui.menu')
        .on('click', '.item', function() {
            if(!$(this).hasClass('dropdown')) {
                $(this)
                    .addClass('active')
                    .siblings('.item')
                    .removeClass('active');
            }
        });
</script>

</body>
</html>