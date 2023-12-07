<!DOCTYPE html>
<html lang="en"> 
    <head>

  
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
        <title>Career | Jeevas Biotech</title>
        <?php include_once ("title.php"); ?>
    </head>
    <body class="home-orange-color" ng-app= "myApp" ng-controller="myCtrl">        
        <div class="offwrap"></div>
        <?php include_once ("loader.php"); ?>   
        
        <div class="main-content">
            <?php include_once ("header.php"); ?>
            <div class="rs-breadcrumbs img1">
                <div class="container">
                    <div class="breadcrumbs-inner">
                        <h1 class="page-title">Career</h1>
                    </div>
                </div>
            </div>

            <div class="rs-contact contact-style2 pt-100 pb-100 md-pt-70 md-pb-70">
                <div class="container">
                    <div class="row margin-0">
                        <div class="col-lg-6 contact-address">
                            <div class="sec-title mb-46">
                                <img src="images/joinourteam.png" />
                                <p class="margin-5"></p>
                                <p>Would you like to be a part of an Organization that is Devoted to Excellence in Quality and uncompromising Integrity in its service?</p>
                                <p>If yes, read on. In our fervour to realize our vision, we are looking for Talented, Experienced Professionals who have a taste for Excellence and who never want to stop Learning.</p>
                                <p>As an Analytical CRO, Jeevas Biotech gives its people an experience in a various scientific fields and we encourage our people to constantly improve their Knowledge and Skills through Training programs. Jeevas Biotech provides excellent working environment.</p>
                            </div>
                        </div>
                        <div class="col-lg-6 contact-section contact-style2">
                            <div class="sec-title mb-60">
                                <h2 class="title">Submit Your Resume</h2>
                            </div>
                            <div class="contact-wrap">
                                <div id="form-messages"></div>
                                <form  name="myForm"  ng-submit="isFormValid() && submitForm()" enctype="multipart/form-data">
                                    <fieldset>
                                        <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 mb-30">
                                            <input name="name" title="only characters are allowed" ng-minlength="3" ng-maxlength="45" class="from-control" ng-pattern="^[A-Za-z]+(\s*\.\s*[A-Za-z]+)?(\s+[A-Za-z]+)*$"  type="text" id="name" ng-model="formData.name" placeholder="Name" required>
                                            <div
                                                ng-show="myForm.name.$error.required && myForm.name.$dirty"
                                                class="error"
                                            >
                                                Name is required.
                                            </div>
                                            <div
                                                ng-show="myForm.name.$error.pattern && myForm.name.$dirty"
                                                class="error"
                                            >
                                                Please enter a valid name (letters and spaces only).
                                            </div>
                                            <div
                                                ng-show="myForm.name.$error.minlength && myForm.name.$dirty"
                                                class="error"
                                            >
                                                Name must be at least 3 characters long.
                                            </div>
                                            <div
                                                ng-show="myForm.name.$error.maxlength && myForm.name.$dirty"
                                                class="error"
                                            >
                                                Name cannot exceed 45 characters.
                                            </div>
                                        </div>
                                            <div class="col-lg-12 col-md-12 col-sm-12 mb-30">
                                                <input class="from-control"  ng-pattern="/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/" name="email"  type="email" id="email" ng-model="formData.email" placeholder="Email-Id" required>
                                                <div
                                                ng-show="myForm.email.$error.required && myForm.email.$dirty"
                                                class="error"
                                                >
                                                Email is required.
                                                </div>
                                                <div
                                                ng-show="myForm.email.$error.email && myForm.email.$dirty"
                                                class="error"
                                                >
                                                Please enter a valid email address.
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-md-12 col-sm-12 mb-30">
                                                <input name="phone" class="from-control" pattern="^(?:\+91)?[0-9]{10}$" type="text" id="phone" ng-model="formData.phone" placeholder="Contact-No" title="Please enter a valid phone number (e.g., +919876543210 or 9876543210)" required>
                                                <div
                                                ng-show="myForm.phone.$error.required && myForm.phone.$dirty"
                                                class="error"
                                                >
                                                Phone number is required.
                                                </div>
                                                <div
                                                ng-show="myForm.phone.$error.pattern && myForm.phone.$dirty"
                                                class="error"
                                                >
                                                Please enter a valid phone number (e.g., +919876543210 or 9876543210).
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-md-12 col-sm-12 mb-30">
                                                <select class="from-control" id="department" ng-model="formData.department" name="department" required>
                                                    <option value="">Select Department</option>
                                                    <option value="Analytical Chemist">Analytical Chemist</option>
                                                    <option value="Microbiologist">Microbiologist</option>
                                                    <option value="Quality Assurance - Sr. Executives">Quality Assurance - Sr. Executives</option>
                                                    <option value="Business Development - Executives">Business Development - Executives</option>
                                                    <option value="Sample Collection Executives">Sample Collection Executives</option>
                                                </select>
                                                <span class="error" ng-show="myForm.department.$error.required && myForm.department.$dirty">
                                                    Please select a department.
                                                </span>
                                            </div>
                                            <div class="col-lg-12 col-md-12 col-sm-12 mb-30">
                                            <input class="from-control" type="file" accept="application/pdf" id="resume" ng-model="formData.resume" name="resume" placeholder="Resume" >


                                                <span class="error" ng-show="myForm.resume.$error.required && myForm.resume.$dirty">
                                                    Please select a file.
                                                </span>
                                            </div>
                                            <div class="col-lg-12 mb-35">
                                                <textarea
                                                    class="from-control"
                                                    id="message"
                                                    ng-model="formData.message"
                                                    placeholder="Message/Query"
                                                    required
                                                    ng-pattern="/^[A-Za-z0-9 ]+$/"
                                                    ng-minlength="5"
                                                    ng-maxlength="255"
                                                    name="message"
                                                ></textarea>
                                                <div ng-show="myForm.message.$error.required && myForm.message.$dirty" class="error">
                                                    Message/query is required.
                                                </div>
                                                <div ng-show="myForm.message.$error.pattern && myForm.message.$dirty" class="error">
                                                    Only alphanumeric characters and spaces are allowed.
                                                </div>
                                                <div ng-show="myForm.message.$error.minlength" class="error">
                                                    Message/query should be at least 5 characters long.
                                                </div>
                                                <div ng-show="myForm.message.$error.maxlength" class="error">
                                                    Message/query should not exceed 255 characters.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                        <div class="g-recaptcha col-lg-12 col-md-12 col-sm-12 mb-3" name="town" required data-sitekey="6Le7VcYnAAAAANgYd_rAR2vtJAu8m07mWKmHiVLG"></div>
                                         <div class="error" ng-show="showRecaptchaError">Please verify the reCAPTCHA.</div>

                                            
                                            </div>
                                        <div class="btn-part">
                                            <div class="form-group mb-0">
                                                <!-- <input class="readon submit" type="submit" value="Submit Now"> -->
                                                <button class="readon submit mt-0" type="submit" name="submit">Submit</button>
                                            </div>
                                        </div>
                                    </fieldset>
                                    <div class="success"
                                        ng-show="successMessage">{{ successMessage }}
                                    </div>
                                    <div class="error"
                                        ng-show="errorMessage">{{ errorMessage }}
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <p>&nbsp;</p>            
        </div>
        <?php include_once ("footer.php"); ?>
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>
        <script>
                       var app = angular.module('myApp', []);
