<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Data Menara</h3>
                        <div class="card-tools">
                            <button class="btn btn-success" @click="showModal">
                                Tambah Menara
                            </button>
                            <!-- Modal -->

                            <div
                                class="modal fade"
                                id="modalmuncul"
                                tabindex="-1"
                                aria-labelledby="modalmuncul"
                                aria-hidden="true"
                            >
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5
                                                class="modal-title"
                                                id="exampleModalLabel"
                                                v-show="!statusmodal"
                                            >
                                                Tambah Menara
                                            </h5>
                                            <h5
                                                class="modal-title"
                                                id="exampleModalLongTitle"
                                                v-show="statusmodal"
                                            >
                                                Ubah Menara
                                            </h5>
                                            <button
                                                type="button"
                                                class="btn-close"
                                                data-bs-dismiss="modal"
                                                aria-label="Close"
                                            ></button>
                                        </div>

                                        <form
                                            @submit.prevent="
                                                statusmodal
                                                    ? ubahData()
                                                    : simpanData()
                                            "
                                        >
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <p>Nama Perusahaan</p>
                                                    <input
                                                        type="text"
                                                        v-model="form.name"
                                                        class="form-control"
                                                        placeholder="Nama Pemilik"
                                                        required
                                                    />
                                                    <div
                                                        class="alert-danger errors"
                                                        v-if="errors.name"
                                                    >
                                                        {{ errors.name[0] }}
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <p>Nama Menara</p>
                                                    <input
                                                        type="text"
                                                        v-model="
                                                            form.name_menara
                                                        "
                                                        class="form-control"
                                                        placeholder="Nama Menara"
                                                        required
                                                    />
                                                    <div
                                                        class="alert-danger errors"
                                                        v-if="
                                                            errors.name_menara
                                                        "
                                                    >
                                                        {{
                                                            errors
                                                                .name_menara[0]
                                                        }}
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <p>Email</p>
                                                    <input
                                                        type="email"
                                                        v-model="form.email"
                                                        class="form-control"
                                                        placeholder="Nama Pemilik Menara"
                                                        required
                                                    />
                                                    <div
                                                        class="alert-danger errors"
                                                        v-if="errors.email"
                                                    >
                                                        {{ errors.email[0] }}
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <p>Nomor Whatsapp</p>
                                                    <input
                                                        type="text"
                                                        v-model="form.nomor"
                                                        class="form-control"
                                                        placeholder="628"
                                                        required
                                                    />
                                                    <div
                                                        class="alert-danger errors"
                                                        v-if="errors.nomor"
                                                    >
                                                        {{ errors.nomor[0] }}
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <p>Lokasi</p>
                                                    <input
                                                        type="text"
                                                        v-model="form.lokasi"
                                                        class="form-control"
                                                        placeholder="Lokasi"
                                                        required
                                                    />
                                                    <div
                                                        class="alert-danger errors"
                                                        v-if="errors.lokasi"
                                                    >
                                                        {{ errors.lokasi[0] }}
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <p>Ketinggian</p>

                                                    <input
                                                        type="text"
                                                        v-model="form.altitude"
                                                        class="form-control"
                                                        placeholder="longitude"
                                                        required
                                                    />
                                                    <div
                                                        class="alert-danger errors"
                                                        v-if="errors.altitude"
                                                    >
                                                        {{ errors.altitude[0] }}
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <p>Koordinat</p>
                                                    <input
                                                        type="text"
                                                        v-model="form.longitude"
                                                        class="form-control"
                                                        placeholder="longitude"
                                                        required
                                                        readonly
                                                    />
                                                    <div
                                                        class="alert-danger errors"
                                                        v-if="errors.longitude"
                                                    >
                                                        {{
                                                            errors.longitude[0]
                                                        }}
                                                    </div>
                                                    <input
                                                        type="text"
                                                        v-model="form.latitude"
                                                        class="form-control"
                                                        placeholder="latitude"
                                                        required
                                                        readonly
                                                    />
                                                    <div
                                                        class="alert-danger errors"
                                                        v-if="errors.latitude"
                                                    >
                                                        {{ errors.latitude[0] }}
                                                    </div>
                                                    <br />
                                                    <iframe
                                                        width="100%"
                                                        height="100%"
                                                        v-bind:src="
                                                            'https://maps.google.com/maps?q=' +
                                                            form.latitude +
                                                            ',' +
                                                            form.longitude +
                                                            '&output=embed'
                                                        "
                                                    ></iframe>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button
                                                    type="button"
                                                    class="btn btn-secondary"
                                                    data-bs-dismiss="modal"
                                                >
                                                    Close
                                                </button>
                                                <button
                                                    type="submit"
                                                    class="btn btn-primary"
                                                    :disabled="disabled"
                                                    v-show="!statusmodal"
                                                >
                                                    <i
                                                        v-show="loading"
                                                        class="fa fa-spinner fa-spin"
                                                    ></i>
                                                    Simpan
                                                </button>
                                                <button
                                                    type="submit"
                                                    class="btn btn-success"
                                                    :disabled="disabled"
                                                    v-show="statusmodal"
                                                >
                                                    <i
                                                        v-show="loading"
                                                        class="fa fa-spinner fa-spin"
                                                    ></i>
                                                    Save changes
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
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
                                                    Nama Pemilik
                                                </option>
                                                <option value="lokasi">
                                                    Lokasi
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
                                            <th>Nama Perusahaan</th>
                                            <th>Nama Menara</th>
                                            <th>Lokasi</th>
                                            <th>Ketinggian</th>
                                            <th>Koordinat</th>
                                            <th>Aksi</th>
                                        </tr>
                                        <tr
                                            v-for="item in menaras.data"
                                            :key="item.id"
                                        >
                                            <td>{{ item.name }}</td>
                                            <td>{{ item.name_menara }}</td>
                                            <td>{{ item.lokasi }}</td>
                                            <td>{{ item.altitude }} m</td>
                                            <td>
                                                {{ item.latitude }},<br />{{
                                                    item.longitude
                                                }}
                                            </td>
                                            <td>
                                                <a
                                                    href="#"
                                                    @click="EditModal(item)"
                                                    ><i
                                                        class="fas fa-edit blue"
                                                    ></i
                                                ></a>
                                                |
                                                <a
                                                    href="#"
                                                    @click="deleteData(item.id)"
                                                    ><i
                                                        class="fas fa-trash-alt red"
                                                    ></i
                                                ></a>
                                            </td>
                                        </tr>
                                    </table>
                                    <div class="container">
                                        <pagination
                                            :data="menaras"
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
export default {
    data() {
        return {
            loading: false,
            disabled: false,
            menaras: {},
            info: [],
            search: "",
            searchField: "",
            statusmodal: false,
            form: new Form({
                id: "",
                name: "",
                name_menara: "",
                email: "",
                nomor: "",
                lokasi: "",
                latitude: "",
                longitude: "",
                altitude: "",
            }),
            errors: {},
            error: "",
        };
    },
    mounted: function () {
        this.myFunction();
    },
    methods: {
        myFunction: function () {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(this.showPosition);
            } else {
                this.error = "Geolocation is not supported.";
            }
        },
        showPosition: function (position) {
            this.form.latitude = position.coords.latitude;
            this.form.longitude = position.coords.longitude;
            this.form.altitude = position.coords.altitude;
        },
        loadData(page = 1) {
            this.$Progress.start();
            axios
                .get(
                    `/api/menara?page=${page}&search=${this.search}&searchField=${this.searchField}`
                )
                .then((data) => {
                    this.menaras = data.data;
                    this.$Progress.finish();
                })
                .catch((e) => {
                    console.log(e);
                    this.$Progress.fail();
                });
            axios
                .get(`https://ipinfo.io/json?token=759e0a84cee21b`)
                .then((a) => {
                    this.info.value = a;
                    this.form.lokasi = this.info.value.data.region;
                });
        },

        showModal() {
            this.statusmodal = false;
            // this.form.reset();
            $("#modalmuncul").modal("show");
        },
        EditModal(item) {
            this.statusmodal = true;
            this.form.reset();
            $("#modalmuncul").modal("show");
            this.form.fill(item);
        },
        simpanData() {
            this.$Progress.start();
            this.loading = true;
            this.disabled = true;
            this.form
                .post(`/api/menara`)
                .then(() => {
                    Fire.$emit("refreshData");
                    $("#modalmuncul").modal("hide");
                    Toast.fire({
                        icon: "success",
                        title: "Data Tersimpan",
                    });
                    this.$Progress.finish();
                    this.loading = false;
                    this.disabled = false;
                })
                .catch((error) => {
                    this.loading = false;
                    this.disabled = false;
                    this.$Progress.fail();
                    this.errors = error.response.data.errors;
                });
        },
        ubahData() {
            this.$Progress.start();
            this.loading = true;
            this.disabled = true;
            this.form
                .put(`/api/menara/` + this.form.id)
                .then(() => {
                    Fire.$emit("refreshData");
                    $("#modalmuncul").modal("hide");
                    Toast.fire({
                        icon: "success",
                        title: "Data Berubah",
                    });
                    this.$Progress.finish();
                    this.loading = false;
                    this.disabled = false;
                })
                .catch((error) => {
                    this.$Progress.fail();
                    this.loading = false;
                    this.disabled = false;
                    this.errors = error.response.data.errors;
                });
        },
        deleteData(id) {
            this.$Progress.start();
            Swal.fire({
                title: "Anda Yakin Ingin Menghapus Data Ini ?",
                text: "Klik Batal Untuk Membatalkan Penghapusan",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Hapus",
            }).then((result) => {
                if (result.value) {
                    this.form
                        .delete(`/api/menara/` + id)
                        .then(() => {
                            Swal.fire(
                                "Terhapus",
                                "Data Anda Sudah Tehapus",
                                "success"
                            );
                            Fire.$emit("refreshData");
                            this.$Progress.finish();
                        })
                        .catch(() => {
                            this.$Progress.fail();
                            Swal.fire(
                                "Gagal",
                                "Data Gagal Terhapus",
                                "warning"
                            );
                        });
                }
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
