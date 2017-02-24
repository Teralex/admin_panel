<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Role
 *
 * @package App
 * @property string $title
*/
class Template extends Model
{
    protected $fillable = ['content', 'title'];


}
