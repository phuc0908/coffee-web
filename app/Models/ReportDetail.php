<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Models\Report;


class ReportDetail extends Model
{
    // Get 1 column where id
    public function get($id)
    {
        $sql = "SELECT * 
                FROM {$this->nameTable} 
                WHERE id = ?";
        return DB::select($sql, [$id]);
    }
    // SELECT id REPORT IN/OUT
    public function select($id_report, $type)
    {
        $reportObj = new Report();
        $report = $reportObj->nameReport($type);
        $person = $reportObj->personInReport($type);

        $sql = "SELECT rd.*, r.{$person}, r.created_at, r.total_price 
                FROM {$this->nameTable} rd
                JOIN {$report} r ON rd.id_report = r.id
                WHERE r.id = ?
                ";
        return DB::select($sql, [$id_report]);
    }

    // INSERT
    public function insert()
    {
        $sql = "INSERT INTO {$this->nameTable}
                () 
                VALUES (?,?, NOW()) ";
        $arr = [$this->name];
        return DB::insert($sql, $arr);
    }


    private $id_material;
    private $id_report;
    private $price;
    private $number_of_unit;
    private $type;
    private $nameTable = "report_details";

    public function __construct()
    {
    }

    // Getters
    public function getIdMaterial()
    {
        return $this->id_material;
    }

    public function getIdReport()
    {
        return $this->id_report;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function getNumberOfUnit()
    {
        return $this->number_of_unit;
    }

    public function getType()
    {
        return $this->type;
    }

    // Setters
    public function setIdMaterial($id_material)
    {
        $this->id_material = $id_material;
    }

    public function setIdReport($id_report)
    {
        $this->id_report = $id_report;
    }

    public function setPrice($price)
    {
        $this->price = $price;
    }

    public function setNumberOfUnit($number_of_unit)
    {
        $this->number_of_unit = $number_of_unit;
    }

    public function setType($type)
    {
        $this->type = $type;
    }
}
