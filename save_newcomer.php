
<?php 
$person = 'newcomer';
ob_start(); 
?>
        <!-- ====================== INDIVIDUAL MEMBERS FORM HTML CODE =================== -->

       
                <form action="javascript:storeNewcomer()" method="post">
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="fname">First Name <sup>*</sup></label>
                            <input type="text" id="fname" class="form-control" placeholder="Nonso" name="fname">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="lname">Last Name <sup>*</sup></label>
                            <input type="text" class="form-control" id="lname" placeholder="Mgbechi" name="lname">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="oname">Other Name(s)</label>
                            <input type="text" class="form-control" id="oname" placeholder="Kingsley" name="oname">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="phone">Phone <sup>*</sup></label>
                            <input type="phone" class="form-control" id="phone" placeholder="08129551799" name="phone" pattern=".{11,11}" title="Please enter 11-digit phone number">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="Email">Email</label>
                            <input type="email" class="form-control" id="email" placeholder="nm@gmail.com" name="email">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="occupation">Occupation</label>
                            <input type="text" class="form-control" id="occupation" placeholder="Web Developer" name="occupation">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="address">Address (Number and Street alone) <sup>*</sup></label>
                            <input type="text" class="form-control" id="address" placeholder="10 Afolabi Obe street" name="address">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="nbs">Nearest Bus stop <sup>*</sup></label>
                            <input type="text" class="form-control" id="nbs" placeholder="Orioke bus stop" name="nbs">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="town">Town <sup>*</sup></label>
                            <input type="text" class="form-control" id="town" placeholder="Ejigbo" name="town">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="gender">Gender <sup>*</sup></label>
                            <select id="gender" class="form-control">
                                <option value="" selected>Choose...</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="agerange">Age Range <sup>*</sup></label>
                            <select id="agerange" class="form-control" name="agerange">
                                <option value="" selected>Choose...</option>
                                <option value="Below 15">Below 15</option>
                                <option value="15-18">15-18</option>
                                <option value="15-18">15-18</option>
                                <option value="19-25">19-25</option>
                                <option value="26-35">26-35</option>
                                <option value="36-45">36-45</option>
                                <option value="Above 45">Above 45</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="currentchurch">Current Church <sup>*</sup></label>
                            <input type="text" name="currentchurch" id="currentchurch" required class="form-control">
                        </div>                  
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-8">
                            <div>
                                <label for="">Days available in the house <sup>*</sup> (Tick as many that applies)</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox" id="Sun" value="Sunday"> Sunday
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox" id="Mon" value="Monday"> Monday
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox" id="Tues" value="Tuesday"> Tuesday
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox" id="Wed" value="Wednesday"> Wednesday
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox" id="Thurs" value="Thursday"> Thursday
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox" id="Fri" value="Friday"> Friday
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox" id="Sat" value="Saturday"> Saturday
                                </label>
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="time">Time(s) <sup>*</sup></label>
                            <input type="text" name="time" id="time" required class="form-control" placeholder="4pm (weekends)">
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary" style="width:100%; margin-left:0; font-size:18px">SAVE DETAILS</button>
                    </div>
                </form>
<?php 
$form = ob_get_clean();
ob_start()
?>       

        <!-- ===================== UPLOAD CSV FILE HTML CODE ============================== -->
        <?php print_r($_FILES) ;?>
                Upload CSV file
        <form action="" method="POST" enctype="multipart/form-data">
            <input type="file" name="csv" id="csv">
            <input type="submit" value="Upload file" onclick='alert($("#csv").val())'>
        </form>
<?php 
$file = ob_get_clean();
include_once "views/formlayout.html.php";
?>      
<script>
function saveMember() {
    // Collect all values 
    // debugger
    let fname = $("#fname").val().trim()
    let lname = $("#lname").val().trim()
    let oname = $("#oname").val().trim()
    let nbs = $("#nbs").val().trim()
    let gender = $("#gender").val()
    let occupation = $("#occupation").val().trim()
    let town = $("#town").val().trim()
    let isworker = $("#isworker").val()
    let isleader = $("#isleader").val()
    let agerange = $("#agerange").val()
    let department = $("#department").val().trim()
    let isaffu = $("#isaffu").val()
    let phone = $("#phone").val().trim()
    let email = $("#email").val().trim()
    let address = $("#address").val().trim()

    if (fname == "" || lname == "" || phone == "" || address == "" || nbs == "" || 
            town == "" || gender == "" || agerange == "" || isworker == "")
    {
        $("#report").text("Please fill all compulsory fields!")
    } else if (isworker == "Yes" && (department == "" || isaffu == "" || isleader == "")) {
        $("#report").text("The department, Follow-up Availability and Leader Fields are compulsory if member is a worker")
    } else {
        $.post(
            "ajax/saveMember.php",
            {
                fname: fname,
                lname: lname,
                oname: oname,
                nbs: nbs,
                gender: gender,
                occupation: occupation,
                town: town,
                isleader: isleader,
                isworker: isworker,
                agerange: agerange,
                department: department,
                isaffu: isaffu,
                phone: phone,
                email: email,
                address: address
            }, 
            function (data) {
                // debugger
                if (data == "empty") {
                    $("#report").text("Please fill all compulsory fields!")
                } else if (data == "workerEmpty") {
                    $("#report").text("The department, Follow-up Availability and Leader Fields are compulsory if member is a worker")
                } else if (data == "emailErr") {
                    $("#report").text("Please enter a valid email address!")
                } else if (data == "phoneExists") {
                    $("#report").text("That phone number already belongs to another member!")
                } else if (data == "emailExists") {
                    $("#report").text("That email already belongs to another member!")
                } else if (data == "OK") {
                    $("#report").text("Member details saved successfully")
                    $("#report-house").removeClass('alert-danger').addClass('alert-success').fadeIn()
                    return
                } else {
                    alert("Check for errors my dear :D")
                }
            }
        );
    }
    $("#report-house").removeClass('alert-success').addClass('alert-danger').fadeIn()
}
</script>