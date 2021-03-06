        <header>
          <nav class="navbar navbar-expand-lg navbar-light bg-dark">
              <a class="navbar-brand sl" href="<?=URLROOT;?>"><img src="assets/images/wccrm-logo-2.jpg" alt=""> Watchman CMS</a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                  <a class="nav-item nav-link active sl" href="<?=URLROOT;?>">View All Members</a>
                  <a class="nav-item nav-link sl" href="<?=URLROOT;?>?page=save_member">Save Member Details</a>
                  <a class="nav-item nav-link sl" href="<?=URLROOT;?>?page=manage_workers">Manage Workers</a>
                  <a class="nav-item nav-link sl" href="<?=URLROOT;?>?page=follow_match">Follow-Up Match</a>
                  <a class="nav-item nav-link sl" href="<?=URLROOT;?>?page=save_newcomer">Save Newcomers Details</a>
                  <a class="nav-item nav-link sl" href="<?=URLROOT;?>?page=send_sms">Send SMS</a>
                  <a class="nav-item nav-link sl" href="<?=URLROOT;?>?page=send_sms_to_select">Send SMS To Selected</a>
                  <a class="nav-item nav-link sl" href="<?=URLROOT;?>?page=add_admin">Add New Admin</a>
                  <a class="nav-item nav-link sl" href="logout.php">Logout (<?= $username;?>)</a>
              </div>
          </nav>
      </header>