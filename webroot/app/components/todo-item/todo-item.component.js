System.register(['@angular/core', '../../pipes/trim.pipe', './todo-item.template.html'], function(exports_1) {
    var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
        var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
        if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
        else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
        return c > 3 && r && Object.defineProperty(target, key, r), r;
    };
    var __metadata = (this && this.__metadata) || function (k, v) {
        if (typeof Reflect === "object" && typeof Reflect.metadata === "function") return Reflect.metadata(k, v);
    };
    var core_1, trim_pipe_1, todo_item_template_html_1;
    var TodoItemComponent;
    return {
        setters:[
            function (core_1_1) {
                core_1 = core_1_1;
            },
            function (trim_pipe_1_1) {
                trim_pipe_1 = trim_pipe_1_1;
            },
            function (todo_item_template_html_1_1) {
                todo_item_template_html_1 = todo_item_template_html_1_1;
            }],
        execute: function() {
            TodoItemComponent = (function () {
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
                    core_1.Input(), 
                    __metadata('design:type', Object)
                ], TodoItemComponent.prototype, "todo", void 0);
                __decorate([
                    core_1.Output(), 
                    __metadata('design:type', Object)
                ], TodoItemComponent.prototype, "itemModified", void 0);
                __decorate([
                    core_1.Output(), 
                    __metadata('design:type', Object)
                ], TodoItemComponent.prototype, "itemRemoved", void 0);
                TodoItemComponent = __decorate([
                    core_1.Component({
                        selector: 'todo-item',
                        template: todo_item_template_html_1.default,
                        pipes: [trim_pipe_1.TrimPipe]
                    }), 
                    __metadata('design:paramtypes', [])
                ], TodoItemComponent);
                return TodoItemComponent;
            })();
            exports_1("TodoItemComponent", TodoItemComponent);
        }
    }
});
//# sourceMappingURL=todo-item.component.js.map