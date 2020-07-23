<?php 



class UsersModel extends Model
{
    public function getTask()
    {
        $id = $_SESSION['user']['id'];
        $sql = "SELECT * FROM task WHERE id_Responsible = :id AND status = 0";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue('id', $id, PDO::PARAM_STR);
        $stmt->execute();
        $result = array();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $result[$row['id']] = $row;
        }
        return $result;
    }
    public function getUsers()
    {
        $sql = "SELECT * FROM users";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $result = array();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $result[$row['id']] = $row;
        }
        return $result;
    }
    public function dellUser($id)
    {
        $sql = "DELETE FROM users WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue('id', $id, PDO::PARAM_STR);
        $stmt->execute();
    }
    public function getStatus($id)
    {
        $sql = "SELECT status FROM users WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue('id', $id, PDO::PARAM_STR);
        $stmt->execute();
        $res = $stmt->fetchColumn();
        return $res;
    }
    public function updateStatus($id, $newStatus)
    {
        $sql = "UPDATE users SET status = :status WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue('id', $id, PDO::PARAM_STR);
        $stmt->bindValue('status', $newStatus, PDO::PARAM_STR);
        $stmt->execute();
    }
    public function checkUser($login)
    {
        $sql = "SELECT * FROM users WHERE login = :login";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue('login', $login, PDO::PARAM_STR);
        $stmt->execute();
        $result = array();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $result[$row['id']] = $row;
        }
        if (!empty($result)) {
            return false;
        } else {
            return true;
        }
    }
    public function registerUser($login, $name, $lastName, $mail, $servNumber, $password)
    {
        $sql = "INSERT INTO users (login, name, lastName, email, password, servNumber, status) 
        VALUES (:login, :name, :lastName, :email, :password, :servNumber, 2)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue('login', $login, PDO::PARAM_STR);
        $stmt->bindValue('name', $name, PDO::PARAM_STR);
        $stmt->bindValue('lastName', $lastName, PDO::PARAM_STR);
        $stmt->bindValue('email', $mail, PDO::PARAM_STR);
        $stmt->bindValue('password', $password, PDO::PARAM_STR);
        $stmt->bindValue('servNumber', $servNumber, PDO::PARAM_STR);
        $stmt->execute();
    }
}