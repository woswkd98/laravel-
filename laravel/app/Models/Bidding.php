<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Bidding extends Pivot // 중간테이블을 위해 상속받는 모델
{
    use HasFactory;
}
