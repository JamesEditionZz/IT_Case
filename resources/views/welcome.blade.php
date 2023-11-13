<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WebSite IT</title>
    <link rel="stylesheet" href="{{ asset('/css/welcome.css')}}">
    <script src="{{ asset('/js/chart.js') }}"></script>
</head>

<body class="bg-main">
    <div class="navbar">
        <ul>
            <li><a href="{{ Route('welcome') }}" class="active">หน้าแรก</a></li>
            <li><a href="{{ Route('problem') }}">แจ้งปัญหา</a></li>
            <li><a href="{{ Route('Login') }}">เข้าสู่ระบบ</a></li>
        </ul>
    </div>
    <div class="header showdata">
        <div class="chart-col bg-white">
            <div class="barchart">
                <canvas id="myChart"></canvas>
            </div>
            <div class="piechart">
                <canvas id="pieChart" class="piechart"></canvas>
            </div>
        </div>
        <br>
        <hr>
        <div class="bg-header mt-2">
            <div class="news-it">
                <label>อัพเดทข่าวสาร IT</label>
            </div>
            <div class="news-detail">
                <div class="col-2">
                    <div>
                        <div>NextJS ประกาศออกเวอร์ชั่น 14 ความเปลี่ยนแปลงสำคัญคือรองรับฟีเจอร์ Server Actions ที่เปิดทางให้สามารถเขียนโค้ด server side ได้ในไฟล์เดียวกับ client side ไม่ต้องแยกไปเขียนโค้ดในโฟลเดอร์ /api เหมือนเดิม</div>
                    </div>
                    <div>
                        <div class="animation-click">NEW!</div>
                    </div>
                    <div>
                        <div>Oracle ออกส่วนขยาย Oracle Java Platform Extension ให้กับ Visual Studio Code ซึ่งถือเป็นส่วนขยายอย่างเป็นทางการของ Java ตัวแรกบน VS Code</div>
                    </div>
                    <div>
                        <div class="animation-click">NEW!</div>
                    </div>
		    <div>
                        <div>ไมโครซอฟท์ออกอัพเดตส่วนขยาย Python Extension for Visual Studio Code มีการเปลี่ยนแปลงสำคัญคือปลด Python 3.7 เข้าสถานะล้าสมัย (deprecated) แล้ว</div>
                    </div>
                    <div>
                        <div class="animation-click">NEW!</div>
                    </div>
		    <div>
                        <div>ไมโครซอฟท์เปิดโครงการ windows-driver-rs ชุดไลบรารีสำหรับการพัฒนาไดร์เวอร์ฮาร์ดแวร์ในภาษา Rust พร้อมไดร์เวอร์ตัวอย่างอีกจำนวนหนึ่ง แม้ว่าไลบรารียังไม่พร้อมใช้งานจริงจัง แต่ก็นับเป็นก้าวแรกสำหรับบริษัทต่างๆ ที่สนใจเตรียมการย้ายไดร์เวอร์ไปเป็นภาษา Rust ในอนาคต</div>
                    </div>
                    <div>
                        <div class="animation-click">NEW!</div>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="bg-header animation-scroll mt-2">
            <div class="text-header">
                <label for="">ประเภทของไวรัล</label>
            </div>
            <div class="col">
                <div class="bg-text">
                    <div class="virus-img1">
                        <img src="{{ asset('/image/trojan.png') }}" alt="">
                    </div>
                    <div>
                        <h3 align="center">Trojan(โทรจัน)</h3>
                    </div>
                    <div class="text">
                        <label for="">เป็นมัลแวร์รูปแบบหนึ่งที่สามารถติดตั้งตัวเองได้อัตโนมัติในเครื่องคอมพิวเตอร์
                            จากนั้น
                            แฮกเกอร์จะใช้โปรแกรมดังกล่าวเพื่อเข้าควบคุมคอมพิวเตอร์เครื่องนั้น
                            โทรจันมักซ่อนมาพร้อมกับซอฟท์แวร์หรือไฟล์ที่ผู้ใช้ตั้งใจดาวน์โหลดหรือติดตั้ง
                        </label>
                    </div>
                </div>
                <div class="bg-text">
                    <div class="virus-img2">
                        <img src="{{ asset('/image/viruscom.png') }}" alt="">
                    </div>
                    <div>
                        <h3 align="center">Virus Computer(ไวรัสคอมพิวเตอร์)</h3>
                    </div>
                    <div class="text">
                        <label for="">เป็นโปรแกรมที่สามารถเพิ่มจำนวนได้เอง และทำให้เครื่องคอมพิวเตอร์มีปัญหา
                            ไวรัสสามารถแพร่กระจายจากคอมพิวเตอร์เครื่องหนึ่งไปยังอีกเครื่องหนึ่ง
                            เมื่อผู้ใช้ส่งข้อมูลผ่านระบบเครือข่ายหรืออินเทอร์เน็ต หรือไปกับซีดี ดีวีดี
                            หรืออุปกรณ์เก็บข้อมูลแบบ USB </label>
                    </div>
                </div>
                <div class="bg-text">
                    <div class="virus-img2">
                        <img src="{{ asset('/image/worm.png') }}" alt="">
                    </div>
                    <div>
                        <h3 align="center">Virus Worm(หนอนคอมพิวเตอร์)</h3>
                    </div>
                    <div class="text">
                        <label for="">เป็นโปรแกรมอันตรายที่แตกต่างจากไวรัสอื่นๆ
                            เพราะมันสามารถแพร่กระจายได้โดยอัตโนมัติผ่านระบบเครือข่ายโดยที่ผู้ใช้ไม่รู้ตัว
                            หนอนคอมพิวเตอร์ถูกออกแบบมาให้เพิ่มจำนวนและแพร่กระจายได้เอง
                            จึงทำให้โปรแกรมประเภทนี้ลุกลามได้อย่างรวดเร็ว หนอนคอมพิวเตอร์หลายชนิดอาจทำให้การ
                            ดาวน์โหลดและการแสดงผลหน้าเว็บไซต์ช้ามาก
                            เพราะโปรแกรมพวกนี้มักแทรกตัวเข้ามาพร้อมกันในปริมาณมากและส่งผลให้ระบบเครือข่ายถูกปิดกั้น
                        </label>
                    </div>
                </div>
                <div class="bg-text">
                    <div class="virus-img2">
                        <img src="{{ asset('/image/malware.png') }}" alt="">
                    </div>
                    <div>
                        <h3 align="center">Malicious SoftWare(มัลแวร์)</h3>
                    </div>
                    <div class="text">
                        <label for="">มัลแวร์ หรือ Malicious Software คือ
                            ซอฟท์แวร์ที่ถูกสร้างขึ้นเพื่อแอบเข้าสู่ระบบคอมพิวเตอร์โดยที่ผู้ใช้ไม่ได้อนุญาต
                            มัลแวร์มีหลายชนิด ได้แก่ ไวรัสคอมพิวเตอร์ หนอน โทรจัน สปายแวร์ และซอฟท์แวร์อื่นๆ
                            ที่เป็นอันตราย
                        </label>
                    </div>
                </div>
                <div class="bg-text">
                    <div class="virus-img2">
                        <img src="{{ asset('/image/spyware.png') }}" alt="">
                    </div>
                    <div>
                        <h3 align="center">Spy Ware(สปายแวร์)</h3>
                    </div>
                    <div class="text">
                        <label for="">คือ ซอฟท์แวร์ที่แสดงโฆษณาหรือข้อมูลส่วนบุคคลหรือข้อมูลลับ
                            โดยเข้าสู่ระบบคอมพิวเตอร์เมื่อติดตั้งโปรแกรมใหม่ (ส่วนมากจะดาวน์โหลดจากอินเทอร์เน็ต)
                            สปายแวร์จะแอบขโมยข้อมูลเกี่ยวกับผู้ใช้ และสามารถเปลี่ยนการตั้งค่าเครื่องคอมพิวเตอร์
                            ทำให้เครื่องคอมพิวเตอร์ทำงานช้าลงหรือมีปัญหาจนใช้งานไม่ได้
                            โปรแกรมเหล่านี้มักเปลี่ยนหน้าโฮมเพจหรือหน้าค้นหาข้อมูลของเว็บบราวเซอร์ด้วย
                        </label>
                    </div>
                </div>
                <div class="bg-text">
                    <div class="virus-img2">
                        <img src="{{ asset('/image/ransomware.png') }}" alt="">
                    </div>
                    <div>
                        <h3 align="center">Ransom Ware(แรนซั่มแวร์)</h3>
                    </div>
                    <div class="text">
                        <label for="">Ransomware เป็นมัลแวร์ (Malware)
                            ประเภทหนึ่งที่มีลักษณะการทำงานที่แตกต่างกับมัลแวร์ประเภทอื่น ๆ
                            คือไม่ได้ถูกออกแบบมาเพื่อขโมยข้อมูลของผู้ใช้งานแต่อย่างใด แต่จะทำการเข้ารหัสหรือล็อกไฟล์
                            ไม่ว่าจะเป็นไฟล์เอกสาร รูปภาพ วิดีโอ ผู้ใช้งานจะไม่สามารถเปิดไฟล์ใด ๆ
                            ได้เลยหากไฟล์เหล่านั้นถูกเข้ารหัส
                            ซึ่งการถูกเข้ารหัสก็หมายความว่าจะต้องใช้คีย์ในการปลดล็อคเพื่อกู้ข้อมูลคืนมา
                            ผู้ใช้งานจะต้องทำการจ่ายเงินตามข้อความ “เรียกค่าไถ่” ที่ปรากฏ
                        </label>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="col bg-header mt-2" id>
            <div class="itsupport">
                <div class="it-img">
                    <img src="{{ asset('image/repair.png') }}" alt="">
                </div>
                <div class="detail-it">
                    <label class="text-header">
                        <h4>ITSupport</h4>
                    </label>
                    <label>: ตำแหน่งงานที่มีหน้าที่ดูแลรับผิดชอบ จัดการ แก้ไข ซ่อมแซม
                        บำรุงรักษาเครื่องใช้อุปกรณ์คอมพิวเตอร์ ตลอดจน Software และ Hardware
                        ขององค์กรให้อยู่ในสภาพที่ดี
                        และพร้อมใช้งานอยู่ตลอดเวลา</label>
                </div>
            </div>
            <div class="programmer">
                <div class="programmer-img">
                    <img src="{{ asset('image/programmer.png') }}" alt="">
                </div>
                <div class="detail-programmer">
                    <label class="text-header">
                        <h4>Programmer(นักพัฒนา software)</h4>
                    </label>
                    <label for="">: คือตำแหน่งงานที่ทำหน้าที่เกี่ยวข้องกับการเขียนโปรแกรม จึงจำเป็นต้องรู้
                        และเข้าใจภาษาคอมพิวเตอร์ต่าง ๆ เช่น VB , PHP , Java , C# , ASP เหล่านี้ เป็นต้น</label>
                </div>
            </div>
            <div class="erp">
                <div class="erp-img">
                    <img src="{{ asset('image/erp.png') }}" alt="">
                </div>
                <div class="detail-erp">
                    <label class="text-header">
                        <h4>ERP(นักพัฒนา software)</h4>
                    </label>
                    <label for="">: คือตำแหน่งงานเกี่ยวกับโปรแกรมเมอร์ มีหน้าที่จัดการกับระบบรวมรวม
                        และวิเคราะห์ข้อมูลการดำเนินงานต่าง ๆ ภายในองค์กร
                        เพื่อนำไปใช้เพิ่มประสิทธิภาพการทำงาน</label>
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

const scrollingscoll = document.querySelector('.animation-scroll');
let isScrolled = false;

window.addEventListener('scroll', () => {
    if (!isScrolled) {
        scrollingscoll.style.display = 'block'; // แสดงข้อความเมื่อผู้ใช้เลื่อน
        isScrolled = true;
    }
});

const scrollingcontect = document.querySelector('.animation-contect');
let Scrolledcontect = false;

window.addEventListener('scroll', () => {
    if (!Scrolledcontect) {
        scrollingcontect.style.display = 'block'; // แสดงข้อความเมื่อผู้ใช้เลื่อน
        Scrolledcontect = true;
    }
});
</script>