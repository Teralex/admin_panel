<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Role
 *
 * @package App
 * @property string $title
*/
class Group extends Model
{
    protected $fillable = ['title', 'tagname'];
     protected $dates = ['created_at','updated_at'];
}
