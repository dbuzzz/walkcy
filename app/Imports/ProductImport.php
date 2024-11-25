<?php

namespace App\Imports;

// use Illuminate\Support\Collection;
// use Maatwebsite\Excel\Concerns\ToCollection;
use App\Models\ProductVariant;
use Maatwebsite\Excel\Concerns\ToModel;
use App\Models\Product;
use App\Models\ProductImage;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Auth;
use Illuminate\Support\Facades\Storage;

class ProductImport implements ToModel,WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    public function model(array $row)
    {
        // print_r($row['image']);
        // die;
        $formdata['name'] = $row['title'];
        $formdata['brand_id'] = $row['brand_id'];
        $formdata['cat_id'] = $row['cat_id'];
        $formdata['sub_cat_id'] = $row['sub_cat_id'];
        $formdata['tax_id'] = $row['tax_id'];
        $formdata['mrp'] = $row['mrp'];
        $formdata['price'] = $row['price'];
        $formdata['sale'] = $row['sale'];
        $formdata['is_return'] = $row['is_return'];
        $formdata['best_selling'] = $row['best_selling'];
        $formdata['coupon_valid'] = $row['coupon_valid'];
        $formdata['self_shipping'] = $row['self_shipping'];
        $formdata['added_by'] = Auth::user()->id;
        $last_id = Product::insertGetId($formdata);
        // print_r($last_id,);
        // print_r($formdata,);
        // die;
        if (!empty($row['image'])) {
            $formdata['image'] = storage_path('app/public/upload'.$row['title'].'.jpg');
            $filedata['path'] = storage_path('app/public/upload'.$row['title'].'.jpg');
            $filedata['added_by'] = Auth::user()->id;
            $filedata['prd_id'] = $last_id; 
            ProductImage::insertGetId($filedata);
            Storage::disk('public')->put('upload'.$row['title'].'.jpg', file_get_contents($row['image']));
        }
        $variantData['variant'] = $row['variant'].'g';
        $variantData['qty'] = $row['qty'];
        $variantData['mrp'] = $row['mrp'];
        $variantData['price'] = $row['price'];
        $variantData['length'] = $row['length'];
        $variantData['breath'] = $row['breath'];
        $variantData['height'] = $row['height'];
        $variantData['weight'] = $row['weight'];
        $variantData['added_by'] = Auth::user()->id;
        $variantData['prod_id'] = $last_id; 
        $last_ids = ProductVariant::insertGetId($variantData);
    }
}
