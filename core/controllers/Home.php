<?php
class Home extends CI_Controller {
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
             $data['title'] = "CRIME MAPPING SYSTEM";
                // $this->load->view('head', $data);
                $this->parser->parse('index', $data);

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

        public function login()
        {
             $data['title'] = "LOGIN - CRIME MAPPING SYSTEM";
                // $this->load->view('head', $data);
                $this->parser->parse('login', $data);
        }

        public function report_crime()
        {
          if(empty($this->session->name)) {
              header('Location:'.base_url().'login');
          }
              $data = $this->session->userdata();
             $data['title'] = "REPORT CRIME- CRIME MAPPING SYSTEM";
                // $this->load->view('head', $data);
                $this->parser->parse('report_crime', $data);

        }
        public function crime_reports()
        {
          $data = $this->session->userdata();
          $data['reports'] = $this->crime_model->get_crime_reports();
          $data['title'] = "REPORT CRIME- CRIME MAPPING SYSTEM";
                // $this->load->view('head', $data);
                $this->parser->parse('crime_reports', $data);
        }

        public function ongoing_crimes()
        {
          $data = $this->session->userdata();
          $data['reports'] = $this->crime_model->get_crime_reports_ongoing();
          $data['title'] = "ONGOING CRIME- CRIME MAPPING SYSTEM";
                // $this->load->view('head', $data);
          $this->parser->parse('ongoing_crime', $data);
        }

        public function manage_users()
        {
          $data = $this->session->userdata();
          $get = $this->crime_model->get_users();
          $getAdmin = $this->crime_model->get_users_admin();
          $arr = array();
          foreach($get as $res) {
            $rep = $this->crime_model->count_reports_user($res['name']);
            $frep = $this->crime_model->count_false_reports_user($res['name']);
            $rev = $this->crime_model->count_reviews_user($res['name']);
            $new = array(
                  'id' => $res['id'],
                  'name' => $res['name'],
                  'email' => $res['email'],
                  'phone' => $res['phone'],
                  'rights' => $res['rights'],
                  'account_status' => $res['account_status'],
                  'date' => $res['date'],
                  'last_login' => $res['last_login'],
                  'reports' => $rep,
                  'false_reports' => $frep,
                  'reviews' => $rev
                   );
            array_push($arr,$new);
          }

          $arrn = array();
          foreach($getAdmin as $res) {
            $rep = $this->crime_model->count_reports_user($res['name']);
            $frep = $this->crime_model->count_false_reports_user($res['name']);
            $rev = $this->crime_model->count_reviews_user($res['name']);
            $new = array(
                  'id' => $res['id'],
                  'name' => $res['name'],
                  'email' => $res['email'],
                  'phone' => $res['phone'],
                  'rights' => $res['rights'],
                  'account_status' => $res['account_status'],
                  'date' => $res['date'],
                  'last_login' => $res['last_login'],
                  'reports' => $rep,
                  'false_reports' => $frep,
                  'reviews' => $rev
                   );
            array_push($arrn,$new);
          }

          //var_dump($arr);
          $data['users'] = $arr;
          $data['admin'] = $arrn;
          $data['title'] = "Manage Users- CRIME MAPPING SYSTEM";
                // $this->load->view('head', $data);
          $this->parser->parse('manage_users', $data);
        }

        public function view_crime($review, $id)
        {

          $data = $this->session->userdata();
          $data['reports'] = get_object_vars($this->crime_model->get_crime_reports_for_review($id));
          $data['reviews'] = $this->crime_model->get_crime_review($id);
          $data['reviews_count'] = $this->crime_model->count_crime_reviews($id);
          $data['title'] = "CRIME REVIEWS - CRIME MAPPING SYSTEM";
        //  var_dump($data['reviews']);
                // $this->load->view('head', $data);
          $this->parser->parse('reviews', $data);
        }

        public function map_data()
        {
          $data = $this->session->userdata();
          $data['title'] = "ADD MAP DATA- CRIME MAPPING SYSTEM";
                // $this->load->view('head', $data);
          $this->parser->parse('map_data', $data);
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

          public function save_map_data() {
              $data = $this->crime_model->save_map_data();
              if($data==true) {
              echo 'true';
            } else {
              echo $data;
            }

            }

            public function get_map_data() {
                $dat = $this->crime_model->get_map_data();
                $imploded = array();
                    foreach($dat as $array) {
                        $imploded[] = implode(',', $array);
                    }
                    echo implode(",", $imploded);
              //  echo $data;
            }
            public function get_map_data_where() {
                $data = $this->crime_model->get_map_data_where($this->input->post('location'));
              echo json_encode(
                $data);
              }

              public function get_map_data_block() {
                  $data = $this->crime_model->get_map_data_block($this->input->post('latitude'));
                echo json_encode($data);
                }

              public function get_crimes() {
                  $req = $this->crime_model->get_crimes_all();
                  $arr = array();
                    foreach($req as $res) {
                      $val = $this->crime_model->get_map_data_all($res['latitude']);
                    $new = array(
                          'id' => $res['id'],
                          'type' => $res['type'],
                          'description' => $res['description'],
                          'location' => $res['location'],
                          'report_by' => $res['report_by'],
                          'status' => $res['status'],
                          'report_id' => $res['report_id'],
                          'date' => $res['date'],
                          'time' => $res['time'],
                          'latitude' => $res['latitude'],
                          'longitude' => $res['longitude']
                           );

                    array_push($arr,$new);
                      }
                    //  var_dump($arr);
                echo json_encode($arr);
                }

            public function get_map_data_all() {
                $req = $this->crime_model->get_map_data_all();
                $arr = array(
                  'lat' => array(),
                  'lng' => array()
                );
                foreach($req as $res) {
                  array_push($arr['lat'],$res['latitude']);
                  array_push($arr['lng'],$res['longitude']);
                }
                  //var_dump($arr);
              echo json_encode($arr);
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

            public function update_user() {
            $update = $this->crime_model->update_user();
            if($update==true) {
            echo 'saved';
            } else {
            echo 'fail';}
            }

            public function update_crime_report() {
            $update = $this->crime_model->update_crime_report();
            echo $update;
            }

      }
