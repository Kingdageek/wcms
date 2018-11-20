<!--suppress ALL -->
<div class="box">
    <div class="row">
        <div class="col-md-6" style="height: 100%; font-size: 16px;">
            <div style="margin: 15% 11%;" class="text-center">
                <div>
                    <img src="assets/images/watchman-logo.jpg" alt="Watchman Logo, An ancient watchman pointing at a descending sword">
                </div>
                <div>
                    <p style="font-weight: bold;"><span style="font-family: 'Calibri'; font-size: 28px; font-weight: bolder;">WATCHMAN, EJIGBO PARISH</span><br>MANAGEMENT SYSTEM</p>
                </div>
            </div>
        </div>
        <div class="col-md-6" style="height: 100%; background-color:#373737; padding: 0;">
            <div class="text-center" id="login_box">
                <h3 style="color:#fff; font-size: 22px; font-family: Ebrima; margin-bottom: 30px;">ADMIN LOGIN</h3>
                <div>
                    <form method="POST" action="<?= htmlspecialchars($_SERVER['PHP_SELF'], ENT_QUOTES, "utf-8");?>" id="login-form">
                        <div class="input_div">
                            <img src="assets/images/user_1.PNG" class="img_fit">
                            <input type="text" name="username" class="input_ate" id="username"
                                   value="<?=(isset($data['username'])) ? $data['username'] : '';?>"
                                   placeholder="Enter your username"><br>
                            <span class="invalid-feedback"><?= (isset($data["username_err"]) && !empty($data["username_err"]))? "* ".$data["username_err"] : "";?></span>
                        </div>
                        <div class="input_div">
                            <img src="assets/images/pass.PNG" class="img_fit">
                            <input type="password" name="password" class="input_ate" placeholder="Your password here" id="password"><br>
                            <span class="invalid-feedback"><?= (isset($data["password_err"]) && !empty($data["password_err"]))? "* ". $data["password_err"] : "";?></span>
                        </div>
                        <input type="submit" name="submit" value="LOGIN" class="btn input_btn">
                    </form>
                </div>
            </div>
            <footer class="text-center" id="footer">
                <p>
                    &copy;<?php echo date("Y");?> Watchman Catholic Charismatic Renewal Movement, Ejigbo Parish
                    <br><span>Built with <i class="fa fa-heart"></i> by <a href="mailto:mgbechinonso@gmail.com">rivrbank</a></span>
                </p>
            </footer>
        </div>
    </div>
</div>

<script>
    const loginForm = document.querySelector("#login-form")
    loginForm.addEventListener("submit", function () {
      const submitBtn = document.querySelector("input[type='submit']")
      submitBtn.value = "LOADING..."
        submitBtnLoginCheck(submitBtn)
    })

    function submitBtnLoginCheck (element) {
        let xhr;
        const username = document.querySelector("#username").value.trim()
        const password = document.querySelector("#password").value.trim()
        if (window.XMLHttpRequest) {
            xhr = new XMLHttpRequest()
        } else {
            xhr = new ActiveXObject("Microsoft.XMLHTTP")
        }

        const data = "data="+username+"/"+password
        xhr.open("POST", "ajax/check_login.php", true)
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded")
        xhr.send(data)

        xhr.onreadystatechange = function () {

            if (xhr.readyState === 4 && xhr.status === 200) {
               element.value = (xhr.responseText) ? xhr.responseText : element.value
            }
        }
    }
</script>