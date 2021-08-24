<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Member;
use App\Models\Book;


class Borrow extends Model
{
    use HasFactory;
    protected $table = "borrows";
    protected $primaryKey = "id";
    protected $guarded = [];

    public function member(){
        return $this->belongsTo(Member::class);
    }

    public function book(){
        return $this->belongsTo(Book::class);
    }
}
