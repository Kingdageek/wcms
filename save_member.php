<div class="container">
    <div class="text-center text-success alert-info p-3">
        <h4>SAVE MEMBER DETAILS</h4>
        <hr>
        <p style="margin:0;">* Click on <strong>Form</strong> below to enter the details of members one at a time <strong>OR</strong> Click on <strong>File</strong> to upload <strong>CSV</strong> file containing member details and have the system save them all automatically.</p>
    </div>
    <!-- bootstrap 4 tabs -->
    <nav class="nav nav-tabs text-center" id="myTab" role="tablist">
        <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-form" role="tab" aria-controls="nav-home" aria-selected="true" title="Enter details of member directly">Form</a>
        <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-file" role="tab" aria-controls="nav-profile" aria-selected="false" title="Upload CSV file containing member details">File</a>
    </nav>
    <div class="tab-content" id="nav-tabContent">

        <!-- ====================== INDIVIDUAL MEMBERS FORM HTML CODE =================== -->

        <div class="tab-pane fade show active" id="nav-form" role="tabpanel" aria-labelledby="nav-home-tab">
            <div style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    padding: 20px;">
                <p><strong><small>Fields marked with <strong><sup>*</sup></strong> are mandatory.</small></strong></p>
                <form action="javascript:saveMember()" method="post">
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
                            <select id="agerange" class="form-control">
                                <option value="" selected>Choose...</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="isworker">Is Member a Worker <sup>*</sup></label>
                            <select id="isworker" class="form-control" onchange="leaderBoxJs()">
                                <option value="" selected>Choose...</option>
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row" id="leader-box" style="display:none">
                        <div class="form-group col-md-4">
                            <label for="department">Department</label>
                            <input type="text" id="department" class="form-control" placeholder="Sanitation">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="isaffu">Is Worker currently available for follow-up</label>
                            <select id="isaffu" class="form-control">
                                <option value="" selected>Choose...</option>
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="isleader">Is Worker a Leader</label>
                            <select id="isleader" class="form-control">
                                <option value= "" selected>Choose...</option>
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary" style="width:100%; margin-left:0; font-size:18px">SAVE DETAILS</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- ===================== UPLOAD CSV FILE HTML CODE ============================== -->

        <div class="tab-pane fade" id="nav-file" role="tabpanel" aria-labelledby="nav-profile-tab">
            Upload CSV file
        </div>
    </div>
</div>
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