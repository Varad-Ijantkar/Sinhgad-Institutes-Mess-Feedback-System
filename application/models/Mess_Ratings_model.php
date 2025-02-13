<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mess_Ratings_model extends CI_Model {

	public function __construct() {
		parent::__construct();
	}

	/**
	 * Fetch mess ratings dynamically grouped by each mess
	 * and calculate the average rating for each mess.
	 *
	 * @return array
	 */
	public function get_mess_ratings() {
		$this->db->select('
            messes.mess_name, 
            AVG(feedback.taste_rating) as avg_taste_rating, 
            AVG(feedback.hygiene_rating) as avg_hygiene_rating, 
            AVG(feedback.variety_rating) as avg_variety_rating, 
            AVG(feedback.service_rating) as avg_service_rating, 
            AVG(feedback.infrastructure_rating) as avg_infrastructure_rating, 
            AVG(feedback.portion_rating) as avg_portion_rating, 
            AVG(feedback.timing_rating) as avg_timing_rating, 
            ROUND(
                (
                    AVG(feedback.taste_rating) +
                    AVG(feedback.hygiene_rating) +
                    AVG(feedback.variety_rating) +
                    AVG(feedback.service_rating) +
                    AVG(feedback.infrastructure_rating) +
                    AVG(feedback.portion_rating) +
                    AVG(feedback.timing_rating)
                ) / 7, 1
            ) as overall_rating
        ');
		$this->db->from('feedback');
		$this->db->join('messes', 'feedback.mess_id = messes.mess_id', 'left'); // Fixed join condition
		$this->db->group_by('feedback.mess_id');
		$this->db->order_by('overall_rating', 'DESC');

		$query = $this->db->get();
		return $query->result_array();

	}
}
