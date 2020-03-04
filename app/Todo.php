<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
 {
    /**
    * The attributes that should be casted to native types.
    *
    * @var array
    */
    protected $casts = [
        'user_id' => 'integer',
        'category_id' => 'integer',
        'created_at' => 'datetime:Y-m-d H:i:s',
    ];

    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
        'user_id', 'name', 'status', 'category_id','todo_date','description',
    ];

    /**
    * Get owner of todo.
    *
    * @return BelongsTo
    */

    public function user()
 {
        return $this->belongsTo( User::class );
    }

    public function category()
 {
        return $this->belongsTo( Category::class );
    }
}
