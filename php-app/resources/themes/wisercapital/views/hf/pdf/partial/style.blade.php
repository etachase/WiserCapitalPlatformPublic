 <style type="text/css">
   @font-face {
        font-family: 'ACaslonPro-Bold';
        src: url('{{public_path("assets/themes/wisercapital/fonts/ACaslonPro-Bold.otf")}}') format("opentype");
    }
    @font-face {
        font-family: 'FuturaPT-Book';
        src: url('{{public_path("assets/themes/wisercapital/fonts/futura-pt-book.otf")}}') format("opentype");
    }
    @font-face {
        font-family: 'Futura-Medium';
        src: url('{{public_path("assets/themes/wisercapital/fonts/FuturaMedium.ttf")}}') format('truetype');
    }
    body div h2 {
        font-family: 'ACaslonPro-Bold', 'Futura-Medium';
    }
    body div h2.table-head {
        font-size: 28px;
        font-family: 'ACaslonPro-Bold';
        font-weight: 400;
    }
    body table thead tr th {
        font-family: 'ACaslonPro-Bold';
    }
    body, body p, body, div, body div span, body div span a, 
         body table tbody tr td {
        font-family: 'FuturaPT-Book' ;
    }
    .title-box {
        border: 2px solid grey;
    }
    .title-box-entry{
        background: #556068 !important;
        color: #fff;
        font-size: 21px;
        padding: 0px !important;
    }
    .result-list {
        width: 100%;
        padding: 0;
        margin: 0;
        background: #ffffff;
    }
    .result-list td {
        border: none;
        font-weight: bold;
        font-size: 22px;
        color : #6f6f6f;
        padding: 10px 25px 0px;
    }
    .result-list td.last{
        padding: 10px 25px 10px;
    }
    .result-list td span{
        font-size: 22px;
    }
    .result-list td span small{
        font-size: 19px;
    }

    small {
        font-size: 12px;
    }
    h2 {
        font-size: 30px;
    }

    .f15-5{font-size: 15.5px;}
    .f22{font-size: 21px !important;}
    .pad15{padding: 15px;}
    .wsar-score-panel .panel-title{
        color: #656565;
        font-size: 22px;
        margin-bottom: 40px;
    }
    .chartpanel{
        background: #ffffff;
        padding: 30px;
    }

    .border-hr{
        border-width: 2px ;
        border-color: #e2e2e2;
    }
    .add-marginL30{
        margin-left: 30px !important;
    }
    .col-lg-6 {
        width : 43%;
        margin : 20px 25px;
        display: inline-block;
        vertical-align: top;
    }
    .row {
        margin-left: -10px;
        margin-right: -10px;
    }
    .resultpanel{
        padding: 10px 0;
        font-size: 17px;
        color: #6f6f6f;
    }

    .title-box-heading{
        padding: 10px 15px;
        margin: 0px !important;
        font-size: 26px;
        background: #556068;
        color: white;
    } 
    hr.page-break {
        page-break-after: always;
        border: none;
    }

    table {
        margin-right: 10px;
    }
    table thead tr {
        background-color: #516c80;
        color: #bcccd5;
    }
    table thead tr th, table tbody tr td {
        border : 1px solid #516c80;
        padding : 7px 10px 5px;
        font-size: 14px;
    }
    .pull-right {
        float: right;
        padding-right: 5%;
    }
    logo.pull-right {
        float: right;
        padding-right: 10px;
    }
    p {
        font-size: 20px !important;
    }
    .footer {
        margin-top: 19px;
    }

    .footer span.pull-right {
        font-size: 19px;
    }
    .footer span.company-name {
        font-size: 20px;
        color: #616161;
    }

    .col-md-12 {
        width: 100%;
        margin: 10px;
    }
    .pull-right {
        min-width: 20%;
    }
    .result-list td .pull-right {
        min-width: 35%;
        width: 35%;
    }
    .sec-header1 {
        color : #6f6f6f;
    }

    .table-chart-25-year thead tr td {
        border: 1px solid #43505d;
        padding: 9px;
        text-align: center !important;
    }
    <?php if($site->isFIT()) : ?>
    table thead tr td {
        font-size : 18px;
        padding : 20px 5px;
    }
    <?php endif; ?>

    .bg-yellow {
        background-color: #ede170;
    }
    .marT20 {
        margin-top: 20px;
    }
    .padB8 {
        padding-bottom: 8%;
    }

    .full-table-result {
        margin: 0px 25px;
        width: 92%;
    }
</style> 