<?php
if (class_exists("Controller")) {

	class home extends Controller
	{
		function __construct()
		{
			parent::__construct();
			$this->view->js = array('home/default.js');


			if (class_exists('otherfunctions')) {
				$of = new otherfunctions();
				$of->set_ip();
				echo $of->get_ip();
			} else {
				echo "Something is wrong in home/cons";
			}


		}
		function Index()
		{
			$this->view->main = "index";
			$this->view->render('home/index');
		}
		function run()
		{
			$token_value = csrf::get_token_csrf();
			$_POST['csrf_val'] = $token_value;
			$this->model->run();
		}
		function sign_check()
		{

			$token_value = csrf::get_token_csrf();
			$_POST['csrf_val'] = $token_value;
			$this->model->sign_check();
		}

		function sign_up()
		{
			$token_value = csrf::get_token_csrf();
			$_POST['csrf_val'] = $token_value;

			$this->model->sign_up();

		}

	}

} else {
	echo "You should not be here. ";
}

?>