<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Supplier extends Model
{
    // Get all column 
    public static function showAll()
    {
        $sql = 'SELECT * FROM suppliers';
        return DB::select($sql);
    }
    // Get 1 column where id
    public static function get($id)
    {
        $sql = 'SELECT * FROM suppliers WHERE id = ?';
        return DB::select($sql, [$id]);
    }

    // INSERT
    public function insert()
    {
        $sql = 'INSERT INTO suppliers 
        (name, address, phone, gmail, created_at)
                VALUES (?,?,?,?, NOW()) ';
        $arr = [$this->name, $this->address, $this->phone, $this->gmail];
        return DB::insert($sql, $arr);
    }
    // UPDATE
    public function edit()
    {
        $sql = 'UPDATE suppliers
                SET     name = ?,
                        address = ?,
                        phone = ?,
                        gmail = ?,                          
                        updated_at = NOW() 
                WHERE id = ?  ';
        $arr = [$this->name, $this->address, $this->phone, $this->gmail, $this->id];
        return DB::update($sql, $arr);
    }
    public function del()
    {
        $sql = 'DELETE FROM suppliers WHERE id = ?';
        DB::delete($sql, [$this->id]);
    }

    private $id;
    private $name = "";
    private $gmail = "";
    private $address = "";
    private $phone = "";

    /// Getters
    public function getId()
    {
        return $this->id;
    }
    public function getName()
    {
        return $this->name;
    }
    public function getGmail()
    {
        return $this->gmail;
    }
    public function getPhone()
    {
        return $this->phone;
    }
    public function getAddress()
    {
        return $this->address;
    }

    // Setters (with basic validation for demonstration)
    public function setId($id)
    {
        $this->id = $id;
    }
    public function setName($name)
    {
        $this->name = $name;
    }
    public function setGmail($gmail)
    {
        $this->gmail = $gmail;
    }
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }
    public function setAddress($address)
    {
        $this->address = $address;
    }
}
