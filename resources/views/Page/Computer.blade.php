<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>CaseIT</title>
    <link rel="stylesheet" href="{{ asset('/css/index.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/hw.css') }}">
    <script src="{{ asset('/js/jquery-3.6.0.min.js') }}"></script>
</head>
<style>
.btn-delete {
    border: 2px solid brown;
    padding: 5px;
    width: 80%;
    background-color: initial;
    cursor: pointer;
    border-radius: 10px;
    color: white;
    font-weight: bold;
}

.btn-delete:hover {
    background-color: brown;
}

.btn-edit {
    border: 2px solid rgb(126, 166, 0);
    padding: 5px;
    width: 80%;
    background-color: initial;
    cursor: pointer;
    border-radius: 10px;
    color: white;
    font-weight: bold;
}

.btn-edit:hover {
    background-color: rgb(126, 166, 0);
}

.btn-category {
    background-color: white;
    padding: 10px;
    border: 2px solid green;
    cursor: pointer;
    font-size: 16px;
    border-radius: 10px
}

.btn-category:hover {
    background-color: green;
    color: white;
}

.modal {
    display: none;
    position: fixed;
    z-index: 1;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgba(0,
            0, 0, 0.5);
}

.modal-content {
    background-color: #fefefe;
    margin: 15% auto;
    padding: 20px;
    border: 1px solid #888;
    width: 20%;
    animation-name: animodal;
    animation-duration: 1s;
}

@keyframes animodal {
    0% {
        opacity: 0;
    }

    100% {
        opacity: 1;
    }
}

.close {
    color: #aaa;
    float: right;
    font-size: 28px;
    cursor: pointer
}

