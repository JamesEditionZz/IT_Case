<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>CaseIT</title>
    <link rel="stylesheet" href="{{ asset('/css/index.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/chageedit.css') }}">
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
            <div class="col-3">
                <div class="mg-3 table-brand">
                    <table class="tablebrand">
                        <tr>
                            <td style="background-color:gray">ประเภท</td>
                            <td style="background-color:gray">Edit</td>
                            <td style="background-color:gray">Delete</td>
                        </tr>
                        @foreach($category as $row)
                        <tr>
                            <td>{{ $row->name_category }}</td>
                            <td><button class="btn-edit" onclick="categoryedit( {{ $row->category_ID }} )">Edit</button></td>
                            <td><button class="btn-delete"
                                    onclick="categorydelete( {{ $row->category_ID }}, '{{ $row->name_category }}' )">Delete</button>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
                <div class="mg-3 table-brand">
                    <table class="tablebrand">
                        <tr>
                            <td style="background-color:gray">อุปกรณ์</td>
                            <td style="background-color:gray">Edit</td>
                            <td style="background-color:gray">Delete</td>
                        </tr>
                        @foreach($rowequip as $roweq)
                        <tr>
                            <td>{{ $roweq->name_equipment }}</td>
                            <td>
                                <button class="btn-edit" onclick="equipedit( {{ $roweq->equipment_ID }} )">Edit</button>
                            </td>
                            <td>
                                <button class="btn-delete"
                                    onclick="equipdelete( {{ $roweq->equipment_ID }}, '{{ $roweq->name_equipment }}' )">Delete</button>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
                <div class="mg-3 table-brand">
                    <table class="tablebrand">
                        <tr>
                            <td style="background-color:gray">ยีห้อ</td>
                            <td style="background-color:gray">อุปกรณ์</td>
                            <td style="background-color:gray">Edit</td>
                            <td style="background-color:gray">Delete</td>
                        </tr>
                        @foreach($rowbrand as $row)
                        <tr>
                            <td>{{ $row->name_brand }}</td>
                            <td>{{ $row->name_equipment }}</td>
                            <td><button class="btn-edit" onclick="brandedit( {{ $row->Brand_ID }} )">Edit</button></td>
                            <td><button class="btn-delete"
                                    onclick="branddelete( {{ $row->Brand_ID }}, '{{ $row->name_brand }}' )">Delete</button>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-category">
        <div class="modalcategory">
            <div>
                <div align="center">
                    <h4>แก้ไขประเภท</h4>
                </div>
                <div align="right">
                    <label for="">ประเภท :</label>
                    <input type="hidden" name="" id="category_ID">
                    <input type="text" id="category_name">
                </div>
                <div align="center" class="p-4 mt-1">
                    <button class="btn-submit" id="submitcategory">OK</button>
                    <button class="btn-close" id="closecategory">ยกเลิก</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-equip">
        <div class="modalequipment">
            <div>
                <div align="center">
                    <h4>แก้ไขอุปกรณ์</h4>
                </div>
                <div align="right">
                    <label for="">อุปกรณ์ :</label>
                    <input type="hidden" name="" id="equipment_ID">
                    <input type="text" id="equipment_name">
                </div>
                <div align="center" class="p-4 mt-1">
                    <button class="btn-submit" id="submitequipment">OK</button>
                    <button class="btn-close" id="closeequipment">ยกเลิก</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-brand">
        <div class="modalbrand">
            <div>
                <div align="center">
                    <h4>แก้ไขยีห้อ</h4>
                </div>
                <div align="right">
                    <label for="">ยีห้อ :</label>
                    <input type="hidden" name="" id="brand_ID">
                    <input type="text" id="brand_name">
                </div>
                <div align="right" class="mt-1">
                    <label for="">อุปกรณ์ :</label>
                    <input type="hidden" name="" id="equip_ID">
                    <input type="text" id="equip_name" class="inputselect">
                </div>
                <ul class="option-ul">
                    @foreach($rowequip as $rowoption)
                    <li onclick="listcate( {{ $rowoption->equipment_ID }}, '{{ $rowoption->name_equipment }}')">
                        {{ $rowoption->name_equipment }}</li>
                    @endforeach
                </ul>
                <div align="center" class="p-4 mt-1">
                    <button class="btn-submit" id="submitbrand">OK</button>
                    <button class="btn-close" id="closebrand">ยกเลิก</button>
                </div>
            </div>
        </div>
    </div>
    
    </div>
</body>

</html>
<script>
var equipname = document.getElementById('equip_name');
var optionul = document.querySelector('.option-ul');
var submitbrand = document.getElementById('submitbrand');
var submitequipment = document.getElementById('submitequipment');
var submitcategory = document.getElementById('submitcategory');
var closebrand = document.getElementById('closebrand');
var closecategory = document.getElementById('closecategory');
var closeequipment = document.getElementById('closeequipment');

////////////////////////////////////////////////////////////////////////////////////////
function categoryedit(category_ID){
    var modalcategory = document.querySelector('.modal-category')
    modalcategory.style.display = "block";

    $.ajax({
        type: "POST",
        url: "{{ Route('SearchEditCategory') }}",
        data: {
            category_ID: category_ID
        },
        headers: {
            "X-CSRF-TOKEN": $("meta[name='csrf-token']").attr('content')
        },
        success: function(response) {
            $('#category_ID').val(response.category_ID);
            $('#category_name').val(response.name_category);
        },
        error: function(error) {
            console.error(error);
        }
    });
}

