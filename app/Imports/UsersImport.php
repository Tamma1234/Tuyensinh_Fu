<?php

namespace App\Imports;

use App\Models\Lead;
use App\Models\User;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\WithValidation;

class UsersImport implements toModel, WithHeadingRow, WithValidation
{
    public function model(array $row)
    {
        return new Lead([
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

    public function rules(): array
    {
        return [
            '*.ho_va_ten' => 'required' ,

            'email' => 'required|email|unique:leads' ,

            '*.email' => 'required|email|unique:leads' ,
            // Above is alias for as it always validates in batches
            'ngay_sinh' => 'required',

            '*.ngay_sinh' => 'required',

            'tinhtp_truong' => 'required' ,

            '*.tinhtp_truong' => 'required' ,
            // Above is alias for as it always validates in batches
            'truong_thpt' => 'required',

            '*.truong_thpt' => 'required',

            'di_dong' => 'required' ,

            '*.di_dong' =>'required' ,

        ];
    }

}