.close:hover {
    color: red;
}
</style>

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
                            <li class="active">ทรัพย์สิน HW/SW</li>
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
            <div class="main showdata">
                <div class="main-header">
                    <h2>Computer HardWare</h2>
                </div>
                <div class="col-main">
                    <div class="card-input">
                        <div>
                            <label for="text">ประเภท</label>
                        </div>
                        <div class="select-box">
                            <div class="select-option">
                                <input type="hidden" name="cate_id" id="cate_id">
                                <input type="text" placeholder="เลือกประเภท" id="cate_name" readonly name="">
                            </div>
                            <div class="content">
                                <div class="search">
                                    <input type="text" id="opensearch" placeholder="Search" onkeydown="search(event)"
                                        name="">
                                </div>
                                <ul class="option" id="cate_filter">
                                    @foreach($category as $rowcate)
                                    <li id="selectinput"
                                        onclick="selectinput('{{ $rowcate->category_ID }}', '{{ $rowcate->name_category }}')">
                                        {{ $rowcate->name_category }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card-input">
                        <div>
                            <label for="text">อุปกรณ์</label>
                        </div>
                        <div class="select-equip">
                            <div class="option-equip">
                                <input type="hidden" name="equipmentID" id="equipmentID">
                                <input type="text" placeholder="เลือกอุปกรณ์" id="equipmentName" readonly name="">
                            </div>
                            <div id="contentequip" class="contentequip">
                                <div class="search-equip">
                                    <input type="text" name="equipinsert" id="equipinsert" placeholder="insert"
                                        onkeydown="insertequip(event)">
                                </div>
                                <ul id="equip_ID">
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card-input">
                        <div>
                            <label for="text">ยี่ห้อ</label>
                        </div>
                        <div class="select-brand">
                            <div class="option-brand">
                                <input type="hidden" name="brandID" id="brandID">
                                <input type="text" placeholder="เลือกยี่ห้อ" id="brandName" readonly name="">
                            </div>
                            <div id="contentbrand" class="contentbrand">
                                <div class="search-brand">
                                    <input type="text" name="brandinsert" id="brandinsert" placeholder="insert"
                                        onkeydown="insertbrand(event)">
                                </div>
                                <ul id="brand_ID">
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card-input">
                        <div>
                            <label for="text">ของใช้/สั่งซื้อ</label>
                        </div>
                        <div class="select-order">
                            <input type="hidden" id="orderID" name="">
                            <input type="text" placeholder="เลือกประเภทสินค้า" id="orderName" readonly name="">
                        </div>
                        <div id="contentorder" class="contentorder">
                            <ul id="order_ID">
                                <li onclick="software()">software</li>
                                <li onclick="receive()">อุปกรณ์ใช้แล้วทิ้ง</li>
                                <li onclick="order()">สั่งซื้อ</li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-input">
                        <button type="submit" class="btn-insert" onclick="insertrecord()">บันทึก</button>
                    </div>
                    <div class="card-input">
                        <div>
                            <label for="text">ผู้ใช้งาน</label>
                        </div>
                        <div class="informer-input">
                            <input type="text" placeholder="informer" name="informer" id="informer">
                        </div>
                    </div>
                    <div class="card-input">
                        <div>
                            <label for="text">อาคาร</label>
                        </div>
                        <div class="input-depart">
                            <input type="text" placeholder="depart" name="department" id="department">
                        </div>
                    </div>
                    <div class="card-input">
                        <div>
                            <label for="text">แผนก</label>
                        </div>
                        <div class="input-section">
                            <input type="text" placeholder="Section" name="section" id="section">
                        </div>
                    </div>
                    <div class="card-input">
                        <div>
                            <label for="text">หมายเหตุ</label>
                        </div>
                        <div class="input-other">
                            <input type="text" placeholder="Other" id="other" name="">
                        </div>
                    </div>
                    <div class="editinput">
                        <input type="hidden" name="" id="detail_ID">
                        <button type="submit" class="btn-editrecord" onclick="editrecord()">แก้ไข</button>
                    </div>
                </div>
                <hr>
                <div class="from-tranfer" id="from-tranfer">
                    <div class="tranfer">
                        <table>
                            <tr>
                                <input type="hidden" name="" id="waitcode_ID">
                                <td><label for="">ผู้ใช้</label></td>
                                <td><input type="text" name="" id="waitinformer"></td>
                                <td rowspan="3"><img src="{{ asset('/icon/next.png') }}"></td>
                                <td><input type="text" name="" id="editinformer"></td>
                                <td rowspan="3"><button class="btn-warning" onclick="update()">แก้ไข</button></td>
                            </tr>
                            <tr>
                                <td><label for="">อาคาร </label></td>
                                <td><input type="text" name="" id="waitdepart"></td>
                                <td><input type="text" name="" id="editdepart"></td>
                            </tr>
                            <tr>
                                <td><label for="">แผนก</label></td>
                                <td><input type="text" name="" id="waitsection"></td>
                                <td><input type="text" name="" id="editsection"></td>
                            </tr>
                        </table>
                    </div>
                    <hr>
                </div>
                <div>
                    <div class="main-header">
                        <h2>Datalist</h2>
                    </div>
                    <table width="100%" border="1">
                        <tr>
                            <th>ว/ด/ป</th>
                            <th>รหัสสินค้า</th>
                            <th>ประเภท</th>
                            <th>อุปกรณ์</th>
                            <th>ยี่ห้อ</th>
                            <th>ของใช้/สั่งซื้อ</th>
                            <th>ผู้ใช้งาน/อาคาร/แผนก อดีต</th>
                            <th>ผู้ใช้งาน/อาคาร/แผนก ปัจจุบัน</th>
                            <th>หมายเหตุ</th>
                        </tr>
                        @foreach($detail as $rowdetail)
                        <tr class="datalist">
                            <td align="center">{{ $rowdetail->date_item }}</td>
                            <td align="center">{{ $rowdetail->code_ID }}</td>
                            <td align="center">{{ $rowdetail->name_category }}</td>
                            <td align="center">{{ $rowdetail->name_equipment }}</td>
                            <td align="center">{{ $rowdetail->name_brand }}</td>
                            <td align="center">{{ $rowdetail->type }}</td>
                            <td align="center">@if($rowdetail->tf_informer)
                                {{ $rowdetail->tf_informer }} / {{$rowdetail->tf_department}} /
                                {{$rowdetail->tf_section}}
                                @endif
                            </td>
                            <td align="center">{{ $rowdetail->name_informer}} / {{$rowdetail->department}} /
                                {{$rowdetail->section }}</td>
                            <td align="center">{{ $rowdetail->other }}</td>
                            <td align="center"><img src="{{ asset('/icon/pen1.png') }}" alt="" width="30"
                                    class="img-pen" onclick="edit({{ $rowdetail->detail_ID }})"></td>
                            <td align="center" width="30"><img src="{{ asset('/icon/exchange.png') }}"
                                    class="img-exchange" alt="" id="btnedittran"
                                    onclick="edittranfer('{{ $rowdetail->code_ID }}')"></td>
                            <td align="center" width="30">
                                <img src="{{ asset('/icon/trash-can.png') }}" class="img-trash" alt=""
                                    onclick="del('{{ $rowdetail->code_ID }}')">
                            </td>
                        </tr>
                        @endforeach
                    </table>
                    {{ $detail->links() }}
                </div>
            </div>
        </div>
    </div>
</body>

</html>
<script>
function insert(category, equipment, department, section) {

    var category = document.getElementById('cate_id').value;
    var equipment = document.getElementById('equipmentID').value;
    var department = document.getElementById('departmentID').value;
    var section = document.getElementById('sectionID').value;

    if (category == "") {
        alert("เลือกประเภท");
    } else if (equipment == "") {
        alert("อุปกรณ์แหม๋");
    } else if (department == "") {
        alert("อาคาร อาคาร อาคาร");
    } else if (section == "") {
        alert("แผนกแหม๋ เป็น 0 0 แท๊น้อ");
    }

    $.ajax({
        type: "POST",
        url: "{{ Route('insertmac') }}",
        data: {
            category: category,
            equipment: equipment,
            department: department,
            section: section
        },
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                'content')
        },
        success: function(response) {
            alert('เพิ่มข้อมูลแล้ว');
            window.location.reload();
        },
        error: function(error) {
            console.error(error);
        }
    });
}

