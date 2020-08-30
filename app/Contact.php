<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = ['fname','lname','phone_number','email','company_id','address'];


    public function Company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }

    
}
