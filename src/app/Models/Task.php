<?php

namespace App\Models;          

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model      
{ 
    use HasFactory;
    protected $fillable = ['task_user', 'name', 'date', 'time', 'memo'];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}  