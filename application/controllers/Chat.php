<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Chat extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Chat_model');
    }

    public function chat_with_ai() {
        $input = json_decode(file_get_contents('php://input'), true);
        if (!isset($input['message'])) {
            echo json_encode(['reply' => 'Mensagem inválida.']);
            return;
        }

        $message = $input['message'];
        $user = $this->session->userdata('name'); // Você pode alterar isso conforme necessário

        // Salva a mensagem do usuário
        $this->Chat_model->save_message($user, $message);
    }

    public function get_chat_history() {
        $messages = $this->Chat_model->get_messages();
        echo json_encode($messages);
    }
}