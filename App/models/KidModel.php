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
            kid.adoption_process = 'FECHADO'";

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

            $sql = "UPDATE kid SET adoption_process = 'ABERTO' WHERE id = ?";

            $stmt = $conn->prepare($sql);

            $stmt->bindValue(1, $kidId);

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

            $sql = "UPDATE kid SET adopted = false, adoption_process = 'FECHADO' WHERE id = ?";

            $stmt = $conn->prepare($sql);

            $stmt->bindValue(1, $kidId);

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

            $kidId = $conn->lastInsertId();

            $conn = null;

            return $kidId;

        } catch (PDOException $e) {

            die('query fail: ' . $e->getMessage());

        }

    }

    public function getAdoptionProcess() {

        try {
            
            $sql = "SELECT * FROM adoption_process ap, user, kid WHERE ap.user_id = user.id AND ap.kid_id = kid.id";

            $conn = KidModel::getConnection();

            $stmt = $conn->prepare($sql);
            $stmt->execute();
            
            $conn = null;
            
            return $stmt->fetchAll();;

        } catch (PDOException $e) {

            die('query fail: ' . $e->getMessage());

        }

    }

    public function registerBrothers($kidId1, $kidId2) {

        try {

            $sql = "INSERT INTO kid_kid(kid_id_1, kid_id_2) VALUES (?, ?)";

            $conn = KidModel::getConnection();

            $stmt = $conn->prepare($sql);

            $stmt->bindValue(1, $kidId1);
            $stmt->bindValue(2, $kidId2);
            
            $stmt->execute();

            $conn = null;

        } catch (PDOException $e) {

            die('query fail: ' . $e->getMessage());

        }

    }

    public function getBrothers() {

        try {
            
            $sql = "SELECT * FROM kid LEFT JOIN adoption_process ap ON ap.kid_id = kid.id";

            $conn = KidModel::getConnection();

            $stmt = $conn->prepare($sql);

            $stmt->execute();

            $brothers = $stmt->fetchAll();
            
            $conn = null;
            
            return $brothers;

        } catch (PDOException $e) {

            die('query fail: ' . $e->getMessage());

        }

    }

    public function getBrothersByKid($kidId) {

        try {
            
            $sql = "SELECT kid.id, kid.name, kid.photo_link, kid.birthday, kid.localization, kid.health FROM kid_kid, kid WHERE kid_kid.kid_id_1 = ? AND kid.id = kid_kid.kid_id_2 AND kid.adopted = false AND kid.adoption_process = 'FECHADO'";

            $conn = KidModel::getConnection();

            $stmt = $conn->prepare($sql);

            $stmt->bindValue(1, $kidId);

            $stmt->execute();

            $brothers = $stmt->fetchAll();

            $sql = "SELECT kid.id, kid.name, kid.photo_link, kid.birthday, kid.localization, kid.health FROM kid WHERE kid.id = ?";

            $stmt = $conn->prepare($sql);

            $stmt->bindValue(1, $kidId);

            $stmt->execute();

            $kid = $stmt->fetchAll();

            $conn = null;
            
            return array_merge($kid, $brothers);

        } catch (PDOException $e) {

            die('query fail: ' . $e->getMessage());

        }

    }

}