<?php




class TaskModel extends Model
{
    public function getTaskActive()
    {
        $id = $_SESSION['user']['id'];
        $sql = "SELECT * FROM task WHERE id_Responsible = :id AND status = 0";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue('id', $id, PDO::PARAM_STR);
        $stmt->execute();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $result[$row['id']] = $row;
        }
        return $result;
    }
    public function getTaskUser()
    {
        $id = $_SESSION['user']['id'];
        $sql = "SELECT * FROM task WHERE id_Responsible = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue('id', $id, PDO::PARAM_STR);
        $stmt->execute();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $result[$row['id']] = $row;
        }
        return $result;
    }
    public function getTaskInfo($id)
    {
        $sql = "SELECT * FROM task WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue('id', $id, PDO::PARAM_STR);
        $stmt->execute();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $result[$row['id']] = $row;
        }
        return $result;
    }
    public function updateStatusTask($id)
    {
        $sql = "UPDATE task SET status = 1 WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue('id', $id, PDO::PARAM_STR);
        $stmt->execute();
    }
    public function deleteTask($id)
    {
        $sql = "DELETE FROM task WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue('id', $id, PDO::PARAM_STR);
        $stmt->execute();
    }
   
    public function addTask($textTask, $tageTask, $id, $date)
    {
        $sql = "INSERT INTO task (textTask, date, id_Responsible, id_Give, tagTask, status) 
        VALUES (:textTask, :date, :idR, :idG, :tageTask, 0)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue('textTask', $textTask, PDO::PARAM_STR);
        $stmt->bindValue('date', $date, PDO::PARAM_STR);
        $stmt->bindValue('tageTask', $tageTask, PDO::PARAM_STR);
        $stmt->bindValue('idR', $id, PDO::PARAM_STR);
        $stmt->bindValue('idG', $_SESSION['user']['id'], PDO::PARAM_STR);
        $stmt->execute();
    }
    public function createNotification($id, $text, $date)
    {
        $sql = "INSERT INTO notification (textNotification, data, idUser, asread)
        VALUES (:text, :date, :id, 0)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue('text', $text, PDO::PARAM_STR);
        $stmt->bindValue('date', $date, PDO::PARAM_STR);
        $stmt->bindValue('id', $id, PDO::PARAM_STR);
        $stmt->execute();
    }
}
