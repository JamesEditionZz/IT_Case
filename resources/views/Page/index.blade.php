<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>CaseIT</title>
    <link rel="stylesheet" href="{{ asset('/css/index.css') }}">
    <script src="{{ asset('/js/chart.js') }}"></script>
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
                            <li class="active">Dashboard</li>
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
                            <li>Report</li>
                        </a>
                        <a href="{{ Route('logout') }}">
                            <li>ออกจากระบบ</li>
                        </a>
                    </ul>
                </div>
            </div>
            <div class="showdata">
                <div class="ds-col">
                    <div class="border-card animation-radiusPQ">
                        <div class="card-label">
                            <div class="headerlist">
                                <label>Code PQ</label>
                            </div>
                            <div class="label-order">
                                <label for="">จำวนการสั่งซื้อ</label>
                            </div>
                        </div>
                        <div class="number">
                            <label for="">{{ $numberPQ }} ชิ้น</label>
                        </div>
                    </div>
                    <div class="border-card animation-radiusHW">
                        <div class="card-label">
                            <div class="headerlist">
                                <label>Code HW</label>
                            </div>
                            <div class="label-order">
                                <label for="">จำนวนเครื่อง</label>
                            </div>
                        </div>
                        <div class="number" align="center">
                            <label for="">{{ $numberHW }} เครื่อง</label>
                        </div>
                    </div>
                    <div class="border-card animation-radiusSW">
                        <div class="card-label">
                            <div class="headerlist">
                                <label>Code SW</label>
                            </div>
                            <div class="label-order">
                                <label for="">จำนวนSoftware</label>
                            </div>
                        </div>
                        <div class="number" align="center">
                            <label for="">{{ $numberSW }} License</label>
                        </div>
                    </div>
                </div>
                <div class="chart-col">
                    <div class="barchart">
                        <canvas id="myChart"></canvas>
                    </div>
                    <div class="piechart">
                        <canvas id="pieChart" class="piechart"></canvas>
                    </div>
                </div>
                <div class="div-table">
                    <div align="center">
                        <h2>Case แจ้งเข้ามา</h2>
                    </div>
                    <table width="90%" align="center" class="table-tablecase">
                        <tr>
                            <td>ชื่อผู้แจ้ง</td>
                            <td>แผนก</td>
                            <td>อาคาร</td>
                            <td>เบอร์โทรกลับ</td>
                            <td>ปัญหา</td>
                            <td></td>
                        </tr>
                        @foreach($caseproblem as $rowproblem)
                        <tr>
                            <td>{{ $rowproblem->RP_name }}</td>
                            <td>{{ $rowproblem->RP_department }}</td>
                            <td>{{ $rowproblem->RP_section }}</td>
                            <td>{{ $rowproblem->RP_tel }}</td>
                            <td>{{ $rowproblem->RP_other }}</td>
                            <td width="200">
                                <div>
                                    @if($rowproblem->RP_status == 0)
                                    <button class="caseIT" data-case-id="{{ $rowproblem->ID }}" onclick="caseIT( {{ $rowproblem->ID }} )">รับเคส</button>
                                    @elseif($rowproblem->RP_status == 1)
                                    <button class="btn-success" onclick="successcaseIT({{ $rowproblem->ID }})">เสร็จสิ้น</button>
                                    @endif
                                </div>
                                <div class="input-name" id="input-{{ $rowproblem->ID }}">
                                    <input type="text" name="" id="member-name" class="member-name">
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>

            </div>
        </div>
    </div>
</body>

</html>
<script>
var xValues = ["มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน", "กรกฏาคม", "สิงหาคม", "กันยายน",
    "ตุลาคม", "พฤศจิกายน", "ธันวาคม"
];
var yValues = [<?php echo $month1 ?>, <?php echo $month2 ?>, <?php echo $month3 ?>, <?php echo $month4 ?>,
    <?php echo $month5 ?>, <?php echo $month6 ?>, <?php echo $month7 ?>, <?php echo $month8 ?>,
    <?php echo $month9 ?>, <?php echo $month10 ?>, <?php echo $month11 ?>, <?php echo $month12 ?>
];
var barColors = [
    'rgba(255,0,0,0.2)',
    'rgba(255, 99, 132, 0.2)',
    'rgba(255, 159, 64, 0.2)',
    'rgba(255, 205, 86, 0.2)',
    'rgba(0, 255, 81,0.2)',
    'rgba(145,255,80,0.2)',
    'rgba(75, 192, 192, 0.2)',
    'rgba(54, 162, 235, 0.2)',
    'rgba(153, 102, 255, 0.2)',
    'rgba(237, 129, 254,0.2)',
    'rgba(255, 154, 206,0.2)',
    'rgba(201, 203, 207, 0.2)'
];
var borderColor = [
    'rgb(255,0,0)',
    'rgb(255, 99, 132)',
    'rgb(255, 159, 64)',
    'rgb(255, 205, 86)',
    'rgb(0, 255, 81)',
    'rgb(145,255,80)',
    'rgb(75, 192, 192)',
    'rgb(54, 162, 235)',
    'rgb(153, 102, 255)',
    'rgb(237, 129, 254)',
    'rgb(255, 154, 206)',
    'rgb(201, 203, 207)'
]

new Chart("myChart", {
    type: "bar",
    data: {
        labels: xValues,
        datasets: [{
            backgroundColor: barColors,
            borderColor: borderColor,
            data: yValues,
            borderWidth: 1
        }]
    },
    options: {
        legend: {
            display: false
        },
        title: {
            display: true,
            text: "จำนวน Case IT แต่ละเดือนของปี  <?php echo $yearthai ?>"
        }
    }
});

const xPValues = [<?php echo $yearthaiafter2 ?>, <?php echo $yearthaiafter1 ?>, <?php echo $yearthai ?>];
const yPValues = [<?php echo $listall2 ?>, <?php echo $listall1 ?>, <?php echo $listall ?>];
const barPColors = [
    "#b91d47",
    "#00aba9",
    "#2b5797",
    "#e8c3b9",
    "#1e7145"
];

new Chart("pieChart", {
    type: "pie",
    data: {
        labels: xPValues,
        datasets: [{
            backgroundColor: barPColors,
            data: yPValues,
        }]
    },
    options: {
        title: {
            display: true,
            text: "จำนวน Case IT แต่ละปี"
        }
    }
});

function caseIT(ID) {
    const inputname = document.getElementById(`input-${ID}`);
    inputname.style.display = "block";

    const button = document.querySelector(`button.caseIT[data-case-id="${ID}"]`);
    button.style.display = 'none';

    var membername = document.getElementById('member-name');


    membername.addEventListener('keydown', function(event) {
        if (event.key === "Enter") {
            var valuename = document.getElementById('member-name').value;
            var RP_ID = ID;

            $.ajax({
                type: "POST",
                url: "{{ Route('recordproblem') }}",
                data: {
                    RP_ID: RP_ID,
                    valuename: valuename
                },
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    alert('คุณ '+valuename+' ได้รับเคสแล้ว')
                    window.location.reload();
                },
                error: function(error) {
                    console.log(error);
                }
            });
        }

    });
}

function successcaseIT(ID){
    $.ajax({
        type: 'POST',
        url: "{{ Route('recordproblem') }}",
        data: { ID: ID },
        headers: { "X-CSRF-TOKEN": $("meta[name='csrf-token']").attr('content') },
        success: function(response){
            alert('เสร็จสิ้นแล้ว กำลังไปหน้าบันทึกเคส');
            window.location.href = "{{ Route('itsupport') }}";
        },
        error: function(error){
            console.log(error);
        }
    })
}
</script>