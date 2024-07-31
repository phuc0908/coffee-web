<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Product extends Model
{
    private $id;
    private $name = "";
    private $category = "";
    private $price = "";
    private $image = "";
    private $created_at = "";
    private $updated_at = "";
    private $description = "";

    public function __construct()
    {
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

    public function getDescription()
    {
        return $this->description;
    }
    public function getPrice()
    {
        return $this->price;
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
    public function setDescription($description)
    {
        $this->description = $description;
    }
    public function setPrice($price)
    {
        $this->price = $price;
    }

    // Get all column 
    public static function showAll()
    {
        $sql = 'SELECT * FROM products';
        return DB::select($sql);
    }
    // Get 1 column where id
    public static function get($id)
    {
        $sql = 'SELECT * FROM products WHERE id = ?';
        return DB::select($sql, [$id]);
    }

    // INSERT
    public function insert()
    {
        $sql = 'INSERT INTO products
                (name, category, price, image, description, created_at) 
                VALUES (?,?,?,?,?, NOW()) ';
        $arr = [$this->name, $this->category, $this->price, $this->image, $this->description];
        return DB::insert($sql, $arr);
    }
    // UPDATE
    public function edit()
    {
        $sql = 'UPDATE products
                SET     name = ?,
                        category = ?,
                        price = ?,
                        image = ?,
                        description = ?
                WHERE id = ?  ';
        $arr = [$this->name, $this->category, $this->price, $this->image, $this->description, $this->id];
        return DB::update($sql, $arr);
    }
    // DELETE
    public function del($id)
    {
        $sql = 'DELETE FROM products WHERE id = ?';
        DB::delete($sql, [$id]);
    }
}
