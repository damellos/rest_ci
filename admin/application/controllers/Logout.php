<?php

	class Logout extends CI_Controller {

		public function index()
		{
			$this->session->unset_userdata("id_admin");
			$this->session->unset_userdata("username");
			$this->session->unset_userdata("nama");

			redirect('login','refresh');
		}

	}
?>