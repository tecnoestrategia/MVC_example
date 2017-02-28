<body>
    <div class="navbar-wrapper">
      <div class="container">
        <nav class="navbar navbar-inverse navbar-static-top">
          <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <p class="navbar-brand"><?php echo PROJECT_NAME ;?></p>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
              <ul class="nav navbar-nav">
                <li class="active"><a href="#"><?php echo MENU_HOME;?></a></li>
                <li><a href="?c=about"><?php echo MENU_ABOUT ;?></a></li>
                <li><a href="?c=contact"><?php echo MENU_CONTACT ;?></a></li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo MENU_EXTRAS;?> <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="#">Action</a></li>
                    <li><a href="#">Another action</a></li>
                    <li><a href="#">Something else here</a></li>                    
                  </ul>
                </li>
              </ul>
            </div>
          </div>
        </nav>

      </div>
    </div>