<?php



class CabinetModel extends Model 
{
    public function getTask () 
    {
        $id = $_SESSION['user']['id'];
        $sql = "SELECT * FROM task WHERE id_Responsible = :id AND status = 0";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue('id', $id, PDO::PARAM_STR);
        $stmt->execute();
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $result[$row['id']] = $row;
        }
        return $result;
    }
    public function getCloseTask()
    {
        $id = $_SESSION['user']['id'];
        $sql = "SELECT * FROM task WHERE id_Responsible = :id AND status = 1";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue('id', $id, PDO::PARAM_STR);
        $stmt->execute();
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $result[$row['id']] = $row;
        }
        return $result;
    }
    public function getNameTask($id)
    {
        $sql = "SELECT name, lastName FROM users WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue('id', $id, PDO::PARAM_STR);
        $stmt->execute();
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $result[] = $row;
        }
        return $result;
    }
    public function getActiveTask() 
    {
        $id = $_SESSION['user']['id'];
        $sql = "SELECT * FROM task WHERE id_Responsible = :id AND status = 0";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue('id', $id, PDO::PARAM_STR);
        $stmt->execute();
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $result[$row['id']] = $row;
        }
        return $result;
    }  
}