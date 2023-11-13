
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
        success: function (response) {
            window.location.reload();
        },
        error: function (error) {
            console.error(error);
        }
    });
}

function Delete() {
    alert('ต้องการลบข้อมูล ?')
    return confirm('ลบอิหลีบ่ ?')
}

const selectBox = document.querySelector('.select-box');
const selectOption = document.querySelector('.select-option');
const content = document.querySelector('.content');

selectOption.addEventListener('click', function () {
    content.style.display = "block";
});

document.addEventListener('click', function (e) {
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
        success: function (response) {
            var equipList = $('#equip_ID');
            equipList.empty();
            for (let i = 0; i < response.length; i++) {
                const element = response[i];
                const listItem = $('<li>' + element.name_equipment + '</li>');
                equipList.append(listItem);

                listItem.on('click', function (i) {
                    $('#equipmentID').val(element.equipment_ID);
                    $('#equipmentName').val(element.name_equipment);
                    contentequip.style.display = "none";
                });
            }
        },
        error: function (error) {
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
        success: function (response) {
            var searchfilter = document.getElementById("opensearch").value;
            var filteredCategories = response.filter(function (e) {
                return e.name_category.includes(searchfilter);
            });

            var cateFilterElement = document.getElementById("cate_filter");
            cateFilterElement.innerHTML = '';

            if (filteredCategories.length === 0) {
                var listItem = document.createElement('li');
                listItem.textContent = "+";
                cateFilterElement.appendChild(listItem);

                var insertInput = document.getElementById("opensearch").value;

                listItem.addEventListener('click', function () {
                    $.ajax({
                        type: "POST",
                        url: "{{ Route('insertcate') }}",
                        data: {
                            insertInput: insertInput
                        },
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function (response) {
                            alert('เพิ่มข้อมูลแล้ว');
                        },
                        error: function (error) {
                            console.error("Error", error);
                        }
                    });
                });

            } else {
                filteredCategories.forEach(function (category) {
                    var categoryID = category.category_ID;
                    var categoryName = category.name_category;
                    var listItem = document.createElement('li');
                    listItem.textContent = categoryName;
                    cateFilterElement.appendChild(listItem);

                    listItem.addEventListener('click', function () {
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
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                                    'content')
                            },
                            success: function (response) {
                                var equipList = $('#equip_ID');
                                equipList.empty();
                                for (let i = 0; i < response.length; i++) {
                                    const element = response[i];
                                    const Itemlist = $('<li>' + element
                                        .name_equipment + '</li>');
                                    equipList.append(Itemlist);

                                    Itemlist.on('click', function () {
                                        $('#equipmentID').val(element
                                            .equipment_ID);
                                        $('#equipmentName').val(element
                                            .name_equipment);
                                        contentequip.style.display =
                                            "none";
                                    })
                                }
                            },
                            error: function (error) {
                                console.error("Error", error);
                            }
                        });
                    });
                });
            }
        },
        error: function (error) {
            console.error("Error", error);
        }
    });
}


const select_equipment = document.querySelector('.select-equip');
const selectequipment = document.querySelector('.option-equip');
const contentequip = document.querySelector('.contentequip');

selectequipment.addEventListener('click', function () {
    contentequip.style.display = 'block';
});

document.addEventListener('click', function (e) {
    if (!select_equipment.contains(e.target)) {
        contentequip.style.display = "none";
    }
});

const selectdepart = document.querySelector('.select-depart');
const optiondepart = document.querySelector('.option-depart');

departmentName.addEventListener('click', function () {
    contentepartment.style.display = 'block';
});
document.addEventListener('click', function (e) {
    if (!selectdepart.contains(e.target)) {
        contentepartment.style.display = "none"
    }
});

function department(department_ID, name_department) {

    document.getElementById('departmentID').value = department_ID;
    document.getElementById('departmentName').value = name_department
    contentepartment.style.display = "none";

    $.ajax({
        type: 'POST',
        url: "{{ Route('finddepart') }}",
        data: {
            department_ID: department_ID,
        },
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (response) {
            var sectionList = document.getElementById('section_ID');

            sectionList.innerHTML = '';

            response.forEach(element => {
                var listsection = document.createElement('li');
                listsection.textContent = element.name_section;
                sectionList.appendChild(listsection);

                listsection.addEventListener('click', function () {
                    $('#sectionID').val(element.section_ID);
                    $('#sectionName').val(element.name_section);
                    contentsection.style.display = "none";
                })
            });
        },
        error: function (error) {
            console.error(error);
        }
    });
}

function searchdepart(event) {
    var searchdepart = document.getElementById('departsearch').value;

    $.ajax({
        type: "POST",
        url: "{{ Route('seadepart') }}",
        data: {
            searchdepart: searchdepart
        },
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (response) {
            var depart_fil = document.getElementById('departsearch').value;
            var filterdepart = response.filter(function (e) {
                return e.name_department.includes(depart_fil);
            });
            var departFilterElement = document.getElementById('depart_filter')
            departFilterElement.innerHTML = ""

            if (filterdepart.length === 0) {
                var listItem = document.createElement('li');
                listItem.textContent = "+";
                departFilterElement.appendChild(listItem);

                listItem.addEventListener('click', function () {
                    var adddepart = document.getElementById('departsearch').value;

                    $.ajax({
                        type: "POST",
                        url: "{{ Route('insertdepart') }}",
                        data: {
                            adddepart,
                            adddepart
                        },
                        headers: {
                            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function (response) {
                            console.log(response);
                        },
                        error: function (error) {
                            console.error(error);
                        }
                    })
                })
            } else {
                filterdepart.forEach(function (depart) {
                    var departID = depart.department_ID;
                    var departName = depart.name_department;
                    var listItem = document.createElement('li');
                    listItem.textContent = departName;
                    departFilterElement.appendChild(listItem);

                    listItem.addEventListener('click', function () {
                        document.getElementById('departmentID').value = departID;
                        document.getElementById('departmentName').value = departName
                        contentepartment.style.display = "none";

                        $.ajax({
                            type: 'POST',
                            url: "{{ Route('finddepart') }}",
                            data: {
                                departID: departID
                            },
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                                    'content')
                            },
                            success: function (response) {

                                var sectionList = document.getElementById(
                                    'section_ID');

                                sectionList.innerHTML = '';

                                response.forEach(element => {
                                    var listsection = document
                                        .createElement('li');
                                    listsection.textContent = element
                                        .name_section;
                                    sectionList.appendChild(
                                        listsection);

                                    listsection.addEventListener(
                                        'click',
                                        function () {
                                            $('#sectionID').val(
                                                element
                                                    .section_ID);
                                            $('#sectionName').val(
                                                element
                                                    .name_section);
                                            contentsection.style
                                                .display = "none";
                                        })
                                });
                                alert('เพิ่มข้อมูลแล้ว');
                            },
                            error: function (error) {
                                console.error(error);
                            }
                        });
                    });
                });

            }

        },
        error: function (error) {
            console.error("Error", error);
        }
    });
}

var optionsection = document.querySelector('.option-section');
var selectsection = document.querySelector('.select-section');

optionsection.addEventListener('click', function () {
    contentsection.style.display = 'block';
});
document.addEventListener('click', function (e) {
    if (!selectsection.contains(e.target)) {
        contentsection.style.display = "none"
    }
});