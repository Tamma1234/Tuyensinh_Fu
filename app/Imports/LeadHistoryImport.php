<?php

namespace App\Imports;

use App\Models\FileNameLead;
use App\Models\Lead;
use App\Models\LeadHistory;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class LeadHistoryImport implements WithHeadingRow, ToCollection
{
    public function collection(Collection $rows)
    {
        $fileName = FileNameLead::orderBy('created_at', 'desc')->first();
        $fileNameId = $fileName->id;
        foreach ($rows as $row) {
            $birthday = $row['ngay_sinh'];
            $timestamp = strtotime($birthday);
            if ($timestamp === FALSE) {
                $timestamp = strtotime(str_replace('/', '-', $birthday));
            }
            $format = date('Y-m-d', $timestamp);
            $data = [
                "ho_va_ten" => $row['ho_va_ten'],
                "ngay_sinh" => $format,
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
                "giao_cho" => $row['giao_cho'],
                "id_file_name_lead" => $fileNameId
            ];
            LeadHistory::create($data);
        }
    }
}
