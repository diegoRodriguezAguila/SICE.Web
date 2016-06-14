System.register(['@angular/platform-browser-dynamic', '@angular/router', './services/todo-store.service', './components/app/app.component'], function(exports_1) {
    var platform_browser_dynamic_1, router_1, todo_store_service_1, app_component_1;
    return {
        setters:[
            function (platform_browser_dynamic_1_1) {
                platform_browser_dynamic_1 = platform_browser_dynamic_1_1;
            },
            function (router_1_1) {
                router_1 = router_1_1;
            },
            function (todo_store_service_1_1) {
                todo_store_service_1 = todo_store_service_1_1;
            },
            function (app_component_1_1) {
                app_component_1 = app_component_1_1;
            }],
        execute: function() {
            platform_browser_dynamic_1.bootstrap(app_component_1.AppComponent, [
                todo_store_service_1.TodoStoreService,
                router_1.ROUTER_PROVIDERS,
                { provide: 'AUTHOR', useValue: 'Soós Gábor' }
            ]);
        }
    }
});
//# sourceMappingURL=main.js.map