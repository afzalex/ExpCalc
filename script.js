angular.module('expcalc', [])
    .controller('expcalcctrl', ['$http', function($http){
        var vm = this;
        vm.message = 'I am message';
        $http.get('getdata.php').then(function(res){
            vm.data = res.data;
        })
    }]
);