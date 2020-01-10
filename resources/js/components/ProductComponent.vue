<template>
  <div class="container">
    <div class="row">
      <!-- /.card -->
      <div class="card">
        <div class="card-header">
          <h3 class="text-center">Product Information</h3>
        </div>

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
                      >Product Name</th>
                      <th
                        class="sorting"
                        tabindex="0"
                        aria-controls="example1"
                        rowspan="1"
                        colspan="1"
                        aria-label="Platform(s): activate to sort column ascending"
                        style="width: 233px;"
                      >Category Name</th>
                      <th
                        class="sorting"
                        tabindex="0"
                        aria-controls="example1"
                        rowspan="1"
                        colspan="1"
                        aria-label="Platform(s): activate to sort column ascending"
                        style="width: 233px;"
                      >Brand Name</th>
                      <th
                        class="sorting"
                        tabindex="0"
                        aria-controls="example1"
                        rowspan="1"
                        colspan="1"
                        aria-label="Browser: activate to sort column ascending"
                        style="width: 262.6px;"
                      >Product Quantity</th>

                      <th
                        class="sorting"
                        tabindex="0"
                        aria-controls="example1"
                        rowspan="1"
                        colspan="1"
                        aria-label="Browser: activate to sort column ascending"
                        style="width: 262.6px;"
                      >Product Price</th>
                      <th
                        class="sorting"
                        tabindex="0"
                        aria-controls="example1"
                        rowspan="1"
                        colspan="1"
                        aria-label="Platform(s): activate to sort column ascending"
                        style="width: 233px;"
                      >Product Image</th>
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
                    <tr v-for="product in products" role="row" class="odd">
                      <td class="sorting_1">{{ product[0].product_name}}</td>
                      <td>{{product[0].category.category_name}}</td>
                      <td>{{product[0].brand.brand_name}}</td>
                      <td>{{product[0].product_quantity}}</td>
                      <td>{{product[0].product_price}}</td>
                      <td>
                        <img :src="'' + product[0].product_image" height="50" width="60" />
                      </td>
                      <td>{{product[0].publication_status ==1 ? 'published' : 'Unpublished'}}</td>
                      <td>
                        <a href="#">
                          <i title="edit" class="fa fa-edit" @click="editproductInfo(product[0])"></i>
                        </a>/
                        <a href="#">
                          <i
                            @click="DeleteProduct(product[0].id)"
                            title="delete"
                            class="fa fa-trash"
                          ></i>
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
    <!--Modal of Product -->
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
            <h5 class="modal-title" v-show="!editMode" id="exampleModalLongTitle">Add Product</h5>
            <h5 class="modal-title" v-show="editMode" id="exampleModalLongTitle">Edit Product</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form
            @submit.prevent="editMode ?  UpdateProduct() : SaveProduct()"
            enctype="multipart/form-data"
          >
            <div class="modal-body">
              <div class="form-group">
                <input
                  v-model="form.product_name"
                  type="text"
                  placeholder="Product Name"
                  id="product_name"
                  name="product_name"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('product_name') }"
                />
                <has-error :form="form" field="product_name"></has-error>
              </div>
              <div class="form-group">
                <select
                  v-model="form.category_id"
                  class="form-control"
                  id="category_id"
                  name="category_id"
                  :class="{ 'is-invalid': form.errors.has('category_id') }"
                >
                  <option value>Select Category Name</option>
                  <option
                    v-for="info in information.category"
                    v-bind:value="info.id"
                  >{{info.category_name}}</option>
                </select>
                <has-error :form="form" field="category_id"></has-error>
              </div>

              <div class="form-group">
                <select
                  v-model="form.brand_id"
                  class="form-control"
                  id="brand_id"
                  name="brand_id"
                  :class="{ 'is-invalid': form.errors.has('brand_id') }"
                >
                  <option value>Select Brand Name</option>
                  <option
                    v-for="brandinfo in information.brand"
                    v-bind:value="brandinfo.id"
                  >{{brandinfo.brand_name}}</option>
                </select>
                <has-error :form="form" field="brand_id"></has-error>
              </div>

              <div class="form-group">
                <input
                  v-model="form.product_quantity"
                  type="text"
                  placeholder="Product Quantity"
                  id="product_quantity"
                  name="product_quantity"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('product_quantity') }"
                />
                <has-error :form="form" field="product_quantity"></has-error>
              </div>

              <div class="form-group">
                <input
                  v-model="form.product_price"
                  type="text"
                  placeholder="Product price"
                  id="product_price"
                  name="product_price"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('product_price') }"
                />
                <has-error :form="form" field="product_price"></has-error>
              </div>
              <div class="form-group">
                <textarea
                  v-model="form.short_description"
                  type="text"
                  placeholder="Short Description"
                  id="short_description"
                  name="short_description"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('short_description') }"
                ></textarea>
                <has-error :form="form" field="short_description"></has-error>
              </div>

              <div class="form-group">
                <textarea
                  v-model="form.full_description"
                  type="text"
                  placeholder="Long Description"
                  id="full_description"
                  name="full_description"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('full_description') }"
                ></textarea>
                <has-error :form="form" field="full_description"></has-error>
              </div>

              <div class="form-group">
                <input type="file" accept="image/*" class="form-control" @change="imageUpload" />
              </div>

              <div class="form-group">
                <input
                  type="file"
                  accept="image/*"
                  class="form-control"
                  multiple
                  @change="SubimageUpload"
                />
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
              <button type="submit" v-show="!editMode" class="btn btn-primary">Save Product</button>
              <button type="submit" v-show="editMode" class="btn btn-primary">Update Product</button>
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
      editMode: false,
      products: [],
      information: [],
      form: new Form({
        id: "",
        product_name: "",
        category_id: "",
        brand_id: "",
        product_image: "",
        sub_image: [],
        product_price: "",
        product_quantity: "",
        short_description: "",
        full_description: "",
        publication_status: ""
      })
    };
  },
  methods: {
    imageUpload(e) {
      //   console.log(e.target.files[0]);
      var fileReader = new FileReader();
      fileReader.readAsDataURL(e.target.files[0]);
      fileReader.onload = e => {
        this.form.product_image = e.target.result;
      };
      console.log(this.form);
    },


    SubimageUpload(e) {
      for (let i= e.target.files.length-1; i>=0; i--) {
      var fileReader = new FileReader();
       fileReader.readAsDataURL(e.target.files[i]);
        fileReader.onload = e => {
        this.form.sub_image[i] = e.target.result;
      };

      }
      console.log(this.form);
      },




    createNew() {
      $("#addNew").modal("show");
      this.form.reset();
      this.editMode = false;
    },

    SaveProduct() { console.log(this.form)
      this.form
        .post("product")
        .then(() => {
          axios.get("product-show").then(response => {
            this.products = response.data;
          });
          swal("Good Job", "Product Saved", "success");
          document.getElementById("close-modall").click();
        })
        .catch(() => {});
    },


    loadProducts() {
      axios.get("product-show").then(response => {
        this.products = response.data;
      });
    },


    editproductInfo(products) {
      this.form.reset();
      $("#addNew").modal("show");
      this.editMode = true;
      this.form.fill(products);
    },
    UpdateProduct() {
      this.form
        .put("updateProduct/" + this.form.id)
        .then(() => {
          swal("Update", "Product Updated", "success");
          axios.get("product-show").then(response => {
            this.products = response.data;
          });
          document.getElementById("close-modall").click();
        })
        .catch(() => {});
    },
    DeleteProduct(id) {
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
            .delete("delete/" + id)
            .then(() => {
              swal("Poof! Your imaginary file has been deleted!", {
                icon: "success"
              });
              axios.get("product-show").then(response => {
                this.products = response.data;
              });
            })
            .catch(() => {
              swal("Your imaginary file is safe!");
            });
        }
      });
    },
    loadData() {
      axios.get("data-sent").then(response => {
        this.information = response.data;
      });
    }
  },
  created() {
    this.loadData();
    this.loadProducts();
  }
};
</script>
