<template>
    <div class="notes">
        <div v-for="(note, index) in notes" class="task-note" v-show="showNote">
            <p><strong>{{ note.created_at }}</strong>
                <button class="button is-outlined is-danger is-small" @click="removeNote(index, note.id)">
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
            taskId: '',
        },

        data() {
            return {
                notes: [],
                body: '',
                showNote: true
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

            removeNote(index, id) {
                var deletionStatus;
                var self = this;
                swal({
                  title: "Are you sure?",
                  text: "You will not be able to recover this note",
                  type: "warning",
                  showCancelButton: true,
                  confirmButtonColor: "#DD6B55",
                  confirmButtonText: "Yes, delete it!",
                  cancelButtonText: "No, abort!",
                  closeOnConfirm: false,
                  closeOnCancel: false
                },
                function(isConfirm){
                  if (isConfirm) {
                    axios.delete('/note/' + id, {})
                    .then(response => {
                        if(response.data == 'Success'){
                            self.notes.splice(index, 1);
                        }else{
                            alert("There was a problem deleting this task. Please let Daron know.");
                        }
                    });
                    swal("Deleted!", "The note is gone forever.", "success");
                  } else {
                    swal("Cancelled", "Your note is safe :)", "error");
                  }
                });
            }
        },

        mounted() {
            axios.get('/task/' + this.id + '/notes/').then(response => this.notes = response.data);
        }

    }
</script>
