angular.module('bzSwitcher', [])
    .directive('bzSwitcher', ['$parse', function($parse) {
    return {
        restrict: 'A',
        require: 'ngModel',
        link: function(scope, element, attrs, ngModel) {
            var callback = $parse(attrs.bzSwitcher);

            var onChange = function() {
                ngModel.$setViewValue(checkbox.bootstrapSwitch('status'));
                callback(scope);
            };
            var checkbox = $(element).wrap('<div class=""></div>').parent().bootstrapSwitch();
            ngModel.$render = function(value) {
                checkbox.unbind('change');
                checkbox.bootstrapSwitch('setState', value);
                checkbox.change(onChange);
            }
            scope.$watch(attrs.ngModel, ngModel.$render);
            checkbox.change(onChange);
        }
    };
}]);