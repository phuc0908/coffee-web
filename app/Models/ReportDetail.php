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
                FROM report_details 
                WHERE id = ?";
        return DB::select($sql, [$id]);
    }
    // SELECT id REPORT IN/OUT
    public function select($id_report, $type)
    {
        $reportObj = new Report();
        $report = $reportObj->nameReport($type);
        $person = $reportObj->personInReport($type);
        $idName = $reportObj->idNameReport($type);

        $sql = "SELECT rd.*, r.{$person}, r.created_at, r.total_price 
                FROM report_details rd
                JOIN {$report} r ON rd.{$idName} = r.id
                WHERE r.id = ?
                ";
        return DB::select($sql, [$id_report]);
    }

    // INSERT
    public function insert()
    {
        $sql = "INSERT INTO report_details
                (id_material, id_report, price, number_of_unit, type) 
                VALUES (?,?,?,?,?) ";
        $arr = [$this->id_material, $this->id_report, $this->price, $this->number_of_unit, $this->type];
        return DB::insert($sql, $arr);
    }

    private $id_material;
    private $id_report_in;
    private $id_report_out;
    private $price;
    private $number_of_unit;
    private $type;

    public function __construct()
    {
    }

    // Getters
    public function getIdMaterial()
    {
        return $this->id_material;
    }

    public function getIdReportIn()
    {
        return $this->id_report_in;
    }
    public function getIdReportOut()
    {
        return $this->id_report_out;
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

    public function setIdReportIn($id_report_in)
    {
        $this->id_report_in = $id_report_in;
    }

    public function setIdReportUut($id_report_out)
    {
        $this->id_report_out = $id_report_out;
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
