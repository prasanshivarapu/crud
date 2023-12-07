<!DOCTYPE html>
<html lang="en"> 
    <head>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
        <title>Contact Us | Jeevas Biotech</title>
        <?php include_once ("title.php"); ?>
    </head>

    <?php include_once ("header.php"); ?>
    <body class="home-orange-color" ng-app= "myApp" ng-controller="myCtrl">        
        <div class="offwrap"></div>
        <?php include_once("loader.php"); ?>   
        
        <div class="main-content">
            <div class="rs-contact contact-style2 pt-100 pb-100 md-pt-70 md-pb-70">
                <div class="container">
                <div >
                    <div class="row margin-0">   
                        <div class="col-lg-6 contact-section contact-style2">
                            <div class="sec-title mb-60">
                                <h2 class="title">Get in Touch</h2>
                            </div>
                            <div class="contact-wrap">
                                <div id="form-messages"></div>
                                
                                <form name="myForm"  ng-submit="submitForm()" >
                                    <fieldset>
                                        <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 mb-30">
                                                <input
                                                    class="from-control"
                                                    type="text"
                                                    id="name"
                                                    ng-model="formData.name"
                                                    placeholder="Name"
                                                    required
                                                    ng-minlength="3" 
                                                ng-maxlength="45"
                                                    ng-pattern="/^[A-Za-z]+(\s*\.\s*[A-Za-z]+)?(\s+[A-Za-z]+)*$/"
                                                    name="name"
                                                />
                                                <div
                                                    ng-show="myForm.name.$error.required && myForm.name.$dirty"
                                                    class="error-message"
                                                >
                                                    Name is required.
                                                </div>
                                                <div
                                                    ng-show="myForm.name.$error.pattern && myForm.name.$dirty"
                                                    class="error-message"
                                                >
                                                    Please enter a valid name (letters and spaces only).
                                                </div>
                                            </div>

                                            <div class="col-lg-12 col-md-12 col-sm-12 mb-30">
                                            <input
                                                class="from-control"
                                                type="email"
                                                id="email"
                                                ng-pattern="^[a-zA-Z][a-zA-Z0-9._%+-]*@[a-z0-9.-]+\.[a-z]{2,4}$
"
                                               

                                                ng-model="formData.email"
                                                placeholder="Email-Id"
                                                
                                                required
                                                name="email"
                                                />
                                                <div
                                                ng-show="myForm.email.$error.required && myForm.email.$dirty"
                                                class="error-message"
                                                >
                                                Email is required.
                                                </div>
                                                <div
                                                ng-show="myForm.email.$error.email && myForm.email.$dirty"
                                                class="error-message"
                                                >
                                                Please enter a valid email address.
                                                </div>

                                            </div>
                                           
                                            <div class="col-lg-12 col-md-12 col-sm-12 mb-30">
                                            <input
                                                class="from-control"
                                                type="text"
                                                id="phone"
                                                ng-model="formData.phone"
                                                placeholder="Contact-No"
                                                required
                                                
                                                ng-pattern="^[A-Za-z]+(\s*\.\s*[A-Za-z]+)?(\s+[A-Za-z]+)*$"
                                                name="phone"
                                                />
                                                <div
                                                ng-show="myForm.phone.$error.required && myForm.phone.$dirty"
                                                class="error-message"
                                                >
                                                Phone number is required.
                                                </div>
                                                <div
                                                ng-show="myForm.phone.$error.pattern && myForm.phone.$dirty"
                                                class="error-message"
                                                >
                                                Please enter a valid phone number (e.g., +911234567890 or 911234567890).
                                                </div>

                                            </div>
                                            </div>
                                            <div class="col-lg-12 mb-35">
                                            <textarea
                                                    class="from-control"
                                                    id="message"
                                                    ng-model="formData.message"
                                                    placeholder="Message/Query"
                                                    required
                                                    ng-pattern="/^[A-Za-z0-9. ]+$/"
                                                    name="message"
                                                    ></textarea>
                                                    <div
                                                    ng-show="myForm.message.$error.required && myForm.message.$dirty"
                                                    class="error-message"
                                                    >
                                                    Message/query is required.
                                                    </div>
                                                    <div
                                                    ng-show="myForm.message.$error.pattern && myForm.message.$dirty"
                                                    class="error-message"
                                                    >
                                                    Only alphanumeric characters and spaces are allowed.
                                                    </div>

                                            </div>
                                        </div>
                                        <div class="row">
                                        <div class="g-recaptcha col-lg-12 col-md-12 col-sm-12 mb-3" name="town" required data-sitekey="6Le7VcYnAAAAANgYd_rAR2vtJAu8m07mWKmHiVLG"></div>
                                         <div class="error-message" ng-show="showRecaptchaError">Please complete the reCAPTCHA.</div>

                                            
                                            </div>
                                            
                                        <div class="btn-part">
                                            <div class="form-group mb-0">
                                               <!-- <input class="readon submit" type="submit" value="Send Now">  -->
                                                <button class="readon submit mt-0" type="submit" name="submit">Submit</button>
                                            </div>
                                        </div>
                                    </fieldset>
                                </form>
                                
                            </div>
                            <div class="success"
                            ng-show="successMessage">{{ successMessage }}
                        </div>
                        <div class="error"
                            ng-show="errorMessage">{{ errorMessage }}
                        </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="rs-contact contact-style2">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d30447.253307849827!2d78.5794155264478!3d17.464180889895623!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bcb9c527034b9bd%3A0x343357e64b76c59c!2sCherlapalli%2C%20Secunderabad%2C%20Telangana!5e0!3m2!1sen!2sin!4v1693474144580!5m2!1sen!2sin" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>            
        </div>
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>

         <?php include_once ("footer.php"); ?>
       
         


         <script>
     var app = angular.module('myApp', []);
     app.controller('myCtrl', function ($scope, $http,$timeout) {
    $scope.formData = {};
    $scope.successMessage = '';
    $scope.errorMessage = '';
    $scope.showRecaptchaError = false;

    $scope.submitForm = function () {
      
        var recaptchaResponse = grecaptcha.getResponse();

        if (!recaptchaResponse) {
            $scope.showRecaptchaError = true;
            return;
        } else {
            $scope.showRecaptchaError = false; 
        }

      
        $http.post('config.php', $scope.formData)
            .then(function (response) {
                console.log(response);
                $scope.successMessage = response.data.message;
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
                console.error(error);
                
            });
    };
});


    </script>


    </body>
  
</html>