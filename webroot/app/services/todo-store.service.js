var localStorage_1 = require('localStorage');
var todo_model_1 = require('../models/todo.model');
var TodoStoreService = (function () {
    function TodoStoreService() {
        this.todos = [];
        var persistedTodos = JSON.parse(localStorage_1["default"].getItem('angular2-todos')) || [];
        this.todos = persistedTodos.map(function (todo) {
            var ret = new todo_model_1.TodoModel(todo.title);
            ret.completed = todo.completed;
            ret.uid = todo.uid;
            return ret;
        });
    }
    TodoStoreService.prototype.get = function (state) {
        return this.todos.filter(function (todo) { return todo.completed === state.completed; });
    };
    TodoStoreService.prototype.allCompleted = function () {
        return this.todos.length === this.getCompleted().length;
    };
    TodoStoreService.prototype.setAllTo = function (completed) {
        this.todos.forEach(function (todo) { return todo.completed = completed; });
        this.persist();
    };
    TodoStoreService.prototype.removeCompleted = function () {
        this.todos = this.get({ completed: false });
        this.persist();
    };
    TodoStoreService.prototype.getRemaining = function () {
        if (!this.remainingTodos) {
            this.remainingTodos = this.get({ completed: false });
        }
        return this.remainingTodos;
    };
    TodoStoreService.prototype.getCompleted = function () {
        if (!this.completedTodos) {
            this.completedTodos = this.get({ completed: true });
        }
        return this.completedTodos;
    };
    TodoStoreService.prototype.toggleCompletion = function (uid) {
        var todo = this._findByUid(uid);
        if (todo) {
            todo.completed = !todo.completed;
            this.persist();
        }
    };
    TodoStoreService.prototype.remove = function (uid) {
        var todo = this._findByUid(uid);
        if (todo) {
            this.todos.splice(this.todos.indexOf(todo), 1);
            this.persist();
        }
    };
    TodoStoreService.prototype.add = function (title) {
        this.todos.push(new todo_model_1.TodoModel(title));
        this.persist();
    };
    TodoStoreService.prototype.persist = function () {
        this._clearCache();
        localStorage_1["default"].setItem('angular2-todos', JSON.stringify(this.todos));
    };
    TodoStoreService.prototype._findByUid = function (uid) {
        return this.todos.find(function (todo) { return todo.uid == uid; });
    };
    TodoStoreService.prototype._clearCache = function () {
        this.completedTodos = null;
        this.remainingTodos = null;
    };
    return TodoStoreService;
})();
exports.TodoStoreService = TodoStoreService;
//# sourceMappingURL=todo-store.service.js.map