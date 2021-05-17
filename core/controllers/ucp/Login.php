<?php
Class Login Extends CI_Controller{


  public function index() {
     $data['title'] = "LOGIN - CRIME MAPPING SYSTEM";
  $this->parser->parse('login',$data);
  }
  public function signin($return,$link) {
     $data['title'] = "LOGIN - CRIME MAPPING SYSTEM";
  $data['link'] = str_replace('-','/',$link);
  $this->parser->parse('login_return',$data);
  }

  public function login_user() {
  $login = $this->crime_model->login_user();
  if($login==false) {
    echo 'Invalid Email Address/Password';
  }
  else {
    if($login->account_status=='pending') {
      echo 'Your Account is not yet activated, Check your mail for activation link!!';
    } elseif($login->account_status=='disabled') {
          echo 'Your Account has been disabled!!';
        }
      elseif($login->account_status=='active') {
  $pass = $this->input->post('password');
  if(password_verify($pass,$login->password)) {
    $res = get_object_vars($login);
  $store =  $this->session->set_userdata($res);
    echo 'true';
  } else { echo 'Password is not correct';}
  }
}
}

public function save_user() {
$verify = $this->crime_model->email_check();
if($verify==true) {
  echo 'Email address already exist';
} else {
  $code = md5(time()); //Generate verification code
  $msg = '<h1 style="color:green;">Your account has been created successfully</h1><br>
  <a style="padding:15px;margin:5px;text-align:center;background-color:green;border-radius:10px;color:white;height:auto;width:100%;text-decoration:none;font-weight:bold;font-size:16px;"
  href="'.base_url('ucp/login/verify/'.$code).'">Click HERE to activate your account</a><br><h2></h2>';
  $this->email->from('Crime Mapping');
  $this->email->to($this->input->post('email'));
  $this->email->subject('Account Verification Crime Mapping');
  $this->email->message($msg);
  $send = $this->email->send();

if($send) {
  $save = $this->crime_model->save_user_data($code);
  if($save==true) {
$this->session->set_userdata($this->input->post());
echo 'true';
} else {
  echo 'false';
}
} else {
  show_error($this->email->print_debugger());
     return false;
}
  }
}

public function reset_auth() {
$verify = $this->crime_model->email_check();
if($verify!==true) {
  echo 'Email address does not exist';
} else {
  $code = md5(time()); //Generate verification code
  $msg = '<h1 style="color:green;">You asked to reset your password, kindly click on the button below to continue</h1><br>
  <a style="padding:15px;margin:5px;text-align:center;background-color:green;border-radius:10px;color:white;height:auto;width:100%;text-decoration:none;font-weight:bold;font-size:16px;"
  href="'.base_url('ucp/login/verify/'.$code).'">Reset account password</a><br><h2></h2>';
  $this->email->from('Crime Mapping');
  $this->email->to($this->input->post('email'));
  $this->email->subject('Password Reset - Crime Mapping');
  $this->email->message($msg);
  $send = $this->email->send();

if($send) {
  $save = $this->crime_model->save_user_data($code);
  if($save==true) {
echo 'true';
} else {
  echo 'false';
}
} else {
  show_error($this->email->print_debugger());
     return false;
}
  }
}


public function signup()
{
     $data['title'] = "Create an Account - CRIME MAPPING SYSTEM";
        // $this->load->view('head', $data);
        $this->parser->parse('register', $data);
}

public function password_reset()
{
     $data['title'] = "Reset Password - CRIME MAPPING SYSTEM";
        // $this->load->view('head', $data);
        $this->parser->parse('password_reset', $data);
}


public function verify($auth) {
if(empty($auth)) {
  show_404();
} else {
$update = $this->crime_model->update_user_auth($auth);
if($update==true) {
  $data['msg'] = 'true';
} else {
  $data['msg'] = $update;
}
$this->parser->parse('verify',$data);
}
}

public function verify_password($auth) {
$get = $this->crime_model->get_auth($auth);
if($get==false) {
  show_404();
} else {
$data['auth'] = $auth;
$this->parser->parse('reset',$data);
}
}

public function update_user_password() {
  $update = $this->crime_model->update_user_password();
  if($update==true) {
  echo 'true';
  } else {
    echo $update;
  }
}

  public function logout() {
  session_destroy();
    header('Location:'.base_url());
  }
}
