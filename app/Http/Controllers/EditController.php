<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EditController extends Controller
{
    public function edittranfer(Request $request)
    {
        $code_ID = $request->input('code_ID');

        $editcode = DB::table('data_detail')->select('code_ID', 'name_informer', 'department', 'section')->where('code_ID', $code_ID)->first();

        return response()->json($editcode);
    }

    public function updatetranfer(Request $request)
    {

        $code_ID = $request->input('waitcode_ID');

        $oldinformer = $request->input('waitinformer');
        $olddepart = $request->input('waitdepart');
        $oldsection = $request->input('waitsection');

        $newinformer = $request->input('informer');
        $newdepart = $request->input('depart');
        $newsection = $request->input('section');

        if ($newinformer && $newdepart && $newsection) {
            DB::table('data_detail')
                ->where('code_ID', $code_ID)
                ->update([
                    'tf_informer' => $oldinformer,
                    'tf_department' => $olddepart,
                    'tf_section' => $oldsection,
                    'name_informer' => $newinformer,
                    'department' => $newdepart,
                    'section' => $newsection
                ]);

            $text = "อัพเดทแล้ว";
        } else {
            $text = "อัพเดทบ่ได้จ้า";
        }

        return response()->json($text);
    }
    public function editrecord(Request $request)
    {
        $detail_ID = $request->input('detail_ID');

        $editdetail = DB::table('data_detail')
            ->select('category.category_ID', 'equipment.equipment_ID', 'brand.Brand_ID', 'data_detail.detail_ID', 'category.name_category', 'equipment.name_equipment', 'brand.name_brand', 'data_detail.department', 'data_detail.section', 'data_detail.name_informer', 'data_detail.type', 'data_detail.other')
            ->join('category', 'data_detail.category_ID', '=', 'category.category_ID')
            ->join('equipment', 'data_detail.equipment_ID', '=', 'equipment.equipment_ID')
            ->join('brand', 'data_detail.brand_ID', '=', 'brand.Brand_ID')
            ->where('detail_ID', $detail_ID)->first();

        return response()->json($editdetail);
    }

    public function recordEdit(Request $request)
    {
        $detail_ID = $request->input('detail_ID');
        $cateid = $request->input('cateid');
        $equipmentID = $request->input('equipmentID');
        $brandID = $request->input('brandID');
        $ordername = $request->input('ordername');
        $informer = $request->input('informer');
        $department = $request->input('department');
        $section = $request->input('section');
        $other = $request->input('other');

        DB::table('data_detail')
            ->where('detail_ID', $detail_ID)
            ->update([
                'category_ID' => $cateid,
                'equipment_ID' => $equipmentID,
                'brand_ID' => $brandID,
                'type' => $ordername,
                'name_informer' => $informer,
                'department' => $department,
                'section' => $section,
                'other' => $other,
            ]);

        return response()->json('success');
    }

    public function editrecordIT(Request $request)
    {
        $IT_ID = $request->input('ITID');
        $editdate1 = $request->input('editdate1');
        $editdate2 = $request->input('editdate2');
        $editdate3 = $request->input('editdate3');
        $editname = $request->input('editname');
        $editagency = $request->input('editagency');
        $editdivision = $request->input('editdivision');
        $editdetail = $request->input('editdetail');
        $editother = $request->input('editother');
        $editchange = $request->input('editchange');
        $editnamechange = $request->input('editnamechange');
        $editservice = $request->input('editservice');

        DB::table('itsupport_detail')
            ->where('IT_ID', $IT_ID)
            ->update([
                'IT_date' => $editdate1 . "-" . $editdate2 . "-" . $editdate3,
                'member_name' => $editname,
                'IT_detail' => $editdetail,
                'IT_other' => $editother,
                'IT_change' => $editchange,
                'IT_namechange' => $editnamechange,
                'IT_service' => $editservice,
                'name_agency' => $editagency,
                'name_division' => $editdivision
            ]);

        return response()->json('แก้ไขสำเร็จ');
    }

    public function updateBrand(Request $request)
    {
        $brandID = $request->input('brandID');
        $brandName = $request->input('brandName');
        $equipID = $request->input('equipID');

        DB::table('brand')
            ->where('Brand_ID', $brandID)
            ->update([
                'name_brand' => $brandName,
                'equip_ID' => $equipID,
            ]);

        return response()->json('แก้ไขแล้ว');
    }

    public function UpdateCategory(Request $request)
    {

        $categoryID = $request->input('categoryID');
        $categoryName = $request->input('categoryName');

        DB::table('category')
        ->where('category_ID', $categoryID)
        ->update([
            'name_category' => $categoryName
        ]);

        return response()->json('แก้ไขแล้ว');
    }

    public function updateEquipment(Request $request)
    {
        $equipmentID = $request->input('equipmentID');
        $equipmentname = $request->input('equipmentname');

        DB::table('equipment')
        ->where('equipment_ID', $equipmentID)
        ->update([
            'name_equipment' => $equipmentname
        ]);

        return response()->json('แก้ไขแล้ว');
    }
}