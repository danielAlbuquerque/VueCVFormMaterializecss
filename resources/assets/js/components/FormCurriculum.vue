<script>
    import axios from 'axios'

    export default {

        mounted () {
            $('select').material_select()
            this.loadAreas()
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
                    nivel_escolaridade: ''
                },
                
                niveis: [
                    {value: 'Nível Médio Completo'},
                    {value: 'Nível Médio Incompleto'},
                    {value: 'Nível Técnico Completo'},
                    {value: 'Nível Técnico Incompleto'},
                    {value: 'Nível Superior Completo'},
                    {value: 'Nível Superior Incompleto'}
                ],

                areas: []
            }
        },

        methods: {
            submitForm () {
                console.log("Enviando data")
            },

            loadAreas () {
                axios.get('/api/areas').then(response => {
                    this.areas = response.data
                });
            },

            onChangeEscolaridade(event) {
                console.log("teste")
                // this.nivel_escolaridade = value
            },

            buscaCep() {
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
                    <form>
                        <div class="card-content">
                            <h5 class="header">Dados pessoais</h5>
                            <div class="row">
                                <div class="input-field col s12 m9">
                                    <input v-validate="'required'" v-model="frm.nome_completo" required name="nome_completo" type="text" maxlength="255">
                                    <label>Nome completo</label>
                                    <span v-show="errors.has('nome_completo')" class="erro">{{ errors.first('nome_completo') }}</span>
                                </div>  
                                <div class="input-field col m3 s12">
                                    <input v-validate="'required'" v-mask="'###.###.###-##'" v-model="frm.cpf" required name="cpf" type="text">
                                    <label class="">CPF</label>
                                </div>  
                            </div>
                            <div class="row">
                                <div class="input-field col m2 s12">
                                    <input v-validate="'required'" v-model="frm.rg" name="rg" type="text">
                                    <label class="">RG</label>
                                </div>  
                                <div class="input-field col m2 s12">
                                    <input v-validate="'required'" v-mask="'##/##/####'" v-model="frm.dt_nascimento" name="dt_nascimento" type="text">
                                    <label class="">Dt. Nascimento</label>
                                </div>
                                <div class="input-field col m4 s12">
                                    <input id="email1" class="validate" v-validate="'required|email'" v-model="frm.email1" name="email1" type="email">
                                    <label for="email1" class="" data-error="E-Mail inválido" data-success="E-Mail válido">E-Mail Principal</label>
                                </div>
                                <div class="input-field col m4 s12">
                                    <input v-validate="'email'" v-model="frm.email2" name="email2" type="email">
                                    <label for="first_name" class="">E-Mail Secundário (opcional)</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col m3 s12">
                                    <input v-validate="'required'" v-mask="'(##) #####-####'" v-model="frm.tel1" id="tel1" type="tel">
                                    <label for="tel1" class="">Telefone Principal</label>
                                </div>  
                                <div class="input-field col m3 s12">
                                    <input v-mask="'(##) #####-####'" v-model="frm.tel2" id="tel2" type="tel">
                                    <label for="tel2" class="">Telefone Secundário (opcional) </label>
                                </div>
                                <div class="input-field col m6 s12">
                                    <select v-validate="'required'" v-model="frm.nivel_escolaridade" name="nivel_escolaridade" @change="onChangeEscolaridade($event)">
                                        <option value="" disabled selected>Selecione</option>
                                        <option v-for="option in niveis" v-bind:value="option.value">{{ option.value }}</option>
                                    </select>
                                    <label class="">Escolaridade</label>
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
                                        <input type="file">
                                    </div>
                                    <div class="file-path-wrapper">
                                        <input class="file-path validate" type="text" placeholder="Selecione o arquivo">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-action">
                            <button @click="submitForm" type="button" class="waves-effect waves-light btn teal darken-3"><i class="material-icons left">done_all</i>Enviar</button>
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