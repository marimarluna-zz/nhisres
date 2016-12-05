<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Especialista_controller extends CI_Controller {
 
 function __construct()
 {
   parent::__construct();
   $this->load->library('pagination');

   $this->load->model('especialista_model');
 }
 
 function index()
 {
   $this->load->helper(array('form'));

   $session_data = $this->session->userdata('logged_in');
   $data['username'] = $session_data['username'];
   $data['id'] = $session_data['id'];
   //$data['nombre'] = $session_data['nombre'];
   //$data['apellido'] = $session_data['apellido'];

   $this->load->view('menu_navegacion_admin', $data);
   $this->load->view('c_especialista', $data);
 }

 function guardar(){


  $this->load->library('form_validation');
  // field name, error message, validation rules
  $this->form_validation->set_rules('nombre', 'El nombre ', 'trim|required|min_length[4]|xss_clean');
  $this->form_validation->set_rules('apellido', 'El apellido', 'trim|required|min_length[4]|xss_clean');
  $this->form_validation->set_rules('ci_especialista', 'ci_especialista', 'trim|required|min_length[4]|xss_clean');
 
  if($this->form_validation->run() == FALSE)
  {
   $this->index();
  }
  else
  {

    $ci_especialista = $this->input->post('ci_especialista');

    $query = $this->db->select('*')
                      ->from('especialista')
                      ->where('ci_especialista', $ci_especialista)
                      ->get();

          $sql = $query->row();


  if ($query -> num_rows() != 0 ){

   $session_data = $this->session->userdata('logged_in');
   $data['username'] = $session_data['username'];
   $data['id'] = $session_data['id'];
   
   $data['error'] = "Ya existe un especialista con esa cedula";

   $this->load->view('menu_navegacion_admin', $data);
   $this->load->view('c_especialista', $data);

  }else{

     $this->load->model('especialista_model');
     $this->especialista_model->guardar();

     $session_data = $this->session->userdata('logged_in');
     $data['username'] = $session_data['username'];
     $data['id'] = $session_data['id'];
     

     $this->load->view('menu_navegacion_admin', $data);
     $this->load->view('especialista_cargado');
   }
  }

 }

 function editar(){

  $this->load->model('especialista_model');
  $this->especialista_model->editar();

  $session_data = $this->session->userdata('logged_in');
  $data['username'] = $session_data['username'];


  redirect('especialista_controller/tabla', 'refresh');
 }

function buscar(){

  $this->load->model('especialista_model');
  $data['datos'] = $this->especialista_model->buscar(); // recuerda lo de data['datos'] que es con lo que enviamos informacion
  $data1['datos1'] = $this->especialista_model->buscar();

  $session_data = $this->session->userdata('logged_in');
  $data['username'] = $session_data['username'];

  $this->load->view('menu_navegacion_admin',$data);
  
  $this->load->view('editar_especialista',$data);
 
 }
  public function tabla()
    {
        //pagination settings
        $config['base_url'] = site_url('especialista_controller/tabla');
        $config['total_rows'] = $this->db->count_all('especialista');
        $config['per_page'] = "7";
        $config["uri_segment"] = 3;
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);

        //config for bootstrap pagination class integration
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = false;
        $config['last_link'] = false;
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';

        $this->pagination->initialize($config);
        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        //call the model function to get the department data
        $data['deptlist'] = $this->especialista_model->tabla_p($config["per_page"], $data['page']);           

        $data['pagination'] = $this->pagination->create_links();

           $session_data = $this->session->userdata('logged_in');
           $data['username'] = $session_data['username'];
           $data['id'] = $session_data['id'];

        //load the department_view
        $this->load->view('menu_navegacion_admin', $data);
        $this->load->view('v_tabla_especialista',$data);
    }


    function buscar_t(){

        //pagination settings
        $config['base_url'] = site_url('especialista_controller/buscar_t');
        $config['total_rows'] = $this->db->count_all('especialista');
        $config['per_page'] = "7";
        $config["uri_segment"] = 3;
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);

        //config for bootstrap pagination class integration
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = false;
        $config['last_link'] = false;
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';

        $this->pagination->initialize($config);
        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        //call the model function to get the department data
        $data['deptlist'] = $this->especialista_model->tabla_t($config["per_page"], $data['page']);           

        $data['pagination'] = $this->pagination->create_links();

           $session_data = $this->session->userdata('logged_in');
           $data['username'] = $session_data['username'];
           

        //load the department_view
        $this->load->view('menu_navegacion_admin', $data);
        $this->load->view('v_tabla_especialista',$data);      
   
    }

     /* function eliminar(){

     $session_data = $this->session->userdata('logged_in');
     $id = $session_data['id'];

     $query = $this->db->query(' SELECT * FROM `usuario` WHERE id = "'.$id.'"');
     $sql = $query->row();
     
     $vis = $sql->tipo;

    if($vis == 1){

    $this->load->model('especialista_model');
    $this->causante_model->eliminar();
    $data['error'] = 'El Especialista ha sido eliminado exitosamente';

    } else {

      $data['error'] = 'Como usuario no posee el permiso para eliminar';
      
    }

        //pagination settings
        $config['base_url'] = site_url('causante_controller/tabla');
        $config['total_rows'] = $this->db->count_all('causante');
        $config['per_page'] = "7";
        $config["uri_segment"] = 3;
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);

        //config for bootstrap pagination class integration
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = false;
        $config['last_link'] = false;
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';

        $this->pagination->initialize($config);
        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        //call the model function to get the department data
        $data['deptlist'] = $this->causante_model->tabla_p($config["per_page"], $data['page']);           

        $data['pagination'] = $this->pagination->create_links();

           $session_data = $this->session->userdata('logged_in');
           $data['nickname'] = $session_data['nickname'];
           $data['id'] = $session_data['id'];
           $data['nombre'] = $session_data['nombre'];
           $data['apellido'] = $session_data['apellido'];

        //load the department_view
        $this->load->view('menu_navegacion_admin', $data);
        $this->load->view('v_tabla_causantes',$data);
 } */

 
}
 
?>