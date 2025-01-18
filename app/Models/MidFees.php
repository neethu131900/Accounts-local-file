<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MidFees extends Model
{
    use HasFactory;

    public function getMidName()
    {
        //return $this->belongsTo(MidList::class, 'mid_list_id', 'id');
        return $this->hasOne(MidList::class, 'id', 'mid_list_id');
    }

    public function getFormatType()
    {
        return $this->hasOne(FormatType::class, 'id', 'format_type_id');
    }

    public function getTimeZoneDetails()
    {
        return $this->hasOne(TimeZone::class, 'utc_offset', 'timezone');
    }
}
