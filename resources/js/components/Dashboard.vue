<template>
    <div>
        <div class="row">
            <div class="col-lg-6 col-md-12">
                <div class="card card-tasks">
                    <div class="card-header">
                        <h6 class="title d-inline">Tasks(5)</h6>
                        <p class="card-category d-inline">today</p>
                        <div class="dropdown">
                            <button
                                type="button"
                                class="btn btn-link dropdown-toggle btn-icon"
                                data-toggle="dropdown"
                            >
                                <i class="tim-icons icon-settings-gear-63"></i>
                            </button>
                            <div
                                class="dropdown-menu dropdown-menu-right"
                                aria-labelledby="dropdownMenuLink"
                            >
                                <a class="dropdown-item" href="#pablo"
                                    >Action</a
                                >
                                <a class="dropdown-item" href="#pablo"
                                    >Another action</a
                                >
                                <a class="dropdown-item" href="#pablo"
                                    >Something else</a
                                >
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-full-width table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr
                                        v-for="(task, index) in tasks"
                                        :key="index"
                                    >
                                        <td>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input
                                                        class="form-check-input"
                                                        type="checkbox"
                                                        :value="index"
                                                        @click="checked"
                                                    />
                                                    <span
                                                        class="form-check-sign"
                                                    >
                                                        <span
                                                            class="check"
                                                        ></span>
                                                    </span>
                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <p
                                                class="title"
                                                v-text="task.title"
                                            ></p>
                                            <p
                                                class="text-muted"
                                                v-text="task.description"
                                            ></p>
                                        </td>
                                        <td class="td-actions text-right">
                                            <button
                                                type="button"
                                                rel="tooltip"
                                                title=""
                                                class="btn btn-link"
                                                data-original-title="Edit Task"
                                            >
                                                <i
                                                    class="
                                                        tim-icons
                                                        icon-pencil
                                                    "
                                                ></i>
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Simple Table</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table tablesorter" id="">
                                <thead class="text-primary">
                                    <tr>
                                        <th>Name</th>
                                        <th>Country</th>
                                        <th>City</th>
                                        <th class="text-center">Salary</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Dakota Rice</td>
                                        <td>Niger</td>
                                        <td>Oud-Turnhout</td>
                                        <td class="text-center">$36,738</td>
                                    </tr>
                                    <tr>
                                        <td>Minerva Hooper</td>
                                        <td>Curaçao</td>
                                        <td>Sinaai-Waas</td>
                                        <td class="text-center">$23,789</td>
                                    </tr>
                                    <tr>
                                        <td>Sage Rodriguez</td>
                                        <td>Netherlands</td>
                                        <td>Baileux</td>
                                        <td class="text-center">$56,142</td>
                                    </tr>
                                    <tr>
                                        <td>Philip Chaney</td>
                                        <td>Korea, South</td>
                                        <td>Overland Park</td>
                                        <td class="text-center">$38,735</td>
                                    </tr>
                                    <tr>
                                        <td>Doris Greene</td>
                                        <td>Malawi</td>
                                        <td>Feldkirchen in Kärnten</td>
                                        <td class="text-center">$63,542</td>
                                    </tr>
                                    <tr>
                                        <td>Mason Porter</td>
                                        <td>Chile</td>
                                        <td>Gloucester</td>
                                        <td class="text-center">$78,615</td>
                                    </tr>
                                    <tr>
                                        <td>Jon Porter</td>
                                        <td>Portugal</td>
                                        <td>Gloucester</td>
                                        <td class="text-center">$98,615</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    data: () => {
        return {
            selected: [],
        };
    },
    computed:{
        tasks(){
            return this.$store.state.tasks
        }
    },
    methods: {
        checked(index) {
            let tmpSelected = this.selected;
            tmpSelected.sort();
            if (index.target.checked) {
                this.selected = [...tmpSelected, parseInt(index.target.value)];
            } else {
                this.selected = tmpSelected.filter(
                    (item) => parseInt(item) !== parseInt(index.target.value)
                );
            }
            tmpSelected = this.selected
            tmpSelected.sort()
            this.selected = tmpSelected
            console.log(this.selected);
        },
    },
};
</script>
