<?php

namespace App\Imports;

use App\Models\Lead;
use App\Models\User;
use Carbon\Carbon;
use http\Env\Request;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use DateTime;
use Maatwebsite\Excel\Concerns\WithValidation;

class UsersImport implements ToCollection, WithHeadingRow, WithValidation
{
    public function collection(Collection $rows)
    {
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
               "id_file_name_lead" => 1
            ];
            Lead::create($data);

        }
    }


    public function rules(): array
    {
        return [
            'ho_va_ten' =>  'required|unique:leads',

            'email' => 'nullable|unique:leads,email',
            // Above is alias for as it always validates in batches

            'ngay_sinh' => 'required|unique:leads',
            // Above is alias for as it always validates in batches

            'truong_thpt' => 'required',

            'tinhtp_truong' => 'required',

            'di_dong' => 'required|unique:leads',
        ];
    }

}
