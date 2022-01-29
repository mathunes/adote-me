<?php

namespace App\entities;

class Kid {

    private $id;
    private $name;
    private $birthday;
    private $gender;
    private $adopted;
    private $photoLink;

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;

        return $this;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;

        return $this;
    }

    
    public function getBirthday() {
        return $this->birthday;
    }

    public function setBirthday($birthday) {
        $this->birthday = $birthday;

        return $this;
    }

    public function getGender() {
        return $this->gender;
    }

    public function setGender($gender) {
        $this->gender = $gender;

        return $this;
    }
    
    public function getAdopted() {
        return $this->adopted;
    }

    public function setAdopted($adopted) {
        $this->adopted = $adopted;

        return $this;
    }

    public function getPhotoLink() {
        return $this->photoLink;
    }

    public function setPhotoLink($photoLink) {
        $this->photoLink = $photoLink;

        return $this;
    }

}