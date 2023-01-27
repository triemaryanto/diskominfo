<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Tagihan</h3>
                        <div class="card-tools">
                            <button class="btn btn-success" @click="showModal">
                                Buat Tagihan
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
                                                Tambah Tagihan
                                            </h5>
                                            <h5
                                                class="modal-title"
                                                id="exampleModalLongTitle"
                                                v-show="statusmodal"
                                            >
                                                Ubah Tagihan
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
                                                    <p>Pilih Perusahaan</p>

                                                    <select
                                                        class="form-control"
                                                        v-model="form.menara_id"
                                                        required
                                                    >
                                                        <option value>
                                                            Pilih
                                                        </option>
                                                        <option
                                                            v-for="a in menaras"
                                                            :key="a.id"
                                                            :value="a.id"
                                                        >
                                                            {{ a.name }}
                                                            {{ a.name_menara }}
                                                        </option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <p>Tarif</p>
                                                    <input
                                                        type="text"
                                                        v-model="form.tarif"
                                                        class="form-control"
                                                        placeholder="Rp."
                                                        required
                                                    />
                                                    <div
                                                        class="alert-danger errors"
                                                        v-if="errors.tarif"
                                                    >
                                                        {{ errors.tarif[0] }}
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <p>Tahun</p>
                                                    <select
                                                        class="form-control"
                                                        v-model="form.bulan"
                                                        required
                                                    >
                                                        <option value>
                                                            Pilih
                                                        </option>
                                                        <option
                                                            value="1 Januari"
                                                        >
                                                            1 Januari
                                                        </option>
                                                        <option
                                                            value="1 Februari"
                                                        >
                                                            1 Februari
                                                        </option>
                                                        <option value="1 Maret">
                                                            1 Maret
                                                        </option>
                                                        <option value="1 April">
                                                            1 April
                                                        </option>
                                                        <option value="1 Mei">
                                                            1 Mei
                                                        </option>
                                                        <option value="1 Juni">
                                                            1 Juni
                                                        </option>
                                                        <option value="1 Juli">
                                                            1 Juli
                                                        </option>
                                                        <option
                                                            value="1 Agustus"
                                                        >
                                                            1 Agustus
                                                        </option>
                                                        <option
                                                            value="1 September"
                                                        >
                                                            1 September
                                                        </option>
                                                        <option
                                                            value="1 Oktober"
                                                        >
                                                            1 Oktober
                                                        </option>
                                                        <option
                                                            value="1 November"
                                                        >
                                                            1 November
                                                        </option>
                                                        <option
                                                            value="1 Desember"
                                                        >
                                                            1 Desember
                                                        </option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <p>Tahun</p>

                                                    <select
                                                        class="form-control"
                                                        v-model="form.tahun"
                                                    >
                                                        <option value>
                                                            Pilih
                                                        </option>
                                                        <option value="2023">
                                                            2023
                                                        </option>
                                                        <option value="2024">
                                                            2024
                                                        </option>
                                                        <option value="2025">
                                                            2025
                                                        </option>
                                                    </select>
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
                                            <th>Nama Perusahaan</th>
                                            <th>Nama Menara</th>
                                            <th>Tarif</th>
                                            <th>Status</th>
                                            <th>Kirim</th>
                                            <th>Aksi</th>
                                        </tr>
                                        <tr
                                            v-for="item in tagihans.data"
                                            :key="item.id"
                                        >
                                            <td>{{ item.name }}</td>
                                            <td>{{ item.name_menara }}</td>
                                            <td>{{ item.tarif }}</td>
                                            <td>
                                                {{ item.status }} |
                                                <a
                                                    href="#"
                                                    @click="bayar(item.id)"
                                                    >Bayar
                                                </a>
                                            </td>
                                            <td>
                                                <a
                                                    href="#"
                                                    @click="
                                                        sendEmail(item.email)
                                                    "
                                                    >send
                                                    <i
                                                        class="fa-regular fa-envelope"
                                                    ></i></a
                                                ><a>|</a>
                                                <a
                                                    v-bind:href="
                                                        'https://wa.me/' +
                                                        item.nomor +
                                                        '?text=Dengan%20Hormat.%20%0A%0ANama%20%20%20%20:%20' +
                                                        item.name +
                                                        '%0AMenara%20:%20' +
                                                        item.name_menara +
                                                        '%0AJumlah%20%20:%20' +
                                                        item.tarif +
                                                        '%0A%0AUntuk%20Melakukan%20Pembayaran%0AHormat%20Kami.'
                                                    "
                                                    target="_blank"
                                                    >Send
                                                    <i
                                                        class="fa-brands fa-whatsapp"
                                                    ></i
                                                ></a>
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
        loadData(page = 1) {
            this.$Progress.start();
            axios
                .get(
                    `/api/tagihan?page=${page}&search=${this.search}&searchField=${this.searchField}`
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
                .post(`/api/tagihan`)
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
                .put(`/api/tagihan/` + this.form.id)
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
                        .delete(`/api/tagihan/` + id)
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
        sendEmail(email) {
            this.$Progress.start();
            Swal.fire({
                title: "Kirim Notifikasi ?",
                text: "Klik Batal Untuk Membatalkan",
                icon: "question",
                iconHtml: "؟",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Kirim",
            }).then((result) => {
                if (result.value) {
                    this.form
                        .post(`/api/sendEmail/` + email)
                        .then(() => {
                            Swal.fire(
                                "Terkirim",
                                "Email notifikasi di kirim.",
                                "success"
                            );
                            this.$Progress.finish();
                        })
                        .catch(() => {
                            this.$Progress.fail();
                            Swal.fire(
                                "Gagal",
                                "Email Gagal Terkirim",
                                "warning"
                            );
                        });
                }
            });
        },
        bayar(id) {
            this.$Progress.start();
            Swal.fire({
                title: "Konfirmasi Pembayaran ?",
                text: "Klik Batal Untuk Membatalkan",
                icon: "question",
                iconHtml: "؟",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Bayar",
            }).then((result) => {
                if (result.value) {
                    this.form
                        .post(`/api/bayar/` + id)
                        .then(() => {
                            Swal.fire(
                                "Tersimpan",
                                "Pembayaran Selesai.",
                                "success"
                            );
                            Fire.$emit("refreshData");
                            this.$Progress.finish();
                        })
                        .catch(() => {
                            this.$Progress.fail();
                            Swal.fire("Gagal", "Pembatalan Bayar", "warning");
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
