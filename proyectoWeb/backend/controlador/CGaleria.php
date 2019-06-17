<?php


class CGaleria {
    private $modelo;
    
    public function __construct() {
        $this->modelo= new MGaleria();
    }
    
    
    public function mostrarGaleriaPrincipal(){
        $galeria= $this->modelo->consultarGaleriaPrincipal();
        $acu="";
        foreach ($galeria as $foto){
            $acu = $acu. '<div class="col-3">
                    <div class="foto">
                        <img src="'.$foto["url"].'" alt="">
                        <div class="tituloFoto">'.$foto["nombre"].'</div>
                    </div>
                </div>';
        }
        return $acu;
    }
}
