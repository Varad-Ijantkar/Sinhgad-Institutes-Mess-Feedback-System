<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Feedback extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('Feedback_model'); // Load the Feedback model
	}

	public function index() {
		// Load the feedback view with the necessary templates
		$this->load->view('template/header');
		$this->load->view('template/leftnavbar');
		$this->load->view('feedback_view');
		$this->load->view('template/footer');
	}

	// Method to handle feedback submission
	public function submit() {
		// Retrieve student_id and mess from session
		$student_id = $this->session->userdata('student_id');
		$mess = $this->session->userdata('mess');

		// Validate session data to ensure the student is logged in
		if (!$student_id || !$mess) {
			show_error('Student must be logged in to submit feedback.', 403);
		}

		// Get user inputs
		$inputs = $this->input->post([
			'taste_rating', 'hygiene_rating', 'variety_rating',
			'service_rating', 'infrastructure_rating',
			'portion_rating', 'timing_rating', 'comments'
		]);

		// Validate required ratings (taste, hygiene, variety, etc.)
		$required_ratings = [
			'taste_rating', 'hygiene_rating', 'variety_rating',
			'service_rating', 'infrastructure_rating',
			'portion_rating', 'timing_rating'
		];

		foreach ($required_ratings as $field) {
			if (empty($inputs[$field])) {
				$this->session->set_flashdata('error', 'All rating fields are required.');
				redirect('feedback');
			}
		}

		// Calculate overall score as the average of the ratings
		$ratings = array_map('floatval', array_intersect_key($inputs, array_flip($required_ratings)));
		$overall_score = array_sum($ratings) / count($ratings);

		// Prepare data for insertion
		$data = [
			'student_id' => $student_id,
			'mess' => $mess,
			'taste_rating' => $inputs['taste_rating'],
			'hygiene_rating' => $inputs['hygiene_rating'],
			'variety_rating' => $inputs['variety_rating'],
			'service_rating' => $inputs['service_rating'],
			'infrastructure_rating' => $inputs['infrastructure_rating'],
			'portion_rating' => $inputs['portion_rating'],
			'timing_rating' => $inputs['timing_rating'],
			'comments' => $inputs['comments'],
			'overall_score' => round($overall_score, 1)
		];

		// Insert the feedback into the database
		$inserted = $this->Feedback_model->insert_feedback($data);

		// Set flash message based on the result
		if ($inserted) {
			$this->session->set_flashdata('success', 'Feedback submitted successfully.');
		} else {
			$this->session->set_flashdata('error', 'Failed to submit feedback. Please try again.');
		}

		// Redirect back to the feedback page
		redirect('feedback');
	}
}
