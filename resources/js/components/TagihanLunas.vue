<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Tagihan Lunas</h3>
                        <div class="card-tools">
                            <!-- Modal -->
                        </div>
                        <div class="m-3">
                            <form @submit.prevent="loadData">
                                <div class="row">
                                    <div class="col-md-2">
                                        <strong>Search By:</strong>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <select
                                                class="form-control"
                                                v-model="searchField"
                                                required
                                            >
                                                <option value>Pilih</option>
                                                <option value="name">
                                                    Nama Perusahaan
                                                </option>
                                                <option value="name_menara">
                                                    Nama Menara
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <input
                                            type="text"
                                            class="form-control"
                                            placeholder="Input Here"
                                            v-model="search"
                                        />
                                    </div>
                                    <div class="col-md-2">
                                        <button
                                            type="submit"
                                            class="btn btn-primary form-control"
                                        >
                                            <i class="fas fa-search"></i
                                            ><a>Cari Data</a>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <div class="table table-responsive">
                                    <table
                                        id="example2"
                                        class="table table-bordered table-hover"
                                    >
                                        <tr>
                                            <th>Nama Perusahan</th>
                                            <th>Nama Menara</th>
                                            <th>Bulan Tahun</th>
                                            <th>Tarif</th>
                                            <th>Status</th>
                                            <th>Tanggal</th>
                                            <th>Aksi</th>
                                        </tr>
                                        <tr
                                            v-for="item in tagihans.data"
                                            :key="item.id"
                                        >
                                            <td>{{ item.name }}</td>
                                            <td>{{ item.name_menara }}</td>
                                            <td>
                                                {{ item.bulan }}/{{
                                                    item.tahun
                                                }}
                                            </td>
                                            <td>
                                                {{ item.tarif }}
                                            </td>
                                            <td>{{ item.status }}</td>
                                            <td>
                                                {{
                                                    getHumanDate(
                                                        item.updated_at
                                                    )
                                                }}
                                            </td>
                                            <td>
                                                <a
                                                    href="#"
                                                    @click="printPdf(item.id)"
                                                    ><i
                                                        class="fa-solid fa-print"
                                                    ></i>
                                                    Print To PDF</a
                                                >
                                            </td>
                                        </tr>
                                    </table>
                                    <div class="container">
                                        <pagination
                                            :data="tagihans"
                                            @pagination-change-page="loadData"
                                        ></pagination>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <vue-progress-bar></vue-progress-bar>
        </div>
    </div>
</template>

<script>
import Form from "vform";
import moment from "moment";
export default {
    data() {
        return {
            loading: false,
            disabled: false,
            tagihans: {},
            menaras: {},
            search: "",
            searchField: "",
            statusmodal: false,
            form: new Form({
                id: "",
                menara_id: "",
                tarif: "",
                bulan: "",
                tahun: "",
                email: "",
            }),
            errors: {},
            error: "",
        };
    },

    methods: {
        getHumanDate: function (date) {
            return moment(date, "YYYY-MM-DD").format("DD/MM/YYYY");
        },

        loadData(page = 1) {
            this.$Progress.start();
            axios
                .get(
                    `/api/tagihanlunas?page=${page}&search=${this.search}&searchField=${this.searchField}`
                )
                .then((data) => {
                    this.tagihans = data.data;
                    this.$Progress.finish();
                })
                .catch((e) => {
                    console.log(e);
                    this.$Progress.fail();
                });
            axios
                .get(`/api/menaraall`)
                .then((a) => {
                    this.menaras = a.data;
                })
                .catch((e) => {
                    console.log(e);
                });
        },

        printPdf(id) {
            this.$Progress.start();
            this.form
                .post(`/api/printPdf/` + id)
                .then((a) => {
                    console.log(a);
                    this.$Progress.finish();
                })
                .catch((e) => {
                    console.log(e);
                    this.$Progress.fail();
                });
        },
    },
    created() {
        this.loadData();
        Fire.$on("refreshData", () => {
            this.loadData();
        });
    },
};
</script>
