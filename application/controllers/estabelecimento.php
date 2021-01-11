<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Estabelecimento extends CI_Controller {

    function __construct() 
    {
        parent::__construct();

        $this->load->model('geral_model');
        $this->load->model('estabelecimento_model');
    }

    public function index() 
    {
        $feedback = (object) array(
            "message" => "Sem permissão para acessar está funcionalidade.",
            "success" => false,
            "error" => 401
        );

        header("Access-Control-Allow-Origin: *");    
        header("Access-Control-Allow-Headers: Content-Type");
        header("Content-Type: application/json");
        echo(json_encode($feedback,JSON_UNESCAPED_UNICODE));
    }

    public function get_all_estabelecimento() 
    {
        $feedback = (object) array(
            "message" => "Sem permissão para acessar está funcionalidade.",
            "success" => false,
            "error" => 401
        );

        $post_data = file_get_contents("php://input");

        if($post_data != NULL)
        {
            $post = json_decode($post_data);

            if(!is_null($post))
            {
                $data = (object) array(
                    "all_estabelecimento" => array(),
                    "totais" => (object) array(
                        "t_estabelecimentos" => 0,
                        "t_paginas" => 0
                    )
                );

                $obj = $this->estabelecimento_model->get_total_estabelecimento($post);

                if(!is_null($obj))
                {
                    $resto_d = $obj->total % 25;

                    $t_paginas = intval($obj->total / 25);

                    if($resto_d > 0)
                    {
                        $t_paginas = $t_paginas + 1;
                    }

                    $data->totais = (object) array(
                        "t_estabelecimentos" => $obj->total,
                        "t_paginas" => $t_paginas
                    );
                }

                $data->all_estabelecimento = $this->estabelecimento_model->get_all_estabelecimento($post);

                $feedback = (object) array(
                    "data" => $data,
                    "message" => "Sucesso ao realizar essa operação!",
                    "success" => true
                );
            }
        }

        header("Access-Control-Allow-Origin: *");    
        header("Access-Control-Allow-Headers: Content-Type");
        header("Content-Type: application/json");
        echo(json_encode($feedback,JSON_UNESCAPED_UNICODE));
    }

    public function get_one_estabelecimento() 
    {
        $feedback = (object) array(
            "message" => "Sem permissão para acessar está funcionalidade.",
            "success" => false,
            "error" => 401
        );

        $post_data = file_get_contents("php://input");

        if($post_data != NULL)
        {
            $post = json_decode($post_data);

            if(!is_null($post))
            {
                //REQUISITANDO UMA NOVA QUERY
                $query = $this->geral_model->new_query();
                    
                //MONTANDO A QUERY
                $query->table = "estabelecimento";
                $query->where = array(
                    "co_cnes" => $post->co_cnes
                );
                                
                //RECUPERANDO MULTIPLOS OBJETOS
                $obj = $this->geral_model->get_one($query);

                $feedback = (object) array(
                    "data" => $obj,
                    "message" => "Sucesso ao realizar essa operação!",
                    "success" => true
                );
            }
        }

        header("Access-Control-Allow-Origin: *");    
        header("Access-Control-Allow-Headers: Content-Type");
        header("Content-Type: application/json");
        echo(json_encode($feedback,JSON_UNESCAPED_UNICODE));
    }

    public function get_all_estabelecimento_por_ds_tipo_unidade() 
    {
        $feedback = (object) array(
            "message" => "Sem permissão para acessar está funcionalidade.",
            "success" => false,
            "error" => 401
        );

        $post_data = file_get_contents("php://input");

        if($post_data != NULL)
        {
            $post = json_decode($post_data);

            if(!is_null($post))
            {
                //REQUISITANDO UMA NOVA QUERY
                $query = $this->geral_model->new_query();
                    
                //MONTANDO A QUERY
                $query->table = "estabelecimento";
                $query->where = array(
                    "ds_tipo_unidade" => $post->ds_tipo_unidade
                );
                                
                //RECUPERANDO MULTIPLOS OBJETOS
                $obj = $this->geral_model->get_all($query);

                $feedback = (object) array(
                    "data" => $obj,
                    "message" => "Sucesso ao realizar essa operação!",
                    "success" => true
                );
            }
        }

        header("Access-Control-Allow-Origin: *");    
        header("Access-Control-Allow-Headers: Content-Type");
        header("Content-Type: application/json");
        echo(json_encode($feedback,JSON_UNESCAPED_UNICODE));
    }

    public function get_all_estabelecimento_por_uf() 
    {
        $feedback = (object) array(
            "message" => "Sem permissão para acessar está funcionalidade.",
            "success" => false,
            "error" => 401
        );

        $post_data = file_get_contents("php://input");

        if($post_data != NULL)
        {
            $post = json_decode($post_data);

            if(!is_null($post))
            {
                //REQUISITANDO UMA NOVA QUERY
                $query = $this->geral_model->new_query();
                    
                //MONTANDO A QUERY
                $query->table = "estabelecimento";
                $query->where = array(
                    "uf" => $post->uf
                );
                                
                //RECUPERANDO MULTIPLOS OBJETOS
                $obj = $this->geral_model->get_all($query);

                $feedback = (object) array(
                    "data" => $obj,
                    "message" => "Sucesso ao realizar essa operação!",
                    "success" => true
                );
            }
        }

        header("Access-Control-Allow-Origin: *");    
        header("Access-Control-Allow-Headers: Content-Type");
        header("Content-Type: application/json");
        echo(json_encode($feedback,JSON_UNESCAPED_UNICODE));
    }

    public function get_all_estabelecimento_por_municipio() 
    {
        $feedback = (object) array(
            "message" => "Sem permissão para acessar está funcionalidade.",
            "success" => false,
            "error" => 401
        );

        $post_data = file_get_contents("php://input");

        if($post_data != NULL)
        {
            $post = json_decode($post_data);

            if(!is_null($post))
            {
                //REQUISITANDO UMA NOVA QUERY
                $query = $this->geral_model->new_query();
                    
                //MONTANDO A QUERY
                $query->table = "estabelecimento";
                $query->where = array(
                    "uf" => $post->uf
                );
                                
                //RECUPERANDO MULTIPLOS OBJETOS
                $obj = $this->geral_model->get_all($query);

                $feedback = (object) array(
                    "data" => $obj,
                    "message" => "Sucesso ao realizar essa operação!",
                    "success" => true
                );
            }
        }

        header("Access-Control-Allow-Origin: *");    
        header("Access-Control-Allow-Headers: Content-Type");
        header("Content-Type: application/json");
        echo(json_encode($feedback,JSON_UNESCAPED_UNICODE));
    }

    public function update() 
    {
        $feedback = (object) array(
            "message" => "Sem permissão para acessar está funcionalidade.",
            "success" => false,
            "error" => 401
        );

        $post_data = file_get_contents("php://input");

        if($post_data != NULL)
        {
            $post = json_decode($post_data);

            if(!is_null($post))
            {
                $data = (object) array(
                    "msg" => "erro",
                    "status" => 0
                );

                //REQUISITANDO UMA NOVA QUERY
                $query = $this->geral_model->new_query();
                    
                //MONTANDO A QUERY
                $query->table = "estabelecimento";
                $query->where = array(
                    "co_cnes" => $post->co_cnes
                );
                                
                //RECUPERANDO MULTIPLOS OBJETOS
                $obj = $this->geral_model->get_one($query);

                if(is_null($obj))
                {
                    //REQUISITANDO UMA NOVA QUERY
                    $query = $this->geral_model->new_query();
                                                        
                    //MONTANDO A QUERY
                    $query->table = "estabelecimento";
                    $query->data = array(
                        "co_cnes" => trim($post->co_cnes),
                        "co_ibge" => trim($post->co_ibge),
                        "no_fantasia" => trim($post->no_fantasia),
                        "ds_tipo_unidade" => trim($post->ds_tipo_unidade),
                        "tp_gestao" => trim($post->tp_gestao),
                        "no_logradouro" => trim($post->no_logradouro),
                        "nu_endereco" => trim($post->nu_endereco),
                        "no_bairro" => trim($post->no_bairro),
                        "co_cep" => trim($post->co_cep),
                        "uf" => trim($post->uf),
                        "municipio" => trim($post->municipio),
                        "nu_telefone" => trim($post->nu_telefone),
                    );
                        
                    //INSERINDO UM OBJETO
                   $this->geral_model->insert($query);

                   $data->msg = "Inserido";
                   $data->status = 1;
                }
                else
                {
                    //REQUISITANDO UMA NOVA QUERY
                    $query = $this->geral_model->new_query();
                                                        
                    //MONTANDO A QUERY
                    $query->table = "estabelecimento";
                    $query->data = array(
                        "co_ibge" => trim($post->co_ibge),
                        "no_fantasia" => trim($post->no_fantasia),
                        "ds_tipo_unidade" => trim($post->ds_tipo_unidade),
                        "tp_gestao" => trim($post->tp_gestao),
                        "no_logradouro" => trim($post->no_logradouro),
                        "nu_endereco" => trim($post->nu_endereco),
                        "no_bairro" => trim($post->no_bairro),
                        "co_cep" => trim($post->co_cep),
                        "uf" => trim($post->uf),
                        "municipio" => utf8_encode(trim($post->municipio)),
                        "nu_telefone" => trim($post->nu_telefone),
                    );
                    $query->where = array(
                        "co_cnes" => $post->co_cnes
                    );
                        
                    //ATUALIZA UM OBJETO
                    $this->geral_model->update($query);

                    $data->msg = "Atualizado";
                    $data->status = 2;
                }

                $feedback = (object) array(
                    "data" => $data,
                    "message" => "Sucesso ao realizar essa operação!",
                    "success" => true
                );
            }
        }

        header("Access-Control-Allow-Origin: *");    
        header("Access-Control-Allow-Headers: Content-Type");
        header("Content-Type: application/json");
        echo(json_encode($feedback,JSON_UNESCAPED_UNICODE));
    }

    public function ds_tipo_unidade() 
    {
        $feedback = (object) array(
            "message" => "Sem permissão para acessar está funcionalidade.",
            "success" => false,
            "error" => 401
        );

        $array = $this->estabelecimento_model->get_all_ds_tipo_unidade();

        $feedback = (object) array(
            "data" => $array,
            "message" => "Sucesso ao realizar essa operação!",
            "success" => true
        );

        header("Access-Control-Allow-Origin: *");    
        header("Access-Control-Allow-Headers: Content-Type");
        header("Content-Type: application/json");
        echo(json_encode($feedback,JSON_UNESCAPED_UNICODE));
    }

    public function get_all_uf() 
    {
        $feedback = (object) array(
            "message" => "Sem permissão para acessar está funcionalidade.",
            "success" => false,
            "error" => 401
        );

        $post_data = file_get_contents("php://input");

        if($post_data != NULL)
        {
            $post = json_decode($post_data);

            if(!is_null($post))
            {
                $array = $this->estabelecimento_model->get_all_uf($post);

                $feedback = (object) array(
                    "data" => $array,
                    "message" => "Sucesso ao realizar essa operação!",
                    "success" => true
                );
            }
        }

        header("Access-Control-Allow-Origin: *");    
        header("Access-Control-Allow-Headers: Content-Type");
        header("Content-Type: application/json");
        echo(json_encode($feedback,JSON_UNESCAPED_UNICODE));
    }

    public function get_all_municipio() 
    {
        $feedback = (object) array(
            "message" => "Sem permissão para acessar está funcionalidade.",
            "success" => false,
            "error" => 401
        );
        
        $post_data = file_get_contents("php://input");

        if($post_data != NULL)
        {
            $post = json_decode($post_data);

            $array = array();

            if(!is_null($post))
            {
                $array = $this->estabelecimento_model->get_all_municipio($post);
            }

            $feedback = (object) array(
                "data" => $array,
                "message" => "Sucesso ao realizar essa operação!",
                "success" => true
            );
        }

        header("Access-Control-Allow-Origin: *");    
        header("Access-Control-Allow-Headers: Content-Type");
        header("Content-Type: application/json");
        echo(json_encode($feedback,JSON_UNESCAPED_UNICODE));
    }
}