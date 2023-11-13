<?php

namespace App\Http\Controllers;

use App\Models\Categorys;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function insertmachine(Request $request)
    {

        $cateid = $request->input("cateid");
        $equipmentID = $request->input("equipmentID");
        $brandID = $request->input("brandID");
        $order = $request->input("order");
        $typename = $request->input("ordername");
        $informer = $request->input("informer");
        $department = $request->input("department");
        $section = $request->input("section");
        $other = $request->input("other");

        $date = date('Y-m-d');

        $yy = substr($date, 0, 4) + 543;

        $y = substr($yy, 2, 2);
        $m = substr($date, 5, 2);
        $d = date('d');

        $zeroday = str_pad($d, 2, "0", STR_PAD_LEFT);
        $zeromount = str_pad($m, 2, "0", STR_PAD_LEFT);

        $datefinal = $zeroday . "-" . $zeromount . "-" . $y;

        if ($order === "1") {
            $ordercode = "PQ";
        } else if ($order === "2") {
            $ordercode = "HW";
        } else if ($order == "3") {
            $ordercode = "SW";
        }



        if ($ordercode && $cateid && $equipmentID && $brandID && $typename && $informer && $department && $section) {
            $datalist = DB::table('data_detail')->where('code_ID', 'like', $ordercode . "%")->count();

            if ($datalist == 0) {
                $number = $zeromount = str_pad(1, 4, "0", STR_PAD_LEFT);
                $codeitem = $ordercode . $y . $m . $number;
                DB::table('data_detail')
                    ->insert([
                        'code_ID' => $codeitem,
                        'date_item' => $datefinal,
                        'category' => $cateid,
                        'equipment' => $equipmentID,
                        'brand_ID' => $brandID,
                        'department' => $department,
                        'section' => $section,
                        'name_informer' => $informer,
                        'type' => $typename,
                        'other' => $other
                    ]);
                return response()->json('เพิ่มข้อมูลสำเร็จ');
            } else {
                $datalist++;
                $number = str_pad($datalist, 4, "0", STR_PAD_LEFT);
                $codeitem = $ordercode . $y . $m . $number;

                DB::table('data_detail')
                    ->insert([
                        'code_ID' => $codeitem,
                        'date_item' => $datefinal,
                        'category_ID' => $cateid,
                        'equipment_ID' => $equipmentID,
                        'brand_ID' => $brandID,
                        'department' => $department,
                        'section' => $section,
                        'name_informer' => $informer,
                        'type' => $typename,
                        'other' => $other
                    ]);
                return response()->json('เพิ่มข้อมูลสำเร็จ');
            }
        }
        return response()->json('ไม่สามารถเพิ่มข้อมูลได้');
    }

    public function searchcate(Request $request)
    {

        $result_cate = DB::table('category')->get();

        return response()->json($result_cate);
    }

    public function insertcate(Request $request)
    {

        $result_cate = $request->input('insertInput');

        DB::statement('ALTER TABLE category AUTO_INCREMENT = 1');

        DB::table('category')->insert([
            'name_category' => $result_cate
        ]);

        return response()->json($result_cate);
    }

    public function insertdepart(Request $request)
    {
        $depart = $request->input('adddepart');

        DB::statement('ALTER TABLE department AUTO_INCREMENT = 1');

        DB::table('department')
            ->insert(['name_department' => $depart]);

        return response()->json($depart);
    }

    public function searchequip(Request $request)
    {

        if ($request->input('ID_category')) {
            $result_equipID = $request->input('ID_category');

            $DB_equip = DB::table('equipment')->where('category_id', $result_equipID)->get();

            return response()->json($DB_equip);
        } else {
            $result_equipID = $request->input('category_ID');

            $DB_equip = DB::table('equipment')->where('category_id', $result_equipID)->get();

            return response()->json($DB_equip);
        }
    }

    public function finddepart(Request $request)
    {

        $departID = $request->input('department_ID');
        $departID2 = $request->input('departID');

        if ($departID) {
            $listsection = DB::table('section')->select('section_ID', 'name_section')->where('department_id', $departID)->get();
        } else if ($departID2) {
            $listsection = DB::table('section')->select('section_ID', 'name_section')->where('department_id', $departID2)->get();
        }

        return response()->json($listsection);
    }

    public function seadepart(Request $request)
    {

        $listdepart = DB::TABLE('department')->get();

        return response()->json($listdepart);
    }

    public function insertequip(Request $request)
    {

        $category = $request->input('category');
        $equipname = $request->input('equip');

        if ($category != "") {

            DB::statement('ALTER TABLE equipment AUTO_INCREMENT = 1');

            DB::table('equipment')->insert([
                'name_equipment' => $equipname,
                'category_id' => $category
            ]);

            $res = 'เพิ่มอุปกรณ์แล้ว';
        } else {
            $res = "เลือกประเภท";
        }
        return response()->json($res);
    }

    public function insertsection(Request $request)
    {

        $section = $request->input('section');
        $department = $request->input('department');

        if ($department) {

            DB::statement('ALTER TABLE section AUTO_INCREMENT = 1');

            DB::table('section')->insert([
                'name_section' => $section,
                'department_ID' => $department
            ]);
            $res = "เพิ่มแผนกแล้ว";
        } else {
            $res = "เลือกอาคาร";
        }

        return response()->json($res);
    }

    public function addbrand(Request $request)
    {

        $brand = $request->input("brandinsert");
        $equipID = $request->input("equip_ID");

        if ($equipID) {
            $checkdata = DB::table('brand')->where('name_brand', $brand)->first();

            if ($checkdata === null) {
                DB::statement('ALTER TABLE brand AUTO_INCREMENT = 1');

                DB::table('brand')->insert([
                    'name_brand' => $brand,
                    'equip_ID' => $equipID
                ]);

                $res = 'เพิ่มแบรนแล้ว';
            } else {
                $res = 'มีข้อมูลอยู่แล้ว';
            }
        } else {
            $res = 'ไม่สามารถเพิ่มข้อมูลได้ เลือกอุปกรณ์ก่อน';
        }

        return response()->json($res);
    }

    public function recordCaseIT(Request $request)
    {

        $adddate1 = $request->input('adddate1');
        $adddate2 = $request->input('adddate2');
        $adddate3 = $request->input('adddate3');
        $name = $request->input('addname');
        $agency = $request->input('addagency');
        $division = $request->input('adddivision');
        $detail = $request->input('adddetail');
        $other = $request->input('addother');
        $change = $request->input('addchange');
        $namechange = $request->input('addnamechange');
        $service = $request->input('addservice');

        $date1 = str_pad($adddate1, 2, "0", STR_PAD_LEFT);
        $date2 = str_pad($adddate2, 2, "0", STR_PAD_LEFT);
        $date3 = str_pad($adddate3, 2, "0", STR_PAD_LEFT);


        $date = $date1 . '-' . $date2 . '-' . $date3;

        DB::statement('ALTER TABLE itsupport_detail AUTO_INCREMENT = 1');

        if ($name && $name && $agency && $division) {
            DB::table('itsupport_detail')->insert([
                'IT_date' => $date,
                'member_name' => $name,
                'IT_detail' => $detail,
                'name_agency' => $agency,
                'name_division' => $division,
                'IT_other' => $other,
                'IT_change' => $change,
                'IT_namechange' => $namechange,
                'IT_service' => $service
            ]);

            $text = "บันทึกสำเร็จ";
        } else {
            $text = "ไม่สามารถบันทึกได้";
        }

        $request->session()->flush();

        return response()->json($text);
    }

    public function recordproblem(Request $request)
    {
        $ID = $request->input('ID');
        $RP_ID = $request->input('RP_ID');
        $name = $request->input('name');
        $department = $request->input('department');
        $section = $request->input('section');
        $tel = $request->input('tel');
        $other = $request->input('other');
        $valuename = $request->input('valuename');

        $y = date('Y')+543;
        $m = date('m');
        $d = date('d');

        if ($name != "" && $department != "" && $section != "" && $other != "") {

            DB::statement('ALTER TABLE report_problem AUTO_INCREMENT = 1');

            DB::table('report_problem')->insert([
                'RP_date' => $y.'-'.$m.'-'.$d,
                'RP_name' => $name,
                'RP_department' => $department,
                'RP_section' => $section,
                'RP_tel' => $tel,
                'RP_other' => $other,
                'RP_status' => '0'
            ]);
            return response()->json('แจ้งเคสแล้ว');
        } else if ($valuename != "") {
            DB::table('report_problem')->where('ID', $RP_ID)->update([
                'RP_member' => $valuename,
                'RP_status' => 1
            ]);
            return response()->json('รับเคสแล้ว');
        } elseif ($ID != "") {
            DB::table('report_problem')->where('ID', $ID)->update([
                'RP_status' => 2
            ]);

            $waitrecode = DB::table('report_problem')->where('ID', $ID)->first();

            $date = $waitrecode->RP_date;
            $nameRP = $waitrecode->RP_name;
            $departmentRP = $waitrecode->RP_name;
            $sectionRP = $waitrecode->RP_name;
            $telRP = $waitrecode->RP_name;
            $otherRP = $waitrecode->RP_name;
            $memberRP = $waitrecode->RP_name;

            $request->session()->put('date', $date);
            $request->session()->put('nameRP', $nameRP);
            $request->session()->put('departmentRP', $departmentRP);
            $request->session()->put('sectionRP', $sectionRP);
            $request->session()->put('telRP', $telRP);
            $request->session()->put('otherRP', $otherRP);
            $request->session()->put('memberRP', $memberRP);

            return response()->json($waitrecode);
        }
    }
}