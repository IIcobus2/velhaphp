<!DOCTYPE html>
<html>
<head>
    <title>Jogo da Velha</title>
    <link rel="shortcut icon" href="http://php.net/favicon.ico">
    <style>
        table { width: 500px; height: 500px; margin: 0 auto; border:1px solid #000;}
        table td{}
        table td input { width:50px; border-style: none;width:250px;height:250px}
        table td p { }
		.x { background:url('./img/x.png'); background-repeat: no-repeat; background-position: center; background-size:100%; }
		.o { background:url('./img/o.jpg'); background-repeat: no-repeat; background-position: center; background-size:100%; }
		#menu { height:150px; background: #ffff;width:300px;margin: 0 auto; text-align: center}
    </style>
</head>
<body>
    <?php
        /**
         *  Jogo modelo no curso de jogos web, da ETEC Nair Luccas Ribeiro no dia 19/10
         *  @copyright 2017 Felipe Horizonte
         *  @author Felipe Horizonte <felipe.hrtz2@gmail.com> <www.github.com/flhorizonte>
         */
        require_once'class/Game.class.php';
        session_start();
		
        $game = new Game();
        $game->main();

        echo"<pre>";
            print_r($game->cont);
        echO"</pre>";
    

        if(isset($_SESSION["vencedor"])){

            ?>
				<div id="menu">
					<p>
						<h1>O <?php echo $_SESSION["vencedor"]?> ganhou!</h1>
						<a href='index.php'>Recomecar</a>
					</p>
					
				</div>
			<?php

            session_destroy();
            session_write_close();
        } else {
            ?>  
                <div id="menu">
					<p>
						<h1>Vez de jogar => <?php echo $game->turno?></h1>
					</p>
                    <p>
                        <strong>Jogador1 => X<strong><br>
                        <strong>Jogador2 => O<strong>
                    </p>
					
				</div>
            <?php
        }
    ?>
    <form method="POST">
        <table border="1">
            <tr>
                <td><input type="submit" name="btn-1"  value="" class="<?php echo $game->btn["btn-1"] != "" ? $game->btn["btn-1"] : ""; ?>"></td>
                <td><input type="submit" name="btn-2"  value="" class="<?php echo $game->btn["btn-2"] != "" ? $game->btn["btn-2"] : ""; ?>"></td>
                <td><input type="submit" name="btn-3"  value="" class="<?php echo $game->btn["btn-3"] != "" ? $game->btn["btn-3"] : ""; ?>"></td>
            </tr>
            <tr>	
                <td><input type="submit" name="btn-4"  value="" class="<?php echo $game->btn["btn-4"] != "" ? $game->btn["btn-4"] : ""; ?>"></td>
                <td><input type="submit" name="btn-5"  value="" class="<?php echo $game->btn["btn-5"] != "" ? $game->btn["btn-5"] : ""; ?>"></td>
                <td><input type="submit" name="btn-6"  value="" class="<?php echo $game->btn["btn-6"] != "" ? $game->btn["btn-6"] : ""; ?>"></td>
            </tr>
            <tr>
                <td><input type="submit" name="btn-7"  value="" class="<?php echo $game->btn["btn-7"] != "" ? $game->btn["btn-7"] : ""; ?>"></td>
                <td><input type="submit" name="btn-8"  value="" class="<?php echo $game->btn["btn-8"] != "" ? $game->btn["btn-8"] : ""; ?>"></td>
                <td><input type="submit" name="btn-9"  value="" class="<?php echo $game->btn["btn-9"] != "" ? $game->btn["btn-9"] : ""; ?>"></td>
            </tr>
        </table>
    </form>
</body>
</html>