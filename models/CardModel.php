<?php


class CardModel extends Model
{
    public function getTask()
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
    public function getDataCard($id, $table)
    {
        if ($table === 'company') {
           $sql = "SELECT * FROM company WHERE id = :id";
        } else if ($table === 'routes') {
            $sql = "SELECT * FROM routes WHERE id = :id";
        } else {
            $sql = "SELECT * FROM carriers WHERE id = :id";
        }
        $stmt = $this->db->prepare($sql);
        
        $stmt->bindValue('id', $id, PDO::PARAM_STR);
        $stmt->execute();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $result[$row['id']] = $row;
        }
        return $result;
    }
}
