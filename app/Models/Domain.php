<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Domain extends BaseModel
{
    use HasFactory;
    public function getDevelopedStatus()
    {
        if ($this->status == 1) {
            return 'Developed';
        } else {
            return 'Not Developed';
        }
    }
    public function getDevelopedStatusTitle()
    {
        if ($this->status == 1) {
            return 'Developed';
        } else {
            return 'Not Developed';
        }
    }

    public function getDevelopedStatusClass()
    {
        if ($this->status == 1) {
            return 'btn btn-warning';
        } else {
            return 'btn btn-info';
        }
    }
    public function getDevelopedStatusBadgeClass()
    {
        if ($this->status == 1) {
            return 'badge badge-info';
        } else {
            return 'badge badge-warning';
        }
    }



    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }
    public function hosting()
    {
        return $this->belongsTo(Hosting::class, 'hosting_id');
    }
}
