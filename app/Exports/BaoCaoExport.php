<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;

class BaoCaoExport implements FromArray, WithHeadings
{
    use Exportable;
    protected $du_lieu;
    public function __construct($du_lieu)
    {
        $this->du_lieu = $du_lieu;
        
    }
    public function array() : array
    {
        // Filter the data to include only attributes ending with '_nam'
        // $filteredData = array_filter($this->du_lieu, function($key) {
        //     return str_ends_with($key, '_nam');
        // }, ARRAY_FILTER_USE_KEY);
    
        // // Ensure all arrays have the same length
        // $maxLength = max(array_map('count', $filteredData));
        // foreach ($filteredData as &$array) {
        //     $array = array_pad($array, $maxLength, 0);
        // }
    
        // Convert the filtered data to a format suitable for Excel export
        $exportData = [];
        foreach ($this->du_lieu as $key => $values) {
            $exportData[] = array_merge([$key], $values);
        }
        
        return $exportData;
    }
    public function headings(): array
    {
        return ['Loại dữ liệu',
        'Tháng 1',
        'Tháng 2',
        'Tháng 3',
        'Tháng 4',
        'Tháng 5',
        'Tháng 6',
        'Tháng 7',
        'Tháng 8',
        'Tháng 9',
        'Tháng 10',
        'Tháng 11',
        'Tháng 12',
        'Tổng năm'];
    }
}
