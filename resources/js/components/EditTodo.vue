<template>
    <modal @close="$emit('close')">
        <div slot="header" class="flex items-center justify-between">
            <span>Edit todo</span>
            <button
                class="bg-red-500 text-white py-1 px-3 rounded text-sm"
                @click="save"
            >
                <i class="lni-save"></i>
            </button>
        </div>
        <div slot="body">
            <div class="flex">
                <div class="flex-grow">
                    <input
                        type="text"
                        class="py-1 w-full px-3 border rounded border-gray-300 focus:outline-none"
                        v-model="editingTodo.task"
                    />
                </div>
                <div class="ml-2">
                    <date-picker
                        lang="en"
                        class="border focus:outline-none"
                        v-model="editingTodo.due_date"
                    ></date-picker>
                </div>
            </div>
            <div>
                <div class="border-t border-gray-200 py-2 px-5">
                    <div class="font-medium">Sub tasks</div>
                    <input
                        v-model="subTask"
                        type="text"
                        class="text-sm w-full py-1 px-3 my-2 focus:outline-none"
                        placeholder="Add new sub task"
                        @keyup.enter="addSubTask"
                    />
                    <ul>
                        <li v-for="(subTask, index) in editingTodo.sub_tasks">
                            <label
                                class="flex items-center"
                                :for="'subTask' + index"
                            >
                                <input
                                    :id="'subTask' + index"
                                    type="checkbox"
                                    v-model="subTask.done"
                                    class="mr-2"
                                />
                                <span :class="{ 'line-through': subTask.done }">
                                    {{ subTask.task }}
                                </span>
                                <button
                                    class="text-xxs focus:outline-none mx-1 flex items-center"
                                    @click="deleteSubTask(subTask)"
                                >
                                    <i class="lni-close"></i>
                                </button>
                            </label>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </modal>
</template>

<script>
import DatePicker from "vue2-datepicker";
import Modal from "./Modal";
export default {
    name: "EditTodo",
    components: { Modal, DatePicker },
    props: {
        todo: {
            type: Object,
            required: true
        }
    },
    data() {
        return {
            editingTodo: this.todo,
            subTask: ""
        };
    },
    methods: {
        async save() {
            await this.update(_.cloneDeep(this.editingTodo));
            this.$emit("close");
        },
        async update(todo) {
            const { data } = await this.$axios.put(
                `/todos/${this.editingTodo.id}`,
                todo
            );
            this.$emit("update", data.data);
        },
        async addSubTask() {
            const subTask = {
                task: this.subTask,
                done: false
            };

            if (!this.editingTodo.sub_tasks) {
                this.editingTodo.sub_tasks = [];
            }

            this.editingTodo.sub_tasks.push(subTask);
            this.subTask = "";
        },
        async deleteSubTask(subTask) {
            const index = _.findIndex(this.editingTodo.sub_tasks, subTask);
            this.editingTodo.sub_tasks.splice(index, 1);
        }
    }
};
</script>

<style scoped></style>
