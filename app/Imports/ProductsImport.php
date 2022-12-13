<?php

namespace App\Imports;

use App\Models\Product;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ProductsImport implements ToCollection, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            $product = Product::where('barcode', $row['barcode'])->get();

            if ($product->count() > 0) 
                return;
                
            Product::add([
                'title' => $row['title'],
                'barcode' => $row['barcode'],
                'size' => $row['size'] ?? null,
                'age' => $row['age'] ?? null,
                'binding' => $row['binding'] ?? null,
                'price' => $row['price'],
                'sale_price' => $row['sale_price'] ?? null,
                'description' => $row['description'] ?? null,
                'quantity' => $row['quantity'] ?? null,
                'page_count' => $row['page_count'] ?? null,
                'quantity' => $row['quantity'] ?? 0,
                'year' => $row['year'] ?? null,
                'weight' => $row['weight'] ?? null,
                'cover_link' => $row['weight'] ?? null,
            ]);
        }
    }
}
