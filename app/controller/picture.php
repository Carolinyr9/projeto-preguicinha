<?php
class Picture {
    private $largura = 1500;
    private $altura = 1800; 
    private $tamanho = 2048000;
    private $error = array();
    private $nome_imagem;
    private $caminho_imagem;
    private $registro;
    private $totalerro;
    private $foto;

    public function __construct($file){
        $this->foto = $file;
    }

    public function validatePicture(){
        if(!preg_match("/^image\/(jpg|jpeg|png|bmp|webp)$/", $this->foto["type"])){ 
            $this->error[0] = "Isso não é uma imagem."; 
        }
    
        $dimensoes = getimagesize($this->foto["tmp_name"]); 
    
        if($dimensoes[0] > $this->largura) { 
            $this->error[1] = "A largura da imagem não deve ultrapassar ".$this->largura." pixels"; 
        }

        if($dimensoes[1] > $this->altura) {
            $this->error[2] = "Altura da imagem não deve ultrapassar ".$this->altura." pixels"; 
        }
        
        if($this->foto["size"] > $this->tamanho) {
            $this->error[3] = "A imagem deve ter no máximo ".$this->tamanho." bytes";
        }

        if ($this->countErrors() == 0) {
            preg_match("/\.(gif|bmp|png|jpg|jpeg|webp){1}$/i", $this->foto["name"], $ext); 

            $this->nome_imagem = md5(uniqid(time())) . "." . $ext[1]; 

            $this->caminho_imagem = "../imagens/" . $this->nome_imagem; 

            move_uploaded_file($this->foto["tmp_name"], $this->caminho_imagem);      
            
            return $this->nome_imagem;
        }
        else
        {
            return FALSE;
        }
    }

    public function countErrors(){
        return count($this->error);
    }
}