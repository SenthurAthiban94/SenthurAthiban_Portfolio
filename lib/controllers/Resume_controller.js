var senthur_app=angular.module("Resume_app",[]);

senthur_app.controller("resume_controller",['$scope','$http',function($scope,$http){
  $scope.url="lib/phpMail/SendMail.php"


  $scope.SendMail=function(){
    if($scope.sender_name && $scope.sender_mailid && $scope.sender_subject && $scope.sender_message){
        $scope.userdata={
            "name": $scope.sender_name,
            "from": $scope.sender_mailid,
            "subject": $scope.sender_subject,
            "msg":  $scope.sender_message
        }
        $req={
            "method": "POST",
            "url" : $scope.url,
            "data" : $scope.userdata,
            "headers": {'Content-Type': 'application/x-www-form-urlencoded'}
        }
        $http($req).success(function($data){
            alert($data);
        }).error(function($error){
            alert($error);
        });
    }
  }
}]);