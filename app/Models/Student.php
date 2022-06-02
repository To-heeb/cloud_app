<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $primaryKey = 'student_id';

    public static function getStudent($id)
    {
        //raw query
        $result = DB::select('SELECT * FROM students WHERE student_id=?', [$id]);

        $result3 = Student::find($id);

        return $result3;
    }
}
