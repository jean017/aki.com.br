<?php

namespace Aki\Entity;

class Empresa {

    private $idEmpresa;
    private $razaoSocial;
    private $fantasia;
    private $telefone;
    private $infoAdd;
    private $cnpj;
    private $endereco;
    private $categoria;
    private $lagradouro;
    private $numero;
    private $bairro;
    private $cep;
    private $uf;
    private $cidade;
    private $email;
    private $foto;

    function __construct() {
        
    }

    function getIdEmpresa() {
        return $this->idEmpresa;
    }

    function getRazaoSocial() {
        return $this->razaoSocial;
    }

    function getFantasia() {
        return $this->fantasia;
    }

    function getTelefone() {
        return $this->telefone;
    }

    function getInfoAdd() {
        return $this->infoAdd;
    }

    function getCnpj() {
        return $this->cnpj;
    }

    function getEndereco() {
        return $this->endereco;
    }

    function getCategoria() {
        return $this->categoria;
    }

    function getLagradouro() {
        return $this->lagradouro;
    }

    function getNumero() {
        return $this->numero;
    }

    function getBairro() {
        return $this->bairro;
    }

    function getCep() {
        return $this->cep;
    }

    function getUf() {
        return $this->uf;
    }

    function getCidade() {
        return $this->cidade;
    }

    function getEmail() {
        return $this->email;
    }

    function getFoto() {
        return $this->foto;
    }

    function setIdEmpresa($idEmpresa) {
        $this->idEmpresa = $idEmpresa;
    }

    function setRazaoSocial($razaoSocial) {
        $this->razaoSocial = $razaoSocial;
    }

    function setFantasia($fantasia) {
        $this->fantasia = $fantasia;
    }

    function setTelefone($telefone) {
        $this->telefone = $telefone;
    }

    function setInfoAdd($infoAdd) {
        $this->infoAdd = $infoAdd;
    }

    function setCnpj($cnpj) {
        $this->cnpj = $cnpj;
    }

    function setEndereco($endereco) {
        $this->endereco = $endereco;
    }

    function setCategoria($categoria) {
        $this->categoria = $categoria;
    }

    function setLagradouro($lagradouro) {
        $this->lagradouro = $lagradouro;
    }

    function setNumero($numero) {
        $this->numero = $numero;
    }

    function setBairro($bairro) {
        $this->bairro = $bairro;
    }

    function setCep($cep) {
        $this->cep = $cep;
    }

    function setUf($uf) {
        $this->uf = $uf;
    }

    function setCidade($cidade) {
        $this->cidade = $cidade;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setFoto($foto) {
        $this->foto = $foto;
    }

}
