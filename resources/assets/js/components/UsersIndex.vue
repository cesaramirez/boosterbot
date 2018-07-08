<template>
  <section>
    <div class="card">
      <div class="card-content">
        <b-field
        grouped
        position="is-right">
          <b-select
            v-model="perPage"
            :disabled="!isPaginated"
            class="shadow">
            <option value="5">5 por Página</option>
            <option value="10">10 por Página</option>
            <option value="15">15 por Página</option>
            <option value="20">20 por Página</option>
          </b-select>
        </b-field>
        <b-table
          :data="filteredList"
          mobile-cards hoverable
          :paginated="isPaginated"
          :per-page="perPage">
          <template slot-scope="props">

            <b-table-column field="name" label="Nombre" sortable>
              {{ props.row.name }}
            </b-table-column>

            <b-table-column field="email" label="Correo Electrónico" sortable>
              {{ props.row.email }}
            </b-table-column>

            <b-table-column field="active" label="Activo" centered>
              <span class="tag" :class="props.row.active ? 'is-success' : 'is-danger'">
                {{ props.row.active ? 'Si' : 'No' }}
              </span>
            </b-table-column>

            <b-table-column field="created_at" label="Fecha de Creación" centered sortable>
              <span class="tag is-success">
                {{ props.row.created_at }}
              </span>
            </b-table-column>

            <b-table-column field="updated_at" label="Fecha de Actualización" centered sortable>
              <span class="tag is-success">
                {{ props.row.updated_at }}
              </span>
            </b-table-column>

            <b-table-column field="tools" centered>
              <b-dropdown position="is-bottom-left" class="text-left">
                <p slot="trigger">
                    <span class="z-dots-horizontal-triple"></span>
                </p>
                <b-dropdown-item has-link>
                  <a :href="route('users.edit', props.row.id)">
                    <span class="font-medium">Editar</span>
                  </a>
                </b-dropdown-item>
                <b-dropdown-item has-link>
                  <a href="" @click.prevent.stop="destroy(props.row.id)">
                    <span class="text-red font-medium">Eliminar</span>
                  </a>
                </b-dropdown-item>
            </b-dropdown>
            </b-table-column>
          </template>

          <template slot="empty">
            <section class="section">
              <div class="content has-text-grey has-text-centered">
                <p>
                  <b-icon icon="emoticon-sad" size="is-large">
                  </b-icon>
                </p>
                <p>Nada por aquí.</p>
              </div>
            </section>
          </template>
        </b-table>
      </div>
    </div>
  </section>
</template>

<script>
export default {
  name: "UsersIndex",
  props: {
    users: {
      type: Array,
      required: true
    }
  },
  data() {
    return {
      perPage: 5,
      isPaginated: true,
      search: "",
      modal: false,
      destroyId: null,
      csrf: document
        .querySelector('meta[name="csrf-token"]')
        .getAttribute("content")
    };
  },
  methods: {
    destroy(id) {
      this.modal = true;
      this.destroyId = id;
    }
  },
  computed: {
    filteredList() {
      return this.users.filter(user => {
        return user.name.toLowerCase().includes(this.search.toLowerCase());
      });
    }
  }
};
</script>
