<?php

namespace App\Models;

use App\Models\Scopes\isActiveScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    // use HasFactory;

    protected $table = "categories";
    protected $primaryKey = "id";
    protected $keyType = "string";
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        "id",
        "name",
        "description",
    ];

    protected static function booted(): void
    {
        parent::booted();
        self::addGlobalScope(new isActiveScope());
    }
}
