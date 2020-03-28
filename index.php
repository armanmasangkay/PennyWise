<?php
    include "phpfiles/session_validator.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!--Datepicker stylesheet-->
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />

    <!--Bootstrap CDN stylesheet-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!--These are for the iconPicker widget styling-->
    <link rel="stylesheet" href="src/css/bootstrap-iconpicker.min.css">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"/>
    <!--end iconWidget Styling-->

    <title>PennyWise | Home</title>

    <!--This style is used for Add goal button to create a circular version of the bootstrap button-->
    <style type="text/css">
        .btn-circle.btn-sm {
            width: 30px;
            height: 30px;
            padding: 6px 0px;
            border-radius: 15px;
            font-size: 8px;
            text-align: center;
        }

        .btn-circle.btn-md {
            width: 50px;
            height: 50px;
            padding: 7px 10px;
            border-radius: 25px;
            font-size: 10px;
            text-align: center;
        }

        .btn-circle.btn-xl {
            width: 70px;
            height: 70px;
            padding: 10px 16px;
            border-radius: 35px;
            font-size: 12px;
            text-align: center;
        }

        #goal-items {
            display: flex;
            flex-wrap: wrap;
        }

        #goal-items #items{
            flex: 0 0 33.333333%;
        }

    </style>



</head>

