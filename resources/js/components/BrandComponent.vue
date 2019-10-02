<template>
    <div class="container">
        <div class="row">
            <!-- /.card -->
            <div class="card">
                <div class="card-header">
                    <h3 class=" text-center">Brand Information</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        <div class="row"><div class="col-sm-12 col-md-6">
                            <div class="dataTables_length" id="example1_length">
                                <label>Show entries <select name="example1_length" aria-controls="example1" class="custom-select custom-select-sm form-control form-control-sm">
                                    <option value="10">10</option>
                                    <option value="25">25</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                </select> </label>
                            </div>
                        </div>
                            <div class="col-sm-12 col-md-6">
                                <div id="example1_filter" class="dataTables_filter">
                                    <label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="example1">
                                    </label>
                                    <button class="btn btn-primary ml-md-5" data-toggle="modal" data-target="#addNew" >Add New <i class="fas fa-plus"></i></button>
                                </div></div></div><div class="row"><div class="col-sm-12">
                        <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                            <thead>
                            <tr role="row">
                                <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 203.4px;">
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 262.6px;">
                                    Browser</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 233px;">
                                    Platform(s)</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 174.6px;">
                                    Engine version</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 123.6px;">
                                    CSS grade</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr role="row" class="odd">
                                <td class="sorting_1">Gecko</td>
                                <td>Firefox 1.0</td>
                                <td>Win 98+ / OSX.2+</td>
                                <td>1.7</td>
                                <td>A</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    </div>

                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>

        <!-- Modal -->
        <div class="modal fade" id="addNew" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Add Category</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <!--<form @submit.prevent="createCategory">-->
                        <!--<div class="modal-body">-->
                            <!--<div class="form-group">-->
                                <!--<input v-model="form.category_name" id="category_name" type="text" name="category_name"-->
                                       <!--class="form-control" placeholder="Category Name"-->
                                       <!--:class="{ 'is-invalid': form.errors.has('category_name') }">-->
                                <!--<has-error :form="form" field="category_name"></has-error>-->
                            <!--</div>-->
                            <!--<div class="form-group">-->
                            <!--<textarea v-model="form.category_description" type="text" id="category_description" name="category_description"-->
                                      <!--class="form-control" placeholder="Category Description"-->
                                      <!--:class="{ 'is-invalid': form.errors.has('category_description') }"></textarea>-->
                                <!--<has-error :form="form" field="category_description"></has-error>-->
                            <!--</div>-->
                            <!--<div class="form-group">-->
                                <!--<select  name="publication_status"  id="publication_status" v-model="form.publication_status" class="form-control"-->
                                         <!--:class="{ 'is-invalid': form.errors.has('publication_status') }">-->
                                    <!--<option value="">Select Publication Status</option>-->
                                    <!--<option value="1">Published</option>-->
                                    <!--<option value="0">Unpublished</option>-->
                                <!--</select>-->
                                <!--<has-error :form="form" field="publication_status"></has-error>-->
                            <!--</div>-->
                        <!--</div>-->
                        <!--<div class="modal-footer">-->
                            <!--<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>-->
                            <!--<button type="submit"   class="btn btn-primary">Save changes</button>-->
                        <!--</div>-->
                    <!--</form>-->


                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
