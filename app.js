var app = angular.module("myApp", []);
            app.directive("fileModel", function () {
                return {
                    restrict: "A",
                    link: function (scope, element, attrs) {
                        element.bind("change", function () {
                            scope.$apply(function () {
                                scope.myFile = element[0].files[0];
                            });
                        });
                    },
                };
            });
            app.controller(
                "EditController",
                function ($scope, $http, $timeout) {
                    $scope.contacts = [];
                    $scope.add = false;
                    $scope.hours = 0;

                    $scope.f = "";

                    $scope.hor = function () {
                        $scope.hours = parseInt($scope.hours);
                    };

                    $scope.result = function () {
                        $scope.k = $scope.hours * $scope.daily;
                    };

                    $scope.addContactField = function () {
                        $scope.add = true;
                        $scope.contacts.push({
                            name: "",
                            hours: 0,
                            ball: 0,
                            bat: 0,
                            apple: 0,
                            amount: 0,
                            show: false,
                        });
                    };
                 

                    $scope.removeContactField = function (index) {
                        $scope.contacts.splice(index, 1);
                    };
                    $scope.updateAmount = function (contact) {
                        if (contact.apple === 10 || contact.apple === 20) {
                            contact.hours = contact.apple;
                        } else {
                            contact.hours = ""; 
                        }
                        contact.show = true;
                    };

                    $scope.calculateTotalAmount = function () {
                        var total = 0;
                        for (var i = 0; i < $scope.contacts.length; i++) {
                            var contact = $scope.contacts[i];
                            total += contact.hours * contact.ball;
                        }
                        return total;
                    };

                    $scope.insert = {};
                    $scope.suc = "";
                    $scope.err = "";
                    $scope.showalert1 = false;
                    $scope.showalert2 = false;
                    console.log(userData.id);
                    $scope.sendForm = function () {
                        alert("called");
                        
                        var formData = new FormData();
                        formData.append("myFile", $scope.myFile);
                        formData.append(
                            "firstname",
                            JSON.stringify($scope.insert.firstname)
                        );
                        formData.append(
                            "middlename",
                            JSON.stringify($scope.insert.middlename)
                        );
                        formData.append(
                            "lastname",
                            JSON.stringify($scope.insert.lastname)
                        );
                        formData.append(
                            "ssnname",
                            JSON.stringify($scope.insert.ssnname)
                        );
                        formData.append(
                            "middlename",
                            JSON.stringify($scope.insert.middlename)
                        );
                        formData.append(
                            "mobile",
                            JSON.stringify($scope.insert.mobile)
                        );
                        formData.append(
                            "email",
                            JSON.stringify($scope.insert.email)
                        );
                        formData.append(
                            "gender",
                            JSON.stringify($scope.insert.gender)
                        );
                        formData.append(
                            "designation",
                            JSON.stringify($scope.insert.designation)
                        );
                        formData.append(
                            "dob",
                            JSON.stringify($scope.insert.dob)
                        );
                        formData.append(
                            "address",
                            JSON.stringify($scope.insert.address)
                        );
                        formData.append(
                            "state",
                            JSON.stringify($scope.insert.state)
                        );
                        formData.append(
                            "town",
                            JSON.stringify($scope.insert.town)
                        );
                        formData.append(
                            "zip",
                            JSON.stringify($scope.insert.zip)
                        );
                        formData.append(
                            "contacts",
                            JSON.stringify($scope.contacts)
                        );
                        console.log("Uploaded Filename:", $scope.insert);

                        // var contactNames = [];
                        // for (var i = 0; i < $scope.contacts.length; i++) {
                        //     contactNames.push($scope.contacts[i].name);
                        // }

                        // $scope.insert.contacts = $scope.contacts;

                        // var requestData = {
                        //         formData: $scope.insert,
                        //         contacts: $scope.contacts
                        //     };
                        // console.log($scope.insert)
                        if ($scope.insert.id) {
                           
                            var url = "update.php";
                            var method = "PUT"; 
                
                            
                           var result= id
                        } else {
                            
                            var url = "insert.php"; 
                            var method = "POST"; 
                
                    
                            var result = formData;
                        }
                        $http({
                            method: method,
                            url: url,
                            data: result,
                            transformRequest: angular.identity,
                            headers: {
                                "Content-Type": undefined,
                                "process-data": false,
                            },
                        }).then(
                            function (response) {
                                $scope.suc = response.data + " Successfully";
                                // $scope.suc =
                                //     " Successfully registered";
                                $scope.showalertafter1();
                                console.log(response.data);
                                $scope.inputalue = "";
                                $scope.insert = {};
                                $scope.myForm.$setPristine();
                            },
                            function (error) {
                                console.log(error);
                                $scope.err =
                                    error.statusText + "  Please try later";
                                $scope.showalertafter2();
                                $scope.insert = {};
                                $scope.myForm.$setPristine();
                            }
                        );
                        $scope.showalertafter1 = function () {
                            $scope.showalert1 = true;
                            $timeout(function () {
                                $scope.showalert1 = false;
                            }, 3000);
                        };
                        $scope.showalertafter2 = function () {
                            $scope.showalert2 = true;
                            $timeout(function () {
                                $scope.showalert2 = false;
                            }, 3000);
                        };
                    };
                }
            );