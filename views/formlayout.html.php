<div class="container">
    <div class="text-center text-success alert-info p-3">
        <h4>SAVE <?= strtoupper($person); ?> DETAILS</h4>
        <hr>
        <p style="margin:0;">* Click on <strong>Form</strong> below to enter the details of <?= $person; ?>s one at a time <strong>OR</strong> Click on <strong>File</strong> to upload <strong>CSV</strong> file containing <?= $person; ?> details and have the system save them all automatically.</p>
    </div>
    <!-- bootstrap 4 tabs -->
    <nav class="nav nav-tabs text-center" id="myTab" role="tablist">
        <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-form" role="tab" aria-controls="nav-home" aria-selected="true" title="Enter details of <?= $person; ?> directly">Form</a>
        <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-file" role="tab" aria-controls="nav-profile" aria-selected="false" title="Upload CSV file containing <?= $person; ?> details">File</a>
    </nav>
    <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="nav-form" role="tabpanel" aria-labelledby="nav-home-tab">
            <div style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    padding: 20px;">
                <p><strong><small>Fields marked with <strong><sup>*</sup></strong> are mandatory.</small></strong></p>
                <?= $form;?>
            </div>
        </div>
    
        <div class="tab-pane fade" id="nav-file" role="tabpanel" aria-labelledby="nav-profile-tab">
            <?= $file; ?>  
        </div>
    </div>
</div>