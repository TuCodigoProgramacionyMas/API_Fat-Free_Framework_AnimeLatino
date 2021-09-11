<?php
class M_Episodios extends \DB\SQL\Mapper{
    
    public function __construct(){  //            conexion  tabla    
       // parent::__construct(\Base::instance()->get('DB'),'anime');
        parent::__construct(\Base::instance()->get('DB'),'Episodio');
        
    }
}