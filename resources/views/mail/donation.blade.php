<style>
    /* Google Font */
    @import url('https://fonts.googleapis.com/css2?family=Poppins:ital@0;1&display=swap');

    body    {
        margin: 0;
        padding: 0;
        font-size: 16px;
        font-weight: 300;
        width: 100%;
        background: rgb(204, 204, 204);
        font-family: 'Poppins', sans-serif;
        
    }

    h2,h4,p{
        margin: 0;
    }

    .container_fluid_invoice {
        background: #f2f8e5;
        padding: 70px !important;
        max-width: 100vw;
        border: 1px solid #ccc;
        border-radius: 6px;
    }


    .logo_danako {
        margin-left: 11px;
        margin-top: 1px;
        position : relative;
        float: left;
    }

    .title_bold{
        margin-top: 100px;
        margin-bottom: 30px;
        text-align: center;
        font-size:20px;
        font-weight: 600;
        position: relative;
    }
    /* receiver detail */
    .receiver{
        margin-left: -10px;
        position: absolute;
        font-weight: 450;
    }

    .id_donation{
        float: right;
        margin-right: -10px; 
        font-weight: 450;
    }

    /*thankyou*/
    .thankyou{
        position: relative;
        text-align: center;
        margin-top: 120px;
        margin-bottom: 10px;
        font-size: 16px;
        font-weight: 400;
    }
    /*payment_detail*/
    .payment_detail{
        position: relative;
        text-align: left;
        margin-top: 20px;
        margin-bottom: 10px;
        font-size: 13px;
        font-weight: 400;
    }
    .table_detail table{
        width:100%;
        text-align:center;
        margin-top: 40px;
        font-size: 13px;
        font-family: 'Poppins', sans-serif;
    }
    /*contact for detail more */
    .contact_person{
        margin-top:50px;
        font-size:11px;
        text-align: center;
    }


</style>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
   
<div style="background:#fff;width:100%;max-width:400px;padding:20px;display:block;margin:auto;">
    <div class="container_fluid_invoice" >
        <!-- logo -->
        <div class="logo_danako">
            <img src = "https://drive.google.com/uc?export=view&id=1VaN8CLypRWGHI2Ju1tHLEgEwiDzRfMob"
            width = 200    
            height = 46.5
            />
        </div>
        
        <!-- tulisan rahasia -->
        <div class="secret_label">
            <p class="private_label">
                <span class="dot1">
                    RAHASIA / PRIBADI<br>
                    PRIVATE / CONFIDENTAL
                </span>
            </p>
        </div>
        
        <!-- judul invoice -->
        <p class="title_bold">DONATION RECEIPT</p>
        
        <!-- receiver row -->
        <div class="receiver">
            <b>Kepada Yth.<br></b>
            {{ $data->user->name ?? '-' }}
        </div>
        <div class="id_donation">
            <p>
                <b>Donation ID &nbsp;:&nbsp;</b>
                {{ $data->external_id }}
            </p>
        </div>
        
        <!-- ucapan terimakasih -->
        <div class="thankyou">
            <p>
                Terimakasih telah menyalurkan bantuan melalui DANAKO bersama LMI <br>
                Semoga Allah SWT memberikan keberkahan atas rezeki yang sudah Bapak/Ibu berikan <br>
            </p>
        </div>
        <!-- Detail Pembayaran -->
        <div class="payment_detail">
            <table>
                <tr>                           
                    <th>Pembayaran DANAKO</th>
                    <th>&emsp;&emsp;&emsp;</th>
                    <th>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;</th>
                    <th>&emsp;&emsp;</th>
                </tr>
                <th> </th>
                <tr>
                </tr>
                <tr>
                    <th>Tanggal Pembayaran</th>
                    <th>:</th>
                    {{-- <td>02 / 05 / 2023 , 2:53 am</td> --}}
                    <td>{{ date('d/m/Y, H:i', strtotime($data->paid_at)) }}</td>
                </tr>
                <tr>
                    <th>Metode Pembayaran</th>
                    <th>:</th>
                    <td>{{ $data->payment_channel }}</td>
                </tr>
            </table>
        </div>
        <div class="table_detail">
        <table border="1px solid">
        <tr>
            <th colspan="3" style="background:#0EBF65;">DETAIL DONASI</th>
        </tr>
        <tr>
            <th> Jenis Donasi </th>
            <th> Deskripsi </th>
            <th> Nominal </th>
        </tr>
        <tr>
            <td>Sedekah {{ $data->campaign->category->name ?? '-' }}</td>
            <td>{{ $data->campaign->title ?? '-' }}</td>
            <td>{{ number_format($data->amount_donations,0,',','.') }}</td>
        </tr>
        <tr>
            <td colspan="2"> <b>TOTAL</b></td>
            <td>{{ number_format($data->amount_donations,0,',','.') }}</td>
        </tr>
        </table>
        </div>
        <div class="contact_person">
            <p>
            Untuk informasi lebih lanjut mengenai donasi anda, silahkan hubungi<br>
            email : lct.lmi@gmail.com | phone :
            </p>
        </div>
        
    </div>    
</div>