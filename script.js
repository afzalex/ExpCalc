angular.module('expcalc', ['angular-chosen'])
    .controller('expcalcctrl', ['$http', function($http){
        var vm = this;
        vm.monshrt = ['jan', 'feb', 'mar', 'apr', 'may', 'jun', 'jul', 'aug', 
            'sep', 'oct', 'nov', 'dec']
        vm.monfull = ['January', 'February', 'March', 'April', 'May', 'June', 
            'July', 'August', 'September', 'October', 'November', 'December'];
        vm.selval = '1';
//        vm.expDebug = true;
        $http.get('getdata.php').then(function(res){
            vm.data = res.data;
            vm.data.months.sort(function(m1, m2){
                console.log(m2);
                return vm.monshrt.indexOf(m1.dirname) - vm.monshrt.indexOf(m2.dirname);
            });
            vm.data.months.forEach(function(m){
                m.candidates.forEach(function(c){
                    c.entries.sort();
                });
            });
            var currMonthShrt = vm.monshrt[new Date().getMonth()];
            for(var k in vm.data.months){
                var month = vm.data.months[k];
                if(currMonthShrt === month.dirname){
                    vm.selectedmonth = month;
                }
            }
            
        });
    }]
);