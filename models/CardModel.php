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
    public function getCarrName($id)
    {
        $sql = "SELECT nameDriver FROM carriers WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue('id', $id, PDO::PARAM_STR);
        $stmt->execute();
        $res = $stmt->fetchColumn();
        return $res;
    }
    public function getCompName($id)
    {
        $sql = "SELECT nameCompany FROM company WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue('id', $id, PDO::PARAM_STR);
        $stmt->execute();
        $res = $stmt->fetchColumn();
        return $res;
    }
    public function deleteCard($id, $ref)
    {
        if ($ref === 'comp') {
            $sql = "DELETE FROM company WHERE id = :id";
        } else if ($ref === 'routes') {
            $sql = "DELETE FROM routes WHERE id = :id";
        } else {
            $sql = "DELETE FROM carriers WHERE id = :id";
        }
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue('id', $id, PDO::PARAM_STR);
        $stmt->execute();
    }
    public function getDataComments($id, $table)
    {
        if ($table === 'company') {
            $sql = "SELECT * FROM comments WHERE idCat = :id AND category = 0";
        } else if ($table === 'routes') {
            $sql = "SELECT * FROM comments WHERE idCat = :id AND category = 1";
        } else {
            $sql = "SELECT * FROM comments WHERE idCat = :id AND category = 2";
        }
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue('id', $id, PDO::PARAM_STR);
        $stmt->execute();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $result[$row['id']] = $row;
        }
        return $result;
    }
    public function addComments($ref, $text, $id)
    {
        $sql = "INSERT INTO comments (text, idUser, category, idCat)
        VALUES (:text, :id, :category, :idCat)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue('text', $text, PDO::PARAM_STR);
        $stmt->bindValue('id', $_SESSION['user']['id'], PDO::PARAM_STR);
        $stmt->bindValue('category', $ref, PDO::PARAM_STR);
        $stmt->bindValue('idCat', $id, PDO::PARAM_STR);
        $stmt->execute();
    }
    public function getNameUser($id)
    {
        $sql = 'SELECT * FROM users WHERE id = :id';
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue('id', $id, PDO::PARAM_STR);
        $stmt->execute();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $result[$row['id']] = $row;
        }
        return $result;
    }
    public function dellCommets($id)
    {
        $sql = "DELETE FROM comments WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue('id', $id, PDO::PARAM_STR);
        $stmt->execute();
    }
    public function getRoutesCard($id, $table)
    {
        if ($table === 'company') {
            $sql = "SELECT * FROM routes WHERE idComp = :id";
        } else if ($table === 'carriers') {
            $sql = "SELECT * FROM routes WHERE idCarr = :id";
        }
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue('id', $id, PDO::PARAM_STR);
        $stmt->execute();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $result[$row['id']] = $row;
        }
        return $result;
    }
    public function getDocsCard($idCard, $table)
    {
        if ($table === 'company') {
            $sql = "SELECT * FROM docs WHERE idbind = :id AND category = 0";
        } else if ($table === 'routes') {
            $sql = "SELECT * FROM docs WHERE idbind = :id AND category = 1";
        } else {
            $sql = "SELECT * FROM docs WHERE idbind = :id AND category = 2";
        }
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue('id', $idCard, PDO::PARAM_STR);
        $stmt->execute();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $result[$row['id']] = $row;
        }
        return $result;
    }
    public function addDocs($idCard, $table, $name)
    {
        if ($table === 'company') {
            $sql = "INSERT INTO docs (nameDocs, type, idbind, category)
            VALUES (:name, 0, :id, 0)";
        } else if ($table === 'routes') {
            $sql = "INSERT INTO docs (nameDocs, type, idbind, category)
            VALUES (:name, 0, :id, 1)";
        } else {
            $sql = "INSERT INTO docs (nameDocs, type, idbind, category)
            VALUES (:name, 0, :id, 2)";
        }
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue('name', $name, PDO::PARAM_STR);
        $stmt->bindValue('id', $idCard, PDO::PARAM_STR);
        $stmt->execute();
    }
    public function dellDoc($id)
    {
        $sql = "DELETE FROM docs WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue('id', $id, PDO::PARAM_STR);
        $stmt->execute();
    }
}