function del(code_ID) {
    alert('ต้องการลบข้อมูล ?');
    var code_ID = code_ID;
    if (confirm('อิหลีบ่ ?') == true) {
        $.ajax({
            type: "POST",
            url: "{{ Route('Deletemachine') }}",
            data: {
                code_ID: code_ID
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
        })
    }




}

const selectBox = document.querySelector('.select-box');
const selectOption = document.querySelector('.select-option');
const content = document.querySelector('.content');

selectOption.addEventListener('click', function() {
    content.style.display = "block";
});

document.addEventListener('click', function(e) {
    if (!selectBox.contains(e.target)) {
        content.style.display = "none";
    }
});

function selectinput(category_ID, name_category) {
    document.getElementById('cate_id').value = category_ID;
    document.getElementById('cate_name').value = name_category;
    content.style.display = "none";

    $.ajax({
        type: "POST",
        url: "{{ Route('searchequip') }}",
        data: {
            category_ID: category_ID
        },
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                'content')
        },
        success: function(response) {
            var equipList = $('#equip_ID');
            equipList.empty();
            for (let i = 0; i < response.length; i++) {
                const element = response[i];
                const listItem = $('<li>'+ code_equip +", "+ element.name_equipment + '</li>');
                equipList.append(listItem);

                listItem.on('click', function(i) {
                    $('#equipmentID').val(element.equipment_ID);
                    $('#equipmentName').val(element.name_equipment);
                    contentequip.style.display = "none";

                    var equipbrand = element.equipment_ID;

                    $.ajax({
                        type: "POST",
                        url: "{{ Route('listbrand') }}",
                        data: {
                            equipbrand: equipbrand
                        },
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name=csrf-token]').attr('content')
                        },
                        success: function(response) {
                            var brandlist = $('#brand_ID');
                            brandlist.empty();
                            for (let b = 0; b < response.length; b++) {
                                const element = response[b];
                                const listbrand = $('<li>' + element.name_brand +
                                    '</li>');
                                brandlist.append(listbrand);

                                listbrand.on('click', function(i) {
                                    $('#brandID').val(element.Brand_ID);
                                    $('#brandName').val(element.name_brand);

                                    contentbrand.style.display = "none";
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
            console.error("Error", error);
        }
    });
}

function search(event) {
    var searchcate = document.getElementById("opensearch").value;

    $.ajax({
        type: "POST",
        url: "{{ Route('searchcate') }}",
        data: {
            searchcate: searchcate
        },
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(response) {
            var searchfilter = document.getElementById("opensearch").value;
            var filteredCategories = response.filter(function(e) {
                return e.name_category.includes(searchfilter);
            });

            var cateFilterElement = document.getElementById("cate_filter");
            cateFilterElement.innerHTML = '';

            if (filteredCategories.length === 0) {
                var listItem = document.createElement('li');
                listItem.textContent = "+";
                cateFilterElement.appendChild(listItem);

                var insertInput = document.getElementById("opensearch").value;

                listItem.addEventListener('click', function() {
                    $.ajax({
                        type: "POST",
                        url: "{{ Route('insertcate') }}",
                        data: {
                            insertInput: insertInput
                        },
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(response) {
                            alert('เพิ่มข้อมูลแล้ว');
                        },
                        error: function(error) {
                            console.error("Error", error);
                        }
                    });
                });

            } else {
                filteredCategories.forEach(function(category) {
                    var categoryID = category.category_ID;
                    var categoryName = category.name_category;
                    var listItem = document.createElement('li');
                    listItem.textContent = categoryName;
                    cateFilterElement.appendChild(listItem);

                    listItem.addEventListener('click', function() {
                        var ID_category = categoryID
                        var name_category = categoryName;
                        document.getElementById('cate_id').value = ID_category;
                        document.getElementById('cate_name').value = name_category;
                        content.style.display = "none";

                        $.ajax({
                            type: "POST",
                            url: "{{ Route('searchequip') }}",
                            data: {
                                ID_category: ID_category
                            },
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]')
                                    .attr(
                                        'content')
                            },
                            success: function(response) {
                                var equipList = $('#equip_ID');
                                equipList.empty();
                                for (let i = 0; i < response.length; i++) {
                                    const element = response[i];
                                    const Itemlist = $('<li>' + element
                                        .name_equipment + '</li>');
                                    equipList.append(Itemlist);

                                    Itemlist.on('click', function() {
                                        $('#equipmentID').val(
                                            element
                                            .equipment_ID);
                                        $('#equipmentName').val(
                                            element
                                            .name_equipment);
                                        contentequip.style.display =
                                            "none";
                                    });
                                }
                            },
                            error: function(error) {
                                console.error("Error", error);
                            }
                        });
                    });
                });
            }
        },
        error: function(error) {
            console.error("Error", error);
        }
    });
}


const select_equipment = document.querySelector('.select-equip');
const selectequipment = document.querySelector('.option-equip');
const contentequip = document.querySelector('.contentequip');

selectequipment.addEventListener('click', function() {
    contentequip.style.display = 'block';
});

document.addEventListener('click', function(e) {
    if (!select_equipment.contains(e.target)) {
        contentequip.style.display = "none";
    }
});

const selectbrand = document.querySelector('.select-brand');
const contentbrand = document.querySelector('.contentbrand');

selectbrand.addEventListener('click', function() {
    contentbrand.style.display = "block";
})

document.addEventListener('click', function(e) {
    if (!selectbrand.contains(e.target)) {
        contentbrand.style.display = "none";
    }
});

function insertbrand(event) {
    if (event.key === "Enter") {
        var brandinsert = document.getElementById('brandinsert').value
        var equip_ID = document.getElementById('equipmentID').value
        $.ajax({
            type: "POST",
            url: "{{ Route('addbrand') }}",
            data: {
                brandinsert: brandinsert,
                equip_ID: equip_ID
            },
            headers: {
                "X-CSRF-TOKEN": $('meta[name=csrf-token]').attr('content')
            },
            success: function(response) {
                alert(response);

                var equip = document.getElementById('equipmentID').value;

                $.ajax({
                    type: "POST",
                    url: "{{ Route('listbrand') }}",
                    data: {
                        equip: equip
                    },
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name=csrf-token]').attr('content')
                    },
                    success: function(response) {
                        brandlist = document.getElementById('brand_ID');
                        brandlist.innerHTML = '';

                        response.forEach(element => {

                            var brandshowlist = document.createElement('li');
                            brandshowlist.textContent = element.name_brand;
                            brandlist.appendChild(brandshowlist);

                            var brandID = element.Brand_ID;
                            var brandName = element.name_brand;

                            $('#brandID').val(brandID);
                            $('#brandName').val(brandName);

                            contentbrand.style.display = "none";

                            brandshowlist.addEventListener('click', function() {
                                var brandID = element.Brand_ID;
                                var brandName = element.name_brand;

                                $('#brandID').val(brandID);
                                $('#brandName').val(brandName);

                                contentbrand.style.display = "none";
                            });
                        });
                    },
                    error: function(error) {
                        console.error(error);
                    }
                })

            },
            error: function(error) {
                console.log(error);
            }
        })
    }
}

function insertequip(event) {
    if (event.key === "Enter") {
        var category = document.getElementById('cate_id').value;
        var equip = document.getElementById('equipinsert').value;

        $.ajax({
            type: "POST",
            url: "{{ Route('insertequip') }}",
            data: {
                category: category,
                equip: equip
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                alert(response);
                var equip = document.getElementById('equipinsert').value;
                $.ajax({
                    type: "POST",
                    url: "{{ Route('showequip') }}",
                    data: {
                        equip: equip,
                        category: category
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        equiplist = document.getElementById('equip_ID');
                        equiplist.innerHTML = '';

                        response.forEach(element => {
                            var equipshowlist = document.createElement('li');
                            equipshowlist.textContent = element.name_equipment;
                            equiplist.appendChild(equipshowlist);

                            var equipmentID = element.equipment_ID;
                            var equipmentName = element.name_equipment;

                            $('#equipmentID').val(equipmentID);
                            $('#equipmentName').val(equipmentName);

                            contentequip.style.display = "none";

                            equipshowlist.addEventListener('click', function() {
                                var equipmentID = element.equipment_ID;
                                var equipmentName = element.name_equipment;

                                $('#equipmentID').val(equipmentID);
                                $('#equipmentName').val(equipmentName);

                                contentequip.style.display = "none";
                            });
                        });
                    },
                    error: function(error) {
                        console.error(error);
                    }
                })
            },
            error: function(error) {
                console.log(error);
            }
        })
    }
}

const selectorder = document.querySelector('.select-order');
const contentorder = document.querySelector('.contentorder');

selectorder.addEventListener('click', function() {
    contentorder.style.display = "block";
});

document.addEventListener('click', function(e) {
    if (!selectorder.contains(e.target)) {
        contentorder.style.display = "none";
    }
});

function software() {
    document.getElementById('orderID').value = "3";
    document.getElementById('orderName').value = "software";
}

function receive() {
    document.getElementById('orderID').value = "1";
    document.getElementById('orderName').value = "อุปกรณ์ใช้แล้วทิ้ง";
}

function order() {
    document.getElementById('orderID').value = "2";
    document.getElementById('orderName').value = "สั่งซื้อ";
}

function insertrecord() {
    var cateid = document.getElementById('cate_id').value;
    var equipmentID = document.getElementById('equipmentID').value;
    var brandID = document.getElementById('brandID').value;
    var order = document.getElementById('orderID').value;
    var ordername = document.getElementById('orderName').value;
    var informer = document.getElementById('informer').value;
    var department = document.getElementById('department').value;
    var section = document.getElementById('section').value;
    var other = document.getElementById('other').value;

    $.ajax({
        type: "POST",
        url: "{{ Route('insertmac') }}",
        data: {
            cateid: cateid,
            equipmentID: equipmentID,
            brandID: brandID,
            order: order,
            ordername: ordername,
            informer: informer,
            department: department,
            section: section,
            other: other
        },
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')
        },
        success: function(response) {
            alert(response);
            // window.location.reload();
        },
        error: function(error) {
            console.error(error);
        }
    })

}

function edittranfer(code_ID) {
    var fromtranfer = document.getElementById('from-tranfer');
    fromtranfer.style.display = "block";

    $.ajax({
        type: "POST",
        url: "{{ Route('edittranfer') }}",
        data: {
            code_ID: code_ID
        },
        headers: {
            "X-CSRF-TOKEN": $("meta[name=csrf-token]").attr('content')
        },
        success: function(response) {
            $('#waitcode_ID').val(response.code_ID);
            $('#waitinformer').val(response.name_informer);
            $('#waitdepart').val(response.department);
            $('#waitsection').val(response.section);
        },
        error: function(error) {
            console.error(error);
        }
    })
}

function update() {
    var waitcode_ID = document.getElementById('waitcode_ID').value;
    var waitinformer = document.getElementById('waitinformer').value;
    var waitdepart = document.getElementById('waitdepart').value;
    var waitsection = document.getElementById('waitsection').value;
    var informer = document.getElementById('editinformer').value;
    var depart = document.getElementById('editdepart').value;
    var section = document.getElementById('editsection').value;

    $.ajax({
        type: "POST",
        url: "{{ Route('updatetranfer') }}",
        data: {
            waitcode_ID: waitcode_ID,
            waitinformer: waitinformer,
            waitdepart: waitdepart,
            waitsection: waitsection,
            informer: informer,
            depart: depart,
            section: section
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

function edit(detail_ID) {

    var editinput = document.querySelector('.editinput');

    editinput.style.display = "block";

    $.ajax({
        type: "POST",
        url: "{{ Route('editrecord') }}",
        data: {
            detail_ID: detail_ID,
        },
        headers: {
            "X-CSRF-TOKEN": $("meta[name='csrf-token']").attr('content')
        },
        success: function(response) {
            $('#detail_ID').val(response.detail_ID)
            $('#cate_id').val(response.category_ID)
            $('#cate_name').val(response.name_category)
            $('#equipmentID').val(response.equipment_ID)
            $('#equipmentName').val(response.name_equipment)
            $('#brandID').val(response.Brand_ID)
            $('#brandName').val(response.name_brand)
            $('#orderName').val(response.type)
            $('#informer').val(response.name_informer)
            $('#department').val(response.department)
            $('#section').val(response.section)
            $('#other').val(response.other)

        },
        error: function(error) {
            console.error(error);
        }
    })
}

function editrecord() {
    var detail_ID = document.getElementById('detail_ID').value
    var cateid = document.getElementById('cate_id').value;
    var equipmentID = document.getElementById('equipmentID').value;
    var brandID = document.getElementById('brandID').value;
    var ordername = document.getElementById('orderName').value;
    var informer = document.getElementById('informer').value;
    var department = document.getElementById('department').value;
    var section = document.getElementById('section').value;
    var other = document.getElementById('other').value;

    $.ajax({
        type: "POST",
        url: "{{ Route('recordEdit') }}",
        data: {
            detail_ID: detail_ID,
            cateid: cateid,
            equipmentID: equipmentID,
            brandID: brandID,
            ordername: ordername,
            informer: informer,
            department: department,
            section: section,
            other: other
        },
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')
        },
        success: function(response){
            alert(response);
            window.location.reload();
        },
        error: function(error){
            console.error(error);
        }
    })
}
</script>