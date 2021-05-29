<template>
  <div class="content-body">
    <b-table responsive="sm" :items="items"/>
    <!-- modal Add button -->
    <b-button
      v-ripple.400="'rgba(113, 102, 240, 0.15)'"
      v-b-modal.modal-addAlbum
      variant="outline-primary"
    >
    Add Album
    </b-button>
    <b-button
        v-ripple.400="'rgba(113, 102, 240, 0.15)'"
        v-b-modal.modal-login
        variant="outline-primary"
    >
    Add Category
    </b-button>
    <div>
      <br />
      <div class="row match-height">
        <div class="col-md-6 col-lg-4">
          <!-- modal login-->
          <b-modal
            id="modal-login"
            cancel-variant="outline-secondary"
            ok-title="บันทึก"
            cancel-title="ยกเลิก"
            centered
            title="Login Form"
             @ok="postTopic"
          >
            <b-form>
              <b-form-group>
                <label for="email">หมวดหมู่:</label>
                <b-form-input
                  type="cat"
                  placeholder="หมวดหมู่"
                  v-model="data_compact.name_categorie"
                />
              </b-form-group>
            </b-form>
          </b-modal>

          <div class="card">
            <img
              src="https://cdn.icon-icons.com/icons2/1480/PNG/512/photos-filled_101989.png"
              class="card-img-top p-1"
            /><br />
            <div class="card-body">
              <h4 class="card-title" align="center">Name Album</h4>
              <div>
                <b-form-tags
                  v-model="value"
                  input-id="tags-basic"
                  class="mb-2"
                />
              </div>
              <div class="row  ml-1">
                <div align="center">
                  <b-button
                    v-ripple.400="'rgba(113, 102, 240, 0.15)'"
                    v-b-modal.modal-editAlbum
                    variant="outline-primary"
                    to="/album/pictureall"
                  >
                    More Picture
                  </b-button>
                  <!-- modal Edit button -->
                  <b-button
                    v-ripple.400="'rgba(113, 102, 240, 0.15)'"
                    v-b-modal.modal-editAlbum
                    variant="outline-warning"
                  >
                    Edit Album
                  </b-button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- modal login-->
    <b-modal
      id="modal-addAlbum"
      cancel-variant="outline-secondary"
      ok-title="Create"
      cancel-title="Close"
      centered
      title="Album Form"
    >
      <b-form>
        <b-form-group>
          <label for="name">Name Album:</label>
          <b-form-input
            id="nameAlbum"
            type="text"
            placeholder="Place name album"
          />
        </b-form-group>
      </b-form>
    </b-modal>
    <b-modal
      id="modal-editAlbum"
      cancel-variant="outline-secondary"
      ok-title="Edit"
      cancel-title="Close"
      centered
      title="Edit Form"
    >
      <b-form>
        <b-form-group>
          <label for="email">Name Album:</label>
          <b-form-input
            id="nameAlbum"
            type="text"
            placeholder="Place name album"
          />
        </b-form-group>
      </b-form>
    </b-modal>
  </div>
</template>

<script>
import {
  BButton,
  BModal,
  VBModal,
  BForm,
  BFormInput,
  BFormGroup,
  BFormTags,
  BTable
} from "bootstrap-vue";
import vSelect from "vue-select";
import Ripple from "vue-ripple-directive";

export default {
  components: {
    BButton,
    BModal,
    BForm,
    BFormInput,
    BFormGroup,
    vSelect,
    BFormTags,
    BTable,
  },
  directives: {
    "b-modal": VBModal,
    Ripple,
  },
  data: () => ({
    value: [],
    cat:"",
    data_compact:{
        // tags:'',
        name_categorie:''
    }
  }),
  methods: {
    postTopic(){
        this.$http.post('api/add/topic',this.data_compact)    
    }
  },
};
</script>