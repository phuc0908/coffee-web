<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Material extends Model
{
    private $id;
    private $name = "";
    private $category = "";
    private $image = "";
    private $created_at = "";
    private $updated_at = "";
    private $unit = "";

    public function __construct()
    {
        // You might consider initializing properties with default values here,
        // especially if they are nullable or have specific data types.
    }

    // Getters
    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getCategory()
    {
        return $this->category;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function getCreatedAt()
    {
        return $this->created_at;
    }

    public function getUpdatedAt()
    {
        return $this->updated_at;
    }

    public function getUnit()
    {
        return $this->unit;
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

    public function setCategory($category)
    {
        $this->category = $category;
    }

    public function setImage($image)
    {
        $this->image = $image;
    }
    public function setUnit($unit)
    {
        $this->unit = $unit;
    }
    // Get all column 
    public static function showAll()
    {
        $sql = 'SELECT * FROM materials';
        return DB::select($sql);
    }
    // Get 1 column where id
    public static function get($id)
    {
        $sql = 'SELECT * FROM materials WHERE id = ?';
        return DB::select($sql, [$id]);
    }

    // INSERT
    public function insert()
    {
        $sql = 'INSERT INTO materials
                (name, category, image, unit, created_at) 
                VALUES (?,?,?,?, NOW()) ';
        $arr = [$this->name, $this->category, $this->image, $this->unit];
        return DB::insert($sql, $arr);
    }
    // UPDATE
    public function edit()
    {
        $sql = 'UPDATE materials
                SET     name = ?,
                        category = ?,
                        image = ?,
                        unit = ?
                WHERE id = ?  ';
        $arr = [$this->name, $this->category, $this->image, $this->unit, $this->id];
        return DB::update($sql, $arr);
    }
    public function del($id)
    {
        $sql = 'DELETE FROM materials WHERE id = ?';
        DB::delete($sql, [$id]);
    }
}
