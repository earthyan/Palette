<?php namespace Palette;

use Illuminate\Database\Eloquent\Model;

class Images extends Model {
  protected $table = 'images';
  protected $primaryKey = 'id';
  protected $fillable = ['uuid', 'uid', 'name', 'dir', 'filename', 'ext', 'size'];
}
