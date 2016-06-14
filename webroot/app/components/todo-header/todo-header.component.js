var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};
var core_1 = require('@angular/core');
var todo_header_template_html_1 = require('./todo-header.template.html');
var TodoHeaderComponent = (function () {
    function TodoHeaderComponent(todoStore) {
        this.newTodo = '';
        this._todoStore = todoStore;
    }
    TodoHeaderComponent.prototype.addTodo = function () {
        if (this.newTodo.trim().length) {
            this._todoStore.add(this.newTodo);
            this.newTodo = '';
        }
    };
    TodoHeaderComponent = __decorate([
        core_1.Component({
            selector: 'todo-header',
            template: todo_header_template_html_1["default"]
        })
    ], TodoHeaderComponent);
    return TodoHeaderComponent;
})();
exports.TodoHeaderComponent = TodoHeaderComponent;
//# sourceMappingURL=todo-header.component.js.map