<?php
/**
 *  Jogo modelo no curso de jogos web, da ETEC Nair Luccas Ribeiro no dia 19/10
 *  @copyright 2017 Felipe Horizonte
 *  @author Felipe Horizonte <felipe.hrtz2@gmail.com> <www.github.com/flhorizonte>
 */
final class game { /* Classe final, ou seja não recebera herança, e tambem não vai passar */

    public $btn;
	public $turno;
	public $cont = 0;

    public function __construct()
    {
        /*
            Atribuição das casas, do vetor btn.. vetores estão vazios
        */
        $this->btn["btn-1"] = "";
        $this->btn["btn-2"] = "";
        $this->btn["btn-3"] = "";
        $this->btn["btn-4"] = "";
        $this->btn["btn-5"] = "";
        $this->btn["btn-6"] = "";
        $this->btn["btn-7"] = "";
        $this->btn["btn-8"] = "";
        $this->btn["btn-9"] = "";
    }

    /*
        Fução principal, éla é responsavel por ser requisitada na pagina do jogo(index.php)
    */
    public function main()
    {
        $loop = 0;              
        while($loop < 1){

            $this->runButtons(); /* a funcao runButtons é requisitada*/
            
            $loop++;
        }
    }

    public function runButtons() 
    {
        foreach ($this->btn as $key => $valor) {

            if (isset($_POST[$key])) {
                
				$_SESSION["click"][$this->turnPlayer($_SESSION["clicks"] += 1)][] = $key;

                if(isset($_SESSION["click"]["Jogador1"])){
                    foreach($_SESSION["click"]["Jogador1"] as $jogador1){
                        $this->btn[$jogador1] = "x";
                    }
                }
               
                if(isset($_SESSION["click"]["Jogador2"])){
                    foreach($_SESSION["click"]["Jogador2"] as $jogador2){
                        $this->btn[$jogador2] = "o";
                    }
                }
                    /* Para verifiar as linhas do jogo, ou seja verificar as linhas da matriz, verificando se o jogador1 ganhou*/
                if($this->verifyButton1($this->btn["btn-1"],$this->btn["btn-2"],$this->btn["btn-3"]) == true
                    || $this->verifyButton1($this->btn["btn-4"],$this->btn["btn-5"],$this->btn["btn-6"]) == true
                        || $this->verifyButton1($this->btn["btn-7"],$this->btn["btn-8"],$this->btn["btn-9"]) == true
                            || $this->verifyButton1($this->btn["btn-1"],$this->btn["btn-4"],$this->btn["btn-7"]) == true
                                || $this->verifyButton1($this->btn["btn-2"],$this->btn["btn-5"],$this->btn["btn-8"]) == true
                                    || $this->verifyButton1($this->btn["btn-3"],$this->btn["btn-6"],$this->btn["btn-9"]) == true
                                        || $this->verifyButton1($this->btn["btn-1"],$this->btn["btn-5"],$this->btn["btn-9"]) == true
                                            || $this->verifyButton1($this->btn["btn-3"],$this->btn["btn-5"],$this->btn["btn-7"]) == true){
                            $_SESSION["vencedor"] = "Jogador1";
                } else {
                     /* Para verifiar as linhas do jogo, ou seja verificar as linhas da matriz, verificando se o jogador2 ganhou*/
                    if($this->verifyButton2($this->btn["btn-1"],$this->btn["btn-2"],$this->btn["btn-3"]) == true
                        || $this->verifyButton2($this->btn["btn-4"],$this->btn["btn-5"],$this->btn["btn-6"]) == true
                            || $this->verifyButton2($this->btn["btn-7"],$this->btn["btn-8"],$this->btn["btn-9"]) == true
                                || $this->verifyButton2($this->btn["btn-1"],$this->btn["btn-4"],$this->btn["btn-7"]) == true
                                    || $this->verifyButton2($this->btn["btn-2"],$this->btn["btn-5"],$this->btn["btn-8"]) == true
                                        || $this->verifyButton2($this->btn["btn-3"],$this->btn["btn-6"],$this->btn["btn-9"]) == true
                                            || $this->verifyButton2($this->btn["btn-1"],$this->btn["btn-5"],$this->btn["btn-9"]) == true
                                                || $this->verifyButton2($this->btn["btn-3"],$this->btn["btn-5"],$this->btn["btn-7"]) == true){
                                $_SESSION["vencedor"] = "Jogador2";
                    } 
                }
            }
        }
    }

    public function turnPlayer($jogador) /* funcao parar verificar os turnos entre as jogaodas*/
    {
        if ($jogador % 2 === 0) {

            $this->turno = "Jogador1";
        } else{
            
            $this->turno = "Jogador2";
        }
        return $this->turno;
    }

    private function verifyButton1($a, $b, $c) /*verificando os botoes em linhas retas e diagonais na funcao runButton(),*/
    {   
        if ($a === "x" && $b === "x" && $c === "x") {
            return true;
        }
    }

    private function verifyButton2($a, $b, $c) /*verificando os botoes em linhas retas e diagonais na funcao runButton(),*/
    {   
        if ($a === "o" && $b === "o" && $c === "o") {
           return true;
        }
    }

}
    

