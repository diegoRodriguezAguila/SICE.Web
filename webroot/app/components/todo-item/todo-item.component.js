var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};
var core_1 = require('@angular/core');
var trim_pipe_1 = require('../../pipes/trim.pipe');
var todo_item_template_html_1 = require('./todo-item.template.html');
var TodoItemComponent = (function () {
    function TodoItemComponent() {
        this.itemModified = new core_1.EventEmitter();
        this.itemRemoved = new core_1.EventEmitter();
        this.editing = false;
    }
    TodoItemComponent.prototype.cancelEditing = function () {
        this.editing = false;
    };
    TodoItemComponent.prototype.stopEditing = function (editedTitle) {
        this.todo.setTitle(editedTitle.value);
        this.editing = false;
        if (this.todo.title.length === 0) {
            this.remove();
        }
        else {
            this.update();
        }
    };
    TodoItemComponent.prototype.edit = function () {
        this.editing = true;
    };
    TodoItemComponent.prototype.toggleCompletion = function () {
        this.todo.completed = !this.todo.completed;
        this.update();
    };
    TodoItemComponent.prototype.remove = function () {
        this.itemRemoved.next(this.todo.uid);
    };
    TodoItemComponent.prototype.update = function () {
        this.itemModified.next(this.todo.uid);
    };
    __decorate([
        core_1.Input()
    ], TodoItemComponent.prototype, "todo");
    __decorate([
        core_1.Output()
    ], TodoItemComponent.prototype, "itemModified");
    __decorate([
        core_1.Output()
    ], TodoItemComponent.prototype, "itemRemoved");
    TodoItemComponent = __decorate([
        core_1.Component({
            selector: 'todo-item',
            template: todo_item_template_html_1["default"],
            pipes: [trim_pipe_1.TrimPipe]
        })
    ], TodoItemComponent);
    return TodoItemComponent;
})();
exports.TodoItemComponent = TodoItemComponent;
//# sourceMappingURL=todo-item.component.js.map