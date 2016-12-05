<?php
class Paciente_model extends CI_Model{

function __construct()
{
  parent::__construct();
}
  
  
  public function buscar_paciente() {

   $ci_paciente = $this->input->post('ci_paciente');
   $session_data = $this->session->userdata('logged_in');

  $query =  $this->db->query(' SELECT * FROM `paciente` WHERE ci_paciente="'.$ci_paciente.'"');
  $sql = $query->row();

  //$query = $this->db->query(' SELECT * FROM `paciente` WHERE ci_paciente = "'.$ci_paciente.'" ');
    //$sql = $query->row();
  return $sql;

  }

  public function guardar(){

    $ci_paciente = $this->input->post('ci_paciente');

  $data=array(
    
    'ci_paciente'=>$ci_paciente,
    'nombre'=>$this->input->post('nombre'),
    'apellido'=>$this->input->post('apellido'),
    'telefono'=>$this->input->post('telefono'),
    'direccion'=>$this->input->post('direccion')
  );
  $this->db->insert('paciente',$data);

}

function editar() {

   $id = $this->input->post('valor');
      
    $data = array(
        'nombre'=>$this->input->post('nombre'),
        'apellido'=>$this->input->post('apellido'),
        'telefono'=>$this->input->post('telefono'),
        'direccion'=>$this->input->post('direccion'),
        
             );
    
    #aqui colocamos el campo unico y la variable que declaramos arriba esto viene siendo como un Where ci_especialista = $cedula
    $this->db->where('ci_paciente', $id);
    

    #aqui simplemente decimos que pase el arreglo anterior a la tabla especialista
    $this->db->update('paciente', $data);

}
 function tabla_p($limit, $start)
    {
        $sql = 'select * from `paciente` order by ci_paciente limit ' . $start . ', ' . $limit;
        $query = $this->db->query($sql);
        return $query->result();
    }

     function tabla_i($limit, $start)
    {
      // $id = $this->input->post('valor');
       $ci_paciente = $this->input->post('ci_paciente');
     
        $sql = 'select * from `informe` where ci_paciente ='.$ci_paciente.' order by id_informe limit ' . $start . ', ' . $limit;
        $query = $this->db->query($sql);

        return $query->result();
    }


  function tabla_t($limit, $start)
    {
        
        $campo = $this->input->post('busqueda');
        $filtro = $this->input->post('filtro');


        $sql = 'select * from `paciente` where `'.$filtro.'` = "'.$campo.'"  order by ci_paciente limit ' . $start . ', ' . $limit;
        $query = $this->db->query($sql);
        return $query->result();
    }

    function buscar() {
 
   #se crea una variable para capturar el dato - aqui esta lo que te dije del nombre y el id del input, despues del post debe ir ese nombre, asi obtienes lo que este en el campo
   $cedula = $this->input->post('ci_paciente');
   
   $query = $this->db->select('*')
                      ->from('paciente')
                      ->where('ci_paciente', $cedula)
                      ->get();
    $sql = $query->row();
      return $sql;
 }

 function buscar_informes() {
 
   #se crea una variable para capturar el dato - aqui esta lo que te dije del nombre y el id del input, despues del post debe ir ese nombre, asi obtienes lo que este en el campo
   $cedula = $this->input->post('ci_paciente');
   
   $query = $this->db->select('*')
                      ->from('informe')
                      ->where('ci_paciente', $cedula)
                      ->get();
    return $query->result();
 }

 function informe($file_name){


    date_default_timezone_set('America/Caracas');
    $fecha = date('Y-m-d H:i:s');


     $data=array(
    
    'ci_paciente'=>$this->input->post('ci_paciente'),
    'ci_especialista'=>$this->input->post('ci_especialista'),
    'fecha_hora'=>$fecha,
    'detalle'=>$file_name,
    'observacion' => $this->input->post('observaciones')
  );
  $this->db->insert('informe',$data);


 }

 

}
 ?>