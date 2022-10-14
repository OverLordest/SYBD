@extends('sample')

@section('title')Главная страница@endsection

@section('content')

    <div id="MainPage">
        <v-app>
            <v-main>
                <v-card>
                    <v-card-text>
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
                            <!--<template v-slot:footer.page-text>
                                <v-btn
                                    color="primary"
                                    dark
                                    class="ma-2"
                                    @click="buttonCallback">
                                    Button
                                </v-btn>
                            </template>-->

                        </v-data-table>

                    </v-card-text>

                    <v-card-actions>
                        <v-btn
                            block
                            depressed
                            class="transparent font-weight-bold grey--text pa-2 d-flex align-center"
                            icon @click="ShowDialogAdd()"
                        >
                            <v-icon>
                                mdi-plus
                            </v-icon>
                            <span>
                                Добавить запсиь
                            </span>
                        </v-btn>
                    </v-card-actions>

                </v-card>
            </v-main>

            <v-dialog
            v-model="dialog_change"
            width="400"
            >
                <v-card>
                    <v-card-title class="text-h5 grey lighten-2">
                    Изменение данных
                    </v-card-title>
                    <v-divider></v-divider>
                    <v-card-actions>
                        <v-col>
                            <v-col
                                cols="auto"
                                sm="50"
                                md="10"
                            >
                                <v-text-field
                                    v-model="Kod"
                                    label="Код"
                                    class="mx4"
                                    disabled>
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
                                    class="mx4"
                                disabled>

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
                                    class="mx4"
                                    disabled>

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
                                    <v-col>
                                        <v-btn
                                            color="primary"
                                            text
                                            @click="ChangeData"
                                        >
                                            Изменить
                                        </v-btn>
                                        <v-btn
                                            color="primary"
                                            text
                                            @click="dialog_change = false"
                                        >
                                            Отмена
                                        </v-btn>
                                    </v-col>
                                </v-row>
                            </v-col>

                        </v-col>

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
            <v-dialog
                v-model="dialog_add"
                width="300">
                <v-card>
                    <v-card-title class="text-h5 grey lighten-2">
                        Добавление данных
                    </v-card-title>
                    <v-container>
                        <v-row>
                            <!--<v-col
                                cols="12"
                                sm="3"
                            >
                                <v-text-field
                                    v-model="Kod1"
                                    label="Код"
                                    class="mx4"
                                    readonly>
                                </v-text-field>
                        </v-col>-->

                        <v-col
                            cols="12"
                            sm="10"
                        >
                            <v-text-field
                                v-model="Kod"
                                label="Код"
                                class="mx4">
                            </v-text-field>

                        </v-col>
                        </v-row>
                    </v-container>
                    <v-col
                        cols="auto"
                        sm="10"
                    >
                        <v-text-field
                            v-model="Torg_date"
                            label="Дата торгов"
                            class="mx4"
                        >

                        </v-text-field>
                    </v-col>
                    <v-col
                        cols="auto"
                        sm="10"
                    >
                        <v-text-field
                            v-model="Quotation"
                            label="Максимальная цена"
                            class="mx4">

                        </v-text-field>
                    </v-col>
                    <v-col
                        cols="auto"
                        sm="10"
                    >

                            <v-text-field
                                v-model="Num_contr"
                                label="Кол-во продаж"
                                class="mx4">
                            </v-text-field>
                    </v-col>
                    <v-card-actions>

                                        <v-btn
                                            color="primary"
                                            text
                                            @click="AddData_()"
                                        >
                                            Добавить
                                        </v-btn>
                                        <v-btn
                                            color="primary"
                                            text
                                            @click="dialog_add = false"
                                        >
                                            Отмена
                                        </v-btn>


                    </v-card-actions>


                </v-card>
            </v-dialog>
            <v-dialog
                v-model="dialog_add_f"
                width="400">
                <v-card>
                    <v-card-title class="text-h5 grey lighten-2">
                        Фьючерс не найден
                    </v-card-title>
                    <v-divider></v-divider>
                    <v-card-actions>
                        <v-col>
                            <v-col
                                cols="auto"
                                sm="50"
                                md="20"
                            >
                                    Вы хотите добавить этот фьючерс?
                            </v-col>
                        <v-col>
                            <v-col
                                cols="auto"
                                sm="50"
                                md="10"
                            >
                                <v-text-field
                                    v-model="Kod"
                                    label="Код"
                                    class="mx4"
                                >
                                </v-text-field>
                            </v-col>
                                        <v-btn
                                            color="primary"
                                            text
                                            @click="AddDataF()"
                                        >
                                            Добавить
                                        </v-btn>
                                        <v-btn
                                            color="primary"
                                            text
                                            @click="dialog_add_f = false"
                                        >
                                            Отмена
                                        </v-btn>
                                    </v-col>
                                </v-row>
                            </v-col>

                        </v-col>

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
                    answer:[],
                    show_tables_info:[],//информация в таблице
                    dialog_change: false,//диалог на изменение
                    dialog_delete: false,//диалог на удаление
                    dialog_add: false,//диалог на добаление
                    dialog_add_f: false,//диалог на добавление фьючерса
                    search: '',//поиск
                    Kod:'',
                    //Kod1:'FUSD_',
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
                 async ShowUnitedTable(){//Запрос на данные из таблиц
                    this.show_tables_info_ = []
                     await fetch('ShowUnitedTable',{
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
                ShowDialogAdd(){/*Диалог на добаление*/
                        this.Kod='FUSD_'
                        this.Exec_data=''
                        this.Torg_date='199'
                        this.Quotation=''
                        this.Num_contr=''
                    this.dialog_add=true
                },
                ShowDialogChange(item){//диалог на измение
                    this.Kod=item.kod
                    this.Exec_data=item.exec_data
                    this.Torg_date= item.torg_date
                    this.Quotation=Number(item.quotation)
                    this.Num_contr=Number(item.num_contr)
                    this.item=item
                    this.dialog_change=true
                },
                ShowDialogDelete(item){//диалог на удаление
                    this.Kod=item.kod
                    this.Torg_date= item.torg_date
                    this.item=item
                    this.dialog_delete=true
                },
                ChangeData(){//Изменение данных
                    let data=new FormData()
                    data.append('kod',this.Kod)
                    data.append('torg_date',this.Torg_date)
                    data.append('quotation',this.Quotation)
                    data.append('num_contr',this.Num_contr)
                    fetch('ChangeData',{
                        method:'post',
                        headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        body:data
                    })
                    this.ShowUnitedTable();
                    this.dialog_change=false;
                },
                DeleteData(){//удаление данных
                    let data=new FormData()
                    data.append('kod',this.Kod)
                    data.append('torg_date',this.Torg_date)
                    fetch('DeleteData',{
                        method:'post',
                        headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        body:data
                    })
                    this.ShowUnitedTable();
                    this.dialog_delete=false;
                },
                AddData_(){//добавление данных проверка кода

                    //console.log('Kod1',this.Kod1)
                    console.log('Kod',this.Kod)
                    let data=new FormData()
                    data.append('kod',this.Kod1+this.Kod)
                    fetch('KodCheck',{
                        method:'post',
                        headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        body:data
                    })
                        .then((response)=>{
                            return response.json()
                        })
                        .then((data)=>{
                            this.answer = data
                            console.log('Ответ:',this.answer)
                        })
                    if (this.answer!=0)
                    {
                        console.log('Ответ:',this.answer)
                        this.AddData()
                    }
                    else
                    {
                        this.dialog_add_f=true
                    }
                },
                AddData(){//добавление данных
                    let data=new FormData()
                    data.append('kod',this.Kod)
                    data.append('kod',this.Kod)
                    data.append('torg_date',this.Torg_date)
                    data.append('quotation',this.Quotation)
                    data.append('num_contr',this.Num_contr)
                    fetch('AddData',{
                        method:'post',
                        headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        body:data
                    })
                    this.ShowUnitedTable();
                    this.dialog_add=false;
                },
                AddDataF(){//добавление фьючерса
                    var ed1=this.Kod.substr(this.Kod.length-2)
                    var ed2=this.Kod.substring(5,7)
                    this.Exec_data='19'+ed1+'-'+ed2+'-15'
                    let data=new FormData()
                    data.append('kod',this.Kod)
                    data.append('exec_data',this.Exec_data)
                    fetch('AddDataF',{
                        method:'post',
                        headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        body:data
                    })
                    this.dialog_add_f=false;
                },
            },

            mounted: function (){//предзапуск функций
                this.ShowUnitedTable();

            }
        })
    </script>

@endsection
