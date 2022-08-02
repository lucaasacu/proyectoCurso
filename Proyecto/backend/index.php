<?php




?>

<!DOCTYPE html>
  <html>
    <head>
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="web/css/materialize.min.css"  media="screen,projection"/>

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      <title>NACIONAL</title>
<style>
.logo{
    display: flex;

}
img{
    width: 60px;
    margin: 0 20px;

}
	
body {
            display: flex;
            min-height: 100vh;
            flex-direction: column;
        }
main {
            flex: 1 0 auto;
        }

table.striped > tbody > tr:nth-child(odd) {
            background-color: #b2dfdb;
        }
.pagination li.active {
          background-color: #bbdefb;
        }
nav ul a {
    padding: 0 20px;
}
nav .brand-logo {
    font-size: 2.4rem;
    padding: 0;
}
.blue.darken-5 {
  background-color: #003062 !important;
}
.blue.darken-6 {
  background-color: rgba(0,48,98,255) !important;
}


</style>
    </head>

    <body>
        
    <main>
        <nav>
            <div class="nav-wrapper 
            blue darken-5">
                <a href="index.php" class="brand-logo center"><b>Club Nacional de Football</a>
                <a href="index.php"><img src="logo.png"></a>
                    <ul class="right hide-on-med-and-down">
                        <li><a href="sass.html" class="tooltipped" data-position="bottom" data-tooltip="Inicio"><i class="material-icons">home</i></a></li>
                        <li><a href="badges.html" class="tooltipped" data-position="bottom" data-tooltip="Noticias"><i class="material-icons">language</i></a></li>
                        <li><a href="collapsible.html" class="tooltipped" data-position="bottom" data-tooltip="Deportistas"><i class="material-icons">people</i></a></li>
                        <li><a href="mobile.html"class="tooltipped" data-position="bottom" data-tooltip="Contacto" ><i class="material-icons">call</i></a></li>
                        <li><a href="mobile.html"class="tooltipped" data-position="bottom" data-tooltip="Menu" ><i class="material-icons">more_vert</i></a></li>
                    </ul>
            </div>
        </nav>


    <div class="container blue darken-5"></div>
</main>

    <footer class="page-footer blue darken-6">
			<div class="footer-copyright">
				<div class="container">
						© 2022 Copyright
                    <div class="right">
						<a class="grey-text text-lighten-4 right" href="#!">&nbsp;Contacto&nbsp;&nbsp;</a>
                        <a class="grey-text text-lighten-4 right" href="#!">&nbsp;Panel&nbsp;&nbsp;</a>
                     </div>
			    </div>
    </footer>
      <!--JavaScript at end of body for optimized loading-->
      <script type="text/javascript" src="web/js/materialize.min.js"></script>
      <script>
          document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.tooltipped');
    var instances = M.Tooltip.init(elems, options);
  });

        M.AutoInit();

      </script>
    </body>
  </html>