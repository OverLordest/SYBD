@extends('sample')

@section('title')Главная страница@endsection

@section('content')

    <div id="MainPage">
        <v-app>
            <v-main>
                <v-data-table
                    :headers="headers"
                    :items="show_tables_info"
                    class="elevation-1"
                    :search="search">
                    <template v-slot:top>
                    <v-text-field
                        v-model="search"
                        label="Поиск"
                        class="mx-4"
                    >
                    </v-text-field>
                    </template>
                    <template
                        v-slot:item._actions="{ item }">
                        <v-btn
                            icon @click = "ShowDialogChange(item)">
                            <v-icon>
                                mdi-pencil
                            </v-icon>
                        </v-btn>
                        <v-btn icon @click = "ShowDialogDelete(item)">
                            <v-icon>
                                mdi-delete
                            </v-icon>
                        </v-btn>
                    </template>
                </v-data-table>
            </v-main>

            <v-dialog
            v-model="dialog_change"
            width="300"
            >
                <v-card>
                    <v-card-title class="text-h5 grey lighten-2">
                    Изменение данных
                    </v-card-title>
                    <v-divider></v-divider>
                    <v-card-actions>
                        <v-column>
                            <v-col
                                cols="auto"
                                sm="50"
                                md="10"
                            >
                                <v-text-field
                                    v-model="Kod"
                                    label="Код"
                                    class="mx4">
                                </v-text-field>
                            </v-col>
                            <v-col
                                ccols="auto"
                                sm="50"
                                md="10"
                            >
                                <v-text-field
                                    v-model="Exec_data"
                                    label="Дата погошения"
                                    class="mx4">

                                </v-text-field>
                            </v-col>
                            <v-col
                                cols="auto"
                                sm="50"
                                md="10"
                            >
                                <v-text-field
                                    v-model="Torg_date"
                                    label="Дата торгов"
                                    class="mx4">

                                </v-text-field>
                            </v-col>
                            <v-col
                                cols="auto"
                                sm="50"
                                md="10"
                            >
                                <v-text-field
                                    v-model="Quotation"
                                    label="Максимальная цена"
                                    class="mx4">

                                </v-text-field>
                            </v-col>
                            <v-col
                                cols="auto"
                                sm="50"
                                md="10"
                            >
                                <v-row>
                                <v-text-field
                                    v-model="Num_contr"
                                    label="Кол-во продаж"
                                    class="mx4">
                                </v-text-field>
                                <v-btn
                                    color="primary"
                                    text
                                    @click="ChangeData"
                                >
                                    Изменить
                                </v-btn>
                                </v-row>
                            </v-col>

                        </v-column>




                    </v-card-actions>
                </v-card>
            </v-dialog>

            <v-dialog
                v-model="dialog_delete"
                width="400"
            >
                <v-card>
                    <v-card-title class="text-h5 grey lighten-2">
                        Удаление данных
                    </v-card-title>

                    <v-divider></v-divider>
                    <v-card-text>
                        Вы точно уверены?
                    </v-card-text>
                    <v-card-actions>
                        <v-spacer></v-spacer>

                        <v-divider></v-divider>

                        <v-btn
                            color="primary"
                            text
                            icon @click="DeleteData"
                        >
                            удалить
                        </v-btn>

                        <v-spacer></v-spacer>


                        <v-btn
                            color="primary"
                            text
                            @click="dialog_delete = false"
                        >
                            Отмена
                        </v-btn>
                    </v-card-actions>
                </v-card>
            </v-dialog>
        </v-app>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/vue@2.x/dist/vue.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vuetify@2.x/dist/vuetify.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script>
        new Vue({
            el: '#MainPage',
            vuetify: new Vuetify(),
            data(){
                return{
                    //selected:[],
                    //show_tables_info_:[],
                    show_tables_info:[],//информация в таблице
                    dialog_change: false,//диалог на изменение
                    dialog_delete: false,//диалог на удаление
                    search: '',//поиск
                    Kod:'',
                    Exec_data:'',
                    Torg_date:'',
                    Quotation:'',
                    Num_contr:'',
                    headers: [
                        {
                            text: 'Код фьючерса',
                            align: 'start',
                            value: 'kod',
                        },
                        { text: 'Дата погашения', value: 'exec_data' },
                        { text: 'Дата торгов', value: 'torg_date' },
                        { text: 'Максимальная цена', value: 'quotation' },
                        { text: 'Кол-во продаж', value: 'num_contr' },
                        { text: 'Изменить/удалить', value: '_actions'},
                    ],
                }
            },
            methods:{
                ShowUnitedTable(){//Запрос на данные из таблиц
                    this.show_tables_info_ = []
                    fetch('ShowUnitedTable',{
                        method: 'GET',
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
                    })
                        .then((response)=>{
                            return response.json()
                        })
                        .then((data)=>{
                            this.show_tables_info = data
                        })
                },
                ShowDialogChange(item){//диалог на измение
                    console.log(this.item)
                    this.dialog_change=true
                },
                ChangeData(){//Изменение данных

                },
                ShowDialogDelete(item){//диалог на удаление
                    console.log(this.item)
                    this.dialog_delete=true
                },
                DeleteData(){//удаление данных

                },
            },

            mounted: function (){//предзапуск функций
                this.ShowUnitedTable();

            }
        })
    </script>

@endsection
