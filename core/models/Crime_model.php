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
    
  }
}
