<?php


class IndexModel extends Model 
{
    public function loginUser($login, $password) 
    {
        $password = md5($password);
        $sql = "SELECT * FROM users WHERE login = :login AND password = :password";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue('login', $login, PDO::PARAM_STR);
        $stmt->bindValue('password', $password, PDO::PARAM_STR);
        $stmt->execute();
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $result[$row['id']] = $row;
        }
        if(!empty($result)) {
            foreach($result as $key => $val) {
                $_SESSION['user']['id'] = $val['id'];
                $_SESSION['user']['login'] = $val['login'];
                $_SESSION['user']['email'] = $val['email'];
                $_SESSION['user']['name'] = $val['name'];
                $_SESSION['user']['lastName'] = $val['lastName'];
                $_SESSION['user']['status'] = $val['status'];
            }
            return true;
        } else {
            return false;
        }
    }
}