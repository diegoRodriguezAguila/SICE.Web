var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};
var core_1 = require('@angular/core');
var router_1 = require('@angular/router');
var todo_footer_template_html_1 = require('./todo-footer.template.html');
var TodoFooterComponent = (function () {
    function TodoFooterComponent(todoStore, route) {
        this._todoStore = todoStore;
        this._route = route;
    }
    TodoFooterComponent.prototype.removeCompleted = function () {
        this._todoStore.removeCompleted();
    };
    TodoFooterComponent.prototype.getCount = function () {
        return this._todoStore.todos.length;
    };
    TodoFooterComponent.prototype.getRemainingCount = function () {
        return this._todoStore.getRemaining().length;
    };
    TodoFooterComponent.prototype.hasCompleted = function () {
        return this._todoStore.getCompleted().length > 0;
    };
    TodoFooterComponent.prototype.getStatus = function () {
        return this._route.parameters.status || '';
    };
    TodoFooterComponent = __decorate([
        core_1.Component({
            selector: 'todo-footer',
            template: todo_footer_template_html_1["default"],
            directives: [router_1.ROUTER_DIRECTIVES]
        })
    ], TodoFooterComponent);
    return TodoFooterComponent;
})();
exports.TodoFooterComponent = TodoFooterComponent;
//# sourceMappingURL=todo-footer.component.js.map