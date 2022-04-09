<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'description',
	'due_date',
	'created_by'
    ];

    protected $casts = [
	'due_date' => 'date:m/d/Y H:i:s'
    ];

    public function user(){
	return $this->hasOne('App\Models\User', 'id', 'user_id');
    }

}
