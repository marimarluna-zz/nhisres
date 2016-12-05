<?php
class Usuario_model extends CI_Model{

function __construct()
{
  parent::__construct();
}
  
  
  public function buscar_usuario() {

   $id = $this->input->post('id');
  
  $query = $this->db->query(' SELECT * FROM `users` WHERE id = "'.$id.'"');
    $sql = $query->row();
  return $sql;

  }

  public function guardar(){

    $id = $this->input->post('id');

  $data=array(
    
    'id'=>$id,
    'perfil'=>$this->input->post('perfil'),
    'username'=>$this->input->post('username'),
    'password'=>$this->input->post('password'),
    
  );
  $this->db->insert('Usuario',$data);
}

/*function editar($id){

$sql = 'select * from `especialista` where ci_especialista ='. $id.' limit = 1'
$query = $this->db->query($sql);

$sql2 = 'select * from `users` where id ='. $id.' limit = 1'
$query2 = $this->db->query($sql2);

return $query->result(), $query2->result();
} */


 function tabla_p($limit, $start)
    {
        $sql = 'select * from `users` order by id limit ' . $start . ', ' . $limit;
        $query = $this->db->query($sql);
        return $query->result();
    }

 /*function tabla_planilla($limit, $start)
    {
        $sql = 'select * from `planilla_pagos` order by nombre limit ' . $start . ', ' . $limit;
        $query = $this->db->query($sql);
        return $query->result();
    }

    */

  function tabla_t($limit, $start)
    {
        
        $campo = $this->input->post('busqueda');
        $filtro = $this->input->post('filtro');


        $sql = 'select * from `users'.$filtro.'` = "'.$campo.'"  order by nombre limit ' . $start . ', ' . $limit;
        $query = $this->db->query($sql);
        return $query->result();
    }

    /*function eliminar(){


      $id =$this->input->post('id');

      $sql = $this->db->query(' DELETE FROM `causante` WHERE id = "'.$id.'"');
    return $sql;
    } */

}

 ?>
