<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>CaseIT</title>
    <link rel="stylesheet" href="{{ asset('/css/index.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/datalist.css') }}">
    <script src="{{ asset('/js/jquery-3.6.0.min.js') }}"></script>
</head>

<body class="container">
    <div class="row">
        <div class="col">
            <div class="header">
                <div>
                    <div class="text-header">
                        <a href="">ADMIN</a>
                    </div>
                </div>
                <hr>
                <div>
                    <ul>
                        <a href="{{ Route('index') }}">
                            <li>Dashboard</li>
                        </a>
                        <a href="{{ Route('computer') }}">
                            <li>ทรัพย์สิน HW/SW</li>
                        </a>
                        <a href="{{ Route('itsupport') }}">
                            <li>ITSupport</li>
                        </a>
                        <a href="{{ Route('datalist') }}">
                            <li class="active">รายการทั้งหมด</li>
                        </a>
                        <a href="{{ Route('showedit') }}">
                            <li>แก้ไขข้อมูล</li>
                        </a>
                        <a href="{{ Route('report') }}">
                            <li>Report</li>
                        </a>
                        <a href="{{ Route('logout') }}">
                            <li>ออกจากระบบ</li>
                        </a>
                    </ul>
                </div>
            </div>
            <div class="navbar showdata">
                <div class="main-nav">
                    <button onclick="pq()" id="btnpq" class="activemenu">PQ</button>
                    <button onclick="HW()" id="btnhw" class="activemenu">HW</button>
                    <button onclick="SW()" id="btnsw" class="activemenu">SW</button>
                    <button onclick="ITSupport()" id="btnit" class="activemenu">ITSupport</button>
                </div>
                <div class="tablepq" id="tablepq">
                    <div class="headertitle">
                        <h2>รายการ PQ</h2>
                    </div>
                    <div class="searchtext">
                        <label for="">Search :</label>
                        <input type="text" name="" id="searchPQ">
                    </div>
                    <table class="table-pq">
                        <tr>
                            <td>ว/ด/ป</td>
                            <td>รหัสสินค้า</td>
                            <td>ประเภทสินค้า</td>
                            <td>อุปกรณ์</td>
                            <td>ยี่ห้อ</td>
                            <td>ของใช้/สั่งซื้อ</td>
                            <td>ผู้ใช้ / อาคาร / แผนก (อดีต)</td>
                            <td>ผู้ใช้ / อาคาร / แผนก (ปัจจุบัน)</td>
                        </tr>
                        <tbody id="dataPQ">
                            @foreach($datadetail as $rowpq)
                            @if(strpos($rowpq->code_ID, 'PQ') !== false)
                            <tr>
                                <td>{{ $rowpq->date_item }}</td>
                                <td>{{ $rowpq->code_ID }}</td>
                                <td>{{ $rowpq->name_category }}</td>
                                <td>{{ $rowpq->name_equipment }}</td>
                                <td>{{ $rowpq->name_brand }}</td>
                                <td>{{ $rowpq->type }}</td>
                                <td>@if($rowpq->tf_informer){{ $rowpq->tf_informer }} / {{ $rowpq->tf_department }}
                                    /
                                    {{ $rowpq->tf_section }}@endif</td>
                                <td>{{ $rowpq->name_informer }} / {{ $rowpq->department }} / {{ $rowpq->section }}
                                </td>
                            </tr>
                            @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="tablehw" id="tablehw">
                    <div class="headertitle">
                        <h2>รายการ HW</h2>
                    </div>
                    <div class="searchtext">
                        <label for="">Search :</label>
                        <input type="text" name="" id="searchHW">
                    </div>
                    <table class="table-hw">
                        <tr>
                            <td>ว/ด/ป</td>
                            <td>รหัสสินค้า</td>
                            <td>ประเภทสินค้า</td>
                            <td>อุปกรณ์</td>
                            <td>ยี่ห้อ</td>
                            <td>ของใช้/สั่งซื้อ</td>
                            <td>ผู้ใช้/อาคาร/แผนก (อดีต)</td>
                            <td>ผู้ใช้/อาคาร/แผนก (ปัจจุบัน)</td>
                        </tr>
                        <tbody id="dataHW">
                            @foreach($datadetail as $rowpq)
                            @if(strpos($rowpq->code_ID, 'HW') !== false)
                            <tr>
                                <td>{{ $rowpq->date_item }}</td>
                                <td>{{ $rowpq->code_ID }}</td>
                                <td>{{ $rowpq->name_category }}</td>
                                <td>{{ $rowpq->name_equipment }}</td>
                                <td>{{ $rowpq->name_brand }}</td>
                                <td>{{ $rowpq->type }}</td>
                                <td>@if($rowpq->tf_informer){{ $rowpq->tf_informer }} / {{ $rowpq->tf_department }} /
                                    {{ $rowpq->tf_section }}@endif</td>
                                <td>{{ $rowpq->name_informer }} / {{ $rowpq->department }} / {{ $rowpq->section }}</td>
                            </tr>
                            @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="tablesw" id="tablesw">
                    <table class="table-sw">
                        <div class="headertitle">
                            <h2>รายการ SW</h2>
                        </div>
                        <div class="searchtext">
                            <label for="">Search :</label>
                            <input type="text" name="" id="searchSW">
                        </div>
                        <tr>
                            <td>ว/ด/ป</td>
                            <td>รหัสสินค้า</td>
                            <td>ประเภทสินค้า</td>
                            <td>อุปกรณ์</td>
                            <td>ยี่ห้อ</td>
                            <td>ของใช้/สั่งซื้อ</td>
                            <td>ผู้ใช้/อาคาร/แผนก (อดีต)</td>
                            <td>ผู้ใช้/อาคาร/แผนก (ปัจจุบัน)</td>
                        </tr>
                        <tbody id="dataSW">
                            @foreach($datadetail as $rowpq)
                            @if(strpos($rowpq->code_ID, 'SW') !== false)
                            <tr>
                                <td>{{ $rowpq->date_item }}</td>
                                <td>{{ $rowpq->code_ID }}</td>
                                <td>{{ $rowpq->name_category }}</td>
                                <td>{{ $rowpq->name_equipment }}</td>
                                <td>{{ $rowpq->name_brand }}</td>
                                <td>{{ $rowpq->type }}</td>
                                <td>@if($rowpq->tf_informer){{ $rowpq->tf_informer }} / {{ $rowpq->tf_department }} /
                                    {{ $rowpq->tf_section }}@endif</td>
                                <td>{{ $rowpq->name_informer }} / {{ $rowpq->department }} / {{ $rowpq->section }}</td>
                            </tr>
                            @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="tablesupport" id="tablesupport">
                    <table class="table-tablesupport">
                        <div class="headertitle">
                            <h2>Case ITsupport</h2>
                        </div>
                        <div class="searchtext">
                            <label for="">Search :</label>
                            <input type="text" name="" id="searchIT">
                        </div>
                        <tr>
                            <td>ว/ด/ป</td>
                            <td>ชื่อ-สกุล</td>
                            <td>หน่วยงาน</td>
                            <td>ส่วนงาน</td>
                            <td>รายละเอียด</td>
                            <td>สาเหตุ</td>
                            <td>วิธีแก้ไข</td>
                            <td>ผู้แก้ไข</td>
                        </tr>
                        <tbody id="dataIT">
                            @foreach($castIT as $rowcaseit)
                            <tr>
                                <td>{{ $rowcaseit->IT_date }}</td>
                                <td>{{ $rowcaseit->member_name }}</td>
                                <td>{{ $rowcaseit->name_agency }}</td>
                                <td>{{ $rowcaseit->name_division }}</td>
                                <td>{{ $rowcaseit->IT_detail }}</td>
                                <td>{{ $rowcaseit->IT_other }}</td>
                                <td>{{ $rowcaseit->IT_change }}</td>
                                <td>{{ $rowcaseit->IT_namechange }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

<script>
function pq() {
    var tablelistpq = document.getElementById('tablepq');
    var tablelisthw = document.getElementById('tablehw');
    var tablelistsw = document.getElementById('tablesw');
    var tablelistITSupport = document.getElementById('tablesupport');

    var btnpq = document.getElementById('btnpq');
    var btnhw = document.getElementById('btnhw');
    var btnsw = document.getElementById('btnsw');
    var btnit = document.getElementById('btnit');

    btnpq.style.backgroundColor = "rgb(221, 66, 66)"
    btnhw.style.backgroundColor = "rgb(94, 94, 94)"
    btnsw.style.backgroundColor = "rgb(94, 94, 94)"
    btnit.style.backgroundColor = "rgb(94, 94, 94)"

    tablelistpq.style.display = "block"
    tablelisthw.style.display = "none"
    tablelistsw.style.display = "none"
    tablelistITSupport.style.display = "none"

}

function HW() {

    var tablelistpq = document.getElementById('tablepq');
    var tablelisthw = document.getElementById('tablehw');
    var tablelistsw = document.getElementById('tablesw');
    var tablelistITSupport = document.getElementById('tablesupport');

    var btnpq = document.getElementById('btnpq');
    var btnhw = document.getElementById('btnhw');
    var btnsw = document.getElementById('btnsw');
    var btnit = document.getElementById('btnit');

    btnpq.style.backgroundColor = "rgb(94, 94, 94)"
    btnhw.style.backgroundColor = "rgb(221, 66, 66)"
    btnsw.style.backgroundColor = "rgb(94, 94, 94)"
    btnit.style.backgroundColor = "rgb(94, 94, 94)"


    tablelistpq.style.display = "none"
    tablelisthw.style.display = "block"
    tablelistsw.style.display = "none"
    tablelistITSupport.style.display = "none"

}

function SW() {

    var tablelistpq = document.getElementById('tablepq');
    var tablelisthw = document.getElementById('tablehw');
    var tablelistsw = document.getElementById('tablesw');
    var tablelistITSupport = document.getElementById('tablesupport');

    var btnpq = document.getElementById('btnpq');
    var btnhw = document.getElementById('btnhw');
    var btnsw = document.getElementById('btnsw');
    var btnit = document.getElementById('btnit');

    btnpq.style.backgroundColor = "rgb(94, 94, 94)"
    btnhw.style.backgroundColor = "rgb(94, 94, 94)"
    btnsw.style.backgroundColor = "rgb(221, 66, 66)"
    btnit.style.backgroundColor = "rgb(94, 94, 94)"


    tablelistpq.style.display = "none"
    tablelisthw.style.display = "none"
    tablelistsw.style.display = "block"
    tablelistITSupport.style.display = "none"


}

function ITSupport() {

    var tablelistpq = document.getElementById('tablepq');
    var tablelisthw = document.getElementById('tablehw');
    var tablelistsw = document.getElementById('tablesw');
    var tablelistITSupport = document.getElementById('tablesupport');

    var btnpq = document.getElementById('btnpq');
    var btnhw = document.getElementById('btnhw');
    var btnsw = document.getElementById('btnsw');
    var btnit = document.getElementById('btnit');

    btnpq.style.backgroundColor = "rgb(94, 94, 94)"
    btnhw.style.backgroundColor = "rgb(94, 94, 94)"
    btnsw.style.backgroundColor = "rgb(94, 94, 94)"
    btnit.style.backgroundColor = "rgb(221, 66, 66)"

    tablelistpq.style.display = "none"
    tablelisthw.style.display = "none"
    tablelistsw.style.display = "none"
    tablelistITSupport.style.display = "block"

}

$.ajax({
    type: "GET",
    url: "{{ Route('listPQ') }}",
    success: function(response) {
        var searchPQ = document.getElementById('searchPQ');
        var dataPQ = document.getElementById('dataPQ');

        searchPQ.addEventListener('keyup', function() {
            var PQ = response.filter(function(pqdatalist) {
                return pqdatalist.code_ID.includes("PQ")
            });
            var valuePQ = searchPQ.value;
            var cutspacePQ = valuePQ.trim();
            var filterPQ = PQ.filter(function(e) {
                return (e.code_ID.includes(cutspacePQ) ||
                    e.name_category.includes(cutspacePQ) ||
                    e.name_equipment.includes(cutspacePQ) ||
                    e.department.includes(cutspacePQ) ||
                    e.section.includes(cutspacePQ) ||
                    e.name_informer.includes(cutspacePQ) ||
                    e.name_brand.includes(cutspacePQ) ||
                    e.type.includes(cutspacePQ)
                );
            });

            dataPQ.innerHTML = '';
            
            filterPQ.forEach(function(item) {
                var row = document.createElement('tr');

                var dateitem = document.createElement('td');
                dateitem.textContent = item.date_item;
                row.appendChild(dateitem);

                var codeID = document.createElement('td');
                codeID.textContent = item.code_ID;
                row.appendChild(codeID);

                var namecategory = document.createElement('td');
                namecategory.textContent = item.name_category;
                row.appendChild(namecategory);

                var nameequipment = document.createElement('td');
                nameequipment.textContent = item.name_equipment;
                row.appendChild(nameequipment);

                var namebrand = document.createElement('td');
                namebrand.textContent = item.name_brand;
                row.appendChild(namebrand);

                var type = document.createElement('td');
                type.textContent = item.type;
                row.appendChild(type);

                var tfinformer = document.createElement('td');
                if (item.tf_informer) {
                    tfinformer.textContent = item.tf_informer; + " / " + item
                        .tf_department + " / " + item.tf_section;
                }
                row.appendChild(tfinformer);

                var department = document.createElement('td');
                department.textContent = item.name_informer + " / " + item.department +
                    " / " + item.section;
                row.appendChild(department);

                dataPQ.appendChild(row);
            });
        });
    },
    error: function(error) {
        console.error(error);
    }
});

$.ajax({
    type: "GET",
    url: "{{ Route('listPQ') }}",
    success: function(response) {
        var searchHW = document.getElementById('searchHW');
        var dataHW = document.getElementById('dataHW');

        searchHW.addEventListener('keyup', function() {
            var HW = response.filter(function(HWdatalist) {
                return HWdatalist.code_ID.includes("HW")
            });
            var valueHW = searchHW.value;
            var cutspaceHW = valueHW.trim();
            var filterHW = HW.filter(function(e) {
                return (e.code_ID.includes(cutspaceHW) ||
                    e.name_category.includes(cutspaceHW) ||
                    e.name_equipment.includes(cutspaceHW) ||
                    e.department.includes(cutspaceHW) ||
                    e.section.includes(cutspaceHW) ||
                    e.name_informer.includes(cutspaceHW) ||
                    e.name_brand.includes(cutspaceHW) ||
                    e.type.includes(cutspaceHW)
                );
            });

            dataHW.innerHTML = '';

            filterHW.forEach(function(item) {
                var row = document.createElement('tr');

                var dateitem = document.createElement('td');
                dateitem.textContent = item.date_item;
                row.appendChild(dateitem);

                var codeID = document.createElement('td');
                codeID.textContent = item.code_ID;
                row.appendChild(codeID);

                var namecategory = document.createElement('td');
                namecategory.textContent = item.name_category;
                row.appendChild(namecategory);

                var nameequipment = document.createElement('td');
                nameequipment.textContent = item.name_equipment;
                row.appendChild(nameequipment);

                var namebrand = document.createElement('td');
                namebrand.textContent = item.name_brand;
                row.appendChild(namebrand);

                var type = document.createElement('td');
                type.textContent = item.type;
                row.appendChild(type);

                var tfinformer = document.createElement('td');
                if (item.tf_informer) {
                    tfinformer.textContent = item.tf_informer; + " / " + item
                        .tf_department + " / " + item.tf_section;
                }
                row.appendChild(tfinformer);

                var department = document.createElement('td');
                department.textContent = item.name_informer + " / " + item.department +
                    " / " + item.section;
                row.appendChild(department);

                dataHW.appendChild(row);
            });
        });
    },
    error: function(error) {
        console.error(error);
    }
});
$.ajax({
    type: "GET",
    url: "{{ Route('listPQ') }}",
    success: function(response) {
        var searchSW = document.getElementById('searchSW');
        var dataSW = document.getElementById('dataSW');

        searchSW.addEventListener('keyup', function() {
            var SW = response.filter(function(SWdatalist) {
                return SWdatalist.code_ID.includes("SW")
            });
            var valueSW = searchSW.value;
            var cutspaceSW = valueHW.trim();
            var filterSW = SW.filter(function(e) {
                return (e.code_ID.includes(cutspaceSW) ||
                    e.name_category.includes(cutspaceSW) ||
                    e.name_equipment.includes(cutspaceSW) ||
                    e.department.includes(cutspaceSW) ||
                    e.section.includes(cutspaceSW) ||
                    e.name_informer.includes(cutspaceSW) ||
                    e.name_brand.includes(cutspaceSW) ||
                    e.type.includes(cutspaceSW)
                );
            });

            dataSW.innerHTML = '';

            filterSW.forEach(function(item) {
                var row = document.createElement('tr');

                var dateitem = document.createElement('td');
                dateitem.textContent = item.date_item;
                row.appendChild(dateitem);

                var codeID = document.createElement('td');
                codeID.textContent = item.code_ID;
                row.appendChild(codeID);

                var namecategory = document.createElement('td');
                namecategory.textContent = item.name_category;
                row.appendChild(namecategory);

                var nameequipment = document.createElement('td');
                nameequipment.textContent = item.name_equipment;
                row.appendChild(nameequipment);

                var namebrand = document.createElement('td');
                namebrand.textContent = item.name_brand;
                row.appendChild(namebrand);

                var type = document.createElement('td');
                type.textContent = item.type;
                row.appendChild(type);

                var tfinformer = document.createElement('td');
                if (item.tf_informer) {
                    tfinformer.textContent = item.tf_informer; + " / " + item
                        .tf_department + " / " + item.tf_section;
                }
                row.appendChild(tfinformer);

                var department = document.createElement('td');
                department.textContent = item.name_informer + " / " + item.department +
                    " / " + item.section;
                row.appendChild(department);

                dataSW.appendChild(row);
            });
        });
    },
    error: function(error) {
        console.error(error);
    }
});
$.ajax({
    type: "GET",
    url: "{{ Route('caseitsupport') }}",
    success: function(response) {
        var searchIT = document.getElementById('searchIT');
        var dataIT = document.getElementById('dataIT');

        searchIT.addEventListener('keyup', function() {
            var valueIT = searchIT.value;
            var cutspaceIT = valueIT.trim();
            var filterIT = response.filter(function(e) {
                return (e.member_agency.includes(cutspaceIT) ||
                    e.IT_date.includes(cutspaceIT) ||
                    e.member_division.includes(cutspaceIT) ||
                    e.member_name.includes(cutspaceIT) ||
                    e.IT_detail.includes(cutspaceIT) ||
                    (e.IT_other != null && e.IT_other.includes(cutspaceIT)) ||
                    e.IT_change.includes(cutspaceIT) ||
                    e.IT_namechange.includes(cutspaceIT)
                );
            });
            dataIT.innerHTML = '';

            filterIT.forEach(function(item) {
                var row = document.createElement('tr');

                var date = document.createElement('td');
                date.textContent = item.IT_date;
                row.appendChild(date);

                var member = document.createElement('td');
                member.textContent = item.member_name;
                row.appendChild(member);

                var agency = document.createElement('td');
                agency.textContent = item.member_agency;
                row.appendChild(agency);

                var division = document.createElement('td');
                division.textContent = item.member_division;
                row.appendChild(division);

                var detail = document.createElement('td');
                detail.textContent = item.IT_detail;
                row.appendChild(detail);

                var other = document.createElement('td');
                if (other) {
                    other.textContent = item.IT_other;
                }
                row.appendChild(other);

                var change = document.createElement('td');
                change.textContent = item.IT_change;
                row.appendChild(change);

                var namechange = document.createElement('td');
                namechange.textContent = item.IT_namechange;
                row.appendChild(namechange);

                dataIT.appendChild(row);
            });
        });
    },
    error: function(error) {
        console.error(error);
    }
})
</script>