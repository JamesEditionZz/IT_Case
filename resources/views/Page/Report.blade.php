<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>CaseIT</title>
    <link rel="stylesheet" href="{{ asset('/css/index.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/report.css') }}">
    <script src="{{ asset('/js/jquery-3.6.0.min.js')}}"></script>
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
                            <li>รายการทั้งหมด</li>
                        </a>
                        <a href="{{ Route('showedit') }}">
                            <li>แก้ไขข้อมูล</li>
                        </a>
                        <a href="{{ Route('report') }}">
                            <li class="active">Report</li>
                        </a>
                        <a href="{{ Route('logout') }}">
                            <li>ออกจากระบบ</li>
                        </a>
                    </ul>
                </div>
            </div>
            <div class="font-report">
                @if(session('error'))
                <div class="alert alert-warning">
                    {{ session('error') }}
                </div>
                @endif
                <div class="text-header">
                    <label align="center">REPORT นะ</label>
                </div>
                <hr>
                <form action="{{ Route('ShowReport') }}" method="post">
                    @csrf
                    <div class="listreport">
                        <div>
                            <input type="radio" name="report" id="report1">
                            <label for="">รายงานตามรหัส</label>
                            <div>
                                <label for="">(รายงานทั้งหมดของรหัส)</label>
                            </div>
                        </div>
                        <div class="Code-ID" id="Code-ID">
                            <input type="text" id="codeID" name="codeID" autocomplete="off" readonly
                                placeholder="เลือกรหัส">
                            <div id="selectreport1" class="selectreport1">
                                <ul>
                                    <li class="Code" data-code="PQ">PQ</li>
                                    <li class="Code" data-code="HW">HW</li>
                                    <li class="Code" data-code="SW">SW</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="listreport">
                        <div>
                            <input type="radio" name="report" id="report2">
                            <label for="">รายงานตามวันที่</label>
                        </div>
                        <div class="report-date" id="inputdate">
                            <input type="date" id="date1" name="date1">
                            ถึง
                            <input type="date" id="date2" name="date2">
                        </div>
                    </div>
                    <div class="listreport">
                        <div>
                            <input type="radio" name="report" id="report3">
                            <label for="">รายงานแยกตามประเภท</label>
                        </div>
                        <div class="report-category" id="inputcategory">
                            <input type="hidden" name="" id="numcategory">
                            <input type="text" id="incategory" name="incategory" readonly placeholder="ประเภท">
                            <div class="ulcategory" id="ulcategory">
                                <ul id="reportlistcate">
                                </ul>
                            </div>
                            <input type="hidden" id="numequipment">
                            <input type="text" id="inputequipment" name="inputequipment" readonly placeholder="อุปกรณ์">
                            <div class="ulequipment" id="ulequipment">
                                <ul id="reportlistequip">
                                </ul>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="ITheader">
                        <h2>ITSupport</h2>
                    </div>
                    <div class="listreport">
                        <div>
                            <input type="radio" name="report" id="report4">
                            <label for="">รายงานตามวันที่</label>
                        </div>
                        <div class="report-date" id="ITinputdate">
                            <input type="date" id="ITdate1" name="ITdate1">
                            ถึง
                            <input type="date" id="ITdate2" name="ITdate2">
                        </div>
                    </div>
                    <div class="btn-report">
                        <button type="submit">รายงาน</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
<script>
var report1 = document.getElementById('report1');
var Code = document.querySelectorAll('.Code');
var selectreport1 = document.querySelector('.selectreport1');
var reportdate = document.getElementById('report-date');
var CodeID = document.getElementById('Code-ID');

var report2 = document.getElementById('report2');
var inputdate = document.getElementById('inputdate');


var report3 = document.getElementById('report3');
var incategory = document.getElementById('incategory');
var inputequipment = document.getElementById('inputequipment');
var inputbrand = document.getElementById('inputbrand');
var ulcategory = document.getElementById('ulcategory');
var ulequipment = document.getElementById('ulequipment');

var report4 = document.getElementById('report4');
var ITinputdate = document.getElementById('ITinputdate');

report1.addEventListener('click', function() {
    if (report1.checked) {
        CodeID.style.display = "block";
        inputdate.style.display = "none";
        inputcategory.style.display = "none";
        ITinputdate.style.display = "none";
    }
});
CodeID.addEventListener('click', function() {
    selectreport1.style.display = "block";
});
Code.forEach(element => {
    element.addEventListener('click', function() {
        var codeValue = element.getAttribute('data-code');
        $('#codeID').val(codeValue);
    })
});


report2.addEventListener('click', function() {
    if (report2.checked) {
        CodeID.style.display = "none";
        inputdate.style.display = "block";
        inputcategory.style.display = "none";
        ITinputdate.style.display = "none";
    }
})

report3.addEventListener('click', function() {
    if (report3.checked) {
        CodeID.style.display = "none";
        inputdate.style.display = "none";
        inputcategory.style.display = "block";
        ITinputdate.style.display = "none";

    }
})

incategory.addEventListener('click', function() {
    ulcategory.style.display = 'block';
    ulequipment.style.display = 'none';

    ulcategory.addEventListener('click', function() {
        ulcategory.style.display = 'none';
    })
})
inputequipment.addEventListener('click', function() {
    ulcategory.style.display = 'none';
    ulequipment.style.display = 'block';

    ulequipment.addEventListener('click', function() {
        ulequipment.style.display = 'none';
    })
})

$.ajax({
    type: "GET",
    url: "{{ Route('reportlistcate') }}",
    success: function(response) {
        var categorylist = $('#reportlistcate');
        categorylist.empty();
        for (let i = 0; i < response.length; i++) {
            const element = response[i];
            const Itemlist = $('<li>' + element.name_category + '</li>');
            categorylist.append(Itemlist);



            Itemlist.on('click', function() {
                var cate_ID = element.category_ID
                $('#numcategory').val(element.category_ID);
                $('#incategory').val(element.name_category);
                ulcategory.style.display = "none";

                $.ajax({
                    type: "POST",
                    url: "{{ Route('reportlistequip') }}",
                    data: {
                        cate_ID,
                        cate_ID
                    },
                    headers: {
                        "X-CSRF-TOKEN": $("meta[name='csrf-token']").attr('content')
                    },
                    success: function(response) {
                        var reportequiplist = $('#reportlistequip');
                        reportequiplist.empty();
                        for (let i = 0; i < response.length; i++) {
                            const element = response[i];
                            const equiplist = $('<li>' + element.name_equipment +
                                '</li>');
                            reportequiplist.append(equiplist);

                            equiplist.on('click', function() {
                                $('#numequipment').val(element.equipment_ID);
                                $('#inputequipment').val(element
                                    .name_equipment);
                            })
                        }
                    },
                    error: function(error) {
                        console.error(error);
                    }
                })
            });
        }
    },
    error: function(error) {
        console.error(error);
    }
});

function submit() {
    codeID = document.getElementById('codeID').value;
    date1 = document.getElementById('date1').value;
    date2 = document.getElementById('date2').value;
    numcategory = document.getElementById('numcategory').value;
    numequipment = document.getElementById('numequipment').value;


}

report4.addEventListener('click', function() {
    if (report4.checked) {
        CodeID.style.display = "none";
        inputdate.style.display = "none";
        inputcategory.style.display = "none";
        ITinputdate.style.display = "block";
    }
})
</script>