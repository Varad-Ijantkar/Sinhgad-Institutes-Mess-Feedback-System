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
        $this->db->select('mess, 
            AVG(taste_rating) as avg_taste_rating, 
            AVG(hygiene_rating) as avg_hygiene_rating, 
            AVG(variety_rating) as avg_variety_rating, 
            AVG(service_rating) as avg_service_rating, 
            AVG(infrastructure_rating) as avg_infrastructure_rating, 
            AVG(portion_rating) as avg_portion_rating, 
            AVG(timing_rating) as avg_timing_rating, 
            ROUND(
                (
                    AVG(taste_rating) +
                    AVG(hygiene_rating) +
                    AVG(variety_rating) +
                    AVG(service_rating) +
                    AVG(infrastructure_rating) +
                    AVG(portion_rating) +
                    AVG(timing_rating)
                ) / 7, 1
            ) as overall_rating');
        $this->db->from('feedback');
        $this->db->group_by('mess');
        $this->db->order_by('overall_rating', 'DESC'); // Optional: Sort by overall rating

        $query = $this->db->get();
        return $query->result_array();
    }
}
