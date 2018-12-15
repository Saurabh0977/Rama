<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include_once('Base_Controller.php');
class Users extends Base_Controller{
	public function dashboard()
	{
        $this->load->model('model_users');
        $uid = $this->session->userdata('uid');
        if($this->session->userdata('type') == 1) {
            $data['operators'] = $this->get_operators_for_dashboard(); 
            $data['circulation'] = $this->get_current_circulation();
            $this->load_view('admin/dashboard', $data);
        } else {
            $current_balance =  $this->model_users->get_current_balance_from_user($uid);
            $current_balance = $this->moneyFormatIndia($current_balance);
            $data['current_balance'] = $current_balance;
		    $this->load_view('operator/dashboard', $data);
        }
    }

   


    function get_operators_for_dashboard() {
        $this->load->model('model_users');
        $operators = $this->model_users->getall_operators();
        return $operators;
    }

    function get_current_circulation() {
        $this->load->model('model_users');
        $operators = $this->model_users->getall_operators();
        $circulation = 0;
        foreach($operators as $operator) {
            $circulation = $circulation + $operator->CURRENT_QTY;
        }
        return $circulation;
    }


	public function add_money_form()
	{
		$data['message'] = "";
		$this->load->model('model_users');
		$data['user'] = $this->model_users->get_operator_name();

		$this->load_view('add_money' , $data);

	}

    function moneyFormatIndia($num) {
    $explrestunits = "" ;
    if(strlen($num)>3) {
        $lastthree = substr($num, strlen($num)-3, strlen($num));
        $restunits = substr($num, 0, strlen($num)-3); // extracts the last three digits
        $restunits = (strlen($restunits)%2 == 1)?"0".$restunits:$restunits; // explodes the remaining digits in 2's formats, adds a zero in the beginning to maintain the 2's grouping.
        $expunit = str_split($restunits, 2);
        for($i=0; $i<sizeof($expunit); $i++) {
            // creates each of the 2's group and adds a comma to the end
            if($i==0) {
                $explrestunits .= (int)$expunit[$i].","; // if is first value , convert into integer
            } else {
                $explrestunits .= $expunit[$i].",";
            }
        }
        $thecash = $explrestunits.$lastthree;
    } else {
        $thecash = $num;
    }
    return $thecash; // writes the final format where $currency is the currency symbol.
}

    public function add_money_form_operator()
    {
        $data['message'] = "";
        

        $this->load_view('add_money_operator' , $data);

    }

    public function add_money_operator()
    {
        $amount = $this->input->post('amount');
        $amount_r = $this->input->post('amount_r');
        $amount_at = $this->input->post('amount_at');
        $sdate = date('Y-m-d');
        $createdby = $this->session->userdata('uid');
        $bal = $this->input->post('amount');
        $current_qty = $this->input->post('amount');
        $usertype = $this->session->userdata('uid');


        $this->load->model('model_users');
        $this->model_users->add_money($amount,$amount_r,$amount_at,$sdate,$bal,$usertype,$createdby);
        
        $this->model_users->update_current_qty_to_users($createdby,$current_qty);

        $data['message'] = "The Amount of Rs <strong> " . $amount . "</strong> has been added Successfully!";
        

        $this->load_view('add_money_operator' , $data);

    }


	public function add_money()
	{
        $amount = $this->input->post('amount');
        $amount_r = $this->input->post('amount_r');
        $amount_at = $this->input->post('amount_at');
		$sdate = $this->input->post('sdate');
		$createdby = $this->session->userdata('uid');
		$usertype = $this->input->post('usertype');
        $bal = $this->input->post('amount');
        $current_qty = $this->input->post('amount');

		$this->load->model('model_users');
		$this->model_users->add_money($amount,$amount_r,$amount_at,$sdate,$bal,$usertype,$createdby);
        
        $this->model_users->update_current_qty_to_users($usertype,$current_qty);
        $data['message'] = "The Amount of Rs <strong> " . $amount . "</strong> has been added Successfully!";
        $this->load_view('add_money' , $data);
        
	}

	public function add_expense_form()
	{
		$data['message'] = "";
		$this->load->model('model_users');
		$data['user'] = $this->model_users->get_operator_name();
		$this->load_view('add_expense' , $data);
	}

    public function add_expense_form_operator()
    {
        $data['message'] = "";
        $this->load->model('model_users');
        $data['user'] = $this->model_users->get_operator_name();
        $this->load_view('add_expense_operator' , $data);
    }

