<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Concerns\ToCollection;

class ValidateCsvFile implements ToCollection
{
    /**
     * @var errors
     */
    public $errors = [];

    /**
     * @var isValidFile
     */
    public $isValidFile = false;

    /**
    * @param Collection $rows
    */
    public function collection(Collection $rows)
    {
        $errors = [];
        if (count($rows) > 1) {
            $rows = $rows->slice(1);
            foreach ($rows as $key => $row) {
                $validator = Validator::make($row->toArray(), [
                    '0' => [
                        'required',
                    ],
                    '1' => [
                        'required',
                        // 'unique:users',
                    ],
                    '2' => [
                        'required',
                    ],
                    '3' => [
                        'required',
                    ],
                    '4' => [
                        'required',
                    ],
                    '5' => [
                        'required',
                    ],
                    '6' => [
                        'required',
                    ],
                    '7' => [
                        'required',
                    ],
                ]);

                if ($validator->fails()) {
                    $errors[$key] = $validator;
                }
            }
            $this->errors = $errors;
            $this->isValidFile = true;
        }

    }
}
