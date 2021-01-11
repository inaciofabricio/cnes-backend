<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Estabelecimento_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function get_all_uf($filtro=NULL)
    {
        if($filtro != NULL)
        {
            $query = 
                "SELECT 
                    DISTINCT 
                    b.uf,
                    b.nome
                FROM estabelecimento a
                INNER JOIN estado b ON b.uf = a.uf";

            if(!is_null($filtro->ds_tipo_unidade))
            {
                $query .= " WHERE ";

                $query .= " a.ds_tipo_unidade = "."'$filtro->ds_tipo_unidade'" ;
            }

                $query .= " ORDER BY b.nome ";

            $result = $this->db->query($query);

            if($result->num_rows() > 0)
            {
                $result = $result->result();
            }
            else
            {
                $result = array();
            }

            return $result;
        }
        else
        {
            return array();
        }
    }

    public function get_all_municipio($filtro=NULL)
    {
        if($filtro != NULL)
        {
                $query = 
                    "SELECT 
                        DISTINCT 
                        municipio
                    FROM estabelecimento ";

                if(!is_null($filtro->ds_tipo_unidade) || !is_null($filtro->uf))
                {
                    $query .= " WHERE ";

                    if(!is_null($filtro->ds_tipo_unidade))
                    {
                        $query .= " ds_tipo_unidade = "."'$filtro->ds_tipo_unidade'" ;
                    }

                    if(!is_null($filtro->uf))
                    {
                        if(!is_null($filtro->ds_tipo_unidade))
                        {
                            $query .= " AND ";
                        }

                        $query .= " uf = "."'$filtro->uf'" ;
                    }
                }

                $query .= " ORDER BY municipio";

            $result = $this->db->query($query);

            if($result->num_rows() > 0)
            {
                $result = $result->result();
            }
            else
            {
                $result = array();
            }

            return $result;
        }
        else
        {
            return array();
        }
    }

    public function get_all_ds_tipo_unidade()
    {
        $query = 
            "SELECT 
                DISTINCT 
                ds_tipo_unidade
            FROM estabelecimento
            ORDER BY ds_tipo_unidade";

        $result = $this->db->query($query);

        if($result->num_rows() > 0)
        {
            $result = $result->result();
        }
        else
        {
            $result = array();
        }

        return $result;
    }
 
    public function get_total_estabelecimento($filtro=NULL)
    {
        if($filtro != NULL)
        {
            $query = 
                "SELECT 
                    count(co_cnes) AS total 
                FROM estabelecimento ";

                if(!is_null($filtro->ds_tipo_unidade) || !is_null($filtro->uf) || !is_null($filtro->municipio))
                {
                    $query .= " WHERE ";

                    if(!is_null($filtro->ds_tipo_unidade))
                    {
                        $query .= " ds_tipo_unidade = "."'$filtro->ds_tipo_unidade'" ;
                    }

                    if(!is_null($filtro->uf))
                    {
                        if(!is_null($filtro->ds_tipo_unidade))
                        {
                            $query .= " AND ";
                        }

                        $query .= " uf = "."'$filtro->uf'" ;
                    }

                    if(!is_null($filtro->municipio))
                    {
                        if(!is_null($filtro->ds_tipo_unidade) || !is_null($filtro->uf))
                        {
                            $query .= " AND ";
                        }

                        $query .= " municipio = "."'$filtro->municipio'" ;
                    }
                }


            $result = $this->db->query($query);

            if($result->num_rows() > 0)
            {
                $result = $result->row();
            }
            else
            {
                $result = null;
            }
        }

        return $result;
        
    }

    public function get_all_estabelecimento($filtro=NULL)
    {
        if($filtro != NULL)
        {
            $query = 
                "SELECT 
                    *
                FROM estabelecimento ";

                if(!is_null($filtro->ds_tipo_unidade) || !is_null($filtro->uf) || !is_null($filtro->municipio))
                {
                    $query .= " WHERE ";

                    if(!is_null($filtro->ds_tipo_unidade))
                    {
                        $query .= " ds_tipo_unidade = "."'$filtro->ds_tipo_unidade'" ;
                    }

                    if(!is_null($filtro->uf))
                    {
                        if(!is_null($filtro->ds_tipo_unidade))
                        {
                            $query .= " AND ";
                        }

                        $query .= " uf = "."'$filtro->uf'" ;
                    }

                    if(!is_null($filtro->municipio))
                    {
                        if(!is_null($filtro->ds_tipo_unidade) || !is_null($filtro->uf))
                        {
                            $query .= " AND ";
                        }

                        $query .= " municipio = "."'$filtro->municipio'" ;
                    }
                }

                // $offset = 0;

                // if($filtro->pagina > 1)
                // {
                //     $offset = $filtro->pagina * 25;
                // }

                $query .= " LIMIT 25 OFFSET ". ($filtro->pagina-1) * 25 ;


            $result = $this->db->query($query);

            if($result->num_rows() > 0)
            {
                $result = $result->result();
            }
            else
            {
                $result = null;
            }
        }

        return $result;
        
    }
 }

?>