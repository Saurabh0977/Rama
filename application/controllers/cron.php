<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Cron extends CI_Controller {
 
 function __construct()
 {
     parent::__construct();

     // this controller can only be called from the command line
     //if (!$this->input->is_cli_request()) show_error('Direct access is not allowed');
 }

 public function send_mail()
    {
        $config = Array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_port' => 465,
            'smtp_user' => 'testmail0977@gmail.com', // change it to yours
            'smtp_pass' => 'testmail0977!@', // change it to yours
            'mailtype' => 'html',
            'charset' => 'iso-8859-1',
            'wordwrap' => TRUE
          );
          
                  $message = '';
                  $this->load->library('email', $config);
                $this->email->set_newline("\r\n");
                $this->email->from('testmail0977@gmail.com'); // change it to yours
                $this->email->to('testmail0977@gmail.com');// change it to yours
                $this->email->subject('Resume from JobsBuddy for your Job posting');
                $this->email->message($message);
                if($this->email->send())
               {
                echo 'Email sent.';
               }
               else
              {
               show_error($this->email->print_debugger());
              }
          
          

    }

    public function welcome()
    {

        echo "hello guys" ; 
    }

}

?>