submitcategory.addEventListener('click', function(){
    var categoryID = document.getElementById('category_ID').value
    var categoryName = document.getElementById('category_name').value;
    $.ajax({
        type: "POST",
        url: "{{ Route('UpdateCategory') }}",
        data: {
            categoryID: categoryID,
            categoryName: categoryName
        },
        headers: {
            "X-CSRF-TOKEN": $("meta[name='csrf-token']").attr('content')
        },
        success: function(response) {
            alert(response);
            window.location.reload();
        },
        error: function(error) {
            console.error(error);
        }
    });
})

function categorydelete(category_ID, category_name) {
    if (confirm("ต้องการลบ" + category_name + "?") === true) {
        $.ajax({
            type: "post",
            url: "{{ Route('DeleteCategory') }}",
            data: {
                category_ID: category_ID,
            },
            headers: {
                "X-CSRF-TOKEN": $("meta[name='csrf-token']").attr('content')
            },
            success: function(response) {
                alert(response);
                window.location.reload();
            },
            error: function(error) {
                console.error(error);
            }
        })
    }

}

closecategory.addEventListener('click', function(){
    var modalcategory = document.querySelector('.modal-category')
    modalcategory.style.display = "none";
})

///////////////////////////////////////////////////////////////////////////////////////////

function equipedit(equipment_ID){
    var modalequip = document.querySelector('.modal-equip');
    modalequip.style.display = "block";

    $.ajax({
        type: "POST",
        url: "{{ Route('SearchEquipment') }}",
        data: {
            equipment_ID: equipment_ID
        },
        headers: {
            "X-CSRF-TOKEN": $("meta[name='csrf-token']").attr('content')
        },
        success: function(response) {
            $("#equipment_ID").val(response.equipment_ID);
            $("#equipment_name").val(response.name_equipment);
        },
        error: function(error) {
            console.error(error);
        }
    })
}


submitequipment.addEventListener('click', function(){
    var equipmentID = document.getElementById('equipment_ID').value
    var equipmentname = document.getElementById('equipment_name').value

    $.ajax({
        type: "POST",
        url: "{{ Route('updateEquipment') }}",
        data: {
            equipmentID: equipmentID,
            equipmentname: equipmentname,
        },
        headers: {
            "X-CSRF-TOKEN": $("meta[name='csrf-token']").attr('content')
        },
        success: function(response) {
            alert(response);
            window.location.reload();
        },
        error: function(error) {
            console.error(error);
        }
    })
})

function equipdelete(equipment_ID, name_equipment) {
    if (confirm("ต้องการลบ" + name_equipment + "?") === true) {
        $.ajax({
            type: "post",
            url: "{{ Route('DeleteEquipment') }}",
            data: {
                equipment_ID: equipment_ID,
            },
            headers: {
                "X-CSRF-TOKEN": $("meta[name='csrf-token']").attr('content')
            },
            success: function(response) {
                alert(response);
                window.location.reload();
            },
            error: function(error) {
                console.error(error);
            }
        })
    }
}

closeequipment.addEventListener('click', function(){
    var modalequip = document.querySelector('.modal-equip');
    modalequip.style.display = "none"
})

///////////////////////////////////////////////////////////////////////////////////////////
function brandedit(Brand_ID) {
    var modalbrand = document.querySelector('.modal-brand');
    modalbrand.style.display = "block";

    $.ajax({
        type: "POST",
        url: "{{ Route('SearchDataEdit') }}",
        data: {
            Brand_ID: Brand_ID
        },
        headers: {
            "X-CSRF-TOKEN": $("meta[name='csrf-token']").attr('content')
        },
        success: function(response) {
            $("#brand_ID").val(response.Brand_ID);
            $("#brand_name").val(response.name_brand);
            $("#equip_ID").val(response.equip_ID);
            $("#equip_name").val(response.name_equipment)
        },
        error: function(error) {
            console.error(error);
        }
    })
}

equipname.addEventListener('click', function() {
    optionul.style.display = "block";
})

function listcate(equipment_ID, name_equipment) {
    if (equipment_ID) {
        $("#equip_ID").val(equipment_ID);
        $("#equip_name").val(name_equipment);
        optionul.style.display = "none";
    }
}

submitbrand.addEventListener('click', function() {
    var brandName = document.getElementById('brand_name').value;
    var equipID = document.getElementById('equip_ID').value;
    var brandID = document.getElementById('brand_ID').value;

    $.ajax({
        type: "post",
        url: "{{ Route('updateBrand') }}",
        data: {
            brandID: brandID,
            brandName: brandName,
            equipID: equipID,
        },
        headers: {
            "X-CSRF-TOKEN": $("meta[name='csrf-token']").attr('content')
        },
        success: function(response) {
            alert(response);
            window.location.reload();
        },
        error: function(error) {
            console.error(error);
        }
    });
})

closebrand.addEventListener('click', function() {
    var modalbrand = document.querySelector('.modal-brand');
    modalbrand.style.display = "none";
})

function branddelete(Brand_ID, name_brand) {
    var name_brand;
    if (confirm("ต้องการลบ" + name_brand + "?") == true) {
        $.ajax({
            type: "post",
            url: "{{ Route('DeleteBrand') }}",
            data: {
                Brand_ID: Brand_ID,
                name_brand: name_brand,
            },
            headers: {
                "X-CSRF-TOKEN": $("meta[name='csrf-token']").attr('content')
            },
            success: function(response) {
                alert(response);
                window.location.reload();
            },
            error: function(error) {
                console.error(error);
            }
        })
    }

}
/////////////////////////////////////////////////////////////////////////////////////////////
</script>