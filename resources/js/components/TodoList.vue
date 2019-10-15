<template>
    <draggable :list="todos" @change="onSortOrderChange">
        <todo
            class="mb-5"
            v-for="todo in todos"
            :todo="todo"
            :key="'todo_' + todo.id + todo.updated_at"
            @update="onTodoUpdate"
            @delete="onTodoDelete"
        />
    </draggable>
</template>

<script>
import draggable from "vuedraggable";
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
        },
        onSortOrderChange(event) {
            this.$axios.put("/todos/reorder", {
                ids: this.todos.map(todo => todo.id)
            });
        }
    }
};
</script>

<style scoped></style>
