<template>
    <div class="notes">
        <div v-for="note in notes" class="task-note">
            <p><strong>{{ note.created_at }}</strong>
                <button class="button is-outlined is-danger is-small">
                    <span class="icon"><i class="fa fa-trash"></i></span>
                </button>
            </p>
            <p v-text="note.body"></p>
            <hr>
        </div>
        <form action="/note" method="post" @submit.prevent>
            <div class="field">
                <slot></slot>
                <textarea class="textarea" rows="3" name="body" placeholder="Add a note to this task" v-model="body" ></textarea>
            </div>
            <div class="field">
                <button class="button is-info" @click="addNote">
                    Add Note
                </button>
            </div>
        </form>
    </div>
</template>

<script>
    export default {

        props: {
            userId: '',
            clientId: '',
            taskId: ''
        },

        data() {
            return {
                notes: [],
                body: ''
            }
        },

        computed: {
            id() {
                return this.$parent.getTaskId();
            }
        },

        methods: {
            addNote() {
                axios.post('/note', {
                    user_id: this.userId,
                    client_id: this.clientId,
                    task_id: this.taskId,
                    body: this.body
                })
                    .then(response => {
                        this.notes.push(response.data),
                            this.body = ''
                    })
            },

        },

        mounted() {
            axios.get('/task/' + this.id + '/notes/').then(response => this.notes = response.data);
            // console.log(this);
        }

    }
</script>