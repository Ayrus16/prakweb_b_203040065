<?php

class About{
    public function index($nama = 'Surya',$pekerjaan='Mahasiwa' ){
        echo"Hallo, nama saya $nama adalah seorang $pekerjaan";
    }
    public function page(){
        echo 'About/page';
    }
}