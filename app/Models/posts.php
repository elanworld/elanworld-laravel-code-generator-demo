<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class posts extends Model
{


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'posts';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;


    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
                  'content',
                  'published_at',
                  'title'
              ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [];


    /**
     * Set the published_at.
     *
     * @param  string  $value
     * @return void
     */
    public function setPublishedAtAttribute($value)
    {
        $this->attributes['published_at'] = !empty($value) ? \DateTime::createFromFormat('j/n/Y g:i A', $value) : null;
    }

    /**
     * Get created_at in array format
     *
     * @param  string  $value
     * @return array
     */
    public function getCreatedAtAttribute($value)
    {
        return \DateTime::createFromFormat($this->getDateFormat(), $value)->format('j/n/Y g:i A');
    }

    /**
     * Get published_at in array format
     *
     * @param  string  $value
     * @return array
     */
    public function getPublishedAtAttribute($value)
    {
        return $value;
    }

    /**
     * Get updated_at in array format
     *
     * @param  string  $value
     * @return array
     */
    public function getUpdatedAtAttribute($value)
    {
        return \DateTime::createFromFormat($this->getDateFormat(), $value)->format('j/n/Y g:i A');
    }

}
