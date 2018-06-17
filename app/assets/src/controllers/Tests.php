<?php 

/* Testing controller
    - testforms

    baseURL/controller/method = baseURL/ControllerName/ControllerFunctionName

*/

class Tests extends Controller{
  
    public function __construct(){
        // connect to model
        $this->myModel = $this->model('Test');
    }



    public function test(){
        
        $data = ['title' => 'Testing Page'];

        // call the model
        // $results = $this->Test->getResults();


        $this->view('pages/test', $data);
    }





 /* index is the default method so there is no need to add it to the url
       baseURL/controller/method = baseURL/testController/testMethod  */

    // public function testMethod(){
        
    //     /* -- LOAD VIEW and PASS DATA ------------------------
    //     | view takes 2 parameters ($view, $data = []) 
    //     | add data to the array ['arrayItemTitle' => 'array data'] or ['key' => 'value']
    //     | */

    //     // call the model
    //     $results = $this->testModel->getResults();

    //     $data = [
    //         'msg' => 'you have loaded the views/pages/test.php from the default view',
    //         'people' => $results,
    //         'firstname' => 'Nathan',
    //         'lastname' => 'Watts'
    //     ];
        

    //     $this->view('pages/test', $data);
    // }













    // form to enter data
    public function form() {

        // check to see if POST request
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $data = [
                'firstname' => trim($_POST['firstname']),
                'lastname' => trim($_POST['lastname']),
                'firstname_err' => '',
                'lastname_err' => ''
            ];
            
            // Validate fields
            if(empty($data['firstname'])){
              $data['firstname_err'] = 'Please enter first name';
            }
            if(empty($data['lastname'])){
              $data['lastname_err'] = 'Please enter last name';
            }

            $this->view('tests/form', $data);
        } else {
            // keep data if form is reset 
            $data = [
                'firstname' => '',
                'lastname' => '',
                'firstname_err' => '',
                'lastname_err' => ''
            ];
            
            // load view
            $this->view('tests/form', $data);
        }
    }

 

   

}

