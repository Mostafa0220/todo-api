<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name','last_name','mobile','gender','dob', 'email','password', 'api_token',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    /**
     * Get todos owned by a User.
     *
     * @return HasMany
     */
    public function todos()
    {
        return $this->hasMany(Todo::class);
    }
    public function categories()
    {
        return $this->hasMany(Category::class);
    }
}
