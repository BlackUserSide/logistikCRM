<?php



class TransactionsModel extends Model
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
    public function getDatTransaction()
    {
        $sql = "SELECT * FROM transaction";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $result = array();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $result[$row['id']] = $row;
        }
        return $result;
    }
    public function getDatTransactionUser($id) {
        $sql = "SELECT * FROM transaction WHERE idUser = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue('id', $id, PDO::PARAM_STR);
        $stmt->execute();
        $result = array();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $result[$row['id']] = $row;
        }
        return $result;
    }
    public function addTransaction($date, $company, $customer, $route, $sumIn, $formPay, $sumPay, $datePay, $income, $idUser, $idCompany)
    {
        $sql = "INSERT INTO transaction (date, company, customer, route, sumIns, formPay, datePay, sumPay, sumOur, income, idUser, idComp)
        VALUES (:date, :company, :customer, :route, :sumIn, :formPay, :datePay, :sumPay, 0, :income, :idUser, :idComp)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue('date', $date, PDO::PARAM_STR);
        $stmt->bindValue('company', $company, PDO::PARAM_STR);
        $stmt->bindValue('customer', $customer, PDO::PARAM_STR);
        $stmt->bindValue('route', $route, PDO::PARAM_STR);
        $stmt->bindValue('sumIn', $sumIn, PDO::PARAM_STR);
        $stmt->bindValue('formPay', $formPay, PDO::PARAM_STR);
        $stmt->bindValue('datePay', $datePay, PDO::PARAM_STR);
        $stmt->bindValue('sumPay', $sumPay, PDO::PARAM_STR);
        $stmt->bindValue('income', $income, PDO::PARAM_STR);
        $stmt->bindValue('idUser', $idUser, PDO::PARAM_STR);
        $stmt->bindValue('idComp', $idCompany, PDO::PARAM_STR);
        $stmt->execute();
    }
    public function getDataChange($id)
    {
        $sql = "SELECT * FROM transaction WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue('id', $id, PDO::PARAM_STR);
        $stmt->execute();
        $result = array();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $result[] = $row;
        }
        return $result;
    }
    public function updateTransaction($id, $val, $changeInp){
        switch ($val) {
            case '0' :
                $sql = "UPDATE transaction SET date = :inp WHERE id = :id";
                break;
            case '1' :
                $sql = "UPDATE transaction SET company = :inp WHERE id = :id";
                break;
            case '2' :
                $sql = "UPDATE transaction SET customer = :inp WHERE id = :id";
                break;
            case '3' :
                $sql = "UPDATE transaction SET route = :inp WHERE id = :id";
                break;
            case '4' :
                $sql = "UPDATE transaction SET sumIns = :inp WHERE id = :id";
                break;
            case '5' :
                $sql = "UPDATE transaction SET formPay = :inp WHERE id = :id";
                break;
            case '6' :
                $sql = "UPDATE transaction SET datePay = :inp WHERE id = :id";
                break;
            case '7' :
                $sql = "UPDATE transaction SET sumPay = :inp WHERE id = :id";
                break;
            case '8' :
                $sql = "UPDATE transaction SET income = :inp WHERE id = :id";
                break;
        }
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue('inp', $changeInp, PDO::PARAM_STR);
        $stmt->bindValue('id', $id, PDO::PARAM_STR);
        $stmt->execute();
    }
    public function getIdCompany($nameComp)
    {
        $sql = "SELECT id FROM company WHERE nameCompany = :name";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue('name', $nameComp, PDO::PARAM_STR);
        $stmt->execute();
        $res = $stmt->fetchColumn();
        return $res;
    }
    public function getNameCompany($id)
    {
        $sql = "SELECT nameCompany FROM company WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue('id', $id, PDO::PARAM_STR);
        $stmt->execute();
        $res = $stmt->fetchColumn();
        return $res;
    }
}