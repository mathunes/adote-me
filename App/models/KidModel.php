<?php

use App\Core\Connection;

class KidModel extends Connection {

    public function getById($id) {
        
        try {
            
            $sql = "SELECT * FROM user WHERE id = ?";

            $conn = UserModel::getConnection();

            $stmt = $conn->prepare($sql);
            $stmt->bindValue(1, $id);
            $stmt->execute();

            $conn = null;

            return  $stmt->fetch(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {

            die('query fail: ' . $e->getMessage());

        }

    }

    public function getAdopted() {
        
        try {
            
            $sql = "SELECT * FROM kid WHERE adopted = true";

            $conn = KidModel::getConnection();

            $stmt = $conn->prepare($sql);
            $stmt->execute();
            
            $conn = null;
            
            return $stmt;

        } catch (PDOException $e) {

            die('query fail: ' . $e->getMessage());

        }

    }

    public function getKidsAdopted() {
        
        try {
            
            $sql = "SELECT count(*) FROM kid WHERE adopted = true AND gender = 'MASCULINO'";

            $conn = KidModel::getConnection();

            $stmt = $conn->prepare($sql);
            $stmt->execute();

            $count_m = $stmt->fetch();
            
            $sql = "SELECT count(*) FROM kid WHERE adopted = true AND gender = 'FEMININO'";

            $conn = KidModel::getConnection();

            $stmt = $conn->prepare($sql);
            $stmt->execute();

            $count_f = $stmt->fetch();

            $conn = null;
            
            return [$count_m, $count_f];

        } catch (PDOException $e) {

            die('query fail: ' . $e->getMessage());

        }

    }

    public function search($gender, $maxAge) {
        
        $maxDate = date_create();

        date_sub($maxDate, date_interval_create_from_date_string(strval($maxAge . " year")));

        try {
            
            $sql = "SELECT * FROM kid LEFT JOIN adoption_process ap ON ap.kid_id = kid.id WHERE
            kid.adopted = false AND 
            kid.gender = ? AND 
            kid.birthday > ? AND
            ap.kid_id IS NULL";

            $conn = KidModel::getConnection();

            $stmt = $conn->prepare($sql);

            $stmt->bindValue(1, $gender);
            $stmt->bindValue(2, $maxDate->format('Y-m-d'));

            $stmt->execute();

            $kids = $stmt->fetchAll();
            
            $conn = null;
            
            return $kids;

        } catch (PDOException $e) {

            die('query fail: ' . $e->getMessage());

        }

    }

    public function applyAdoption($kidId, $userId) {

        try {
            
            $sql = "INSERT INTO adoption_process(user_id, kid_id, status) VALUE (?, ?, 'EM ANALISE')";

            $conn = KidModel::getConnection();

            $stmt = $conn->prepare($sql);

            $stmt->bindValue(1, $userId);
            $stmt->bindValue(2, $kidId);

            $stmt->execute();

            $sql = "SELECT * FROM kid, adoption_process ap WHERE ap.user_id = ? AND kid.id = ap.kid_id";

            $stmt = $conn->prepare($sql);

            $stmt->bindValue(1, $userId);

            $stmt->execute();

            $kids = $stmt->fetchAll();

            $conn = null;

            return $kids;

        } catch (PDOException $e) {

            die('query fail: ' . $e->getMessage());

        }

    }

    public function myAdoptions($userId) {

        try {

            $sql = "SELECT * FROM kid, adoption_process ap WHERE ap.user_id = ? AND kid.id = ap.kid_id";

            $conn = KidModel::getConnection();

            $stmt = $conn->prepare($sql);

            $stmt->bindValue(1, $userId);

            $stmt->execute();

            $kids = $stmt->fetchAll();

            $conn = null;

            return $kids;

        } catch (PDOException $e) {

            die('query fail: ' . $e->getMessage());

        }

    }

    public function cancelAdoption($kidId, $userId) {

        try {
            
            $sql = "DELETE FROM adoption_process WHERE user_id = ? AND kid_id = ?";

            $conn = KidModel::getConnection();

            $stmt = $conn->prepare($sql);

            $stmt->bindValue(1, $userId);
            $stmt->bindValue(2, $kidId);

            $stmt->execute();

            $sql = "SELECT * FROM kid, adoption_process ap WHERE ap.user_id = ? AND kid.id = ap.kid_id";

            $stmt = $conn->prepare($sql);

            $stmt->bindValue(1, $userId);

            $stmt->execute();

            $kids = $stmt->fetchAll();

            $conn = null;

            return $kids;

        } catch (PDOException $e) {

            die('query fail: ' . $e->getMessage());

        }

    }

    public function getAll() {

        try {
            
            $sql = "SELECT * FROM kid";

            $conn = KidModel::getConnection();

            $stmt = $conn->prepare($sql);
            $stmt->execute();
            
            $conn = null;
            
            return $stmt->fetchAll();;

        } catch (PDOException $e) {

            die('query fail: ' . $e->getMessage());

        }

    }

    public function create($kid) {

        try {

            $sql = "INSERT INTO kid(name, birthday, gender, photo_link, localization, health) VALUES (?, ?, ?, ?, ?, ?)";

            $conn = KidModel::getConnection();

            $stmt = $conn->prepare($sql);

            $stmt->bindValue(1, $kid->getName());
            $stmt->bindValue(2, $kid->getBirthday());
            $stmt->bindValue(3, $kid->getGender());
            $stmt->bindValue(4, $kid->getPhotoLink());
            $stmt->bindValue(5, $kid->getLocalization());
            $stmt->bindValue(6, $kid->getHealth());

            $stmt->execute();

            $conn = null;

        } catch (PDOException $e) {

            die('query fail: ' . $e->getMessage());

        }

    }

}