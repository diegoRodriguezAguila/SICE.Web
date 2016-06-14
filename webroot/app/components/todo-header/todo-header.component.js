System.register(['@angular/core', '../../services/todo-store.service', './todo-header.template.html'], function(exports_1) {
    var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
        var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
        if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
        else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
        return c > 3 && r && Object.defineProperty(target, key, r), r;
    };
    var __metadata = (this && this.__metadata) || function (k, v) {
        if (typeof Reflect === "object" && typeof Reflect.metadata === "function") return Reflect.metadata(k, v);
    };
    var core_1, todo_store_service_1, todo_header_template_html_1;
    var TodoHeaderComponent;
    return {
        setters:[
            function (core_1_1) {
                core_1 = core_1_1;
            },
            function (todo_store_service_1_1) {
                todo_store_service_1 = todo_store_service_1_1;
            },
            function (todo_header_template_html_1_1) {
                todo_header_template_html_1 = todo_header_template_html_1_1;
            }],
        execute: function() {
            TodoHeaderComponent = (function () {
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
                        template: todo_header_template_html_1.default
                    }), 
                    __metadata('design:paramtypes', [todo_store_service_1.TodoStoreService])
                ], TodoHeaderComponent);
                return TodoHeaderComponent;
            })();
            exports_1("TodoHeaderComponent", TodoHeaderComponent);
        }
    }
});
//# sourceMappingURL=todo-header.component.js.map