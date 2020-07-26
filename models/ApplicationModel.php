<?php


class ApplicationModel extends Model
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
    public function getDataApp()
    {
        $sql = "SELECT * FROM application";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $result = array();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $result[$row['id']] = $row;
        }
        return $result;
    }
    public function getDataFull($id)
    {
        $sql = "SELECT text FROM application WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue('id', $id, PDO::PARAM_STR);
        $stmt->execute();
        $res = $stmt->fetchColumn();
        return $res;
    }
    public function addAppInDB($name, $phone, $fromWhere, $whereFrom, $typeCargo, $text, $widtch)
    {
        $sql = "INSERT INTO application (fromWhere, whereFrom, typeCargo, name, phone, text, widtch)
        VALUES (:from, :where, :type, :name, :phone, :text, :widtch)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue('from', $fromWhere, PDO::PARAM_STR);
        $stmt->bindValue('where', $whereFrom, PDO::PARAM_STR);
        $stmt->bindValue('type', $typeCargo, PDO::PARAM_STR);
        $stmt->bindValue('name', $name, PDO::PARAM_STR);
        $stmt->bindValue('phone', $phone, PDO::PARAM_STR);
        $stmt->bindValue('text', $text, PDO::PARAM_STR);
        $stmt->bindValue('widtch', $widtch, PDO::PARAM_STR);
        $stmt->execute();
    }
}
