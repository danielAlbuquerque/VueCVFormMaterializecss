<script>
    import axios from 'axios'
    import pt from 'vee-validate/dist/locale/pt_BR'

    export default {

        mounted () {
            $('select').material_select()
            this.loadAreas()
            console.log(pt);
            this.$validator.updateDictionary({
                pt_br: {
                    messages: pt.messages,
                    attributes: {
                        nome_completo: "nome completo",
                        dt_nascimento: "data nascimento",
                        email1: "email principal",
                        email2: "email secundário",
                        tel1: "telefone principal",
                        nivel_escolaridade: "escolaridade"
                    }
                }
            })

            this.$validator.setLocale('pt_br')
        },

        data () {
            return {
                frm: {
                    nome_completo: '',
                    cpf: '',
                    rg: '',
                    dt_nascimento: '',
                    email1: '',
                    email2: '',
                    tel1: '',
                    tel2: '',
                    cep: '',
                    cidade: '',
                    uf: '',
                    bairro: '',
                    endereco: '',
                    areas_interesse: [],
                    nivel_escolaridade: '',
                    arquivo: ''
                },

                niveis: [
                    {value: 'Nível Médio Completo'},
                    {value: 'Nível Médio Incompleto'},
                    {value: 'Nível Técnico Completo'},
                    {value: 'Nível Técnico Incompleto'},
                    {value: 'Nível Superior Completo'},
                    {value: 'Nível Superior Incompleto'}
                ],

                areas: [],

                loading: true
            }
        },

        methods: {
            submitForm () {
                this.$validator.validateAll().then(() => {
                    axios.post('/api/', this.frm).then(response => {
                        console.log(response);
                    }).catch(err => {
                        console.log(err);
                    });
                }).catch(() => {
                    alert("Favor preencher os campos corretamente.")
                })
            },

            loadAreas () {
                setTimeout(() => {
                  axios.get('/api/areas').then(response => {
                      this.areas = response.data
                      this.loading =false;
                  });
                }, 1000)

            },

            onChangeEscolaridade () {
                console.log("teste")
                // this.nivel_escolaridade = value
            },


            selectedFile (e) {
                console.log(e.target.files[0]);
                let fileReader = new FileReader()
                fileReader.readAsDataURL(e.target.files[0])
                fileReader.onload = (e) => {
                    this.frm.arquivo = e.target.result
                }
            },

            buscaCep () {
                if(this.frm.cep.length == 9) {
                    console.log(this.frm.cep);
                    axios.get(`https://viacep.com.br/ws/${this.frm.cep}/json`).then(response => {
                        if(!response.data.error) {
                            let data = response.data
                            this.frm.bairro = data.bairro
                            this.frm.cidade = data.localidade
                            this.frm.endereco = data.logradouro
                            this.frm.uf = data.uf
                        }
                    });
                }
            }
        }
    }
</script>

