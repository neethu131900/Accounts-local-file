<?php

namespace App\Imports;


use App\Models\User;
use App\Models\PaizenTmp;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;
use Maatwebsite\Excel\Concerns\WithStartRow;

use Carbon\Carbon;

class ImportData implements ToModel, WithStartRow
{
    /**
     * @return int
     */

    public function startRow(): int
    {
        return 2;
    }

    private $data;

    public function __construct(array $data = [])
    {
        $this->data = $data;
    }

    private function transformDateTime($value, $format = 'd/m/Y H:i:s')
    {
        try {
            return Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($value))->format($format);
        } catch (\ErrorException $e) {
            return Carbon::createFromFormat($format, $value);
        }
    }

    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return   PaizenTmp::create([
            'mid_id' => $row[0],
            'settlement_type' => $row[1],
            'transaction_date' => (isset($row[2]) && $row[2] != '') ? $this->transformDateTime($row[2]) : "",
        ]);
    }
}
