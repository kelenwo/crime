<?php
class Dashboard extends CI_Controller {
  public function __construct()  {
          parent::__construct();
if(empty($this->session->email)) {
  if(empty(uri_string())) {
 header('Location:'.base_url().'ucp/login');
  } else {
    header('Location:'.base_url().'ucp/login/signin/return/'.str_replace('/','-',uri_string()));
  }
}
}
        public function index()
        {
             $data = $this->session->userdata();
             $data['reports'] = $this->crime_model->get_crime_reports_ongoing();
              //$data['review'] = $this->crime_model->get_crime_reports_all();
             $data['title'] = "CRIME MAPPING SYSTEM";
                // $this->load->view('head', $data);
                $this->parser->parse('user_index', $data);

        }

        public function about()
        {
             $data = $this->session->userdata();
             $data['reports'] = $this->crime_model->get_crime_reports_ongoing();
              //$data['review'] = $this->crime_model->get_crime_reports_all();
             $data['title'] = "ABOUT - CRIME MAPPING SYSTEM";
                // $this->load->view('head', $data);
                $this->parser->parse('user_about', $data);

        }

        public function crime_review($id)
        {
             $data = $this->session->userdata();
             $data['reports'] = get_object_vars($this->crime_model->get_crime_reports_for_review($id));
             $data['review'] = $id;
             $data['title'] = "CRIME MAPPING SYSTEM";

                // $this->load->view('head', $data);
                $this->parser->parse('user_review_post', $data);

        }

        public function crime_reports()
        {
          $data = $this->session->userdata();
          $data['reports'] = $this->crime_model->get_crime_reports();
          $data['title'] = "REPORT CRIME- CRIME MAPPING SYSTEM";
                // $this->load->view('head', $data);
                $this->parser->parse('user_crime_reports', $data);
        }

        public function report_crime()
        {
             $data = $this->session->userdata();
             $data['title'] = "CRIME MAPPING SYSTEM";
                // $this->load->view('head', $data);
                $this->parser->parse('user_report_crime', $data);

        }
        public function crime_search($location)
        {

             $data = $this->session->userdata();
             $data['records'] = $this->crime_model->search_crimes();
             $data['addr'] = $this->input->post('location');
             $data['title'] = "CRIME MAPPING SYSTEM";
                // $this->load->view('head', $data);
                $this->parser->parse('crime_search', $data);

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

        public function do_upload(){
      $type = $this->input->post('type');
        $config['allowed_types']        = 'jpg|jpeg|png';
        $config['max_size']             = 10000;
        $config['upload_path']          = './uploads/images/';
        $this->upload->initialize($config);
              if($this->upload->do_upload('doc')){
        $document = $this->upload->data('file_name');
        $arr = array(
          'success' => 'true',
          'file_name' => $document,
        );
        echo json_encode($arr);
              } else {
                $msg = $this->upload->display_errors();
                $arr = array(
                  'success' => 'false',
                  'msg' => $msg,
                );
                echo json_encode($arr);
          }
        }

        public function save_crime_report() {
            $data = $this->crime_model->save_crime_report();
            $admin_email = $this->crime_model->get_mail_list();
            if($data==true) {

              foreach($admin_email as $mail) {
                $msg = '<h4>Distress Call:</h4><p>A crime incident identified with the following info has been reported.</p>
                <p style="margin-bottom:3px;">Crime Type:&nbsp;&nbsp;'. $this->input->post("type").'
                Closest To:&nbsp;&nbsp;'. $this->input->post("location").'<br>
                Date:&nbsp;&nbsp;'. date("d F, Y", strtotime($this->input->post("date"))).'<br>
                Time:&nbsp;&nbsp;'. date("h:i:s A", strtotime($this->input->post("time"))).'<br></p>
                <h4>Reported By:</h4>
                <p style="margin-bottom:3px;">Name:&nbsp;&nbsp;'. $this->input->post("report_by").'<br>
                Email:&nbsp;&nbsp;'. $this->session->email.'<br>
                Phone Number:&nbsp;&nbsp;'. $this->session->phone.'<br></p>
                <p>Login to dashboard to view more informations about the crime. <br><i>Best regards</i></p>';

                $this->email->from('no-reply@cms.com','Crime Mapping');
                $this->email->to($mail['email']);
                $this->email->subject('Crime Mapping - Crime Alert Reported');
                $this->email->message($msg);
                $this->email->send();
              }

            echo 'true';
          } else {
            echo $data;
          }
        }

          public function save_review() {
              $data = $this->crime_model->save_review();
              if($data==true) {
              echo 'true';
            } else {
              echo $data;
            }

          }
          public function get_crimes() {
              $data = $this->crime_model->get_crimes();
            echo json_encode($data);
            }
            public function get_map_data_where() {
                $data = $this->crime_model->get_map_data_where();
              echo json_encode($data);
              }
          public function search_crime_reports() {
        //    if(empty($this->input->post('sort')) {
          //    $sort =
            //}
              $data = $this->crime_model->search_crime_report();
              if($data==FALSE) {
                echo json_encode('false');
              } else {
            echo json_encode($data);
          }

            }

      }
