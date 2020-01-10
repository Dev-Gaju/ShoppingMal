<template>
  <div class="container">
    <div class="row">
      <!-- /.card -->
      <div class="card">
        <div class="card-header">
          <h3 class="text-center">Brand Information</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
            <div class="row">
              <div class="col-sm-12 col-md-6">
                <div class="dataTables_length" id="example1_length">
                  <label>
                    Show entries
                    <select
                      name="example1_length"
                      aria-controls="example1"
                      class="custom-select custom-select-sm form-control form-control-sm"
                    >
                      <option value="10">10</option>
                      <option value="25">25</option>
                      <option value="50">50</option>
                      <option value="100">100</option>
                    </select>
                  </label>
                </div>
              </div>
              <div class="col-sm-12 col-md-6">
                <div id="example1_filter" class="dataTables_filter">
                  <label>
                    Search:
                    <input
                      type="search"
                      @keyup="SearchHit"
                      v-model="search"
                      class="form-control form-control-sm"
                      placeholder
                      aria-controls="example1"
                    />
                  </label>
                  <button class="btn btn-primary ml-md-5" @click="createNew">
                    Add New
                    <i class="fas fa-plus"></i>
                  </button>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12">
                <table
                  id="example1"
                  class="table table-bordered table-striped dataTable"
                  role="grid"
                  aria-describedby="example1_info"
                >
                  <thead>
                    <tr role="row">
                      <th
                        class="sorting_asc"
                        tabindex="0"
                        aria-controls="example1"
                        rowspan="1"
                        colspan="1"
                        aria-sort="ascending"
                        aria-label="Rendering engine: activate to sort column descending"
                        style="width: 203.4px;"
                      >Brand Name</th>
                      <th
                        class="sorting"
                        tabindex="0"
                        aria-controls="example1"
                        rowspan="1"
                        colspan="1"
                        aria-label="Browser: activate to sort column ascending"
                        style="width: 262.6px;"
                      >Brand Description</th>
                      <th
                        class="sorting"
                        tabindex="0"
                        aria-controls="example1"
                        rowspan="1"
                        colspan="1"
                        aria-label="Browser: activate to sort column ascending"
                        style="width: 262.6px;"
                      >Created Date</th>
                      <th
                        class="sorting"
                        tabindex="0"
                        aria-controls="example1"
                        rowspan="1"
                        colspan="1"
                        aria-label="Platform(s): activate to sort column ascending"
                        style="width: 233px;"
                      >Publication Status</th>
                      <th
                        class="sorting"
                        tabindex="0"
                        aria-controls="example1"
                        rowspan="1"
                        colspan="1"
                        aria-label="Engine version: activate to sort column ascending"
                        style="width: 174.6px;"
                      >Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="brand in brands" role="row" class="odd">
                      <td class="sorting_1">{{brand.brand_name}}</td>
                      <td>{{brand.brand_description}}</td>
                      <td>{{brand.created_at}}</td>
                      <td>{{brand.publication_status ==1 ? 'published' : 'Unpublished'}}</td>
                      <td>
                        <a href="#">
                          <i title="edit" class="fa fa-edit" @click="editBrandInfo(brand)"></i>
                        </a>/
                        <a href="#">
                          <i @click="deleteBrands(brand.id)" title="delete" class="fa fa-trash"></i>
                        </a>
                      </td>
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
    <div
      class="modal fade"
      id="addNew"
      tabindex="-1"
      role="dialog"
      aria-labelledby="exampleModalLongTitle"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" v-show="!editMode" id="exampleModalLongTitle">Add Brand</h5>
            <h5 class="modal-title" v-show="editMode" id="exampleModalLongTitle">Edit Brand</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form @submit.prevent="editMode ? updateBrand() :  createBrand() ">
            <div class="modal-body">
              <div class="form-group">
                <input
                  v-model="form.brand_name"
                  type="text"
                  placeholder="Brand Name"
                  id="brand_name"
                  name="brand_name"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('brand_name') }"
                />
                <has-error :form="form" field="brand_name"></has-error>
              </div>
              <div class="form-group">
                <textarea
                  v-model="form.brand_description"
                  type="text"
                  placeholder="Brand Description Name"
                  id="brand_description"
                  name="brand_description"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('brand_description') }"
                ></textarea>
                <has-error :form="form" field="brand_description"></has-error>
              </div>
              <div class="form-group">
                <select
                  v-model="form.publication_status"
                  class="form-control"
                  id="publication_status"
                  name="publication_status"
                  :class="{ 'is-invalid': form.errors.has('publication_status') }"
                >
                  >
                  <option value>Select Publication Status</option>
                  <option value="1">Published</option>
                  <option value="0">UnPublished</option>
                </select>
                <has-error :form="form" field="publication_status"></has-error>
              </div>
            </div>
            <div class="modal-footer">
              <button
                type="button"
                id="close-modall"
                class="btn btn-danger"
                data-dismiss="modal"
              >Close</button>
              <button type="submit" v-show="!editMode" class="btn btn-primary">Save Brand</button>
              <button type="submit" v-show="editMode" class="btn btn-primary">Update Brand</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      search: "",
      brand_name: "",
      brand_description: "",
      editMode: false,
      brands: [],
      form: new Form({
        id: "",
        brand_name: "",
        brand_description: "",
        publication_status: ""
      })
    };
  },
  methods: {
    createBrand() {
      this.form
        .post("brand")
        .then(() => {
          document.getElementById("close-modall").click();
          swal("Good Job", "Brand Saved", "success");
          axios.get("brands-show").then(response => {
            this.brands = response.data;
          });
          this.form.reset();
        })
        .catch(() => {});
    },

    loadBrands() {
      axios.get("brands-show").then(response => {
        this.brands = response.data;
      });
    },

    editBrandInfo(brand) {
      this.editMode = true;
      this.form.reset();
      $("#addNew").modal("show");
      this.form.fill(brand);
    },
    updateBrand() {
      this.form
        .put("brands-update/" + this.form.id)
        .then(() => {
          axios.get("brands-show").then(Response => {
            this.brands = Response.data;
          });
          document.getElementById("close-modall").click();
          swal("Update", "Brand Updated", "success");
        })
        .catch(() => {});
    },
    createNew() {
      this.editMode = false;
      this.form.reset();
      $("#addNew").modal("show");
    },

    deleteBrands(id) {
      swal({
        title: "Are you sure?",
        text:
          "Once deleted, you will not be able to recover this imaginary file!",
        icon: "warning",
        buttons: true,
        dangerMode: true
      }).then(result => {
        if (result) {
          this.form
            .delete("brand/" + id)
            .then(() => {
              swal("Poof! Your imaginary file has been deleted!", {
                icon: "success"
              });
              axios.get("brands-show").then(response => {
                this.brands = response.data;
              });
            })
            .catch(() => {
              swal("Your imaginary file is safe!");
            });
        }
      });
    },
    SearchHit() {
      Fire.$emit("searching");
    }
  },

  created() {
    Fire.$on("searching", () => {
      // let query = this.$parent.search;
      let query = this.search;
      axios
        .get("search-bar?q=" + query)
        .then(response => {
          // console.log(response.data.data);
          this.brands = response.data.data;
        })
        .catch(() => {});
    }),
      this.loadBrands();
  }
};
</script>
