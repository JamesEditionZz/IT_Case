<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DeleteController extends Controller
{
    public function Deletemachine(Request $request)
    {
        $code_ID = $request->input('code_ID');

        DB::table('data_detail')->where('code_ID', $code_ID)->delete();

        return response()->json('ลบข้อมูลแล้ว');
    }

    public function deletelistIT(Request $request)
    {

        $IT_date = $request->input('IT_date');
        $IT_detail = $request->input('IT_detail');
        $IT_other = $request->input('IT_other');
        $IT_change = $request->input('IT_change');
        $IT_namechange = $request->input('IT_namechange');

        DB::table('itsupport_detail')
            ->where('IT_date', $IT_date)
            ->where('IT_detail', $IT_detail)
            ->where('IT_other', $IT_other)
            ->where('IT_change', $IT_change)
            ->where('IT_namechange', $IT_namechange)
            ->delete();

        return response()->json('ลบข้อมูลแล้ว');
    }

    public function DeleteBrand(Request $request)
    {
        $Brand_ID = $request->input('Brand_ID');
        
        DB::table('brand')->where('brand_ID', $Brand_ID)->delete();

        return response()->json('ลบข้อมูลแล้ว');
    }

    public function DeleteCategory(Request $request){
        $categoryID = $request->input('category_ID');

        DB::table('category')->where('category_ID', $categoryID)->delete();

        return response()->json('ลบข้อมูลแล้ว');
    }

    public function DeleteEquipment(Request $request){
        $equipmentID = $request->input('equipment_ID');

        DB::table('equipment')->where('equipment_ID', $equipmentID)->delete();

        return response()->json('ลบข้อมูลแล้ว');
    }
}