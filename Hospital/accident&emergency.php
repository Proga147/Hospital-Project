<?php
session_start();
require("includes/config.php");
$loginStatus = new applicationHelperClass();
$title = 'A & E';
?>


<?php include_once('header.php'); ?>



<div class="container rounded heart">
    <img class="img_absolute" src="images/cardiogram.png" alt="We care image">

    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home"
                aria-selected="true">Overview</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile"
                aria-selected="false">About Accident and Emergency</a>
        </li>

        <?php if (!($loginStatus->isUserLoggedIn())) : ?>
        <li class="nav-item">
            <a class="nav-link" id="visit-tab" data-toggle="tab" href="#visits" role="tab" aria-controls="visits"
                aria-selected="false">Visit Patient</a>
        </li>
        <?php endif ?>


        <?php if ($loginStatus->isUserLoggedIn()) : ?>
        <li class="nav-item">
            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact"
                aria-selected="false"> Patient's Information </a>
        </li>

        <?php endif ?>

    </ul>



    <?php
    if (isset($_SESSION['message'])) : ?>

    <div class="alert alert-<?= $_SESSION['msg_type'] ?> alert-dismissible fade show mt-4" role="alert">
        <?php
            echo $_SESSION['message'];
            unset($_SESSION['message']);
            ?>


        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>


    </div>
    <?php endif ?>






    <div class="tab-content" id="myTabContent">

        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
            <h3 class="mt-5"> Accident & Emergency Overview </h3>
            <hr>
            <p class="mt-5 lead">

                The Accident and Emergency Department created in 2020 is committed to the provision of quality, timely
                emergency care, to acutely sick and injured persons; both citizens and visitors alike.
                Pioneered by Dr Michael Holder and Dr Vanessa Harold, has opened with a team of initially 12 doctors and
                16 consultants and 8 nurses . As the busiest department in the hospital, the A&E Department attends to
                approximately 15,000 patients annually.
            </p>


            <div class="container" style="width:70%;">
                <div id="carouselExampleControls" class="carousel slide ml-5" data-ride="carousel">
                    <div class="carousel-inner ml-5">
                        <div class="carousel-item active">
                            <img class="d-block w-75" src="images/ane.png" alt="First slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-75" src="images/ane2.png" alt="Second slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-75" src="images/ane3.png" alt="Third slide">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>

            <p class="lead">

                Our physicians and nurses are here to help you and your relatives during your visit to the Emergency
                Department.
                The following infomation is what you should know before and during a visit to the Accident & Emergency
                Department:
            </p> <br><br>
            <ul>
                <li>
                    <p class="lead"> <strong>Be sure to always have your identification cards, list of current
                            medications</strong> (including dosages and schedules) and if you are bringing a child, be
                        sure to have the <strong>immunization card </strong>(Green Book)</p>
                </li>
                <li>
                    <p class="lead"> Ask our staff if you have any questions or concerns about your relative’s
                        treatment, procedures and medications.</p>
                </li>
            </ul>
            <hr>

            <br><br>
            <h3><img src="images\note.png" alt="register">Registration</h3>
            <br>

            <p class="lead"> Patients will be instructed to complete a registration upon arrival. Patients will need to
                provide their <strong>full name, date of birth, national registration number or passport number, gender
                    and the reason for visit</strong>.
                Patients will then be assessed by the triage nurse. If the patient’s treatment is urgent, they will be
                taken to the treatment area. If the patient is stable, they will finish the registration process and be
                taken
                to the treatment area when there is a room available. The staff of the Emergency Department is committed
                to providing the most accurate and efficient treatment to the patients it serves.</p>

            <br><br>
            <hr>

            <h3><img src="images\waiting.png" alt="register">Waiting Areas</h3>
            <br>

            <p class="lead">The waiting rooms are provided for the comfort of patients and their relatives or friends.
                The outside waiting area is open 24 hours a day and includes television-viewing areas, and vending
                machines just outside the area.
                It also has a stand alone phone charging ports for your convenience. Patients can expect to wait until
                their tests are completed and the results are back. The Emergency Department is often very busy with
                many patients
                requiring immediate or urgent treatment.</p>
            <hr>

            <br><br>














        </div> <!--           END OVERVIEW                   -->






        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
            <p class="mt-5 lead">The Accident and Emergency department provides care for patients who may have an urgent
                need for medical, surgical or other care 24/7.</p>
            <br><br>
            <div class="row text-center">
                <div class="col-sm-6 col-xs-12 col-lg-5"><img src="images/all.png" alt="all day"></div>
                <div class="col-sm-6 col-xs-12 col-lg-5"><img src="images/award.png" alt="awards"></div>
            </div><br>
            <p class="lead"> The Accident and Emergency department is equipped and ready to treat a wide range of
                medical emergiences. The Accident and Emergency Department
                is responsible for the initial stabilization and treatment for conditions within the following areas:
            </p><br>

            <ul class="lead">
                <li>Respiratory </li>
                <li>Orthopaedic</li>
                <li>Cardiovascular</li>
                <li>Neurological</li>
                <li>Oncological</li>
                <li>Psychiatric</li>
                <li>Ophthalmological</li>
                <li>Ear, Nose & Throat (ENT)</li>
                <li>Gynecological</li>
                <li>Trauma and non-trauma surgical conditions</li>
                <li>Ophthalmological</li>
            </ul>

            <br><br>
            <p class="lead"> The Accident and Emergency Department may also provide services for: </p><br>
            <ul class="lead">
                <li>Patients returning for further care/ assessment (reviews).</li>
                <li>Patients waiting to be admitted to a ward.</li>
                <li>Patients abandoned in the ED requiring assisted living services</li>
                <li>First medical response team to mass casualties and disasters</li>
            </ul>

            <br><br>
        </div>





        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
            <h4 class="mt-4">
                Welcome ! <?php echo $_SESSION['user'] ?> , <br>
            </h4>
            <div class="row">
                <div class="col-sm-4 pb-4 mt-4 ml-2" style="border:1px dashed #E0E3E4;">
                    <p class="lead mt-3"><img src="images/error.png" alt="tips for everyone"> In cases of <strong>
                            emergency: </strong></p>
                    <button class="btn btn-danger btn-lg" type="button" id="target" data-toggle="modal"
                        data-target="#Modal2">Click Here </button>
                </div>
                <br><br>
                <div class="col-sm-4 pb-4 mt-4 ml-2" style="border:1px dashed #E0E3E4;">
                    <p class="lead mt-3"><img src="images/question.png" alt="in need of assistance click here"> In need
                        of <strong> assistance: </strong> </p>
                    <button class="btn btn-primary btn-lg" type="button" data-toggle="modal"
                        data-target="#exampleModal">Click Here </button>
                </div>
            </div>
            <br><br>

            <!-- Button trigger modal -->

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Hello <?php echo $_SESSION['user'] ?></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            A nurse will be over shortly to assist you. <img src="images/nurse2.png"
                                alt="we will be with you :)">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>


            <div class="modal fade" id="Modal2" tabindex="-1" role="dialog" aria-labelledby="ModalLabel2"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="ModalLabel2">Hello <?php echo $_SESSION['user'] ?></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Hang tight! we will send help immediately! <img src="images/alarm.png"
                                alt="we will be with you :)">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>





            <h3><img src="images/shield.png" alt="stay safe">Staying Safe in Hospital</h3>
            <p class="lead">
                You also have a duty to treat the hospital, staff, and other patients
                with respect and provide healthcare staff with information about
                your health. </p>
            <ul class="lead">
                <li>Respectful </li>
                <li>Safe</li>
                <li>Responsive</li>
                <li>Looked After</li>
            </ul>
            <hr>

            <h3><img src="images/stay.png" alt="your stay">Your Stay</h3>
            <p class="lead">During your stay, you will be cared for by different healthcare staff
                at different times, who will keep each other up-to-date about your
                care and treatment. You and your carer or family members should
                be involved in this process so you’ll know what is going on with
                your care and treatment.
                If at any time you don’t understand what is being said to you,
                ask the staff caring</p>



            <h5>Meal Times</h5>
            <ul class="lead">
                <p> Meal times are as follows: </p>

                <li>Breakfast: 7.30am-9.30am</li>
                <li>Mid-morning coffee: 10.15am-11am</li>
                <li>Lunch: noon-1pm</li>
                <li>Tea: 3-3.30pm</li>
                <li>Supper: 5.45pm-7pm</li>
                <li>An evening drink is served after visiting time.</li>
            </ul>

            <hr>
            <h3><img src="images/patient.png" alt="medical procedure">Medical Procedures</h3>
            <ul class="lead" style="list-style-type:none;">
                <p>Before starting any medical procedure, medical staff will make a
                    final check to confirm:</p>
                <li><span style="color:red;">*</span> your full name and date of birth</li>
                <li><span style="color:red;">*</span> Any allergies or bad reactions you may have to any medicines,
                    food, or other</li>
                <li><span style="color:red;">*</span>The procedure you are having</li>
                <li><span style="color:red;">*</span>The part of your body where the procedure is being performed (if
                    applicable)</li>
                <li><span style="color:red;">*</span> Your consent form is complete and correct.</li>

            </ul>





            <hr>


            <h3><img src="images/wet-floor.png" alt="don't fall">Prevent yourself from falling</h3>
            <ul class="lead">
                <p> Falls can happen easily when you are unwell, taking new
                    medicines, and in unfamiliar places.</p>
                <p> Healthcare staff will discuss your risk of falling and put actions in
                    place to reduce your risk, such as:</p>

                <li>wear suitable clothing and non-slip footwear with good support
                <li>get up slowly after sitting or lying down
                <li>be aware that you may need more assistance than usual to
                    move around</li>
                <li>call staff for help if you need help moving, if you are feeling
                    unwell, dizzy, or there are hazards in your way</li>
                <li> have the call bell within reach and use it to call for help or use the buttons on this page </li>
                <li> get to know your hospital room, furniture, and bathroom location </li>
                <li> use your glasses, walking and hearing aids and keep them
                    within easy reach </li>
                <li> be extra careful in wet areas. </li>
                <li> If you do have a fall:
                    don’t try to get up by yourself
                    always call for help from staff. </li>
            </ul>


            <hr>

            <h3><img src="images/rx.png" alt="medicine">Your medicines</h3>

            <p class="lead">
                It’s important you keep track of your medicines – taking the right
                medicine at the right time will help you get well.
                Using medicines in the wrong way may cause unwanted side
                effects.</p>

            <ul class="lead">
                Medicines may be:

                <li> tablets, capsules or liquids, patches, creams and ointments</li>
                <li> drops and sprays for eyes,
                    nose, ears and mouth</li>
                <li> inhalers and puffers</li>
                <li> injections or implants</li>
                <li> pessaries or
                    suppositories</li>
                <li> vitamins and dietary supplements</li>
                <li> natural or herbal remedies.</li>
            </ul>


            <hr>
            <h3><img src="images/transfer.png" alt="your stay">Treatment, transfer or discharge</h3>
            <p class="lead"> In the event, that you are not addimited to a ward. Please note </p>
            <p class="lead">
                The waiting time target for patients in A&E is currently set to 4 hours from arrival to admission,
                transfer or discharge. However, not all hospitals have urgent care centres associated,
                which means people with minor injuries may have a longer wait until they are seen.
                In some cases you may be sent home and asked to arrange for a GP referral or you may
                be given a prescription and sent home. Either way, the hospital will inform your GP that you have been
                to A&E.
                If your situation is more complicated, you may be seen by an A&E doctor or referred to a specialist
                unit. For example,
                this could happen for eye problems, strokes or emergency gynaecology.</p>






        </div>
        <!--END PATIENT PAGE-->






        <!-- REASON FOR VISITORS VISIT -->

        <div class="tab-pane fade" id="visits" role="tabpanel" aria-labelledby="visit-tab">


            <div class="container-fluid mt-5" style="border:1px dashed #E0E3E4;">

                <div class="col-sm-6 mx-auto pt-5 pb-5">
                    <form method="post" action="includes/process">

                        <div class="form-group">
                            <label for="name">Patient's Name: </label>
                            <input type="text" id="name" class="form-control" name="patient_name" maxlength="70"
                                placeholder="Enter name" required>
                        </div>

                        <div class="form-group">
                            <label for="patid">Patient's ID: </label>
                            <input type="text" id="patid" class="form-control" name="patientid" maxlength="70"
                                placeholder="Enter name" required>
                        </div>

                        <div class="form-group">
                            <label for="patient_name">Your Name: </label>
                            <input type="text" id="patient_name" class="form-control" name="person_name" maxlength="70"
                                placeholder="Enter name" required>
                        </div>

                        <div class="form-group">
                            <label for="Relation">Relation to patient:</label>
                            <select id="Relation" class="browser-default custom-select">
                                <option selected>Choose Relation....</option>
                                <option value="parent">Parent</option>
                                <option value="gaurdian">Guardian</option>
                                <option value="cousin">Cousin</option>
                                <option value="friend">Friend</option>
                                <option value="other">Close family</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="reasonforvisit">Reason For Visit: </label>
                            <textarea class="form-control" id="reasonforvisit" rows="3" name="visitreason"
                                maxlength="300" required></textarea>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary" name="visit_patient">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>












    </div>
    <!--TAB CONTENT END -->






</div>



<?php include_once('footer.php'); ?>