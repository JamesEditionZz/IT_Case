<?php
$statuswork = 2;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>แจ้งปัญหา</title>
    <link rel="stylesheet" href="{{ asset('/css/welcome.css')}}">
    <link rel="stylesheet" href="{{ asset('/css/problem.css')}}">
    <script src="{{ asset('/js/jquery-3.6.0.min.js') }}"></script>
</head>

<body>
    <div class="navbar">
        <ul>
            <li><a href="{{ Route('welcome') }}">หน้าแรก</a></li>
            <li><a href="{{ Route('problem') }}" class="active">แจ้งปัญหา</a></li>
            <li><a href="{{ Route('Login') }}">เข้าสู่ระบบ</a></li>
        </ul>
    </div>
    <div class="mt-6 animation-display">
        <div>
            <h2 align="center" style="color: white;">แจ้งปัญหา</h2>
        </div>
        <br>
        <div class="container">
            <div class="col-1" align="center">
                <div>
                    <div>
                        <label for="" class="form-label">ชื่อ</label>
                    </div>
                    <div>
                        <input type="text" name="" id="name" class="form-control">
                    </div>
                </div>
                <div>
                    <div></div>
                    <div></div>
                    <label for="" class="form-label">แผนก</label>
                    <input type="text" name="" id="department" class="form-control">
                </div>
                <div>
                    <div>
                        <label for="" class="form-label">อาคาร</label>
                    </div>
                    <div>
                        <input type="text" name="" id="section" class="form-control">
                    </div>
                </div>
                <div>
                    <div>
                        <label for="" class="form-label">เบอร์โทรแผนก</label>
                    </div>
                    <div>
                        <input type="text" name="" id="tel" class="form-control" maxlength="3">
                    </div>
                </div>
                <div>
                    <div>
                        <label for="" class="form-label">ปัญหา</label>
                    </div>
                    <div>
                        <input type="text" name="" id="other" class="form-control">
                    </div>
                </div>
            </div>
            <div class="mt-3 jus-right">
                <button class="btn-success" onclick="submit()">บันทึก</button>
            </div>
        </div>
        <div align="center">
            <h2 style="color: white;">เคสที่แจ้งหา IT</h2>
        </div>
        <div class="container" align="center">
            <table width="100%">
                <tr>
                    <td>ชื่อผู้แจ้ง</td>
                    <td>แผนก</td>
                    <td>อาคาร</td>
                    <td>ปัญหา</td>
                    <td>เบอร์โทร</td>
                    <td>ผู้รับเคส</td>
                    <td>สถานะ</td>
                </tr>
                @foreach($data_problem as $rowproblem)
                <tr>
                    <td>{{ $rowproblem->RP_name }}</td>
                    <td>{{ $rowproblem->RP_department }}</td>
                    <td>{{ $rowproblem->RP_section }}</td>
                    <td>{{ $rowproblem->RP_other }}</td>
                    <td>{{ $rowproblem->RP_tel }}</td>
                    <td>{{ $rowproblem->RP_member }}</td>
                    @if($rowproblem->RP_status == 0 )
                    <td align="center" width="150">
                        <div class="status1">รอรับงาน</div>
                    </td>
                    @elseif($rowproblem->RP_status == 1 )
                    <td align="center" width="150">
                        <div class="status2">รับงานแล้ว</div>
                    </td>
                    @endif
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</body>

</html>
<script>
function submit() {

    var name = document.getElementById('name').value;
    var department = document.getElementById('department').value;
    var section = document.getElementById('section').value;
    var tel = document.getElementById('tel').value;
    var other = document.getElementById('other').value;

    if (name === "") {
        alert('ระบุชื่อ');
    } else if (department == "") {
        alert('ระบุแผนก');
    } else if (section == "") {
        alert('ระบุอาคาร');
    } else if (tel == "" || (tel !== "" && (tel.charCodeAt(0) < 48 || tel.charCodeAt(0) > 57))) {
        alert('ระบุเบอร์โทรไม่ถูกต้อง')
    } else if (other == "") {
        alert('ระบุปัญหา');
    } else {
        $.ajax({
            type: "POST",
            url: "{{ Route('recordproblem') }}",
            data: {
                name: name,
                department: department,
                section: section,
                tel: tel,
                other: other
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


}
</script>