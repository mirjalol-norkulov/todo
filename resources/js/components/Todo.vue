<template>
    <div class="shadow-lg bg-white relative card">
        <button
            class="delete-button focus:outline-none bg-orange-500 text-xxs text-white h-8 w-8 rounded-full"
            @click="deleteTodo"
        >
            <i class="lni-close"></i>
        </button>
        <div class="flex rounded p-5 items-center">
            <div class="flex items-center flex-grow">
                <div class="flex-grow">{{ todo.task }}</div>
                <div class="text-xs bg-gray-200 rounded-full p-2">
                    {{
                        $moment(todo.due_date).format(
                            "dddd, MMMM Do YYYY, h:mm:ss a"
                        )
                    }}
                </div>
                <button
                    class="focus:outline-none ml-2"
                    @click="editTodoVisible = true"
                    title="Edit todo"
                >
                    <i class="lni-pencil"></i>
                </button>
                <button
                    class="focus:outline-none ml-2 text-green-500"
                    @click="setTodoDone"
                    title="Done"
                >
                    <i class="lni-check-mark-circle"></i>
                </button>
            </div>
        </div>
        <edit-todo
            :todo="editingTodo"
            v-if="editTodoVisible"
            @update="onTodoUpdate"
            @close="editTodoVisible = false"
        ></edit-todo>
    </div>
</template>

<script>
import CheckBox from "./CheckBox";
import EditTodo from "./EditTodo";
export default {
    name: "Todo",
    props: {
        todo: {
            type: Object,
            required: true
        }
    },
    data() {
        return {
            subTask: "",
            editTodoVisible: false
        };
    },
    computed: {
        editingTodo() {
            return _.cloneDeep(this.todo);
        }
    },
    components: { CheckBox, EditTodo },
    methods: {
        async setTodoDone() {
            await this.update({ done: true });
        },
        async deleteTodo() {
            await this.$axios.delete(`/todos/${this.todo.id}`);
            this.$emit("delete", this.todo);
        },
        onTodoUpdate(todo) {
            this.$emit("update", todo);
        },
        async update(todo) {
            const { data } = await this.$axios.put(
                `/todos/${this.todo.id}`,
                todo
            );
            this.$emit("update", data.data);
        }
    }
};
</script>

<style>
.text-xxs {
    font-size: 0.5rem;
}
.delete-button {
    position: absolute;
    right: 0;
    top: 0;
    transform: translate(50%, -50%) scale(0);
    transition: transform 0.2s;
}

.card:hover .delete-button {
    transform: translate(50%, -50%) scale(1);
}
</style>
