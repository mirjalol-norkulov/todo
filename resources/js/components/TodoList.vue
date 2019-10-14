<template>
    <div>
        <todo
            class="mb-5"
            v-for="todo in todos"
            :todo="todo"
            :key="'todo_' + todo.id + todo.updated_at"
            @update="onTodoUpdate"
            @delete="onTodoDelete"
        />
    </div>
</template>

<script>
import Todo from "./Todo";
export default {
    name: "TodoList",
    components: { Todo },
    props: {
        todos: {
            type: Array,
            required: true
        }
    },
    methods: {
        onTodoUpdate(todo) {
            const index = _.findIndex(
                this.todos,
                todoItem => todoItem.id === todo.id
            );
            if (todo.done) {
                this.todos.splice(index, 1);
                return;
            }
            Vue.set(this.todos, index, todo);
        },
        onTodoDelete(todo) {
            const index = _.findIndex(this.todos, todo);
            this.todos.splice(index, 1);
        }
    }
};
</script>

<style scoped></style>
