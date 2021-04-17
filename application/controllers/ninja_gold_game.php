<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ninja_Gold_Game extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
        $this->load->view('ninja_gold_game/index.php');
    }
	public function process_money()
	{
		date_default_timezone_set('Asia/Manila');
		$date = date("\(F jS Y h:i a\)");

		if($this->input->post('action') == 'farm')
		{
			$this->session->set_userdata('gold_earned', rand(10,20));
		}
		if($this->input->post('action') == 'cave')
		{
			$this->session->set_userdata('gold_earned', rand(5,10));
		}
		if($this->input->post('action') == 'house')
		{
			$this->session->set_userdata('gold_earned', rand(2,5));
		}
		if($this->input->post('action') == 'casino')
		{
			$this->session->set_userdata('gold_earned', rand(-50,50));
		}
		$gold_earned = $this->session->userdata('gold_earned');
		$current_gold = $this->session->userdata('current_gold');
		$current_gold = $current_gold + $gold_earned;
		$this->session->set_userdata('current_gold', $current_gold);

		if($gold_earned > 0)
		{
			$message = array("<p class='win'>Earned " . $this->session->userdata('gold_earned') . " golds from the " . 
							$this->input->post('action') . "! " . $date . "</p>");
		}
		else
		{
			$message = array("<p class='lose'>Entered a " . $this->input->post('action') . " and lost " . 
						    $this->session->userdata('gold_earned') . ' golds... Ouch.. ' . $date . "</p>");
		}
		
		if($this->session->userdata('activities') == false && $this->session->userdata('gold_earned') !== false)
		{
			$this->session->set_userdata('activities', $message);
		}
		else
		{
			$activities = $this->session->userdata('activities');
			array_push($activities, $message[0]);
			$this->session->set_userdata('activities', $activities);
		}

		$view_data = array(
			'date' => $date,
			'gold_earned' => $gold_earned,
			'current_gold' => $current_gold,
			'activities' => $this->session->userdata('activities')
		);
		$this->load->view('ninja_gold_game/index.php', $view_data);
	}
}