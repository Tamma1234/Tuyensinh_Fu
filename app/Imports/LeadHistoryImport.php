<?php

namespace App\Imports;

use App\Models\LeadHistory;
;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class LeadHistoryImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new LeadHistory([
            "full_name" => $row['ho_va_ten'],
            "dob" => $row['ngay_sinh'],
            "province" => $row['tinhtp_truong'],
            "school" => $row['truong_thpt'],
            "phone_number" => $row['di_dong'],
            "hphone_number" => $row['dien_thoai'],
            "email" => $row['email'],
            "majors" => $row['nganh'],
            "description" => $row['mo_ta'],
            "source" => $row['nguon'],
            "year" => $row['nam_tuyen_sinh'],
            "status_lead" => $row['tinh_trang_lead'],
            "user_name" => $row['giao_cho']
        ]);
    }
}
