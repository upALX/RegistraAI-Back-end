<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'task';
    protected $keyType = 'string';
    public $incrementing = false;
    public $timestamps = true;

    protected $fillable = [
        'id',          
        'title',       
        'description', 
        'status',      
    ];

    const STATUS_PENDING = 'pending';
    const STATUS_DONE = 'done';

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->id)) {
                $model->id = (string) \Str::uuid();
            }
        });
    }

    public static function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'status' => 'required|in:' . self::STATUS_PENDING . ',' . self::STATUS_DONE,
        ];
    }
}
