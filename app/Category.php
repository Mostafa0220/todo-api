<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
 {

    /**
    * The attributes that should be casted to native types.
    *
    * @var array
    */
    protected $casts = [
        'user_id' => 'integer',
    ];

    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
        'name',
        'user_id',
    ];

    /**
    * Get owner of todo.
    *
    * @return HasMany
    */

    public function todos()
 {

        return $this->hasMany( 'App\Todo' );
    }

    /**
    * Get owner of user.
    *
    * @return BelongsTo
    */

    public function user()
 {
        return $this->belongsTo( User::class );
    }

}