<template>
    <div class="section">
        <div class="row">
            <div class="col s12 m8 l12 offset-m2">
                <div class="card z-depth-3">
                    <form @submit.prevent="submitForm">
                        <div class="card-content">
                            <h5 class="header">Dados pessoais</h5>
                            <div class="row">


                                <div class="input-field col s12 m9">
                                    <input v-validate="'required'" v-model="frm.nome_completo" name="nome_completo" type="text" maxlength="255">
                                    <label>Nome completo</label>
                                    <span v-show="errors.has('nome_completo')" class="erro">{{ errors.first('nome_completo') }}</span>
                                </div>
                                <div class="input-field col m3 s12">
                                    <input v-validate="'required'" v-mask="'###.###.###-##'" v-model="frm.cpf" name="cpf" type="text">
                                    <label class="">CPF</label>
                                    <span v-show="errors.has('cpf')" class="erro">{{ errors.first('cpf') }}</span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col m2 s12">
                                    <input v-validate="'required'" v-model="frm.rg" name="rg" type="text">
                                    <label class="">RG</label>
                                    <span v-show="errors.has('rg')" class="erro">{{ errors.first('rg') }}</span>
                                </div>
                                <div class="input-field col m2 s12">
                                    <input v-validate="'required'" v-mask="'##/##/####'" v-model="frm.dt_nascimento" name="dt_nascimento" type="text">
                                    <label class="">Dt. Nascimento</label>
                                    <span v-show="errors.has('dt_nascimento')" class="erro">{{ errors.first('dt_nascimento') }}</span>
                                </div>
                                <div class="input-field col m4 s12">
                                    <input id="email1" v-validate="'required|email'" v-model="frm.email1" name="email1" type="email">
                                    <label for="email1" class="">E-Mail Principal</label>
                                    <span v-show="errors.has('email1')" class="erro">{{ errors.first('email1') }}</span>
                                </div>
                                <div class="input-field col m4 s12">
                                    <input v-validate="'email'" v-model="frm.email2" name="email2" type="email">
                                    <label for="first_name" class="">E-Mail Secundário (opcional)</label>
                                    <span v-show="errors.has('email2')" class="erro">{{ errors.first('email2') }}</span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col m3 s12">
                                    <input v-validate="'required'" v-mask="'(##) #####-####'" v-model="frm.tel1" name="tel1" id="tel1" type="tel">
                                    <label for="tel1" class="">Telefone Principal</label>
                                    <span v-show="errors.has('tel1')" class="erro">{{ errors.first('tel1') }}</span>
                                </div>
                                <div class="input-field col m3 s12">
                                    <input v-mask="'(##) #####-####'" v-model="frm.tel2" id="tel2" type="tel">
                                    <label for="tel2" class="">Telefone Secundário (opcional) </label>
                                </div>
                                <div class="input-field col m6 s12">
                                    <material-select v-model="frm.nivel_escolaridade" @change="onChangeEscolaridade">
                                         <option v-for="option in niveis" :value="option.value" v-text="option.value"></option>
                                    </material-select>
                                    <label class="">Escolaridade</label>
                                    <span v-show="errors.has('nivel_escolaridade')" class="erro">{{ errors.first('nivel_escolaridade') }}</span>
                                </div>
                            </div>
                            <h5 class="header">Endereço</h5>
                            <div class="row">
                                <div class="input-field col m3 s12">
                                    <input placeholder v-on:keyup="buscaCep" v-on:change="buscaCep" v-mask="'#####-###'" v-model="frm.cep" name="cep" type="text">
                                    <label class="">CEP</label>
                                </div>
                                <div class="input-field col m1 s12">
                                    <input placeholder="" v-model="frm.uf" maxlength="2" type="text">
                                    <label for="uf" class="">UF</label>
                                </div>
                                <div class="input-field col m3 s12">
                                    <input placeholder="" v-model="frm.cidade" id="cidade" type="text">
                                    <label for="cidade" class="">Cidade </label>
                                </div>
                                <div class="input-field col m5 s12">
                                    <input placeholder="" v-model="frm.bairro" id="bairro" type="text">
                                    <label for="bairro" class="">Bairro </label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <input placeholder="" v-model="frm.endereco" id="endereco" type="text">
                                    <label for="endereco" class="">Endereço</label>
                                </div>
                            </div>

                            <h5 class="header">Áreas de interesse</h5>
                            <div v-show="loading" class="preloader-wrapper big active">
                              <div class="spinner-layer spinner-blue-only">
                                <div class="circle-clipper left">
                                  <div class="circle"></div>
                                </div><div class="gap-patch">
                                  <div class="circle"></div>
                                </div><div class="circle-clipper right">
                                  <div class="circle"></div>
                                </div>
                              </div>
                            </div>

                            <div v-for="area in areas" class="s12">
                                <input v-model="frm.areas_interesse" type="checkbox" :id="area.id" :value="area.id" />
                                <label :for="area.id">{{area.descricao}}</label>
                            </div>
                            <div class="top-buffer"></div>
                            <h5 class="header">Arquivo (opcional)</h5>
                            <div class="row">
                                <div class="file-field input-field col s12 m5">
                                    <div class="btn btn-flat">
                                        <i class="large material-icons">open_in_browser</i>
                                        <input type="file" @change="selectedFile($event)">
                                    </div>
                                    <div class="file-path-wrapper">
                                        <input class="file-path validate" type="text" placeholder="Selecione o arquivo">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-action">
                            <button type="submit" class="waves-effect waves-light btn teal darken-3"><i class="material-icons left">done_all</i>Enviar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<style>
    .header {
        font-size: 1.1rem;
        font-weight: 400;
        text-transform: uppercase;
    }

    .top-buffer {
        padding-top: 8px;
    }

    input {
        text-transform: uppercase;
    }

    .erro {
        position: relative;
        top: -1rem;
        left: 0rem;
        font-size: 0.8rem;
        color: #c11540;
        -webkit-transform: translateY(0%);
        -ms-transform: translateY(0%);
        -o-transform: translateY(0%);
        transform: translateY(0%);
    }
</style>
