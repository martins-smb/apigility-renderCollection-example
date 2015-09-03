<?php
namespace Example\V1\Rest\Client;

class ContactEntity
{

    private $ctc_id;

    private $ctc_nome;
    
    private $ctc_email;

    public function getArrayCopy()
    {
        return array(
            'ctc_id' => $this->ctc_id,
            'ctc_nome' => $this->ctc_nome,
            'ctc_email' => $this->ctc_email
        );
    }

    public function exchangeArray($data)
    {
        foreach ($data as $key => $value) {
            if (in_array($key, array(
                'ctc_id',
                'ctc_nome',
                'ctc_email'
            ))) {
                $this->$key = $value;
            }
        }
    }
}