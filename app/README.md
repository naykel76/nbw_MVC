## Login
- review the authentication and login method

core calls the controller. which calls the method in the controller
the method in the controller calls both the model and the view


## Controller
- controllers/Controller.php
- ALL new controllers need to extend Controller
- The controller 'method' is what calls the 'view'.
- The method and view file must share a common name. For example, the default view is 'index' so the method will be <code>public function index(){}</code> and the file in the views folder will be index.php.

## Model 
- The model is what will reach into the database and return the data.
- create methods to perform specific actions. For example, insertArticle, deleteArticle.

## View
- Looks after the HTML
- views/folder/index.php (default view)
- views/folder/file.php.


## Work Flow

- **Create controller** in controllers/ControllerName.php 
- **Create controller class** <code>class NewController extends Controller{}</code>
	- **Create method** inside the controller <code>public function controllerMethodName(){}</code>
		- Add empty array to accept data. <code>$data = [];</code>
		-	Load the view into the method including the $data array <code>$this->view('viewFolder/viewFile', $data);</code>
			-	**see stage 1 controller example**
- **Create model** in models/MyModel.php
- **Create model class** <code>class MyModel{}</code>
	- Create an instance of the database in the model constructor <code>$this->db = new Database();</code>
	- Create model methods. For example, insertArticle, deleteArticle <code>public function modelMethodName(){}</code>
		-	**see stage 1 model example**

#### Stage 1 Controller
	class MyController extends Controller { // create controller class
		
		public function controllerMethodName() { // create method
			$data = []; // empty array waiting for data. (from model or manual)
			$this->view('viewFolder/viewFile', $data); // load the view and data array
		}
		
	}

#### Stage 1 Model
	class NewModel { // create model class
		
		private $db; // create database variable
		public function __construct() {
			$this->db = new Database(); // create instance of database
		}
		
		public function myModelMethod() { // create method
			$this->db->query('SELECT * FROM tbl_x');
			return this->db->resultSet();
		}
	}

- **Load model** in the controller's constructor <code>$this->myModelVar = $this->model('MyModel');</code>
- **Load data** into the controller method by calling the model method <code>$myModelData = $this->myModelVar->myModelMethod();</code>
- Set the returned data from the model to the $data array <code>$data = ['myData' => $myModelData;</code>. <br>
**Note:** This could/should be set to a variable first as shown in the examples below
-	**see stage 2 controller example**

#### Stage 2 Controller
	class MyController extends Controller { // create controller class

		public function __construct() {
			$this->myModelVar = $this->model('MyModel'); // load actual model
		}
		
		public function controllerMethodName() { // create method
			$this->myModelVar->myModelMethod()
		
			$data = []; // empty array waiting for data. (from model or manual)
			$this->view('viewFolder/viewFile', $data); // load the view and data array
		}
	}




