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
    public function addTransaction($date, $company, $customer, $route, $sumIn, $formPay, $sumPay, $datePay, $income)
    {
        $sql = "INSERT INTO transaction (date, company, customer, route, sumIns, formPay, datePay, sumPay, sumOur, income)
        VALUES (:date, :company, :customer, :route, :sumIn, :formPay, :datePay, :sumPay, 0, :income)";
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
        $stmt->execute();
    }
}