<?php

namespace App\entities;

class Doubt {

    private $id;
    private $message;
    private $userId;
    private $whatsapp;

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;

        return $this;
    }

    public function getMessage() {
        return $this->message;
    }

    public function setMessage($message) {
        $this->message = $message;

        return $this;
    }

    public function getUserId() {
        return $this->userId;
    }

    public function setUserId($userId) {
        $this->userId = $userId;

        return $this;
    }

    public function getWhatsapp() {
        return $this->whatsapp;
    }

    public function setWhatsapp($whatsapp) {
        $this->whatsapp = str_replace("-", "", str_replace("(", "", str_replace(")", "", str_replace(" ", "", $whatsapp))));

        return $this;
    }
}