    public function add_expense_operator()
    {
        $amount = $this->input->post('amount');
        $edate = date('Y-m-d');
        $desc = $this->input->post('desc');
        $createdby = $this->session->userdata('uid');

        $this->load->model('model_users');
        
        $current_balance = $this->model_users->get_current_balance_from_user($createdby);
        
        $result = $this->model_users->get_money_list();
        $required_balance = $amount;

        if($current_balance >= $required_balance)
        {
            $this->model_users->add_expense($amount,$edate,$createdby,$desc,$createdby);
            $this->model_users->subtract_current_balance($createdby, $amount);
             $data['message'] = "The Expense of Rs <strong> " . $amount . "</strong> has been added Successfully!";
        foreach($result as $row)
        {
            if($required_balance != 0) {
                if($required_balance <= $row->BALANCE)
                {
                    //Subtracting required balance from row->BALANCE
                    $this->model_users->subtract_from_balance($row->ID, $required_balance);
                    $required_balance = 0;
                } else {
                    $required_balance = $required_balance - $row->BALANCE;
                    //Empty the balance for this row
                    $this->model_users->empty_balance_for_row($row->ID);
                }
            } else {
                break;
            }
        }}

        else
        {
             $data['message'] = "Insufficient Funds.";
        }
         $this->load_view('add_expense_operator' , $data);
    }

	public function add_expense()
	{
		$amount = $this->input->post('amount');
		$edate = $this->input->post('edate');
		$desc = $this->input->post('desc');
		$createdby = $this->session->userdata('uid');
		$usertype = $this->input->post('usertype');

		$this->load->model('model_users');
		
        $current_balance = $this->model_users->get_current_balance_from_user($usertype);
        
        $result = $this->model_users->get_money_list();
        $required_balance = $amount;

        if($current_balance >= $required_balance)
        {
            $this->model_users->add_expense($amount,$edate,$usertype,$desc,$createdby);
            $this->model_users->subtract_current_balance($usertype, $amount);
            foreach($result as $row)
            {
                if($required_balance != 0) {
                    if($required_balance <= $row->BALANCE)
                    {
                        //Subtracting required balance from row->BALANCE
                        $this->model_users->subtract_from_balance($row->ID, $required_balance);
                        $required_balance = 0;
                    } else {
                        $required_balance = $required_balance - $row->BALANCE;
                        //Empty the balance for this row
                        $this->model_users->empty_balance_for_row($row->ID);
                    }
                } else {
                    break;
                }
            }
            redirect(site_url('users/expenses_list'));
        }

        else
        {
            
        }
    }

    function empty_balance_for_row($id) {
        $this->load->model('model_users');
        $result = $this->model_users->empty_balance_for_row($id);
        return $result; 
    }



	public function add_user_form()
	{
		$data['message'] = "";
		$data['users'] = $this->fetch_allusers();
		$this->load_view('add_user' , $data);

	}

	public function create_user()
    {
        $name = $this->input->post('name');
        $uname = $this->input->post('uname');
        $pass = $this->input->post('pass');
        $rpass = $this->input->post('rpass');
       
        $phone = $this->input->post('phone');

        $intermediatesalt = md5(uniqid(rand(),true));
        $salt = substr($intermediatesalt, 0 ,16);
        $hash = hash("sha256" , $pass . $salt);
        $usertype = $this->input->post('usertype');



        $this->load->model('model_users');
        $this->model_users->create_user($name,$uname,$hash,$phone,$salt,$usertype);

      	$data['message'] = "The User <strong> " . $name . "</strong> has been added Successfully!";
		$data['users'] = $this->fetch_allusers();
		$this->load_view('add_user' , $data);


    }
    
    public function users_list()
    {

    	$this->load->model('model_users');
    	$result	 = $this->model_users->get_users_list();

    	foreach($result as $row)
    	{

    		$row->USER_TYPE_NAME = $this->get_user_type_name_by_id($row->TYPE);
    	}

    	$data['user'] = $result ;  
    	$this->load_view('users_list' , $data);
    }

    public function money_list()
    {

    	$this->load->model('model_users');
    	$result = $this->model_users->get_money_list();

    	foreach($result as $row)
    	{

    		$row->OPERATOR_NAME = $this->get_operator_name_by_id($row->UID);
    	}

    	$data['money'] = $result; 
    	$this->load_view('money_list' , $data);

    }

    public function expenses_list()
    {
    	$this->load->model('model_users');
    	$expenses = $this->model_users->get_expenses_list();
        foreach($expenses as $expense) {
            $expense->OPNAME = $this->get_operator_name_by_id($expense->UID);
        }
        $data['expenses'] = $expenses;
    	$this->load_view('expenses_list' ,$data);


    }

    public function money_list_operator()
    {
        $this->load->model('model_users');
        $operator_id = $this->session->userdata('uid');
        $result = $this->model_users->get_money_list_for_operator($operator_id);

        foreach($result as $row)
        {
            $row->OPERATOR_NAME = $this->get_operator_name_by_id($row->UID);
        }

        $data['money'] = $result;
        $this->load_view('operator/money_list' , $data);

    }

