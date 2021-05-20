<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    protected $table = "users";

    protected $primaryKey = "id";

    protected $fillable = ["remember_token"];
}