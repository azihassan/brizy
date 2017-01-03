<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->library('form_validation');
		$this->load->helper(array('form', 'url'));
	}

	public function login()
	{
		if($this->session->has_userdata('logged_in'))
		{
			redirect('/admin/index');
			return;
		}
		$this->form_validation->set_rules('username', 'Username', 'required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required');
		if($this->form_validation->run() === false)
		{
			$this->load->view('login');
			return;
		}
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		if($username != 'azi.hassan@live.fr' || $password != 'foobar')
		{
			$this->load->view('login', array('login_error' => 'Invalid username or password'));
		}
		else
		{
			$this->session->set_flashdata('message', 'Welcome back ' . $username . '!');
			$this->session->set_userdata('logged_in', [
				'username' => $username,
				'timestamp' => time()
			]);
			redirect('admin/index');
		}
	}

	public function logout()
	{
		if(!$this->session->has_userdata('logged_in'))
		{
			redirect('admin/login');
			return;
		}
		$this->session->unset_userdata('logged_in');
		redirect('admin/login');
	}

	public function index()
	{
		if(!$this->session->has_userdata('logged_in'))
		{
			redirect('/admin/login');
			return;
		}
		$this->load->view('admin', array('message' => $this->session->flashdata('message')));
	}
}
