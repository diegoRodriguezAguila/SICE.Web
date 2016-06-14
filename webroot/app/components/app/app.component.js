var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};
var __param = (this && this.__param) || function (paramIndex, decorator) {
    return function (target, key) { decorator(target, key, paramIndex); }
};
var core_1 = require('@angular/core');
var router_1 = require('@angular/router');
var app_template_html_1 = require('./app.template.html');
var todo_list_component_1 = require('../todo-list/todo-list.component');
var AppComponent = (function () {
    function AppComponent(author) {
        this.author = author;
    }
    AppComponent = __decorate([
        core_1.Component({
            selector: 'todo-app',
            directives: [router_1.ROUTER_DIRECTIVES],
            template: app_template_html_1["default"]
        }),
        router_1.Routes([
            { path: '/', component: todo_list_component_1.TodoComponent },
            { path: '/status/:status', component: todo_list_component_1.TodoComponent }
        ]),
        __param(0, core_1.Inject('AUTHOR'))
    ], AppComponent);
    return AppComponent;
})();
exports.AppComponent = AppComponent;
//# sourceMappingURL=app.component.js.map