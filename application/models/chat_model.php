<?php
class Chat_model extends CI_Model {

    public function save_message($user, $message) {
        $data = array(
            'user' => $user,
            'message' => $message
        );
        return $this->db->insert('chat_messages', $data);
    }

    public function get_messages() {
        $query = $this->db->query("SELECT * FROM chat_messages");
        return $query->result_array();
    }
}