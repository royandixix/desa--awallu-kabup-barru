(function () {
  'use strict';

  angular.module('todoApp', [])
    .service('TodoService', TodoService)
    .controller('TodoCtrl', TodoCtrl);

  // Simple service menyimpan di localStorage
  function TodoService($window) {
    var STORAGE_KEY = 'angularjs_todos_v1';

    this.load = function () {
      var raw = $window.localStorage.getItem(STORAGE_KEY);
      if (!raw) return [];
      try {
        return JSON.parse(raw);
      } catch (e) {
        return [];
      }
    };

    this.save = function (todos) {
      $window.localStorage.setItem(STORAGE_KEY, JSON.stringify(todos));
    };
  }

  function TodoCtrl($scope, TodoService) {
    var vm = this;
    vm.todos = TodoService.load();
    // memastikan properti yang diperlukan
    vm.todos = vm.todos.map(function (t) {
      t.created = t.created ? new Date(t.created) : new Date();
      return t;
    });

    vm.newText = '';
    vm.editing = false;
    vm.editingId = null;
    vm.hideCompleted = false;

    vm.addOrUpdate = function () {
      var text = (vm.newText || '').trim();
      if (!text) return;

      if (vm.editing) {
        var item = vm.todos.find(function (t) { return t.id === vm.editingId; });
        if (item) {
          item.text = text;
          item.updated = new Date();
        }
        vm.editing = false;
        vm.editingId = null;
      } else {
        var id = Date.now() + Math.floor(Math.random() * 1000);
        vm.todos.push({
          id: id,
          text: text,
          done: false,
          created: new Date()
        });
      }

      vm.newText = '';
      vm.save();
    };

    vm.edit = function (item) {
      vm.editing = true;
      vm.editingId = item.id;
      vm.newText = item.text;
      // fokus input: bisa ditambah dengan directive kalau mau auto-focus
    };

    vm.clearInput = function () {
      vm.newText = '';
      vm.editing = false;
      vm.editingId = null;
    };

    vm.remove = function (item) {
      var idx = vm.todos.indexOf(item);
      if (idx !== -1) vm.todos.splice(idx, 1);
      vm.save();
    };

    vm.save = function () {
      // convert dates to ISO for storage
      var copy = vm.todos.map(function (t) {
        return {
          id: t.id,
          text: t.text,
          done: !!t.done,
          created: t.created instanceof Date ? t.created.toISOString() : t.created,
          updated: t.updated ? (t.updated instanceof Date ? t.updated.toISOString() : t.updated) : null
        };
      });
      TodoService.save(copy);
    };

    vm.countDone = function () {
      return vm.todos.filter(function (t) { return t.done; }).length;
    };

    vm.filterFn = function (item) {
      if (vm.hideCompleted && item.done) return false;
      return true;
    };

    // save otomatis saat window unload (safety)
    window.addEventListener('beforeunload', function () {
      vm.save();
    });
  }

  // inject annotations (minification safe)
  TodoService.$inject = ['$window'];
  TodoCtrl.$inject = ['$scope', 'TodoService'];

})();
