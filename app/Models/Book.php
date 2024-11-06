<?php

namespace App\Models;

use App\Models\Kategoribuku;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Book extends Model
{
    use HasFactory;

    protected $table='books';
    protected $primaryKey='id';
    protected $fillable=['id', 'judul', 'penulis', 'penerbit', 'th_terbit', 'foto', 'status'];

    /**
     * The kategoris that belong to the Book
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function kategoris(): BelongsToMany
    {
        return $this->belongsToMany(Kategoribuku::class, 'kategoribuku_relasis', 'book_id', 'kategoribuku_id');
    }

}
