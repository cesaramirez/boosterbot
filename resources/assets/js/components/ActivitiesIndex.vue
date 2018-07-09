<template>
  <section>
      <div class="mb-6">
          <a class="button is-success rounded font-medium shadow" :href="route('activities.create')">
              <span class="z-add-solid mr-2"></span>Create Activity
          </a>
      </div>
    <div class="card">
      <div class="card-content">
        <b-field
        grouped
        position="is-right">
          <b-select
            v-model="perPage"
            :disabled="!isPaginated"
            class="shadow">
            <option value="5">5 {{ textPerPage }}</option>
            <option value="10">10 {{ textPerPage }}</option>
            <option value="15">15 {{ textPerPage }}</option>
            <option value="20">20 {{ textPerPage }}</option>
          </b-select>
        </b-field>
        <b-table
          :data="filteredList"
          mobile-cards
          hoverable
          :paginated="isPaginated"
          :per-page="perPage">
          <template slot-scope="props">
            <b-table-column field="description" label="Description" sortable>
              {{ props.row.description }}
            </b-table-column>

            <b-table-column field="points" label="Points" sortable numeric>
              {{ props.row.points.toLocaleString('es-US') }}
            </b-table-column>

            <b-table-column field="active" label="Active" centered>
              <span class="tag" :class="props.row.active ? 'is-success' : 'is-danger'">
                {{ props.row.active ? 'Yes' : 'No' }}
              </span>
            </b-table-column>

            <b-table-column field="created_at" label="Created At" centered sortable>
              <span class="tag is-success">
                {{ format(props.row.created_at) }}
              </span>
            </b-table-column>

            <b-table-column field="updated_at" label="Updated At" centered sortable>
              <span class="tag is-success">
                {{ format(props.row.updated_at) }}
              </span>
            </b-table-column>

            <b-table-column field="tools" centered>
              <b-dropdown position="is-bottom-left" class="text-left">
                <p slot="trigger">
                    <span class="z-dots-horizontal-triple"></span>
                </p>
                <b-dropdown-item has-link>
                  <a :href="route('activities.edit', props.row.id)">
                    <span class="font-medium">
                        <span class="z-edit-pencil mr-2"/>Edit
                    </span>
                  </a>
                </b-dropdown-item>
                <b-dropdown-item has-link>
                  <a href="" @click.prevent.stop="destroy(props.row.id)">
                    <span class="text-red font-medium">
                        <span class="z-trash mr-2 text-red"/>Delete
                    </span>
                  </a>
                </b-dropdown-item>
            </b-dropdown>
            </b-table-column>
          </template>

          <template slot="empty">
            <section class="section">
              <div class="content has-text-grey has-text-centered">
                <p>
                  <b-icon icon="emoticon-sad"
                          size="is-large">
                  </b-icon>
                </p>
                <p>Nothing here</p>
              </div>
            </section>
          </template>
        </b-table>
      </div>
    </div>
    <b-modal :active.sync="modalDelete" :width="300" scroll="keep">
        <div class="card">
            <div class="card-content text-center">
                <span class="z-exclamation-outline is-size-2 text-red mb-2"></span>
                <p class="font-medium text-xl">¿Esta seguro que desea eliminar el registro?</p>
            </div>
            <footer class="card-footer">
                <form :action="route('activities.destroy', destroyId)" method="POST" id="delete-activity" class="card-footer-item">
                    <input type="hidden" name="_token" :value="csrf">
                    <input type="hidden" name="_method" value="DELETE">
                    <button type="submit" value="delete" class="text-red-lighter font-bold hover:text-red">Si, Estoy Seguro</button>
                </form>
                <a class="card-footer-item font-bold text-blue-light hover:text-blue" @click="modalDelete = false">Cancelar</a>
            </footer>
        </div>
    </b-modal>
  </section>
</template>

<script>
import dayjs from "dayjs";
export default {
  name: "ActivitiesIndex",
  props: {
    activities: {
      type: Array,
      required: true
    }
  },
  data() {
    return {
      perPage: 10,
      isPaginated: true,
      search: "",
      modalDelete: false,
      destroyId: 0,
      csrf: document
        .querySelector('meta[name="csrf-token"]')
        .getAttribute("content"),
      textPerPage: "per page"
    };
  },
  computed: {
    filteredList() {
      return this.activities.filter(activity => {
        return activity.description
          .toLowerCase()
          .includes(this.search.toLowerCase());
      });
    }
  },
  methods: {
    destroy(id) {
      this.modalDelete = true;
      this.destroyId = id;
    },
    format(date) {
      return dayjs(date).format("DD/MMMM/YYYY");
    }
  }
};
</script>
