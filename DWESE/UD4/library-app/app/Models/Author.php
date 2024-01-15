<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    protected $table = 'authors'; // Nombre de la tabla en la base de datos

    protected $fillable = [
        'last_name',
        'first_name',
        'nationality',
        'gender',
        'age',
    ];

    public function books()
    {
        return $this->hasMany(Book::class);
    }
}
