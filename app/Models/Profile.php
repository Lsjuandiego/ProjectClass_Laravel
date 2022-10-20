<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
    protected $fillable = [
        'phone_number',
        'url_facebook',
        'create_at',
        'update_at',
        'user_id'
    ];

    //Indicar que le pertenece a un usuario
    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
