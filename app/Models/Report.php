<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Report extends Model
{
    // Get all column 
    public static function showAll()
    {
        $sql = "SELECT 
                    sri.id, 
                    sri.created_at, 
                    s.name AS name, 
                    sri.total_price, 
                    'in' AS type 
                FROM 
                    reports_in sri
                JOIN 
                    suppliers s ON sri.id_supplier = s.id

                UNION ALL

                SELECT 
                    sro.id, 
                    sro.created_at, 
                    e.name AS name, 
                    sro.total_price, 
                    'out' AS type 
                FROM 
                    reports_out sro
                JOIN 
                    employees e ON sro.id_employee = e.id;";
        return DB::select($sql);
    }
    public function getAllReportIn()
    {
        $sql = 'SELECT * FROM stock_report_in';
        return DB::select($sql);
    }
    public function getAllReportOut()
    {
        $sql = 'SELECT * FROM stock_report_out';
        return DB::select($sql);
    }

    // Get 1 column where id
    public function get($id, $type)
    {
        $report = $this->nameReport($type);

        $sql = 'SELECT * FROM ' + $report + ' WHERE id = ?';
        return DB::select($sql, [$id]);
    }

    // INSERT
    public function insert($type)
    {
        $report = $this->nameReport($type);
        $person = $this->personInReport($type);
        $valuePerson = $this->valuePersonInReport($type);

        $sql = "INSERT INTO {$report}
                (total_price, {$person}, created_at) 
                VALUES (?,?, NOW()) ";
        $arr = [$this->total_price, $valuePerson];
        return DB::insert($sql, $arr);
    }
    // UPDATE
    public function edit($type)
    {
        $report = $this->nameReport($type);
        $person = $this->personInReport($type);
        $valuePerson = $this->valuePersonInReport($type);

        $sql = "UPDATE {$report}
                SET     total_price = ?,
                        {$person} = ?,
                WHERE id = ?  ";
        $arr = [$this->total_price, $valuePerson, $this->id];
        return DB::update($sql, $arr);
    }
    // DELETE
    public function del($type)
    {
        $report = $this->nameReport($type);

        $sql = "DELETE FROM {$report} WHERE id = ?";
        DB::delete($sql, [$this->id]);
    }

    public function nameReport($type): String
    {
        return $type == "in" ? "reports_in" : "reports_out";
    }
    public function personInReport($type): String
    {
        return $type == "in" ? "id_supplier" : "id_employee";
    }
    public function valuePersonInReport($type): Int
    {
        return $type == "in" ? $this->supplier : $this->employee;
    }

    private $id;
    private $total_price = 0.0;
    private $type = "";
    private $employee = 0;
    private $supplier = 0;
    private $reportDetails = [];

    public function __construct()
    {
    }

    // Getters
    public function getId()
    {
        return $this->id;
    }

    public function getTotalPrice()
    {
        return $this->total_price;
    }

    public function getType()
    {
        return $this->type;
    }

    public function getEmployee()
    {
        return $this->employee;
    }

    public function getSupplier()
    {
        return $this->supplier;
    }

    public function getReportDetails()
    {
        return $this->reportDetails;
    }

    // Setters
    public function setId($id)
    {
        $this->id = $id;
    }

    public function setTotalPrice($total_price)
    {
        $this->total_price = $total_price;
    }

    public function setType($type)
    {
        $this->type = $type;
    }

    public function setEmployee($employee)
    {
        $this->employee = $employee;
    }

    public function setSupplier($supplier)
    {
        $this->supplier = $supplier;
    }
    public function setReportDetail(ReportDetail $reportDetail)
    {
        $this->reportDetails[] = $reportDetail;
    }
}
