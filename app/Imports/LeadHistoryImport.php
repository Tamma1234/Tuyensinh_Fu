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
            "ho_va_ten" => $row['ho_va_ten'],
            "ngay_sinh" => $row['ngay_sinh'],
            "tinhtp_truong" => $row['tinhtp_truong'],
            "truong_thpt" => $row['truong_thpt'],
            "di_dong" => $row['di_dong'],
            "dien_thoai" => $row['dien_thoai'],
            "email" => $row['email'],
            "nganh" => $row['nganh'],
            "mo_ta" => $row['mo_ta'],
            "nguon" => $row['nguon'],
            "nam_tuyen_sinh" => $row['nam_tuyen_sinh'],
            "tinh_trang_lead" => $row['tinh_trang_lead'],
            "giao_cho" => $row['giao_cho']
        ]);
    }
}
