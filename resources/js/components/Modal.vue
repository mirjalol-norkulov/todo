<template>
    <transition name="modal">
        <div class="modal-mask">
            <div class="modal-wrapper">
                <div
                    class="modal-container relative bg-white rounded w-1/2 shadow-md mx-auto"
                >
                    <button
                        class="close-btn focus:outline-none bg-red-500 text-white text-xxs h-8 w-8 rounded-full"
                        @click="$emit('close')"
                    >
                        <i class="lni-close"></i>
                    </button>

                    <div class="border-b border-gray-300 p-5">
                        <slot name="header"></slot>
                    </div>

                    <div class="modal-body border-b border-gray-300 p-5">
                        <slot name="body"></slot>
                    </div>
                </div>
            </div>
        </div>
    </transition>
</template>

<script>
export default {
    name: "Modal"
};
</script>

<style scoped>
.modal-mask {
    position: fixed;
    z-index: 9998;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
    display: table;
    transition: opacity 0.3s ease;
}

.modal-wrapper {
    display: table-cell;
    vertical-align: middle;
}

.modal-container {
    transition: all 0.3s ease;
}

.close-btn {
    position: absolute;
    top: 0;
    right: 0;
    transform: translate(50%, -50%);
}

.modal-enter {
    opacity: 0;
}

.modal-leave-active {
    opacity: 0;
}

.modal-enter .modal-container,
.modal-leave-active .modal-container {
    -webkit-transform: scale(1.1);
    transform: scale(1.1);
}
</style>
