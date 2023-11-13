<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function welcome()
    {
        session()->forget('user');
		session()->forget('pass');
		
        $orderdetail = DB::table('data_detail')->get();
        $caseIT = DB::table('itsupport_detail')->get();
        $numberPQ = 0;
        $numberHW = 0;
        $numberSW = 0;

        foreach ($orderdetail as $PQ) {
            if (strpos($PQ->code_ID, 'PQ') !== false) {
                $numberPQ++;
            } else if (strpos($PQ->code_ID, 'HW') !== false) {
                $numberHW++;
            } else {
                $numberSW++;
            }
        }

        $yyyy = date('Y');

        $month1 = 0;
        $month2 = 0;
        $month3 = 0;
        $month4 = 0;
        $month5 = 0;
        $month6 = 0;
        $month7 = 0;
        $month8 = 0;
        $month9 = 0;
        $month10 = 0;
        $month11 = 0;
        $month12 = 0;
        $listall = 0;
        $listall1 = 0;
        $listall2 = 0;
        $yearthaiafter2 = $yyyy + 541;
        $yearthaiafter1 = $yyyy + 542;
        $yearthai = $yyyy + 543;
        $cutyyyy = substr($yearthai, 2, 2);
        $cutyyyy1 = substr($yearthaiafter1, 2, 2);
        $cutyyyy2 = substr($yearthaiafter2, 2, 2);


        foreach ($caseIT as $month) {
            $datetoday = $month->IT_date;
            $cutmonth = substr($datetoday, 3, 2);
            $cutyear = substr($datetoday, 6, 2);
            if ($cutyear == $cutyyyy) {
                switch ($cutmonth) {
                    case '01':
                        $month1++;
                        break;
                    case '02':
                        $month2++;
                        break;
                    case '03':
                        $month3++;
                        break;
                    case '04':
                        $month4++;
                        break;
                    case '05':
                        $month5++;
                        break;
                    case '06':
                        $month6++;
                        break;
                    case '07':
                        $month7++;
                        break;
                    case '08':
                        $month8++;
                        break;
                    case '09':
                        $month9++;
                        break;
                    case '10':
                        $month10++;
                        break;
                    case '11':
                        $month11++;
                        break;
                    case '12':
                        $month12++;
                        break;
                }
            }
            if ($cutyear == $cutyyyy) {
                $listall++;
            } elseif ($cutyear == $cutyyyy1) {
                $listall1++;
            } elseif ($cutyear == $cutyyyy2) {
                $listall2++;
            }
        }
        return view('welcome', compact('caseIT', 'numberPQ', 'numberHW', 'numberSW', 'month1', 'month2', 'month3', 'month4', 'month5', 'month6', 'month7', 'month8', 'month9', 'month10', 'month11', 'month12', 'yearthai', 'yearthaiafter1', 'yearthaiafter2', 'listall', 'listall1', 'listall2'));
    }

    public function Index()
    {
        $user = session('user');
        $pass = session('pass');

        if ($user && $pass) {
            
        $orderdetail = DB::table('data_detail')->get();
        $caseIT = DB::table('itsupport_detail')->get();
        $caseproblem = DB::table('report_problem')->where('RP_status', '!=', 2)->get();
        $numberPQ = 0;
        $numberHW = 0;
        $numberSW = 0;

        foreach ($orderdetail as $PQ) {
            if (strpos($PQ->code_ID, 'PQ') !== false) {
                $numberPQ++;
            } else if (strpos($PQ->code_ID, 'HW') !== false) {
                $numberHW++;
            } else {
                $numberSW++;
            }
        }

        $yyyy = date('Y');

        $month1 = 0;
        $month2 = 0;
        $month3 = 0;
        $month4 = 0;
        $month5 = 0;
        $month6 = 0;
        $month7 = 0;
        $month8 = 0;
        $month9 = 0;
        $month10 = 0;
        $month11 = 0;
        $month12 = 0;
        $listall = 0;
        $listall1 = 0;
        $listall2 = 0;
        $yearthaiafter2 = $yyyy + 541;
        $yearthaiafter1 = $yyyy + 542;
        $yearthai = $yyyy + 543;
        $cutyyyy = substr($yearthai, 2, 2);
        $cutyyyy1 = substr($yearthaiafter1, 2, 2);
        $cutyyyy2 = substr($yearthaiafter2, 2, 2);


        foreach ($caseIT as $month) {
            $datetoday = $month->IT_date;
            $cutmonth = substr($datetoday, 3, 2);
            $cutyear = substr($datetoday, 6, 2);
            if ($cutyear == $cutyyyy) {
                switch ($cutmonth) {
                    case '01':
                        $month1++;
                        break;
                    case '02':
                        $month2++;
                        break;
                    case '03':
                        $month3++;
                        break;
                    case '04':
                        $month4++;
                        break;
                    case '05':
                        $month5++;
                        break;
                    case '06':
                        $month6++;
                        break;
                    case '07':
                        $month7++;
                        break;
                    case '08':
                        $month8++;
                        break;
                    case '09':
                        $month9++;
                        break;
                    case '10':
                        $month10++;
                        break;
                    case '11':
                        $month11++;
                        break;
                    case '12':
                        $month12++;
                        break;
                }
            }
            if ($cutyear == $cutyyyy) {
                $listall++;
            } elseif ($cutyear == $cutyyyy1) {
                $listall1++;
            } elseif ($cutyear == $cutyyyy2) {
                $listall2++;
            }
        }

        return view('Page.index', compact('caseproblem', 'caseIT', 'numberPQ', 'numberHW', 'numberSW', 'month1', 'month2', 'month3', 'month4', 'month5', 'month6', 'month7', 'month8', 'month9', 'month10', 'month11', 'month12', 'yearthai', 'yearthaiafter1', 'yearthaiafter2', 'listall', 'listall1', 'listall2'));
        }else{
            return view('login')->with(['error' => 'error']);
        }
    }

    public function Computer()
    {
        $category = DB::table('category')->orderBy('name_category', 'ASC')->get();
        $detail = DB::table('data_detail')
            ->select('data_detail.detail_ID', 'data_detail.date_item', 'data_detail.code_ID', 'category.name_category', 'equipment.name_equipment', 'data_detail.department', 'data_detail.section', 'brand.name_brand', 'data_detail.department', 'data_detail.name_informer', 'data_detail.type', 'data_detail.other', 'data_detail.tf_department', 'data_detail.tf_informer', 'data_detail.tf_section')
            ->join('category', 'category.category_ID', '=', 'data_detail.category_ID')
            ->join('equipment', 'equipment.equipment_ID', '=', 'data_detail.equipment_ID')
            ->join('brand', 'brand.Brand_ID', '=', 'data_detail.brand_ID')
            ->paginate(5);

        return view('Page.Computer', compact('category', 'detail'));
    }

    public function ITSupport()
    {
        $datait = DB::table('itsupport_detail')
            ->get();
        return view('Page.ITSupport', compact('datait'));
    }

    public function Report()
    {
        return view('Page.Report');
    }

    public function equipment(Request $request)
    {

        $equipment = $request->input('category_ID');

        $equiplist = DB::table('equipment')
            ->select('equipment_ID', 'name_equipment')
            ->where('category_id', $equipment)
            ->orderBy('name_equipment', 'ASC')->get();

        return response()->json($equiplist);
    }

    public function showmachine()
    {
        $detail = DB::table('data_detail')
            ->select('data_detail.code_ID', 'category.name_category', 'equipment.name_equipment', 'data_detail.name_department', 'data_detail.name_section')
            ->join('category', 'category.category_ID', '=', 'data_detail.category_ID')
            ->join('equipment', 'equipment.equipment_ID', '=', 'data_detail.equipment_ID')
            ->get();

        return response()->json($detail);
    }
    public function showequip(Request $request)
    {
        $category = $request->input('category');

        $detail = DB::table('equipment')->where('category_id', $category)->get();

        return response()->json($detail);
    }

    public function showsectionlist(Request $request)
    {
        $department = $request->input('department');

        $detail_section = DB::table('section')->where('department_ID', $department)->get();

        return response()->json($detail_section);
    }

    public function listbrand(Request $request)
    {

        $brand = $request->input('equipbrand');
        $equip = $request->input('equip');

        if ($brand) {
            $detail_brand = DB::table('brand')->where('equip_ID', $brand)->get();
        } else if ($equip) {
            $detail_brand = DB::table('brand')->where('equip_ID', $equip)->get();
        }



        return response()->json($detail_brand);
    }
    public function datalist()
    {
        $datadetail = DB::table('data_detail')
            ->select('data_detail.date_item', 'data_detail.code_ID', 'category.name_category', 'equipment.name_equipment', 'data_detail.department', 'data_detail.section', 'brand.name_brand', 'data_detail.name_informer', 'data_detail.type', 'data_detail.other', 'data_detail.tf_department', 'data_detail.tf_informer', 'data_detail.tf_section')
            ->join('category', 'category.category_ID', '=', 'data_detail.category_ID')
            ->join('equipment', 'equipment.equipment_ID', '=', 'data_detail.equipment_ID')
            ->join('brand', 'brand.Brand_ID', '=', 'data_detail.brand_ID')
            ->get();
        $castIT = DB::table('itsupport_detail')
            ->get();

        return view('Page.Datalist', compact('datadetail', 'castIT'));
    }
    public function listPQ()
    {
        $listPQ = DB::table('data_detail')
            ->select('data_detail.date_item', 'data_detail.code_ID', 'category.name_category', 'equipment.name_equipment', 'data_detail.department', 'data_detail.section', 'brand.name_brand', 'data_detail.name_informer', 'data_detail.type', 'data_detail.other', 'data_detail.tf_department', 'data_detail.tf_informer', 'data_detail.tf_section')
            ->join('category', 'category.category_ID', '=', 'data_detail.category_ID')
            ->join('equipment', 'equipment.equipment_ID', '=', 'data_detail.equipment_ID')
            ->join('brand', 'brand.Brand_ID', '=', 'data_detail.brand_ID')
            ->get();

        return response()->json($listPQ);
    }

    public function caseitsupport()
    {
        $caselist = DB::table('itsupport_detail')
            ->get();

        return response()->json($caselist);
    }

    public function reportlistcate()
    {
        $reportcatelist = DB::table('category')->get();

        return response()->json($reportcatelist);
    }

    public function reportlistequip(Request $request)
    {

        $cate_ID = $request->input('cate_ID');

        $reportequiplist = DB::table('equipment')->where('category_id', $cate_ID)->get();

        return response()->json($reportequiplist);
    }

    public function ShowReport(Request $request)
    {
        $PostcodeID = $request->input('codeID');
        $Postdate1 = $request->input('date1');
        $Postdate2 = $request->input('date2');
        $Postincategory = $request->input('incategory');
        $Postinputequipment = $request->input('inputequipment');
        $PostITdate1 = $request->input('ITdate1');
        $PostITdate2 = $request->input('ITdate2');

        $findcategory = DB::table('category')->select('category_ID')->where('name_category', $Postincategory)->first();
        $findequipment = DB::table('equipment')->select('equipment_ID')->where('name_equipment', $Postinputequipment)->first();

        if ($PostcodeID != null) {
            $Code_ID = DB::table('data_detail')
                ->select('data_detail.code_ID', 'data_detail.date_item', 'category.name_category', 'equipment.name_equipment', 'brand.name_brand', 'data_detail.department', 'data_detail.section', 'data_detail.name_informer', 'data_detail.type', 'data_detail.other', 'data_detail.tf_informer', 'data_detail.tf_department', 'data_detail.tf_section')
                ->join('category', 'data_detail.category_ID', 'category.category_ID')
                ->join('equipment', 'data_detail.equipment_ID', 'equipment.equipment_ID')
                ->join('brand', 'data_detail.brand_ID', 'brand.Brand_ID')
                ->where('code_ID', 'LIKE', $PostcodeID . '%')
                ->get();

            return view('Page.Report.Report1', compact('Code_ID', 'PostcodeID'));

        } elseif ($Postdate1 != null && $Postdate2 != null) {
            if ($Postdate1 <= $Postdate2) {

                $yyyy1 = substr($Postdate1, 0, 4) + 543;
                $month1 = substr($Postdate1, 5, 2);
                $day1 = substr($Postdate1, 8, 2);

                $yyyy2 = substr($Postdate2, 0, 4) + 543;
                $month2 = substr($Postdate2, 5, 2);
                $day2 = substr($Postdate2, 8, 2);

                $date1 = $day1 . "/" . $month1 . "/" . $yyyy1;
                $date2 = $day2 . "/" . $month2 . "/" . $yyyy2;

                $finddate1 = $day1 . "-" . $month1 . "-" . $yyyy1;
                $finddate2 = $day2 . "-" . $month2 . "-" . $yyyy2;

                $date = DB::table('data_detail')
                    ->select('data_detail.code_ID', 'data_detail.date_item', 'category.name_category', 'equipment.name_equipment', 'brand.name_brand', 'data_detail.department', 'data_detail.section', 'data_detail.name_informer', 'data_detail.type', 'data_detail.other', 'data_detail.tf_informer', 'data_detail.tf_department', 'data_detail.tf_section')
                    ->join('category', 'data_detail.category_ID', 'category.category_ID')
                    ->join('equipment', 'data_detail.equipment_ID', 'equipment.equipment_ID')
                    ->join('brand', 'data_detail.brand_ID', 'brand.Brand_ID')
                    ->whereBetween('data_detail.date_item', [$finddate1, $finddate2])
                    ->get();

                return view('Page.Report.Report1', compact('date', 'date1', 'date2'));

            } else {

                return redirect('Report')->with('error', 'ระบุวันที่ไม่ถูกต้อง');
            }


        } elseif ($Postincategory != null && $Postinputequipment != null) {
            $equipment = DB::table('data_detail')
                ->select('data_detail.code_ID', 'data_detail.date_item', 'category.name_category', 'equipment.name_equipment', 'brand.name_brand', 'data_detail.department', 'data_detail.section', 'data_detail.name_informer', 'data_detail.type', 'data_detail.other', 'data_detail.tf_informer', 'data_detail.tf_department', 'data_detail.tf_section')
                ->join('category', 'data_detail.category_ID', 'category.category_ID')
                ->join('equipment', 'data_detail.equipment_ID', 'equipment.equipment_ID')
                ->join('brand', 'data_detail.brand_ID', 'brand.Brand_ID')
                ->where('data_detail.category_ID', '=', $findcategory->category_ID)
                ->where('data_detail.equipment_ID', '=', $findequipment->equipment_ID)
                ->get();

            return view('Page.Report.Report1', compact('equipment', 'Postincategory', 'Postinputequipment'));

        } elseif ($Postincategory != null) {
            $category = DB::table('data_detail')
                ->select('data_detail.code_ID', 'data_detail.date_item', 'category.name_category', 'equipment.name_equipment', 'brand.name_brand', 'data_detail.department', 'data_detail.section', 'data_detail.name_informer', 'data_detail.type', 'data_detail.other', 'data_detail.tf_informer', 'data_detail.tf_department', 'data_detail.tf_section')
                ->join('category', 'data_detail.category_ID', 'category.category_ID')
                ->join('equipment', 'data_detail.equipment_ID', 'equipment.equipment_ID')
                ->join('brand', 'data_detail.brand_ID', 'brand.Brand_ID')
                ->where('data_detail.category_ID', '=', $findcategory->category_ID)
                ->get();

            return view('Page.Report.Report1', compact('category', 'Postincategory'));

        } elseif ($PostITdate1 && $PostITdate2) {
            if ($PostITdate1 <= $PostITdate2) {

                $yyyy1 = substr($PostITdate1, 0, 4) + 543;
                $month1 = substr($PostITdate1, 5, 2);
                $day1 = substr($PostITdate1, 8, 2);

                $yyyy2 = substr($PostITdate2, 0, 4) + 543;
                $month2 = substr($PostITdate2, 5, 2);
                $day2 = substr($PostITdate2, 8, 2);

                $yy1 = substr($yyyy1, 2, 2);
                $yy2 = substr($yyyy2, 2, 2);

                $date1 = $day1 . "/" . $month1 . "/" . $yyyy1;
                $date2 = $day2 . "/" . $month2 . "/" . $yyyy2;

                $finddate1 = $day1 . "-" . $month1 . "-" . $yy1;
                $finddate2 = $day2 . "-" . $month2 . "-" . $yy2;

                // dd($finddate1);

                $reportIT = DB::table('itsupport_detail')
                    ->whereBetween('IT_date', [$finddate1, $finddate2])
                    ->get();

                return view('Page.Report.Report1', compact('reportIT', 'date1', 'date2'));
            } else {
                return redirect('Report')->with('error', 'ระบุวันที่ไม่ถูกต้อง');
            }
        }

        return redirect('Report');
    }

    public function searchdatait(Request $request)
    {
        $ID = $request->input('IT_ID');

        $data_it = DB::table('itsupport_detail')
            ->where('IT_ID', $ID)->first();

        return response()->json($data_it);
    }

    public function problem()
    {
        session()->forget('user');
		session()->forget('pass');

        $data_problem = DB::table('report_problem')->where('RP_status', '!=', 2)->get();

        return view('problem', compact('data_problem'));
    }

    public function Login()
    {
        session()->forget('user');
		session()->forget('pass');

        return view('Login');
    }

    public function checklogin(Request $request)
    {
        $user = $request->input('Username');
        $pass = $request->input('Password');

        $check = DB::table('member')->where('username', $user)->first();

        session()->put('user',$user);
        session()->put('pass',$pass);

        if ($check !== null) {

            $verifypass = $check->password;

            if (password_verify($pass, $verifypass)) {
                return redirect()->route('index', compact('user'));
            } else {
                return view('login')->with(['error' => 'error']);
            }
        }else{
            return view('login')->with(['error' => 'error']);
        }
    }

    public function logout(){

        session()->flush();

        return redirect('/');
    }

    public function showedit(){
        $rowbrand = DB::table('brand')
        ->join('equipment','brand.equip_ID', '=', 'equipment.equipment_ID')
        ->get();

        $rowequip = DB::table('equipment')->get();

        $category = DB::table('category')->get();

        return view('Page.ChageEdit', compact('rowbrand', 'rowequip', 'category'));
    }

    public function searchdataedit(Request $request){
        $brandID = $request->input('Brand_ID');
        $brand = DB::table('brand')
        ->join('equipment','brand.equip_ID', '=', 'equipment.equipment_ID')
        ->where('Brand_ID', $brandID)
        ->first();

        return response()->json($brand);
    }

    public function SearchEditCategory(Request $request){
        $categoryID = $request->input('category_ID');

        $categoryDB = DB::table('category')->where('category_ID', $categoryID)->first();

        return response()->json($categoryDB);
    }

    public function SearchEquipment(Request $request){
        $equipmentID = $request->input('equipment_ID');

        $equipmentDB = DB::table('equipment')->where('equipment_ID', $equipmentID)->first();

        return response()->json($equipmentDB);
    }
}