<?php

class Anime_Ctrl{
    public $M_Anime= null;
    public function __construct(){
        $this->M_Anime=new M_Animes();
    }

    public function crear($f3){
        $this->M_Anime->set('Nombre', $f3->get('POST.Nombre'));
        $this->M_Anime->set('Descripcion', $f3->get('POST.Descripcion'));
        $this->M_Anime->set('Imagen', $f3->get('POST.Imagen'));
        $this->M_Anime->set('Estado	', $f3->get('POST.Estado'));
        $this->M_Anime->set('Idioma	', $f3->get('POST.Idioma'));
        $this->M_Anime->set('Idioma	', $f3->get('POST.Idioma'));
        $this->M_Anime->set('Tipo_idTipo	', $f3->get('POST.Tipo_idTipo'));
        $this->M_Anime->set('Vistas	', $f3->get('POST.Vistas'));
        $this->M_Anime->save();

        echo $this->M_Anime->get('id');
    }
    public function consultar($f3){

        $parametro= $f3->get('PARAMS.parametro');
        $this->M_Anime->load(['idAnime=?',$parametro]);
        $msg="";
        $item=array();


        if($this->M_Anime->loaded()>0){
            $msg="Anime encontrado";
            $item=$this->M_Anime->cast();
        }
        else{
            $msg="Anime no encontrado";
        }
        echo json_encode([
            'mensaje'=> $msg,
            'info'=>[
                'item'=> $item
                ]

            ]);
    }
    /* consulta con limite y paginacion
    public function consultarLimitada($f3){

        
        $result =$this->M_Anime->find([],["limit"=>2,"offset"=>2]);
        $msg="";
        $item=array();


       
            $msg="Anime encontrado";
            foreach($result as $anime){
                $item[]=$anime->cast();
            }
        
        echo json_encode([
            'mensaje'=> $msg,
            'info'=>[
                'item'=> $item
                ]

            ]);
    }
    */
    /* consulta por nombre BUSQUEDA
    public function consultar($f3){

        $parametro= $f3->get('PARAMS.parametro');
        $result =$this->M_Anime->find(['Nombre LIKE ?','%'.$parametro.'%']);
        $msg="";
        $item=array();


       
            $msg="Anime encontrado";
            foreach($result as $anime){
                $item[]=$anime->cast();
            }
        
        echo json_encode([
            'mensaje'=> $msg,
            'info'=>[
                'item'=> $item
                ]

            ]);
    }
   */
    public function listado($f3){

        $result =$this->M_Anime->find();
        $item=array();
        foreach($result as $anime){
            $item[]=$anime->cast();
        }
        echo json_encode([
            'mensaje'=> count($item)>0?'':'Aun no hay registro',
            'info'=>[
                'item'=> $item
                ]

            ]);
    }
}