<?php
class M_Animes extends \DB\SQL\Mapper{
    
    public function __construct(){  //            conexion  tabla    
        parent::__construct(\Base::instance()->get('DB'),'anime');
    }
}