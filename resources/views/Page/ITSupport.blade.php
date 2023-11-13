<?php 
$yearbefore2 = date('Y')+541;
$yearbefore1 = date('Y')+542;
$yearafter = date('Y')+543;
$yearafter1 = date('Y')+544;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>CaseIT</title>
    <link rel="stylesheet" href="{{ asset('/css/index.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/itsupport.css')}}">
    <script src="{{ asset('/js/jquery-3.6.0.min.js')
    }}"></script>
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
                            <li class="active">ITSupport</li>
                        </a>
                        <a href="{{ Route('datalist') }}">
                            <li>รายการทั้งหมด</li>
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
            <div class="showdata">
                <div class="main">
                    <div class="main-header">
                        <h2>CaseITSupport</h2>
                    </div>
                    <div class="col-main">
                        <div class="input-date">
                            <div>
                                <label for="">วัน/เดือน/ปี</label>
                            </div>
                            <div>
                                <input type="text" name="" id="date1" autocomplete="off" onkeydown="nextdate1(event)">
                                <div class="day" id="numberday">
                                    <ul class="numday" id="ul">
                                        @for($i=1; $i<=31; $i++) <li onclick="day({{ $i }})">{{ $i }}</li>
                                            @endfor
                                    </ul>
                                </div>
                                <label for="">-</label>
                                <input type="text" name="" id="date2" autocomplete="off" onkeydown="nextdate2(event)">
                                <div class="month" id="numbermonth">
                                    <ul class="nummonth" id="ul">
                                        <li class="months" data-month="1">มกราคม</li>
                                        <li class="months" data-month="2">กุมภาพันธ์</li>
                                        <li class="months" data-month="3">มีนาคม</li>
                                        <li class="months" data-month="4">เมษายน</li>
                                        <li class="months" data-month="5">พฤษภาคม</li>
                                        <li class="months" data-month="6">มิถุนายน</li>
                                        <li class="months" data-month="7">กรกฏาคม</li>
                                        <li class="months" data-month="8">สิงหาคม</li>
                                        <li class="months" data-month="9">กันยายน</li>
                                        <li class="months" data-month="10">ตุลาคม</li>
                                        <li class="months" data-month="11">พฤษจิกายน</li>
                                        <li class="months" data-month="12">ธันวาคม</li>
                                    </ul>
                                </div>
                                <label for="">-</label>
                                <input type="text" name="" id="date3" autocomplete="off" onkeydown="nextdate3(event)">
                                <div class="year" id="numberyear">
                                    <ul class="numyear" id="ul">
                                        <li class="useyear" data-month="{{ $yearbefore2 }}">{{ $yearbefore2 }}</li>
                                        <li class="useyear" data-month="{{ $yearbefore1 }}">{{ $yearbefore1 }}</li>
                                        <li class="useyear" data-month="{{ $yearafter }}">{{ $yearafter }}</li>
                                        <li class="useyear" data-month="{{ $yearafter1 }}">{{ $yearafter1 }}</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="input-card">
                            <div>
                                <label for="">ชื่อผู้แจ้ง</label>
                            </div>
                            <div>
                                <input type="text" name="" id="name" onkeydown="nextinput2(event)">
                            </div>
                        </div>
                        <div class="input-card">
                            <div>
                                <label for="">หน่วยงาน</label>
                            </div>
                            <div>
                                <input type="text" name="" id="agency" onkeydown="nextinput3(event)">
                            </div>
                        </div>
                        <div class="input-card">
                            <div>
                                <label for="">ส่วนงาน</label>
                            </div>
                            <div>
                                <input type="text" name="" id="division" onkeydown="nextinput4(event)">
                            </div>
                        </div>
                        <div class="input-card">
                            <div>
                                <label for="">รายละเอียด</label>
                            </div>
                            <div>
                                <input type="text" name="" id="detail" onkeydown="nextinput5(event)">
                            </div>
                        </div>
                        <div class="input-card">
                            <div>
                                <label for="">สาเหตุ</label>
                            </div>
                            <div>
                                <input type="text" name="" id="other" onkeydown="nextinput6(event)">
                            </div>
                        </div>
                        <div class="input-card">
                            <div>
                                <label for="">วิธีแก้ไข</label>
                            </div>
                            <div>
                                <input type="text" name="" id="change" onkeydown="nextinput7(event)">
                            </div>
                        </div>
                        <div class="input-card">
                            <div>
                                <label for="">ผู้แก้ไข</label>
                            </div>
                            <div>
                                <input type="text" name="" id="namechange">
                            </div>
                        </div>
                        <div class="input-card">
                            <div>
                                <label for="">ช่องทางแจ้ง</label>
                            </div>
                            <div class="selectservice">
                                <select name="service" id="service">
                                    <option value="" selected disabled></option>
                                    <option value="แจ้งทาง Line">แจ้งทาง Line</option>
                                    <option value="แจ้งทาง หน้างาน">แจ้งทาง TL.</option>
                                    <option value="แจ้งทาง Online">แจ้งผ่านหน้าเว็บไซต์</option>
                                    <option value="แจ้งส่วนงาน IT">แจ้งส่วนงาน IT</option>
                                </select>
                            </div>
                        </div>
                        <div></div>
                        <div></div>
                        <div class="btn-card">
                            <div>
                                <input type="hidden" id="IT_ID">
                                <button class="btn-success" onclick="addrecord()">บันทึก</button>
                                <button class="btn-edit" onclick="editrecord()">แก้ไข</button>
                            </div>
                        </div>
                    </div>

                    <div class="table">
                        <table class="table-list">
                            <tr>
                                <td align="center">วัน/เดือน/ปี</td>
                                <td align="center">ชื่อผู้แจ้ง</td>
                                <td align="center">หนวยงาน/ส่วนงาน</td>
                                <td align="center">รายละเอียด</td>
                                <td align="center">สาเหตุ</td>
                                <td align="center">วิธีแก้ไข</td>
                                <td align="center">ผู้แก้ไข</td>
                                <td align="center">Service</td>
                            </tr>
                            @foreach($datait as $rowit)
                            <tr>
                                <td align="center">{{ $rowit->IT_date }}</td>
                                <td align="center">{{ $rowit->member_name }}</td>
                                <td align="center">{{ $rowit->name_agency }} / {{ $rowit->name_division }}</td>
                                <td align="center">{{ $rowit->IT_detail }}</td>
                                <td align="center">{{ $rowit->IT_other }}</td>
                                <td align="center">{{ $rowit->IT_change }}</td>
                                <td align="center">{{ $rowit->IT_namechange }}</td>
                                <td align="center">{{ $rowit->IT_service }}</td>
                                <td align="center"><img src="{{ asset('/icon/pen1.png') }}" alt="" width="30"
                                        class="img-pen" onclick="ITEdit({{ $rowit->IT_ID }})"></td>
                                <td align="center"><img width="30" src="{{ asset('/icon/trash-can.png') }}" alt=""
                                        class="btn-delete"
                                        onclick="del('{{ $rowit->IT_date }}','{{ $rowit->IT_detail }}','{{ $rowit->IT_other }}','{{ $rowit->IT_change }}','{{ $rowit->IT_namechange }}')">
                                </td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
