<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $table = 'books'; // Nombre de la tabla en la base de datos

    protected $fillable = [
        'title',
        'category',
        'author_id',
        'description',
        'price',
    ];

    // Relación con el modelo Author
    public function author()
    {
        return $this->belongsTo(Author::class, 'author_id', 'id');
    }

    // Relación con el modelo Rental
    public function rentals()
    {
        return $this->hasMany(Rental::class);
    }

}
