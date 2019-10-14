import TodoList from "./components/TodoList";
import CreateTodo from "./components/CreateTodo";
new Vue({
    el: "#todo",
    components: { CreateTodo, TodoList },
    data: {
        todos: [],
        links: null,
        limit: 10
    },
    created() {
        this.getTodos("/todos");
    },
    computed: {
        loadedAll() {
            return this.links && !this.links.next;
        }
    },
    methods: {
        async getTodos(url) {
            try {
                const { data } = await this.$axios.get(url, {
                    params: { limit: this.limit }
                });
                this.todos = _.concat(this.todos, data.data);
                this.links = data.links;
            } catch (e) {}
        },
        async loadMore() {
            this.getTodos(this.links.next);
        },
        onTodoCreated(todo) {
            this.todos.push(todo);
        }
    }
});