<script>
function nextdate1(event) {
    if (event.key === "Enter") {
        document.getElementById('date2').focus();
    }
}

function nextdate2(event) {
    if (event.key === "Enter") {
        document.getElementById('date3').focus();
    }
}

function nextdate3(event) {
    if (event.key === "Enter") {
        document.getElementById('name').focus();
    }
}

function nextinput2(event) {
    if (event.key === "Enter") {
        var name = document.getElementById('name').value;
        $.ajax({
            type: "POST",
            url: "{{ Route('membercode') }}",
            data: {
                name: name
            },
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                if (JSON.stringify(response) === '{}') {
                    alert('ยังไม่มีข้อมูลผู้แจ้ง')
                    document.getElementById('agency').focus();
                } else {
                    alert('ค้นหาข้อมูลผู้แจ้งสำเร็จ')
                    $('#agency').val(response.member_agency)
                    $('#division').val(response.member_division)
                    document.getElementById('detail').focus();
                }
            },
            error: function(error) {
                console.error(error);
            }
        });
    }
}

function nextinput3(event) {
    if (event.key === "Enter") {
        document.getElementById('division').focus();
    }
}

function nextinput4(event) {
    if (event.key === "Enter") {
        document.getElementById('detail').focus();
    }
}

function nextinput5(event) {
    if (event.key === "Enter") {
        document.getElementById('other').focus();
    }
}

function nextinput6(event) {
    if (event.key === "Enter") {
        document.getElementById('change').focus();
    }
}

function nextinput7(event) {
    if (event.key === "Enter") {
        document.getElementById('namechange').focus();
    }
}

function addrecord() {
    var adddate1 = document.getElementById('date1').value;
    var adddate2 = document.getElementById('date2').value;
    var adddate3 = document.getElementById('date3').value;
    var addname = document.getElementById('name').value;
    var addagency = document.getElementById('agency').value;
    var adddivision = document.getElementById('division').value;
    var adddetail = document.getElementById('detail').value;
    var addother = document.getElementById('other').value;
    var addchange = document.getElementById('change').value;
    var addnamechange = document.getElementById('namechange').value;
    var addservice = document.getElementById('service').value

    $.ajax({
        type: "POST",
        url: "{{ Route('recordCaseIT') }}",
        data: {
            adddate1: adddate1,
            adddate2: adddate2,
            adddate3: adddate3,
            addname: addname,
            addagency: addagency,
            adddivision: adddivision,
            adddetail: adddetail,
            addother: addother,
            addchange: addchange,
            addnamechange: addnamechange,
            addservice: addservice
        },
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')
        },
        success: function(response) {
            alert(response);
            window.location.reload();
        },
        error: function(error) {
            console.error(error);
        }
    });

}

