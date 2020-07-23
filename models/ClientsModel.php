<?php



class ClientsModel extends Model
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
    public function getDataComp()
    {
        $sql = "SELECT * FROM company";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $result = array();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $result[$row['id']] = $row;
        }
        return $result;
    }
    public function deleOne($id)
    {
        $sql = "DELETE FROM company WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue('id', $id, PDO::PARAM_STR);
        $stmt->execute();
    }
    public function getDataCar()
    {
        $sql = "SELECT * FROM carriers";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $result = array();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $result[$row['id']] = $row;
        }
        return $result;
    }
    public function getDataRoutes()
    {
        $sql = "SELECT * FROM routes";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $result = array();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $result[$row['id']] = $row;
        }
        return $result;
    }
    public function getNameCompany($id)
    {
        $sql = "SELECT nameCompany FROM company WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue('id', $id, PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetchColumn();
        return $result;
    }
    public function addCompany($name, $country, $city, $phone, $mail, $adress, $contact)
    {
        $sql = "INSERT INTO company (nameCompany, city, country, nameContat, category, docs, adress, phone, mail)
        VALUES (:name, :city, :country, :contact, 0, 0, :adress, :phone, :mail)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue('name', $name, PDO::PARAM_STR);
        $stmt->bindValue('city', $city, PDO::PARAM_STR);
        $stmt->bindValue('country', $country, PDO::PARAM_STR);
        $stmt->bindValue('contact', $contact, PDO::PARAM_STR);
        $stmt->bindValue('adress', $adress, PDO::PARAM_STR);
        $stmt->bindValue('phone', $phone, PDO::PARAM_STR);
        $stmt->bindValue('mail', $mail, PDO::PARAM_STR);
        $stmt->execute(); 
    }
    public function addRoutes($route, $price, $kilometers, $idComp, $idCar)
    {
        $sql = "INSERT INTO routes (rote, price, kilometers, idComp, idCarr)
        VALUES (:route, :price, :kilometers, :idComp, :idCarr)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue('route', $route, PDO::PARAM_STR);
        $stmt->bindValue('price', $price, PDO::PARAM_STR);
        $stmt->bindValue('kilometers', $kilometers, PDO::PARAM_STR);
        $stmt->bindValue('idComp', $idComp, PDO::PARAM_STR);
        $stmt->bindValue('idCarr', $idCar, PDO::PARAM_STR);
        $stmt->execute();
    }
    public function addCarr($carModel, $carNumber, $nameDriver, $driverContact, $typeCar, $cubes)
    {
        $sql = 'INSERT INTO carriers (carModel, carNumber, driverContacts, photo, typeCar, cubeCar, nameDriver)
        VALUES (:carModel, :carNumber, :driverContacts, 0, :typeCar, :cubeCar, :nameDriver)';
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue('carModel', $carModel, PDO::PARAM_STR);
        $stmt->bindValue('carNumber', $carNumber, PDO::PARAM_STR);
        $stmt->bindValue('driverContacts', $driverContact, PDO::PARAM_STR);
        $stmt->bindValue('typeCar', $typeCar, PDO::PARAM_STR);
        $stmt->bindValue('cubeCar', $cubes, PDO::PARAM_STR);
        $stmt->bindValue('nameDriver', $nameDriver, PDO::PARAM_STR);
        $stmt->execute();
    }
    public function dellOneRoutes($id)
    {
        $sql = "DELETE FROM routes WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue('id', $id, PDO::PARAM_STR);
        $stmt->execute();
    }
    public function dellOneCarr($id)
    {
        $sql = "DELETE FROM carriers WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue('id', $id, PDO::PARAM_STR);
        $stmt->execute();
    }
    public function getAllCompany()
    {
        $sql = "SELECT * FROM company";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $result = array();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $result[$row['id']] = $row;
        }
        return $result;
    }
}
