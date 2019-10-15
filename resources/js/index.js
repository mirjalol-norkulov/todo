import TodoList from "./components/TodoList";
import CreateTodo from "./components/CreateTodo";
import Profile from "./components/Profile";
new Vue({
    el: "#todo",
    components: { CreateTodo, TodoList, Profile },
    data: {
        user: null,
        todos: [],
        links: null,
        limit: 10
    },
    created() {
        this.getUser();
        this.getTodos("/todos");
    },
    computed: {
        loadedAll() {
            return this.links && !this.links.next;
        }
    },
    methods: {
        async getUser() {
            try {
                const { data } = await this.$axios.get("/user");
                this.user = data.data;
            } catch (e) {
                alert(e.message);
            }
        },
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
