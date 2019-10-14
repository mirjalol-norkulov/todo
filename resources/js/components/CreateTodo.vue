<template>
    <div class="flex">
        <input
            type="text"
            placeholder="e.g. Meeting with Alex at 11:00 morning"
            class="rounded-l-full px-4 py-2 border border-r-0 border-gray-200 focus:outline-none flex-grow"
            v-model="task"
            @keyup.enter="create()"
        />
        <button
            class="flex items-center justify-center bg-red-500 text-white rounded-r-full px-4 py-2 border border-l-0 border-gray-200 focus:outline-none"
        >
            <i class="lni-plus"></i>
        </button>
    </div>
</template>

<script>
import DatePicker from "vue2-datepicker";

export default {
    name: "CreateTodo",
    components: { DatePicker },
    data() {
        return {
            task: ""
        };
    },
    methods: {
        async create() {
            if (!this.task) {
                return;
            }
            try {
                const { data } = await this.$axios.post(
                    "/todos",
                    _.pick(this.$data, ["task"])
                );

                this.$emit("create", data.data);
                this.task = "";
            } catch (e) {}
        }
    }
};
</script>
