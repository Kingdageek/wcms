<div class="container">
    <!-- <div class="tabs">
        <a title="Enter details of member directly" href="#!" class="active">Form</a>
        <a title="Upload CSV file containing member details" href="#!">File</a>
    </div> -->
    <!-- bootstrap 4 tabs -->
    <nav class="nav nav-tabs text-center" id="myTab" role="tablist">
        <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-form" role="tab" aria-controls="nav-home" aria-selected="true" title="Enter details of member directly">Form</a>
        <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-file" role="tab" aria-controls="nav-profile" aria-selected="false" title="Upload CSV file containing member details">File</a>
    </nav>
    <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="nav-form" role="tabpanel" aria-labelledby="nav-home-tab">
            Fill this form
        </div>
        <div class="tab-pane fade" id="nav-file" role="tabpanel" aria-labelledby="nav-profile-tab">
            Upload CSV file
        </div>
    </div>
</div>