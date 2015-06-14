<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>login</title>
        <link rel="stylesheet" type="text/css" href="css/demo.css" />
        <link rel="stylesheet" type="text/css" href="css/style.css" />
    </head>
	
    <body>
        <div class="container">
            <header></header>
            <section>               
                <div id="container_demo" >
                    <a class="hiddenanchor" id="toregister"></a>
                    <a class="hiddenanchor" id="tologin"></a>
                    <div id="wrapper">
                        <div id="login" class="animate form">
                            <form action="fonctions/connexion.php" method="post" class="form" enctype="multipart/form-data" id="form">
                                <h1>Log in</h1>
				                    <span style="font-style:italic; color:red;"><?php if (!empty($_GET['erreur'])) {echo $_GET['erreur']; } ?></span>
                                <p>
                                    <label for="username" class="uname" data-icon="u" > Your email or username </label>
                                    <input type="text" name="user" class="form-control" placeholder="Identifiant ..." required/>
                                </p>
                                <p> 
                                    <label for="password" class="youpasswd" data-icon="p"> Your password </label>
                                    <input id="password" name="password" type="password" placeholder="Password" />
                                </p>
                                 <p class="login button">                                                               
                                    <input type="submit" value="Login" />
                                </p>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </div>  
    </body>
</html>