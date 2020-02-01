<?php
class AuthController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('AuthModel');
    }
    public function index()
    {
        if ($this->AuthModel->AuthorizeUser() == true) {
            redirect(base_url() . 'index.php/AuthController/dashboard');
        } else {
            $this->load->view('Login/login');

        }
    }
    public function register()
    {

        if ($this->AuthModel->AuthorizeUser() == true) {
            redirect(base_url() . 'index.php/AuthController/dashboard');
        } else {

            $this->form_validation->set_message('is_unique', 'Email is Already Exist Please Try Another');
            $this->form_validation->set_rules('name', 'Name', 'required');
            $this->form_validation->set_rules('username', 'Username', 'required');
            $this->form_validation->set_rules('Email', 'Email', 'required|valid_email|is_unique[users.email]');
            $this->form_validation->set_rules('password', 'Password', 'required');

            if ($this->form_validation->run() == true) {
                $this->load->view('Login/login');
                $data_array = array();

                $data_array['name'] = $this->input->post('name');
                $data_array['email'] = $this->input->post('Email');
                $data_array['username'] = $this->input->post('username');
                $data_array['password'] = password_hash($this->input->post('password'), PASSWORD_BCRYPT);
                $this->AuthModel->saveRegister($data_array);

                $this->session->set_flashdata("msg", "Your Account has been Successfully Created");

                redirect(base_url() . 'index.php/AuthController/register');

            } else {
                $this->load->view('Login/Registration');

            }
        }

    }

    //Login Method //

    public function login()
    {
        if ($this->AuthModel->AuthorizeUser() == true) {
            // $user=$this->session->userdata('user');
            // $data['user']=$user;
            // $this->load->view('Dashboard/dashboard',$data);
            redirect(base_url() . 'index.php/AuthController/dashboard');
        } else {

            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('password', 'Password', 'required');

            if ($this->form_validation->run() == true) {
                $email = $this->input->post('email');
                $user = $this->AuthModel->CheckUser($email);
                if (!empty($user)) {
                    //echo json_encode($user);
                    $password = $this->input->post('password');
                    if (password_verify($password, $user['password']) == true) {

                        $sessArray['id'] = $user['user_id'];
                        $sessArray['name'] = $user['name'];
                        $sessArray['emai'] = $user['email'];
                        $sessArray['username'] = $user['username'];
                        $this->session->set_userdata('user', $sessArray);
                        redirect(base_url() . 'index.php/AuthController/dashboard');
                    } else {
                        $this->session->set_flashdata('msg', 'Either Password or Email is Incorrecr.Please try Again');
                        redirect(base_url() . 'index.php/AuthController/login');

                    }
                } else {
                    $this->session->set_flashdata('msg', 'Either Password or Email is Incorrecr.Please try Again');
                    redirect(base_url() . 'index.php/AuthController/login');
                }
            } else {
                $this->load->view('Login/login');

            }
        }

    }

    //Load Dashboard //

    public function dashboard()
    {
        if ($this->AuthModel->AuthorizeUser() == true) {
            $user = $this->session->userdata('user');
            $data['user'] = $user;
            $this->load->view('Dashboard/dashboard', $data);

        } else {
            $this->session->set_flashdata('msg', "Access Denied ");
            redirect(base_url() . 'index.php/AuthController');
        }

    }

    //Logout Function

    public function logout()
    {
        $this->session->unset_userdata('user');
        redirect(base_url() . 'index.php/AuthController');
    }
}
