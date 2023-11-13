<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>รายงาน</title>
    <link rel="stylesheet" href="{{ asset('/css/Report1.css') }}">

</head>

<body>
    @if(isset($Code_ID))
    <button class="btn-print" onclick="btnprint()">
        <img src="{{ asset('/icon/print.png') }}" alt="" width="20">&nbsp; Print
    </button>
    <thead>
        <h2 align="center">รายงานรหัส {{ $PostcodeID }}</h2>
    </thead>
    <table class="table-list">
        <thead>
            <tr>
                <td>วัน/เดือน/ปี</td>
                <td>รหัสสินค้า</td>
                <td>ประเภท</td>
                <td>อุปกรณ์</td>
                <td>ยี่ห้อ</td>
                <td>ผู้ใช้งาน / อาคาร / แผนก (อดีต)</td>
                <td>ผู้ใช้งาน / อาคาร / แผนก (ปัจจุบัน)</td>
                <td>หมายเหตุ</td>
            </tr>
        </thead>

        @foreach($Code_ID as $rowCode_ID)
        <tr>
            <td>{{ $rowCode_ID->date_item }}</td>
            <td>{{ $rowCode_ID->code_ID }}</td>
            <td>{{ $rowCode_ID->name_category }}</td>
            <td>{{ $rowCode_ID->name_equipment }}</td>
            <td>{{ $rowCode_ID->name_brand }}</td>
            <td>@if($rowCode_ID->tf_informer){{ $rowCode_ID->tf_informer }} / {{ $rowCode_ID->tf_department }} /
                {{ $rowCode_ID->tf_section }}@endif</td>
            <td>{{ $rowCode_ID->name_informer }} / {{ $rowCode_ID->department }} / {{ $rowCode_ID->section }}</td>
            <td>{{ $rowCode_ID->other }}</td>
        </tr>
        @endforeach
    </table>
    @elseif(isset($date))
    <button class="btn-print" onclick="btnprint()">
        <img src="{{ asset('/icon/print.png') }}" alt="" width="20">&nbsp; Print
    </button>
    <thead>
        <h2 align="center">รายงานวันที่ {{$date1}} ถึง {{$date2}} </h2>
    </thead>
    <table class="table-list">
        <thead>
            <tr>
                <td>วัน/เดือน/ปี</td>
                <td>รหัสสินค้า</td>
                <td>ประเภท</td>
                <td>อุปกรณ์</td>
                <td>ยี่ห้อ</td>
                <td>ผู้ใช้งาน / อาคาร / แผนก (อดีต)</td>
                <td>ผู้ใช้งาน / อาคาร / แผนก (ปัจจุบัน)</td>
                <td>หมายเหตุ</td>
            </tr>
        </thead>

        @foreach($date as $rowdate)
        <tr>
            <td>{{ $rowdate->date_item }}</td>
            <td>{{ $rowdate->code_ID }}</td>
            <td>{{ $rowdate->name_category }}</td>
            <td>{{ $rowdate->name_equipment }}</td>
            <td>{{ $rowdate->name_brand }}</td>
            <td>@if($rowdate->tf_informer){{ $rowdate->tf_informer }} / {{ $rowdate->tf_department }} /
                {{ $rowdate->tf_section }}@endif</td>
            <td>{{ $rowdate->name_informer }} / {{ $rowdate->department }} / {{ $rowdate->section }}</td>
            <td>{{ $rowdate->other }}</td>
        </tr>
        @endforeach
    </table>
    @elseif(isset($category))
    <button class="btn-print" onclick="btnprint()">
        <img src="{{ asset('/icon/print.png') }}" alt="" width="20">&nbsp; Print
    </button>
    <thead>
        <h2 align="center">รายงานแยกประเภท {{ $Postincategory }} </h2>
    </thead>
    <table class="table-list">
        <thead>
            <tr>
                <td>วัน/เดือน/ปี</td>
                <td>รหัสสินค้า</td>
                <td>ประเภท</td>
                <td>อุปกรณ์</td>
                <td>ยี่ห้อ</td>
                <td>ผู้ใช้งาน / อาคาร / แผนก (อดีต)</td>
                <td>ผู้ใช้งาน / อาคาร / แผนก (ปัจจุบัน)</td>
                <td>หมายเหตุ</td>
            </tr>
        </thead>

        @foreach($category as $rowcategory)
        <tr>
            <td>{{ $rowcategory->date_item }}</td>
            <td>{{ $rowcategory->code_ID }}</td>
            <td>{{ $rowcategory->name_category }}</td>
            <td>{{ $rowcategory->name_equipment }}</td>
            <td>{{ $rowcategory->name_brand }}</td>
            <td>@if($rowcategory->tf_informer){{ $rowcategory->tf_informer }} / {{ $rowcategory->tf_department }} /
                {{ $rowcategory->tf_section }}@endif</td>
            <td>{{ $rowcategory->name_informer }} / {{ $rowcategory->department }} / {{ $rowcategory->section }}</td>
            <td>{{ $rowcategory->other }}</td>
        </tr>
        @endforeach
    </table>
    @elseif(isset($equipment))
    <button class="btn-print" onclick="btnprint()">
        <img src="{{ asset('/icon/print.png') }}" alt="" width="20">&nbsp; Print
    </button>
    <thead>
        <h2 align="center">รายงานแยกประเภท {{ $Postincategory }} และ อุปกรณ์ {{ $Postinputequipment }}</h2>
    </thead>
    <table class="table-list">
        <thead>
            <tr>
                <td>วัน/เดือน/ปี</td>
                <td>รหัสสินค้า</td>
                <td>ประเภท</td>
                <td>อุปกรณ์</td>
                <td>ยี่ห้อ</td>
                <td>ผู้ใช้งาน / อาคาร / แผนก (อดีต)</td>
                <td>ผู้ใช้งาน / อาคาร / แผนก (ปัจจุบัน)</td>
                <td>หมายเหตุ</td>
            </tr>
        </thead>

        @foreach($equipment as $rowequipment)
        <tr>
            <td>{{ $rowequipment->date_item }}</td>
            <td>{{ $rowequipment->code_ID }}</td>
            <td>{{ $rowequipment->name_equipment }}</td>
            <td>{{ $rowequipment->name_equipment }}</td>
            <td>{{ $rowequipment->name_brand }}</td>
            <td>@if($rowequipment->tf_informer){{ $rowequipment->tf_informer }} / {{ $rowequipment->tf_department }} /
                {{ $rowequipment->tf_section }}@endif</td>
            <td>{{ $rowequipment->name_informer }} / {{ $rowequipment->department }} / {{ $rowequipment->section }}</td>
            <td>{{ $rowequipment->other }}</td>
        </tr>
        @endforeach
    </table>
    @elseif(isset($reportIT))
    <button class="btn-print" onclick="btnprint()">
        <img src="{{ asset('/icon/print.png') }}" alt="" width="20">&nbsp; Print
    </button>
    <thead>
        <h2 align="center">รายงาน CaseITSupport วันที่ {{ $date1 }} ถึง วันที่ {{ $date2 }} </h2>
    </thead>
    <table class="table-list">
        <thead>
            <tr>
                <td>วัน/เดือน/ปี</td>
                <td>ชื่อผู้แจ้ง</td>
                <td>หน่วยงาน / ส่วนงาน</td>
                <td>รายละเอียด</td>
                <td>สาเหตุ</td>
                <td>วิธีแก้ไข</td>
                <td>ผู้แก้ไข</td>
                <td>Service</td>
            </tr>
        </thead>

        @foreach($reportIT as $rowreportIT)
        <tr>
            <td>{{ $rowreportIT->IT_date }}</td>
            <td>{{ $rowreportIT->member_name }}</td>
            <td>{{ $rowreportIT->name_agency }} / {{ $rowreportIT->name_division }}</td>
            <td>{{ $rowreportIT->IT_detail }}</td>
            <td>{{ $rowreportIT->IT_other }}</td>
            <td>{{ $rowreportIT->IT_change }}</td>
            <td>{{ $rowreportIT->IT_namechange }}</td>
            <td>{{ $rowreportIT->IT_service }}</td>
        </tr>
        @endforeach
    </table>
    @endif
</body>

</html>
<script>
function btnprint() {
    window.print();
}
</script>