    public function expenses_list_operator()
    {
        $this->load->model('model_users');
        $operator_id = $this->session->userdata('uid');
        $result = $this->model_users->get_expenses_list_for_operator($operator_id);
        foreach($result as $row) {
            $row->OPNAME = $this->get_operator_name_by_id($row->CREATED_BY);
        }
        $data['expenses'] = $result;
        $this->load_view('operator/expenses_list' ,$data);
    }

    public function get_operator_name_by_id($uid)
    {
    	$this->load->model('model_users');
    	$result = $this->model_users->fetch_operator_name_by_id($uid);
    	return $result;

    }

    public function edit_user_form($id)
    {


    	$this->load->model('model_users');
    	$data['user'] = $this->model_users->get_user_details_by_id($id);
    	$data['users'] = $this->fetch_allusers();
    	$data['message'] = "";
     	$this->load_view('edit_user_form' , $data);

    }

    public function update_user($id)
    {

    	$name = $this->input->post('name');
        $uname = $this->input->post('uname');
        $pass = $this->input->post('pass');
        $rpass = $this->input->post('rpass');
       
        $phone = $this->input->post('phone');

        $intermediatesalt = md5(uniqid(rand(),true));
        $salt = substr($intermediatesalt, 0 ,16);
        $hash = hash("sha256" , $pass . $salt);
        $usertype = $this->input->post('usertype');



        $this->load->model('model_users');
        $this->model_users->update_user($id,$name,$uname,$hash,$phone,$salt,$usertype);

      	$data['message'] = "The User <strong> " . $name . "</strong> has been Updated Successfully!";
		$data['users'] = $this->fetch_allusers();
		$this->load_view('add_user' , $data);
    }

    	 public function logout()
        {
        $this->load->model('model_users');
        $this->model_users->logout_user();
        header('location:/rama');

        }

        public function delete_user($id)
        {
        	$this->load->model('model_users');
        	$this->model_users->delete_user_by_id($id);
        	
        }

        public function activate_user($id)
        {
            $this->load->model('model_users');
            $this->model_users->activate_user_by_id($id);
        }

        public function report_list()
        {
            $this->load->model('model_users');
            $data['user'] = $this->model_users->get_operator_name();


            $this->load_view('admin/report_list_view' , $data);
        }

        public function create_report ($id)
        {

            $fdate = $this->input->post('fdate');
            $tdate = $this->input->post('tdate');
            $preview = $this->input->post('preview');
            $download  = $this->input->post('download');
            
                $this->load->model('model_users');
                $result = $this->model_users->get_operator_details_from_expense($id,$fdate,$tdate);
                
                foreach($result as $row)
                {

                    $row->NAME = $this->get_operator_name_by_id($row->UID);
                }

                $data['expense'] = $result; 

                if(isset($preview))
                {

            //load the view and saved it into $html variable
                $html=$this->load->view('admin/report_operator', $data,  true);

//this the the PDF filename that user will get to download
//$pdfFilePath = "Items_list.pdf";

//load mPDF library
                $this->load->library('m_pdf');

//generate the PDF from the given html
                $this->m_pdf->pdf->WriteHTML($html);

//I for [ PREVIEW ]
                $this->m_pdf->pdf->Output($pdfFilePath, "I"); 

            }

            if(isset($download))
            {

                 //load the view and saved it into $html variable
                $html=$this->load->view('admin/report_operator', $data,  true);

//this the the PDF filename that user will get to download
//$pdfFilePath = "Items_list.pdf";

//load mPDF library
                $this->load->library('m_pdf');

//generate the PDF from the given html
                $this->m_pdf->pdf->WriteHTML($html);

//I for [ PREVIEW ]
                $this->m_pdf->pdf->Output($pdfFilePath, "D"); 

            }
        
        }


        public function search_username()
        {
            $this->load->model('model_users'); 
            $val = $this->input->post('val');
            $result = $this->model_users->fetch_username_by_ajax($val);
            
            if(count($result) == 0)
            {
                echo "0";
                //echo "<a style='color:red'><strong>Username Not Available</strong></a>";
            }
            else{
                echo "1";
                //echo "<a style='color:green'><strong>Username Available</strong></a>" ;
            }
            

        }
        
        public function search_phone_number()
        {
            $this->load->model('model_users');
            $number = $this->input->post('number');
            $result = $this->model_users->fetch_mobile_number_by_ajax($number);

            if(count($result) == 0)
            {
                echo "0";
                //echo "<a style='color:red'><strong>Username Not Available</strong></a>";
            }
            else{
                echo "1";
                //echo "<a style='color:green'><strong>Username Available</strong></a>" ;
            }

        }






}

?>