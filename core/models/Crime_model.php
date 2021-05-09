<?php
Class Crime_model Extends CI_model {

    public function email_check() {
//Checks if email address already exists in database
        $this->db->select('email');
        $this->db->where('email', $this->input->post('email'));
        $query = $this->db->get('users');
        if($query->num_rows() > 0 ) {
            return TRUE;
            //returns true if exists
        } else {
            return FALSE;
            //returns false if it doesnt exist
        }
    }

    public function get_users() {
      $query = $this->db->get('users');
      return $query->result_array();
    }

    public function get_crime_reports() {
      $this->db->where('report_by',$this->session->name);
      $query = $this->db->get('crime_report');
      return $query->result_array();
    }

    public function get_crime_reports_all() {
      $query = $this->db->get('crime_report');
      return $query->result_array();
    }

    public function get_crime_reports_for_review($id) {
      $this->db->select('*');
      $this->db->where('report_id',$id);
      $query = $this->db->get('crime_report');
      return $query->row();
    }

    public function get_crime_review($id) {
      $this->db->where('report_id',$id);
      $query = $this->db->get('crime_review');

      return $query->result_array();
    }

    public function get_crimes() {
      $this->db->select('location');
      $query = $this->db->get('crime_report');
      return $query->result_array();
    }

    public function get_crimes_all() {
      $this->db->select('*');
      $query = $this->db->get('crime_report');
      return $query->result_array();
    }

    public function get_map_data() {
      $this->db->select('blocks');
      $query = $this->db->get('map_data');
      return $query->result_array();
    }

    public function get_map_data_where($var) {
        $this->db->like('blocks',$var);
      $this->db->select('*');
      $query = $this->db->get('map_data');
      return $query->row();
    }

    public function password_check() {
        //$this->db->select('password');
        $this->db->limit(1);
        $this->db->where('email', $this->input->post('email'));
        $query = $this->db->get('admin');
        return $query->row();
    }
    public function login_user() {
        $this->db->select('*');
        $this->db->where('email', $this->input->post('email'));
        $query = $this->db->get('users');
        return $query->row();
    }

    public function save_user_data() {
		$data = array(
			'name' =>  $this->input->post('name'),
			'email' =>  $this->input->post('email'),
			'phone' =>  $this->input->post('phone'),
      'rights' => 'admin',
			'password' =>  password_hash($this->input->post('password'), PASSWORD_DEFAULT),
			'date' =>  date("d/m/Y"),
			);
		$query = $this->db->insert('users', $data);
	if($query) {
		return TRUE;
	} else {
		return mysqli_error();
	}
}

  public function save_crime_report() {
    $query = $this->db->insert('crime_report',$this->input->post());
    if($query) {
      return true;
    } else {
  		return mysqli_error();
  	}
  }

  public function save_review() {
    $query = $this->db->insert('crime_review',$this->input->post());
    if($query) {
      return true;
    } else {
      return mysqli_error();
    }
  }
  public function save_map_data() {
    $query = $this->db->insert('map_data',$this->input->post());
    if($query) {
      return true;
    } else {
      return mysqli_error();
    }
  }

  public function search_crimes() {
    $this->db->where('location',$this->input->post('location'));
    $query = $this->db->get('crime_report');
    if($query->num_rows() > 0 ) {
        return $query->result_array();
        //returns true if exists
    } else {
        return FALSE;
        //returns false if it doesnt exist
    }

  }
  public function search_crime_report() {
    $this->db->where('location',$this->input->post('location'));
    $query = $this->db->get('crime_report');
    if($query->num_rows() > 0 ) {
        return $query->result_array();
        //returns true if exists
    } else {
        return FALSE;
        //returns false if it doesnt exist
    }

  }

  public function count_reports_user($name) {
  $this->db->where('report_by',$name);
  $this->db->from('crime_report');
  return $this->db->count_all_results();
  }

  public function count_false_reports_user($name) {
  $this->db->where('report_by',$name);
  $this->db->where('verify','false');
  $this->db->from('crime_report');
  return $this->db->count_all_results();
  }

  public function count_reviews_user($name) {
  $this->db->where('review_by',$name);
  $this->db->from('crime_review');
  return $this->db->count_all_results();
  }
}
