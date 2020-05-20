<?php session_start();

?>
<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Kanit">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-beta.20/css/uikit.css">
    <link rel="stylesheet" href="jquery.Thailand.js/dist/jquery.Thailand.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">

    <?php include './config/pg_con.class.php';
    $cid = $_SESSION['cid'];
    $hn =  $_SESSION['hn'];

    $searchuser = "SELECT p.fname,p.lname,pty.name as pttype,p.addrpart,dbs.province,dbs.amphur,district,p.moopart,p.hometel,pocode
    FROM patient p
     INNER JOIN dbaddress dbs on dbs.iddistrict =  concat(p.chwpart,p.amppart,p.tmbpart)
     INNER JOIN thaiaddress tha on tha.addressid = concat(p.chwpart,p.amppart,p.tmbpart)
     left join pttype pty on pty.pttype = p.pttype
    where p.hn = '".$_SESSION['hn']."' and p.cid = '".$_SESSION['cid']."' ";
    $have_user_yet = pg_query($conn, $searchuser);
    $result = pg_fetch_assoc($have_user_yet);


    ?>


    <script>
        (function(i, s, o, g, r, a, m) {
            i['GoogleAnalyticsObject'] = r;
            i[r] = i[r] || function() {
                (i[r].q = i[r].q || []).push(arguments)
            }, i[r].l = 1 * new Date();
            a = s.createElement(o), m = s.getElementsByTagName(o)[0];
            a.async = 1;
            a.src = g;
            m.parentNode.insertBefore(a, m)
        })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');

        ga('create', 'UA-33058582-1', 'auto', {
            'name': 'Main'
        });
        ga('Main.send', 'event', 'jquery.Thailand.js', 'GitHub', 'Visit');
    </script>

</head>

<body>
    <div class="uk-container uk-padding">
        <h1>ข้อมูลxxxxxxxxxx</h1>
        <div id="loader">
            <div uk-spinner></div> รอสักครู่ กำลังโหลดฐานข้อมูล...
        </div>
        <form id="demo1" class="demo" style="display:none;" autocomplete="off" uk-grid>

            <div class="uk-width-1-2@m">
                <label class="h2">ชื่อ</label>
                <input name="fname" class="uk-input uk-width-1-1" type="text" value="<?php echo $result['fname']?>">
            </div>
            <div class="uk-width-1-2@m">
                <label class="h2">นามสกุล</label>
                <input name="lname" class="uk-input uk-width-1-1" type="text" value="<?php echo $result['lname']?>">
            </div>
            <div class="uk-width-1-2@m">
                <label class="h2">เบอร์โทรศัพท์</label>
                <input name="phone" class="uk-input uk-width-1-1" type="text" value="<?php echo $result['hometel']?>">
            </div>
            <div class="uk-width-1-2@m">
                <label class="h2">สิทธิ์</label>
                <input name="fname" class="uk-input uk-width-1-1" type="text" value="<?php echo $result['pttype']?>">
            </div>
            <div class="uk-width-1-2@m">
                <label class="h2">LINE ID:</label>
                <input name="lineid" class="uk-input uk-width-1-1" type="text" >
            </div>
            <div class="uk-width-1-2@m">
                <label class="h2">เลขที่</label>
                <input name="adddess" class="uk-input uk-width-1-1" type="text" value="<?php echo $result['addrpart']?>">
            </div>
            <div class="uk-width-1-2@m">
                <label class="h2">หมู่</label>
                <input name="moo" class="uk-input uk-width-1-1" type="text" value="<?php echo $result['moopart']?>">
            </div>
            <div class="uk-width-1-2@m">
                <label class="h2">ตำบล / แขวง</label>
                <input name="district" class="uk-input uk-width-1-1" type="text" value="<?php echo $result['district']?>">
            </div>
            <div class="uk-width-1-2@m">
                <label class="h2">อำเภอ / เขต</label>
                <input name="amphoe" class="uk-input uk-width-1-1" type="text" value="<?php echo $result['amphur']?>">
            </div>
            <div class="uk-width-1-2@m">
                <label class="h2">จังหวัด</label>
                <input name="province" class="uk-input uk-width-1-1" type="text" value="<?php echo $result['province']?>">
            </div>
            <div class="uk-width-1-2@m">
                <label class="h2">รหัสไปรษณีย์</label>
                <input name="zipcode" class="uk-input uk-width-1-1" type="text" value="<?php echo $result['province']?>">
            </div>
            <div class="uk-width-1-2@m">
                <button class="button" style="vertical-align:middle;font-size:16px"><span> ยืนยัน/แก้ไข ข้อมูล </span></button>
            </div>
        </form>
    </div>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-beta.20/js/uikit.min.js"></script>
    <script type="text/javascript" src="jquery.Thailand.js/dependencies/zip.js/zip.js"></script>
    <script type="text/javascript" src="jquery.Thailand.js/dependencies/JQL.min.js"></script>
    <script type="text/javascript" src="jquery.Thailand.js/dependencies/typeahead.bundle.js"></script>
    <script type="text/javascript" src="jquery.Thailand.js/dist/jquery.Thailand.min.js"></script>
    <script type="text/javascript">
        $.Thailand({
            database: 'jquery.Thailand.js/database/db.json',
            $district: $('#demo1 [name="district"]'),
            $amphoe: $('#demo1 [name="amphoe"]'),
            $province: $('#demo1 [name="province"]'),
            $zipcode: $('#demo1 [name="zipcode"]'),
            onDataFill: function(data) {
                console.info('Data Filled', data);
            },
            onLoad: function() {
                console.info('Autocomplete is ready!');
                $('#loader, .demo').toggle();
            }
        });
        $('#demo1 [name="district"]').change(function() {
            console.log('ตำบล', this.value);
        });
        $('#demo1 [name="amphoe"]').change(function() {
            console.log('อำเภอ', this.value);
        });
        $('#demo1 [name="province"]').change(function() {
            console.log('จังหวัด', this.value);
        });
        $('#demo1 [name="zipcode"]').change(function() {
            console.log('รหัสไปรษณีย์', this.value);
        });
    </script>
</body>

</html>