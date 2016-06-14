System.register(['@angular/core', '@angular/router', '../../services/todo-store.service', './todo-list.template.html', '../todo-header/todo-header.component', '../todo-footer/todo-footer.component', '../todo-item/todo-item.component'], function(exports_1) {
    var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
        var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
        if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
        else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
        return c > 3 && r && Object.defineProperty(target, key, r), r;
    };
    var __metadata = (this && this.__metadata) || function (k, v) {
        if (typeof Reflect === "object" && typeof Reflect.metadata === "function") return Reflect.metadata(k, v);
    };
    var core_1, router_1, todo_store_service_1, todo_list_template_html_1, todo_header_component_1, todo_footer_component_1, todo_item_component_1;
    var TodoComponent;
    return {
        setters:[
            function (core_1_1) {
                core_1 = core_1_1;
            },
            function (router_1_1) {
                router_1 = router_1_1;
            },
            function (todo_store_service_1_1) {
                todo_store_service_1 = todo_store_service_1_1;
            },
            function (todo_list_template_html_1_1) {
                todo_list_template_html_1 = todo_list_template_html_1_1;
            },
            function (todo_header_component_1_1) {
                todo_header_component_1 = todo_header_component_1_1;
            },
            function (todo_footer_component_1_1) {
                todo_footer_component_1 = todo_footer_component_1_1;
            },
            function (todo_item_component_1_1) {
                todo_item_component_1 = todo_item_component_1_1;
            }],
        execute: function() {
            TodoComponent = (function () {
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
                        template: todo_list_template_html_1.default,
                        directives: [todo_header_component_1.TodoHeaderComponent, todo_footer_component_1.TodoFooterComponent, todo_item_component_1.TodoItemComponent]
                    }), 
                    __metadata('design:paramtypes', [todo_store_service_1.TodoStoreService, router_1.RouteSegment])
                ], TodoComponent);
                return TodoComponent;
            })();
            exports_1("TodoComponent", TodoComponent);
        }
    }
});
//# sourceMappingURL=todo-list.component.js.map