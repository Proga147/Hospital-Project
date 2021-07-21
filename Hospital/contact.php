<?php
session_start();
require("includes/config.php");
$loginStatus = new applicationHelperClass();
$title = 'contact';
?>




<?php include_once('header.php'); ?>
<div class="container bg-light" style="min-height:500px;">
    <div class="row">
        <div class="col-sm-12">
            <div id="accordion">
                <form action="index">
                    <div class="card w-100">
                        <a class="card-link" data-toggle="collapse" href="#collapseOne">
                            <div class="card-header">
                                <img src="images/contact-form.png" alt="image of phone">
                                Enquiries, Suggestions or Complaints
                            </div>
                        </a>
                        <div id="collapseOne" class="collapse show" data-parent="#accordion">

                            <div class="card-body">
                                <h5>What type of query do you have? </h5>
                                <div class="card-body">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="optradio">General Enquiry
                                    </label>
                                </div>

                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="optradio">Suggestion
                                    </label>
                                </div>

                                <br><br>

                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="optradio">Complaint
                                    </label>
                                </div>

                                <br><br>

                                <div class="form-group row">
                                    <label for="fname" class="col-sm-2 col-form-label">First Name</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control mb-2 mr-sm-2 " id="fname" maxlength="20"
                                            placeholder="First Name" name="fname43" required>
                                    </div>
                                    <h3 class="text_red">*</h3>
                                </div>

                                <div class="form-group row">
                                    <label for="Email" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-8">
                                        <input type="email" class="form-control mb-2 mr-sm-2" id="email2" maxlength="40"
                                            placeholder="Enter email" name="email345" required>
                                    </div>
                                    <h3 class="text_red">*</h3>
                                </div>

                                <div class="form-group row">
                                    <label for="tele" class="col-sm-2 col-form-label">Phone Number</label>
                                    <div class="col-sm-8">
                                        <input type="tel" class="form-control mb-2 mr-sm-2" id="tele"
                                            placeholder="Phone Number" name="tele345345" pattern="[0-9]{3}-[0-9]{4}}"
                                            required>
                                    </div>
                                    <h3 class="text_red">*</h3>
                                </div>

                                <div class="form-group">
                                    <label for="comment">Please Enter the Deatails of your Query :</label>
                                    <textarea class="form-control" rows="5" id="comment"></textarea>
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <br><br>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>






                <div class="card w-100">

                    <a class="collapsed card-link" data-toggle="collapse" href="#collapseTwo">
                        <div class="card-header">
                            <img src="images/phone.png" alt="image for telepgone">
                            Contact Number
                        </div>
                    </a>

                    <div id="collapseTwo" class="collapse" data-parent="#accordion">
                        <div class="card-body">
                            <strong>Main Switchboard</strong> <br>
                            246-000-0000
                        </div>

                        <div class="card-body">
                            <strong>Accident & Emergency Operator</strong> <br>
                            246-000-0000
                        </div>

                        <div class="card-body">
                            <strong>Appointments</strong> <br>
                            246-000-0000
                        </div>


                    </div>
                </div>

                <div class="card w-100">

                    <a class="collapsed card-link" data-toggle="collapse" href="#collapseThree">
                        <div class="card-header">
                            <img src="images/map.png" alt="image of the map">
                            Address
                        </div>
                    </a>

                    <div id="collapseThree" class="collapse" data-parent="#accordion">
                        <div class="card-body">
                            <h5>University of the West Indies - Cave Hill Campus
                                Cave Hill Rd, Wanstead, Barbados</h5>

                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15541.763679144784!2d-59.635977735759035!3d13.134564532427872!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8
                c43f0c9193b86d9%3A0x8ae335aa4bf6af02!2sUniversity%20of%20the%20West%20Indies%20-%20Cave%20Hill%20Campus!5e0!3m2!1sen!2s!4v1587931640816!5m2!1sen!2s"
                                frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0">
                            </iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>

<?php include_once('footer.php'); ?>