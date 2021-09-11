<?php
class M_Generos extends \DB\SQL\Mapper{
    
    public function __construct(){  //            conexion  tabla    
       // parent::__construct(\Base::instance()->get('DB'),'anime');
        parent::__construct(\Base::instance()->get('DB'),'genero');
        
    }
}