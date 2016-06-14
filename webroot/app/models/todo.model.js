var uuid = require('node-uuid');
var TodoModel = (function () {
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
exports.TodoModel = TodoModel;
//# sourceMappingURL=todo.model.js.map