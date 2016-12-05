<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Administrador_controller extends CI_Controller {
 
 function __construct()
 {
   parent::__construct();
   $this->load->library('pagination');

   $this->load->model('administrador_model');
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
   $this->load->view('c_administrador', $data);
 }

 function guardar(){


  $this->load->library('form_validation');
  // field name, error message, validation rules
  $this->form_validation->set_rules('nombre', 'El nombre ', 'trim|required|min_length[4]|xss_clean');
  $this->form_validation->set_rules('apellido', 'El apellido', 'trim|required|min_length[4]|xss_clean');
  $this->form_validation->set_rules('ci_administrador', 'ci_administrador', 'trim|required|min_length[4]|xss_clean');
 
  if($this->form_validation->run() == FALSE)
  {
   $this->index();
  }
  else
  {

    $ci_administrador = $this->input->post('ci_administrador');

    $query = $this->db->select('*')
                      ->from('administrador')
                      ->where('ci_administrador', $ci_administrador)
                      ->get();

          $sql = $query->row();


  if ($query -> num_rows() != 0 ){

   $session_data = $this->session->userdata('logged_in');
   $data['username'] = $session_data['username'];
   $data['id'] = $session_data['id'];
   
   $data['error'] = "Ya existe un c_administrador con esa cedula";

   $this->load->view('menu_navegacion_admin', $data);
   $this->load->view('c_administrador', $data);

  }else{

     $this->load->model('administrador_model');
     $this->administrador_model->guardar();

     $session_data = $this->session->userdata('logged_in');
     $data['username'] = $session_data['username'];
     $data['id'] = $session_data['id'];
     

     $this->load->view('menu_navegacion_admin', $data);
     $this->load->view('administrador_cargado');
   }
  }

 }

 function editar(){

  $session_data = $this->session->userdata('logged_in');
     $data['username'] = $session_data['username'];
     $data['id'] = $session_data['id'];
     

     $this->load->view('menu_navegacion_admin', $data);
     $this->load->view('e_administrador');
 }

 function buscar(){

   $this->load->model('administrador_model');
   $this->especialista_model->tabla_administrador();

   $this->load->view('v_tabla_administrador');

 }

  public function tabla()
    {
        //pagination settings
        $config['base_url'] = site_url('administrador_controller/tabla');
        $config['total_rows'] = $this->db->count_all('administrador');
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
        $data['deptlist'] = $this->administrador_model->tabla_p($config["per_page"], $data['page']);           

        $data['pagination'] = $this->pagination->create_links();

           $session_data = $this->session->userdata('logged_in');
           $data['username'] = $session_data['username'];
           $data['id'] = $session_data['id'];

        //load the department_view
        $this->load->view('menu_navegacion_admin', $data);
        $this->load->view('v_tabla_administrador',$data);
    }


    function buscar_t(){

        //pagination settings
        $config['base_url'] = site_url('administrador_controller/buscar_t');
        $config['total_rows'] = $this->db->count_all('administrador');
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
        $data['deptlist'] = $this->administrador_model->tabla_t($config["per_page"], $data['page']);           

        $data['pagination'] = $this->pagination->create_links();

           $session_data = $this->session->userdata('logged_in');
           $data['username'] = $session_data['username'];
           

        //load the department_view
        $this->load->view('menu_navegacion_admin', $data);
        $this->load->view('v_tabla_administrador',$data);      
   
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