app.controller('myCtrl', function ($scope, $http, $timeout) {
    $scope.formData = {};
    $scope.successMessage = '';
    $scope.errorMessage = '';
    $scope.showRecaptchaError = false;
    $scope.isFormValid = function () {
        // Log validation errors to the console for debugging
        console.log('Validation Errors:', {
            required: $scope.myForm.$error.required,
            namePattern: $scope.myForm.name.$error.pattern,
            emailFormat: $scope.myForm.email.$error.email,
            phonePattern: $scope.myForm.phone.$error.pattern,
            departmentRequired: $scope.myForm.department.$error.required,
            resumeRequired: $scope.myForm.resume.$error.required,
            messageRequired: $scope.myForm.message.$error.required,
            recaptchaError: $scope.showRecaptchaError
        });

        // Implement your custom validation logic here
        return (
            !$scope.myForm.$error.required &&
            !$scope.myForm.name.$error.pattern &&
            !$scope.myForm.email.$error.email &&
            !$scope.myForm.phone.$error.pattern &&
            !$scope.myForm.department.$error.required &&
            !$scope.myForm.resume.$error.required &&
            !$scope.myForm.message.$error.required &&
            !$scope.showRecaptchaError
        );
    };

    $scope.submitForm = function () {
        var recaptchaResponse = grecaptcha.getResponse();
        console.log('$error for resume:', $scope.myForm.resume.$error);

        if (!recaptchaResponse) {
            $scope.showRecaptchaError = true;
            return;
        } else {
            $scope.showRecaptchaError = false;
        }
        if (!$scope.isFormValid()) {
            // Display an error message or handle invalid form data
            console.log('Form is invalid. Please check your input.');
            return;
        }

      




        
        // Create a FormData object and append form data fields
        var formData = new FormData();
        formData.append('name', $scope.formData.name);
        formData.append('email', $scope.formData.email);
        formData.append('phone', $scope.formData.phone);
        formData.append('department', $scope.formData.department);
        formData.append('message', $scope.formData.message);
        formData.append('resume', $scope.formData.resume);
     
        var fileInput = document.getElementById('resume');
        console.log(fileInput.files[0])
        
        formData.append('resume', fileInput.files[0]);
        console.log($scope.formData)
        
        $http.post('config2.php', formData, {
            transformRequest: angular.identity, 
            headers: { 'Content-Type': undefined } 
        })
        .then(function (response) {
            // console.log(response);
            $scope.successMessage = response.data.message;
            console.log(response.data)
            $scope.errorMessage = response.data.error;
            $scope.formData = {};
            $timeout(function () {
                $scope.successMessage = '';
            }, 5000);
            $timeout(function () {
                $scope.errorMessage = '';
            }, 5000);
            $scope.myForm.$setPristine();
            $scope.myForm.$setUntouched();
        }, function (error) {
            // console.error(error);
        });
    };
});



    </script>
    </body>
</html>