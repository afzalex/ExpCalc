angular.module('expcalc', ['angular-chosen'])
    .controller('expcalcctrl', ['$http', function($http){
        var vm = this;
        vm.monshrt = ['jan', 'feb', 'mar', 'apr', 'may', 'jun', 'jul', 'aug', 
            'sep', 'oct', 'nov', 'dec']
        vm.monfull = ['January', 'February', 'March', 'April', 'May', 'June', 
            'July', 'August', 'September', 'October', 'November', 'December'];
        vm.selval = '1';
        $http.get('getdata.php').then(function(res){
            vm.data = res.data;
        });
    }]
);