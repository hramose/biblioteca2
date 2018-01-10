<style scoped>
    .action-link {
        cursor: pointer;
    }

    .m-b-none {
        margin-bottom: 0;
    }
</style>

<template>
    <div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <div style="display: flex; justify-content: space-between; align-items: center;">
                    <span>
                        OAuth Clients
                    </span>

                    <a class="action-link" @click="showCreateClientForm">
                        Create New Client
                    </a>
                </div>
            </div>

            <div class="panel-body">
                <!-- Current Clients -->
                <p class="m-b-none" v-if="clients.length === 0">
                    You have not created any OAuth clients.
                </p>

                <table class="table table-borderless m-b-none" v-if="clients.length > 0">
                    <thead>
                    <tr>
                        <th>Client ID</th>
                        <th>archivos_biblioteca_id</th>
                        <th>perfiles_biblioteca_id</th>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>

                    <tbody>
                    <tr v-for="client in clients">
                        <!-- ID -->
                        <td style="vertical-align: middle;">
                            {{ client.id }}
                        </td>

                        <!-- archivos_biblioteca_id -->
                        <td style="vertical-align: middle;">
                            {{ client.archivos_biblioteca_id }}
                        </td>

                        <!-- Secret -->
                        <td style="vertical-align: middle;">
                            <code>{{ client.perfiles_biblioteca_id }}</code>
                        </td>

                        <!-- Edit Button -->
                        <td style="vertical-align: middle;">
                            <a class="action-link" @click="edit(client)">
                                Edit
                            </a>
                        </td>

                        <!-- Delete Button -->
                        <td style="vertical-align: middle;">
                            <a class="action-link text-danger" @click="destroy(client)">
                                Delete
                            </a>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Create Client Modal -->
        <div class="modal fade" id="modal-create-client" tabindex="-1" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button " class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                        <h4 class="modal-title">
                            Create Client
                        </h4>
                    </div>

                    <div class="modal-body">
                        <!-- Form Errors -->
                        <div class="alert alert-danger" v-if="createForm.errors.length > 0">
                            <p><strong>Whoops!</strong> Something went wrong!</p>
                            <br>
                            <ul>
                                <li v-for="error in createForm.errors">
                                    {{ error }}
                                </li>
                            </ul>
                        </div>

                        <!-- Create Client Form -->
                        <form class="form-horizontal" role="form">
                            <!-- archivos_biblioteca_id -->
                            <div class="form-group">
                                <label class="col-md-3 control-label">---archivos_biblioteca_id---</label>

                                <div class="col-md-7">
                                    <input id="create-client-archivos_biblioteca_id" type="text" class="form-control"
                                           @keyup.enter="store" v-model="createForm.archivos_biblioteca_id">
                                    <span class="help-block">
                                        Something your users will recognize and trust.
                                    </span>
                                </div>
                            </div>

                            <!-- perfiles_biblioteca_id -->
                            <div class="form-group">
                                <label class="col-md-3 control-label">perfiles_biblioteca_id</label>

                                <div class="col-md-7">
                                    <input type="text" class="form-control" name="perfiles_biblioteca_id"
                                           @keyup.enter="store" v-model="createForm.perfiles_biblioteca_id">

                                    <span class="help-block">
                                        Your application's authorization callback URL.
                                    </span>
                                </div>
                            </div>
                        </form>
                    </div>

                    <!-- Modal Actions -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                        <button type="button" class="btn btn-primary" @click="store">
                            Create
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Edit Client Modal -->
        <div class="modal fade" id="modal-edit-client" tabindex="-1" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button " class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                        <h4 class="modal-title">
                            Edit Client
                        </h4>
                    </div>

                    <div class="modal-body">
                        <!-- Form Errors -->
                        <div class="alert alert-danger" v-if="editForm.errors.length > 0">
                            <p><strong>Whoops!</strong> Something went wrong!</p>
                            <br>
                            <ul>
                                <li v-for="error in editForm.errors">
                                    {{ error }}
                                </li>
                            </ul>
                        </div>

                        <!-- Edit Client Form -->
                        <form class="form-horizontal" role="form">
                            <!-- archivos_biblioteca_id -->
                            <div class="form-group">
                                <label class="col-md-3 control-label">archivos_biblioteca_id</label>

                                <div class="col-md-7">
                                    <input id="edit-client-archivos_biblioteca_id" type="text" class="form-control"
                                           @keyup.enter="update" v-model="editForm.archivos_biblioteca_id">

                                    <span class="help-block">
                                        Something your users will recognize and trust.
                                    </span>
                                </div>
                            </div>

                            <!-- perfiles_biblioteca_id -->
                            <div class="form-group">
                                <label class="col-md-3 control-label">perfiles_biblioteca_id </label>

                                <div class="col-md-7">
                                    <input type="text" class="form-control" name="perfiles_biblioteca_id"
                                           @keyup.enter="update" v-model="editForm.perfiles_biblioteca_id">

                                    <span class="help-block">
                                        Your application's authorization callback URL.
                                    </span>
                                </div>
                            </div>
                        </form>
                    </div>

                    <!-- Modal Actions -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                        <button type="button" class="btn btn-primary" @click="update">
                            Save Changes
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        /*
         * The component's data.
         */
        data() {
            return {
                clients: [],

                createForm: {
                    errors: [],
                    archivos_biblioteca_id: '',
                    perfiles_biblioteca_id: ''
                },

                editForm: {
                    errors: [],
                    archivos_biblioteca_id: '',
                    perfiles_biblioteca_id: ''
                }
            };
        },

        /**
         * Prepare the component (Vue 1.x).
         */
        ready() {
            this.prepareComponent();
        },

        /**
         * Prepare the component (Vue 2.x).
         */
        mounted() {
            this.prepareComponent();
        },

        methods: {
            /**
             * Prepare the component.
             */
            prepareComponent() {
                this.getClients();

                $('#modal-create-client').on('shown.bs.modal', () => {
                    $('#create-client-archivos_biblioteca_id').focus();
                });

                $('#modal-edit-client').on('shown.bs.modal', () => {
                    $('#edit-client-archivos_biblioteca_id').focus();
                });
            },

            /**
             * Get all of the OAuth clients for the user.
             */
            getClients() {
                this.$http.get('/api/perfiless_archivoss')
                        .then(response => {
                            this.clients = response.data;
                        });
            },

            /**
             * Show the form for creating new clients.
             */
            showCreateClientForm() {
                $('#modal-create-client').modal('show');
            },

            /**
             * Create a new OAuth client for the user.
             */
            store() {
                this.persistClient(
                    'post', '/api/perfiless_archivoss',
                    this.createForm, '#modal-create-client'
                );
            },

            /**
             * Edit the given client.
             */
            edit(client) {
                this.editForm.id = client.id;
                this.editForm.archivos_biblioteca_id = client.archivos_biblioteca_id;
                this.editForm.perfiles_biblioteca_id = client.perfiles_biblioteca_id;

                $('#modal-edit-client').modal('show');
            },

            /**
             * Update the client being edited.
             */
            update() {
                this.persistClient(
                    'put', '/api/perfiless_archivoss/' + this.editForm.id,
                    this.editForm, '#modal-edit-client'
                );
            },

            /**
             * Persist the client to storage using the given form.
             */
            persistClient(method, uri, form, modal) {
                form.errors = [];

                this.$http[method](uri, form)
                    .then(response => {
                        this.getClients();

                        form.archivos_biblioteca_id = '';
                        form.perfiles_biblioteca_id = '';
                        form.errors = [];

                        $(modal).modal('hide');
                    })
                    .catch(response => {
                        if (typeof response.data === 'object') {
                            form.errors = _.flatten(_.toArray(response.data));
                        } else {
                            form.errors = ['Something went wrong. Please try again.'];
                        }
                    });
            },

            /**
             * Destroy the given client.
             */
            destroy(client) {
                this.$http.delete('/api/perfiless_archivoss/' + client.id)
                        .then(response => {
                            this.getClients();
                        });
            }
        }
    }
</script>
