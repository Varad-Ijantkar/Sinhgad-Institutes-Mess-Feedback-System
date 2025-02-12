<?php
class Student_model extends CI_Model {
	public function get_student_info($student_id) {
		$this->db->select('student_info.id,student_info.name, student_info.email, student_info.phone, student_info.gender, colleges.college_name as college_name, campus.campus_name as campus_name, messes.mess_name as mess_name');
		$this->db->from('student_info');
		$this->db->join('colleges', 'student_info.college_id = colleges.college_id');
		$this->db->join('campus', 'student_info.campus_id = campus.campus_id');
		$this->db->join('messes', 'student_info.mess_id = messes.mess_id');
		$this->db->where('student_info.id', $student_id);
		$query = $this->db->get();
		return $query->row_array();

	}

	public function get_student_header_info($student_id) {
		$this->db->select('
            student_info.name,
            student_info.email,
            colleges.college_name,
            campus.campus_name,
            messes.mess_name
        ');
		$this->db->from('student_info');
		$this->db->join('colleges','student_info.college_id = colleges.college_id','left');
		$this->db->join('campus','student_info.campus_id = campus.campus_id','left');
		$this->db->join('messes','student_info.mess_id = messes.mess_id','left');
		$this->db->where('student_info.id', $student_id);
		$query = $this->db->get();
		$result = $query->row_array();
		return array(
			'name' => $result['name'] ?? 'N/A',
			'email' => $result['email'] ?? 'N/A',
			'college_name' => $result['college_name'] ?? 'Not Assigned',
			'campus_name' => $result['campus_name'] ?? 'Not Assigned',
			'mess_name' => $result['mess_name'] ?? 'Not Assigned'
		);
	}
}
