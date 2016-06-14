var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};
var core_1 = require('@angular/core');
var todo_list_template_html_1 = require('./todo-list.template.html');
var todo_header_component_1 = require('../todo-header/todo-header.component');
var todo_footer_component_1 = require('../todo-footer/todo-footer.component');
var todo_item_component_1 = require('../todo-item/todo-item.component');
var TodoComponent = (function () {
    function TodoComponent(todoStore, route) {
        this._todoStore = todoStore;
        this._route = route;
    }
    TodoComponent.prototype.remove = function (uid) {
        this._todoStore.remove(uid);
    };
    TodoComponent.prototype.update = function () {
        this._todoStore.persist();
    };
    TodoComponent.prototype.getTodos = function () {
        var currentStatus = this._route.parameters.status || '';
        if (currentStatus == 'completed') {
            return this._todoStore.getCompleted();
        }
        else if (currentStatus == 'active') {
            return this._todoStore.getRemaining();
        }
        else {
            return this._todoStore.todos;
        }
    };
    TodoComponent.prototype.allCompleted = function () {
        return this._todoStore.allCompleted();
    };
    TodoComponent.prototype.setAllTo = function (toggleAll) {
        this._todoStore.setAllTo(toggleAll.checked);
    };
    TodoComponent = __decorate([
        core_1.Component({
            selector: 'todo-list',
            template: todo_list_template_html_1["default"],
            directives: [todo_header_component_1.TodoHeaderComponent, todo_footer_component_1.TodoFooterComponent, todo_item_component_1.TodoItemComponent]
        })
    ], TodoComponent);
    return TodoComponent;
})();
exports.TodoComponent = TodoComponent;
//# sourceMappingURL=todo-list.component.js.map