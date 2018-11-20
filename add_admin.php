
<div class="form-house">
    <h4 class="text-center">Add A New CMS Admin</h4>
    <div id="report-house" class="alert alert-danger" style="display:none">
        <span id="report"></span>
        <button type="button" class="close" aria-label="Close" id="close-rpt">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <form action="javascript:ad_sub_ajax()" class="form-group" method="post" id="admin_form">
        <label for="username" class="mt-2">Admin Username</label>
        <input type="text" id="username" name="username" focus class="form-control" autocomplete='off' autofocus>
        <span id="ureport" class='invalid-feedback'></span>
        <label for="password" class="mt-2">Password</label>
        <input type="password" id="password" name="password" class="form-control" autocomplete='off'>
        <span id="preport" class='invalid-feedback'></span>
        <label for="confirm_password" class="mt-2">Confirm Password</label>
        <input type="password" id="confirm_password" name="confirm_password" class="form-control" autocomplete='off'>
        <span id="cpreport" class='invalid-feedback'></span>
        <input type="submit" value="Save Admin" class="btn btn-primary form-control mt-3" name="submit" id="submit">
    </form>
</div>

<script>
   $('#close-rpt').on('click', function() {
       $('#report-house').fadeOut();
   });
   function ad_sub_ajax () {
      const submitBtn = document.querySelector("input[type='submit']")
      submitBtn.value = "please wait..."
        submitBtnAdminCheck(submitBtn)
    }

    function submitBtnAdminCheck(element) {
        let xhr;
        const username = document.querySelector("#username").value.trim()
        const password = document.querySelector("#password").value.trim()
        const cpassword = document.querySelector("#confirm_password").value.trim()

        if (username === "" || password === "" || cpassword === "") {
            $("#report").text("Please leave no field empty!");
            $("#report-house").fadeIn();
            element.value = "save admin";
            return;
        }
        debugger;
        if (window.XMLHttpRequest) {
            xhr = new XMLHttpRequest()
        } else {
            xhr = new ActiveXObject("Microsoft.XMLHTTP")
        }

        // const data = `data=${username}/${password}/${cpassword}`
        const data = `data=${username}/${password}/${cpassword}`
        xhr.open("POST", "ajax/admin_register.php", true)
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded")
        xhr.send(data)
        

        xhr.onreadystatechange = function () {

            if (xhr.readyState === 4 && xhr.status === 200) {
                let xrt = xhr.responseText
                if (xrt === "OK") {
                    $('#submit').val('Saving');
                    $('#submit').val("Saved");
                    $('#username').val("")
                    $('#password').val("")
                    $('#confirm_password').val("")
                    $("#report").text("New Admin Saved Successfully!");
                    $("#ureport").text("");
                    $("#cpreport").text("");
                    $('#report-house').removeClass("alert-danger").addClass("alert-success").fadeIn();
                } else if (xrt === "empty") {
                    $('#report').text("Please leave no field empty")
                    $("#report-house").fadeIn();
                } else if (xrt === "aa") {
                    $('#ureport').text('* Admin username already exists!');
                    $('#cpreport').text('');
                } else if (xrt === "pdm") {
                    $('#cpreport').text('* Passwords do not match');
                    $('ureport').text('');
                }
                element.value = "save admin";
            }
        }
    }

    $("#username").keyup(function() {
        let xhr;
        const uValue = this.value.trim();
        if (uValue === "") {
            $('#ureport').text('* Admin username cannot be left empty!');
            return;
        }
        if (window.XMLHttpRequest) {
            xhr = new XMLHttpRequest()
        } else {
            xhr = new ActiveXObject("Microsoft.XMLHTTP")
        }

        const data = `username=${uValue}`;
        xhr.open("POST", "ajax/check_admin_username.php", true)
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded")
        xhr.send(data)

        xhr.onreadystatechange = function () {

            if (xhr.readyState === 4 && xhr.status === 200) {
               if (xhr.responseText === 'ae') {
                   $('#ureport').removeClass('good-to-go').text('* Admin username already exists!');
               } else {
                   $('#ureport').addClass('good-to-go').text('Admin username available');
               }
            }
        }
    });
</script>
