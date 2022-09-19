<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blood Banking</title>

    <link rel="stylesheet" href="css/main.css" />
    <link rel="stylesheet" href="css/bootstrap.min.css" />

    <script type="text/javascript" language="javascript" src="js/jquery-3.4.1.js"></script>

    <script>

        function resetForm() {
            $("#lname").val("");
            $("#fname").val("");
            $("#bg").val("");
            $("#age").val("");
            $("#address").val("");
            $("#mobile").val("");
        }
        
        $(document).ready(function() {
            $("#table").load("api/viewrecords.php", function(responseTxt, statusTxt, xhr){
                $("#table").html(responseTxt);
            });

            $("#btn-reset").click(function() {
                resetForm();
            });

            $("#btn-add").click(function(){
                var lname = $("#lname").val();
                var fname = $("#fname").val();
                var bg = $("#bg").val();
                var age = $("#age").val();
                var address = $("#address").val();
                var mobile = $("#mobile").val();
                
                $.post("api/addrecord.php", 
                {
                    lname: lname,
                    fname: fname,
                    bg: bg,
                    age: age,
                    address: address,
                    mobile: mobile
                },
                function(data, status){
                    alert(data);
                    resetForm();
                    
                    $("#table").load("api/viewrecords.php");
                });
            });

            $("#search-item").keyup(function(){
                var item = $("#search-item").val();
                
                $.post("api/searchrecord.php", 
                {
                    item: item
                },
                function(data, status) {
                    $("#table").html(data);
                });
            });

            $(document).on("click", ".btn-delete", function(){
                id = $(this).attr("id").split("-")[1];

                var sure = confirm("Are you sure you want to delete this record?");

                if(sure) {
                    $.post("api/deleterecord.php", 
                    {
                        id: id
                    },
                    function(data, status) {
                        alert(data);
                        
                        $("#table").load("api/viewrecords.php", function(responseTxt, statusTxt, xhr){
                            $("#table").html(responseTxt);
                        });
                    });
                }
            });

            var id = "";
            $(document).on("click", ".btn-edit", function(){
                id = $(this).attr("id").split("-")[1];
                
                $.post("api/click-edit.php", 
                {
                    id: id
                },
                function(data, status) {
                    var response = JSON.parse(data);
                    
                    var lname = response.data[0].lname;
                    var fname = response.data[0].fname;
                    var bg = response.data[0].bg;
                    var age = response.data[0].age;
                    var address = response.data[0].address;
                    var mobile = response.data[0].mobile;

                    $("#lname").val(lname);
                    $("#fname").val(fname);
                    $("#bg").val(bg);
                    $("#age").val(age);
                    $("#address").val(address);
                    $("#mobile").val(mobile);

                    $("#form-title").html("Update a Record");
                    $("#btn-add").css("display", "none");
                    $("#btn-edit").css("display", "inline-block");

                    $("#modal-form").addClass("showmodal");
                    $("#cover").addClass("showcover");
                });
            });

            $("#btn-edit").click(function(){
                var lname = $("#lname").val();
                var fname = $("#fname").val();
                var bg = $("#bg").val();
                var address = $("#address").val();
                var age = $("#age").val();
                var mobile = $("#mobile").val();
                
                $.post("api/editrecord.php?id="+id+"", 
                {
                    lname: lname,
                    fname: fname,
                    bg: bg,
                    age: age,
                    address: address,
                    mobile: mobile
                },
                function(data, status){
                    alert(data);
                    $("#form-title").html("Add in a Bank");
                    $("#btn-add").css("display", "inline-block");
                    $("#btn-edit").css("display", "none");
                    resetForm();

                    $("#table").load("api/viewrecords.php", function(responseTxt, statusTxt, xhr){
                        $("#table").html(responseTxt);
                    });
                });
            });
            
            $("#addbtn").click(function() {
                $("#form-title").html("Add in a Bank");
                $("#btn-add").css("display", "inline-block");
                $("#btn-edit").css("display", "none");
                resetForm();

                $("#modal-form").addClass("showmodal");
                $("#cover").addClass("showcover");
            });

            $(".fa-close").click(function() {
                $("#modal-form").removeClass("showmodal");
                $("#cover").removeClass("showcover");

                $("#form-title").html("Add in a Bank");
                $("#btn-add").css("display", "inline-block");
                $("#btn-edit").css("display", "none");
                resetForm();

            });

        });
	</script>
</head>

<body>
    
    <div class='' id="cover"></div>
    <div class='' id="modal-form">
        <form >
            <div class="fa-close">x</div>
            <h4 id='form-title' id='panel-title'>Add in a Bank</h4>

            <input id='fname' type='text' placeholder="Donor's first name" /><br>
            <input id='lname' type='text' placeholder="Donor's last name" /><br>
            <select id='bg' >
                <option value="" >Blood group</option>
                <option value="A+" >A+</option>
                <option value="A-" >A-</option>
                <option value="B+" >B+</option>
                <option value="B-" >B-</option>
                <option value="AB+" >AB+</option>
                <option value="AB-" >AB-</option>
                <option value="O+" >O+</option>
                <option value="O-" >O-</option>
            </select><br>
            <input id='age' type='number' placeholder='Age' /><br>
            <input id='address' type='text' placeholder='Address' /><br>
            <input id='mobile' type='number' placeholder='Mobile number (11 digits)' /><br>

            <button id='btn-add' type='button' style='display: inline-block;' class='btn btn-info'>ADD RECORD</button>
            <button id='btn-edit' style='display: none;' class='btn btn-info' type="button">UPDATE RECORD</button><br>

            <button id='btn-reset' style='width: 100px; padding' type="button" class='btn btn-outline-secondary btn-sm'>Reset</button>
        </form>
    </div>
    <div id="header">
        <div class="left">
            <h2>BLOOD BANKING</h2>
            <h6>MANAGEMENT SYSTEM</h6>
        </div>
        <div class="right">
            <a id='addbtn' class='btn' style='color: #fff;'>Add record</a>
        </div>
    </div>
    <div class="main">

        <input type="text" id='search-item' placeholder='Type here to search...'/>
        <br>
        <br>
        
        <div class="table-con">
            <table id='table'>

            </table>
        </div>
    </div>
</body>

</html>