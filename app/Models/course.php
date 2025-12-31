<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class course extends Model
{
    use HasFactory;
    use SoftDeletes;
    /// لربط الموديل بالتيبل
    protected $table = 'courses';

    // primarykey
    protected $primaryKey = 'id';
    protected $fillable = ['code', 'name', 'credit'];
    protected  $appends= ['dept'];
    public function getDeptAttribute(){
        $dept = explode('-', $this->code)[0];
        return $dept;
    }
}