<body>

    <!--Add goal Modal-->
    <div class="modal fade" id="addGoalModal" tabindex="-1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add new goal</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form name="goal-registration">
                        <div class="form-row mb-3">
                            <div class="col-2">
                                <label for="iconSelector">Icon</label>
                                <button class="btn btn-primary" name="icon" role="iconpicker" id="iconSelector"></button>
                            </div>
                            <div class="col">
                                <!--For goal name input-->
                                <label for="goalName">Goal name</label>
                                <input type="text" class="form-control" id="goalName" name="goalName"
                                        placeholder="Enter the name of your goal" required>
                                <small class="form-text text-muted">(required)</small>
                            </div>
                            
                        </div>


                        <div class="form-group">
                            <label for="goalAmount">Amount you have to save</label>
                            <div class="input-group" id="goal-amount-frame">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Php.</span>  
                                </div>
                                <input type="number" class="form-control" id="goalAmount" name="goalAmount"
                                    placeholder="Enter the amount of your goal" required>
                                
                            </div>
                            <small class="form-text text-muted">(required)</small>
                        </div>

                        <div class="form-group">
                            <label for="datePicker">When you want to achieve this?</label>
                            <input id="datepicker" class="form-control" readonly />
                            <small class="form-text text-muted">Try to be very realistic with your target date</small>
                        </div>

                        <div class="form-group">
                            <label for="minimumSavings">Minimum amount to save everyday</label>
                            <input id="minimumSavings" type="text" class="form-control-plaintext" readonly value="00" />
                            <small class="form-text text-muted">This figure was calculated based on your specified
                                target date</small>
                        </div>

                        <div class="form-group">
                            <label for="goalDescription">Briefly describe your goal</label>
                            <textarea class="form-control" id="goalDescription"
                                placeholder="Explain what this goal is about"></textarea>
                            <small class="form-text text-muted">(optional)</small>
                        </div>


                    </form>


                </div>

                <div class="modal-footer">
                    <!--Footer information-->
                    <input type="button" value="Add Goal" class="btn btn-primary" id="addGoalButton">
                </div>

            </div>
        </div>
    </div>






    <div class="container-fluid">
        <!-- As a heading -->
        <nav class="navbar navbar-dark bg-primary mb-4">
            <ul class="navbar-nav mr-auto">
                <!--This is where the logo should be-->
                <span class="navbar-brand mb-0 h1"><a class="navbar-brand" href="#">
                        <img src="src/logo.svg" width="30" height="30" alt="">
                    </a>
                    PennyWise</span>
            </ul>

            <!---This is for the profile on the left side of the navbar-->
            <!-- <ul class="navbar-nav"> -->
            <div class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <span class="navbar-text">
                        <img class="rounded-circle"
                            src="https://tinyfac.es/data/avatars/475605E3-69C5-4D2B-8727-61B7BB8C4699-500w.jpeg"
                            width="30" height="30" alt="">
                        Arman Masangkay</span>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropDown">
                    <a class="dropdown-item" href="phpfiles/logout.php">
                        <img src="src/icons/box-arrow-right.svg" alt="" width="22" height="22">
                        Log me out
                    </a>

                </div>

            </div>
            <!-- </ul> -->
        </nav>
    </div>




    <!--This is the body where all goals will be shown-->
    <div class="container">

        <h1 class="display-4 mb-4">Goals</h1>
        <div class="row" id="goal-items">
            <!---Sample goal 1-->
            <div class="col-sm mb-3" id="items">
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-heart mr-2 text-danger"></i>
                       Marriage
                    </div>
                    <div class="card-body">
                        <p>Some description should be here</p>
                        <small class="card-text text-muted">Your progress so far</small><br>
                        <div class="progress">
                            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar"
                                    style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25/100
                            </div>
                        </div>
                        <a href="#" class="btn btn-outline-success btn btn-block mt-5">Add money</a>
                    </div>
                </div>
            </div>
            
            <div class="col-sm mb-3" id="items">
                    <div class="card">
                        <div class="card-header">
                            <i class="fa fa-shopping-basket mr-2 text-danger"></i>
                           Shopping
                        </div>
                        <div class="card-body">
                            <p>Some description should be here</p>
                            <small class="card-text text-muted">Your progress so far</small><br>
                            <div class="progress">
                                <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar"
                                        style="width: 75%;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">75/100
                                </div>
                            </div>
                            <a href="#" class="btn btn-outline-success btn btn-block mt-5">Add money</a>
                        </div>
                    </div>
            </div>
            <!--End sample goal card-->
            <div class="col-sm mb-3 align-self-center" id="AddButton">
                <!--Add goal button-->
                <div class="text-center">
                    <button type="button" class="btn btn-primary btn-circle btn-xl " data-toggle="tooltip"
                        title="Add new goal">

                        <img src="src/icons/plus.svg" alt="add goal" class="img-fluid" data-toggle="modal"
                            data-target="#addGoalModal">
                    </button>
                </div>
            </div>
        </div>

    </div>


    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>

    <!--Required js file for the date time picker-->
    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>

    <!--Required for the iconPicker widget-->
    <script type="text/javascript" src="src/js/bootstrap-iconpicker.bundle.min.js"></script>


    <!--This line waits for the document to load so all the tooltips will render properly -->
    <script>
        $(document).ready(function () {

            $('[data-toggle="tooltip"]').tooltip({ 'placement': 'top' });

            /*
            this is for the datetime picker in the form for adding goals
            includes initialization of the datepicker
            */
            var today = new Date();
            var currentDate = (today.getMonth() + 1) + '/' + today.getDate() + '/' + today.getFullYear();

            $('#datepicker').datepicker({
                uiLibrary: 'bootstrap4',
                format: 'mm/dd/yyyy',
                value: currentDate,
                minDate: currentDate,


            });


            /*
            This will get the number of days from today
            up to the specified targetDate of the user
            */
            function getDaysFromNow(targetDate) {
                var second = 1000, minute = second * 60, hour = minute * 60, day = hour * 24, week = day * 7;
                var currentDate = new Date();
                targetDate = new Date(targetDate);
                var numOfDays = targetDate - currentDate
                return Math.floor(numOfDays / day) + 1;
            }

            /*
             calculate the amount to save 
            */

            function getMinimumAmountToSave(numOfDays, amount) {
                return Math.ceil(amount / numOfDays);
            }

            //updates Minimum savings text field
            /*
           this function will check if the Amount field has a value 
           as well as the datepicker it will will then proceed to 
           calculate the minium amount
           */
            function updateValMinimumSavings() {
                var goalAmount = $('#goalAmount').val();
                var dateValue = $('#datepicker').val();
                if (goalAmount != '') {
                    var daysInterval = getDaysFromNow(dateValue);
                    /*
                      use the goalAmount for days in the present and calculate the days interval that are greater than 1
                    */
                    if (daysInterval <= 0) {
                        $('#minimumSavings').val("Php. " + goalAmount);
                    } else {
                        var amountToSave = getMinimumAmountToSave(daysInterval, goalAmount);
                        $('#minimumSavings').val("Php. " + amountToSave + " for " + daysInterval + " days");
                    }
                    

                }
            }

            function ValidateForm()
            {
                var FormValidated = true;

                if(GoalData.GoalTargetAmount == "")
                {
                    let goaltargetamount = document.getElementById("goal-amount-frame");
                    goaltargetamount.classList.add("border","border-danger");
                    let targetamount = document.getElementById("goalAmount");
                    targetamount.focus();
                    FormValidated = false;
                }
                else
                {
                    let goaltargetamount = document.getElementById("goal-amount-frame");
                    goaltargetamount.classList.remove("border","border-danger");
                }

                if(GoalData.GoalTitle == "")
                {
                    let goalname = document.getElementById("goalName");
                    goalname.classList.add("border","border-danger");
                    goalname.focus();
                    FormValidated = false;
                }
                else
                {
                    let goalname = document.getElementById("goalName");
                    goalname.classList.remove("border","border-danger");
                }

                if(GoalData.GoalIcon === "empty")
                {
                    let goalicon = document.getElementById("iconSelector");
                    goalicon.classList.add("border","border-danger");
                    goalicon.focus();
                    FormValidated = false;
                }
                else
                {
                    let goalicon = document.getElementById("iconSelector");
                    goalicon.classList.remove("border","border-danger");
                }

                return FormValidated;
            }

            let GoalData = {
                GoalIcon : null,
                GoalTitle : null,
                GoalDescription : null,
                GoalTargetAmount :null,
                GoalTargetDate : null,
                GoalMinimumAmount : null
            };

            let GoalCard = {
                Frame : null,
                CardFrame : null,
                CardHeader: null,
                CardIcon: null,
                CardTitle: null,
                CardBody: null,
                CardDescription: null,
                ProgressBarFrame: null,
                ProgressBar:null,
                ProgressBarPercent: null,
                Button: null
            }

            function AddNewGoal(Icon,Title,Description,CurrentAmount)
            {
                /*
                 * Make Goal Clickable
                 */
                 let GoalClickable = document.createElement("a");
                 GoalClickable.setAttribute("href","#");
                 GoalClickable.setAttribute("style","color:black; text-decoration: none !important;");

                /* 
                 * Split the value of GoalIcon and remove the space.
                 * The Value will be stored in this variable in Array Form
                 */
                var TempIcon = Icon.split(' ');

                 /*
                 * Assign value for Frame
                 * Then Add attribute, class with the specified value
                 */
                GoalCard.Frame = document.createElement("div");
                GoalCard.Frame.classList.add("col-sm","mb-3");
                GoalCard.Frame.setAttribute("id","items");

                /*
                 * Assign value for Card Frame
                 * Then add Attribute
                 */
                GoalCard.CardFrame = document.createElement("div");
                GoalCard.CardFrame.classList.add("card");

                /*
                 * Assign value for Card Header
                 * Then add Attribute
                 */
                GoalCard.CardHeader = document.createElement("div");
                GoalCard.CardHeader.classList.add("card-header");

                /*
                 * Assign value for Card Title
                 * Then Declare a variable for Text of CardTitle                
                 */
                GoalCard.CardTitle = document.createElement("span");
                GoalCard.CardTitle.innerHTML = Title;

                /*
                * Create element i
                * Assign element i class with Goal Icon
                */
                GoalCard.CardIcon = document.createElement("i");
                for(var x = 0 ;x < TempIcon.length ; x++)
                {
                    GoalCard.CardIcon.classList.add(TempIcon[x]);
                }
                GoalCard.CardIcon.classList.add("mr-2","text-danger");


                /*
                 * Create element div for Card Body
                */
                GoalCard.CardBody = document.createElement("div");
                GoalCard.CardBody.classList.add("card-body");


                /*
                 * assign element span for Goal Description
                */
                GoalCard.CardDescription = document.createElement("p");
                GoalCard.CardDescription.innerHTML = Description;

                /*
                 * Just for Design
                 */
                var designText = document.createElement("small");
                designText.innerHTML = "Your progress so far";
                designText.classList.add("card-text","text-muted");

                /*
                 * Create frame for Progressbar
                */
                GoalCard.ProgressBarFrame = document.createElement("div");
                GoalCard.ProgressBarFrame.classList.add("progress");


                /*
                 * Create ProgressBar
                */
                GoalCard.ProgressBar = document.createElement("div");
                GoalCard.ProgressBar.setAttribute("class", "progress-bar progress-bar-striped progress-bar-animated");
                GoalCard.ProgressBar.setAttribute("role","progressbar");
                GoalCard.ProgressBar.setAttribute("style","width: "+CurrentAmount+"%");
                GoalCard.ProgressBar.setAttribute("aria-valuenow",CurrentAmount);
                GoalCard.ProgressBar.setAttribute("aria-valuemin","0");
                GoalCard.ProgressBar.setAttribute("aria-valuemax","100");

                /*
                 * Add Text Percent inside the ProgressBar
                 */
                GoalCard.ProgressBarPercent = document.createElement("span");
                GoalCard.ProgressBarPercent.innerHTML = CurrentAmount + "/100";

                /*
                 * Add "Add Money" Button
                 */
                GoalCard.Button = document.createElement("a");
                GoalCard.Button.setAttribute("href","#");
                GoalCard.Button.classList.add("btn","btn-outline-success", "btn-block","mt-5");
                GoalCard.Button.innerHTML = "Add money";


                /*
                 * Appending all Items
                 */
                GoalCard.Frame.appendChild(GoalCard.CardFrame);
                GoalCard.CardFrame.appendChild(GoalClickable);
                GoalClickable.appendChild(GoalCard.CardHeader);
                GoalCard.CardHeader.appendChild(GoalCard.CardIcon);
                GoalCard.CardHeader.appendChild(GoalCard.CardTitle);
                GoalCard.CardFrame.appendChild(GoalCard.CardBody);
                GoalCard.CardBody.appendChild(GoalCard.CardDescription);
                GoalCard.CardBody.appendChild(designText);
                GoalCard.CardBody.appendChild(GoalCard.ProgressBarFrame);
                GoalCard.ProgressBarFrame.appendChild(GoalCard.ProgressBar);
                GoalCard.ProgressBar.appendChild(GoalCard.ProgressBarPercent);
                GoalCard.CardBody.appendChild(GoalCard.Button);

                /*
                 * Add Everything to HTML document *_*
                 */
                var MainNode = document.getElementById("goal-items");
                var AppendBefore = document.getElementById("AddButton");
                MainNode.insertBefore(GoalCard.Frame,AppendBefore);
            }

            function ClearAll()
            {
                $("#iconSelector").iconpicker('setIcon','empty');
                document.getElementById("goalName").value = "";
                document.getElementById("goalDescription").value = "";
                document.getElementById("goalAmount").value = "";
                document.getElementById("minimumSavings").value = "00";
                
                var todayDate = new Date();
                document.getElementById("datepicker").value = (todayDate.getMonth() + 1) + "/" + todayDate.getDate() + "/"+ todayDate.getFullYear();
            }


            $("#iconSelector").on('change',function(e){
                    GoalData.GoalIcon = e.icon;
                    //console.log(GoalData.GoalIcon);
                });

            $('#iconSelector').iconpicker({
                iconset:'fontawesome',
                icon:'fa-key',
                rows: 5,
                cols: 5,
                placement:'top',
            });

            $('#addGoalButton').click((e) => {
                /* Assign all data to Object */
                GoalData.GoalTitle = document.getElementById("goalName").value;
                GoalData.GoalDescription = document.getElementById("goalDescription").value;
                GoalData.GoalTargetAmount = document.getElementById("goalAmount").value;
                
                /*
                 * This will be useful, later on.
                 */
                // GoalData.GoalTargetDate = document.getElementById("datepicker").value;
                // GoalData.GoalMinimumAmmount = document.getElementById("minimumSavings").value;

                if(GoalData.GoalDescription == "")
                {
                    GoalData.GoalDescription = "No Description";
                }

                var request = ValidateForm();
                //console.log(request);
                if(request == true)
                {
                
                    //console.log(GoalData.GoalDescription);
                    AddNewGoal(GoalData.GoalIcon,GoalData.GoalTitle,GoalData.GoalDescription,"20");


                    ClearAll();
                    /*
                     * This Code will hide the modal
                     */
                    $("#addGoalModal").modal('hide');

                        

                        let divlength = document.getElementById("goal-items").childElementCount;

                        if(divlength > 5)
                        {
                            $("#AddButton").hide();
                        } 
                }
                
            });

            $("#goal-items").ready(()=>{
                let divlength = document.getElementById("goal-items").childElementCount;

                if(divlength > 5)
                {
                    $("#AddButton").hide();
                }
            });

            $('#datepicker').change((e) => {
                updateValMinimumSavings();
            });

            $('#goalAmount').keyup((e) => {
                updateValMinimumSavings();
            });

        });
    </script>

</body>

</html>