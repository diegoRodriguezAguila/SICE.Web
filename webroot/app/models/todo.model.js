System.register(['node-uuid'], function(exports_1) {
    var uuid;
    var TodoModel;
    return {
        setters:[
            function (uuid_1) {
                uuid = uuid_1;
            }],
        execute: function() {
            TodoModel = (function () {
                function TodoModel(title) {
                    this.uid = uuid.v4();
                    this.completed = false;
                    this.title = title.trim();
                }
                TodoModel.prototype.setTitle = function (title) {
                    this.title = title.trim();
                };
                return TodoModel;
            })();
            exports_1("TodoModel", TodoModel);
        }
    }
});
//# sourceMappingURL=todo.model.js.map