<?php 

class Users extends Controller{

    public function __construct() {
        $this->userModel = $this->model('User');
    }

    // handles loading and submitting form
    public function register() {

        // check to see if POST request
        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'name' => trim($_POST['name']),
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'confirm_password' => trim($_POST['confirm_password']),
                'name_err' => '',
                'email_err' => '',
                'password_err' => '',
                'confirm_password_err' => ''
            ];
            
            /* -- Validate fields and data --------------------------------- */

            // check 'name' !null
            if(empty($data['name'])){
              $data['name_err'] = 'Please enter name';
            }

            // check 'email' !null
            if(empty($data['email'])){
              $data['email_err'] = 'Please enter email';
            } else {
                // check email exists
                if($this->userModel->findUserByEmail($data['email'])){
                    $data['email_err'] = 'Email is already taken';
                }
            }

            // Password check !null, and min 6 characters
            if(empty($data['password'])){
                $data['password_err'] = 'Please enter password';
            } elseif(strlen($data['password']) < 6){
                $data['password_err'] = 'Password must be at least 6 characters';
            }

            // Confirm Password check !null, and same as 'password'
            if(empty($data['confirm_password'])){
                $data['confirm_password_err'] = 'Please confirm password';
            } else {
                if($data['password'] != $data['confirm_password']){
                    $data['confirm_password_err'] = 'Passwords do not match';
                }
            }

            /* -- submit data ---------------------------------------------- */

            // Make sure there are no errors
            if(empty($data['email_err']) && empty($data['name_err']) && empty($data['password_err']) && empty($data['confirm_password_err'])){
                // Hash Password
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
                // Register the user
                if($this->userModel->register($data)){
                    redirect('users/login');
                } else {
                    die ('something went wrong');
                }

            } else {

              // Load view and display any errors
              $this->view('users/register', $data);

            }

        } else {
            
            // Initialise data
            $data = [
                'name' => '',
                'email' => '',
                'password' => '',
                'confirm_password' => '',
                'name_err' => '',
                'email_err' => '',
                'password_err' => '',
                'confirm_password_err' => '',
                'err_msg' => ''

            ];
            
            // load view
            $this->view('users/register', $data);
        }
    }

    public function login() {
        // check to see if POST request
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
           
           // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'email_err' => '',
                'password_err' => '',
                'err_msg' => ''
            ];
            
            // print_r($this->getUrl());
            /* == Validate fields and data ================================= */

            // Email check !null
            if(empty($data['email'])){
              $data['email_err'] = 'Please enter email';
            }

            // Password check !null
            if(empty($data['password'])){
                $data['password_err'] = 'Please enter password';
            } 

            /* -- nbwREV ------------------------------------------------------
             | checking the email does not really make sense. it only checks if 
             | the email exists and displays an error if it does not but it does
             | not appear to do anything else.
             | should this be part of the validation process to login?
             */
            //check if email exists
            if($this->userModel->findUserByEmail($data['email'])){
                // user found
            } else {
                $data['email_err'] = 'No user found';
            }

            /* == submit data ============================================== */

            // Make sure there are no errors
            if(empty($data['email_err']) && empty($data['password_err'])){
                
                // check and set the user, will either hold the user $row or false
                $loggedInUser = $this->userModel->login($data['email'], $data['password']);

                if($loggedInUser){
                    // create session
                    $this->createUserSession($loggedInUser);
                } else {
                    $data['err_msg'] = 'Incorrect something';
                    // reload view
                    $this->view('users/login', $data);
                }

            } else { // Load view and display the errors
              $this->view('users/login', $data);
            }

        } else {
            
            // Initialise data
            $data = [
                'email' => '',
                'password' => '',
                'email_err' => '',
                'password_err' => '',
                'err_msg' => ''
            ];
            
            // Load view and display the errors
            $this->view('users/login', $data);
        }
    }

    public function createUserSession($user) {
        // the $user->? comes from login where the user was returned
        $_SESSION['user_id'] = $user->id;
        $_SESSION['name'] = $user->name;
        $_SESSION['email'] = $user->email;
        redirect('pages/index');
    }

    public function logout(){
        unset($_SESSION['user_id']);
        unset($_SESSION['user_email']);
        unset($_SESSION['user_name']);
        session_destroy();
        redirect('users/login');
    }
}
