<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class payment extends Model
{
    //
    use HasFactory;
    protected $table = 'payment';
    protected $fillable = [
        'amount', 
        'cellnum', 
        'username', 
        'email', 
        'transactionId'
    ];

}
