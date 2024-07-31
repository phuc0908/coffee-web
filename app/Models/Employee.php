<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Employee extends Model
{
    private $id;
    private $name = "";
    private $gmail = "";
    private $gender = "";
    private $role = "";
    private $phone = "";
    private $created_at = "";
    private $updated_at = "";
    private $address = "";
    private $status = "";

    public function __construct()
    {
    }

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
    public function getGender()
    {
        return $this->gender;
    }
    public function getRole()
    {
        return $this->role;
    }
    public function getPhone()
    {
        return $this->phone;
    }
    public function getCreatedAt()
    {
        return $this->created_at;
    }
    public function getUpdatedAt()
    {
        return $this->updated_at;
    }
    public function getAddress()
    {
        return $this->address;
    }
    public function getStatus()
    {
        return $this->status;
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
    public function setGender($gender)
    {
        $this->gender = $gender;
    }
    public function setRole($role)
    {
        $this->role = $role;
    }
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }
    public function setCreatedAt($created_at)
    {
        $this->created_at = $created_at;
    }
    public function setUpdatedAt($updated_at)
    {
        $this->updated_at = $updated_at;
    }
    public function setAddress($address)
    {
        $this->address = $address;
    }
    public function setStatus($status)
    {
        $this->status = $status;
    }

    // Get all column 
    public static function showAll()
    {
        $sql = 'SELECT * FROM employees';
        return DB::select($sql);
    }
    // Get 1 column where id
    public static function get($id)
    {
        $sql = 'SELECT * FROM employees WHERE id = ?';
        return DB::select($sql, [$id]);
    }

    // INSERT
    public function insert()
    {
        $sql = 'INSERT INTO employees 
        (name, gmail, gender, role, phone, address, status, created_at, updated_at)
                VALUES (?,?,?,?,?,?,?, NOW(), NOW()) ';
        $arr = [$this->name, $this->gmail, $this->gender, $this->role, $this->phone, $this->address, $this->status];
        return DB::insert($sql, $arr);
    }
    // UPDATE
    public function edit()
    {
        $sql = 'UPDATE employees
                SET     name = ?,
                        gmail = ?,  
                        gender = ?,
                        role = ?,
                        phone = ?,
                        address = ?,
                        status = ?
                WHERE id = ?  ';
        $arr = [$this->name, $this->gmail, $this->gender, $this->role, $this->phone, $this->address, $this->status, $this->id];
        return DB::update($sql, $arr);
    }
    public function del($id)
    {
        $sql = 'DELETE FROM employees WHERE id = ?';
        DB::delete($sql, [$id]);
    }
}
