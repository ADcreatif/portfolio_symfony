<?php

namespace App\Model;


use App\Structure\Database;

class Portfolio {
    function add() {
    }

    function get($id) {
    }

    function remove() {
    }

    function get_all() {

        $db = new Database();
        return $db->query("SELECT * FROM items");

        /*
            'title' => "Roule ma poule",
            'content' => "",
            'image'    =>123,
            'id'    =>123,
            'url'   => 'roule-ma-poule'

            ],[
                'title' => "Chausse mon 31",
                'content' => "",
                'id'    =>45,
                'image'    =>45,
                'url'   => 'chausse-mon-31-la-derniere-va-vous-etonner'
            ],[
                'title' => "Les cafard me foutent le cafard",
                'content' => "",
                'id'    => 245,
                'image'    => 245,
                'url'   => 'les-cafards-cest-mal'
            ]
        ];*/
    }
}