<?php

class query_tickets{
    var $ticket_type, $CheCi, $depart_station, $arrive_station, $depart_time, $arrive_time, $YingWo, $YingZuo, $RuanWo, $RuanZuo, $YingWo_price, $YingZuo_price, $RuanWo_price, $RuanZuo_price, $day;

    /**
     * query_tickets constructor.
     * @param $ticket_type
     * @param $CheCi
     * @param $depart_station
     * @param $arrive_station
     * @param $depart_time
     * @param $arrive_time
     * @param $YingWo
     * @param $YingWo_price
     * @param $YingZuo
     * @param $YingZuo_price
     * @param $RuanWo
     * @param $RuanWo_price
     * @param $RuanZuo
     * @param $RuanZuo_price
     * @param $day
     */

    public function __construct($ticket_type, $CheCi, $depart_station, $arrive_station, $depart_time, $arrive_time, $YingWo, $YingWo_price, $YingZuo, $YingZuo_price, $RuanWo, $RuanWo_price, $RuanZuo, $RuanZuo_price, $day)
    {
        $this->ticket_type = $ticket_type;
        $this->CheCi = $CheCi;
        $this->depart_station = $depart_station;
        $this->arrive_station = $arrive_station;
        $this->depart_time = $depart_time;
        $this->arrive_time = $arrive_time;
        $this->YingWo = $YingWo;
        $this->YingZuo = $YingZuo;
        $this->RuanWo = $RuanWo;
        $this->RuanZuo = $RuanZuo;
        $this->YingWo_price = $YingWo_price;
        $this->YingZuo_price = $YingZuo_price;
        $this->RuanWo_price = $RuanWo_price;
        $this->RuanZuo_price = $RuanZuo_price;
        $this->day = $day;
    }





}

class query_myOrder{
    var $DingDanBianHao, $YongHuMing, $LieCheMing, $LieCheLeiXing, $ChuFaZhan, $DaoDaZhan, $FaCheShiJian, $DiDaShiJian, $DiJiTian, $JiaGe, $ZuoWeiLeiXing, $ZuoWeiBianHao, $CheXiangHao, $JianPiaoKou, $XiaDanShiJian, $DingDanZhuangTai;

    /**
     * query_myOrder constructor.
     * @param $DingDanBianHao
     * @param $YongHuMing
     * @param $LieCheMing
     * @param $LieCheLeiXing
     * @param $ChuFaZhan
     * @param $DaoDaZhan
     * @param $FaCheShiJian
     * @param $DiDaShiJian
     * @param $DiJiTian
     * @param $JiaGe
     * @param $ZuoWeiLeiXing
     * @param $ZuoWeiBianHao
     * @param $CheXiangHao
     * @param $JianPiaoKou
     * @param $XiaDanShiJian
     * @param $DingDanZhuangTai
     */
    public function __construct($DingDanBianHao, $YongHuMing, $LieCheMing, $LieCheLeiXing, $ChuFaZhan, $DaoDaZhan, $FaCheShiJian, $DiDaShiJian, $DiJiTian, $JiaGe, $ZuoWeiLeiXing, $ZuoWeiBianHao, $CheXiangHao, $JianPiaoKou, $XiaDanShiJian, $DingDanZhuangTai)
    {
        $this->DingDanBianHao = $DingDanBianHao;
        $this->YongHuMing = $YongHuMing;
        $this->LieCheMing = $LieCheMing;
        $this->LieCheLeiXing = $LieCheLeiXing;
        $this->ChuFaZhan = $ChuFaZhan;
        $this->DaoDaZhan = $DaoDaZhan;
        $this->FaCheShiJian = $FaCheShiJian;
        $this->DiDaShiJian = $DiDaShiJian;
        $this->DiJiTian = $DiJiTian;
        $this->JiaGe = $JiaGe;
        $this->ZuoWeiLeiXing = $ZuoWeiLeiXing;
        $this->ZuoWeiBianHao = $ZuoWeiBianHao;
        $this->CheXiangHao = $CheXiangHao;
        $this->JianPiaoKou = $JianPiaoKou;
        $this->XiaDanShiJian = $XiaDanShiJian;
        $this->DingDanZhuangTai = $DingDanZhuangTai;
    }


}

class query_train_time_table{
    var $train_name, $nth_station, $station_id, $station_name, $short_name, $arrive_time, $depart_time, $nth_day;

    /**
     * query_train_time_table constructor.
     * @param $train_name
     * @param $nth_station
     * @param $station_id
     * @param $station_name
     * @param $short_name
     * @param $arrive_time
     * @param $depart_time
     * @param $nth_day
     */
    public function __construct($train_name, $nth_station, $station_id, $station_name, $short_name, $arrive_time, $depart_time, $nth_day)
    {
        $this->train_name = $train_name;
        $this->nth_station = $nth_station;
        $this->station_id = $station_id;
        $this->station_name = $station_name;
        $this->short_name = $short_name;
        $this->arrive_time = $arrive_time;
        $this->depart_time = $depart_time;
        $this->nth_day = $nth_day;
    }


}

class users{
    var $username, $ID_card_num, $IsDBA;

    /**
     * users constructor.
     * @param $username
     * @param $ID_card_num
     * @param $IsDBA
     */
    public function __construct($username, $ID_card_num, $IsDBA)
    {
        $this->username = $username;
        $this->ID_card_num = $ID_card_num;
        $this->IsDBA = $IsDBA;
    }

}