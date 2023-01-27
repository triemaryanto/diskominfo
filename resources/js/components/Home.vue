<template>
    <div class="container-fluid mt-4">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{ form.countUsers }}</h3>

                        <p>Users</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="#" class="small-box-footer"> &nbsp;</a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>{{ form.countMenara }}</h3>

                        <p>Jumlah Menara</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <router-link
                        to="/admin/data-menara"
                        class="small-box-footer"
                        >More info <i class="fas fa-arrow-circle-right"></i
                    ></router-link>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>{{ form.countSudah }}</h3>

                        <p>Sudah Bayar</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <router-link
                        to="/admin/tagihan-lunas"
                        class="small-box-footer"
                        >More info <i class="fas fa-arrow-circle-right"></i
                    ></router-link>
                </div>
            </div>
            <!-- ./col -->

            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>{{ form.countBelum }}</h3>

                        <p>Belum Bayar</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                    <router-link
                        to="/admin/data-tagihan"
                        class="small-box-footer"
                        >More info <i class="fas fa-arrow-circle-right"></i
                    ></router-link>
                </div>
            </div>
            <!-- ./col -->
        </div>
        <!-- /.row (main row) -->
    </div>
    <!-- /.container-fluid -->
</template>

<script>
import axios from "axios";
import Form from "vform";
export default {
    data() {
        return {
            form: new Form({
                countUsers: "",
                countMenara: "",
                countSudah: "",
                countBelum: "",
            }),
        };
    },

    methods: {
        loadData() {
            this.$Progress.start();
            axios
                .get(`/api/countUsers`)
                .then((u) => {
                    this.form.countUsers = u.data;
                    this.$Progress.finish();
                })
                .catch((e) => {
                    console.log(e);
                    this.$Progress.fail();
                });
            axios.get("/api/countMenara").then((m) => {
                this.form.countMenara = m.data;
            });
            axios.get("/api/countBelum").then((b) => {
                this.form.countBelum = b.data;
            });
            axios.get("/api/countSudah").then((s) => {
                this.form.countSudah = s.data;
            });
        },
    },
    created() {
        this.loadData();
    },
};
</script>
