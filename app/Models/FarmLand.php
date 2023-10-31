<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FarmLand extends Model
{
    use HasFactory;

    protected $table = 'farm_lands';

    protected $fillable = [
            'farmer_id',
            'farm_name',
            'total_land_holding',
            'lat',
            'lng',
            'farm_land_ploting',
            'actual_area',
            'farm_photo',
            'land_ownership',
            'srp_score',
            'carbon_index',
            'approach_road',
            'land_topology',
            'land_gradient',
            'land_document',
    ];


    public function farm_land_lat_lng()
    {
        return $this->hasMany(FarmLandLatLng::class,'farm_land_id','id');
    }

    public function cultivation()
    {
        return $this->hasMany(Crops::class,'farm_land_id','id');
    }
    
    public function getFarmPhotoUrlAttribute()
    {
        $photoIds = explode(',', $this->farm_photo);
        $url = [];
        foreach ($photoIds as $photoId) {
            $upload = Uploads::find($photoId);
            if ($upload) {
                $url[] = asset($upload->file_name);
            }
        }

        return $url;
    }
}
