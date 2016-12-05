<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Paciente_controller extends CI_Controller {
 
 function __construct()
 {
   parent::__construct();
   $this->load->library('pagination');

   $this->load->model('paciente_model');
 }
 
 function index()
 {
   $this->load->helper(array('form'));

   $session_data = $this->session->userdata('logged_in');
   $data['username'] = $session_data['username'];
   $data['id'] = $session_data['id'];
   //$data['nombre'] = $session_data['nombre'];
   //$data['apellido'] = $session_data['apellido'];

   $this->load->view('menu_navegacion_espe', $data);
   $this->load->view('c_paciente', $data);
 }

 function guardar(){


  $this->load->library('form_validation');
  // field name, error message, validation rules
  $this->form_validation->set_rules('nombre', 'El nombre ', 'trim|required|min_length[4]|xss_clean');
  $this->form_validation->set_rules('apellido', 'El apellido', 'trim|required|min_length[4]|xss_clean');
  $this->form_validation->set_rules('ci_paciente', 'La cedula', 'trim|required|min_length[4]|xss_clean');
 
  if($this->form_validation->run() == FALSE)
  {
   $this->index();
  }
  else
  {

    $ci_paciente = $this->input->post('ci_paciente');

    $query = $this->db->select('*')
                      ->from('paciente')
                      ->where('ci_paciente', $ci_paciente)
                      ->get();

          $sql = $query->row();


  if ($query -> num_rows() != 0 ){

   $session_data = $this->session->userdata('logged_in');
   $data['username'] = $session_data['username'];
   $data['id'] = $session_data['id'];
   
   $data['error'] = "Ya existe un paciente con esa cedula";

   $this->load->view('menu_navegacion_espe', $data);
   $this->load->view('ci_paciente', $data);

  }else{

     $this->load->model('paciente_model');
     $this->paciente_model->guardar();

     $session_data = $this->session->userdata('logged_in');
     $data['username'] = $session_data['username'];
     $data['id'] = $session_data['id'];
     

     $this->load->view('menu_navegacion_espe', $data);
     $this->load->view('paciente_cargado');
   }
  }

 }

 function editar(){

  $this->load->model('paciente_model');
  $this->paciente_model->editar();

  $session_data = $this->session->userdata('logged_in');
  $data['username'] = $session_data['username'];

  redirect('paciente_controller/tabla', 'refresh');

 }

 function buscar(){

  $this->load->model('paciente_model');
  $data['datos'] = $this->paciente_model->buscar(); // recuerda lo de data['datos'] que es con lo que enviamos informacion

  $session_data = $this->session->userdata('logged_in');
  $data['username'] = $session_data['username'];

  $this->load->view('menu_navegacion_espe',$data);
  
  $this->load->view('editar_paciente',$data);
 
 }

  public function tabla()
    {
        //pagination settings
        $config['base_url'] = site_url('paciente_controller/tabla');
        $config['total_rows'] = $this->db->count_all('paciente');
        $config['per_page'] = "20";
        $config["uri_segment"] = 4;
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
        $data['deptlist'] = $this->paciente_model->tabla_p($config["per_page"], $data['page']);           

        $data['pagination'] = $this->pagination->create_links();

           $session_data = $this->session->userdata('logged_in');
           $data['username'] = $session_data['username'];
           $data['id'] = $session_data['id'];

        //load the department_view
        $this->load->view('menu_navegacion_espe', $data);
        $this->load->view('v_tabla_paciente',$data);
    }

public function tabla_informe()
    {
        //pagination settings
        $config['base_url'] = site_url('paciente_controller/v_tabla_informe');
        $config['total_rows'] = $this->db->count_all('informe');
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
        $data['deptlist'] = $this->paciente_model->tabla_i($config["per_page"], $data['page']);           

        $data['pagination'] = $this->pagination->create_links();

           $session_data = $this->session->userdata('logged_in');
           $data['username'] = $session_data['username'];
           $data['id'] = $session_data['id'];

        //load the department_view
        $this->load->view('menu_navegacion_espe', $data);
        $this->load->view('v_tabla_informe',$data);
    }
    function buscar_t(){

        //pagination settings
        $config['base_url'] = site_url('paciente_controller/buscar_t');
        $config['total_rows'] = $this->db->count_all('paciente');
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
        $data['deptlist'] = $this->paciente_model->tabla_t($config["per_page"], $data['page']);           

        $data['pagination'] = $this->pagination->create_links();

           $session_data = $this->session->userdata('logged_in');
           $data['username'] = $session_data['username'];
           

        //load the department_view
        $this->load->view('menu_navegacion_espe', $data);
        $this->load->view('v_tabla_paciente',$data);      
   
    }

  function buscar_paciente(){

  $this->load->model('paciente_model');
  $data['datos'] = $this->paciente_model->buscar_paciente(); // recuerda lo de data['datos'] que es con lo que enviamos informacion

  $session_data = $this->session->userdata('logged_in');
  $data['username'] = $session_data['username'];

  $this->load->view('menu_navegacion_espe',$data);  
  $this->load->view('buscar_paciente',$data);
  
 }

 function busqueda(){
  $session_data = $this->session->userdata('logged_in');
  $data['username'] = $session_data['username'];

  $cedula = $this->input->post('ci_paciente');


  $query =  $this->db->query(' SELECT * FROM `paciente` WHERE ci_paciente='.$cedula.'');
  $sql = $query->row();

  echo $query;

//   if ($sql != null){
  //  $this->load->view('menu_navegacion_espe', $data);
  //  $this->load->view('ver_paciente', $sql);
  //}else{ 
   // $data['error'] = "No existe un paciente con esa cedula";
   // $this->load->view('menu_navegacion_espe', $data);
   // $this->load->view('buscar_paciente', $data);
  //}
 }


   function informe(){

  $this->load->model('paciente_model');
  $data['datos'] = $this->paciente_model->buscar_paciente(); // recuerda lo de data['datos'] que es con lo que enviamos informacion

  $session_data = $this->session->userdata('logged_in');
  $data['username'] = $session_data['username'];
  $data['id'] = $session_data['id'];

  $this->load->view('menu_navegacion_espe',$data);  
  $this->load->view('c_informe',$data);
  
 }

  function informe2(){

  $this->load->model('paciente_model');
  $data['datos'] = $this->paciente_model->buscar_paciente(); // recuerda lo de data['datos'] que es con lo que enviamos informacion

  $session_data = $this->session->userdata('logged_in');
  $data['username'] = $session_data['username'];

  $this->load->view('menu_navegacion_espe',$data);  
  $this->load->view('c_informe',$data);
  
 }

 function cargar_archivo(){

                 $this->load->helper(array('form', 'url'));

                $config['upload_path']          = './assents/descargas';
                $config['allowed_types']        = 'txt|doc|docx'; 
                $config['max_size']             = 400; //KB

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('userfile'))
                {
                        $error = array('error' => $this->upload->display_errors());

                        $this->load->model('paciente_model');
                        $data['datos'] = $this->paciente_model->buscar(); // recuerda lo de data['datos'] que es con lo que enviamos informacion
                        $data['informe'] = $this->paciente_model->buscar_informes(); // recuerda lo de data['datos'] que es con lo que enviamos informacion

                        $session_data = $this->session->userdata('logged_in');
                        $data['username'] = $session_data['username']; 

                        $data["error"] =  "El archivo que intenta cargar no esta permitido por su peso o por su tipo";          

                        $this->load->view('menu_navegacion_espe',$data);
                        
                        $this->load->view('ver_paciente',$data);
                        $this->load->view('v_tabla_informe',$data);

                }
                else
                {
                        $data = array('upload_data' => $this->upload->data());

                        $upload_data = $this->upload->data(); //Returns array of containing all of the data related to the file you uploaded.
                        $file_name = $upload_data['file_name'];

                        $this->paciente_model->informe($file_name);

                        $this->load->model('paciente_model');
                        $data['datos'] = $this->paciente_model->buscar(); // recuerda lo de data['datos'] que es con lo que enviamos informacion
                        $data['informe'] = $this->paciente_model->buscar_informes(); // recuerda lo de data['datos'] que es con lo que enviamos informacion

                        $session_data = $this->session->userdata('logged_in');
                        $data['username'] = $session_data['username'];

                        $data["error"] =  "Archivo cargado exitosamente";            

                        $this->load->view('menu_navegacion_espe',$data);
                        
                        $this->load->view('ver_paciente',$data);
                        $this->load->view('v_tabla_informe',$data);

                        
                }
   
 }

  function ver(){

  $this->load->model('paciente_model');
  $data['datos'] = $this->paciente_model->buscar(); // recuerda lo de data['datos'] que es con lo que enviamos informacion
  $data['informe'] = $this->paciente_model->buscar_informes(); // recuerda lo de data['datos'] que es con lo que enviamos informacion

  $session_data = $this->session->userdata('logged_in');
  $data['username'] = $session_data['username'];           

  $this->load->view('menu_navegacion_espe',$data);
  
  $this->load->view('ver_paciente',$data);
  $this->load->view('v_tabla_informe',$data);

 
 }


 
}
 
?>