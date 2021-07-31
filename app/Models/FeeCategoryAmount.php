<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FeeCategoryAmount extends Model
{
    use HasFactory;
    public function fee_category(){
        return $this->BelongsTo(FeeCategory::class,'fee_category_id','id');
    }

    public function student_class(){
        return $this->BelongsTo(StudentClass::class,'class_id','id');
    }
}
