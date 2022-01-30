<?php

namespace App\entities;

class Kid {

    private $id;
    private $name;
    private $birthday;
    private $gender;
    private $adopted;
    private $photoLink;
    private $localization;
    private $health;

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

    public function getLocalization() {
        return $this->localization;
    }

    public function setLocalization($localization) {
        $this->localization = $localization;

        return $this;
    }

    public function getHealth() {
        return $this->health;
    }

    public function setHealth($health) {
        $this->health = $health;

        return $this;
    }
}