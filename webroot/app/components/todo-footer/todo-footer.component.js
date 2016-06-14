System.register(['@angular/core', '@angular/router', '../../services/todo-store.service', './todo-footer.template.html'], function(exports_1) {
    var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
        var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
        if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
        else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
        return c > 3 && r && Object.defineProperty(target, key, r), r;
    };
    var __metadata = (this && this.__metadata) || function (k, v) {
        if (typeof Reflect === "object" && typeof Reflect.metadata === "function") return Reflect.metadata(k, v);
    };
    var core_1, router_1, todo_store_service_1, todo_footer_template_html_1;
    var TodoFooterComponent;
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
            function (todo_footer_template_html_1_1) {
                todo_footer_template_html_1 = todo_footer_template_html_1_1;
            }],
        execute: function() {
            TodoFooterComponent = (function () {
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
                        template: todo_footer_template_html_1.default,
                        directives: [router_1.ROUTER_DIRECTIVES]
                    }), 
                    __metadata('design:paramtypes', [todo_store_service_1.TodoStoreService, router_1.RouteSegment])
                ], TodoFooterComponent);
                return TodoFooterComponent;
            })();
            exports_1("TodoFooterComponent", TodoFooterComponent);
        }
    }
});
//# sourceMappingURL=todo-footer.component.js.map