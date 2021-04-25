<?php
class Home extends CI_Controller {

        public function index()
        {
             $data = $this->session->userdata();
             $data['title'] = "CRIME MAPPING SYSTEM";
                // $this->load->view('head', $data);
                $this->parser->parse('index', $data);

        }

        public function login()
        {
             $data['title'] = "LOGIN - CRIME MAPPING SYSTEM";
                // $this->load->view('head', $data);
                $this->parser->parse('login', $data);
        }
        public function ucp($register)
        {
             $data['title'] = "LOGIN - CRIME MAPPING SYSTEM";
                // $this->load->view('head', $data);
                $this->parser->parse('register', $data);
        }

        public function report_crime()
        {
              $data = $this->session->userdata();
             $data['title'] = "REPORT CRIME- CRIME MAPPING SYSTEM";
                // $this->load->view('head', $data);
                $this->parser->parse('report_crime', $data);

        }
        public function crime_reports()
        {
             $data['title'] = "REPORT CRIME- CRIME MAPPING SYSTEM";
                // $this->load->view('head', $data);
                $this->parser->parse('crime_reports', $data);
        }

        public function ongoing_crimes()
        {
             $data['title'] = "REPORT CRIME- CRIME MAPPING SYSTEM";
                // $this->load->view('head', $data);
                $this->parser->parse('ongoing_crime', $data);
        }


        public function login_user() {
        $login = $this->crime_model->login_user();
        if($login==false) {
          echo 'Invalid Email Address/Password';
        }
        else {
        $pass = $this->input->post('password');
        if(password_verify($pass,$login->password)) {
          $res = get_object_vars($login);
        $store =  $this->session->set_userdata($res);
          echo 'true';
        } else { echo 'Password is not correct';}
        }
      }

        public function save_user_data() {
          $email_check = $this->crime_model->email_check();
          if($email_check == true) {
            echo 'This email Address is already in use';
          } elseif($email_check == false) {
            $data = $this->crime_model->save_user_data();
            if($data==true) {
            echo 'true';
          } else {
            echo $data;
          }

          }

        }

        public function save_crime_report() {
            $data = $this->crime_model->save_crime_report();
            if($data==true) {
            echo 'true';
          } else {
            echo $data;
          }

          }

      }
