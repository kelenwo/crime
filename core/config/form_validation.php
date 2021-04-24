<?php
$config = array(
        'post/newpost' => array(
                array(
                        'field' => 'title',
                        'label' => 'Title',
                        'rules' => 'required|min_length[10]|max_length[30]',
                        array(
                'required'      => 'You have not provided %s.',
                'min_length[10]'     => 'too short'
        )
                ),
                array(
                        'field' => 'content',
                        'label' => 'Content',
                        'rules' => 'required'
                ),

        ),
        'register' => array(
                array(
                        'field' => 'email',
                        'label' => 'Email Address',
                        'rules' => 'required'
                ),
                array(
                        'field' => 'name',
                        'label' => 'Name',
                        'rules' => 'required'
                ),
                array(
                        'field' => 'password',
                        'label' => 'Password',
                        'rules' => 'required|matches[passconfirm]',
                        array(
                    'matches[passconfirm]' => 'Passwords do not match'
                        )
                ),
                array(
                        'field' => 'passconfirm',
                        'label' => 'Re-enter Password',
                        'rules' => 'required'

                ),
                array(
                        'field' => 'mobile',
                        'label' => 'Mobile Number',
                        'rules' => 'required|numeric|exact_length[11]',
                        array(
                    'numeric' => 'Mobile Number is invalid',
                    'exact_length' => 'Mobile Number is invalid'
                        )
                ),


        ),
        'login' => array(
                array(
                        'field' => 'email',
                        'label' => 'Email Address',
                        'rules' => 'required'
                ),

                array(
                        'field' => 'password',
                        'label' => 'Password',
                        'rules' => 'required',
                        array(
                    'matches[passconfirm]' => 'Passwords do not match'
                  ),
                ),
              ),
                'remita' => array(
                        array(
                                'field' => 'payerEmail',
                                'label' => 'Email Address',
                                'rules' => 'required'
                        ),
                        array(
                                'field' => 'name',
                                'label' => 'Full Name',
                                'rules' => 'required'
                        ),
                        array(
                                'field' => 'payerName',
                                'label' => 'Registration Number',
                                'rules' => 'required'
                        ),
                        array(
                                'field' => 'payerPhone',
                                'label' => 'Mobile Number',
                                'rules' => 'required|numeric|exact_length[11]',
                                array(
                            'numeric' => 'Mobile Number is invalid',
                            'exact_length' => 'Mobile Number is invalid'
                          ),
                        ),
                        array(
                                'field' => 'department',
                                'label' => 'Department',
                                'rules' => 'required'
                        ),
                        array(
                                'field' => 'level',
                                'label' => 'Level',
                                'rules' => 'required'
                        ),
                ),
                'executives' => array(

                        array(
                                'field' => 'name',
                                'label' => 'Full Name',
                                'rules' => 'required'
                              ),

                ),
                'reprint' => array(

                        array(
                                'field' => 'rrr',
                                'label' => 'Remita Retrieval Reference',
                                'rules' => 'required|numeric',
                                array(
                            'numeric' => '%s% number is invalid',
                            'required' => 'This field cannot be left empty'
                          ),
                              ),

                ),
                'retrieve' => array(

                        array(
                                'field' => 'payerName',
                                'label' => 'Registration Number',
                                'rules' => 'required|min_length[12]',
                                array(
                            'min_length' => '%s% number is invalid',
                            'required' => 'This field cannot be left empty'
                          ),
                              ),

                ),

);