function del(IT_date, IT_detail, IT_other, IT_change, IT_namechange) {
    if (confirm('ต้องการลบข้อมูล ?') == true) {
        $.ajax({
            type: "POST",
            url: "{{ Route('deletelistIT') }}",
            data: {
                IT_date: IT_date,
                IT_detail: IT_detail,
                IT_other: IT_other,
                IT_change: IT_change,
                IT_namechange: IT_namechange
            },
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                alert(response);
                window.location.reload();
            },
            error: function(error) {
                console.log(error);
            }
        });
    }
}

var date1 = document.getElementById('date1');
var numberday = document.getElementById('numberday');

date1.addEventListener('click', function() {
    numberday.style.display = "block";
})

document.addEventListener('click', function(e) {
    if (!date1.contains(e.target)) {
        numberday.style.display = "none";
    }
});

function day(i) {
    var numday = 0;
    if (i < 10) {
        numday = '0' + i;
    } else {
        numday = i;
    }
    $('#date1').val(numday);
}

var date2 = document.getElementById('date2');
var numbermonth = document.getElementById('numbermonth');
var months = document.querySelectorAll('.months');
var nummonth = 0;

months.forEach(function(monthElement) {
    monthElement.addEventListener('click', function() {
        var selectedMonth = monthElement.getAttribute('data-month');

        if (selectedMonth < 10) {
            nummonth = '0' + selectedMonth
        } else {
            nummonth = selectedMonth
        }
        $('#date2').val(nummonth);
    });
});

date2.addEventListener('click', function() {
    numbermonth.style.display = "block";
})

document.addEventListener('click', function(e) {
    if (!date2.contains(e.target)) {
        numbermonth.style.display = "none";
    }
});


var date3 = document.getElementById('date3');
var numberyear = document.getElementById('numberyear');
var year = document.querySelectorAll('.useyear');

date3.addEventListener('click', function() {
    numberyear.style.display = "block";
})

document.addEventListener('click', function(e) {
    if (!date3.contains(e.target)) {
        numberyear.style.display = "none";
    }
});
year.forEach(element => {
    element.addEventListener('click', function() {
        var selectedyear = element.getAttribute('data-month');
        var cutyear = selectedyear.slice(2, 4);
        console.log(cutyear);
        $('#date3').val(cutyear);
    })
});

function ITEdit(IT_ID) {

    var btnedit = document.querySelector('.btn-edit');
    btnedit.style.display = "inline"

    $.ajax({
        type: "POST",
        url: "{{ Route('searchdatait') }}",
        data: {
            IT_ID: IT_ID
        },
        headers: {
            "X-CSRF-TOKEN": $("meta[name=csrf-token]").attr('content')
        },
        success: function(response) {
            var date = response.IT_date;
            var day = date.slice(0, 2);
            var month = date.slice(3, 5);
            var year = date.slice(6, 8)
            $('#IT_ID').val(response.IT_ID);
            $('#date1').val(day);
            $('#date2').val(month);
            $('#date3').val(year);
            $('#name').val(response.member_name);
            $('#agency').val(response.name_agency);
            $('#division').val(response.name_division);
            $('#detail').val(response.IT_detail);
            $('#other').val(response.IT_other);
            $('#change').val(response.IT_change);
            $('#namechange').val(response.IT_namechange);
            $('#service').val(response.IT_service);
        },
        error: function(error) {
            console.error(error);
        }
    })
}

function editrecord() {
    var ITID = document.getElementById('IT_ID').value;
    var editdate1 = document.getElementById('date1').value;
    var editdate2 = document.getElementById('date2').value;
    var editdate3 = document.getElementById('date3').value;
    var editname = document.getElementById('name').value;
    var editagency = document.getElementById('agency').value;
    var editdivision = document.getElementById('division').value;
    var editdetail = document.getElementById('detail').value;
    var editother = document.getElementById('other').value;
    var editchange = document.getElementById('change').value;
    var editnamechange = document.getElementById('namechange').value;
    var editservice = document.getElementById('service').value

    $.ajax({
        type: "POST",
        url: "{{ Route('editrecordIT') }}",
        data: {
            ITID: ITID,
            editdate1: editdate1,
            editdate2: editdate2,
            editdate3: editdate3,
            editname: editname,
            editagency: editagency,
            editdivision: editdivision,
            editdetail: editdetail,
            editother: editother,
            editchange: editchange,
            editnamechange: editnamechange,
            editservice: editservice
        },
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')
        },
        success: function(response) {
            alert(response);
            window.location.reload();
        },
        error: function(error) {
            console.error(error);
        }
    });
}

var date = @json(session('date'));
var nameRP = @json(session('nameRP'));
var departmentRP = @json(session('departmentRP'));
var sectionRP = @json(session('sectionRP'));
var telRP = @json(session('telRP'));
var otherRP = @json(session('otherRP'));
var memberRP = @json(session('memberRP'));
var d = date.slice(8, 10);
var m = date.slice(5, 7)
var y = date.slice(2, 4);

$('#date1').val(d);
$('#date2').val(m);
$('#date3').val(y);
$('#name').val(nameRP);
$('#agency').val(departmentRP);
$('#division').val(departmentRP);
$('#detail').val(otherRP);

</script>